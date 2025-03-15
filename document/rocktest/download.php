<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // Include your database configuration file

// Check if project_no is provided in the query string
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Fetch data from the database
    $sql = "SELECT * FROM rocking_test_certificate WHERE project_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the data as an associative array
    } else {
        die("No record found for project number: $project_no");
    }

    $stmt->close();
} else {
    die("Project number not provided.");
}

// Assign fetched data to variables
$certificate_no = $row['certificate_no'];
$report_no = $row['report_no'];
$jrn = $row['jrn'];
$date_of_report = $row['report_date'];
$employer_name_address = $row['employer_address'];
$premises_address = $row['premises_address'];
$applicable_standards = $row['applicable_standards'];
$inspected_item_type = $row['inspected_item_type'];
$identification_no = $row['identification_no'];
$quantity = $row['quantity'];
$description = $row['description'];
$wll_swl = $row['wll_swl'];
$last_examination_date = $row['last_exam_date'];
$this_examination_date = $row['this_exam_date'];
$next_examination_date = $row['next_exam_date'];
$reason_for_examination = $row['reason_for_exam'];
$details_of_test = $row['details_of_test'];
$status = $row['status'];
$safe_to_use = $row['safe_to_use'];
$grease_condition = $row['grease_condition'];
// $test_positions_aft = $row['test_positions_aft'];
// $test_positions_stbd = $row['test_positions_stbd'];
// $test_positions_forward = $row['test_positions_forward'];
// $test_positions_port_side = $row['test_positions_port_side'];
$last_aft = $row['last_aft'];
$last_stbd = $row['last_stbd'];
$last_forward = $row['last_forward'];
$last_port_side = $row['last_port_side'];
$actual_aft = $row['actual_aft'];
$actual_stbd = $row['actual_stbd'];
$actual_forward = $row['actual_forward'];
$actual_port_side = $row['actual_port_side'];
$permitted_aft = $row['permitted_aft'];
$permitted_stbd = $row['permitted_stbd'];
$permitted_forward = $row['permitted_forward'];
$permitted_port_side = $row['permitted_port_side'];
$result_ok_defect_sgocc_aft = $row['result_aft'];
$result_ok_defect_sgocc_stbd = $row['result_stbd'];
$result_ok_defect_sgocc_forward = $row['result_forward'];
$result_ok_defect_sgocc_port_side = $row['result_port_side'];
$inspector_name = $row['inspector_name'];
$authenticating_person_name = $row['authenticating_person_name'];

// Define the paths to the signature images
$inspector_signature_path = "uploads/{$inspector_name}.png";
$authenticating_signature_path = "uploads/{$authenticating_person_name}.png";

// Check if the signature images exist
$inspector_signature_img = file_exists($inspector_signature_path) ? "<img src='$inspector_signature_path' height='33px' alt='Inspector Signature'>" : "No Signature";
$authenticating_signature_img = file_exists($authenticating_signature_path) ? "<img src='$authenticating_signature_path' height='33px' alt='Authenticating Person Signature'>" : "No Signature";

