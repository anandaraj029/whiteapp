<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // Include your database configuration file

// Check if certificate_no is provided in the query string
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Fetch data from the database
    $sql = "SELECT * FROM liquid_penetrant_inspection WHERE project_no = ?";
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
$reference_no = $row['reference_no'];
$customer_name = $row['customer_name'];
$location = $row['location'];
$inspection_date = $row['inspection_date'];
$next_inspection_date = $row['next_inspection_date'];
$standard = $row['standard'];
$material = $row['material'];
$surface_temperature = $row['surface_temperature'];
$technique_procedure = $row['technique_procedure'];
$brand = $row['brand'];
$penetrant = $row['penetrant'];
$penetrant_apply = $row['penetrant_apply'];
$dwell_time = $row['dwell_time'];
$cleaner = $row['cleaner'];
$remove_apply = $row['remove_apply'];
$developer = $row['developer'];
$developer_apply = $row['developer_apply'];
$developing_time = $row['developing_time'];
$description = $row['description'];
$item_checked = $row['item_checked'];
$results = $row['results'];
$condition_new = $row['condition_new'];
$description_1 = $row['description_1'];
$description_2 = $row['description_2'];
$description_3 = $row['description_3'];
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
    <title>Liquid Penetrant Inspection Certificate</title>
    <style>
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
            margin-bottom: 7px;            
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
            <h3 class="certificate-title"><strong> <br /> LIQUID PENETRANT INSPECTION CERTIFICATE</strong></h3>
        </div>
        <h1></h1>
        <table style="margin-top: 38px;">
            <tr>
                <td class="text-center section-title" style="width: 25%;">CERTIFICATE NO.</td>
                <td style="text-align: center; width: 25%;"><strong>$certificate_no</strong></td>
                <td class="text-center section-title" style="width: 25%;">REFERENCE NO.</td>
                <td style="text-align: center; width: 25%;"><strong>$reference_no</strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center;">CUSTOMER NAME</td>
                <td colspan="3" style="text-align: center;"><strong>$customer_name</strong></td>
            </tr>
            <tr>
                <td class="text-center section-title">SITE/LOCATION</td>
                <td style="text-align: center;" colspan="3"><strong>$location</strong></td>
            </tr>
            <tr>
                <td class="text-center section-title">INSPECTION DATE</td>
                <td style="text-align: center;"><strong>$inspection_date</strong></td>
                <td class="text-center section-title">NEXT INSPECTION DATE</td>
                <td style="text-align: center;"><strong>$next_inspection_date</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="text-center section-title" colspan="4">TESTING PREPARATION</td>
            </tr>
            <tr>
                <td class="text-center section-title" style="width: 25%;">STANDARD</td>
                <td style="text-align: center;"><strong>$standard</strong></td>
                <td class="text-center section-title" style="width: 25%;">MATERIAL</td>
                <td style="text-align: center;"><strong>$material</strong></td>
            </tr>
            <tr>
                <td class="text-center section-title">SURFACE TEMPERATURE</td>
                <td style="text-align: center;" colspan="3"><strong>$surface_temperature</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="text-center section-title" colspan="6">TESTING TOOLS</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 25%;" class="section-title">TECHNIQUE/PROCEDURE</td>
                <td style="text-align: center;"><strong>$technique_procedure</strong></td>
                <td colspan="2" class="section-title">BRAND</td>
                <td style="text-align: center;"><strong>$brand</strong></td>
            </tr>
            <tr>
                <td class="text-center section-title">PENETRANT</td>
                <td style="text-align: center;"><strong>$penetrant</strong></td>
                <td class="text-center section-title">PENETRANT APPLY</td>
                <td style="text-align: center;"><strong>$penetrant_apply</strong></td>
                <td class="text-center section-title">DWELL TIME</td>
                <td style="text-align: center;"><strong>$dwell_time</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">CLEANER</td>
                <td style="text-align: center;"><strong>$cleaner</strong></td>
                <td colspan="2" class="section-title">REMOVE APPLY</td>
                <td style="text-align: center;"><strong>$remove_apply</strong></td>
            </tr>
            <tr>
                <td class="section-title">DEVELOPER</td>
                <td style="text-align: center;"><strong>$developer</strong></td>
                <td class="text-center section-title">DEVELOPER APPLY</td>
                <td style="text-align: center;"><strong>$developer_apply</strong></td>
                <td class="text-center section-title">DEVELOPING TIME</td>
                <td style="text-align: center;"><strong>$developing_time</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="text-center section-title" colspan="4">TESTING RESULT</td>
            </tr>
            <tr>
                <td style="width: 25%;" class="text-center section-title">DESCRIPTION</td>
                <td class="text-center section-title">ITEM CHECKED</td>
                <td class="text-center section-title">RESULTS</td>
                <td class="text-center section-title">CONDITION</td>
            </tr>
            <tr style="height: 100px;">
                <td style="text-align: center;"><strong>$description</strong></td>
                <td style="text-align: center;"><strong>$item_checked</strong></td>
                <td style="text-align: center;"><strong>$results</strong></td>
                <td style="text-align: center;"><strong>$condition_new</strong></td>
            </tr>
        </table>

        <table>
            <tr style="height: 100px;">
                <td class="text-center" style="text-align: center;"><strong>$description_1</strong></td>
                <td class="text-center" style="text-align: center;"><strong>$description_2</strong></td>
                <td class="text-center" style="text-align: center;"><strong>$description_3</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td colspan="2" class="text-center section-title">INSPECTOR</td>
                <td colspan="2" class="text-center section-title">AUTHENTICATING PERSON</td>
            </tr>
            <tr style="height: 25px;">
                <td style="text-align: center; width: 25%;"><strong>$inspector_name</strong></td>
                <td style="text-align: center; width: 25%;" class="text-center">$inspector_signature_img</td>
                <td style="text-align: center; width: 25%;"><strong>$authenticating_person_name</strong></td>
                <td style="text-align: center; width: 25%;" class="text-center">$authenticating_signature_img</td>
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
// $mpdf->SetWatermarkImage('../logo.png', 0.2, '', [90, 70]);
$mpdf->showWatermarkImage = true;

// Output the PDF to the browser for download
$mpdf->Output('liquid_penetrant_inspection_certificate.pdf', 'D');

$conn->close();
?>