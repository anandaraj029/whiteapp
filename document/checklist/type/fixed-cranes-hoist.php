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
    <title>INSPECTION CHECKLIST FOR FIXED CRANES & HOIST </title>
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
            <strong>INSPECTION CHECKLIST FOR FIXED CRANES & HOIST</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.2</td>
        <td>Revision 02</td>
        <td><b>Issue Date: </b>30/SEP/2020</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR FIXED CRANES & HOIST </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.11</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>FIXED CRANES & HOISTS</h4>
        <h4>ASME B30.2-2016, ASME B30.3-2016, ASME B30.4-2015, ASME B30.6-2015, ASME B30.16-2017, ASME B30.17-2015
</h4>
		
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
         <table class="table table-bordered">
                
				
				<tr>
                <th style="width: 25%;">REPORT NO</th>
                <td style="width: 25%;"> <?php echo htmlspecialchars($row['report_no']); ?></strong></td>
                <th style="width: 25%;">INSPECTION DATE</th>
                <td style="width: 25%;"> <?php echo htmlspecialchars($row['inspection_date']); ?></strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME</th>
                <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                <th>INSPECTED BY</th>
                <td><?php echo htmlspecialchars($row['inspected_by']); ?></td>
            </tr>
            <tr>
        <th>LOCATION</th>
        <td><?php echo htmlspecialchars($row['location']); ?></td>
        <th>STICKER NO.</th>
        <td><?php echo htmlspecialchars($row['sticker_no']); ?></td>
    </tr>
    <tr>
        <th>CRANE ASSET NO:</th>
        <td><?php echo htmlspecialchars($row['crane_asset_no']); ?></td>
        <th>CRANE SERIAL NO.:</th>
        <td><?php echo htmlspecialchars($row['crane_serial_no']); ?></td>
    </tr>
    <tr>
        <th>EQUIPMENT TYPE</th>
        <td><?php echo htmlspecialchars($row['equipment_type']); ?></td>
        <th>CAPACITY (SWL)</th>
        <td><?php echo htmlspecialchars($row['capacity_swl']); ?></td>
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
                <td><strong> Equipment documentation is available </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.16 
 </strong></td>
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
                <td><strong>Previous inspection reports are checked </strong></td>
				<td style="text-align: center;"><strong> ASME B30.2,
Sec.2.1.5
 </strong></td>
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
                <td><strong> Rated load is clearly marked on both sides of crane bridge</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.1.1</strong></td>
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
                <td><strong>Rated load is clearly marked on hoist or trolley unit </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.1.1
  </strong></td>
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
                <td><strong>Equipment number is clearly marked for identification purposes</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1
  </strong></td>
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
                <td><strong>Safe working load is clearly marked on the runway and the lifting machine</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.1 </strong></td>
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
                <td><strong>Crane manufacturer name, address, serial number and power ratings are clearly marked or tagged </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.1.3 
</strong></td>
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
                <td><strong>Precautionary warnings to operator are clearly marked</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.1.5
</strong></td>
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
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">GENERAL INSPECTION POINTS</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>2.1</strong></td>
                <td><strong>Clearance exits between the crane and sides of the building or adjacent crane are maintained throughout all motions</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.1.2.1
 </strong></td>
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
                <td><strong>2.2</strong></td>
                <td><strong>Controls are clearly marked with their functions and modes of operation</strong></td>
				<td style="text-align: center;"><strong>ASME B30.3
Sec.3-1.18.1
 </strong></td>
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
			<tr>
                <td><strong>2.3</strong></td>
                <td><strong>Controls and protective equipment are within reach of the operator inside the cab</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.5.1a
  </strong></td>
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
                <td><strong>2.4</strong></td>
                <td><strong> The hook block is visible from operator station at all times</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.5.1b
  </strong></td>
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
                <td><strong>2.5</strong></td>
                <td><strong>Cab is attached to the crane to minimize swaying and vibrations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2,
 Sec.1.5.2a
  </strong></td>
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
                <td><strong>2.6</strong></td>
                <td><strong>Access to the cab or bridge walkway is by a fixed ladder, stairs, or platform</strong></td>
				<td style="text-align: center;"><strong>AASME B30.2,
 Sec.1.5.3
</strong></td>
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
                <td><strong>2.7</strong></td>
                <td><strong>Controls arrangements and protective equipment inside the cab are within the reach of the operator</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.5.1a
