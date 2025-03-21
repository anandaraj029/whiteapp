<?php
include_once('./get-checklist.php');

// Ensure $row is accessible
if (!isset($row) || empty($row)) {
    echo "No checklist data available.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR MOBILE AND LOCOMOTIVE CRANES  </title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <style>

.container{
            max-width: 966px;

        }
        .large-checkbox {
    width: 20px;
    height: 20px;
}

.modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }
    .modal-content {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }
    </style>
</head>
<body>
    <div class="container">
	
	  <div class="table-responsive">
      <table class="w-100">
            <tr>
        <td rowspan="4" class="logo-cell ">
            <img src="../../logo.png"  alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
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
        <td class="left-align"><b>Prepared By</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By</b><br>Managing Director</td>
   
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
                <th style="width: 25%;">REPORT NO</th>
                <td style="width: 25%;"><strong> <?php echo htmlspecialchars($row['report_no']); ?></strong></td>
                <th style="width: 25%;">INSPECTION DATE</th>
                <td style="width: 25%;"><strong> <?php echo htmlspecialchars($row['inspection_date']); ?></strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME</th>
                <td><strong> <?php echo htmlspecialchars($row['client_name']); ?> </strong></td>
                <th>INSPECTED BY</th>
                <td><strong> <?php echo htmlspecialchars($row['inspected_by']); ?> </strong></td>
            </tr>
            <tr>
        <th>LOCATION</th>
        <td> <strong><?php echo htmlspecialchars($row['location']); ?> </strong></td>
        <th>STICKER NO.</th>
        <td> <strong><?php echo htmlspecialchars($row['sticker_no']); ?></strong></td>
    </tr>
    <tr>
        <th>CRANE ASSET NO:</th>
        <td><strong> <?php echo htmlspecialchars($row['crane_asset_no']); ?> </strong></td>
        <th>CRANE SERIAL NO.:</th>
        <td> <strong><?php echo htmlspecialchars($row['crane_serial_no']); ?> </strong></td>
    </tr>
    <tr>
        <th>EQUIPMENT TYPE</th>
        <td> <strong> <?php echo htmlspecialchars($row['equipment_type']); ?> </strong></td>
        <th>CAPACITY (SWL)</th>
        <td><strong> <?php echo htmlspecialchars($row['capacity_swl']); ?> </strong></td>
    </tr>            
        </table>
</div>

<form method="post" action="./update_checklist.php" id="checklistForm"  onsubmit="saveClientDetails()">
        <input type="hidden" name="checklist_no" value="<?php echo $row['checklist_id'] ?>" />

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
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[1]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.2</strong></td>
                <td><strong>  Previous Inspection reports are checked  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.5)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[2]">
</td>
            </tr>
			<tr>
                <td><strong>1.3</strong></td>
                <td><strong>  Durable load chart is provided in an accessible location  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.1, 5.1.1.3(b) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[3]">
</td>
            </tr>
			<tr>
                <td><strong>1.4</strong></td>
                <td><strong> Load rating chart is available </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.3(a), Fig.11)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[4]">
</td>
            </tr>
			<tr>
                <td><strong>1.5</strong></td>
                <td><strong>  Operator is qualified (for the inspected crane type/model) and licensed </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.1.1, 5.1.1.2, 5.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[5]">
</td>
            </tr>
			<tr>
                <td><strong>1.6</strong></td>
                <td><strong>  A sign is posted warning the operator not to rely solely on any automatic device as a substitute for safe operating practices  </strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE – 06  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[6]">
</td>
            </tr>
			<tr>
                <td><strong>1.7</strong></td>
                <td><strong>  Rated capacity of crane is marked   </strong></td>
				<td style="text-align: center;"><strong> CIMS QHSE – 06 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[7]">
</td>
            </tr>
			<tr>
                <td><strong>1.8</strong></td>
                <td><strong>  Fire extinguisher is in place with minimum rating 10 BC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.3.4.10) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[8]">
</td>
            </tr>
			<tr>
                <td><strong>1.9</strong></td>
                <td><strong> Markings and direction of all control levers are clearly displayed </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.1, Fig.12, Fig.13) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[9]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.10</strong></td>
                <td><strong> Crane’s backward stability is in accordance with manufacturers standards (minimum radius and no-load condition) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 sec.1.2 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[10]">
</td>
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
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[11]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2</strong></td>
                <td><strong> Two (2) full wraps of rope remain on the drum when hook is in the extreme low position  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.3.2) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[12]">
