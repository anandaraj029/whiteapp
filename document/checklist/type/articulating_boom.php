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
    <title>INSPECTION CHECKLIST FOR ARTICULATING BOOM CRANES   </title>
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
            <strong>INSPECTION CHECKLIST FOR ARTICULATING BOOM CRANES </strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.16</td>
        <td>Revision 03</td>
        <td>Issue Date: 09/DEC/2020</td>
    </tr>
    <tr>
        <td class="left-align">Prepared By<br>Operations Manager</td>
        <td  class="left-align">Reviewed & Approved By<br>Managing Director</td>
   
   <td><img src="../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
            
			
			</div>

        <h4>ARTICULATING BOOM CRANES</h4>
        <h4> ASME B30.22-2016</h4>
		
        
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
                <td><strong> <?php echo htmlspecialchars($row['inspected_by']); ?></strong></td>
            </tr>
            <tr>
                <th>LOCATION</th>
                <td><strong> <?php echo htmlspecialchars($row['location']); ?></strong></td>
                <th>STICKER NO.</th>
                <td><strong> <?php echo htmlspecialchars($row['sticker_no']); ?></strong></td>
            </tr>
            <tr>
                <th>CRANE ASSET NO:</th>
                <td><strong> <?php echo htmlspecialchars($row['crane_asset_no']); ?></strong></td>
                <th>CRANE SERIAL NO.:</th>
                <td><strong> <?php echo htmlspecialchars($row['crane_serial_no']); ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE</th>
                <td><strong> <?php echo htmlspecialchars($row['equipment_type']); ?></strong></td>
                <th>CAPACITY (SWL)</th>
                <td><strong> <?php echo htmlspecialchars($row['capacity_swl']); ?></strong></td>
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
                <td><strong>Equipment Documentation is available  </strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE 06  </strong></td>
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
                <td><strong> Previous Inspection reports are checked   </strong></td>
				<td style="text-align: center;"><strong> CIMS QHSE 06 </strong></td>
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
                <td><strong> Warning signs, cautions and safety labels are provided and in place   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 
                    Sec. 22-2.1.4n
                     </strong></td>
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
                <td><strong> Crane manufacturer data label, name, address and serial number are marked or tagged </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22-2.1.4n
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
                <td><strong> Rated capacity of the crane is marked.   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 
                    Sec. 22-1.1.3a
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
                <td><strong>  A sign is posted warning the operator not to rely solely on any automatic device as a substitute for safe operating practice  </strong></td>
				<td style="text-align: center;"><strong>CIMS QHSE 06  </strong></td>
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
                <td><strong>  Load rating chart/range diagram are provided (contains all safe operating conditions as per manufacturer)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.1.3a
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

        </tbody>
			
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">1.8</th>
                <th style="text-align: center;">OPERATIONAL AIDS:</th>
                <th style="text-align: center;">ASME B30.22 sec 1.8.2 </th>                
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
			<tr>
                <td><strong>1.8.1</strong></td>
                <td><strong> Two-block damage prevention system or anti-two block device.</strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 sec 1.8.2.1</strong></td>
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
                <td><strong>1.8.2</strong></td>
                <td><strong>Overload protection system or rated capacity limiters.</strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 sec 1.8.2.2</strong></td>
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
                <td><strong>1.8.3</strong></td>
                <td><strong> Crane Level Indicator.</strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 sec 1.8.2.3</strong></td>
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
                <td><strong>1.8.4</strong></td>
                <td><strong> Load indicator, rated capacity indicator, minimum wrap limiter.</strong></td>
				<td style="text-align: center;"><strong> ASME B30.22 sec 3.2.2 (b)(2)</strong></td>
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
		
			
            
			</tbody>
			
			<thead class="thead-dark">				
				<tr>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">INSPECTION POINTS:</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
			</thead>
			<tbody>
			
			<tr>
                <td><strong>2.1</strong></td>
                <td><strong> Boom cylinder is properly working</strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec 22-1.2.1(a)
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
                <td><strong>2.2</strong></td>
                <td><strong> Boom cylinder holding valve is in good working condition  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec 22-1.2.1(b)
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
                <td><strong>2.3</strong></td>
                <td><strong>  Boom cylinder hoses are not leaking </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec 22-2.1.4(i)(1)
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
                <td><strong>2.4</strong></td>
                <td><strong> Boom cylinder hoses are not deformed  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec 22-2.1.4(i)(2)
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
                <td><strong>2.5</strong></td>
                <td><strong>  Boom has no signs of wear, cracks or distorted parts </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec 22-2.1.4(d)
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
                <td><strong>2.6</strong></td>
                <td><strong> Boom telescope cylinder is working properly  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-1.2.2(a)
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
                <td><strong>2.7</strong></td>
                <td><strong> Boom telescope cylinder holding valve is in good working condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.2.2(c)
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
                <td><strong>2.8</strong></td>
                <td><strong> Boom telescope cylinder hoses are not leaking  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(i)(1)
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
                <td><strong>2.9</strong></td>
                <td><strong>  Boom telescope cylinder hoses are not deformed </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(i)(2)
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
                <td><strong>2.10</strong></td>
                <td><strong>  Boom telescope has no signs of wear, cracks or distorted parts </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(d)
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
                <td><strong>2.11</strong></td>
                <td><strong>Hoist brake is functioning well   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.2.3(b)(1)
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
                <td><strong>2.12</strong></td>
                <td><strong>  Hoist rope size is as per manufacturer specification </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.2.3(b)(2)
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
                <td><strong>2.13</strong></td>
                <td><strong> Minimum of two full rope wraps remains in the drum when the hook at its extreme low position  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.2.3(b)(2)(a)
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
                <td><strong>2.14</strong></td>
                <td><strong>  Rope end is anchored to the drum as per crane or winch manufacturer </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.2.3(b)(2)(b)
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
                <td><strong>2.15</strong></td>
                <td><strong> Rope eye splices are made as per manufacturer recommendations  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22-1.5.3(a)
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
                <td><strong>2.16</strong></td>
                <td><strong>Wire rope clips used in conjunction with wedge sockets are attached to the unloaded dead end of the rope only   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-1.5.3(d)
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
                <td><strong>2.17</strong></td>
                <td><strong>Swing mechanism starts and stops with controlled accelerations and deceleration   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.3.1
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
                <td><strong>2.18</strong></td>
                <td><strong> Swing brake and locking devices are in good working condition  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.3.2(a)
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
                <td><strong>2.19</strong></td>
                <td><strong>  A positive locking device or boom support is provided to prevent the boom from rotating when in stowed position for transit </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.3.2(b)
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
                <td><strong>2.20</strong></td>
                <td><strong>  Sheave grooves are free of surface defects </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.5.4(a)
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
                <td><strong>2.21</strong></td>
                <td><strong>   Sheave guards are provided and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-1.5.4(b)
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
			
		<!--	<tr>
                <td><strong>2.23</strong></td>
                <td><strong>   </strong></td>
				<td style="text-align: center;"><strong>  </strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                 <td class="checkbox-cell"><strong><input type="checkbox" class="large-checkbox"></strong></td>
                <td><input name="remarks" ></td>
            </tr>-->
			
			<tr>
                <td><strong>2.22</strong></td>
                <td><strong> Sheave bearings are provided with lubrication points (except for self-lubricating bearings)  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.5.4(d)
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
                <td><strong>2.23</strong></td>
                <td><strong>  Load hoisting sheaves have pitch diameters of not less than 18 times the nominal diameter of the rope used </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.5.5(a)
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
                <td><strong>2.24</strong></td>
                <td><strong> Lower load block sheaves have pitch diameters of not less than 16 times the nominal diameter of the rope used  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.5.5(b)
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
                <td><strong>2.25</strong></td>
                <td><strong>  Boom extension system sheaves have a pitch diameter of not less than 15 times the nominal diameter of the rope </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22-1.5.5(c)
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
                <td><strong>2.26</strong></td>
                <td><strong> Labeling and manufacturer data are available and legible  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10, 
                    (10-2.1.1)
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
                <td><strong>2.27</strong></td>
                <td><strong> Hook weight is marked.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10
                    Sec. 10-1.1.1
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
                <td><strong>2.28</strong></td>
                <td><strong>  Safe working load is clearly marked on the hook </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10, 
                    (10-2.1.1)
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
                <td><strong>2.29</strong></td>
                <td><strong> Hook is not bent or twisted
                    • Max. bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer recommendations  
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10, 
                    (10-1.2.1.3c1)
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
                <td><strong>2.30</strong></td>
                <td><strong> Hook is not distorted in the throat opening
                    • Max. allowable throat opening is 15% compared to new hook, or as per manufacturer recommendations
                      </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10,
                    (1.2.1.3c2)
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
                <td><strong>2.31</strong></td>
                <td><strong> Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10
                    (10-1.2.1.3c3)
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
                <td><strong>2.32</strong></td>
                <td><strong> Hook is not cracked, gouged or shows nicks  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10
                    (10-1.2.1.2c3)
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
                <td><strong>2.33</strong></td>
                <td><strong>  Hook can lock (if it is a self-locking hook) </strong></td>
				<td style="text-align: center;"><strong>ASME B30.10
                    (10-1.2.1.3c4)
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
                <td><strong>2.34</strong></td>
                <td><strong> Hook latch is operative  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.10
                    (10-1.2.1.3c5)
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
                <td><strong>2.35</strong></td>
                <td><strong> All controls are labeled and identified  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-1.5.6.1(a)
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
                <td><strong>2.36</strong></td>
                <td><strong> All controls are functioning properly  </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22-2.1.3(a)
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
                <td><strong>2.37</strong></td>
                <td><strong>  All control levers return to neutral position when force is removed </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22.1.5.6.1(b)
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
                <td><strong>2.38</strong></td>
                <td><strong>Stabilizers extension cylinder holding valve is not passing   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-1.8.4(c)
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
                <td><strong>2.39</strong></td>
                <td><strong>  Stabilizer cylinder hoses are not leaking </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(i)(1)
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
                <td><strong>2.40</strong></td>
                <td><strong> Stabilizer cylinder hoses are not deformed  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(i)(2)
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
                <td><strong>2.41</strong></td>
                <td><strong>  Stabilizers do not have worn, cracked or distorted parts </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(d)
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
                <td><strong>2.42</strong></td>
                <td><strong> Rope is free of corrosion, kinking, crushing, birdcaging, unstranding, main strand displacement or core protrusion  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.4.2(a)(1a)
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
                <td><strong>2.43</strong></td>
                <td><strong> Rope and connections are free of corrosion, bends, cracks and wear  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.4.2(b-2d)
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
                <td><strong>2.44</strong></td>
                <td><strong>  Rope has no broken or cut strands
                    a). In running ropes:
                    • six randomly distributed broken wires in one lay or three broken wires in one strand in one lay;
                    • one outer wire broken at the contact point with the core of the rope which has work its way out of the rope structure and protrudes or loops out from the rope structure 
                     </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.4.3(b 1-7)
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
                <td><strong>2.45</strong></td>
                <td><strong>  b). In standing ropes: more than two broken wires in one lay in sections beyond end connections or more than one broken wire at an end connection </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.4.3(b 1-7)
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
                <td><strong>2.46</strong></td>
                <td><strong>  Rope has no signs of reduction in diameter </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.4.2(b-2b)
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

            
			</tbody>			
			<thead class="thead-dark">
				
				<tr>
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">GENERAL INSPECTION POINTS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
			</thead>
			<tbody>