</strong></td>
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
                <td><strong>2.8</strong></td>
                <td><strong>The clearance from the surface of the platform to the nearest overhead obstruction is 1220 mm (48")</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.7.1a
</strong></td>
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
                <td><strong>2.9</strong></td>
                <td><strong>The service platform width is at least 457 mm (18") except at the bridge mechanism where it is not less than 380 mm (15")</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, 
Sec.1.7.1c
 </strong></td>
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
                <td><strong>2.10</strong></td>
                <td><strong>The electrical control cabinet door(s) are opening 90 degree or removable type</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2,
Sec.1.7.1e
 </strong></td>
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
                <td><strong>2.11</strong></td>
                <td><strong>Service platform walking surface is slip-resistant</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2,
Sec.1.7.1g
 </strong></td>
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
                <td><strong>2.12</strong></td>
                <td><strong>Service platform is provided with guard railings and toe boards</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2,
Sec.1.7.1h
 </strong></td>
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
                <td><strong>2.13</strong></td>
                <td><strong>Emergency escape is possible from the cab</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.7.3
  </strong></td>
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
                <td><strong>2.14</strong></td>
                <td><strong> Stairways are non-slip and have a maximum incline angle of 50 degree </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.7.2
  </strong></td>
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
                <td><strong>2.15</strong></td>
                <td><strong>Each hoisting unit is equipped with at least one holding brake</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.1a
  </strong></td>
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
                <td><strong>2.16</strong></td>
                <td><strong>The holding brake is applied to the motor shaft or a gear reducer shaft</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.1a
</strong></td>
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
                <td><strong>2.17</strong></td>
                <td><strong>The holding brake torque rating is not less than the percentage of rated load hoisting torque at the point where the brake is applied (based on the crane design) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.1a
</strong></td>
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
                <td><strong>2.18</strong></td>
                <td><strong>Pendant control cable is properly enclosed, grounded and suspended with a separate support cable </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1a-d
</strong></td>
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
                <td><strong>2.19</strong></td>
                <td><strong>Pendant control push-button enclosure is marked for identification of functions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1e
 </strong></td>
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
                <td><strong>2.20</strong></td>
                <td><strong>Electrical equipment is guarded and not exposed to oil, moisture, dirt and inadvertent contact</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.2
 </strong></td>
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
                <td><strong>2.21</strong></td>
                <td><strong>Audio warning device(s) are fitted (one or more of the following: Gong, Bell/Siren/Horn, Rotating Beacon and/or strop light) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.15.3
 </strong></td>
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
                <td><strong>2.22</strong></td>
                <td><strong>Lifting and lowering functional test is satisfactory </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.2(b-1)
 </strong></td>
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
                <td><strong>2.23</strong></td>
                <td><strong> Crane trolley travel functional test is satisfactory
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.2(b-2)
  </strong></td>
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
                <td><strong>2.24</strong></td>
                <td><strong> Crane bridge travel functional test is satisfactory</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.2.2(b-3)
  </strong></td>
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
                <td><strong>2.25</strong></td>
                <td><strong>Hoist limit device functional test is satisfactory
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.2(b-4)
  </strong></td>
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
                <td><strong>2.26</strong></td>
                <td><strong>Hoist and swing drives are capable of starts and stops with variable acceleration and deceleration required in normal operation</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 
Sec.1.2.2(f)
</strong></td>
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
                <td><strong>2.27</strong></td>
                <td><strong>Hoist drum specifications are marked (rated load, drum size, rope size, rope speed (ft/min or m/s), rated power)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 
Sec.1.1.3
</strong></td>
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
                <td><strong>2.28</strong></td>
                <td><strong>Hand Chain Hoist: Manufacturer data, serial number and safe working load are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3a
</strong></td>
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
                <td><strong>2.29</strong></td>
                <td><strong>Electric Powered Hoist: Manufacturer data, serial number, safe working load, voltage and phase are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3b
 </strong></td>
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
                <td><strong>2.30</strong></td>
                <td><strong>Air Powered Hoist: Manufacturer data, serial number, model, safe working load and rated air pressure are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3c
 </strong></td>
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
                <td><strong>2.31</strong></td>
                <td><strong>Warning signs/labels are provided on the hoist units and electrical enclosures </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.4
 </strong></td>
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
                <td><strong>2.32</strong></td>
                <td><strong>Crane Travel limit device functional test is satisfactory</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.2(b-4)
 </strong></td>
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
                <td><strong>2.33</strong></td>
                <td><strong> Wire rope end connections do not have corrosion</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.4.2(c,d)
  </strong></td>
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
                <td><strong>2.34</strong></td>
                <td><strong>Ropes are correctly lubricated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.4.3e
  </strong></td>
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
                <td><strong>2.35</strong></td>
                <td><strong>Wire rope is not corroded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.4.1(a1-b)
  </strong></td>
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
                <td><strong>2.36</strong></td>
                <td><strong>The rope is adequately lubricated
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.4.3e
</strong></td>
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
                <td><strong>2.37</strong></td>
                <td><strong>Fire extinguisher is available Sec.10BC minimum rated) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.3.4.3