</td>
            </tr>
			<tr>
                <td><strong>2.3</strong></td>
                <td><strong> Swing control is smoothly operating on acceleration and deceleration  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.4.1) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[13]">
</td>
            </tr>
            <tr>
                <td><strong>2.4</strong></td>
                <td><strong>  Swing braking operates, as well as positive locking devices (manual and auto) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.4.2)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[14]">
</td>
            </tr>
			<tr>
                <td><strong>2.5</strong></td>
                <td><strong>  Travel controls are properly operating / functioning </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.1b) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[15]">
</td>
            </tr>
			<tr>
                <td><strong>2.6</strong></td>
                <td><strong> Auxiliary travel controls function correctly for multiple control – station cranes  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.1b) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[16]">
</td>
            </tr>
			<tr>
                <td><strong>2.7</strong></td>
                <td><strong>Travel brakes and locks for crawler cranes are correctly operating   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.5.3a)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[17]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.8</strong></td>
                <td><strong>  Travel brakes and locks for wheel – mounted cranes are correctly operating </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.3b) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[18]">
</td>
            </tr>
			<tr>
                <td><strong>2.9</strong></td>
                <td><strong> Power plant controls of superstructure – mounted power plant working properly  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.3a-d) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[19]">
</td>
            </tr>
			<tr>
                <td><strong>2.10</strong></td>
                <td><strong>  Rotation – resistant and fiber – core ropes are not used for boom hoist reeving </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.2c) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[20]">
</td>
            </tr>
			<tr>
                <td><strong>2.11</strong></td>
                <td><strong>  Sheave grooves have surface smoothness without any defects </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4a) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[21]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.12</strong></td>
                <td><strong> Sheave guards are in place on the lower block  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4c) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[22]">
</td>
            </tr>
			<tr>
                <td><strong>2.13</strong></td>
                <td><strong> All sheaves can be lubricated (except permanently lubricated types)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4d) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[23]">
</td>
            </tr>
			<tr>
                <td><strong>2.14</strong></td>
                <td><strong>All cab doors glazing’s are safety glazing material   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.1b) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[24]">
</td>
            </tr>
			<tr>
                <td><strong>2.15</strong></td>
                <td><strong>  Verify cab doors functionality and condition </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.8.1c)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[25]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.16</strong></td>
                <td><strong> Seat belt is fitted and in good condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.1e) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[26]">
</td>
            </tr>
			<tr>
                <td><strong>2.17</strong></td>
                <td><strong> Walking platforms and areas of structure are skid - resistance  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.8.3c)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[27]">
</td>
            </tr>
			<tr>
                <td><strong>2.18</strong></td>
                <td><strong> Guard rails are fitted for crawler cranes  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.8.31) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[28]">
</td>
            </tr>
			<tr>
                <td><strong>2.19</strong></td>
                <td><strong>Fixed or telescoping bumper for boom stop is functional (if fitted)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1a1)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[29]">
</td>
            </tr>
			
			
			<tr>
                <td><strong>2.20</strong></td>
                <td><strong>  Shock absorbing bumper for boom stop is functional (if fitted) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1a2) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[30]">
</td>
            </tr>
			
			
			<tr>
                <td><strong>2.21</strong></td>
                <td><strong>Hydraulic boom elevating cylinder, used as boom stop is functional (if fitted)   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1a3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[31]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.22</strong></td>
                <td><strong>Boom angle indicator is fitted, operable, and can be read from the operator station   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1c)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[32]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.23</strong></td>
                <td><strong> Boom shut – off or hydraulic relief is provided for high angle boom condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.1d) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[33]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.24</strong></td>
                <td><strong>  Boom length indicator is fitted for telescoping booms and is working </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.1.9.1e)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[34]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.25</strong></td>
                <td><strong>Anti - two blocking devices are fitted and working (main and auxiliary)   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.9.1)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[35]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.26</strong></td>
                <td><strong> Operation and accuracy of the fitted LMI (compare with load chart over a range of angles and radius)  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.9.2)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[36]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.27</strong></td>
                <td><strong>Outrigger extensions are fully extendable   </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.2)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[37]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.28</strong></td>
                <td><strong> Outriggers and jacks are not leaking oil  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[38]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.29</strong></td>
                <td><strong>Jack is in good operating condition at each outrigger   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[39]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.30</strong></td>
                <td><strong>  Each outrigger jack locking device is functional
