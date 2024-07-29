<?php
require_once('../../vendor/autoload.php'); // Adjust the path as necessary

// Sample data array
/*$certificateData = [
    'certificate_no' => '240120291',
    'reference_no' => '2029',
    'customer_name' => 'HAMZA S. BALHARITH EST. (HSBE)',
    'location' => '2ND INDUSTRIAL DAMMAM',
    'inspection_date' => '28-JAN-2024',
    'next_inspection_date' => '27-Jul-2024',
    'inspected_item' => 'FORKLIFT TRUCK FORK',
    'swl' => '10 TON',
    'serial_numbers' => '01102B0474',
    'manufacturer_equip_no' => 'HELI / FL-008 (2030-SAA)',
    'standards' => 'ASTM E 709 & BS EN 9934-1:2016',
    'mpi_equip_type' => 'PERMANENT MAGNET',
    'brand' => 'MAGNAFLUX',
    'current' => 'N/A',
    'prod_spacing' => '10-15 CM',
    'contrast_paint' => '8903W/ARDROX',
    'ink' => '800/3/ARDOX',
    'particle_medium' => 'WET',
    'yoke_sn' => '039',
    'calibration_expiry_date' => '11-FEB-2024',
    'model_no' => 'N/A',
    'result' => 'MPI HAD BEEN DONE FOR ABOVE DESCRIPTION AND FOUND: FREE FROM ANY SURFACE CRACKS AT TIME OF INSPECTION MPI ACCEPTED',
    'inspector' => 'SHAROON B. MASIH',
    'level' => 'NDT LEVEL III',
    'signature' => 'SIGNATURE'
];
*/
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crane Health Check Certificate</title>
  
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
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #000;
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
            margin-bottom: 20px;
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
        .header img, .footer img {
            max-width: 100%;
            height: 50px;
        }
		.sign{
			width:120px;
			height:60px;
		}
		.qrcode{
			width:70px;
			height:70px;
			float:right;
			margin-top:0px;
		}
		.leea{
			width:74px;
			height:50px;
			float:left;
			margin-top:0px;
		}
        @media (max-width: 600px) {
            .header-table, .details-table, .content-table {
                font-size: 12px;
            }
        }
  </style>
</head>
<body>a
  <div class="container-fluid">
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

    <div class="table-responsive">
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

    <div class="table-responsive">
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

    <div class="table-responsive">
      <table class="content-table">
        <thead>
          <tr>
            <th class="text-center section-title" colspan="2">INSPECTED BY:</th>
            <th class="text-center section-title" colspan="2">APPROVED BY:</th>
			
			
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
          </tr>
          <tr>
            <td class="text-center"><strong>VENANCIO Z. VERA</strong></td>
            <td> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
            <td class="text-center"><strong>TECHNICAL MANAGER</strong></td>
           <td> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
          </tr>
        </tbody>
      </table>
    </div>

    <p class="mt-2"><strong>
      This certificate contained herein is the good-faith opinion of CIMS – KGEIT as to the Visual Condition of the crane inspected. This Certificate in no way represents any guarantee, expressed, or implied as to the classification, fitness for use of merchantability of the crane, and in no event shall CIMS – KGEIT be held liable for any damage as result of its use.
    </strong></p>
    <div class="table-responsive">
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

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('certificate2.pdf', \Mpdf\Output\Destination::DOWNLOAD);
?>
