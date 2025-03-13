<?php
// Include the database connection file
include_once('../../file/config.php');

// Check if the form is submitted
if (isset($_POST['update_all'])) {
    // Collect all form data
    $inspection_date = $_POST['inspection_date'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $project_no = $_POST['project_no'];
    $companyName = $_POST['companyName'];
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
    $inspector_name = $_POST['inspector_name'];
    $authenticating_person_name = $_POST['authenticating_person_name'];

    // Ensure the "uploads" directory exists
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Create the directory if it doesn't exist
    }

    // Handle file uploads with names only
    $inspector_signature = '';
    $signature = '';

    // Update inspector signature if a new file is uploaded
    if (isset($_FILES['inspector_signature']) && $_FILES['inspector_signature']['error'] == UPLOAD_ERR_OK) {
        $inspector_filename = $target_dir . preg_replace('/\s+/', '_', $inspector_name) . '.' . pathinfo($_FILES['inspector_signature']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['inspector_signature']['tmp_name'], $inspector_filename);
        $inspector_signature = $inspector_filename;
    }

    // Update authenticating person signature if a new file is uploaded
    if (isset($_FILES['signature']) && $_FILES['signature']['error'] == UPLOAD_ERR_OK) {
        $signature_filename = $target_dir . preg_replace('/\s+/', '_', $authenticating_person_name) . '.' . pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['signature']['tmp_name'], $signature_filename);
        $signature = $signature_filename;
    }

    // Prepare the SQL statement
    $sql = "UPDATE eddy_current_inspection SET 
            inspection_date = ?, 
            certificate_no = ?, 
            report_no = ?, 
            jrn = ?, 
            companyName = ?, 
            reference_no = ?, 
            location = ?, 
            next_inspection_date = ?, 
            customer_name = ?, 
            customer_email = ?, 
            mobile = ?, 
            inspector = ?, 
            technical_manager = ?, 
            inspected_item = ?, 
            type_of_joint = ?, 
            specification = ?, 
            inspection_method = ?, 
            calibration_details = ?, 
            gain = ?, 
            probe_frequency = ?, 
            device_maker = ?, 
            model = ?, 
            serial_no = ?, 
            cable_type = ?, 
            sensor_type = ?, 
            ref_block_type = ?, 
            material = ?, 
            description_1 = ?, 
            description_2 = ?, 
            description_3 = ?, 
            description_of_inspection = ?, 
            inspection_result = ?, 
            reason = ?, 
            inspector_name = ?, 
            authenticating_person_name = ?";

    // Append file fields to the SQL query if new files are uploaded
    if (!empty($inspector_signature)) {
        $sql .= ", inspector_signature = ?";
    }
    if (!empty($signature)) {
        $sql .= ", signature = ?";
    }

    $sql .= " WHERE project_no = ?"; // Update based on project_no

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);

    // Dynamically bind parameters based on whether files are uploaded
    $params = [
        $inspection_date, $certificate_no, $report_no, $jrn, $companyName, $reference_no, $location, $next_inspection_date,
        $customer_name, $customer_email, $mobile, $inspector, $technical_manager, $inspected_item, $type_of_joint, $specification,
        $inspection_method, $calibration_details, $gain, $probe_frequency, $device_maker, $model, $serial_no, $cable_type,
        $sensor_type, $ref_block_type, $material, $description_1, $description_2, $description_3, $description_of_inspection,
        $inspection_result, $reason, $inspector_name, $authenticating_person_name
    ];

    if (!empty($inspector_signature)) {
        $params[] = $inspector_signature;
    }
    if (!empty($signature)) {
        $params[] = $signature;
    }

    $params[] = $project_no; // Add project_no for the WHERE clause

    // Bind parameters dynamically
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>