// Create an instance of the mPDF class with landscape orientation and minimal margins
$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocking Test Certificate</title>
    <style>
        .certificate-title {
            text-align: center;
            margin: 12px;
        }
        p {
            font-size: 12px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 10px;
            line-height: 1.4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 10px;
        }
        h1, h3 {
            text-align: center;
            font-size: 12px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
            margin-top: 2px;
        }
        th, td {
            padding: 5px;
            border: 1px solid #000;
            text-align: left;
            font-size: 10px;
        }
        .section-title {
            background-color: #bfdaef;
            font-weight: bold;
            font-size: 11px;
            text-align: center;
        }
        .header, .footer {
            text-align: center;
        }
        .header img, .footer img {
            max-width: 100%;
        }
        .sign {
            width: 80px;
            height: 40px;
        }
        .seal {
            width: 40px;
            height: 40px;
        }
        .qrcode {
            width: 70px;
            height: 70px;
            float: right;
            margin-top: 0;
        }
        .leea {
            width: 69px;
            height: 58px;
            float: left;
            margin-top: 0;
        }

        @media (max-width: 600px) {
            table {
                font-size: 8px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="../head.jpg" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">

    <div class="text-center">
        <h3 class="certificate-title"><strong> <br />
            FRM.0705 (rev.00) Rocking Test (Certificate of Thorough Examination)
        </strong></h3>
    </div>
    <h1></h1>
    <table style="margin-top: 38px;">
        <tr>
            <td colspan="7" style="border-top: none; border-left: none;"> </td>
            <td colspan="7">Job. Ref. No.: <strong>$jrn</strong></td></td>
            <td colspan="5">Certificate No.: <strong>$certificate_no</strong></td>
        </tr>
        <tr>
            <td colspan="3">Report No.: <strong>$report_no</strong></td>
            <td colspan="4">Date of Report: <strong>$date_of_report</strong></td>
            <td colspan="7">Color Code (if required): <em><strong>N/A</strong></em></td>
            <td colspan="5">Applicable Standard(s): <strong>$applicable_standards</strong> </td>
        </tr>
        <tr>
            <td colspan="7">Name &amp; Address of the employer for whom the examination was made: <strong>$employer_name_address</strong></td>
            <td colspan="7">Address of the premises at which the examination was made: <strong>$premises_address</strong></td>
            <td colspan="5">
                Status:<br>
                <b>ND</b>-No Defect<br>
                <b>SDR</b>-See Defect Report<br>
                <b>NF</b>- Not Found
            </td>
        </tr>
        <tr>
            <td colspan="19"><strong>INSPECTED ITEM TYPE: <strong>$inspected_item_type</strong></td>
        </tr>
        <tr class="section-title">
            <td style="text-align: center;"><strong>Identification No./Serial No.</strong></td>
            <td style="text-align: center;"><strong>QTY.</strong></td>
            <td colspan="3" style="text-align: center;"><strong>Description</strong></td>
            <td style="text-align: center;"><p><strong>WLL</strong></p><p><strong>or</strong></p><p><strong>SWL</strong></p></td>
            <td style="text-align: center;"><strong>Date of Last Examination</strong></td>
            <td colspan="2" style="text-align: center;"><strong>Date of this Examination</strong></td>
            <td colspan="3" style="text-align: center;"><strong>Latest date of the next examination</strong></td>
            <td colspan="2" style="text-align: center;"><strong>Reason for Examination (See Below)</strong></td>
            <td style="text-align: center;"><strong>Details of test</strong></td>
            <td style="text-align: center;"><strong>Status (See Above)</strong></td>
            <td style="text-align: center;"><strong>Safe to Use (Yes or No)</strong></td>
        </tr>
        <tr style="height: 100px;">
            <td style="text-align: center;"><strong>$identification_no</strong></td>
            <td style="text-align: center;"><strong>$quantity</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$description</strong></td>
            <td style="text-align: center;"><strong>$wll_swl</strong></td>
            <td style="text-align: center;"><strong>$last_examination_date</strong></td>
            <td colspan="2" style="text-align: center;"><strong>$this_examination_date</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$next_examination_date</strong></td>
            <td colspan="2" style="text-align: center;"><strong>$reason_for_examination</strong></td>
            <td style="text-align: center;"><strong>$details_of_test</strong></td>
            <td style="text-align: center;"><strong>$status</strong></td>
            <td style="text-align: center;"><strong>$safe_to_use</strong></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">Grease Sample Condition After Analyzing: <strong>$grease_condition</strong></td>
            <td colspan="12" style="text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">Test Positions</td>
            <td colspan="3" style="text-align: center;"><strong>AFT</strong></td>
            <td colspan="3" style="text-align: center;"><strong>STBD</strong></td>
            <td colspan="3" style="text-align: center;"><strong>FORWARD</strong></td>
            <td colspan="3" style="text-align: center;"><strong>PORT SIDE</strong></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">Last Measured Limits to be compared</td>
            <td colspan="3" style="text-align: center;"><strong>$last_aft</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$last_stbd</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$last_forward</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$last_port_side</strong></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Actual Deviation Measured by Dial Gauge Readings</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$actual_aft</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$actual_stbd</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$actual_forward</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$actual_port_side</strong></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Permitted Limits to be Compared</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$permitted_aft</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$permitted_stbd</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$permitted_forward</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$permitted_port_side</strong></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Result/OK or Defect of SGOCC</strong><br>
            <strong>Required actions for each result is cleared below</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$result_aft</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$result_stbd</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$result_forward</strong></td>
            <td colspan="3" style="text-align: center;"><strong>$result_port_side</strong></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;"><strong>OK: ACCEPTED</strong></td>
            <td colspan="6" style="text-align: center;"><strong>DEFECT: REJECTED &amp; NEEDS REPLACEMENT</strong></td>
            <td colspan="8" style="text-align: center;"><strong>SGOCC: SHORTENING GEAR OIL (LUBRICATION) CHARGING CYCLE</strong></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">Reason for Examination</td>
            <td colspan="3" style="text-align: center;">3 Monthly: <strong>A</strong></td>
            <td colspan="3" style="text-align: center;">6 Monthly: <strong>B</strong></td>
            <td colspan="5" style="text-align: center;">12 Monthly: <strong>C</strong></td>
            <td style="text-align: center;">Written Scheme: <strong>D</strong></td>
            <td colspan="3" style="text-align: center;">Exceptional Circumstance: <strong>E</strong></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center;"><p><strong>Name &amp; Qualification of the person making the report: <strong>$inspector_name</strong></strong></p>
            <p style="text-align: left; font-size: 9px;"><strong>Signature:</strong>
            $inspector_signature_img
            </p>
            </td>
            <td colspan="9" style="text-align: center;"><p><strong>Name of the person authenticating of this report: <strong>$authenticating_person_name</strong></strong></p>
            <p style="text-align: left; font-size: 9px;"><strong>Signature:</strong>
            $authenticating_signature_img
            </p></td>
        </tr>
    </table>

    <div class="footer">
        <img src="../foot.jpg" alt="Footer Image">
    </div>
</div>
</body>
</html>
HTML;

// Add the HTML content to the PDF
$mpdf->WriteHTML($html);

// Add watermark image
$mpdf->SetWatermarkImage('../logo.png', 0.3, '', [70, 100]);
$mpdf->showWatermarkImage = true;

// Output the PDF to the browser for download
$mpdf->Output('rocking_test_certificate.pdf', 'D');

$conn->close();
?>