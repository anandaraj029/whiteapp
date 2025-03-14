<?php
// Include the database connection file
include_once('../../file/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_all'])) {
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
    $report_date = $_POST['report_date'];
    $color_code = $_POST['color_code'];
    $applicable_standards = $_POST['applicable_standards'];
    $employer_address = $_POST['employer_address'];
    $premises_address = $_POST['premises_address'];
    $inspected_item_type = $_POST['inspected_item_type'];
    $identification_no = $_POST['identification_no'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $wll_swl = $_POST['wll_swl'];
    $last_exam_date = $_POST['last_exam_date'];
    $this_exam_date = $_POST['this_exam_date'];
    $next_exam_date = $_POST['next_exam_date'];
    $reason_for_exam = $_POST['reason_for_exam'];
    $details_of_test = $_POST['details_of_test'];
    $status = $_POST['status'];
    $safe_to_use = $_POST['safe_to_use'];
    $grease_condition = $_POST['grease_condition'];
    $last_aft = $_POST['last_aft'];
    $last_stbd = $_POST['last_stbd'];
    $last_forward = $_POST['last_forward'];
    $last_port_side = $_POST['last_port_side'];
    $actual_aft = $_POST['actual_aft'];
    $actual_stbd = $_POST['actual_stbd'];
    $actual_forward = $_POST['actual_forward'];
    $actual_port_side = $_POST['actual_port_side'];
    $permitted_aft = $_POST['permitted_aft'];
    $permitted_stbd = $_POST['permitted_stbd'];
    $permitted_forward = $_POST['permitted_forward'];
    $permitted_port_side = $_POST['permitted_port_side'];
    $result_aft = $_POST['result_aft'];
    $result_stbd = $_POST['result_stbd'];
    $result_forward = $_POST['result_forward'];
    $result_port_side = $_POST['result_port_side'];

    // Prepare the SQL statement
    $sql = "INSERT INTO rocking_test_certificate (
        inspection_date, certificate_no, report_no, jrn, project_no, companyName, reference_no, location, next_inspection_date,
        customer_name, customer_email, mobile, inspector, technical_manager, report_date, color_code, applicable_standards,
        employer_address, premises_address, inspected_item_type, identification_no, quantity, description, wll_swl, last_exam_date,
        this_exam_date, next_exam_date, reason_for_exam, details_of_test, status, safe_to_use, grease_condition, last_aft, last_stbd,
        last_forward, last_port_side, actual_aft, actual_stbd, actual_forward, actual_port_side, permitted_aft, permitted_stbd,
        permitted_forward, permitted_port_side, result_aft, result_stbd, result_forward, result_port_side
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssssssssssssssssssssssssssssssss",
        $inspection_date, $certificate_no, $report_no, $jrn, $project_no, $companyName, $reference_no, $location, $next_inspection_date,
        $customer_name, $customer_email, $mobile, $inspector, $technical_manager, $report_date, $color_code, $applicable_standards,
        $employer_address, $premises_address, $inspected_item_type, $identification_no, $quantity, $description, $wll_swl, $last_exam_date,
        $this_exam_date, $next_exam_date, $reason_for_exam, $details_of_test, $status, $safe_to_use, $grease_condition, $last_aft, $last_stbd,
        $last_forward, $last_port_side, $actual_aft, $actual_stbd, $actual_forward, $actual_port_side, $permitted_aft, $permitted_stbd,
        $permitted_forward, $permitted_port_side, $result_aft, $result_stbd, $result_forward, $result_port_side
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>