(if fitted)
 </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[40]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.31</strong></td>
                <td><strong> No leakage from each jack seal when the crane is jacked up  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[41]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.32</strong></td>
                <td><strong> Outrigger jack bolts are fully secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[42]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.33</strong></td>
                <td><strong> All road wheel nuts are fully secure  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[43]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.34</strong></td>
                <td><strong>  All tires are serviceable and without damage or exist wear </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[44]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.35</strong></td>
                <td><strong> Full tank supports and straps are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[45]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.36</strong></td>
                <td><strong>Hydraulic oil tank supports and straps are secure   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[46]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.37</strong></td>
                <td><strong> Mud wing bolts are secure and none missing  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[47]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.38</strong></td>
                <td><strong> Underside of chassis shows no obvious faults  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[48]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.39</strong></td>
                <td><strong> Outrigger boxes are not cracked  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[49]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.40</strong></td>
                <td><strong>  Front and rear steering cylinder anchor points and pins are secure </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[50]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.41</strong></td>
                <td><strong> Truck rod end joints are not worn and are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[51]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.42</strong></td>
                <td><strong>  Axle bolts and nuts are fully secure </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[52]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.43</strong></td>
                <td><strong> Wheel hub oil seals are not leaking  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[53]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.44</strong></td>
                <td><strong>Brake linings are not oil contaminated   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[54]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.45</strong></td>
                <td><strong> Brake hoses have not deteriorated, e.g. cracks, splits, leaks, etc.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[55]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.46</strong></td>
                <td><strong>  All chassis cross members are not cracked or corroded </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[56]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.47</strong></td>
                <td><strong> Transmission mounting bolts and bushings are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[57]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.48</strong></td>
                <td><strong>  All drive shaft bolts and universal joints are not worn </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[58]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.49</strong></td>
                <td><strong> Ring gear bolts are fully secure  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[59]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.50</strong></td>
                <td><strong> Rear axle lock - out cylinder lock - up the axle correctly  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[60]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.51</strong></td>
                <td><strong>  All hydraulic hoses under chassis have not deteriorated (cracks, splits, leaks) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[61]">
</td>
            </tr>
		

<tr>
                <td><strong>2.52</strong></td>
                <td><strong>  Engine mountings have not gone soft with oil contamination </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[62]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.53</strong></td>
                <td><strong> Engine shows no major oil leakage  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[63]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.54</strong></td>
                <td><strong>  Radiator does not leak water </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[64]">
</td>
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
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[65]">
</td>
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
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[66]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.56</strong></td>
                <td><strong> Auxiliary hoist rope (if fitted) is free of damage and
                    Wear (Replace if the broken wire and/or wear criteria for the given rope type is exceeded for running ropes, as in 2.55
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[67]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.57</strong></td>
                <td><strong>  Main hoist drum mounting bolts are secure </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[68]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.58</strong></td>
                <td><strong> Auxiliary hoist drum mounting bolts are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[69]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.59</strong></td>
                <td><strong> Drum rotation indicator(s) are provided.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.3.2(a)(5)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[70]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.60</strong></td>
                <td><strong> Rear telescope side and top wear pads are serviceable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[71]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.61</strong></td>
                <td><strong>  Bottom and side wear pads of telescope sections are serviceable </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[72]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.62</strong></td>
                <td><strong> Boom heel pin bushes are not worn (rock boom up and down to check this)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[73]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.63</strong></td>
                <td><strong>  Boom – over rear alarm operates </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.6) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[74]">
</td>
            </tr>


<tr>
                <td><strong>2.64</strong></td>
                <td><strong>  Double plate at top of lower boom is not distorted with side weld splitting for AT and RT Cranes (Plate requires renewal if this is the case) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[75]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.65</strong></td>
                <td><strong> Center swivel coupling pipes and hoses do not leak  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[76]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.66</strong></td>
                <td><strong> Center swivel coupling bolts are all secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[77]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.67</strong></td>
                <td><strong>Boom lift cylinder anchor bolts and bushings are secure   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[78]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.68</strong></td>
                <td><strong> Swing gearbox mounting bolts are secure  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[79]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.69</strong></td>
                <td><strong>  Swing gearbox bottom oil seal and drive gear are in a serviceable condition (Should be well lubricated) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[80]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.70</strong></td>
                <td><strong>  Horn is working  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.11) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[81]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.71</strong></td>
                <td><strong> Crane level indicator is fitted and working  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.11)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[82]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.72</strong></td>
                <td><strong> Engine gauges and associated indicators are working  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[83]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.73</strong></td>
                <td><strong>  Starter safety switch for automatic transmission is functional </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.6.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[84]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.74</strong></td>
                <td><strong>The warning sign stating power line required clearances is visible to the operator  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.9.12g) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[85]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.75</strong></td>
                <td><strong>  Swing away fly jib lock pins are secure (with fly jib stowed) </strong></td>
                <td style="text-align: center;"><strong> ASME B30.5 (5.1.9.12g) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[86]">
