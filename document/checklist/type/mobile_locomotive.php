<?php 
include_once('../../../file/config.php'); // include your database connection

// Check if checklist_type parameter is set in the URL, use 'wheel-loader' as default for testing
$checklist_type = isset($_GET['checklist_type']) ? $_GET['checklist_type'] : 'wheel-loader';

// Debug line to check the checklist_type
echo "Checklist Type: " . htmlspecialchars($checklist_type) . "<br>";

if (!empty($checklist_type)) {
    // SQL query to fetch data from the 'checklist_information' table based on checklist type
    $query = "SELECT * FROM checklist_information WHERE checklist_type = '$checklist_type';";
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);  // Fetch record into $row array
    } else {
        echo "No record found!";
        $row = []; // Initialize as an empty array if no record found
    }
} else {
    echo "No checklist type provided!";
    $row = []; // Initialize as an empty array if checklist type is not provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR MOBILE AND LOCOMOTIVE CRANES  </title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
	
	  <div class="table-responsive">
      <table class="w-100">
            <tr>
        <td rowspan="4" class="logo-cell ">
            <img src="../logo.png"  alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
        </td>
        <td colspan="3" class="no-border">
            <span class="main-title">CRANE INSPECTION & MAINTENANCE SERVICES</span><br>
            A DIVISION OF AL-KHOBAR GATE INTERNATIONAL TRADING EST.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="">
            <strong>INSPECTION CHECKLIST FOR MOBILE AND LOCOMOTIVE CRANES  </strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.1</td>
        <td>Revision 04</td>
        <td><b>Issue Date: </b>22/AUG/2021</td>
    </tr>
    <tr>
        <td class="left-align"><b>Prepared By:</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By:</b><br>Managing Director</td>
   
   <td><img src="../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
            <!-- <table class="table table-bordered">
                <tbody>
				
				<tr>
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR MOBILE AND LOCOMOTIVE CRANES  </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.1</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 04</strong></td>                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 22/AUG/2021</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>MOBILE & LOCOMOTIVE CRANES


</h4>
        <h4> ASME B30.5-2018</h4>
		
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
            <table class="table table-bordered">
                
				
				<tr>
                <th style="width: 25%;">REPORT NO:</th>
                <td style="width: 25%;"> <?php echo htmlspecialchars($row['report_no']); ?></strong></td>
                <th style="width: 25%;">INSPECTION DATE:</th>
                <td style="width: 25%;"> <?php echo htmlspecialchars($row['inspection_date']); ?></strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME:</th>
                <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                <th>INSPECTED BY:</th>
                <td><?php echo htmlspecialchars($row['inspected_by']); ?></td>
            </tr>
            <tr>
        <th>LOCATION:</th>
        <td><?php echo htmlspecialchars($row['location']); ?></td>
        <th>STICKER NO.:</th>
        <td><?php echo htmlspecialchars($row['sticker_no']); ?></td>
    </tr>
    <tr>
        <th>CRANE ASSET NO:</th>
        <td><?php echo htmlspecialchars($row['crane_asset_no']); ?></td>
        <th>CRANE SERIAL NO.:</th>
        <td><?php echo htmlspecialchars($row['crane_serial_no']); ?></td>
    </tr>
    <tr>
        <th>EQUIPMENT TYPE:</th>
        <td><?php echo htmlspecialchars($row['equipment_type']); ?></td>
        <th>CAPACITY (SWL):</th>
        <td><?php echo htmlspecialchars($row['capacity_swl']); ?></td>
    </tr>
            
        </table>
</div>
        

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">S.N</th>
                    <th style="text-align: center;">ACCEPTANCE CRITERIA</th>
<th style="text-align: center;">REFERENCE</th>					
                    <th style="text-align: center;" colspan="3">RESULT</th>                    
                    <th style="text-align: center;">REMARKS/ RECOMMENDATIONS</th>
                </tr>
				
				<tr>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">GENERAL REQUIREMENTS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>

 <tr>
                <td><strong>1.1</strong></td>
                <td><strong>  Equipment Documentation is available</strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.5) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>1.2</strong></td>
                <td><strong>  Previous Inspection reports are checked  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.5)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.3</strong></td>
                <td><strong>  Durable load chart is provided in an accessible location  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.1, 5.1.1.3(b) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.4</strong></td>
                <td><strong> Load rating chart is available </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.3(a), Fig.11)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.5</strong></td>
                <td><strong>  Operator is qualified (for the inspected crane type/model) and licensed </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.1, 5.1.1.2, 5.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.6</strong></td>
                <td><strong>  A sign is posted warning the operator not to rely solely on any automatic device as a substitute for safe operating practices  </strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE – 06  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.7</strong></td>
                <td><strong>  Rated capacity of crane is marked   </strong></td>
				<td style="text-align: center;"><strong> CIMS QHSE – 06 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.8</strong></td>
                <td><strong>  Fire extinguisher is in place with minimum rating 10 BC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.3.4.10) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>1.9</strong></td>
                <td><strong> Markings and direction of all control levers are clearly displayed </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.1, Fig.12, Fig.13) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>1.10</strong></td>
                <td><strong> Crane’s backward stability is in accordance with manufacturers standards (minimum radius and no-load condition) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 sec.1.2 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
            
			</tbody>
			
			<thead class="thead-dark">
				<tr>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">GENERAL INSPECTION POINTS</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;"> </th>
                    <th style="text-align: center;"> </th>
                    <th style="text-align: center;"> </th>
                    <th> </th>
                </tr>
			</thead>
			<tbody>
			
			<tr>
                <td><strong>2.1</strong></td>
                <td><strong>Load – holding check valve of boom is operational </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.3.1d)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.2</strong></td>
                <td><strong> Two (2) full wraps of rope remain on the drum when hook is in the extreme low position  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.3.2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.3</strong></td>
                <td><strong> Swing control is smoothly operating on acceleration and deceleration  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.4.1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.4</strong></td>
                <td><strong>  Swing braking operates, as well as positive locking devices (manual and auto) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.4.2)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.5</strong></td>
                <td><strong>  Travel controls are properly operating / functioning </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.1b) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.6</strong></td>
                <td><strong> Auxiliary travel controls function correctly for multiple control – station cranes  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.1b) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.7</strong></td>
                <td><strong>Travel brakes and locks for crawler cranes are correctly operating   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.5.3a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.8</strong></td>
                <td><strong>  Travel brakes and locks for wheel – mounted cranes are correctly operating </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.3b) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.9</strong></td>
                <td><strong> Power plant controls of superstructure – mounted power plant working properly  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.3a-d) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.10</strong></td>
                <td><strong>  Rotation – resistant and fiber – core ropes are not used for boom hoist reeving </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.2c) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.11</strong></td>
                <td><strong>  Sheave grooves have surface smoothness without any defects </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4a) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.12</strong></td>
                <td><strong> Sheave guards are in place on the lower block  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4c) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.13</strong></td>
                <td><strong> All sheaves can be lubricated (except permanently lubricated types)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4d) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.14</strong></td>
                <td><strong>All cab doors glazing’s are safety glazing material   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.1b) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.15</strong></td>
                <td><strong>  Verify cab doors functionality and condition </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.8.1c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.16</strong></td>
                <td><strong> Seat belt is fitted and in good condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.1e) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.17</strong></td>
                <td><strong> Walking platforms and areas of structure are skid - resistance  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.8.3c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.18</strong></td>
                <td><strong> Guard rails are fitted for crawler cranes  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.31) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.19</strong></td>
                <td><strong>Fixed or telescoping bumper for boom stop is functional (if fitted)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1a1)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			
			<tr>
                <td><strong>2.20</strong></td>
                <td><strong>  Shock absorbing bumper for boom stop is functional (if fitted) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1a2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			
			<tr>
                <td><strong>2.21</strong></td>
                <td><strong>Hydraulic boom elevating cylinder, used as boom stop is functional (if fitted)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1a3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.22</strong></td>
                <td><strong>Boom angle indicator is fitted, operable, and can be read from the operator station   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.23</strong></td>
                <td><strong> Boom shut – off or hydraulic relief is provided for high angle boom condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1d) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.24</strong></td>
                <td><strong>  Boom length indicator is fitted for telescoping booms and is working </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.1.9.1e)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.25</strong></td>
                <td><strong>Anti - two blocking devices are fitted and working (main and auxiliary)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.9.1)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.26</strong></td>
                <td><strong> Operation and accuracy of the fitted LMI (compare with load chart over a range of angles and radius)  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.9.2)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.27</strong></td>
                <td><strong>Outrigger extensions are fully extendable   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.2)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.28</strong></td>
                <td><strong> Outriggers and jacks are not leaking oil  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.29</strong></td>
                <td><strong>Jack is in good operating condition at each outrigger   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.30</strong></td>
                <td><strong>  Each outrigger jack locking device is functional
