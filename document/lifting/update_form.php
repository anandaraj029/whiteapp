<?php
// Enable output buffering to prevent any premature output
ob_start();
include_once('../../inc/function.php');
include_once('../../file/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_no = $_POST['project_no'];
    $inspector = $_POST['inspector'];
    $mobile = $_POST['mobile'];
    $color_code = implode(",", $_POST['color_code']);
    $applicable_standards = $_POST['applicable_standards'];
    $report_no = $_POST['report_no'];
    $date_of_report = $_POST['date_of_report'];
    $jrn = $_POST['jrn'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $technical_manager = $_POST['technical_manager'];

    $updateStaticQuery = "
        UPDATE lifting_gear_certificates 
        SET 
            inspector = ?, 
            mobile = ?, 
            color_code = ?, 
            applicable_standards = ?,
            report_no = ?,
            date_of_report = ?,
            jrn = ?,
            customer_name = ?,
            customer_email = ?,
            technical_manager = ?
        WHERE 
            project_no = ?
    ";
    
    $updateStaticStmt = $conn->prepare($updateStaticQuery);
    if (!$updateStaticStmt) {
        die("Update Query Error: " . $conn->error);
    }
    
    $updateStaticStmt->bind_param(
        "sssssssssss", 
        $inspector, $mobile, $color_code, $applicable_standards, 
        $report_no, $date_of_report, $jrn, 
        $customer_name, $customer_email, $technical_manager, 
        $project_no
    );

    if (!$updateStaticStmt->execute()) {
        die("Update Query Execution Failed: " . $updateStaticStmt->error);
    }

    if (isset($_POST['certificate_no'])) {
        $certificateNos = $_POST['certificate_no'];
        $employerNameAddresses = $_POST['employer_name_address'];
        $manufacturers = $_POST['manufacturer'];
        $identification_nos = $_POST['identification_no'];
        $wll_swls = $_POST['wll_swl'];
        $qtys = $_POST['qty'];
        $types = $_POST['type'];
        $date_last_examinations = $_POST['date_last_examination'];
        $sizes = $_POST['size'];
        $lengths = $_POST['length'];
        $colors = $_POST['color'];
        $plys = $_POST['ply'];
        $address_of_premisess = $_POST['address_of_premises'];
        $next_examination_dates = $_POST['next_examination_date'];
        $reason_for_examinations = $_POST['reason_for_examination'];
        $date_of_this_examinations = $_POST['date_of_this_examination'];
        $test_detailss = $_POST['test_details'];
        $statuss = $_POST['status'];
        $safe_to_uses = $_POST['safe_to_use'];

        // Delete existing records
        $deleteQuery = "DELETE FROM lifting_gear_certificates WHERE project_no = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        if (!$deleteStmt) {
            die("Delete Query Error: " . $conn->error);
        }
        $deleteStmt->bind_param("s", $project_no);
        if (!$deleteStmt->execute()) {
            die("Delete Query Execution Failed: " . $deleteStmt->error);
        }

        // Insert new records
        $insertQuery = "
            INSERT INTO lifting_gear_certificates 
                (project_no, certificate_no, employer_name_address, manufacturer, identification_no, wll_swl, qty, type, date_last_examination, size, length, color, ply, address_of_premises, next_examination_date, reason_for_examination, date_of_this_examination, test_details, status, safe_to_use,
                inspector, mobile, color_code, applicable_standards, report_no, date_of_report, jrn, customer_name, customer_email, technical_manager)
            VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $insertStmt = $conn->prepare($insertQuery);
        if (!$insertStmt) {
            die("Insert Query Error: " . $conn->error);
        }

        foreach ($certificateNos as $index => $certificateNo) {
            $insertStmt->bind_param(
                "ssssssssssssssssssssssssssssss",
                $project_no,
                $certificateNo,
                $employerNameAddresses[$index],
                $manufacturers[$index],
                $identification_nos[$index],
                $wll_swls[$index],
                $qtys[$index],
                $types[$index],
                $date_last_examinations[$index],
                $sizes[$index],
                $lengths[$index],
                $colors[$index],
                $plys[$index],
                $address_of_premisess[$index],
                $next_examination_dates[$index],
                $reason_for_examinations[$index],
                $date_of_this_examinations[$index],
                $test_detailss[$index],
                $statuss[$index],
                $safe_to_uses[$index],
                $inspector,
                $mobile,
                $color_code,
                $applicable_standards,
                $report_no,
                $date_of_report,
                $jrn,
                $customer_name,
                $customer_email,
                $technical_manager
            );

            if (!$insertStmt->execute()) {
                die("Insert Query Execution Failed: " . $insertStmt->error);
            }
        }
    }

    // Close connection before redirecting
    $conn->close();

    // Redirect to index.php
    header("Location: index.php");
    exit();
} else {
    echo "Invalid request method.";
}

// Close the output buffer and flush it
ob_end_flush();
?>