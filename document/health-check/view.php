<?php
include_once('../../file/config.php');  // Include your database connection file

// Fetch the record based on report_no
$project_no = $_GET['project_no'];  // Assuming report_no is passed via URL

$query = "SELECT * FROM crane_health_check_certificate WHERE project_no = '$project_no'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);  // Fetch record into $row array
} else {
    echo "No record found!";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crane Health Check Certificate</title>
  
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
	 
           <h3 class="certificate-title"><strong>CRANE HEALTH CHECK CERTIFICATE <br />
	  FOR OFFSHORE PEDESTAL CRANES AND FLOATING CRANES</strong></h3>
    </div>
	
    	
    <div class="table-responsive">
    <table class="content-table">
        <tbody>
            <tr>
                <td class="text-center section-title">Date of Inspection:</td>
                <td><?php echo $row['inspection_date']; ?></td>
                <td class="text-center section-title">Report No.:</td>
                <td><?php echo $row['report_no']; ?></td>
            </tr>
            <tr>
                <td class="text-center section-title">Certificate No.:</td>
                <td><?php echo $row['certificate_no']; ?></td>
                <td class="text-center section-title">JRN:</td>
                <td><?php echo $row['jrn']; ?></td>
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
                <td><?php echo $row['vessel_name_location']; ?></td>
            </tr>
            <tr>
                <th>Company Name</th>
                <td><?php echo $row['companyName']; ?></td>
            </tr>
            <tr>
                <th>Manufacturer</th>
                <td><?php echo $row['manufacturer']; ?></td>
            </tr>
            <tr>
                <th>Type of Crane</th>
                <td><?php echo $row['crane_type']; ?></td>
            </tr>
            <tr>
                <th>Model</th>
                <td><?php echo $row['model']; ?></td>
            </tr>
            <tr>
                <th>Manufacturing Year</th>
                <td><?php echo $row['manufacturing_year']; ?></td>
            </tr>
            <tr>
                <th>Asset Number</th>
                <td><?php echo $row['asset_number']; ?></td>
            </tr>
            <tr>
                <th>Serial Number</th>
                <td><?php echo $row['serial_number']; ?></td>
            </tr>
            <tr>
                <th>Capacity (SWL)</th>
                <td><?php echo $row['capacity_swl']; ?></td>
            </tr>
            <tr>
                <th>Date of Previous Test of Crane</th>
                <td><?php echo $row['previous_test_date']; ?></td>
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
                <td><?php echo $row['crane_structure_condition']; ?></td>
                <td>Auto Moment Limiter (LMI):</td>
                <td><?php echo $row['auto_moment_limiter']; ?></td>
            </tr>
            <tr>
                <td>Swinging / Slewing Function:</td>
                <td><?php echo $row['swinging_slewing_function']; ?></td>
                <td>Anti-Two-Block (A2B) Function:</td>
                <td><?php echo $row['anti_two_block']; ?></td>
            </tr>
            <tr>
                <td>Hydraulic & Pneumatic System:</td>
                <td><?php echo $row['hydraulic_pneumatic_system']; ?></td>
                <td>Winch Drum Lock / Pawls:</td>
                <td><?php echo $row['winch_drum_lock_pawls']; ?></td>
            </tr>
            <tr>
                <td>Wire Ropes Condition:</td>
                <td><?php echo $row['wire_ropes_condition']; ?></td>
                <td>Hook Block Assembly:</td>
                <td><?php echo $row['hook_block_assembly']; ?></td>
            </tr>
            <tr>
                <td>Boom Lifting, Extending & Retracting:</td>
                <td><?php echo $row['boom_lifting_extending_retracting']; ?></td>
                <td>Boom Angle Indicator:</td>
                <td><?php echo $row['boom_angle_indicator']; ?></td>
            </tr>
            <tr>
                <td>Emergency Boom Lowering:</td>
                <td><?php echo $row['emergency_boom_lowering']; ?></td>
                <td>Emergency Shutdown:</td>
                <td><?php echo $row['emergency_shutdown']; ?></td>
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
            <th class="text-center section-title" colspan="2">INSPECTED BY</th>
            <th class="text-center section-title" colspan="2">APPROVED BY:</th>
            <th class="text-center section-title" colspan="2">Company Seal</th>
			
			
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
            <td class="section-title" colspan="2"></td>
          </tr>
          <tr>
          <td class="text-center">
    <strong><?php echo htmlspecialchars($row['inspector']); ?></strong>
</td>
<td>
    <?php
    // Construct the signature image path
    $signature_image_path = "../../inspector/uploads/" . urlencode($row['inspector']) . "/images/signature_image.jpg";

    // Check if the signature file exists
    if (file_exists($signature_image_path)) {
        echo "<img src='$signature_image_path' class='sign' alt='Inspector Signature'>";
    } else {
        // Placeholder image if the signature doesn't exist
        echo "<img src='../sign.jpg' class='sign' alt='Default Signature'>";
    }
    ?>
</td>

           <td class="text-center"><strong>TECHNICAL MANAGER</strong></td>
           <td>
    <?php
    // Construct the signature image path
    $technical_manager_name = urlencode($row['technical_manager']);
    $technical_manager_signature_path = "../uploads/{$technical_manager_name}.png";

    // Check if the signature file exists
    if (file_exists($technical_manager_signature_path)) {
        echo "<img src='$technical_manager_signature_path' class='sign' alt='Technical Manager Signature'>";
    } else {
        // Placeholder image if the signature doesn't exist
        echo "<img src='../sign.jpg' class='sign' alt='Default Signature'>";
    }
    ?>
</td>
           <td class="text-center"><strong>COMPANY SEAL </strong></td>
           <td> <img src="../seal.png" class="sign" alt="Header Image"></td>
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
  <div class="text-center">
    <a href="download.php?project_no=<?php echo $row['project_no']; ?>" >
        <button>Download</button>
    </a>
</div>
</body>
</html>