</td>
            </tr>
<tr>
                <td><strong>2.76</strong></td>
                <td><strong>  The power pin fly jib is operable and undamaged </strong></td>
				<td style="text-align: center;"><strong> QHSE - 06 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[87]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.77</strong></td>
                <td><strong>  Cat head sheaves (jib) turn freely and are undamaged </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.7.4)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[88]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.78</strong></td>
                <td><strong>  Load block sheaves turn freely and are undamaged </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[89]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.79</strong></td>
                <td><strong> Hook assemblies are equipped with safety latches  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.6) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[90]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.80</strong></td>
                <td><strong> Hook assembly labeling and manufacturer data is clearly marked  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 (10.1.1.1)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[91]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.81</strong></td>
                <td><strong> Hook’s weight is clearly marked/printed on the hook  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 (10.1.1.1)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[92]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.82</strong></td>
                <td><strong>  Safe working load of hook is clearly marked on the item </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.1.1) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[93]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.83</strong></td>
                <td><strong> Hook does not show defects such as nicks, cracks and gouges  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.2c3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[94]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.84</strong></td>
                <td><strong>  Hook is not bent or twisted<br/>
                    •	Max. bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer recommendations
                     </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c1) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[95]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.85</strong></td>
                <td><strong> Hook is not distorted in the throat opening<br/>
                    •	Max. allowable throat opening is 15% compared to new hook, or as per manufacturer recommendations
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c2) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[96]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.86</strong></td>
                <td><strong> Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[97]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.87</strong></td>
                <td><strong>   Hook is not cracked, gouged or shows nicks</strong></td>
				<td style="text-align: center;"><strong>  ASME B30.10 (10.1.2.1.2c3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[98]">
</td>
            </tr>

<tr>
                <td><strong>2.88</strong></td>
                <td><strong> Hook can lock (if it is a self-locking hook)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c4) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[99]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.89</strong></td>
                <td><strong>  Hook latch is operative </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10 (10.1.2.1.3c5) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[100]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.90</strong></td>
                <td><strong> Rope guards and locked in position with pins (hook block)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[101]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.91</strong></td>
                <td><strong>  Dead end rope anchor is fitted with a lock pin (hook block) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.7.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[102]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.92</strong></td>
                <td><strong> Dead end rope anchor is correctly made with a suitable wedge socket and loop- back termination  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[103]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.93</strong></td>
                <td><strong>  Reverse travel alarm is operational </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[104]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.94</strong></td>
                <td><strong>  Turning signals and indicators are working correctly </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[105]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.95</strong></td>
                <td><strong> Road lighting, including spotlights, are in good condition and operable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[106]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.96</strong></td>
                <td><strong> Brakes operate on all wheels  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.5.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[107]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.97</strong></td>
                <td><strong>   Track pads are undamaged</strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[108]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.98</strong></td>
                <td><strong>  Drive chains are correctly tensioned </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[109]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.99</strong></td>
                <td><strong>  Drive sockets and tumblers are serviceable </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[110]">
</td>
            </tr>


<tr>
                <td><strong>3.00</strong></td>
                <td><strong>  Top and bottom swing rollers and tracks are in good overall condition (Should be well lubricated) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[111]">
</td>
            </tr>			


<tr>
                <td><strong>3.1</strong></td>
                <td><strong> Track idlers are serviceable  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[112]">
</td>
            </tr>			


<tr>
                <td><strong>3.2</strong></td>
                <td><strong>  Boom back  stops are functioning </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[113]">
</td>
            </tr>			

<tr>
                <td><strong>3.3</strong></td>
                <td><strong>  Back A-Frame is in good condition </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[114]">
</td>
            </tr>			

<tr>
                <td><strong>3.4</strong></td>
                <td><strong> Boom cut-out (at maximum angle) is operable  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.1)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[115]">
</td>
            </tr>			

<tr>
                <td><strong>3.5</strong></td>
                <td><strong> Power low lowering is operational  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[116]">
</td>
            </tr>			

<tr>
                <td><strong>3.6</strong></td>
                <td><strong> Boom hoist safety pawl is engaging  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.3.2)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[117]">
