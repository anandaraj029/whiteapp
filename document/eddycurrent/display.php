<?php
// Include the database connection file
include_once('../../file/config.php');

// Check if the form is submitted
if (isset($_POST['save_all'])) {
    // Collect all form data
    $inspection_date = $_POST['inspection_date'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $project_no = $_POST['project_no'];
    // $companyName = $_POST['companyName'];
    $reference_no = $_POST['reference_no'];
    $location = $_POST['location'];
    $next_inspection_date = $_POST['next_inspection_date'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $technical_manager = $_POST['technical_manager'];
    $inspected_item = $_POST['inspected_item'];
    $type_of_joint = $_POST['type_of_joint'];
    $specification = $_POST['specification'];
    $inspection_method = $_POST['inspection_method'];
    $calibration_details = $_POST['calibration_details'];
    $gain = $_POST['gain'];
    $probe_frequency = $_POST['probe_frequency'];
    $device_maker = $_POST['device_maker'];
    $model = $_POST['model'];
    $serial_no = $_POST['serial_no'];
    $cable_type = $_POST['cable_type'];
    $sensor_type = $_POST['sensor_type'];
    $ref_block_type = $_POST['ref_block_type'];
    $material = $_POST['material'];
    $description_1 = $_POST['description_1'];
    $description_2 = $_POST['description_2'];
    $description_3 = $_POST['description_3'];
    $description_of_inspection = $_POST['description_of_inspection'];
    $inspection_result = $_POST['inspection_result'];
    $reason = $_POST['reason'];    
    $created_at = date('Y-m-d H:i:s');

    

    // Insert into the database
    $sql = "INSERT INTO eddy_current_inspection (
        inspection_date, certificate_no, report_no, jrn, project_no, reference_no, location, next_inspection_date, 
        customer_name, customer_email, mobile, inspector, technical_manager, inspected_item, type_of_joint, specification, 
        inspection_method, calibration_details, gain, probe_frequency, device_maker, model, serial_no, cable_type, sensor_type, 
        ref_block_type, material, description_1, description_2, description_3, description_of_inspection, inspection_result, 
        reason, created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssssssssssssssssssss",
        $inspection_date, $certificate_no, $report_no, $jrn, $project_no, $reference_no, $location, $next_inspection_date,
        $customer_name, $customer_email, $mobile, $inspector, $technical_manager, $inspected_item, $type_of_joint, $specification,
        $inspection_method, $calibration_details, $gain, $probe_frequency, $device_maker, $model, $serial_no, $cable_type, $sensor_type,
        $ref_block_type, $material, $description_1, $description_2, $description_3, $description_of_inspection, $inspection_result,
        $reason, $created_at
    );

    if ($stmt->execute()) {
        // Update the project_info table to mark the certificate as created
        $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("s", $project_no);

        if ($update_stmt->execute()) {
            $msg = "Health check created successfully, and project status updated.";
            header('Location: index.php?msg=' . urlencode($msg));
            exit();
        } else {
            echo "Error updating project status: " . $conn->error;
        }
        $update_stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>