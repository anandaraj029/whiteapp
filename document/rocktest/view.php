<?php
include_once('../../file/config.php'); // Include your database configuration file


// Check if certificate_no is provided in the query string
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
    $conn->close();
} else {
    die("Project number not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocking Test</title>
    <!-- <style>
        .certificate-title {
            text-align: center;
            margin: 8px;
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
            padding: 2px;
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
    </style> -->


<link rel="stylesheet" href="../style.css" type="text/css"> 
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
            <td colspan="7">Job. Ref. No.: <strong><?php echo $row['jrn']; ?></strong></td>
            <td colspan="5">Certificate No.: <strong><?php echo $row['certificate_no']; ?></strong></td>
        </tr>
        <tr>
            <td colspan="3">Report No. <?php echo $row['report_no']; ?></td>
            <td colspan="4">Date of Report: <strong><?php echo $row['report_date']; ?></strong></td>
            <td colspan="7">Color Code (if required): <em><strong><?php echo $row['color_code']; ?></strong></em></td>
            <td colspan="5">Applicable Standard(s): <?php echo $row['applicable_standards']; ?></td>
        </tr>
        <tr>
            <td colspan="7">Name &amp; Address of the employer for whom the examination was made: <?php echo $row['employer_address']; ?></td>
            <td colspan="7">Address of the premises at which the examination was made: <?php echo $row['premises_address']; ?></td>
            <td colspan="5">
                Status:<br>
                <b>ND</b>-No Defect<br>
                <b>SDR</b>-See Defect Report<br>
                <b>NF</b>- Not Found
            </td>
        </tr>
        <tr>
            <td colspan="19"><strong>INSPECTED ITEM TYPE: <?php echo $row['inspected_item_type']; ?></strong></td>
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
            <td style="text-align: center;"><em><strong><?php echo $row['identification_no']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['quantity']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['description']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['wll_swl']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['last_exam_date']; ?></strong></em></td>
            <td colspan="2" style="text-align: center;"><em><strong><?php echo $row['this_exam_date']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['next_exam_date']; ?></strong></em></td>
            <td colspan="2" style="text-align: center;"><em><strong><?php echo $row['reason_for_exam']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['details_of_test']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['status']; ?></strong></em></td>
            <td style="text-align: center;"><em><strong><?php echo $row['safe_to_use']; ?></strong></em></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">Grease Sample Condition After Analyzing: <?php echo $row['grease_condition']; ?></td>
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
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['last_aft']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['last_stbd']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['last_forward']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['last_port_side']; ?></strong></em></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Actual Deviation Measured by Dial Gauge Readings</strong></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['actual_aft']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['actual_stbd']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['actual_forward']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['actual_port_side']; ?></strong></em></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Permitted Limits to be Compared</strong></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['permitted_aft']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['permitted_stbd']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['permitted_forward']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['permitted_port_side']; ?></strong></em></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;"><strong>Result/OK or Defect of SGOCC</strong><br>
                <strong>Required actions for each result is cleared below</strong></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['result_aft']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['result_stbd']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['result_forward']; ?></strong></em></td>
            <td colspan="3" style="text-align: center;"><em><strong><?php echo $row['result_port_side']; ?></strong></em></td>
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
            <td colspan="8" style="text-align: center;"><p><strong>Name &amp; Qualification of the person making the report: <?php echo $row['inspector']; ?></strong></p>
                <p style="text-align: left; font-size: 9px;"><strong>Signature:</strong>
                    <img src="../../inspector/uploads/<?php echo $row['inspector']; ?>/images/signature_image.jpg" height="33px">
                </p>
            </td>
            <td colspan="9" style="text-align: center;"><p><strong>Name of the person authenticating of this report: <?php echo $row['technical_manager']; ?></strong></p>
                <p style="text-align: left; font-size: 9px;"><strong>Signature:</strong>
                    <img src="../uploads/<?php echo $row['technical_manager']; ?>.png" height="33px">
                </p></td>
        </tr>
    </table>

    <div class="footer">
        <img src="../foot.jpg" alt="Footer Image">
    </div>
</div>

<div class="text-center">
    <a href="download.php?project_no=<?php echo $row['project_no']; ?>" >
        <button>Download</button>
    </a>
</div>
</body>
</html>