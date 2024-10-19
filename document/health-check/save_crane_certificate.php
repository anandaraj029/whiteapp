<?php
include_once('../../file/config.php');  // Include your database connection file

if (isset($_POST['save_all'])) {
    // Retrieve form data
    $inspection_date = $_POST['inspection_date'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $projectid = $_POST['projectid'];
    $companyName = $_POST['companyName'];    
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $vessel_name_location = $_POST['vessel_name_location'];
    $manufacturer = $_POST['manufacturer'];
    $crane_type = $_POST['crane_type'];
    $asset_number = $_POST['asset_number'];
    $serial_number = $_POST['serial_number'];
    $model = $_POST['model'];
    $manufacturing_year = $_POST['manufacturing_year'];
    $address = $_POST['address'];
    $capacity_swl = $_POST['capacity_swl'];
    $previous_test_date = $_POST['previous_test_date'];
    // General Information B
    $crane_structure_condition = $_POST['crane_structure_condition'];
    $swinging_slewing_function = $_POST['swinging_slewing_function'];
    $hydraulic_pneumatic_system = $_POST['hydraulic_pneumatic_system'];
    $wire_ropes_condition = $_POST['wire_ropes_condition'];
    $boom_lifting_extending_retracting = $_POST['boom_lifting_extending_retracting'];
    $emergency_boom_lowering = $_POST['emergency_boom_lowering'];
    $auto_moment_limiter = $_POST['auto_moment_limiter'];
    $anti_two_block = $_POST['anti_two_block'];
    $winch_drum_lock_pawls = $_POST['winch_drum_lock_pawls'];
    $hook_block_assembly = $_POST['hook_block_assembly'];
    $boom_angle_indicator = $_POST['boom_angle_indicator'];
    $emergency_shutdown = $_POST['emergency_shutdown'];

    // Insert into the database
    $query = "INSERT INTO crane_health_check_certificate (
        inspection_date, certificate_no, report_no, jrn, projectid, companyName, customer_name, customer_email, mobile, inspector, vessel_name_location, manufacturer, crane_type, asset_number, serial_number, model, manufacturing_year, address, capacity_swl, previous_test_date, crane_structure_condition, swinging_slewing_function, hydraulic_pneumatic_system, wire_ropes_condition, boom_lifting_extending_retracting, emergency_boom_lowering, auto_moment_limiter, anti_two_block, winch_drum_lock_pawls, hook_block_assembly, boom_angle_indicator, emergency_shutdown
    ) VALUES (
        '$inspection_date', '$certificate_no', '$report_no', '$jrn', '$projectid', '$companyName', '$customer_name', '$customer_email', '$mobile', '$inspector', '$vessel_name_location', '$manufacturer', '$crane_type', '$asset_number', '$serial_number', '$model', '$manufacturing_year', '$address', '$capacity_swl', '$previous_test_date', '$crane_structure_condition', '$swinging_slewing_function', '$hydraulic_pneumatic_system', '$wire_ropes_condition', '$boom_lifting_extending_retracting', '$emergency_boom_lowering', '$auto_moment_limiter', '$anti_two_block', '$winch_drum_lock_pawls', '$hook_block_assembly', '$boom_angle_indicator', '$emergency_shutdown'
    )";

    if (mysqli_query($conn, $query)) {
        $msg = "Health check created successfully";
                header('Location: index.php?msg=' . $msg); 
        // echo "Form details saved successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
