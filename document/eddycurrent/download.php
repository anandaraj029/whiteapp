<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // include your database connection

// Get the certificate number from the query parameter
$project_no = $_GET['project_no'];

// Fetch the data based on the certificate number
$sql = "SELECT * FROM eddy_current_inspection WHERE project_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $project_no);
$stmt->execute();
$result = $stmt->get_result();

// If no records are found
if ($result->num_rows == 0) {
    die("No certificates found for the given certificate number.");
}

// Fetch the data
$row = $result->fetch_assoc();

// Assign fetched data to variables
$certificate_no = $row['certificate_no'];
$reference_no = $row['reference_no'];
$customer_name = $row['customer_name'];
$site_location = $row['site_location'];
$inspection_date = $row['inspection_date'];
$next_inspection_date = $row['next_inspection_date'];
$inspected_item = $row['inspected_item'];
$type_of_joint = $row['type_of_joint'];
$specification = $row['specification'];
$inspection_method = $row['inspection_method'];
$calibration_details = $row['calibration_details'];
$gain = $row['gain'];
$probe_frequency = $row['probe_frequency'];
$cable_type = $row['cable_type'];
$sensor_type = $row['sensor_type'];
$ref_block_type = $row['ref_block_type'];
$material = $row['material'];
$device_maker = $row['device_maker'];
$model = $row['model'];
$serial_no = $row['serial_no'];
$description_1 = $row['description_1'];
$description_2 = $row['description_2'];
$description_3 = $row['description_3'];
$description_of_inspection = $row['description_of_inspection'];
$inspection_result = $row['inspection_result'];
$reason = $row['reason'];
$inspector_name = $row['inspector_name'];
$inspector_signature = $row['inspector_signature'];
$authenticating_person_name = $row['authenticating_person_name'];
$signature = $row['signature'];

// SVG icons for checkboxes
// $checkedIcon = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';
// $uncheckedIcon = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>';

// SVG icons for checkboxes with boxes
// $checkedIcon = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><polyline points="20 6 9 17 4 12"></polyline></svg>';
// $uncheckedIcon = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>';

// SVG icons for checkboxes with different colors
// SVG icons for checkboxes with different colors
// Path to checkbox images
$checkedIcon = '<img src="../checkmark.png" width="12" height="12" alt="Checked">';
$uncheckedIcon = '<img src="../uncheckmark.png" width="13" height="13" alt="Unchecked">';

// Replace checkbox inputs with SVG icons
$inspection_method_surface = ($inspection_method === 'surface') ? $checkedIcon : $uncheckedIcon;
$inspection_method_weld = ($inspection_method === 'weld') ? $checkedIcon : $uncheckedIcon;
$inspection_method_coatingthickness = ($inspection_method === 'coatingthickness') ? $checkedIcon : $uncheckedIcon;
$inspection_method_other = ($inspection_method === 'other') ? $checkedIcon : $uncheckedIcon;

$probe_frequency_yes = ($probe_frequency === 'yes') ? $checkedIcon : $uncheckedIcon;
$probe_frequency_no = ($probe_frequency === 'no') ? $checkedIcon : $uncheckedIcon;

$cable_type_bnc = ($cable_type === 'bnc') ? $checkedIcon : $uncheckedIcon;
$cable_type_lemo = ($cable_type === 'lemo') ? $checkedIcon : $uncheckedIcon;

$sensor_type_absoluteprobe = ($sensor_type === 'absoluteprobe') ? $checkedIcon : $uncheckedIcon;
$sensor_type_coil = ($sensor_type === 'coil') ? $checkedIcon : $uncheckedIcon;

$ref_block_type_notchblock = ($ref_block_type === 'notchblock') ? $checkedIcon : $uncheckedIcon;
$ref_block_type_notchdepth = ($ref_block_type === 'notchdepth') ? $checkedIcon : $uncheckedIcon;
$ref_block_type_5mm = ($ref_block_type === '5mm') ? $checkedIcon : $uncheckedIcon;
$ref_block_type_10mm = ($ref_block_type === '10mm') ? $checkedIcon : $uncheckedIcon;
$ref_block_type_20mm = ($ref_block_type === '20mm') ? $checkedIcon : $uncheckedIcon;

$material_ferromagnetic = ($material === 'ferromagnetic') ? $checkedIcon : $uncheckedIcon;
$material_nonferromagnetic = ($material === 'nonferromagnetic') ? $checkedIcon : $uncheckedIcon;
$material_mtl = ($material === 'mtl') ? $checkedIcon : $uncheckedIcon;

$inspection_result_noSurfaceIndication = ($inspection_result === 'noSurfaceIndication') ? $checkedIcon : $uncheckedIcon;
$inspection_result_notAcceptable = ($inspection_result === 'notAcceptable') ? $checkedIcon : $uncheckedIcon;