</td>
            </tr>			

<tr>
                <td><strong>3.7</strong></td>
                <td><strong> Boom chords and lacings are undamaged (bent)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.1.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[118]">
</td>
            </tr>			

<tr>
                <td><strong>3.8</strong></td>
                <td><strong> Bridal sheaves are turning and free from surface defects  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.7.4) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[119]">
</td>
            </tr>			

<tr>
                <td><strong>3.9</strong></td>
                <td><strong> Pendant ropes are showing no broken wires (see 2.0.55)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.2.4.2) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[120]">
</td>
            </tr>			

<tr>
                <td><strong>3.10</strong></td>
                <td><strong>  Operation of steering brakes is satisfactory </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.1.5.3) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[121]">
</td>
            </tr>			
			
			
			<tr>
                <td><strong>3.11</strong></td>
                <td><strong> Main machinery guarding is in place  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.1.9.6)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[122]">
</td>
            </tr>
<tr>
                <td><strong>3.12</strong></td>
                <td><strong> Main clutch is fully operational  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.5 (5.2.1.3)  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[123]">
</td>
            </tr>
<tr>
                <td><strong>3.13</strong></td>
                <td><strong> Main boom and hoist drum brakes are fully functional  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.5 (5.2.1.3)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[124]">
</td>
            </tr>
<tr>
                <td><strong>3.14</strong></td>
                <td><strong>  LMI is fitted, operational and accurate for bool length, rated load, angle, radius, etc. (for 3 ton cranes or more) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (1.9.10.2) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[125]">
</td>
            </tr>
<tr>
                <td><strong>3.15</strong></td>
                <td><strong> Wind Speed Device (Anemometer) working correctly.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.5 (5.3.2.1.6) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[126]">
</td>
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
            <td style="height: 120px;" colspan="3">
                <textarea style="width: 100%; height: 100%; box-sizing: border-box;" name="recommendations">
                    
                </textarea>
            </td>                
            </tr>
			</tbody>
			</table>			
			</div>            
		
            <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th style="width: 25%;">INSPECTOR’S NAME:</th>
            <td style="width: 25%;">
                <strong>
                <?php echo htmlspecialchars($row['inspected_by']); ?>
                </strong>
            </td>
            <th style="width: 25%;">CLIENT’S REP. NAME:</th>
            <td style="width: 25%;" onclick="openModal()">
        <span id="clientNameDisplay">Click to enter</span>
    </td>
        </tr>
        <tr>
            <th>SIGNATURE & DATE:</th>
            <td>
                <?php
                if (!empty($row['inspected_by'])) {
                    $inspector_name = $row['inspected_by'];

                    // Query inspectors table
                    $sql = "SELECT signature_photo FROM inspectors WHERE inspector_name = ?";
                    $stmt = $conn->prepare($sql);
                    
                    if ($stmt) {
                        $stmt->bind_param("s", $inspector_name);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $inspector = $result->fetch_assoc();
                            $image_path = '../../../inspector/uploads/' . preg_replace('/\s+/', '_', strtolower($inspector_name)) . '/images/' . $inspector['signature_photo'];

                            if (file_exists($image_path)) {
                                echo "<img src='$image_path' alt='Inspector Signature' style='max-width: 100px; max-height: 50px;'>";
                            } else {
                                echo "Image not available.";
                            }
                        } else {
                            echo "Inspector not found.";
                        }
                        $stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                } else {
                    echo "Inspector's name is not available.";
                }
                ?>
            </td>
            <th>SIGNATURE & DATE:</th>
            <td style="width: 25%;" onclick="openModal()">
        <img id="clientSignatureDisplay" src="" alt="Click to add signature" style="max-width: 100px; max-height: 50px; cursor: pointer;">
    </td>
        </tr>
    </table>
</div>


<!-- Modal for Client's Name and Signature -->
<div id="clientSignatureModal" class="modal" style="display: none;">
    <div class="modal-content" style="padding: 20px; width: 400px; margin: auto; background: #fff; border-radius: 8px;">
        <span class="close" onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
        <h3>Enter Client's Details</h3>
        
            <div>
                <label for="clientName">Client's Name:</label>
                <input type="text" id="clientName" name="client_name" required style="width: 100%; padding: 5px; margin-bottom: 15px;">
            </div>
            <div>
                <label>Signature:</label>
                <canvas id="signaturePad" style="border: 1px solid #ccc; width: 100%; height: 150px;"></canvas>
                <button type="button" onclick="clearSignature()" style="margin-top: 10px;">Clear Signature</button>
            </div>
            <div style="margin-top: 15px;">
                <button type="button" onclick="saveClientDetails()">Save</button>
            </div>        
    </div>
