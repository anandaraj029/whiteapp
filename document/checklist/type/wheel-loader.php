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
    <title>Wheel Loader Inspection Checklist</title>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR WHEEL LOADER</strong></td>
            </tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-2.4</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 00</strong></td>                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 01/JAN/2020</strong></td>
            </tr>
			</tbody>
			</table>
			
			</div>

        <h4>WHEEL LOADER, COMPACT SKID LOADER, & PIPE LOGGER</h4>
        <h4>(EARTH MOVING MACHINERY) </h4>
        <h4>DS/EN 474-1:2006+A6:2019</h4>
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
         <table class="table table-bordered">
                
                <tr>
                    <th style="width: 25%;">CLIENT’S NAME</th>
                    <td style="width: 25%;"><strong> <?php echo htmlspecialchars($row['client_name']); ?> </strong></td>
                    <th style="width: 25%;">INSPECTION DATE</th>
                    <td style="width: 25%;"><strong>  <?php echo htmlspecialchars($row['inspection_date']); ?></strong></td>
                </tr>
                <tr>
                    <th>LOCATION</th>
                    <td><strong> <?php echo htmlspecialchars($row['location']); ?></strong></td>
                    <th>REPORT NO</th>
                    <td><strong> <?php echo htmlspecialchars($row['report_no']); ?></strong></td>
                </tr>
                <tr>
                    <th>EQUIPMENT NO</th>
                    <td><strong> <?php echo htmlspecialchars($row['crane_asset_no']); ?></strong></td>
                    <th>STICKER NO.</th>
                    <td><strong> <?php echo htmlspecialchars($row['sticker_no']); ?></strong></td>
                </tr>
                <tr>
                    <th>EQUIPMENT TYPE</th>
                    <td><strong> <?php echo htmlspecialchars($row['equipment_type']); ?></strong></td>
                    <th>EQUIP. SERIAL NO.</th>
                    <td><strong> <?php echo htmlspecialchars($row['crane_serial_no']); ?> </strong></td>
                </tr>
                <tr>
                    <th>MANUFACTURER:</th>
                    <td><strong> <?php echo htmlspecialchars($row['manufacturer']); ?> </strong></td>
                    <th>YEAR MODEL:</th>
                    <td><strong> <?php echo htmlspecialchars($row['year_model']); ?> </strong></td>
                </tr>
                <tr>
                    <th>EQUIP. MODEL NO.:</th>
                    <td><strong> <?php echo htmlspecialchars($row['equipment_no']); ?> </strong></td>
                    <th>CAPACITY:</th>
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
                    <th style="text-align: center;" colspan="3">RESULT</th>                    
                    <th style="text-align: center;">REMARKS</th>
                </tr>
				
				<tr>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">RATINGS & MARKINGS</th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
				</thead> 
                <tbody>
            <tr>
