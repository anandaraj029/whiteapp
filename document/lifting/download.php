<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // include your database connection

// Get the project ID from the query parameter
$project_no = $_GET['project_no'];

// Fetch the data based on the project_no
$sql = "SELECT * FROM lifting_gear_certificates WHERE project_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $project_no);
$stmt->execute();
$result = $stmt->get_result();

// If no records are found

if ($result->num_rows == 0) {

    die("No certificates found for the given project ID.");

}


// Create an instance of the mPDF class with landscape orientation and minimal margins
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Loop through each certificate and generate HTML content
while ($row = $result->fetch_assoc()) {
// HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifting Gears Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .container-fluid {
            width: 100%;
            margin: auto;
            padding: 10px;
        }
        h1, h2 {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        .no-border {
            border: none !important;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #83C1F5;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature {
            text-align: center;
        }
        .signature p {
            margin: 0;
        }
        .signature span {
            display: block;
            margin-top: 30px;
            border-top: 1px solid #000;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
        }
        .sign{
          width:120px;
          height:60px;
        }
        .qrcode {
      width: 70px;
      height: 70px;
      float: right;
      margin-top: -66px;
    }
    .leea {
      width: 65px;
      height: 62px;
      float: left;
      margin-top: -65px;
    }
        @media (max-width: 768px) {
            .signature-section {
                flex-direction: column;
                align-items: center;
            }
            .signature {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <img src="../head2.jpg" alt="Header Image" style="width: 100%;">
        <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
        <table class="table no-border">
        <tr>
                <td colspan="3"></td>
                
                <td colspan="3"></td>
                <td colspan="3" style="text-align: center;"><strong>Job Ref. No.:</strong> {$row['jrn']}</td>
                <td colspan="3" style="text-align: center;"><strong>Certificate No.:</strong> {$row['certificate_no']}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;"><strong>Report No.:</strong> {$row['report_no']}</td>
                <td colspan="3" style="text-align: center;"><strong>Date of Report:</strong> {$row['date_of_report']}</td>
                <td colspan="3" style="text-align: center;"><strong>Color Code (if required):</strong> {$row['color_code']}</td>
                <td colspan="3" style="text-align: center;"><strong>Applicable Standard(s):</strong> {$row['applicable_standards']}</td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">Name & Address of the employer for whom the examination was made:<br/>
                            {$row['employer_name_address']}

                        </th>
                        <th colspan="4">Address of the premises at which the examination was made:<br/>
                        {$row['address_of_premises']}
                        </th>
                        <th colspan="2">Status:<br/>
                            ND-No Defect<br/>
                            SDR-See Defect Report<br/>
                            NF- Not Found
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">Identification No./Serial No.</th>
                        <th style="text-align: center;">QTY.</th>
                        <th style="text-align: center;">Type</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">WLL or SWL</th>
                        <th style="text-align: center;">Date of Last Examination</th>
                        <th style="text-align: center;">Date of this Examination</th>
                        <th style="text-align: center;">Latest date of the next examination</th>
                        <th style="text-align: center;">Reason for Examination (See Below)</th>
                        <th style="text-align: center;">Details of test</th>
                        <th style="text-align: center;">Status (See Above)</th>
                        <th style="text-align: center;">Safe to Use (Yes or No)</th>
                    </tr>
                </thead>
                <tbody>
                <tr style="height: 150px">                
                <td style="text-align: center;"><strong> {$row['identification_no']}</strong> </td>
                <td style="text-align: center;"><strong> {$row['qty']}</strong> </td>
                <td style="text-align: center;"> <strong> {$row['type']} </strong> </td>
                <td style="text-align: center;"> <strong> Manufacturer: {$row['manufacturer']}<br>
                Size: {$row['size']}<br>
                Length: {$row['length']}<br>
                Color: {$row['color']}<br>
                Ply: {$row['ply']}    </strong></td>
                <td style="text-align: center;"> <strong> {$row['wll_swl']} </strong> </td>
                <td style="text-align: center;"> <strong>  {$row['date_last_examination']} </strong> </td>
                <td style="text-align: center;"> <strong> {$row['date_of_this_examination']}</strong> </td>
                <td style="text-align: center;"> <strong> {$row['next_examination_date']} </strong> </td>
                <td style="text-align: center;"> <strong> {$row['reason_for_examination']}</strong> </td>
                <td style="text-align: center;"> <strong> {$row['test_details']} </strong> </td>
                <td style="text-align: center;"> <strong> {$row['status']} </strong> </td>
                <td style="text-align: center;"> <strong> {$row['safe_to_use']} </strong></td>
            </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">Reason for Examination</td>
                        <td colspan="2" style="text-align: center;">3 Monthly: A</td>
                        <td colspan="2" style="text-align: center;">6 Monthly: B</td>
                        <td colspan="2" style="text-align: center;">12 Monthly: C</td>
                        <td colspan="2" style="text-align: center;">Written Scheme: D</td>
                        <td colspan="2" style="text-align: center;">Exceptional Circumstance: E</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <strong>Name & Qualification of the person making the report:</strong>
                            <br>
                            {$row['inspector']}
                            <br>
                            Elevating/Lifting Equipment Inspector <span class="sign-space"><strong>Signature:</strong></span>
                        </td>
                        <td colspan="2"><img src="../../inspector/uploads/{$row['inspector']}/images/signature_image.jpg" class="sign" alt="Sign"></td>
                        <td colspan="3">
                            <strong>Name of the person authentication of this report:</strong><br>
                            {$row['technical_manager']}
                            <br>
                            Technical Manager <span><strong>Signature:</strong></span>
                            
                        </td>
                        <td colspan="2"><img src="../uploads/{$row['technical_manager']}.png" class="sign" alt="Header Image"></td>
                        <td colspan="2"><img src="../seal.png" class="sign" alt="Header Image"></td>
         </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="12" style="text-align: center;">
                            <strong>Overseas Full Member of Lifting Equipment Engineers Association (LEEA United Kingdom)</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="footer">
                <img src="../foot.jpg" alt="Footer Image" style="width: 100%;">
            </div>
        </div>
    </div>
</body>
</html>

HTML;

// Add the HTML content to the PDF
$mpdf->AddPage();
$mpdf->WriteHTML($html);
}

// Write the HTML content to the PDF
// $mpdf->WriteHTML($html);

// Add watermark image
$mpdf->SetWatermarkImage('../logo.png', 0.2, '', [90, 70]);
$mpdf->showWatermarkImage = true;
// Output the PDF to the browser for download
$mpdf->Output('lifting_gears_certificate.pdf', 'D');
$stmt->close();
$conn->close();

?>
