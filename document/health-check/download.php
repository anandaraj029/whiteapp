<?php
require_once('../../vendor/autoload.php'); // Adjust the path as necessary

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
    .signature-section {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }
      p {
      font-size:12px;
      }
    .signature {
      text-align: center;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 10px;
      padding: 10px;
      line-height: 1.4;
    }
    .container-fluid {
      max-width: 800px;
      margin: auto;
      padding: 10px;
    }
    h1, h3 {
      text-align: center;
      font-size: 12px;
      margin: 5px 0;
    }
    p {
      text-align: center;
      font-size: 10px;
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
    .header-table, .details-table {
      border: none;
      margin-bottom: 0;
    }
    .header-table th, .header-table td {
      border: none;
      padding: 3px;
    }
    .section-title {
      background-color: #bfdaef;
      font-weight: bold;
      font-size: 11px;
    }
    .answer {
      color: red;
      font-weight: bold;
    }
    .header, .footer {
      text-align: center;
    }
    .header img {
      max-width: 100%;
      height: 200px;
    }
    .footer img {
      max-width: 100%;
      height: 70px;
    }
    .sign {
      width: 80px;
      height: 40px;
    }
       .sign2 {
     width: 107px;
    height: 87px;
    }
      .seal{
      width: 40px
      height: 40px
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
      .header-table, .details-table, .content-table {
        font-size: 8px;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="header">
      <img src="../head2.jpg" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
    <div class="text-center">
      <h3 class="certificate-title"><strong>CRANE HEALTH CHECK CERTIFICATE <br />
      FOR OFFSHORE PEDESTAL CRANES AND FLOATING CRANES</strong></h3>
    </div>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <tbody>
          <tr>
            <td class="text-center section-title">Date of Inspection:</td>
            <td>11 JULY 2023</td>
            <td class="text-center section-title">Report No.:</td>
            <td>92603</td>
          </tr>
          <tr>
            <td class="text-center section-title">Certificate No.:</td>
            <td>CHC-324-2023</td>
            <td class="text-center section-title">JRN:</td>
            <td>37781</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <tbody>
          <tr>
            <th colspan="2" class="text-center section-title">A. GENERAL INFORMATION</th>
          </tr>
          <tr>
            <th>Vessel Name & Location</th>
            <td>M/V HORIZON SURVEYOR, BERTH # 11, JUBAIL COMMERCIAL PORT</td>
          </tr>
          <tr>
            <th>Company Name</th>
            <td>HORIZON GEOSCIENCES</td>
          </tr>
          <tr>
            <th>Manufacturer</th>
            <td>PUMA CRANES</td>
          </tr>
          <tr>
            <th>Type of Crane</th>
            <td>ELECTRO-HYDRAULIC ARTICULATING & TELESCOPING BOOM PEDESTAL CRANE</td>
          </tr>
          <tr>
            <th>Model</th>
            <td>PMA45K5</td>
          </tr>
          <tr>
            <th>Manufacturing Year</th>
            <td>2020</td>
          </tr>
          <tr>
            <th>Asset Number</th>
            <td>DECK CRANE</td>
          </tr>
          <tr>
            <th>Serial Number</th>
            <td>PMA45K5-2020-50-20</td>
          </tr>
          <tr>
            <th>Capacity (SWL)</th>
            <td>7.8 Tons @ 5m / 2 Tons @ 13m</td>
          </tr>
          <tr>
            <th>Date of Previous Test of Crane</th>
            <td>UNKNOWN</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <thead>
          <tr>
            <th colspan="4" class="text-center section-title">B. GENERAL INFORMATION</th>
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
            <td>Crane Structure Condition:</td>
            <td>SATISFACTORY</td>
            <td>Auto Moment Limiter (LMI):</td>
            <td>SATISFACTORY</td>
          </tr>
          <tr>
            <td>Swinging / Slewing Function:</td>
            <td>SATISFACTORY</td>
            <td>Anti-Two-Block (A2B) Function:</td>
            <td>SATISFACTORY</td>
          </tr>
          <tr>
            <td>Hydraulic & Pneumatic System:</td>
            <td>SATISFACTORY</td>
            <td>Winch Drum Lock / Pawls:</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td>Wire Ropes Condition:</td>
            <td>SATISFACTORY</td>
            <td>Hook Block Assembly:</td>
            <td>SATISFACTORY</td>
          </tr>
          <tr>
            <td>Boom Lifting, Extending & Retracting:</td>
            <td>SATISFACTORY</td>
            <td>Boom Angle Indicator:</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td>Emergency Boom Lowering:</td>
            <td>SATISFACTORY</td>
            <td>Emergency Shutdown:</td>
            <td>SATISFACTORY</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p><strong>
      We hereby certify that the above Crane has been duly Inspected (Health Check) as per the Manufacturer’s Recommendation or based on ASME B30.3 – 2016, B30.4 – 2015, B30.5 – 2018, B30.7 – 2016, B30.8 – 2015, B30.9 – 2018, B30.10 – 2015, B30.22 – 2016, API SPECS 2C – 2012, and API RP 2D – 2014.
    </strong></p>
    <p class="text-center"><strong>
      The latest date by which the next inspection shall be carried out: <br><strong>(10 JANUARY 2024)</strong>
    </strong></p>
    <div class="table-responsive keep-together">
      <table class="content-table">
        <thead>
          <tr>
            <th class="text-center section-title" colspan="2">INSPECTED BY:</th>
            <th class="text-center section-title" colspan="2">APPROVED BY:</th>
            <th class="text-center section-title" colspan="2">COMPANY SEAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
          </tr>
          <tr>
            <td class="text-center"><strong>VENANCIO Z. VERA</strong></td>
            <td> <img src="../sign.jpg" class="sign" alt="Signature Image"></td>
            <td class="text-center"><strong>TECHNICAL MANAGER</strong></td>
            <td> <img src="../sign.jpg" class="sign" alt="Signature Image"></td>
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
            <td class="text-center section-title">
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