(if fitted)
 </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.31</strong></td>
                <td><strong> No leakage from each jack seal when the crane is jacked up  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.32</strong></td>
                <td><strong> Outrigger jack bolts are fully secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.33</strong></td>
                <td><strong> All road wheel nuts are fully secure  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.34</strong></td>
                <td><strong>  All tires are serviceable and without damage or exist wear </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.35</strong></td>
                <td><strong> Full tank supports and straps are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.36</strong></td>
                <td><strong>Hydraulic oil tank supports and straps are secure   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.37</strong></td>
                <td><strong> Mud wing bolts are secure and none missing  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.38</strong></td>
                <td><strong> Underside of chassis shows no obvious faults  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.39</strong></td>
                <td><strong> Outrigger boxes are not cracked  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.40</strong></td>
                <td><strong>  Front and rear steering cylinder anchor points and pins are secure </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.41</strong></td>
                <td><strong> Truck rod end joints are not worn and are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.42</strong></td>
                <td><strong>  Axle bolts and nuts are fully secure </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.43</strong></td>
                <td><strong> Wheel hub oil seals are not leaking  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.44</strong></td>
                <td><strong>Brake linings are not oil contaminated   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.45</strong></td>
                <td><strong> Brake hoses have not deteriorated, e.g. cracks, splits, leaks, etc.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.46</strong></td>
                <td><strong>  All chassis cross members are not cracked or corroded </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.47</strong></td>
                <td><strong> Transmission mounting bolts and bushings are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.48</strong></td>
                <td><strong>  All drive shaft bolts and universal joints are not worn </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.49</strong></td>
                <td><strong> Ring gear bolts are fully secure  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.50</strong></td>
                <td><strong> Rear axle lock - out cylinder lock - up the axle correctly  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.51</strong></td>
                <td><strong>  All hydraulic hoses under chassis have not deteriorated (cracks, splits, leaks) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
		

