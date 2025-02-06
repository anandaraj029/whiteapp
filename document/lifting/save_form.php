<?php
// include_once('../../file/config.php');  // Database connection

if (isset($_POST['save_data_lifting'])) {
    // Database connection
    include_once('../../file/config.php');  // Database connection

    // Loop through the dynamic fields
    $date_of_report = $_POST['date_of_report'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $color_code = $_POST['color_code'];
    $applicable_standards = $_POST['applicable_standards'];
    $project_no = $_POST['project_no'];
    $companyName = $_POST['companyName'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $created_at = date('Y-m-d H:i:s');

    // Handle dynamic fields
    $certificate_no = $_POST['certificate_no'];
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

    // Flag to check if any insert was successful
    $insert_successful = false;

    foreach ($certificate_no as $index => $cert_no) {
        // Prepare SQL to insert data
        $sql = "INSERT INTO lifting_gear_certificates (
            date_of_report,
            certificate_no,
            report_no,
            jrn,
            color_code,
            applicable_standards,
            project_no,
            companyName,
            customer_name,
            customer_email,
            mobile,
            inspector,
            created_at,
            employer_name_address,
            identification_no,
            wll_swl,
            qty,
            type,
            date_last_examination,
            manufacturer,
            size,
            length,
            color,
            ply,
            address_of_premises,
            next_examination_date,
            reason_for_examination,
            date_of_this_examination,
            test_details,
            status,
            safe_to_use
        ) VALUES (
            '$date_of_report',
            '$cert_no',
            '$report_no',
            '$jrn',
            '$color_code',
            '$applicable_standards',
            '$project_no',
            '$companyName',
            '$customer_name',
            '$customer_email',
            '$mobile',
            '$inspector',
            '$created_at',            
            '{$employer_name_address[$index]}',
            '{$identification_no[$index]}',
            '{$wll_swl[$index]}',
            '{$qty[$index]}',
            '{$type[$index]}',
            '{$date_last_examination[$index]}',
            '{$manufacturer[$index]}',
            '{$size[$index]}',
            '{$length[$index]}',
            '{$color[$index]}',
            '{$ply[$index]}',
            '{$address_of_premises[$index]}',
            '{$next_examination_date[$index]}',
            '{$reason_for_examination[$index]}',
            '{$date_of_this_examination[$index]}',
            '{$test_details[$index]}',
            '{$status[$index]}',
            '{$safe_to_use[$index]}'
        )";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "Record for Certificate No: $cert_no saved successfully!<br>";
            $insert_successful = true;  // Mark as successful if at least one record is saved
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // If insertion was successful, update the project status
    if ($insert_successful) {
        // $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = '$project_no'";
        $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created', project_status = 'Completed' WHERE project_no = '$project_no'";

        if (mysqli_query($conn, $update_query)) {
            echo "Project status updated to 'Certificate Created'.<br>";
        } else {
            echo "Error updating project status: " . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
