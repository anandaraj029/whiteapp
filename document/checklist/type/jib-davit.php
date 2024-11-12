<?php 

include_once('./get-checklist.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR JIB CRANES & DAVITS</title>
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
            <strong>INSPECTION CHECKLIST FOR JIB CRANES & DAVITS</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.4</td>
        <td>Revision 00</td>
        <td><b>Issue Date: </b>30/SEP/2020</td>
    </tr>
    <tr>
        <td class="left-align"><b>Prepared By:</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By:</b><br>Managing Director</td>
   
   <td><img src="../../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
            <!-- <table class="table table-bordered">
                <tbody>
				
				<tr>
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR JIB CRANES & DAVITS</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.4</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 00</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>JIB CRANES & DAVITS</h4>
        <h4>ASME B30.10,ASME B30.11</h4>
		
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
            <table class="table table-bordered">
                
				
				<tr>
                <th style="width: 25%;">REPORT NO:</th>
                <td style="width: 25%;"></strong></td>
                <th style="width: 25%;">INSPECTION DATE:</th>
                <td style="width: 25%;"></strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME:</th>
                <td></strong></td>
                <th>INSPECTED BY:</th>
                <td></strong></td>
            </tr>
            <tr>
                <th>LOCATION:</th>
                <td><strong></strong></td>
                <th>STICKER NO.:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT NO:</th>
                <td><strong></strong></td>
                <th>EQUIP.SERIAL NO.:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE:</th>
                <td><strong></strong></td>
                <th>CAPACITY (SWL):</th>
                <td><strong></strong></td>
            </tr>
            
        </table>
</div>
        


<form method="post" action="./update_checklist.php">
<input type="hidden" name="checklist_no" value="<?php echo $row['checklist_id'] ?>" />
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
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
				</thead>
 
                <tbody>

		
 <tr>
                <td><strong>1.1</strong></td>
                <td><strong> Documentation is available</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[1]">
</td>
            </tr>
			<tr>
                <td><strong>1.2</strong></td>
                <td><strong> Equipment number is clearly marked for identification purposes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[2]">
</td>
            </tr>
			<tr>
                <td><strong>1.3</strong></td>
                <td><strong> Crane is painted safety yellow </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[3]">
</td>
            </tr>
			<tr>
                <td><strong>1.4</strong></td>
                <td><strong> Crane is painted safety yellow & black stripes for offshore. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[4]">
</td>
            </tr>
			<tr>
                <td><strong>1.5</strong></td>
                <td><strong> Safe Working Load (SWL) is clearly marked on the runway beam</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[5]">
</td>
            </tr>
				 <tr>
                <td><strong>1.6</strong></td>
                <td><strong> Pneumatic/electric control valves & switches are in good condition. No leaks are visible. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[6]">
</td>
            </tr>
			<tr>
                <td><strong>1.7</strong></td>
                <td><strong>Hoist & swing drives are capable of starts & stops with variable acceleration and deceleration required on normal operation </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[7]">
</td>
            </tr>
			<tr>
                <td><strong>1.8</strong></td>
                <td><strong> Hoist drum specificationss are marked (rated load, drum size, rope size, rope speed (ft/min. or m/s), rate dpower. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[8]">
</td>
            </tr>
			<tr>
                <td><strong>1.9</strong></td>
                <td><strong> Hand chain hoist: manufacturer data, serial number, safe working load are clearly marked/displayed. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[9]">
</td>
            </tr>
			<tr>
                <td><strong>1.10</strong></td>
                <td><strong> Electric hoist: manufacturer data, serial number, safe working load, voltage and phase are clearly marked/displayed. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[10]">
</td>
            </tr>
			 <tr>
                <td><strong>1.11</strong></td>
                <td><strong>Pneumatic hoist: manufacturer data, serial number, safe working load, rated air pressure are clearly marked/displayed.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[11]">
</td>
            </tr>
			<tr>
                <td><strong>1.12</strong></td>
                <td><strong>Warning signs/labels are provided on the hoist units and electrical enclosures</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[12]">
</td>
            </tr>
			<tr>
                <td><strong>1.13</strong></td>
                <td><strong>Structure is vibration free under normal condition.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[13]">
</td>
            </tr>
			<tr>
                <td><strong>1.14</strong></td>
                <td><strong>Jib crane end stop(s) is installed and in good condition.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[14]">
</td>
            </tr>
			<tr>
                <td><strong>1.15</strong></td>
                <td><strong>Tracks area properly installed and aligned</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[15]">
</td>
            </tr>
			 <tr>
                <td><strong>1.16</strong></td>
                <td><strong>Crane runway is fastened and secured to a supporting structure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[16]">
</td>
            </tr>
			<tr>
                <td><strong>1.17</strong></td>
                <td><strong>All welded members are free of defects and not corroded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[17]">
</td>
            </tr>
			<tr>
                <td><strong>1.18</strong></td>
                <td><strong>Air powered hoist: Braking system will stop and hold the load hook when controls are released under any load.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[18]">
</td>
            </tr>
			<tr>
                <td><strong>1.19</strong></td>
                <td><strong>An air hoist stops and holds the load block in the event of air pressure loss.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[19]">
</td>
            </tr>
			<tr>
                <td><strong>1.20</strong></td>
                <td><strong>Braking system has means for adjustment to compensate for wear.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[20]">
</td>
            </tr>
			 <tr>
                <td><strong>1.21</strong></td>
                <td><strong>Air Powered Hoist: load block is of the enclosed type and means is provided to guard against rope or load chain jamming in the load block</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[21]">
</td>
            </tr>
			<tr>
                <td><strong>1.22</strong></td>
                <td><strong>Rope termination is completed at the hoist wedge anchor with a drop forged U-clip.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[22]">
</td>
            </tr>
			<tr>
                <td><strong>1.23</strong></td>
                <td><strong> Rope is free of damaged:
*  Maximum of 12 randomly broken wires in 1 lay. *
4 Broken wires in 1 strand in one lay
*  1 Broken wire protrruding from the core (2 for rotation resistant ropes)
*   Wear of 1/3 of the origianl diameter of outside individual wire.
*   Kinking, crushing, birdcaging, or other distorsion.
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[23]">
</td>
            </tr>
			<tr>
                <td><strong>1.24</strong></td>
                <td><strong> A rope thimble is used in the eye when an eye splice
is used in a rope termination (in accordance with the manufacturer's instruction.
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[24]">
</td>
            </tr>
			<tr>
                <td><strong>1.25</strong></td>
                <td><strong>Air powered hoists: Rope drum is grooved and free of surface defects that could cause rope damage (excluding hoists made for special applications)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[25]">
</td>
            </tr>
			 <tr>
                <td><strong>1.26</strong></td>
                <td><strong>Hoist drum is adequately lubricated as per the hoist manufacturer's manual.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[26]">
</td>
            </tr>
			<tr>
                <td><strong>1.27</strong></td>
                <td><strong>Drum capacity can accommodate the specific rope size and length</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[27]">
</td>
            </tr>
			<tr>
                <td><strong>1.28</strong></td>
                <td><strong>Drum has a minimum of two wrap on it.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[28]">
</td>
            </tr>
			<tr>
                <td><strong>1.29</strong></td>
                <td><strong>Each drum end of the rope is anchored by a clamp attached to the drum or by a socket arrangement (approved by the manufacturer)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[29]">
</td>
            </tr>
			<tr>
                <td><strong>1.30</strong></td>
                <td><strong>Drum flanges always extend a minimum of 1/2" (13 mm) above the top layer of rope at all times.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[30]">
</td>
            </tr>
			 <tr>
                <td><strong>1.31</strong></td>
                <td><strong>Hook is not bent or twisted
* maximum bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer.
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[31]">
</td>
            </tr>
			<tr>
                <td><strong>1.32</strong></td>
                <td><strong>Hook is not distorted from the throat opening
* Max allowable throat opening is 15% compared to new hook, or as per manufacturer recommendation.
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[32]">
</td>
            </tr>
			<tr>
                <td><strong>1.33</strong></td>
                <td><strong>Maximum wear in the hook bowl is not exceeding
10% compared to new hook or as per manufacturer
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[33]">
</td>
            </tr>
			<tr>
                <td><strong>1.34</strong></td>
                <td><strong>Hook is not cracked, gouged, or shows nicks</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[34]">
</td>
            </tr>
			<tr>
                <td><strong>1.35</strong></td>
                <td><strong>Gangway handrail is free of defects.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[35]">
</td>
            </tr>
			 <tr>
                <td><strong>1.36</strong></td>
                <td><strong>No defects on hook anchor points.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 ASME B30.11</strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[36]">
</td>
            </tr>
			<tr>
                <td><strong>1.37</strong></td>
                <td><strong>Lower roller & bearings not defective nor corroded.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[37]">
</td>
            </tr>
			<tr>
                <td><strong>1.38</strong></td>
                <td><strong>Stairs & frames are free from defects and corrosion.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.11
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[38]">
</td>
            </tr>
			
	
        </table>
</div>
        


<div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
				
				<tr>
                <th colspan="3" style="text-align: center;">REMARKS / RECOMMENDATIONS: </td>
				</tr>
            <tr>
                <td style="height: 120px;" colspan="3">
                    
                <?php echo htmlspecialchars($row['remarks']); ?>
            
            </td>
                
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



        <div class="col-12">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

        
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