</strong></td>
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
                <td><strong>2.38</strong></td>
                <td><strong>Structure is vibration free under normal operating condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1(b)
</strong></td>
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
                <td><strong>2.39</strong></td>
                <td><strong>Monorail end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.4.2, Sec 1.5.3
 </strong></td>
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
                <td><strong>2.40</strong></td>
                <td><strong>Jib crane end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.4.2, Sec 1.5.3
 </strong></td>
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
                <td><strong>2.41</strong></td>
                <td><strong>Tracks are properly installed and aligned</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1  Sec 1.4.1
 </strong></td>
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
                <td><strong>2.42</strong></td>
                <td><strong>Crane runways or monorail tracks are fastened and Secured to a supporting structure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.2
 </strong></td>
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
                <td><strong>2.43</strong></td>
                <td><strong>All welded members are free of defects and not corroded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.4
  </strong></td>
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
                <td><strong>2.44</strong></td>
                <td><strong>Guards protect moving parts such as gears, chains, chain sprockets</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.1
  </strong></td>
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
                <td><strong>2.45</strong></td>
                <td><strong>Guards protect ropes where liable to come in contact with conductors</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.2(a)
  </strong></td>
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
                <td><strong>2.46</strong></td>
                <td><strong>Guards are provided to prevent contact between crane bridge or runway conductors and hoisting ropes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.2(b)
</strong></td>
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
                <td><strong>2.47</strong></td>
                <td><strong>Hand chain operated Hoist: Hoist automatically stops and holds lifted load when the actuating force is removed</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11a
</strong></td>
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
                <td><strong>2.48</strong></td>
                <td><strong>Electric Powered Hoist: Braking system will stop and hold the load hook when controls are released under any load condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-b)
</strong></td>
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
                <td><strong>2.49</strong></td>
                <td><strong>Air Powered Hoist: Braking system will stop and hold the load hook when controls are released under any load condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-a)
 </strong></td>
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
                <td><strong>2.50</strong></td>
                <td><strong>An electric hoist stops and holds the load block in the event of power failure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-c)
 </strong></td>
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
                <td><strong>2.51</strong></td>
                <td><strong> An air hoist stops and holds the load block in the event of air pressure loose</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-b)
 </strong></td>
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
                <td><strong>2.52</strong></td>
                <td><strong>Braking systems has means for adjustment to compensate for wear</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b3/c)
 </strong></td>
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
                <td><strong>2.53</strong></td>
                <td><strong> Hoist rope is guarded from chafing where required</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.14.6
  </strong></td>
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
                <td><strong>2.54</strong></td>
                <td><strong> Hook(s) can rotate freely</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.14.5
  </strong></td>
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
                <td><strong>2.55</strong></td>
                <td><strong>Rope compensating sheave(s) (equalizer) is free to turn</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.14.4
  </strong></td>
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
                <td><strong>2.56</strong></td>
                <td><strong>Surface condition of rope drum(s) show no defects and are smooth</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.14.2
</strong></td>
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
                <td><strong>2.57</strong></td>
                <td><strong>All sheave grooves are smooth</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2. Sec.1.14.1
</strong></td>
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
                <td><strong>2.58</strong></td>
                <td><strong>All sheaves are free to turn</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2. Sec.1.14.1
