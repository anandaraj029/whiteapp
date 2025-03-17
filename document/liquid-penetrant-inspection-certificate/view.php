<?php
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
    $conn->close();
} else {
    die("Project number not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquid Penetrant Inspection Certificate</title>
	<!-- <style>
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
      margin-bottom: 14px;
	  margin-top: 2px;
    }
    th, td {
      padding: 2px;
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

    @media (max-width: 600px) {
      table {
        font-size: 8px;
      }
    }
  </style> -->
	
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
      <h3 class="certificate-title"><strong> <br />
      LIQUID PENETRANT INSPECTION CERTIFICATE</strong></h3>
    </div>
    <h1></h1>
    <table style="margin-top: 38px;">
        <tr>
            <td class="text-center section-title" style="width: 25%;">CERTIFICATE NO.</td>
            <td style="text-align: center; width: 25%;"><strong><?php echo htmlspecialchars($row['certificate_no']); ?></strong></td>

            <td class="text-center section-title" style="width: 25%;">REFERENCE NO.</td>
            <td style="text-align: center; width: 25%;"><strong><?php echo htmlspecialchars($row['reference_no']); ?></strong></td>
        </tr>
        <tr>
            <td class="section-title" style="text-align: center;">CUSTOMER NAME</td>
            <td colspan="3" style="text-align: center;"><strong><?php echo htmlspecialchars($row['customer_name']); ?></strong></td>
        </tr>
        <tr>
            <td class="text-center section-title">SITE/LOCATION</td>
            <td style="text-align: center;" colspan="3"><strong><?php echo htmlspecialchars($row['location']); ?></strong></td>

        </tr>
        <tr>
            <td class="text-center section-title">INSPECTION DATE</td>
            <td style="text-align: center;"><strong><?php echo htmlspecialchars($row['inspection_date']); ?></strong></td>

            <td class="text-center section-title">NEXT INSPECTION DATE</td>
            <td style="text-align: center;"><strong>
                <?php echo htmlspecialchars($row['next_inspection_date']); ?>
            </strong></td>

        </tr>
    </table>

    <table>
        <tr>
            <td class="text-center section-title" colspan="4">TESTING PREPARATION</td>
        </tr>
        <tr>
            <td class="text-center section-title" style="width: 25%;">STANDARD</td>
            <td style="text-align: center;"><strong><?php echo htmlspecialchars($row['standard']); ?></strong></td>

            <td class="text-center section-title" style="width: 25%;">MATERIAL</td>

            <td style="text-align: center;"><strong><?php echo htmlspecialchars($row['material']); ?></strong></td>


        </tr>
        <tr>
            <td class="text-center section-title">SURFACE TEMPERATURE</td>
            <td style="text-align: center;" colspan="3"><strong><?php echo htmlspecialchars($row['surface_temperature']); ?></strong></td>

        </tr>
    </table>

    <table>
        <tr>
            <td class="text-center section-title" colspan="6">TESTING TOOLS</td>
        </tr>
        <tr>
            <td colspan ="2" style="width: 25%;" class="section-title">TECHNIQUE/PROCEDURE</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['technique_procedure']); ?>
        </strong></td>
            <td colspan ="2" class="section-title">BRAND</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['brand']); ?>
        </strong></td>
        </tr>
        <tr>
            <td class="text-center section-title">PENETRANT</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['penetrant']); ?>
        </strong></td>
			 <td class="text-center section-title">PENETRANT APPLY</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['penetrant_apply']); ?>
        </strong></td>
            <td class="text-center section-title">DWELL TIME</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['dwell_time']); ?>
        </strong></td>
        </tr>
        <tr>
            <td colspan ="2" class="section-title">CLEANER</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['cleaner']); ?>
        </strong></td>
            <td colspan ="2" class="section-title">REMOVE APPLY</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['remove_apply']); ?>
        </strong></td>
        </tr>
        <tr>
            <td  class="section-title">DEVELOPER</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['developer']); ?>
        </strong></td>
			<td class="text-center section-title">DEVELOPER APPLY</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['developer_apply']); ?>
        </strong></td>
            <td class="text-center section-title">DEVELOPING TIME</td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['developing_time']); ?>
        </strong></td>
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
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['description']); ?>
        </strong></td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['item_checked']); ?>
        </strong></td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['results']); ?>
        </strong></td>
            <td style="text-align: center;"><strong>
            <?php echo htmlspecialchars($row['condition_new']); ?>
        </strong></td>
        </tr>
    </table>
	
	
	
	
	
	<table>
        
        <tr style="height: 100px;">
            <td class="text-center" style="text-align: center;">
            <strong>
            <?php echo htmlspecialchars($row['description_1']); ?>
</strong>

            </td>
            <td class="text-center" style="text-align: center;">
            <strong>
            <?php echo htmlspecialchars($row['description_2']); ?>
</strong>
            
            </td>
            <td class="text-center" style="text-align: center;">
                <strong>
            <?php echo htmlspecialchars($row['description_3']); ?>
</strong>

            </td>
            
        </tr>
        
    </table>
	
	
	<table>
	
	<tr>
            <td colspan="2" class="text-center section-title">INSPECTOR </td>
            
            <td colspan="2" class="text-center section-title">AUTHENTICATING PERSON</td>
            
        </tr>
        

        <?php
function getImagePath($name) {
    $extensions = ['png', 'jpg', 'jpeg'];
    foreach ($extensions as $ext) {
        $path = "uploads/{$name}.{$ext}";
        if (file_exists($path)) {
            return $path;
        }
    }
    return "uploads/default.png"; // Fallback image
}
?>


<tr>
    <td style="text-align: center; width: 25%;">
        <strong><?php echo htmlspecialchars($row['inspector_name']); ?></strong>
    </td>
    <td style="text-align: center; width: 25%;" class="text-center">
        <img src="<?php echo getImagePath($row['inspector_name']); ?>" height="33px">
    </td>
    <td style="text-align: center; width: 25%;">
        <strong><?php echo htmlspecialchars($row['authenticating_person_name']); ?></strong>
    </td>
    <td style="text-align: center; width: 25%;" class="text-center">
        <img src="<?php echo getImagePath($row['authenticating_person_name']); ?>" height="33px">
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