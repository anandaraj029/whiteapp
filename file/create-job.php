<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize data from the form
    $project_no = $conn->real_escape_string($_POST['project_no']);
    $creation_date = $conn->real_escape_string($_POST['creation_date']);
    $equipment_type = $conn->real_escape_string($_POST['equipment_type']);
    $sticker_status = $conn->real_escape_string($_POST['sticker_status']);
    $checklist_type = $conn->real_escape_string($_POST['checklist_type']);
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $customer_email = $conn->real_escape_string($_POST['customer_email']);
    $customer_mobile = $conn->real_escape_string($_POST['customer_mobile']);
    $inspector_name = $conn->real_escape_string($_POST['inspector_name']);
    $equipment_location = $conn->real_escape_string($_POST['equipment_location']);

    // Check if project_no already exists
    $check_stmt = $conn->prepare("SELECT project_no FROM project_info WHERE project_no = ?");
    $check_stmt->bind_param("s", $project_no);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        header("Location: ../job/create-job.php?status=error&message=" . urlencode("Project No already exists. Please use a unique value."));
        $check_stmt->close();
        exit();
    }
    $check_stmt->close();

    // Ensure project_no is not empty
    if (empty($project_no)) {
        header("Location: ../job/create-job.php?status=error&message=" . urlencode("Project No cannot be empty."));
        exit();
    }

    // Use prepared statements for secure insertion
    $stmt = $conn->prepare("INSERT INTO project_info (project_no, creation_date, equipment_type, sticker_status, checklist_type, customer_name, customer_email, customer_mobile, inspector_name, equipment_location) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssss",
        $project_no,
        $creation_date,
        $equipment_type,
        $sticker_status,
        $checklist_type,
        $customer_name,
        $customer_email,
        $customer_mobile,
        $inspector_name,
        $equipment_location
    );

    // Execute and handle the result
    if ($stmt->execute()) {
        header("Location: ../job/overall-job-list.php?status=success");
        exit();
    } else {
        $error_message = $stmt->error;

        // Customize error messages
        if (strpos($error_message, 'Duplicate entry') !== false) {
            $error_message = "The Project ID already exists. Please use a unique Project ID.";
        } elseif (strpos($error_message, 'cannot be null') !== false) {
            $error_message = "A required field is missing. Please fill in all mandatory fields.";
        }

        header("Location: ../job/create-job.php?status=error&message=" . urlencode($error_message));
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