</strong></td>
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
                <td><strong>2.59</strong></td>
                <td><strong>Rope construction is as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.14.3a
 </strong></td>
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
                <td><strong>2.60</strong></td>
                <td><strong>Lower hoist limit cut-out (if fitted) is properly working</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.1.13.5. e
 </strong></td>
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
                <td><strong>2.61</strong></td>
                <td><strong>Stops and bumpers are fitted to each end of the trolley(s)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.8.1, 3
 </strong></td>
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
                <td><strong>2.62</strong></td>
                <td><strong>Trolley truck rail sweeps are provided in front of the leading wheels on both ends of the trolley end truck</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.9.2a
 </strong></td>
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
                <td><strong>2.63</strong></td>
                <td><strong> Clearance between the top surface of the rail head and the bottom of the sweep does not exceed 3⁄16" (5 mm)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.9.2b-1
  </strong></td>
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
                <td><strong>2.64</strong></td>
                <td><strong>The sweep extends below the top surface of the rail head, for a distance not less than 50% of the thickness of the rail head, on both sides of the rail head</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.9.2b-2
  </strong></td>
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
                <td><strong>2.65</strong></td>
                <td><strong>Clearance between the side surface of the rail head and the side of the sweep which extends below the top surface of the rail head is equal to crane float plus 3⁄16" </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.9.2b-3
  </strong></td>
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
                <td><strong>2.66</strong></td>
                <td><strong>Trolley(s) brakes are operable</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.3
</strong></td>
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
                <td><strong>2.67</strong></td>
                <td><strong>Trolley brakes comply with crane design requirements </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.5
</strong></td>
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
                <td><strong>2.68</strong></td>
                <td><strong>Trolley travel warnings (e.g. gong, beacon, bell or strop light) are operable</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.15.1a
</strong></td>
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
                <td><strong>2.69</strong></td>
                <td><strong>Unusual sounds are not present during trolley travel</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.1.2a
 </strong></td>
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
                <td><strong>2.70</strong></td>
                <td><strong>Trolley has no missing or loose parts</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.1.3b2
 </strong></td>
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
                <td><strong>2.71</strong></td>
                <td><strong>Trolley wheels have no sign of excessive wear</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.1.3b4
 </strong></td>
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
                <td><strong>2.72</strong></td>
                <td><strong>Chain drive and sprocket have no wear or stretch </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.1.3b6
 </strong></td>
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
                <td><strong>2.73</strong></td>
                <td><strong> All moving parts are correctly lubricated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.3.4
  </strong></td>
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
                <td><strong>2.74</strong></td>
                <td><strong> Crane Bridge stops within stipulated 10% distance of rated load speed under frictional forces (if no braking means provided) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.1.12.4a
  </strong></td>
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
                <td><strong>2.75</strong></td>
                <td><strong>Bridge brakes comply with crane design requirements</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.5
  </strong></td>
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
                <td><strong>2.76</strong></td>
                <td><strong>Trolley truck frame drop is limited to 25mm</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.11
</strong></td>
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
                <td><strong>2.77</strong></td>
                <td><strong>Bridge is fitted with bumpers at each end</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.8.2
</strong></td>
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
                <td><strong>2.78</strong></td>
                <td><strong>Bridge rail sweep clearance is 5mm</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.9.1
</strong></td>
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
                <td><strong>2.79</strong></td>
                <td><strong>Bridge brakes capable of stopping the crane within 10% distance of rated load speed</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.12.4
 </strong></td>
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
                <td><strong>2.80</strong></td>
                <td><strong>Bridge anchorage in place and withstand external forces, like strong winds (for outdoor cranes)</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.1.3.1b
 </strong></td>
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
                <td><strong>2.81</strong></td>
                <td><strong>Runway columns are securely anchored to foundations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.3.2a-2
 </strong></td>
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
                <td><strong>2.82</strong></td>
                <td><strong>The runway structure is free from detrimental vibration under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.3.2a-3
 </strong></td>
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
                <td><strong>2.83</strong></td>
                <td><strong> Rails are level, straight, joined, and spaced to the crane span within tolerances as per crane design</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.3.2a-4
  </strong></td>
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
                <td><strong>2.84</strong></td>
                <td><strong> Runway stops are provided at the limits of travel of the bridge</strong></td>
				<td style="text-align: center;"><strong> ASME B30.2, Sec.1.3.2b-1
  </strong></td>
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
                <td><strong>2.85</strong></td>
                <td><strong>Stops are designed to withstand the forces applied to the bumpers</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.3.2b-3
  </strong></td>
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
                <td><strong>2.86</strong></td>
                <td><strong>Crane is clear from obstruction throughout its travel (between building walls and other cranes)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.2.19
