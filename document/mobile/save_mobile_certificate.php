<?php
// Include your database connection file
include_once('../../file/config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $examination_date = $_POST['examination_date'];
    $report_date = $_POST['report_date'];
    $report_no = $_POST['report_no'];
    $sticker_no = $_POST['sticker_no'];
    $project_no = $_POST['project_no'];
    $company_name = $_POST['company_name'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobile = $_POST['customer_mobile'];
    $inspector_name = $_POST['inspector_name'];
    $technical_manager = $_POST['technical_manager'];
    $employer_address = $_POST['employer_address'];
    $equipment_description = $_POST['equipment_description'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $equipment_id = $_POST['equipment_id'];
    $equipment_serial_no = $_POST['equipment_serial_no'];
    $main_hook_block_swl = $_POST['main_hook_block_swl'];
    $serial_numbers = $_POST['serial_numbers'];
    $rope_dia = $_POST['rope_dia'];
    $falls = $_POST['falls'];
    $certificate_no = $_POST['certificate_no'];
    $jrn = $_POST['jrn'];
    $premises_address = $_POST['premises_address'];
    $safe_working_load = $_POST['safe_working_load'];
    $manufacture_date = $_POST['manufacture_date'];
    $last_exam_date = $_POST['last_exam_date'];
    $first_examination = $_POST['first_examination'];
    $installed_correctly = $_POST['installed_correctly'];
    $interval_6_months = $_POST['interval_6_months'];
    $interval_12_months = $_POST['interval_12_months'];
    $examination_scheme = $_POST['examination_scheme'];
    $exceptional_circumstances = $_POST['exceptional_circumstances'];
    $identification_any_part = $_POST['identification_any_part'];
    $defect = $_POST['defect'];
    $date_defect = $_POST['date_defect'];
    $repair_details = $_POST['repair_details'];
    $test_particulars = $_POST['test_particulars'];
    $equipment_fit = $_POST['equipment_fit'];
    $name_qualifications_person = $_POST['name_qualifications_person'];
    $report_making_person_qualifications = $_POST['report_making_person_qualifications'];
    $authenticating_person_name = $_POST['authenticating_person_name'];
    $latest_date_exam = $_POST['latest_date_exam'];
    $name_address_of_employer = $_POST['name_address_of_employer'];
    $boom_length = $_POST['boom_length'];
    $boom_angle = $_POST['boom_angle'];
    $swl_test_weight = $_POST['swl_test_weight'];
    $radius = $_POST['radius'];
    $comments = $_POST['comments'];
    $boom_lifting = $_POST['boom_lifting'];
    $m_winch_hoist = $_POST['m_winch_hoist'];
    $aux_winch_hoist = $_POST['aux_winch_hoist'];
    $boom_extending = $_POST['boom_extending'];
    $outriggers = $_POST['outriggers'];
    $swings_slew = $_POST['swings_slew'];
    $hydraulic_system = $_POST['hydraulic_system'];
    $auto_moment_limiter = $_POST['auto_moment_limiter'];
    $swing_winch_brake = $_POST['swing_winch_brake'];
    $winch_drum_lock = $_POST['winch_drum_lock'];
    $leveling_device = $_POST['leveling_device'];
    $hook_block_assembly = $_POST['hook_block_assembly'];
    $boom_angle_indicator = $_POST['boom_angle_indicator'];
    $wind_speed_indicator = $_POST['wind_speed_indicator'];
    $created_at = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $sql = "INSERT INTO mobile_crane_loadtest (
                examination_date, report_date, report_no, sticker_no, project_no, company_name, customer_name, customer_email, customer_mobile, inspector_name, technical_manager, 
                employer_address, equipment_description, manufacturer, model, 
                equipment_id, equipment_serial_no, main_hook_block_swl, serial_numbers, rope_dia, falls, certificate_no, jrn, 
                premises_address, safe_working_load, manufacture_date, last_exam_date, 
                first_examination, installed_correctly, interval_6_months, interval_12_months, examination_scheme, exceptional_circumstances, identification_any_part, defect, date_defect, repair_details, test_particulars, equipment_fit, name_qualifications_person, report_making_person_qualifications, authenticating_person_name, latest_date_exam, name_address_of_employer, boom_length, boom_angle, swl_test_weight, radius, comments, boom_lifting, m_winch_hoist, aux_winch_hoist, boom_extending, outriggers, swings_slew, hydraulic_system, auto_moment_limiter, swing_winch_brake, winch_drum_lock, leveling_device, hook_block_assembly, boom_angle_indicator, wind_speed_indicator, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 
        $examination_date, $report_date, $report_no, $sticker_no, $project_no, $company_name,
        $customer_name, $customer_email, $customer_mobile, $inspector_name, $technical_manager,
        $employer_address, $equipment_description, $manufacturer, $model,
        $equipment_id, $equipment_serial_no, $main_hook_block_swl, $serial_numbers, $rope_dia, $falls, $certificate_no, $jrn,
        $premises_address, $safe_working_load, $manufacture_date, $last_exam_date,
        $first_examination, $installed_correctly, $interval_6_months, $interval_12_months, $examination_scheme, $exceptional_circumstances, $identification_any_part, $defect, $date_defect, $repair_details, $test_particulars, $equipment_fit, $name_qualifications_person, $report_making_person_qualifications, $authenticating_person_name, $latest_date_exam, $name_address_of_employer, $boom_length, $boom_angle, $swl_test_weight, $radius, $comments, $boom_lifting, $m_winch_hoist, $aux_winch_hoist, $boom_extending, $outriggers, $swings_slew, $hydraulic_system, $auto_moment_limiter, $swing_winch_brake, $winch_drum_lock, $leveling_device, $hook_block_assembly, $boom_angle_indicator, $wind_speed_indicator, $created_at
    );

    // Execute the query
    if ($stmt->execute()) {
        // Update project status
        $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = ?";
        // $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created', project_status = 'Completed' WHERE project_no = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('s', $project_no);

        if ($update_stmt->execute()) {
            $msg = "Mobile Crane created successfully, and project status updated.";
            header('Location: index.php?msg=' . $msg);
        } else {
            echo "Error updating project status: " . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
