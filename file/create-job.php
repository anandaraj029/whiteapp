<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $customer_id = $conn->real_escape_string($_POST['customer_id']);    
    $equipment_type = $conn->real_escape_string($_POST['equipment_type']);
    $sticker_status = $conn->real_escape_string($_POST['sticker_status']);
    $checklist_type = $conn->real_escape_string($_POST['checklist_type']);
    $inspector_name = $conn->real_escape_string($_POST['inspector_name']);
    $equipment_location = $conn->real_escape_string($_POST['equipment_location']);

    // Fetch customer details based on customer_id
    $customerQuery = $conn->prepare("SELECT customer_name, email, mobile FROM customers WHERE id = ?");
    $customerQuery->bind_param("i", $customer_id);
    $customerQuery->execute();
    $customerQuery->bind_result($customer_name, $customer_email, $customer_mobile);
    
    if (!$customerQuery->fetch()) {
        // Handle missing customer
        header("Location: ../job/create-job.php?status=error&message=" . urlencode("Customer not found. Please select a valid customer."));
        exit();
    }
    $customerQuery->close();

    // Auto-generate project number
    $project_no_query = "SELECT MAX(CAST(project_no AS UNSIGNED)) AS max_project_no FROM project_info";
    $result = $conn->query($project_no_query);
    $row = $result->fetch_assoc();
    $last_project_no = $row['max_project_no'];
    $project_no = $last_project_no ? $last_project_no + 1 : 1;

    // Insert data into project_info table
    $stmt = $conn->prepare("INSERT INTO project_info (project_no, creation_date, equipment_type, sticker_status, equipment_location, customer_id, customer_name, customer_email, customer_mobile, inspector_name, checklist_type) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "issssisssss",
        $project_no,
        $creation_date,
        $equipment_type,
        $sticker_status,
        $equipment_location,        
        $customer_id,
        $customer_name,
        $customer_email,
        $customer_mobile,
        $inspector_name,
        $checklist_type
        
    );

    if ($stmt->execute()) {
        header("Location: ../job/overall-job-list.php?status=success");
        exit();
    } else {
        $error_message = $stmt->error;

        // Handle duplicate or other errors
        if (strpos($error_message, 'Duplicate entry') !== false) {
            $error_message = "The Project ID already exists. Please use a unique Project ID.";
        } elseif (strpos($error_message, 'cannot be null') !== false) {
            $error_message = "A required field is missing. Please fill in all mandatory fields.";
        }

        header("Location: ../job/create-job.php?status=error&message=" . urlencode($error_message));
        exit();
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
