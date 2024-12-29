<?php
include_once('../../file/config.php'); // include your database connection

// Get the project_id from the request (GET method)
$project_id = $_GET['project_id'] ?? ''; // Ensure that it is set

// Fetch the data based on project_id
$sql = "SELECT * FROM mpi_certificates WHERE project_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $project_id); // Assuming project_id is a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
} else {
    echo "No records found for the given report number.";
    exit;
}

// Fetch associated images from the mpi_images table
$image_sql = "SELECT image_path FROM mpi_images WHERE certificate_id = ?";
$image_stmt = $conn->prepare($image_sql);
$image_stmt->bind_param("i", $row['id']); // Use the certificate's id
$image_stmt->execute();
$image_result = $image_stmt->get_result();

$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnetic Particle Inspection Certificate</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
	
</head>
<body>
<div class="container">
<div class="header">
      <img src="../head2.jpg" class="head" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
    <h4 class="text-center" style="text-align: center; margin-top: 20px">MAGNETIC PARTICLE INSPECTION CERTIFICATE</h4>
    <div class="table-responsive">
        <table class="content-table">
            <tbody>
                <tr >
                <td class="section-title" style="text-align: center; width: 25%;">CERTIFICATE NO.</td>
                <td><strong><?php echo $row['certificate_no'] ?? 'N/A'; ?></strong></td>
                <td class="section-title" style="text-align: center">REFERENCE NO.</td>
                <td style="text-align: center"><strong><?php echo $row['reference_no'] ?? 'N/A'; ?></strong></td>
                </tr>
                <tr>
                <td class="section-title" style="text-align: center">CUSTOMER NAME</td>
                <td colspan="3"><strong><?php echo $row['customer_name'] ?? 'N/A'; ?></strong></td>
                </tr>
                <tr>
                <td class="section-title" style="text-align: center">LOCATION</td>
                <td colspan="3"><strong><?php echo $row['location'] ?? 'N/A'; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">INSPECTION DATE</td>
                <td style="text-align: center"><strong><?php echo $row['inspection_date'] ?? 'N/A'; ?></strong></td>
                <td class="section-title" style="text-align: center">NEXT INSPECTION DATE</td>
                <td style="text-align: center"><strong><?php echo $row['next_inspection_date'] ?? 'N/A'; ?></strong></td>
            </tr>
                
            </tbody>
        </table>
        
    </div>
	
	<div class="table-responsive">
        <table class="content-table">
            <tbody>
                
            <tr>
                <td class="section-title" style="text-align: center; width: 25%;">INSPECTED ITEM</td>
                <td colspan="3"><strong><?php echo $row['inspected_item'] ?? 'N/A'; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">SERIAL NUMBERS</td>
                <td colspan="3"><strong><?php echo $row['serial_numbers'] ?? 'N/A'; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">MANUFACTURER / EQUIP. NO.</td>
                <td colspan="3"><strong><?php echo $row['manufacturer'] ?? 'N/A'; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">STANDARDS</td>
                <td colspan="3"><strong><?php echo $row['standards'] ?? 'N/A'; ?></strong></td>
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
                <td style="text-align: center"><strong><?php echo $row['mpi_equip_type']; ?></strong></td>
                <td class="section-title" style="text-align: center">BRAND</td>
                <td style="text-align: center"><strong><?php echo $row['brand']; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">CURRENT</td>
                <td style="text-align: center"><strong><?php echo $row['current']; ?></strong></td>
                <td class="section-title" style="text-align: center">PROD. SPACING</td>
                <td style="text-align: center"><strong><?php echo $row['prod_spacing']; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">CONTRAST PAINT</td>
                <td style="text-align: center"><strong><?php echo $row['contrast_paint']; ?></strong></td>
                <td class="section-title" style="text-align: center">INK</td>
                <td style="text-align: center"><strong><?php echo $row['ink']; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">PARTICLE MEDIUM</td>
                <td style="text-align: center"><strong><?php echo $row['particle_medium']; ?></strong></td>
                <td class="section-title" style="text-align: center">YOKE S/N</td>
                <td style="text-align: center"><strong><?php echo $row['yoke_sn']; ?></strong></td>
            </tr>
            <tr>
                <td class="section-title" style="text-align: center">CALIBRATION EXPIRY DATE</td>
                <td style="text-align: center"><strong><?php echo $row['calibration_expiry_date']; ?></strong></td>
                <td class="section-title" style="text-align: center">MODEL NO.</td>
                <td style="text-align: center"><strong><?php echo $row['model_no']; ?></strong></td>
            </tr>
				
            </tbody>
        </table>
    </div>
	
	

    <div class="table-responsive">
    <table class="content-table">
        <tbody>
            <tr>
                <?php 
                if ($image_result->num_rows > 0) {
                    while ($image_row = $image_result->fetch_assoc()) {
                        echo '<td style="text-align: center;">
                                <img src="' . $image_row['image_path'] . '" alt="Certificate Image" style="display: block; margin: 0 auto; height: 150px;">
                              </td>';
                    }
                } else {
                    echo '<td style="text-align: center;">No images found for this certificate.</td>';
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>


	<!-- <div class="table-responsive">
        <table class="content-table">
            <tbody>
			<tr>
            <td style="text-align: center;">
                    <img src="<?php echo $row['image_path']; ?>" alt="Certificate Image" style="display: block; margin: 0 auto; height: 150px">
                </td>
                <td style="text-align: center;">
                    <img src="<?php echo $row['image_path']; ?>" alt="Certificate Image" style="display: block; margin: 0 auto; height: 150px">
                </td>
    </tr>
                			
            </tbody>
        </table>
    </div> -->

		
	

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
                    <td  style="text-align: center"><strong>SHAROON B. MASIH</strong></td>
                    
                    <td style="text-align: center"><strong>SIGNATURE</strong></td>
                    
                </tr>
                <tr>
                <td style="text-align: center"> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
                <td style="text-align: center"> <img src="../sign.jpg" class="sign" alt="Header Image"></td>
                </tr>
            </tbody>
        </table>
    </div>
	
	<p style="text-align: center; color: red"><strong>FRM.0702 (rev.02)</strong></p>
    <div class="footer">
            <img src="../foot.jpg" alt="Footer Image">
        </div>
   <!-- <div class="row mt-4">
        <div class="col-md-6">
            <p><strong>NDT INSPECTOR</strong></p>
            <p>SHAROON B. MASIH</p>
        </div>
        <div class="col-md-6 text-right">
            <p><strong>NDT LEVEL III</strong></p>
            <p>SIGNATURE</p>
        </div>
    </div>-->
    <div class="text-center">
    <a href="download.php?project_id=<?php echo $row['project_id']; ?>" >
        <button>Download</button>
    </a>
</div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