$reason_crack = ($reason === 'crack') ? $checkedIcon : $uncheckedIcon;
$reason_wear = ($reason === 'wear') ? $checkedIcon : $uncheckedIcon;
$reason_other = ($reason === 'other') ? $checkedIcon : $uncheckedIcon;


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
    <title>Eddy Current Inspection Certificate</title>
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
        .checkbox-icon {
            display: inline-block;
            width: 12px;
            height: 12px;
            vertical-align: middle;
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
            <h3 class="certificate-title"><strong>EDDY CURRENT INSPECTION CERTIFICATE</strong></h3>
        </div>

        <table>
            <tr>
                <td class="section-title" style="width: 25%;">CERTIFICATE NO.</td>
                <td style="width: 25%;"><strong>$certificate_no</strong></td>
                <td class="section-title" style="width: 25%;">REFERENCE NO.</td>
                <td style="width: 25%;"><strong>$reference_no</strong></td>
            </tr>
            <tr>
                <td class="section-title">CUSTOMER NAME</td>
                <td colspan="3"><strong>$customer_name</strong></td>
            </tr>
            <tr>
                <td class="section-title">SITE/LOCATION</td>
                <td colspan="3"><strong>$site_location</strong></td>
            </tr>
            <tr>
                <td class="section-title">INSPECTION DATE</td>
                <td><strong>$inspection_date</strong></td>
                <td class="section-title">NEXT INSPECTION DATE</td>
                <td><strong>$next_inspection_date</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 25%;" colspan="2" class="section-title">INSPECTED ITEM</td>
                <td><strong>$inspected_item</strong></td>
                <td colspan="3" class="section-title">TYPE OF JOINT</td>
                <td><strong>$type_of_joint</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">SPECIFICATION</td>
                <td colspan="5"><strong>$specification</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">INSPECTION METHOD</td>
                <td><span class="checkbox-icon">$inspection_method_surface</span> <strong>Surface</strong></td>
                <td><span class="checkbox-icon">$inspection_method_weld</span> <strong>Weld</strong></td>
                <td><span class="checkbox-icon">$inspection_method_coatingthickness</span> <strong>Coating Thickness</strong></td>
                <td colspan="2"><span class="checkbox-icon">$inspection_method_other</span> <strong>Other</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">CALIBRATION DETAILS</td>
                <td><strong>$calibration_details</strong></td>
                <td colspan="2" class="section-title">GAIN</td>
                <td colspan="2"><strong>$gain</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">PROBE FREQUENCY</td>
                <td colspan="2"><span class="checkbox-icon">$probe_frequency_yes</span></td>
                <td colspan="3"><span class="checkbox-icon">$probe_frequency_no</span></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">CABLE TYPE</td>
                <td><span class="checkbox-icon">$cable_type_bnc</span> <strong>BNC</strong></td>
                <td><span class="checkbox-icon">$cable_type_lemo</span> <strong>LEMO</strong></td>
                <td class="section-title">SENSOR TYPE</td>
                <td><span class="checkbox-icon">$sensor_type_absoluteprobe</span> <strong>Absolute Probe</strong></td>
                <td><span class="checkbox-icon">$sensor_type_coil</span> <strong>Coil</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">REF. BLOCK TYPE</td>
                <td><span class="checkbox-icon">$ref_block_type_notchblock</span> <strong>Notch Block</strong></td>
                <td><span class="checkbox-icon">$ref_block_type_notchdepth</span> <strong>Notch Depth</strong></td>
                <td><span class="checkbox-icon">$ref_block_type_5mm</span> <strong>0.5 mm</strong></td>
                <td><span class="checkbox-icon">$ref_block_type_10mm</span> <strong>1.0 mm</strong></td>
                <td><span class="checkbox-icon">$ref_block_type_20mm</span> <strong>2.0 mm</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">MATERIAL</td>
                <td colspan="2"><span class="checkbox-icon">$material_ferromagnetic</span> <strong>Ferromagnetic: Carbon Steel</strong></td>
                <td colspan="2"><span class="checkbox-icon">$material_nonferromagnetic</span> <strong>Non-Ferromagnetic</strong></td>
                <td><span class="checkbox-icon">$material_mtl</span> <strong>MTL. THK.</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="section-title">DEVICE MAKER</td>
                <td><strong>$device_maker</strong></td>
                <td class="section-title">MODEL</td>
                <td><strong>$model</strong></td>
                <td class="section-title">SERIAL NO.</td>
                <td><strong>$serial_no</strong></td>
            </tr>
        </table>

        <table>
            <tr style="height: 100px;">
                <td class="text-center"><strong>$description_1</strong></td>
                <td class="text-center"><strong>$description_2</strong></td>
                <td class="text-center"><strong>$description_3</strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="section-title" style="width: 25%;" colspan="1">DESCRIPTION OF INSPECTION</td>
                <td colspan="4"><strong>$description_of_inspection</strong></td>
            </tr>
            <tr>
                <td class="section-title" colspan="5">INSPECTION RESULTS</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2">
                    <span class="checkbox-icon">$inspection_result_noSurfaceIndication</span> <strong>No surface indication found at the time of inspection</strong>
                </td>
                <td class="section-title" colspan="3">
                    <span class="checkbox-icon">$inspection_result_notAcceptable</span> <strong>NOT ACCEPTABLE DUE TO:</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="checkbox-icon">$reason_crack</span> <strong>Crack</strong>
                </td>
                <td>
                    <span class="checkbox-icon">$reason_wear</span> <strong>Wear</strong>
                </td>
                <td>
                    <span class="checkbox-icon">$reason_other</span> <strong>Other:</strong>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 50%;" colspan="2" class="text-center section-title">INSPECTOR</td>
                <td style="width: 50%;" colspan="2" class="text-center section-title">AUTHENTICATING PERSON</td>
            </tr>
            <tr style="height: 25px;">
                <td style="text-align: center;">$inspector_name</td>
                <td class="text-center">
                    $inspector_signature_img
                </td>
                <td style="text-align: center;">$authenticating_person_name</td>
                <td class="text-center">
                    $authenticating_signature_img
                </td>
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
$mpdf->Output('eddy_current_inspection_certificate.pdf', 'D');

$stmt->close();
$conn->close();
?>