<td><strong>1.1</strong></td>
<td><strong>Documentation is available.</strong></td>
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
                <td><strong>Equipment asset ID Number is prominently marked.</strong></td>
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
                <td><strong>Nameplate, caution, and instruction markings are available on the truck.</strong></td>
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
                <td><strong>SWL/WLL (Capacities) are clearly marked & on a prominent location.</strong></td>
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
                <td><strong>All controls are marked for identification of function.</strong></td>
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
                <td><strong>Bucket Identification, capacity, serial number, and model. </strong></td>
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
                <td><strong>The machine is operated by Certified Operator.</strong></td>
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
                <td><strong>Capacity chart is provided & legible. </strong></td>
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
                <td><strong>All safety & warning decals are posted. </strong></td>
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
			</tbody>
			
			<thead class="thead-dark">
            <tr>
                <th style="text-align: center;">2</th>
                <th style="text-align: center;">VISUAL INSPECTION & FUNCTIONAL TEST</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			<tbody>			
			<tr>
                <td><strong>2.1</strong></td>
                <td><strong>Carriage & Backrest are not deformed. </strong></td>
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
                <td><strong>2.2</strong></td>
                <td><strong> Bucket structure.  </strong></td>
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
                <td><strong>2.3</strong></td>
                <td><strong>No excessive corrosion on frames, anchorages, structures are present. </strong></td>
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
                <td><strong>2.4</strong></td>
                <td><strong>Lift & tilt cylinders are operating correctly & without hydraulic oil leaks.</strong></td>
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
                <td><strong>2.5</strong></td>
                <td><strong>Steering cylinders are operating correctly & without hydraulic oil leaks. </strong></td>
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
                <td><strong>2.6</strong></td>
                <td><strong>ROPS or overhead guard is provided and can withstand the drop test based on the applicable table or rated capacity.  </strong></td>
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
                <td><strong>2.7</strong></td>
                <td><strong> Safety belt is provided. </strong></td>
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
                <td><strong>2.8</strong></td>
                <td><strong> All control levers are within reach of operator during the normal operating conditions.  </strong></td>
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
                <td><strong>2.9</strong></td> 
                <td><strong> All hydraulic hoses are free of tears, and no signs of leaks on their hose fittings.  </strong></td>
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
                <td><strong>2.10</strong></td>
                <td><strong>Hydraulic oil tank level is correct and tank is securely fastened, and no signs of oil leakages.   </strong></td>
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
                <td><strong>2.11</strong></td>
                <td><strong>Fuel tank is secured & not leaking.  </strong></td>
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
                <td><strong>2.12</strong></td>
                <td><strong> Steering & transmission oil levels are correct & not leaking.  </strong></td>
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
                <td><strong>2.13</strong></td>
                <td><strong> Lubrication points are accessible.  </strong></td>
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
                <td><strong>2.14</strong></td>
                <td><strong>No deterioration of Air & Water Hose and or leakage of Air and Water. </strong></td>
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
                <td><strong>2.15</strong></td>
                <td><strong> No indication of loose, damaged, or missing structural components including supports and anchorages. </strong></td>
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
                <td><strong>2.16</strong></td>
                <td><strong>Limit Switches are properly working.  </strong></td>
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
                <td><strong>2.17</strong></td>
                <td><strong> Brake & Clutch system parts & linings have no excessive wear, severe distortion, and damage.  </strong></td>
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
                <td><strong>2.18</strong></td>
                <td><strong>Seat and back cushion are not torn.  </strong></td>
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
                <td><strong>2.19</strong></td>
                <td><strong>Tires have no tears, sidewall cuts & excessive wear.   </strong></td>
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
                <td><strong>2.20</strong></td>
                <td><strong>Wheel hubs and gear boxes have no leakages.  </strong></td>
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
                <td><strong>2.21</strong></td>
                <td><strong>Wheel bearings / bushing have no signs of excessive wear.  </strong></td>
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
                <td><strong>2.22</strong></td>
                <td><strong> No indication of loose, damaged, or missing components including supports and anchorages on under chassis.  </strong></td>
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
                <td><strong>2.23</strong></td>
                <td><strong> Control & drive mechanisms are properly adjusted and without excessive wear. </strong></td>
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
                <td><strong>2.24</strong></td>
                <td><strong>Brake fluid level is correctly topped-up. </strong></td>
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
                <td><strong>2.25</strong></td>
                <td><strong>Parking brake is correctly working.  </strong></td>
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
                <td><strong>2.26</strong></td>
                <td><strong>Steering cylinders, knuckles, kingpins, tie rods, equalizer bar, etc. have no excessive plays and not excessively worn-out.  </strong></td>
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
                <td><strong>2.27</strong></td>
                <td><strong>No damage tubing, piping, electrical cables, or hoses, and their fittings. </strong></td>
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
                <td><strong>2.28</strong></td>
                <td><strong>Front & Rear Windshields are in good condition& Wiper Motor Assembly are working.  </strong></td>
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
			</tbody>
			
			<thead class="thead-dark">
            <tr>
                <th style="text-align: center;">3</th>
                <th style="text-align: center;"> ENGINE & ELECTRICAL SYSTEM</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
		</thead>
		<tbody> 
 <tr>
                <td><strong>3.1</strong></td>
                <td><strong>Engine has no excessive smoke, & engine oil leak. </strong></td>
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
                <td><strong>3.2</strong></td>
                <td><strong>Fuel is not leaking. </strong></td>
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
                <td><strong>3.3</strong></td>
                <td><strong> Engine has no loss of power.  </strong></td>
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
                <td><strong>3.4</strong></td>
                <td><strong> Fan, Alternator, & steering belts tension are not loose.  </strong></td>
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
                <td><strong>3.5</strong></td>
                <td><strong> Instrument Panel Indicator Lights are functioning correctly.  </strong></td>
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
                <td><strong>3.6</strong></td>
                <td><strong> Strobe light or rotating beacon light is working.   </strong></td>
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
                <td><strong>3.7</strong></td>
                <td><strong> Head light & working lights are not broken and are functioning correctly. </strong></td>
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
                <td><strong>3.8</strong></td>
                <td><strong>Brake & tail lights are working.  </strong></td>
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
                <td><strong>3.9</strong></td>
                <td><strong> Back-Up (Reverse) Light and alarm are working. </strong></td>
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
                <td><strong>3.10</strong></td>
                <td><strong>Horn is working. </strong></td>
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
                <td><strong> 3.11</strong></td>
                <td><strong>Radiator coolant level is correct and no sign of water leakage.   </strong></td>
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
                <td><strong>3.12 </strong></td>
                <td><strong>Turn signal / Hazard lights are working properly. </strong></td>
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
                <td><strong>3.13 </strong></td>
                <td><strong>Battery water/electrolyte level is correct.  </strong></td>
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
                <td><strong>3.14 </strong></td>
                <td><strong> Fire extinguisher is provided and have valid inspection tag. </strong></td>
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
			</tbody>
			
			 <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">4</th>
                <th style="text-align: center;"> SAFETY DEVICES</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			
			<tbody>
            
			<tr>
                <td><strong>4.1</strong></td>
                <td><strong>Bucket Leveling Proximity Switch. </strong></td>
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
                <td><strong>4.2</strong></td>
                <td><strong>Bucket Arm Tilt-up Proximity Switch.</strong></td>
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
                <td><strong>4.3</strong></td>
                <td><strong>Access and Step Ladders </strong></td>
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
                <td><strong>4.4</strong></td>
                <td><strong>Guard Rails </strong></td>
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
                <td><strong>4.5</strong></td>
                <td><strong> Fire Extinguisher</strong></td>
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
                <td><strong>4.6</strong></td>
                <td><strong>Housekeeping  </strong></td>
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
