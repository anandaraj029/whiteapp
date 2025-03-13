<?php
  // Include your database connection file
include_once('fetch_data.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eddy Current Inspection Certificate</title>
	
<style>    
input[type="checkbox"] {
  width: 10px;
  height: 10px;
  transform: scale(1.5); 
  margin-right: 5px; 
}
	
    /* .certificate-title {
      text-align: center;
      margin: 25px;
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
      padding: 5px;
    }
    h1, h3 {
      text-align: center;
      font-size: 12px;
      margin: 2px 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
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
	
	th, td{
	text-align: center;
	}

    @media (max-width: 600px) {
      table {
        font-size: 8px;
      }
    } */
  </style>

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
        <h3 class="certificate-title"><strong>EDDY CURRENT INSPECTION CERTIFICATE</strong></h3>
    </div>

    <table style="margin-top: 38px;">
        <tr>
            <td class="section-title" style="width: 25%;">CERTIFICATE NO.</td>
            <td style="width: 25%;"><strong><?php echo $certificate_no; ?></strong></td>
            <td class="section-title" style="width: 25%;">REFERENCE NO.</td>
            <td style="width: 25%;"><strong><?php echo $reference_no; ?></strong></td>
        </tr>
        <tr>
            <td class="section-title">CUSTOMER NAME</td>
            <td colspan="3"><strong><?php echo $customer_name; ?></strong></td>
        </tr>
        <tr>
            <td class="section-title">SITE/LOCATION</td>
            <td colspan="3"><strong><?php echo $site_location; ?></strong></td>
        </tr>
        <tr>
            <td class="section-title">INSPECTION DATE</td>
            <td><strong><?php echo $inspection_date; ?></strong></td>
            <td class="section-title">NEXT INSPECTION DATE</td>
            <td><strong><?php echo $next_inspection_date; ?></strong></td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 25%;" colspan="2" class="section-title">INSPECTED ITEM</td>
            <td><strong><?php echo $inspected_item; ?></strong></td>
            <td colspan="3" class="section-title">TYPE OF JOINT</td>
            <td><strong><?php echo $type_of_joint; ?></strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">SPECIFICATION</td>
            <td colspan="5"><strong><?php echo $specification; ?></strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">INSPECTION METHOD</td>
            <td><input type="checkbox" <?php echo ($inspection_method === 'surface') ? 'checked' : ''; ?> disabled> <strong>Surface</strong></td>
            <td><input type="checkbox" <?php echo ($inspection_method === 'weld') ? 'checked' : ''; ?> disabled> <strong>Weld</strong></td>
            <td><input type="checkbox" <?php echo ($inspection_method === 'coatingthickness') ? 'checked' : ''; ?> disabled> <strong>Coating Thickness</strong></td>
            <td colspan="2"><input type="checkbox" <?php echo ($inspection_method === 'other') ? 'checked' : ''; ?> disabled> <strong>Other</strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">CALIBRATION DETAILS</td>
            <td><strong><?php echo $calibration_details; ?></strong></td>
            <td colspan="2" class="section-title">GAIN</td>
            <td colspan="2"><strong><?php echo $gain; ?></strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">PROBE FREQUENCY</td>
            <td colspan="2"><input type="checkbox" <?php echo ($probe_frequency === 'yes') ? 'checked' : ''; ?> disabled></td>
            <td colspan="3"><input type="checkbox" <?php echo ($probe_frequency === 'no') ? 'checked' : ''; ?> disabled></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">CABLE TYPE</td>
            <td><input type="checkbox" <?php echo ($cable_type === 'bnc') ? 'checked' : ''; ?> disabled> <strong>BNC</strong></td>
            <td><input type="checkbox" <?php echo ($cable_type === 'lemo') ? 'checked' : ''; ?> disabled> <strong>LEMO</strong></td>
            <td class="section-title">SENSOR TYPE</td>
            <td><input type="checkbox" <?php echo ($sensor_type === 'absoluteprobe') ? 'checked' : ''; ?> disabled> <strong>Absolute Probe</strong></td>
            <td><input type="checkbox" <?php echo ($sensor_type === 'coil') ? 'checked' : ''; ?> disabled> <strong>Coil</strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">REF. BLOCK TYPE</td>
            <td><input type="checkbox" <?php echo ($ref_block_type === 'notchblock') ? 'checked' : ''; ?> disabled> <strong>Notch Block</strong></td>
            <td><input type="checkbox" <?php echo ($ref_block_type === 'notchdepth') ? 'checked' : ''; ?> disabled> <strong>Notch Depth</strong></td>
            <td><input type="checkbox" <?php echo ($ref_block_type === '5mm') ? 'checked' : ''; ?> disabled> <strong>0.5 mm</strong></td>
            <td><input type="checkbox" <?php echo ($ref_block_type === '10mm') ? 'checked' : ''; ?> disabled> <strong>1.0 mm</strong></td>
            <td><input type="checkbox" <?php echo ($ref_block_type === '20mm') ? 'checked' : ''; ?> disabled> <strong>2.0 mm</strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">MATERIAL</td>
            <td colspan="2"><input type="checkbox" <?php echo ($material === 'ferromagnetic') ? 'checked' : ''; ?> disabled> <strong>Ferromagnetic: Carbon Steel</strong></td>
            <td colspan="2"><input type="checkbox" <?php echo ($material === 'nonferromagnetic') ? 'checked' : ''; ?> disabled> <strong>Non-Ferromagnetic</strong></td>
            <td><input type="checkbox" <?php echo ($material === 'mtl') ? 'checked' : ''; ?> disabled> <strong>MTL. THK.</strong></td>
        </tr>
        <tr>
            <td colspan="2" class="section-title">DEVICE MAKER</td>
            <td><strong><?php echo $device_maker; ?></strong></td>
            <td class="section-title">MODEL</td>
            <td><strong><?php echo $model; ?></strong></td>
            <td class="section-title">SERIAL NO.</td>
            <td><strong><?php echo $serial_no; ?></strong></td>
        </tr>
    </table>

    <table>
        <tr style="height: 100px;">
            <td class="text-center"><strong><?php echo $description_1; ?></strong></td>
            <td class="text-center"><strong><?php echo $description_2; ?></strong></td>
            <td class="text-center"><strong><?php echo $description_3; ?></strong></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="section-title" style="width: 25%;" colspan="1">DESCRIPTION OF INSPECTION</td>
            <td colspan="4"><strong><?php echo $description_of_inspection; ?></strong></td>
        </tr>
        <tr>
            <td class="section-title" colspan="5">INSPECTION RESULTS</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2">
                <input type="checkbox" <?php echo ($inspection_result === 'noSurfaceIndication') ? 'checked' : ''; ?> disabled>
                <strong>No surface indication found at the time of inspection</strong>
            </td>
            <td class="section-title" colspan="3">
                <input type="checkbox" <?php echo ($inspection_result === 'notAcceptable') ? 'checked' : ''; ?> disabled>
                <strong>NOT ACCEPTABLE DUE TO:</strong>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" <?php echo ($reason === 'crack') ? 'checked' : ''; ?> disabled>
                <strong>Crack</strong>
            </td>
            <td>
                <input type="checkbox" <?php echo ($reason === 'wear') ? 'checked' : ''; ?> disabled>
                <strong>Wear</strong>
            </td>
            <td>
                <input type="checkbox" <?php echo ($reason === 'other') ? 'checked' : ''; ?> disabled>
                <strong>Other:</strong>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%;" colspan="2" class="text-center section-title">INSPECTOR</td>
            <td style="width: 50%;" colspan="2" class="text-center section-title">AUTHENTICATING PERSON</td>
        </tr>
        <tr style="height: 25px;">
            <td style="text-align: center;">
                <?php echo $inspector_name; ?>
        </td>
            <td class="text-center">
                <img src="uploads/<?php echo $inspector_name; ?>.png" height="33px" alt="Inspector Signature">
            </td>
            <td style="text-align: center;"><?php echo $authenticating_person_name; ?></td>
            <td class="text-center">
                <img src="uploads/<?php echo $authenticating_person_name; ?>.png" height="33px" alt="Authenticating Person Signature">
            </td>
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