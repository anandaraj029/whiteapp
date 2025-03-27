<?php
require_once('../../vendor/autoload.php'); // Adjust the path as necessary
include_once('../../file/config.php');  // Include your database connection file

// Fetch the record based on report_no
$project_no = $_GET['project_no'];  // Assuming report_no is passed via URL

$query = "SELECT * FROM crane_health_check_certificate WHERE project_no = '$project_no'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);  // Fetch record into $row array
} else {
    echo "No record found!";
    exit;
}


$inspector_signature_path = "../../inspector/uploads/" . urlencode($row['inspector']) . "/images/signature_image.jpg";
if (file_exists($inspector_signature_path)) {
    $inspector_signature_html = '<img src="' . htmlspecialchars($inspector_signature_path) . '" class="sign" alt="Signature Image">';
} else {
    // Use a placeholder signature image if the actual one is not found
    $inspector_signature_html = '<img src="../assets/img/avatar/default-signature.png" class="sign" alt="Default Signature">';
}


// Technical Manager Signature
$technical_manager_name = urlencode($row['technical_manager']);
$technical_manager_signature_path = "../uploads/{$technical_manager_name}.png";
if (file_exists($technical_manager_signature_path)) {
    $technical_manager_signature_html = '<img src="' . htmlspecialchars($technical_manager_signature_path) . '" class="sign" alt="Technical Manager Signature">';
} else {
    // Use a placeholder signature image if the actual one is not found
    $technical_manager_signature_html = '<img src="../sign.jpg" class="sign" alt="Default Signature">';
}

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crane Health Check Certificate</title>
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
      margin-bottom: 3px;
    }
    th, td {
      padding: 3px;
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
      <h3 class="certificate-title"><strong>CRANE HEALTH CHECK CERTIFICATE <br />
      FOR OFFSHORE PEDESTAL CRANES AND FLOATING CRANES</strong></h3>
    </div>
    
    <div class="table-responsive">
      <table class="content-table">
        <tbody>
          <tr>
            <td class="text-center section-title" style="text-align: center;">Date of Inspection:</td>
            <td>' . htmlspecialchars($row['inspection_date']) . '</td>
            <td class="text-center section-title" style="text-align: center;">Report No.:</td>
            <td>' . htmlspecialchars($row['report_no']) . '</td>
          </tr>
          <tr>
            <td class="text-center section-title" style="text-align: center;">Certificate No.:</td>
            <td>' . htmlspecialchars($row['certificate_no']) . '</td>
            <td class="text-center section-title" style="text-align: center;">JRN:</td>
            <td>' . htmlspecialchars($row['jrn']) . '</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <div class="table-responsive">
      <table class="content-table">
        <tbody>
          <tr>
            <th colspan="2" class="text-center section-title" style="text-align: center;">A. GENERAL INFORMATION</th>
          </tr>
          <tr>
            <th>Vessel Name & Location</th>
            <td>' . htmlspecialchars($row['vessel_name_location']) . '</td>
          </tr>
          <tr>
            <th>Company Name</th>
            <td>' . htmlspecialchars($row['customer_name']) . '</td>
          </tr>
          <tr>
            <th>Manufacturer</th>
            <td>' . htmlspecialchars($row['manufacturer']) . '</td>
          </tr>
          <tr>
            <th>Type of Crane</th>
            <td>' . htmlspecialchars($row['crane_type']) . '</td>
          </tr>
          <tr>
            <th>Model</th>
            <td>' . htmlspecialchars($row['model']) . '</td>
          </tr>
          <tr>
            <th>Manufacturing Year</th>
            <td>' . htmlspecialchars($row['manufacturing_year']) . '</td>
          </tr>
          <tr>
            <th>Asset Number</th>
            <td>' . htmlspecialchars($row['asset_number']) . '</td>
          </tr>
          <tr>
            <th>Serial Number</th>
            <td>' . htmlspecialchars($row['serial_number']) . '</td>
          </tr>
          <tr>
            <th>Capacity (SWL)</th>
            <td>' . htmlspecialchars($row['capacity_swl']) . '</td>
          </tr>
          <tr>
            <th>Date of Previous Test of Crane</th>
            <td>' . htmlspecialchars($row['previous_test_date']) . '</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-responsive">
      <table class="content-table">
        <thead>
          <tr>
            <th colspan="4" class="text-center section-title" style="text-align: center;">B. GENERAL INFORMATION</th>
          </tr>
          <tr class="section-title">
            <th class="text-center">Operation</th>
            <th class="text-center">Comments</th>
            <th class="text-center">Safety Devices</th>
            <th class="text-center">Comments</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Crane Structure Condition:</strong></td>
            <td>' . htmlspecialchars($row['crane_structure_condition']) . '</td>
            <td><strong>Auto Moment Limiter (LMI):</strong></td>
            <td>' . htmlspecialchars($row['auto_moment_limiter']) . '</td>
          </tr>
          <tr>
            <td><strong>Swinging / Slewing Function:</strong></td>
            <td>' . htmlspecialchars($row['swinging_slewing_function']) . '</td>
            <td><strong>Anti-Two-Block (A2B) Function:</strong></td>
            <td>' . htmlspecialchars($row['anti_two_block']) . '</td>
          </tr>
          <tr>
            <td><strong>Hydraulic & Pneumatic System:</strong></td>
            <td>' . htmlspecialchars($row['hydraulic_pneumatic_system']) . '</td>
            <td><strong>Winch Drum Lock / Pawls:</strong></td>
            <td>' . htmlspecialchars($row['winch_drum_lock_pawls']) . '</td>
          </tr>
          <tr>
            <td><strong>Wire Ropes Condition:</strong></td>
            <td>' . htmlspecialchars($row['wire_ropes_condition']) . '</td>
            <td><strong>Hook Block Assembly:</strong></td>
            <td>' . htmlspecialchars($row['hook_block_assembly']) . '</td>
          </tr>
          <tr>
            <td><strong>Boom Lifting, Extending & Retracting:</strong></td>
            <td>' . htmlspecialchars($row['boom_lifting_extending_retracting']) . '</td>
            <td><strong>Boom Angle Indicator:</strong></td>
            <td>' . htmlspecialchars($row['boom_angle_indicator']) . '</td>
          </tr>
          <tr>
            <td><strong>Emergency Boom Lowering:</strong></td>
            <td>' . htmlspecialchars($row['emergency_boom_lowering']) . '</td>
            <td><strong>Emergency Shutdown:</strong></td>
            <td>' . htmlspecialchars($row['emergency_shutdown']) . '</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p><strong>
      We hereby certify that the above Crane has been duly Inspected (Health Check) as per the Manufacturer’s Recommendation or based on ASME B30.3 – 2016, B30.4 – 2015, B30.5 – 2018, B30.7 – 2016, B30.8 – 2015, B30.9 – 2018, B30.10 – 2015, B30.22 – 2016, API SPECS 2C – 2012, and API RP 2D – 2014.
    </strong></p>
    <p class="text-center" style="text-align: center;"><strong>
      The latest date by which the next inspection shall be carried out: <br><strong>(10 JANUARY 2024)</strong>
    </strong></p>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <thead>
          <tr>
            <th class="text-center section-title" colspan="2" style="text-align: center;">INSPECTED BY</th>
            <th class="text-center section-title" colspan="2" style="text-align: center;">APPROVED BY:</th>
            <th class="text-center section-title" colspan="2" style="text-align: center;">COMPANY SEAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
          </tr>
          <tr>
            <td class="text-center"><strong>' . htmlspecialchars($row['inspector']) . '</strong></td>
            <td>' . $inspector_signature_html . '</td>
            <td class="text-center"><strong>TECHNICAL MANAGER<br/>
            ' . htmlspecialchars($row['technical_manager']) . '
            </strong></td>
            <td>' . $technical_manager_signature_html . '</td>
            <td class="text-center"><strong>COMPANY SEAL </strong></td>
           <td> <img src="../seal.png" class="sign" alt="Header Image"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class=""><strong>
      This certificate contained herein is the good-faith opinion of CIMS – KGEIT as to the Visual Condition of the crane inspected. This Certificate in no way represents any guarantee, expressed, or implied as to the classification, fitness for use of merchantability of the crane, and in no event shall CIMS – KGEIT be held liable for any damage as result of its use.
    </strong></p>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <tbody>
          <tr>
            <td class="text-center section-title" style="text-align: center;">
              <i>OVERSEAS FULL MEMBER OF LIFTING EQUIPMENT ENGINEERS ASSOCIATION (LEEA, UNITED KINGDOM) CERT. # 662</i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="footer">
      <img src="../foot.jpg" alt="Footer Image">
    </div>
  </div>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Add watermark text
// $mpdf->SetWatermarkText('DRAFT');
// $mpdf->showWatermarkText = true;

// Add watermark image
$mpdf->SetWatermarkImage('../logo.png', 0.3, '', [70, 100]);
$mpdf->showWatermarkImage = true;

$mpdf->WriteHTML($html);
$mpdf->Output('health-check.pdf', \Mpdf\Output\Destination::DOWNLOAD);