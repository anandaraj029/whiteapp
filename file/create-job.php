<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $customer_id = $conn->real_escape_string($_POST['customer_id']);
    $equipment_type = $conn->real_escape_string($_POST['equipment_type']);
    $sticker_status = $conn->real_escape_string($_POST['sticker_status']);
    $equipment_location = $conn->real_escape_string($_POST['equipment_location']);
    // $equipment_id = $conn->real_escape_string($_POST['equipment_id']);
    $checklist_type = $conn->real_escape_string($_POST['checklist_type']);
    $inspector_name = $conn->real_escape_string($_POST['inspector_name']);    
    // $inspector_image = $conn->real_escape_string($_POST['inspector_image'] ?? '');
    // $inspector_signature = $conn->real_escape_string($_POST['inspector_signature'] ?? '');

    // Fetch customer details
    $customerQuery = $conn->prepare("SELECT customer_name, email, mobile FROM customers WHERE id = ?");
    $customerQuery->bind_param("i", $customer_id);
    $customerQuery->execute();
    $customerQuery->bind_result($customer_name, $customer_email, $customer_mobile);

    if (!$customerQuery->fetch()) {
        header("Location: ../job/create-job.php?status=error&message=" . urlencode("Customer not found. Please select a valid customer."));
        exit();
    }
    $customerQuery->close();

    // Auto-generate project number
   // Auto-generate project number
$project_no_query = "SELECT MAX(CAST(SUBSTRING(project_no, 5) AS UNSIGNED)) AS max_project_no FROM project_info";
$result = $conn->query($project_no_query);
$row = $result->fetch_assoc();
$last_project_no = $row['max_project_no'];
$project_no = "CIMS" . str_pad(($last_project_no ? $last_project_no + 1 : 1), 3, "0", STR_PAD_LEFT);


    // Insert into database
    $creation_date = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO project_info (project_no, creation_date, equipment_type, sticker_status, equipment_location, equipment_id, customer_id, customer_name, customer_email, customer_mobile, inspector_name, checklist_type)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssisssss",
        $project_no,
        $creation_date,
        $equipment_type,
        $sticker_status,
        $equipment_location,
        $equipment_id,
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
        error_log("Database Insert Error: " . $stmt->error);
        header("Location: ../job/create-job.php?status=error&message=" . urlencode("Failed to create project. Please try again."));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
