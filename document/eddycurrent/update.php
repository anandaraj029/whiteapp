<?php
// Include the database connection file
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
    // $inspector_name = $_POST['inspector_name'];
    // $authenticating_person_name = $_POST['authenticating_person_name'];

    // Ensure the "uploads" directory exists
    // $target_dir = "uploads/";
    // if (!is_dir($target_dir)) {
    //     mkdir($target_dir, 0755, true);
    // }

    // Fetch the existing file names before updating
    // $stmt = $conn->prepare("SELECT inspector_signature, signature FROM eddy_current_inspection WHERE project_no = ?");
    // $stmt->bind_param("s", $project_no);
    // $stmt->execute();
    // $stmt->bind_result($existing_inspector_signature, $existing_signature);
    // $stmt->fetch();
    // $stmt->close();

    // Handle file uploads and delete previous files
    // $inspector_signature = $existing_inspector_signature;
    // $signature = $existing_signature;

    

    // Prepare the SQL statement
    $sql = "UPDATE eddy_current_inspection SET 
            inspection_date = ?, 
            certificate_no = ?, 
            report_no = ?, 
            jrn = ?,             
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
            reason = ?
            WHERE project_no = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssssssss", 
        $inspection_date, $certificate_no, $report_no, $jrn, $reference_no, $location, $next_inspection_date,
        $customer_name, $customer_email, $mobile, $inspector, $technical_manager, $inspected_item, $type_of_joint, $specification,
        $inspection_method, $calibration_details, $gain, $probe_frequency, $device_maker, $model, $serial_no, $cable_type,
        $sensor_type, $ref_block_type, $material, $description_1, $description_2, $description_3, $description_of_inspection,
        $inspection_result, $reason, $project_no
    );

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>