</strong></td>
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
                <td><strong>2.87</strong></td>
                <td><strong>All moving parts are correctly lubricated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.3.4
</strong></td>
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
                <td><strong>2.88</strong></td>
                <td><strong>All moving parts are guarded where potential hazard would exist otherwise</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.10a
</strong></td>
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
                <td><strong>2.89</strong></td>
                <td><strong>Travel warnings are operational (gong, bell, siren, horn, beacon, or strop light)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.15.1a
 </strong></td>
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
                <td><strong>2.90</strong></td>
                <td><strong>Crane structure shows no deformed, cracked or corroded members</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2.1.3b1
 </strong></td>
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
                <td><strong>2.91</strong></td>
                <td><strong>All travel limit devices are functioning</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.3b10
 </strong></td>
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
                <td><strong>2.92</strong></td>
                <td><strong>Safety labels are displayed and legible </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.1.5
 </strong></td>
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
                <td><strong>2.93</strong></td>
                <td><strong>Integral outside platform is in place and door opens outward or slides</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.2b
  </strong></td>
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
                <td><strong>2.94</strong></td>
                <td><strong>Trapdoor has a clear opening of not less than 610mm</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.2e
  </strong></td>
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
                <td><strong>2.95</strong></td>
                <td><strong>Guard railings and toe boards are in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.2f
  </strong></td>
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
                <td><strong>2.96</strong></td>
                <td><strong>All cab glazing’s are safety glazing materials</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.2g
</strong></td>
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
                <td><strong>2.97</strong></td>
                <td><strong>A tool box is in place for basic maintenance made of noncombustible material and is securely fastened in the cab or on the service platform. </strong></td>
				<td style="text-align: center;"><strong>ASME 30.2,
Sec.1.5.4
</strong></td>
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
                <td><strong>2.98</strong></td>
                <td><strong>Fire extinguisher rated 10 BC is provided and in placed</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.5