</div>


<input type="hidden" name="client_name" id="hiddenClientName">
<input type="hidden" name="client_signature" id="hiddenClientSignature">


<div class="col-12">
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>


</div>

<?php
// Close the connection at the very end
$conn->close();
?>

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




<script>
document.getElementById('checklistForm').addEventListener('submit', function(event) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const remarks = document.querySelectorAll('input[type="text"]');
    let isValid = true;

    // Check if at least one checkbox is selected for each question
    const resultGroups = {};
    checkboxes.forEach(checkbox => {
        const name = checkbox.name;
        if (!resultGroups[name]) resultGroups[name] = false;
        if (checkbox.checked) resultGroups[name] = true;
    });

    for (const group in resultGroups) {
        if (!resultGroups[group]) {
            isValid = false;
            alert(`Please select a result for ${group}`);
            break;
        }
    }

    // Collect remarks: Optional validation - empty remarks result in an empty array
    const remarksArray = [];
    remarks.forEach(remark => {
        if (remark.value.trim() !== '') {
            remarksArray.push(remark.value.trim()); // Push non-empty remarks to the array
        } else {
            remarksArray.push(''); // Push an empty string for empty remarks
        }
    });

    console.log('Remarks Array:', remarksArray); // Log the remarks for debugging

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
</script>



<!-- <script>
document.getElementById('checklistForm').addEventListener('submit', function(event) {
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const remarks = document.querySelectorAll('input[type="text"]');
let isValid = true;

// Check if at least one checkbox is selected for each question
const resultGroups = {};
checkboxes.forEach(checkbox => {
const name = checkbox.name;
if (!resultGroups[name]) resultGroups[name] = false;
if (checkbox.checked) resultGroups[name] = true;
});
for (const group in resultGroups) {
if (!resultGroups[group]) {
    isValid = false;
    alert(`Please select a result for ${group}`);
    break;
}
}

// Check if all remark fields are filled
if (isValid) {
remarks.forEach(remark => {
    if (remark.value.trim() === '') {
        isValid = false;
        alert('Please fill in all remarks.');
        remark.focus();
        return false;
    }
});
}

// Prevent form submission if validation fails
if (!isValid) {
event.preventDefault();
}
});
</script> -->


<script>

document.addEventListener("DOMContentLoaded", function () {
const checklistForm = document.getElementById("checklistForm");

if (checklistForm) {
// Ensure only one checkbox is selected per row for the result field
checklistForm.addEventListener("change", function (event) {
    if (event.target.type === "checkbox" && event.target.name.startsWith("result")) {
        const currentRow = event.target.closest("tr");
        const checkboxes = currentRow.querySelectorAll("input[type='checkbox'][name='" + event.target.name + "']");
        
        checkboxes.forEach(checkbox => {
            if (checkbox !== event.target) {
                checkbox.checked = false; // Uncheck other checkboxes in the same group
            }
        });
    }
});
}
});


</script>


<script>
    let signaturePad;

    // Ensure SignaturePad is loaded and ready
    function openModal() {
        if (typeof SignaturePad !== "undefined") {
            document.getElementById("clientSignatureModal").style.display = "block";
            
            const canvas = document.getElementById("signaturePad");
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;

            signaturePad = new SignaturePad(canvas);
        } else {
            console.error("SignaturePad library is not loaded.");
        }
    }

    function closeModal() {
        document.getElementById("clientSignatureModal").style.display = "none";
    }

    function clearSignature() {
        if (signaturePad) {
            signaturePad.clear();
        }
    }

    function saveClientDetails() {
    if (!signaturePad) {
        alert("Signature pad is not initialized. Please try again.");
        return;
    }

    if (signaturePad.isEmpty()) {
        alert("Please provide a signature.");
        return;
    }

    const clientName = document.getElementById("clientName").value;
    if (!clientName) {
        alert("Please enter the client's name.");
        return;
    }

    const signatureData = signaturePad.toDataURL(); // Base64 format
    document.getElementById("clientNameDisplay").innerText = clientName;
    document.getElementById("clientSignatureDisplay").src = signatureData;

    // Set hidden inputs for submission
    document.getElementById("hiddenClientName").value = clientName;
    document.getElementById("hiddenClientSignature").value = signatureData;

    closeModal();
}

</script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