<tr>
                <td><strong>3.1</strong></td>
                <td><strong>  Hydraulic/pneumatic motors have no loose bolts or fasteners </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(j-1)
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
                <td><strong>3.2</strong></td>
                <td><strong> Hydraulic/pneumatic motors have no leaks  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(j2,3)
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
                <td><strong>3.3</strong></td>
                <td><strong>Hydraulic/pneumatic motors are free of unusual noises and vibrations   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(j4)
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
                <td><strong>3.4</strong></td>
                <td><strong>  Hydraulic/pneumatic motors are not overheating </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(j6)
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
                <td><strong>3.5</strong></td>
                <td><strong> Hydraulic/pneumatic motors do not loose pressure  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(j7)
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
                <td><strong>3.6</strong></td>
                <td><strong> Hydraulic/pneumatic valves are not leaking  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(k3)
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
                <td><strong>3.7</strong></td>
                <td><strong> Hydraulic/pneumatic valve housings are not cracked  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(k1)
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
                <td><strong>3.8</strong></td>
                <td><strong>Hydraulic/pneumatic relieve valves are maintaining the set pressure   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(k5)
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
                <td><strong>3.9</strong></td>
                <td><strong>  Hydraulic/pneumatic cylinder are not leaking at seals </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(l2)
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
                <td><strong>3.10</strong></td>
                <td><strong>  Hydraulic/pneumatic cylinder are not leaking at welded joints </strong></td>
				<td style="text-align: center;"><strong>ASME B30.22
                    Sec. 22-2.1.4(l3)
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
                <td><strong>3.11</strong></td>
                <td><strong>  Hydraulic/pneumatic cylinder case is free of damage </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.22
                    Sec. 22-2.1.4(l5)
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
                <td><strong>3.12</strong></td>
                <td><strong>  Hydraulic/pneumatic cylinders have no loose or deformed rod eyes or connecting joints </strong></td>
				<td style="text-align: center;"><strong> ASME B30.22
                    Sec. 22-2.1.4(l6)
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


<!-- 
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
