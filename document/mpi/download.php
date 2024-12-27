<?php
require_once('../../vendor/autoload.php');

include_once('../../file/config.php');  // Include your database connection file

// Fetch the record based on report_no
$project_id = $_GET['project_id'];  // Assuming report_no is passed via URL

$query = "SELECT * FROM mpi_certificates WHERE project_id = '$project_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);  // Fetch record into $row array
} else {
    echo "No record found!";
    exit;
}


use Mpdf\Mpdf;
$title = "MAGNETIC PARTICLE INSPECTION CERTIFICATE";
// Load Bootstrap CSS
// $bootstrapCSS = file_get_contents('../../assets/css/bootstrap.css');

// Your HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnetic Particle Inspection Certificate</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<style>
	body {
    font-family: Arial, sans-serif;
    font-size: 10px;
  }
  .certificate-title {
    text-align: center;
    margin: 0px 0;
  }
  .signature-section {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
  }
  .signature {
    text-align: center;
  }
  
  body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 10px;
          line-height: 1.6;
      }
      .container {
          max-width: 800px;
          margin: auto;
          padding: 20px;
          border: none;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      h1 {
          text-align: center;
          font-size: 14px;
          margin: 20px 0;
      }
      p {
          text-align: center;
          font-size: 10px;
      }
      table {
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 5px;
      }
      th, td {
          padding: 5px;
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
          padding: 5px;
      }
      .section-title {
          background-color: #bfdaef;
          font-weight: bold;
          font-size: 10px;
      }
      .answer {
          color: red;
          font-weight: bold;
      }
       .header, .footer {
          text-align: center;
      }
      .header img{
          max-width: 100%;
          height: 126px;
      }
     .footer img {
          max-width: 100%;
          height: 86px;
      }

      .sign{
          width:120px;
          height:60px;
      }
      .sign2 {
        width: 107px;
       height: 87px;
       }
      .qrcode{
          width:73px;
          height:73px;
          float:right;
          margin-top:0px;
      }
      .leea{
        width: 69px;
        height: 67px;
          float:left;
          margin-top:0px;
      }
      .text-center{
            text-align: center;
            margin: 0px;
      }
      .text-center button{
        
    padding: 18px;
    font-size: 14px;
    font-weight: 800;
    background: rgb(8, 177, 255);
    }

      @media (max-width: 600px) {
          .header-table, .details-table, .content-table {
              font-size: 12px;
          }
      }
	</style>
</head>
<body>
<div class="container-fluid my-5">
<div class="header">
      <img src="../head2.jpg" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
    <h2 class="text-center" style="">$title</h2>
    <div class="table-responsive">
        <table class="content-table">
            <tbody>
                <tr >
                    <td class="section-title" style="text-align: center; width: 25%;">CERTIFICATE NO.</td>
                    <td><strong>{$row['certificate_no']}</strong></td>
                    <td class="section-title" style="text-align: center">REFERENCE NO.</td>
                    <td  style="text-align: center"><strong>{$row['reference_no']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center">CUSTOMER NAME</td>
                    <td colspan="3"><strong>{$row['customer_name']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center">LOCATION</td>
                    <td colspan="3"><strong>{$row['location']}</strong></td>
                </tr>
                <tr>
                    <td  class="section-title" style="text-align: center">INSPECTION DATE</td>
                    <td  style="text-align: center"><strong>{$row['inspection_date']}</strong></td>
                    <td  class="section-title" style="text-align: center">NEXT INSPECTION DATE</td>
                    <td  style="text-align: center"><strong>{$row['next_inspection_date']}</strong></td>
                </tr>
                
            </tbody>
        </table>
    </div>
	
	<div class="table-responsive">
        <table class="content-table">
            <tbody>
                
                <tr>
                    <td  class="section-title" style="text-align: center; width: 25%;">INSPECTED ITEM</td>
                    <td colspan="3"><strong>{$row['inspected_item']}</strong></td>
                </tr>
                <tr>
                    <td  class="section-title" style="text-align: center">SERIAL NUMBERS</td>
                    <td colspan="3"><strong>{$row['serial_numbers']}</strong></td>
                </tr>
                <tr>
                    <td  class="section-title" style="text-align: center">MANUFACTURER / EQUIP. NO.</td>
                    <td colspan="3"><strong>{$row['manufacturer']}</strong></td>
                </tr>
                <tr>
                    <td  class="section-title" style="text-align: center">STANDARDS</td>
                    <td colspan="3"><strong>{$row['standards']}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

   
    <div class="table-responsive">
        <table class="content-table">
            <tbody>
			<tr>
                    <td class="section-title" style="text-align: center" colspan="4">TESTING TOOLS</td>
                    
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center; width: 25%;">MPI EQUIP. TYPE</td>
                    <td style="text-align: center"><strong>{$row['mpi_equip_type']}</strong></td>
                    <td class="section-title" style="text-align: center">BRAND</td>
                    <td style="text-align: center"><strong>{$row['brand']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center">CURRENT</td>
                    <td style="text-align: center"><strong>{$row['current']}</strong></td>
                    <td class="section-title" style="text-align: center">PROD. SPACING</td>
                    <td style="text-align: center"><strong>{$row['prod_spacing']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center">CONTRAST PAINT</td>
                    <td style="text-align: center"><strong>{$row['contrast_paint']}</strong></td>
                    <td class="section-title" style="text-align: center">INK</td>
                    <td style="text-align: center"><strong>{$row['ink']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title" style="text-align: center">PARTICLE MEDIUM</td>
                    <td style="text-align: center"><strong>{$row['particle_medium']}</strong></td>
                    <td class="section-title" style="text-align: center">YOKE S/N</td>
                    <td style="text-align: center"><strong>{$row['yoke_sn']}</strong></td>
                </tr>
                <tr>
                    <td class="section-title"  style="text-align: center">CALIBRATION EXPIRY DATE</td>
                    <td style="text-align: center"><strong>{$row['calibration_expiry_date']}</strong></td>
                    <td class="section-title"  style="text-align: center">MODEL NO.</td>
                    <td style="text-align: center"><strong>{$row['model_no']}</strong></td>
                </tr>
				
            </tbody>
        </table>
    </div>
	
	
	<div class="table-responsive">
        <table class="content-table">
            <tbody>
			<tr>

            
        <td style="text-align: center;">
            <img src="{$row['image_path']}" alt="Placeholder Image" style="display: block; margin: 0 auto; height: 150px">
          
        </td>
        <td style="text-align: center;">
        <img src="{$row['image_path']}" alt="Placeholder Image" style="display: block; margin: 0 auto; height: 150px">
        </td>
    </tr>
                			
            </tbody>
        </table>
    </div>

		
	

    <div class="table-responsive">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="section-title"  style="text-align: center; width: 50%;">RESULT</th>
                    <th  class="section-title"  style="text-align: center">COMMENTS/ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td   style="text-align: center"><strong>MPI HAD BEEN DONE FOR ABOVE DESCRIPTION AND FOUND:<br/> FREE FROM ANY SURFACE CRACKS AT TIME OF INSPECTION</strong></td>
                    <td  style="text-align: center"><strong>MPI ACCEPTED</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
	
	<div class="table-responsive">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="section-title"  style="text-align: center; width: 50%;">NDT INSPECTOR</th>
                    <th  class="section-title"  style="text-align: center">NDT LEVEL III</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td   style="text-align: center"><strong>SHAROON B. MASIH</strong></td>
                    <td  style="text-align: center"><strong>SIGNATURE</strong></td>
                </tr>
                <tr>
                <td style="text-align: center"> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
                <td style="text-align: center"> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
                </tr>
            </tbody>
        </table>
    </div>
	
	<p style="text-align: center; color: red"><strong>FRM.0702 (rev.02)</strong></p>

</div>

<div class="footer">
      <img src="../foot.jpg" alt="Footer Image">
    </div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
HTML;

// $mpdf->SetWatermarkImage('../logo.png', 0.3, '', [70, 100]);
// $mpdf->showWatermarkImage = true;

$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']); // 'L' for landscape
$mpdf->WriteHTML($html);
$mpdf->Output('mpi-certificate.pdf', 'D'); // 'D' to force download, use 'I' to inline view