</strong></td>
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
                <td><strong>2.99</strong></td>
                <td><strong>Lighting is adequate inside the cab and operator can clearly observe the controls</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.5.6
 </strong></td>
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
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">INSPECTION POINTS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
<tr>
                <td><strong>3.0</strong></td>
                <td><strong>Means of emergency exit are in place and effective</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.7.3
  </strong></td>
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
                <td><strong>3.1</strong></td>
                <td><strong> Control circuit voltage does not exceed 600 volts (AC or DC) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1b
 </strong></td>
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
                <td><strong>3.2</strong></td>
                <td><strong>Welded structures and members do not have cracks or corrosion </strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.4.1
 </strong></td>
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
                <td><strong>3.3</strong></td>
                <td><strong> Adequate clearances exist between two parallel crane bridges (if there are no intervening walls or structures)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.2.2
  </strong></td>
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
                <td><strong>3.4</strong></td>
                <td><strong> Minimum working space on service platforms is 1220mm (48")</strong></td>
				<td style="text-align: center;"><strong>ASME B3O.2, Sec.1.7.1a
  </strong></td>
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
                <td><strong>3.5</strong></td>
                <td><strong>Minimum passageway on service platform is 457mm (18")
</strong></td>
				<td style="text-align: center;"><strong>ASME B3O.2, Sec.1.7.1c
  </strong></td>
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
                <td><strong>3.6</strong></td>
                <td><strong>Doors of electrical cabinets to open 90 degrees or be removable</strong></td>
				<td style="text-align: center;"><strong>ASME B3O.2, Sec.1.7.1e
</strong></td>
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
                <td><strong>3.7</strong></td>
                <td><strong>The crane controllers are equipped with spring return master switches</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.3
</strong></td>
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
                <td><strong>3.8</strong></td>
                <td><strong>Control circuit voltage does not exceed 600v for AC or DC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.1(b)
</strong></td>
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
                <td><strong>3.9</strong></td>
                <td><strong>Push button enclosure is grounded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.1(e)
 </strong></td>
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
                <td><strong>3.10</strong></td>
                <td><strong>Push button enclosure is marked for identification of function</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.1(e)
 </strong></td>
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
                <td><strong>3.11</strong></td>
                <td><strong>Parts of electrical equipment are enclosed and are not exposed to inadvertent contact under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.2(a)
 </strong></td>
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
                <td><strong>3.12</strong></td>
                <td><strong>Live parts of electrical equipment are protected from direct exposure to grease and oil and protected from dirt and moisture</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.2(b)
 </strong></td>
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
                <td><strong>3.13</strong></td>
                <td><strong>Guards on live parts are not deformed or/and in contact</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.2(c)
  </strong></td>
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
                <td><strong>3.14</strong></td>
                <td><strong>Floor operated cranes controllers return to off position when released </strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.3(c1)
  </strong></td>
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
                <td><strong>3.15</strong></td>
                <td><strong>Pendant push buttons that control motion return to off position when pressure is released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.3(c)
  </strong></td>
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
                <td><strong>3.16</strong></td>
                <td><strong>The resistors are supported and has minimum vibration effects</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2,
 Sec.-1.13.4
</strong></td>
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
                <td><strong>3.17</strong></td>
                <td><strong>Runway conductors are guarded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.6
</strong></td>
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
                <td><strong>3.18</strong></td>
                <td><strong>A separate magnet circuit switch of enclosed type is provided (if a lifting magnet is used)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.7a
</strong></td>
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
 <tr>
                <td><strong>3.19</strong></td>
                <td><strong>Service receptacle in the cab or on the bridge is grounded type and does not exceed 300 volts (if provided)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.8
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[127]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.20</strong></td>
                <td><strong>The control circuit voltage in pendant push buttons does not exceed 150V for AC or 300V for DC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1c
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[128]">
</td>
            </tr>	
<tr>
                <td><strong>3.21</strong></td>
                <td><strong>A suspended push-button station is supported so that the electrical conductors are protected from strain (where multiple conductor cable is used)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.2-1.13.1d
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[129]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.22</strong></td>
                <td><strong>Pendant control stations is constructed to prevent electrical shock</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1e
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[130]">
</td>
            </tr>
			<tr>
                <td><strong>3.23</strong></td>
                <td><strong>The push-button enclosure is at ground potential and marked for identification of functions)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.1.13.1e
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[131]">
</td>
            </tr>
			<tr>
                <td><strong>3.24</strong></td>
                <td><strong>Chain passes over all load sprockets without binding</strong></td>
				<td style="text-align: center;"><strong> ASME B30.16 Sec.1.2.8
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[132]">
</td>
            </tr>
			<tr>
                <td><strong>3.25</strong></td>
                <td><strong>Hand Operated Chain: Chain length for extension (stretch) tolerance is no longer than 2.5% of unused chain or as per manufacturer recommendations
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[133]">
</td>
            </tr>
			<tr>
                <td><strong>3.26</strong></td>
                <td><strong>Power Operated Chain: Chain length for extension (stretch) tolerance is no longer than 1.5% of unused chain or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[134]">
</td>
            </tr>
			<tr>
                <td><strong>3.27</strong></td>
                <td><strong>The chain does not suffer from gouges, nicks, corrosion, weld spatter or distorted links (Judgement to be used as to the suitability or otherwise of using chain with these deficiencies)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(b)
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[135]">
</td>
            </tr>
			
      <tr>
                <td><strong>3.28</strong></td>
                <td><strong>The chain does not bind jump or gets noisy when hoist is operated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(b)
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[136]">
</td>
            </tr>  
 <tr>
                <td><strong>3.29</strong></td>
                <td><strong>The chain is not stretched or elongated more than 1/4" (6.3 mm) in 12" (305 mm) with reference to the manufacturer's manual (roller chain)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(c1)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[137]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.30</strong></td>
                <td><strong>The chain is not twisted more than 15 degree in 5 ft (1.52 m) sections (roller chain)</strong></td>
				<td style="text-align: center;"><strong>AASME B30.16 Sec.2.6.1(c2)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[138]">
</td>
            </tr>	
<tr>
                <td><strong>3.31</strong></td>
                <td><strong>The roller chain pins, links and rollers move freely and are not corroded, pitted, discolored or damaged </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(d)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[139]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.32</strong></td>
                <td><strong>Fitted sling or chain would be retained slack in the bowl of the hook where latches are provided</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.9
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[140]">
</td>
            </tr>
			<tr>
                <td><strong>3.33</strong></td>
                <td><strong> Hand operated hoist: Load block is provided with a guard against load chain jamming in the load block under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[141]">
</td>
            </tr>
			<tr>
                <td><strong>3.34</strong></td>
                <td><strong>Electric or Air Powered Hoist: Load block is of the enclosed type and means is provided to guard against rope or load chain jamming in the load block under normal operating conditions. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[142]">
</td>
            </tr>
			<tr>
                <td><strong>3.35</strong></td>
                <td><strong>Rope is free of damages
•	Max of 12 randomly broken wires in 1 lay
•	4 broken wires in 1 strand of 1 lay
•	1 broken wire protruding from the core (2 for rotation resistant ropes)
•	Wear of 1/3 of the original diameter of outside individual wires
Kinking, crushing, bird caging or other distortion

</strong></td>
				<td style="text-align: center;"><strong>ASME B30.2, Sec.4.2(b)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[143]">
</td>
            </tr>
			<tr>
                <td><strong>3.36</strong></td>
                <td><strong>Rope termination is completed at the hoist wedge anchor with a drop forged U- clip
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec 1.2.6
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[144]">
</td>
            </tr>
			<tr>
                <td><strong>3.37</strong></td>
                <td><strong>A rope thimble is used in the eye when an eye splice is used in a rope termination (in accordance with the manufacturer’s instructions)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.6
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[145]">
</td>
            </tr>
			
      <tr>
                <td><strong>3.38</strong></td>
                <td><strong>Electric and air powered hoists: Rope drum is grooved and free of surface defects that could cause rope damage (excluding hoists made for special applications</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.5
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[146]">
</td>
            </tr>  
 <tr>
                <td><strong>3.39</strong></td>
                <td><strong>Hoist drum is adequately lubricated as per the hoist manufacturers manual</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.3.4
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[147]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.40</strong></td>
                <td><strong>Drum capacity can accommodate the specific rope size and length</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[148]">
</td>
            </tr>	
<tr>
                <td><strong>3.41</strong></td>
                <td><strong>Drum has a minimum of two wraps of rope on it</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.6(c)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[149]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.42</strong></td>
                <td><strong>Each drum end of the rope is anchored by a clamp attached to the drum or by a socket arrangement (approved by the manufacturer)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c2)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[150]">
</td>
            </tr>
			<tr>
                <td><strong>3.43</strong></td>
                <td><strong>Drum flanges always extend a minimum of 1/2" (13mm) above the top layer of rope at all times</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c3)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[151]">
</td>
            </tr>
			<tr>
                <td><strong>3.44</strong></td>
                <td><strong>Labeling and manufacturer data are available and legible</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.2.1.1
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[152]">
</td>
            </tr>
			<tr>
                <td><strong>3.45</strong></td>
                <td><strong>Hook is freely swiveling and lubricated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.9
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[153]">
</td>
            </tr>
			<tr>
                <td><strong>3.46</strong></td>
                <td><strong>Hook's weight is clearly marked/printed on the hook</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.1.1
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[154]">
</td>
            </tr>
			<tr>
                <td><strong>3.47</strong></td>
                <td><strong>Safe working load is clearly marked on the hook</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec2.1.1
(10-2.1.1)
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[155]">
</td>
            </tr>
			
      <tr>
                <td><strong>3.48</strong></td>
                <td><strong>Hook is not bent or twisted Max. bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer recommendations
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.3(c1)
</strong></td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[156]">
</td>
            </tr>  
 <tr>
                <td><strong>3.49</strong></td>
                <td><strong>Hook is not distorted in the throat opening
Max. allowable throat opening is 15% compared to new hook, or as per manufacturer recommendations
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c2)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[157]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.50</strong></td>
                <td><strong>Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c3)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[158]">
</td>
            </tr>	
<tr>
                <td><strong>3.51</strong></td>
                <td><strong>Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c3)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[159]">
</td>
            </tr>
			
			<tr>
                <td><strong>3.52</strong></td>
                <td><strong>Hook is not cracked, gouged or shows nicks </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.2(c3)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[160]">
</td>
            </tr>
			<tr>
                <td><strong>3.53</strong></td>
                <td><strong>Hook can lock (if it is a self-locking hook)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c4)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[161]">
</td>
            </tr>
			<tr>
                <td><strong>3.54</strong></td>
                <td><strong> Hook latch is operative</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c5)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[162]">
</td>
            </tr>
						<tr>
                <td><strong>3.55</strong></td>
                <td><strong>Hook is free to rotate</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.3(c5)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox4" value="PASS" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox5" value="FAIL" class="large-checkbox">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox6" value="NA" class="large-checkbox">
</td>
<td>
    <input type="text" name="checklist_remark[163]">
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