<tr>
                <td><strong>2.52</strong></td>
                <td><strong>  Engine mountings have not gone soft with oil contamination </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.53</strong></td>
                <td><strong> Engine shows no major oil leakage  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.54</strong></td>
                <td><strong>  Radiator does not leak water </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.55</strong></td>
                <td><strong> •	Rope of free of damages<br/>
                    •	1 broken wire protruding from the core<br/>
                    •	Wear 1/3 of the original diameter of outside individual wires<br/>
                    •	Kinking, Crushing, Bird Caging, or other distortion
                    (For running ropes:<br/>
                    •	Max of 6 randomly broken wires in 1 lay<br/>
                    •	3 broken wires in 1 strand of 1 lay)
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.55</strong></td>
                <td><strong> (For rotation resistance ropes:<br/>
•	2 randomly distributed broken wires in six rope diameters<br/>
•	4 randomly distributed broken wires in 30 rope diameters<br/>
•	Evidence of any heat damage from any case<br/>
•	Reductions from nominal diameter)


                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.56</strong></td>
                <td><strong> Auxiliary hoist rope (if fitted) is free of damage and
                    Wear (Replace if the broken wire and/or wear criteria for the given rope type is exceeded for running ropes, as in 2.55
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.57</strong></td>
                <td><strong>  Main hoist drum mounting bolts are secure </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.58</strong></td>
                <td><strong> Auxiliary hoist drum mounting bolts are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.59</strong></td>
                <td><strong> Drum rotation indicator(s) are provided.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.3.2(a)(5)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.60</strong></td>
                <td><strong> Rear telescope side and top wear pads are serviceable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.61</strong></td>
                <td><strong>  Bottom and side wear pads of telescope sections are serviceable </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.62</strong></td>
                <td><strong> Boom heel pin bushes are not worn (rock boom up and down to check this)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.63</strong></td>
                <td><strong>  Boom – over rear alarm operates </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.6) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>


