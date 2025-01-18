<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // Database connection file

if (!isset($_GET['project_id'])) {
    die("Project ID not provided!");
}

$project_id = $_GET['project_id'];

// Prepare and execute the main query for report details
$query = "SELECT * FROM reports WHERE project_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $project_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No record found for the provided project ID!");
}

$row = $result->fetch_assoc();
$deficiencies = json_decode($row['deficiencies'], true);
$inspection_status = $row['inspection_status'];  // Fetching the inspection status

// Fetch the client name
$query_client = "SELECT client_name FROM checklist_results WHERE project_id = ?";
$stmt_client = $conn->prepare($query_client);
$stmt_client->bind_param("s", $project_id);
$stmt_client->execute();
$result_client = $stmt_client->get_result();

$client_name = $result_client->num_rows > 0 ? $result_client->fetch_assoc()['client_name'] : "No client found for this project ID";

// Start capturing the HTML output
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspection Report</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .inspection-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .inspection-table th, .inspection-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .inspection-table th {
            background-color: #007bff;
            color: white;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>
<div class="header">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 20%; text-align: left;">
                    <img src="../checklist/logo.png" height="100px" alt="TUV Rheinland Logo">
                </td>
                <td style="width: 60%; text-align: center;">
                    <h1 style="font-size: 18px; margin: 0;">Crane Inspection & Maintenance Services</h1>
                    <p style="font-size: 12px; margin: 5px 0;">
                        <b>P.O.BOX 74007, AL- Khobar 31952, Saudi Arabia</b><br>
                        <b>TEL.: 013 814 6861 - 013 814 6862 Ext.109 - Fax: 013 814 6863</b><br>
                        <b>Email: office@cims.com.sa - info@cims.com.sa</b>
                    </p>
                    <h3 style="font-size: 18px; margin-top: 15px;">Heavy Equipment & Elevating / Lifting Equipment Inspection Report</h3>
                </td>
                <td style="width: 20%; text-align: right;">
                    <img src="../../document/code.png" height="100px" alt="QR Code">
                </td>
            </tr>
        </table>
    </div>

    <table class="inspection-table">
        <thead>
            <tr>
                <th>Client Company / Name & Address:</th>
                <th>Manufacturer:</th>
                <th>Equipment Identification Number:</th>
                <th>Date of Inspection:</th>
                <th>Model:</th>
                <th>Equipment Serial Number :</th>
                <th>Next Inspection Due Date :</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>FA-17009</td>
                <td>Konecranes</td>
                <td>Juyamah NSL-MSU</td>
                <td>Overhead Crane</td>
                <td>Pass</td>
                <td>10 T</td>
                <td>10 T</td>
            </tr>
        </tbody>
        <thead>
            <tr>               
                <th>Type:</th>
                <th>Location:</th>                
                <th>Inspection Status:</th>
                <th>Previous Sticker S.No.:</th>
                <th>Issued by:</th>
                <th>Capacity:</th>
                <th>Sticker Number Issued:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>FA-17009</td>
                <td>Konecranes</td>
                <td>Juyamah NSL-MSU</td>
                <td>Overhead Crane</td>
                <td>Pass</td>
                <td>10 T</td>
                <td>10 T</td>
            </tr>
        </tbody>
    </table>

    <p>
    Above Equipment was visually inspected in accordance with local and international standards. Deficiencies that require corrective actions are listed
below. Specific repairs to correct each deficiency should be noted in the right column.
    </p>

    <!-- <h3>Deficiencies</h3> -->
    <table class="inspection-table" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <!-- <th style="padding: 15px; line-height: 1.5;">#</th> -->
            <th style="width: 65%; padding: 15px">Deficiency</th>
            <th style="width: 30%; padding: 15px">Corrective Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- <td style="padding: 15px; line-height: 1.5;">1</td> -->
            <td style="padding: 5px; height: 100px;">
            Developing writers can often benefit from examining an essay, a paragraph, or even a sentence to determine what makes it effective. On the following pages are several paragraphs for you to evaluate on your own, along with the Writing Center's explanation. Note: These passages are excerpted from actual student papers and retain the original wording. Some of the sentences are imperfect, but we have chosen these passages to highlight areas in which the author was successful. Developing writers can often benefit from examining an essay, a paragraph, or even a sentence to determine what makes it effective. On the following pages are several paragraphs for you to evaluate on your own, along with the Writing Center's explanation. Note: These passages are excerpted from actual student papers and retain the original wording. Some of the sentences are imperfect, but we have chosen these passages to highlight areas in which the author was successful. Developing writers can often benefit from examining an essay, a paragraph, or even a sentence to determine what makes it effective. On the following pages are several paragraphs for you to evaluate on your own, along with the Writing Center's explanation. Note: These passages are excerpted from actual student papers and retain the original wording. Some of the sentences are imperfect, but we have chosen these passages to highlight areas in which the author was successful.
</td>
<td style="padding: 15px; height: 100px;">
                Tighten all bolts</td>
        </tr>
        <!-- <tr>
            <td style="padding: 15px; line-height: 1.5;">2</td>
            <td style="padding: 15px; line-height: 1.5;">Wear on lifting cable</td>
            <td style="padding: 15px; line-height: 1.5;">Replace cable</td>
        </tr> -->
    </tbody>
</table>


    <div class="row">
        <div class="col-md-12">
            <table class="inspection-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Report Receiver's Name & Signature</th>
                        <th>Contact Tel. / Mobile Number</th>
                        <th>Inspector Name & Signature</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="../../document/uploads/37.png" alt="" height="20px">
                            <?php echo htmlspecialchars($client_name); ?>
                        </td>
                        <td>
                            <img src="../../document/uploads/37.png" alt="" height="20px">
                            Sathish Kumar
                        </td>                          
                        <td>
                            <img src="../../document/uploads/37.png" alt="" height="20px">
                            Sathish Kumar
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Generated by TUV Rheinland Arabia LLC</p>
    </div>    
</body>
</html>



<?php
$html = ob_get_clean();

// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Write HTML content to the PDF
$mpdf->WriteHTML($html);
// Output as a PDF
$mpdf->Output('inspection_report.pdf', 'D'); // Download the PDF
?>
