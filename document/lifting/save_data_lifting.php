<?php
include_once('../../file/config.php'); // include your database connection

if (isset($_POST['save_data_lifting'])) {
    // Retrieve form data
    $date_of_report = $_POST['date_of_report'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $color_code = $_POST['color_code'];
    $applicable_standards = $_POST['applicable_standards'];    
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $employer_name_address = $_POST['employer_name_address'];
    $identification_no = $_POST['identification_no'];
    $wll_swl = $_POST['wll_swl'];
    $qty = $_POST['qty'];
    $type = $_POST['type'];
    $date_last_examination = $_POST['date_last_examination'];
    $manufacturer = $_POST['manufacturer'];
    $size = $_POST['size'];
    $length = $_POST['length'];
    $color = $_POST['color'];
    $ply = $_POST['ply'];
    $address_of_premises = $_POST['address_of_premises'];
    $next_examination_date = $_POST['next_examination_date'];
    $reason_for_examination = $_POST['reason_for_examination'];
    $date_of_this_examination = $_POST['date_of_this_examination'];
    $test_details = $_POST['test_details'];
    $status = $_POST['status'];
    $safe_to_use = $_POST['safe_to_use'];
    $projectid = $_POST['projectid'];
    $companyName = $_POST['companyName'];

    // SQL query to insert data into the database (28 columns)
    $sql = "INSERT INTO lifting_gears_certificate (date_of_report, certificate_no, report_no, jrn, color_code, applicable_standards, customer_name, customer_email, mobile, inspector, employer_name_address, identification_no, wll_swl, qty, type, date_last_examination, manufacturer, size, length, color, ply, address_of_premises, next_examination_date, reason_for_examination, date_of_this_examination, test_details, status, safe_to_use, projectid, companyName) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssssssssssssssssssss',
        $date_of_report, $certificate_no, $report_no, $jrn, $color_code, $applicable_standards, $customer_name, $customer_email, $mobile, $inspector,
        $employer_name_address, $identification_no, $wll_swl, $qty, $type, $date_last_examination, $manufacturer, $size, $length, $color, $ply,
        $address_of_premises, $next_examination_date, $reason_for_examination, $date_of_this_examination, $test_details, $status, $safe_to_use, $projectid, $companyName);

    // Execute the statement
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