<tr>
                <td><strong>2.64</strong></td>
                <td><strong>  Double plate at top of lower boom is not distorted with side weld splitting for AT and RT Cranes (Plate requires renewal if this is the case) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.65</strong></td>
                <td><strong> Center swivel coupling pipes and hoses do not leak  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.66</strong></td>
                <td><strong> Center swivel coupling bolts are all secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.67</strong></td>
                <td><strong>Boom lift cylinder anchor bolts and bushings are secure   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.68</strong></td>
                <td><strong> Swing gearbox mounting bolts are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.69</strong></td>
                <td><strong>  Swing gearbox bottom oil seal and drive gear are in a serviceable condition (Should be well lubricated) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.70</strong></td>
                <td><strong>  Horn is working  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.11) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.71</strong></td>
                <td><strong> Crane level indicator is fitted and working  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.11)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.72</strong></td>
                <td><strong> Engine gauges and associated indicators are working  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.73</strong></td>
                <td><strong>  Starter safety switch for automatic transmission is functional </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.74</strong></td>
                <td><strong>The warning sign stating power line required clearances is visible to the operator  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.12g) </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.75</strong></td>
                <td><strong>  Swing away fly jib lock pins are secure (with fly jib stowed) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
<tr>
                <td><strong>2.76</strong></td>
                <td><strong>  The power pin fly jib is operable and undamaged </strong></td>
				<td style="text-align: center;"><strong> QHSE - 06 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.77</strong></td>
                <td><strong>  Cat head sheaves (jib) turn freely and are undamaged </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.7.4)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.78</strong></td>
                <td><strong>  Load block sheaves turn freely and are undamaged </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.79</strong></td>
                <td><strong> Hook assemblies are equipped with safety latches  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.6) </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.80</strong></td>
                <td><strong> Hook assembly labeling and manufacturer data is clearly marked  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 (10.1.1.1)  </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.81</strong></td>
                <td><strong> Hook’s weight is clearly marked/printed on the hook  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 (10.1.1.1)  </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.82</strong></td>
                <td><strong>  Safe working load of hook is clearly marked on the item </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.1.1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.83</strong></td>
                <td><strong> Hook does not show defects such as nicks, cracks and gouges  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.2c3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.84</strong></td>
                <td><strong>  Hook is not bent or twisted<br/>
                    •	Max. bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer recommendations
                     </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.85</strong></td>
                <td><strong> Hook is not distorted in the throat opening<br/>
                    •	Max. allowable throat opening is 15% compared to new hook, or as per manufacturer recommendations
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.86</strong></td>
                <td><strong> Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.87</strong></td>
                <td><strong>   Hook is not cracked, gouged or shows nicks</strong></td>
				<td style="text-align: center;"><strong>  ASME B30.10 (10.1.2.1.2c3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>

<tr>
                <td><strong>2.88</strong></td>
                <td><strong> Hook can lock (if it is a self-locking hook)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c4) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.89</strong></td>
                <td><strong>  Hook latch is operative </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c5) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.90</strong></td>
                <td><strong> Rope guards and locked in position with pins (hook block)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.91</strong></td>
                <td><strong>  Dead end rope anchor is fitted with a lock pin (hook block) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.7.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.92</strong></td>
                <td><strong> Dead end rope anchor is correctly made with a suitable wedge socket and loop- back termination  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.93</strong></td>
                <td><strong>  Reverse travel alarm is operational </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.94</strong></td>
                <td><strong>  Turning signals and indicators are working correctly </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.95</strong></td>
                <td><strong> Road lighting, including spotlights, are in good condition and operable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.96</strong></td>
                <td><strong> Brakes operate on all wheels  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.5.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.97</strong></td>
                <td><strong>   Track pads are undamaged</strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.98</strong></td>
                <td><strong>  Drive chains are correctly tensioned </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.99</strong></td>
                <td><strong>  Drive sockets and tumblers are serviceable </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>


