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
    <title>INSPECTION CHECKLIST FOR TOWER CRANES</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">


    <style>

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
            <table class="table table-bordered">
                <tbody>
				
				<tr>
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR TOWER CRANES</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.13</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table>
			
			</div>

        <h4>TOWER CRANES</h4>
        <h4>ASME B30.3-2016</h4>
		
        
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
                <td><strong><?php echo htmlspecialchars($row['client_name']); ?></strong></td>
                <th>INSPECTED BY</th>
                <td><strong><?php echo htmlspecialchars($row['inspected_by']); ?></strong></td>
            </tr>
            <tr>
                <th>LOCATION</th>
                <td><strong> <?php echo htmlspecialchars($row['location']); ?> </strong></td>
                <th>STICKER NO.</th>
                <td><strong><?php echo htmlspecialchars($row['sticker_no']); ?> </strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT NO</th>
                <td><strong><?php echo htmlspecialchars($row['crane_asset_no']); ?> </strong></td>
                <th>EQUIP. SERIAL NO.</th>
                <td><strong><?php echo htmlspecialchars($row['crane_serial_no']); ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE</th>
                <td><strong><?php echo htmlspecialchars($row['equipment_type']); ?></strong></td>
                <th>CAPACITY (SWL)</th>
                <td><strong><?php echo htmlspecialchars($row['capacity_swl']); ?></strong></td>
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
                    <th style="text-align: center;">REMARKS</th>
                </tr>
			<tr>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">MARKINGS, DOCUMENTS</th>
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
                <td><strong>Documentation is available such as but not limited to; operator’s manual, manufacturer’s informal literature, etc.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec.1.9(a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[1][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[1]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.2</strong></td>
                <td><strong>An installation preparation instruction is provided. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec.1.9.1(a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[2]">
</td>
            </tr>
			<tr>
                <td><strong>1.3</strong></td>
                <td><strong>Structure or anchor has the information data plate bearing the Manufacturer Name, Type/Model Number, Serial Number, & Year of Manufacture.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.5(h)(2)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[3]">
</td>
            </tr>
			<tr>
                <td><strong>1.4</strong></td>
                <td><strong>Structure has an identification number / asset number marked on it.</strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE 06</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[4]">
</td>
            </tr>
			<tr>
                <td><strong>1.5</strong></td>
                <td><strong>Crane’s SWL (Rated Load) is prominently marked on the structure.</strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE 06</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[5]">
</td>
            </tr>
			<tr>
                <td><strong>1.6</strong></td>
                <td><strong>Load Rating chart of the crane is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.9.2</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[6]">
</td>
            </tr>
			<tr>
                <td><strong>1.7</strong></td>
                <td><strong>General erection & dismantling requirements are met (Drawings & Calculations).</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.2-4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[7]">
</td>
            </tr>
			
      <tr>
                <td><strong>1.8</strong></td>
                <td><strong>The crane is operated by the qualified, competent, or certified operator.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 3.1.1(a-1,2,3,4(b)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[8]">
</td>
            </tr>  
			<tr>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">INSPECTION & TESTING</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>2.1</strong></td>
                <td><strong>Structures such as but not limited to, tower masts, knee braces, cross beams, climbing ladders, climbing cross sections have no signs of cracks, corrosions, bends, deformations.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.6.1</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[9]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2</strong></td>
                <td><strong>Tie-in braces and pins are secured.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.6.1</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[10]">
</td>
            </tr>
			<tr>
                <td><strong>2.3</strong></td>
                <td><strong>Climbing pawls and wedges are secured.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.6.2
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[11]">
</td>
            </tr>
			<tr>
                <td><strong>2.4</strong></td>
                <td><strong>Tower’s anchor bolts at base are properly mounted and secured.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[12]">
</td>
            </tr>
			<tr>
                <td><strong>2.5</strong></td>
                <td><strong>Expendable base and knee-braced base are installed properly.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.5
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[13]">
</td>
            </tr>
		<tr>
                <td><strong>2.6</strong></td>
                <td><strong>Load & luffing/jib boom hoist drives are provided with a clutch or power disengaging device unless directly coupled to an electric or hydraulic power motor source.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.7
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[14]">
</td>
            </tr>
					<tr>
                <td><strong>2.7</strong></td>
                <td><strong>All functions are checked and working correctly, i.e., but not limited to, luffing/jib booms’ hoisting & lowering, structure’s slewing, load block’s lowering & hoisting, trolley traversing.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.7(3.a-f)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[15]">
</td>
            </tr>
					<tr>
                <td><strong>2.8</strong></td>
                <td><strong>Motion limiting devices and brakes of load hoist, luffing/jib boom hoist are checked.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.7(4.a-c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[16]">
</td>
            </tr>
					<tr>
                <td><strong>2.9</strong></td>
                <td><strong>All controls, drives, and braking means devices are checked which include; load block hoisting & lowering; luffing boom hoisting and lowering; swinging of the upper structure; brake and clutch functioning; limit, locking, and safety device functioning; and load-limiting devices for proper operation.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.7(4.a-c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[17]">
</td>
            </tr>
					<tr>
                <td><strong>2.10</strong></td>
                <td><strong>Over-speed protection is provided for hoist and luffing boom mechanisms.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.10(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[18]">
</td>
            </tr>
			 <tr>
                <td><strong>2.11</strong></td>
                <td><strong>Luffing/jib boom and load hoist free-fall lowering is not provided. Ensure that they shall be done only under power control.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec 1.10(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[19]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.12</strong></td>
                <td><strong>Luffing/jib boom hoist powered by hydraulic is not dropping.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.10(3)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[20][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[20]">
</td>
            </tr>
			<tr>
                <td><strong>2.13</strong></td>
                <td><strong>Luffing boom back stop switch is provided for the maximum boom angle.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
 sec 1.10(4)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[21][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[21]">
</td>
            </tr>
			<tr>
                <td><strong>2.14</strong></td>
                <td><strong>The luffing/jib hoist rope is securely anchored on the drum as per the manufacturer recommendation. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.10.2 (a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[22][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[22]">
</td>
            </tr>
			<tr>
                <td><strong>2.15</strong></td>
                <td><strong>The diameter of the drum is sufficient to provide a first layer rope pitch diameter of not less than 18 times the nominal diameter of the rope used.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
 sec 1.10(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[23][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[23]">
</td>
            </tr>
		<tr>
                <td><strong>2.16</strong></td>
                <td><strong>The remaining rope on load hoist drum shall not be less than three full wraps when the hook is in its extreme lowest position.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.10(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[24][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[24]">
</td>
            </tr>
					<tr>
                <td><strong>2.17</strong></td>
                <td><strong>The remaining rope on luffing/jib boom hoist shall not be less than three full wraps when the luffing/jib boom is at its maximum permissible radius.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.10(e)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[25][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[25]">
</td>
            </tr>
					<tr>
                <td><strong>2.18</strong></td>
                <td><strong>Load hoist drum and luffing boom hoist drums are provided with a positive holding device, such as ratchets and pawls, unless directly coupled to electric or hydraulic drives.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.10(f)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[26][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[26]">
</td>
            </tr>
					<tr>
                <td><strong>2.19</strong></td>
                <td><strong>Positive holding devices are controlled only from the operator’s station; hold the drums from rotating in the lowering direction, and capable of holding the rated load indefinitely, or luffing boom and rated load indefinitely, as applicable without further attention from the operator.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.10(g)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[27][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[27]">
</td>
            </tr>
					<tr>
                <td><strong>2.20</strong></td>
                <td><strong>Luffing boom hoist rope and load hoist rope shall be equipped with at least one braking means that is capable of providing minimum of 125 % of the full load hoisting torque at the point of where the braking is applied.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.3(a)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[28][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[28]">
</td>
            </tr>
			 <tr>
                <td><strong>2.21</strong></td>
                <td><strong>A secondary emergency brake is provided on the luffing boom hoist drum for use in the event of a main drive failure.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.3(a)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[29][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[29]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.22</strong></td>
                <td><strong>Load hoist and luffing boom hoist mechanisms are equipped with braking means capable of providing controlled lowering speeds. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.3(b)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[30][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[30]">
</td>
            </tr>
			<tr>
                <td><strong>2.23</strong></td>
                <td><strong>An automatic means is provided for controlling the load hoist or the luffing boom hoist to stop and hold the load in the event of loss of brake actuating power.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.3(c)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[31][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[31]">
</td>
            </tr>
			<tr>
                <td><strong>2.24</strong></td>
                <td><strong>If foot pedal is provided, it is holding the brakes in the applied position without further attention from the operator.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.3(c)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[32][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[32]">
</td>
            </tr>
			<tr>
                <td><strong>2.25</strong></td>
                <td><strong>Sheave bearings are provided with a means for lubrication, except for those that are permanently lubricated.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.4(c)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[33][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[33]">
</td>
            </tr>
		<tr>
                <td><strong>2.26</strong></td>
                <td><strong>The pitch diameter of the load block sheaves are not less than 18 times the nominal diameter of the rope used.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.4(d)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[34][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[34]">
</td>
            </tr>
					<tr>
                <td><strong>2.27</strong></td>
                <td><strong>The pitch diameter of luffing boom hoist sheaves are not less than 15 times the nominal diameter of the rope used.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.4(d)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[35][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[35]">
</td>
            </tr>
					<tr>
                <td><strong>2.28</strong></td>
                <td><strong>The load block sheaves are equipped with close fitting guard to prevent ropes from becoming fouled when the block is lying on the ground. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.4(e)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[36][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[36]">
</td>
            </tr>
					<tr>
                <td><strong>2.29</strong></td>
                <td><strong>Rope end socketing is as per the manufacturer.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.5(g)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[37][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[37]">
</td>
            </tr>
					<tr>
                <td><strong>2.30</strong></td>
                <td><strong>Rotation-resistant rope is not used for luffing boom hoist.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.5(h)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[38][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[38]">
</td>
            </tr>
			 <tr>
                <td><strong>2.31</strong></td>
                <td><strong>Design factor for luffing boom hoist rope is not less than 3.5</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.5(c)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[39]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.32</strong></td>
                <td><strong>Design factor for load hoist rope is not less than 5.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.10.5(b)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[40]">
</td>
            </tr>
			<tr>
                <td><strong>2.33</strong></td>
                <td><strong>Load hook is equipped with safety latches and working properly.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 sec 1.11(a), ASME B30.10 sec 1 & 5 (i) </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[41]">
</td>
            </tr>
			<tr>
                <td><strong>2.34</strong></td>
                <td><strong>No pitting or corrosion is visible.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(c)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[42]">
</td>
            </tr>
			<tr>
                <td><strong>2.35</strong></td>
                <td><strong>No signs of cracks, nicks, or gouges are visible.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(d)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[43]">
</td>
            </tr>
		<tr>
                <td><strong>2.36</strong></td>
                <td><strong>Load hook is marked with its SWL and weight.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(a)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[44]">
</td>
            </tr>
					<tr>
                <td><strong>2.37</strong></td>
                <td><strong>The wear on the hook does not exceed 10% from the original.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(e)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[45]">
</td>
            </tr>
					<tr>
                <td><strong>2.38</strong></td>
                <td><strong>There is no deformation that is visibly apparent bend or twist from the plane of the unbent hook.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(f)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[46]">
</td>
            </tr>
					<tr>
                <td><strong>2.39</strong></td>
                <td><strong>No any distortion causing an increase in the throat opening of 5% that exceeded ¼ in. (6mm) or as recommended by the manufacturer.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(g)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[47]">
</td>
            </tr>
					<tr>
                <td><strong>2.40</strong></td>
                <td><strong>Self-locking hook is able to lock.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(h)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[48]">
</td>
            </tr>
			 <tr>
                <td><strong>2.41</strong></td>
                <td><strong>No damaged, missing, or malfunctioning hook attachment.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(j)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[49]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.42</strong></td>
                <td><strong>No thread wear or corrosion is evident.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(k)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[50]">
</td>
            </tr>
			<tr>
                <td><strong>2.43</strong></td>
                <td><strong>No evidence of heat exposure or unauthorized welding.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(l)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[51]">
</td>
            </tr>
			<tr>
                <td><strong>2.44</strong></td>
                <td><strong>No evidence of unauthorized alteration such as drilling, machining, grinding or other modifications.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 sec 1 & 5(m)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[52]">
</td>
            </tr>
			<tr>
                <td><strong>2.45</strong></td>
                <td><strong>Swing mechanism is capable of smooth starts and stops and of providing variable degrees of acceleration and deceleration.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.12.1(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[53]">
</td>
            </tr>
		<tr>
                <td><strong>2.46</strong></td>
                <td><strong>Crane is equipped with means to rotate freely when it is out of service in order to weathervane.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.1.1(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[54]">
</td>
            </tr>
					<tr>
                <td><strong>2.47</strong></td>
                <td><strong>Braking means with holding power in both directions is provided. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.12.2(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[55]">
</td>
            </tr>
					<tr>
                <td><strong>2.48</strong></td>
                <td><strong>Brakes apply automatically when electrical power or actuating force is lost.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3 
sec 1.12.2(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[56]">
</td>
            </tr>
					<tr>
                <td><strong>2.49</strong></td>
                <td><strong>Travel drives are capable of smooth starts and stops, and providing variable degrees of acceleration and deceleration.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
 sec 1.13.1(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[57]">
</td>
            </tr>
					<tr>
                <td><strong>2.50</strong></td>
                <td><strong>Cable spooling is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.1(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[58]">
</td>
            </tr>
			 <tr>
                <td><strong>2.51</strong></td>
                <td><strong>Audible signal automatically sounds continuously whenever the crane travels.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.1(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[59]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.52</strong></td>
                <td><strong>Crane bogies are fitted with sweeps at each end of the bogie and extending below the top of the rail.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.2(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[60]">
</td>
            </tr>
			<tr>
                <td><strong>2.53</strong></td>
                <td><strong>Bogie wheels are guarded.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.2(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[61]">
</td>
            </tr>
			<tr>
                <td><strong>2.54</strong></td>
                <td><strong>Means are provided to limit the drop of bogie frames to a distance that will not cause the crane to overturn in case of wheel or axle breakage.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.2(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[62]">
</td>
            </tr>
			<tr>
                <td><strong>2.55</strong></td>
                <td><strong>Braking means are provided to hold the crane In position when not travelling and to lock the wheels against rotation.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.3(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[63]">
</td>
            </tr>
		<tr>
                <td><strong>2.56</strong></td>
                <td><strong>Brakes automatically engaged on loss of electrical power or actuating force to the brake. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.13.3(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[64]">
</td>
            </tr>
					<tr>
                <td><strong>2.57</strong></td>
                <td><strong>Guides are provided to hold the ladders in position for engagement of the climbing dogs.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[65]">
</td>
            </tr>
					<tr>
                <td><strong>2.58</strong></td>
                <td><strong>Hydraulic cylinders used to support the crane during climbing are equipped with check valves.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(b)1
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[66]">
</td>
            </tr>
					<tr>
                <td><strong>2.59</strong></td>
                <td><strong>Hydraulic system is provided with pressure gauges and over pressure relief valves.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(b)3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[67]">
</td>
            </tr>
					<tr>
                <td><strong>2.60</strong></td>
                <td><strong>Positive means to hold the raised portion of the crane in position at the completion of an intermediate climbing step. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[68]">
</td>
            </tr>

 <tr>
                <td><strong>2.61</strong></td>
                <td><strong>Pressurized hydraulic cylinders are not used to support the crane when in service.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[69]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.62</strong></td>
                <td><strong>Wedges when used shall be provided with means to hold them in place and prevent them from becoming dislodged.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[70]">
</td>
            </tr>
			<tr>
                <td><strong>2.63</strong></td>
                <td><strong>Ropes have a minimum breaking force not less than 3.5 times the load applied to the rope.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.14.(e)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[71]">
</td>
            </tr>
				<tr>
                <td><strong>2.64</strong></td>
                <td><strong>Trolley is capable of smooth starts and stops and providing variable degrees of acceleration and deceleration when traversing the jib during operations.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[72]">
</td>
            </tr>
				<tr>
                <td><strong>2.65</strong></td>
                <td><strong>Trolley stops or buffers are provided on both ends of the jib.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[73]">
</td>
            </tr>
				<tr>
                <td><strong>2.66</strong></td>
                <td><strong>The body or frame of the trolley is fitted with means to retrain the trolley from becoming detached from its guide rails.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[74]">
</td>
            </tr>
				<tr>
                <td><strong>2.67</strong></td>
                <td><strong>Braking means is provided and capable of stopping in both directions.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[75]">
</td>
            </tr>
				<tr>
                <td><strong>2.68</strong></td>
                <td><strong>A brake is holding the trolley without further action when power or pressure is lost.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[76]">
</td>
            </tr>
				<tr>
                <td><strong>2.69</strong></td>
                <td><strong>Trolley is equipped with an automatic braking device in case of the rope breakage.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.15.(e)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[77]">
</td>
            </tr>
			
			<tr>
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">OPERATOR AIDS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>3.1</strong></td>
                <td><strong>Indicating device shall be provided to display the load on the hook.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(a)1
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[78]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.2</strong></td>
                <td><strong>Indicating device shall be provided to display the luffing boom angle, hook radius, or trolley operating radius, as appropriate.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(a)2
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[79]">
</td>
            </tr>
			<tr>
                <td><strong>3.3</strong></td>
                <td><strong>Indicating device shall be provided to display the ambient wind velocity</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(a)3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[80]">
</td>
            </tr>
				<tr>
                <td><strong>3.4</strong></td>
                <td><strong>Limiting device shall be provided to decelerate the trolley travel at both ends of the jib prior to final limit activation.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)1
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[81]">
</td>
            </tr>
				<tr>
                <td><strong>3.5</strong></td>
                <td><strong>Limiting device shall be provided to decelerate the luffing boom travel at minimum and maximum radius prior to final limit activation.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)2
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[82]">
</td>
            </tr>
				<tr>
                <td><strong>3.6</strong></td>
                <td><strong>Limiting device shall limit trolley travel at both ends of the jib.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[83]">
</td>
            </tr>
				<tr>
                <td><strong>3.7</strong></td>
                <td><strong>Limiting device shall stop the luffing boom travel at minimum and maximum radius of luffing boom.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[84]">
</td>
            </tr>
				<tr>
                <td><strong>3.8</strong></td>
                <td><strong>Limiting device shall decelerate the load block travel prior to final limit activation.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)5
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[85]">
</td>
            </tr>
				<tr>
                <td><strong>3.9</strong></td>
                <td><strong>Limiting device shall stop load block upward motion before two blocking occurs.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)6
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[86]">
</td>
            </tr>
				<tr>
                <td><strong>3.10</strong></td>
                <td><strong>Limiting device shall stop load block downward motion to prevent from spooling off the drum.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)7
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[87]">
</td>
            </tr>
				<tr>
                <td><strong>3.11</strong></td>
                <td><strong>Limiting device shall limit the crane travel at both ends of the running tracks.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)8
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[88]">
</td>
            </tr>
				<tr>
                <td><strong>3.12</strong></td>
                <td><strong>Limiting device shall limit the load lifted.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)9
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[89]">
</td>
            </tr>
				<tr>
                <td><strong>3.13</strong></td>
                <td><strong>Limiting device shall limit operating radius in accordance with crane’s rated capacity, i.e. load moment.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)10
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[90]">
</td>
            </tr>
				<tr>
                <td><strong>3.14</strong></td>
                <td><strong>Limiting device shall limit pressures in hydraulic or pneumatic circuits.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(b)11
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[91]">
</td>
            </tr>
				<tr>
                <td><strong>3.15</strong></td>
                <td><strong>Motion limiting devices, should be provided with means to permit the operator to override them under controlled conditions.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.17.(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[92]">
</td>
            </tr>
		<tr>
                    <th style="text-align: center;">4</th>
                    <th style="text-align: center;">PENDANTS, STAY ROPES, AND GUYS, COUNTERWEIGHTS, COUNTER JIBS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
	 <tr>
                <td><strong>4.1</strong></td>
                <td><strong>Fiber core ropes with swayed fittings and rotation-resistant ropes shall not be used for pendants, guy ropes and stay ropes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.18.(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[93]">
</td>
            </tr>
			
			<tr>
                <td><strong>4.2</strong></td>
                <td><strong>Rotation-resistant ropes shall be used for luffing boom.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.18.(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[94]">
</td>
            </tr>
			<tr>
                <td><strong>4.3</strong></td>
                <td><strong>Wire rope clips are drop-forged steel of the single (U-bolt) or double saddle type clip.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.19.(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[95]">
</td>
            </tr>
			<tr>
                <td><strong>4.4</strong></td>
                <td><strong>Means to prevent the shifting or dislodgement of superstructure and counterjib’s counter weight during crane operation is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.20.(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[96]">
</td>
            </tr>
			<tr>
                <td><strong>4.5</strong></td>
                <td><strong>Counterweights and ballast blocks are individually marked with their actual weights and visible when they are in installed position.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.20.(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[97]">
</td>
            </tr>
		<tr>
                <td><strong>4.6</strong></td>
                <td><strong>Only steel-framed concrete or solid steel counterweights suspended from the superstructure are used.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.20.(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[98]">
</td>
            </tr>
					<tr>
                <td><strong>4.7</strong></td>
                <td><strong>Movable counterweights, if provided, are moving automatically.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.20.(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[99]">
</td>
            </tr>
					<tr>
                <td><strong>4.8</strong></td>
                <td><strong>Means to prevent uncontrolled movement in the event of rope failure for counterweights controlled by ropes is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.20.(d)1
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[100]">
</td>
            </tr>
					<tr>
                <td><strong>4.9</strong></td>
                <td><strong>Controls are within the reach of the operator.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[101]">
</td>
            </tr>
					<tr>
                <td><strong>4.10</strong></td>
                <td><strong>All controls are labeled of their mode of functions.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[102]">
</td>
            </tr>
			 <tr>
                <td><strong>4.11</strong></td>
                <td><strong>Hoisting, trolleying, luffing, slewing, and travel motions are stopping when control actuation pressure is released.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[103]">
</td>
            </tr>
			
			<tr>
                <td><strong>4.12</strong></td>
                <td><strong>An interlock that prevents the re-actuation, except from the neutral position, of controls is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[104]">
</td>
            </tr>
			<tr>
                <td><strong>4.13</strong></td>
                <td><strong>The crane stops when signal is lost for remote operated cranes. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[105]">
</td>
            </tr>
			<tr>
                <td><strong>4.14</strong></td>
                <td><strong>The device that will disconnect all motors from the line on failure of power and will not permit any motor to be restarted until the operational control is brought to the neutral position and a manual reset is activated is provided for electric motor powered cranes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(e)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[106]">
</td>
            </tr>
			<tr>
                <td><strong>4.15</strong></td>
                <td><strong>An electric motor powered crane is provided with means for operator to interrupt the main power circuit from the operating position.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(f)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[107]">
</td>
            </tr>
		<tr>
                <td><strong>4.16</strong></td>
                <td><strong>A remote control station is provided with emergency stop button.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[108]">
</td>
            </tr>
					<tr>
                <td><strong>4.17</strong></td>
                <td><strong>Simultaneous activation of controls is not possible when more than one operator’s station (remote control) is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[109]">
</td>
            </tr>
					<tr>
                <td><strong>4.18</strong></td>
                <td><strong>Cranes powered by hydraulic motors shall stop the main power supply system when hydraulic pressure is lost.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.1(i)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[110]">
</td>
            </tr>
					<tr>
                <td><strong>4.19</strong></td>
                <td><strong>Controls for the main power supply system shall be within the reach of the operator, and will include the following: controlling the speed of the engine, means to control in stopping the engine, means for shifting the transmission’s gear selection.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.21.2(a)1,2,3,4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[111]">
</td>
            </tr>
					<tr>
                <td><strong>4.20</strong></td>
                <td><strong>Cabs should be provided for the operator’s station.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.1(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[112]">
</td>
            </tr>
			 <tr>
                <td><strong>4.21</strong></td>
                <td><strong>Cab doors are opening outward or sliding.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.1(d)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[113]">
</td>
            </tr>
			
			<tr>
                <td><strong>4.22</strong></td>
                <td><strong>An adjustable operator seat is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.1(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[114]">
</td>
            </tr>
			<tr>
                <td><strong>4.23</strong></td>
                <td><strong>Windshield is of safety glazing glass.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.1(e)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[115]">
</td>
            </tr>
			<tr>
                <td><strong>4.24</strong></td>
                <td><strong>The operator cab shall be on the operating portion of the crane.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.1(g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[116]">
</td>
            </tr>
			<tr>
                <td><strong>4.25</strong></td>
                <td><strong>An access ladder to the cab is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.2(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[117]">
</td>
            </tr>
		<tr>
                <td><strong>4.26</strong></td>
                <td><strong>Outside platforms have walking surfaces of a skid resistant type.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.2(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[118]">
</td>
            </tr>
				<tr>
                <td><strong>4.27</strong></td>
                <td><strong>Tool box is available for storage of small tools.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.3 
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[119]">
</td>
            </tr>
					<tr>
                <td><strong>4.28</strong></td>
                <td><strong>Fire extinguisher with a basic minimum classification of 10-BC is provided in the cab or at the machinery housing..</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.23.4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[120]">
</td>
            </tr>
					<tr>
                <td><strong>4.29</strong></td>
                <td><strong>Footwalks and ladders: 18in. or more in width and a slip resistant surface and with handrails or a platform attached to the trolley having a slip resistant surface and handrails.ded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.1
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[121]">
</td>
            </tr>
					<tr>
                <td><strong>4.30</strong></td>
                <td><strong>Guards are installed for exposed moving parts such as gears, drive chains, sprockets, and other rotating parts.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.2(a)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[122]">
</td>
            </tr>
			 <tr>
                <td><strong>4.31</strong></td>
                <td><strong>Each guard shall be capable of supporting the weight of a 300-lb (136 kg) person without permanent distortion.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.2(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[123]">
</td>
            </tr>
			
			<tr>
                <td><strong>4.32</strong></td>
                <td><strong>Lubrication points should be accessible without the necessity of removing guards or other parts with tools unless equipped with centralized lubrication.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[124]">
</td>
            </tr>
			<tr>
                <td><strong>4.33</strong></td>
                <td><strong>Engine exhaust gas is to be piped and discharged away from the operator’s cabin.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[125]">
</td>
            </tr>
			<tr>
                <td><strong>4.34</strong></td>
                <td><strong>Dry friction clutches are protected against rain and other liquids, such as oil and lubricants.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.6(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[126]">
</td>
            </tr>
			<tr>
                <td><strong>4.35</strong></td>
                <td><strong>Clutches are configured to permit adjustments where necessary to compensate wear.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.6(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[127]">
</td>
            </tr>
		<tr>
                <td><strong>4.36</strong></td>
                <td><strong>An anemometer is installed.(Wind Velocity Device)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.7
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[128]">
</td>
            </tr>
					<tr>
                <td><strong>4.37</strong></td>
                <td><strong>Fuel tank filler pipes are located or protected to prevent spillage or overflow.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.8
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[129]">
</td>
            </tr>
					<tr>
                <td><strong>4.38</strong></td>
                <td><strong>Relief valves are provided in hydraulic and pneumatic circuits carrying fluids pressurized by a power driven pump.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.9(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[130]">
</td>
            </tr>
					<tr>
                <td><strong>4.39</strong></td>
                <td><strong>Means to prevent unauthorized adjustment or tampering is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.9(b)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[131]">
</td>
            </tr>
					<tr>
                <td><strong>4.40</strong></td>
                <td><strong>Means for checking the manufacturer’s specified pressure settings in each circuit is provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 1.24.9(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[132]">
</td>
            </tr>
			 <tr>
                <td><strong>4.41</strong></td>
                <td><strong>Ropes have no loss of rope diameter in a short rope length or unevenness of outer strands.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.1.2(a)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[133]">
</td>
            </tr>
			
			<tr>
                <td><strong>4.42</strong></td>
                <td><strong>Rope has broken or cut strands.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.1.2(b)(c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[134]">
</td>
            </tr>
			<tr>
                <td><strong>4.43</strong></td>
                <td><strong>In running ropes, 12 randomly distributed broken wires in one lay, or four broken wires in one strand in one lay.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)1
g</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[135]">
</td>
            </tr>
			<tr>
                <td><strong>4.44</strong></td>
                <td><strong>In rotation-resistant ropes, two randomly distributed broken wires in six rope diameters, or four randomly distributed broken wires in 30 rope diameters.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)2
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[136]">
</td>
            </tr>
			<tr>
                <td><strong>4.45</strong></td>
                <td><strong>One outer wire broken at the contact point with the core of the rope indicated by an externally protruding wire or loop of loose wires.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)3
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[137]">
</td>
            </tr>
		<tr>
                <td><strong>4.46</strong></td>
                <td><strong>Wear of one-third the original diameter of outside individual wires.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)4
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[138]">
</td>
            </tr>
					<tr>
                <td><strong>4.47</strong></td>
                <td><strong>Kinking, crushing, birdcaging, or any other damage resulting to distortion of the rope structure.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)5
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[139]">
</td>
            </tr>
					<tr>
                <td><strong>4.48</strong></td>
                <td><strong>Evidence of heat damage from any cause.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)6
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[140]">
</td>
            </tr>
					<tr>
                <td><strong>4.49</strong></td>
                <td><strong>Reduction from nominal diameter greater than 5%.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)7
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[141]">
</td>
            </tr>
					<tr>
                <td><strong>4.50</strong></td>
                <td><strong>More than two broken wires adjacent to the socketed end connection, the rope shall be re-socketed or replaced.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
sec 2.4.3(b)8
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox1_1" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox1_2" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox1_3" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[142]">
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
