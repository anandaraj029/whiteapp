<?php 
include_once('../../../file/config.php'); // include your database connection

// Check if checklist_type parameter is set in the URL, use 'wheel-loader' as default for testing
// $checklist_type = isset($_GET['checklist_type']) ? $_GET['checklist_type'] : 'wheel-loader';
$checklist_type = $_GET['checklist_type'] ? $_GET['checklist_type'] : 'wheel-loader';

// Debug line to check the checklist_type
echo "Checklist Type: " . htmlspecialchars($checklist_type) . "<br>";

if (!empty($checklist_type)) {
    // SQL query to fetch data from the 'checklist_information' table based on checklist type
    $query = "SELECT * FROM checklist_information WHERE checklist_type = 'Storage Retrieval';";
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);  // Fetch record into $row array
    } else {
        echo "No record found!";
    }
} else {
    echo "No checklist type provided!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL </title>
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
            <strong>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.5</td>
        <td>Revision 02</td>
        <td><b>Issue Date: </b>30/SEP/2020</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.5</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>STORAGE RETRIEVAL</h4>
        <h4> ASME B30.13-2017   </h4>
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->
         <?php if (isset($row)): ?>
         <div class="table-responsive">


        <table class="table table-bordered">
            <tr>
                <th style="width: 25%;">REPORT NO:</th>
                <td style="width: 25%;"><strong><?php echo $row['report_no']; ?></strong></td>
                <th style="width: 25%;">INSPECTION DATE:</th>
                <td style="width: 25%;"><strong><?php echo date('F j, Y', strtotime($row['inspection_date'])); ?></strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME:</th>
                <td><strong><?php echo $row['client_name']; ?></strong></td>
                <th>INSPECTED BY:</th>
                <td><strong><?php echo $row['inspected_by']; ?></strong></td>
            </tr>
            <tr>
                <th>LOCATION:</th>
                <td><strong><?php echo $row['location']; ?></strong></td>
                <th>STICKER NO.:</th>
                <td><strong><?php echo $row['sticker_no']; ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT NO:</th>
                <td><strong><?php echo $row['equipment_type']; ?></strong></td>
                <th>EQUIP.SERIAL NO.:</th>
                <td><strong><?php echo $row['crane_serial_no']; ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE:</th>
                <td><strong><?php echo $row['equipment_type']; ?></strong></td>
                <th>CAPACITY (SWL):</th>
                <td><strong><?php echo $row['capacity_swl']; ?></strong></td>
            </tr>
        </table>

</div>
<?php endif; ?>
        

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">S.N</th>
                    <th style="text-align: center;">ACCEPTANCE CRITERIA</th>
<th style="text-align: center;">REFERENCE</th>					
                    <th style="text-align: center;" colspan="3">RESULT</th>                    
                    <th style="text-align: center;">REMARKS</th>
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
                <td><strong>   Equipment documentation is available</strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.11 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>1.2</strong></td>
                <td><strong> Previous inspection reports are checked </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.1.5  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>1.3</strong></td>
                <td><strong> Rated load is clearly marked and visible to the operator </strong></td>
				<td style="text-align: center;"><strong> CIMS-QHSE-06 (13.1.1.1)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>1.4</strong></td>
                <td><strong> Warning and cautionary labels are affixed at aisle entrance points or access positions and are durable and legible </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 
sec. 1.1.2
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>1.5</strong></td>
                <td><strong> Clearances and tolerances within the system are as determined by the manufacturer or user (specifications) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.2  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>1.6</strong></td>
                <td><strong> A fire extinguisher with minimum 10BC rating is available (in the cab) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec..1.4.3  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            
			</tbody>
			
			<thead class="thead-dark">
            <tr>
                <th style="text-align: center;">2</th>
                <th style="text-align: center;">INSPECTION POINTS</th>
				<th style="text-align: center;"> </th>				
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			<tbody>
			
			<tr>
                <td><strong>2.1</strong></td>
                <td><strong> Welded members and joints are free of defects, cracks and corrosion  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13
Sec. 1.3.3
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.2</strong></td>
                <td><strong> Structures and supports of S/R machine are not cracked , corroded or deformed  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 
sec .2.1.3(a)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.3</strong></td>
                <td><strong> Structures and supports of S/R machine are free of unusual vibrations    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 
sec. 1.3.2.1(a2)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.4</strong></td>
                <td><strong> S/R machine rails are straight, leveled and properly joined  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 
Sec.1.3.2.1(a3)
 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.5</strong></td>
                <td><strong>  Stops are provided at the limits of travel of the S/R machine and aisle transfer car  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 Sec.1.3.2.1(b1),1.7.1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.6</strong></td>
                <td><strong>Structure and S/R machine shows no loose bolts or rivets.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec..2.1.3b  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.7</strong></td>
                <td><strong> All devices/controls required for operation are within convenient reach of operator </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.4.1(a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.8</strong></td>
                <td><strong> The cab interior is free of knobs, edges or corners    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.4.2(a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.9</strong></td> 
                <td><strong> The cab door, if fitted, opens inward or slides and is self-closing with a positive latch </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.4.2(c)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.10</strong></td>
                <td><strong> Emergency exits to the floor are available for all positions of a carriage mounted cab </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.4.2(d)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.11</strong></td>
                <td><strong> All cab glazing is safety glazing material</strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.4.2(f)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.12</strong></td>
                <td><strong>  Cab lighting to be adequate (either natural or artificial) to enable the operator observe the controls    </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.4.4 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.13</strong></td>
                <td><strong> All ladders and platforms are secure and not corroded or damaged  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.6.2  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.14</strong></td>
                <td><strong> Ladder access opening to platforms is 24"x 27" with hinged cover  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.6.2,1.2.3  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.15</strong></td>
                <td><strong> Platforms have non-slip walking surfaces</strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.6.2(b)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.16</strong></td>
                <td><strong> Bumpers provide required stop of an S/R machine or aisle transfer car travelling at rated load and speed from causing structural damage to the equipment</strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.7.2  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.17</strong></td>
                <td><strong> Runway interlocks are provided to prevent travel between the aisle and aisle transfer car unless the tracks are aligned  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.7.3(a)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.18</strong></td>
                <td><strong> Sweeps are fitted in front of the runway wheels    </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.7.4 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.19</strong></td>
                <td><strong> Guards for hoisting ropes or chains are fitted where appropriate to prevent chafing</strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.7.5 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>2.20</strong></td>
                <td><strong>   Guards are fitted over moving parts such as gears, sprockets ,chains and ropes where these constitute a hazard  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.7.5  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.21</strong></td>
                <td><strong>  Holding brake exists (at least one) for each independent hoisting unit of the S/R machine (125% full load hoisting torque for non-mechanical brake and 100% for a mechanical one - holding brake shall be applied automatically when power to the brake is removed)   </strong></td>
				<td style="text-align: center;"><strong> 
ASME B30.13 sec.1.8.1(a),
Sec.1.8.2(a)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.22</strong></td>
                <td><strong>     </strong></td>
				<td style="text-align: center;"><strong>   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.23</strong></td>
                <td><strong>  Holding brake is applied automatically when power to the brake is removed   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.8.2(c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.24</strong></td>
                <td><strong>   Control braking is capable of maintaining controlled travel or lowering speeds  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.8.3 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			
            <tr>
                <td><strong>2.25</strong></td>
                <td><strong> Wearing surfaces of brake wheels, disks and drums are free of defects that could interfere with their operation    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.8.4(d)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.26</strong></td>
                <td><strong>  The electrical cables outside of control enclosures are fully protected and insulated (S/R machine or transfer car)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.1(c2)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.27</strong></td>
                <td><strong> Traveling cables are suspended at the carriage and S/R machine frame end as to reduce the strain on the individual conductors    </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.9.1(e)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.28</strong></td>
                <td><strong>    Supporting fillers are used for unsuspended travelling cable lengths exceeding 100ft (30m) </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.9.1(e) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.29</strong></td>
                <td><strong> The entire S/R machine is electrically grounded    </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.9.1(g)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.30</strong></td>
                <td><strong>  Any pendant control station is electrically grounded   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.1(i)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.31</strong></td>
                <td><strong> Live parts of electrical equipment are protected from direct exposure to grease, oil, dirt and moisture    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.2(b)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.32</strong></td>
                <td><strong>   Any guards fitted over live parts are not deformed  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.2(c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.33</strong></td>
                <td><strong>  Power disconnect between the power supply and the aisle contact conductor or travelling cable is provided (motor circuit switch or breaker)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.3(a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.34</strong></td>
                <td><strong>   Operation of limit sensors, which shut down any drive whose motion passes the extremity of designed travel, is satisfactory  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.4(a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.35</strong></td>
                <td><strong>  Operation of limit sensors where used to reduce speed prior to the machine reaching the extreme travel limit is satisfactory   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.9.4(b)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.36</strong></td>
                <td><strong>   Hoist motion over speed device operate independently from all other power, drive and electrical systems (carriage mounted cab only)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13
sec.1.10.8(b)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.37</strong></td>
                <td><strong>  Hoist motion over speed device causes controlled descent of no more than 200% of the rated lowering speed and stops the carriage when lowering rated speed exceeds 200% (carriage mounted cab only)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 
sec.1.10.8(c)
   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.38</strong></td>
                <td><strong>  Hoist motion over speed device operates when lowering rate speed exceeds 100 ft./min (0.5 m/s) or 150% of the rated lowering speed, whichever is greater (carriage mounted cab only)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13
sec.1.10.8(d)
   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.39</strong></td>
                <td><strong>  Over speed switch operation to stop descent of the carriage   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.10.8(e)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.40</strong></td>
                <td><strong>  Actual over speed figure at which the device is set to operate is clearly marked on the device in letters at least 6mm high   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.8(f)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.41</strong></td>
                <td><strong> Over speed device is sealed to prevent readjustment of the trip speed    </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.10.8(g)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.42</strong></td>
                <td><strong>  Control voltages do not exceed 150V AC or 300V DC   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.5  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.43</strong></td>
                <td><strong>  Controls at operator's cab are within reach of the operator (for arms and legs)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.6  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.44</strong></td>
                <td><strong>  Sequence of operation for the controls is verified (automatic control operating sequence)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.6  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.45</strong></td>
                <td><strong>  Audio and visual warning devices are operable   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13
sec.1.9.7
sec.2.1.2(b4)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.46</strong></td>
                <td><strong>   Emergency stop switch(es) are in good working condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.1.3(g)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.47</strong></td>
                <td><strong>  Electrical overload or power failure sensors are fitted   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.8a4-b3  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.48</strong></td>
                <td><strong>   Emergency stop actuator(s) in the aisle(s) are operable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.9.8(e)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.49</strong></td>
                <td><strong>  Correct sequence of operation under automatic and remote control of S/R machine and aisle transfer car is verified (In auto mode all motion is discontinued if the sequence is interrupted, or the last command is permissible if power is available. In remote mode if the signal is interrupted the machine stops)   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.9.9 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.50</strong></td>
                <td><strong>   Sheave grooves are smooth with no surface defects  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.10.1(a)(1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.51</strong></td>
                <td><strong>  Close fitting rope guides or guards are fitted where required to prevent momentary unloading of the rope   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.1(b)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.52</strong></td>
                <td><strong>  Sheaves have means of lubrication or are permanently lubricated   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.10.1(d)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.53</strong></td>
                <td><strong> Sheave pitch diameter is not less than 20 times the rope diameter    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.1(e)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.54</strong></td>
                <td><strong>  Rope drums are free from surface defects that could cause rope damage   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.2  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.55</strong></td>
                <td><strong> Rope end socket assemblies are undamaged and are to the manufacturer's specification (where fitted)    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.3(b)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.56</strong></td>
                <td><strong>Two wraps of rope remains on the drum (as a minimum) when the carriage is in the extreme low position</strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.10.3(c1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.57</strong></td>
                <td><strong>   Rope is correctly clamped to the drum (or with a socket arrangement) as per the rope or S/R machine manufacturers recommendations  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.10.3(c2)   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.58</strong></td>
                <td><strong>  Rope is free of damages
•	Max of 12 randomly broken wires in 1 lay
•	4 broken wires in 1 strand of 1 lay
•	1 broken wire protruding from the core (2 for rotation resistant ropes)
•	Wear of 1/3 of the original diameter of outside individual wires
Kinking, crushing, bird caging or other distortion
   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.4.1a1(c)
sec.2.4.2(b2)
  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.59</strong></td>
                <td><strong>  Sprocketed wheels and chain spockets are free from surface defects   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.13 sec.1.10.4(a)
sec.2.1.3(c)
   </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.60</strong></td>
                <td><strong> Sprockets, pocket wheels or running chains are adequately lubricated.    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.4(c)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.61</strong></td>
                <td><strong> All lines, tanks, valves, pumps, motors and other parts of fluid systems are not leaking    </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.2.1.2(a3/b3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.62</strong></td>
                <td><strong>  Bearings, shafts, gears and rollers are not worn, cracked or distorted   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.1.3(d)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.63</strong></td>
                <td><strong>  Rope equalizer pulley is free to turn and undamaged (if fitted)   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.1.10.6 </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.64</strong></td>
                <td><strong>   Carriage free fall stops are in place (can be activated mechanically by simulating a slack rope or chain condition)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.10.7(a)  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			
			<tr>
                <td><strong>2.65</strong></td>
                <td><strong>  Lifting and lowering function of the cab and carriage is satisfactory   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.2.2.1(a1) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			
			<tr>
                <td><strong>2.66</strong></td>
                <td><strong>  Horizontal travel function of the machine is satisfactory   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.2.2.1(a2) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.67</strong></td>
                <td><strong>  Shuttle function of the machine is satisfactory   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.13 sec.2.2.1(a3) </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
                <td><strong>2.68</strong></td>
                <td><strong> All moving parts of the S/R machine or aisle transfer car for which lubrication is specified, including rope and chain are lubricated    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.3.4(a)  </strong></td>
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
                <tbody>
				
				<tr>
                <th colspan="3" style="text-align: center;">REMARKS / RECOMMENDATIONS: </td>
				</tr>
            <tr>
                <td style="height: 120px;" colspan="3"> </td>
                
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