<tr>
                <td><strong>3.00</strong></td>
                <td><strong>  Top and bottom swing rollers and tracks are in good overall condition (Should be well lubricated) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			


<tr>
                <td><strong>3.1</strong></td>
                <td><strong> Track idlers are serviceable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			


<tr>
                <td><strong>3.2</strong></td>
                <td><strong>  Boom back  stops are functioning </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.3</strong></td>
                <td><strong>  Back A-Frame is in good condition </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.4</strong></td>
                <td><strong> Boom cut-out (at maximum angle) is operable  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.5</strong></td>
                <td><strong> Power low lowering is operational  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.6</strong></td>
                <td><strong> Boom hoist safety pawl is engaging  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.3.2)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.7</strong></td>
                <td><strong> Boom chords and lacings are undamaged (bent)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.8</strong></td>
                <td><strong> Bridal sheaves are turning and free from surface defects  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.9</strong></td>
                <td><strong> Pendant ropes are showing no broken wires (see 2.0.55)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			

<tr>
                <td><strong>3.10</strong></td>
                <td><strong>  Operation of steering brakes is satisfactory </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			
			
			
			<tr>
                <td><strong>3.11</strong></td>
                <td><strong> Main machinery guarding is in place  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.6)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
<tr>
                <td><strong>3.12</strong></td>
                <td><strong> Main clutch is fully operational  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
<tr>
                <td><strong>3.13</strong></td>
                <td><strong> Main boom and hoist drum brakes are fully functional  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
<tr>
                <td><strong>3.14</strong></td>
                <td><strong>  LMI is fitted, operational and accurate for bool length, rated load, angle, radius, etc. (for 3 ton cranes or more) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (1.9.10.2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
<tr>
                <td><strong>3.15</strong></td>
                <td><strong> Wind Speed Device (Anemometer) working correctly.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.3.2.1.6) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>			
			
			
			</tbody>
			
			
			
			
        </table>
</div>
        


    
        

      	

       
		
		
		<div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th style="width: 25%;">INSPECTOR’S NAME:</th>
                <td style="width: 25%;"></strong></td>
                <th style="width: 25%;">CLIENT’S REP. NAME:</th>
                <td style="width: 25%;"></strong></td>
            </tr>
            <tr>
                <th>SIGNATURE & DATE:</th>
                <td><strong></strong></td>
                <th>SIGNATURE & DATE:</th>
                <td><strong></strong></td>
            </tr>
            
           
        </table>


        
    </div>
	    </div>
	  <script>
    function preparePrint() {
      // Change the headers before printing
      document.querySelectorAll('#data-table thead tr th').forEach((th, index) => {
        if (index % 4 === 0) {
          th.textContent = 'Print Header Set ' + (Math.floor(index / 4) + 1);
        } else {
          th.textContent = 'Print Column ' + index;
        }
      });
      // Trigger print dialog
      window.print();
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
