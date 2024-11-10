<?php 

include_once('./view-fetch.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR FORKLIFT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../style.css" rel="stylesheet">

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
            <strong>INSPECTION CHECKLIST FOR FORKLIFT</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.15</td>
        <td>Revision 00</td>
        <td><b>Issue Date: </b>01/JAN/2020</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR FORKLIFT</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.15</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 00</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 01/JAN/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>SAETY STANDARD FOR LOW & HIGH LIFT TRUCKS</h4>
        <h4> ANSI/ITSDF B56.1 – 2018, ANSI/ITSDF B56.6 – 2016   </h4>
        
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
        


<form method="post" action="?">
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
                <td><strong> Documentation is available.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[0]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[0]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[0]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[0];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.2</strong></td>
                <td><strong>Equipment asset ID Number is prominently marked. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[1]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[1]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[1]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[1];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.3</strong></td>
                <td><strong> Nameplate, caution, and instruction markings are available on the truck.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[2]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[2]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[2]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[2];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.4</strong></td>
                <td><strong> SWL/WLL (Capacities) are clearly marked & on a prominent location.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[3]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[3]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[3]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[3];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.5</strong></td>
                <td><strong> All controls are marked for identification of function.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[4]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[4]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[4]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[4];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.6</strong></td>
                <td><strong>Front end attachments, including fork extensions are marked with identification, capacity, maximum elevation with the load laterally centered.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[5]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[5]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[5]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[5];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.7</strong></td>
                <td><strong>The machine is operated by Certified Operator. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[6]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[6]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[6]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[6];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.8</strong></td>
                <td><strong>  All control levers are within reach of operator during the normal operating conditions.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[7]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[7]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[7]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[7];?>" disabled>
    </td>
            </tr>
			<tr>
                <td><strong>1.9</strong></td>
                <td><strong> Capacity chart is provided & legible.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[8]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[8]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[8]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[8];?>" disabled>
    </td>
            </tr>
			<tr>
                <td><strong>1.10</strong></td>
                <td><strong> All safety & warning decals are posted.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[9]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[9]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[9]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[9];?>" disabled>
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
                <td><strong>Carriage, backrest, & mast are not bent or deformed.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[10]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[10]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[10]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[10];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.2</strong></td>
                <td><strong> Forks are not deformed or bent.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[11]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[11]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[11]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[11];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.3</strong></td>
                <td><strong> Forks arms & levers are not deformed or bent.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[12]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[12]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[12]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[12];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.4</strong></td>
                <td><strong> No excessive corrosion on frames, anchorages, structures are present. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[13]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[13]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[13]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[13];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.5</strong></td>
                <td><strong> Load chains have no broken links or pins.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[14]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[14]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[14]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[14];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.6</strong></td>
                <td><strong> Lift & tilt cylinders are operating correctly & without hydraulic oil leaks.    </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[15]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[15]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[15]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[15];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.7</strong></td>
                <td><strong> Steering & side shift cylinders are operating correctly & without hydraulic oil leaks.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[16]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[16]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[16]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[16];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.8</strong></td>
                <td><strong>  ROPS or overhead guard is provided and can withstand the drop test based on the applicable table or rated capacity.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[17]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[17]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[17]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[17];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.9</strong></td> 
                <td><strong> Safety belt is provided.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[18]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[18]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[18]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[18];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.10</strong></td>
                <td><strong> All control levers are within reach of operator during the normal operating conditions.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[19]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[19]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[19]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[19];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.11</strong></td>
                <td><strong>All hydraulic hoses are free of tears, and no signs of leaks on their hose fittings.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[20]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[20]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[20]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[20];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.12</strong></td>
                <td><strong>   Hydraulic oil tank level is correct and tank is securely fastened, and no signs of oil leakages.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[21]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[21]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[21]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[21];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.13</strong></td>
                <td><strong>  Fuel tank is correct, secured, & not leaking.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[22]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[22]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[22]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[22];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.14</strong></td>
                <td><strong>Steering & transmission oil levels are correct & not leaking. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[23]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[23]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[23]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[23];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.15</strong></td>
                <td><strong>Lubrication points are accessible.     </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[24]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[24]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[24]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[24];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.16</strong></td>
                <td><strong>No deterioration or leakage in air, water or hydraulic is found. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[25]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[25]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[25]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[25];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.17</strong></td>
                <td><strong>  No indication of loose, damaged, or missing structural components including supports and anchorages.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[26]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[26]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[26]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[26];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.18</strong></td>
                <td><strong>  Limit Switches are properly working.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[27]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[27]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[27]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[27];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.19</strong></td>
                <td><strong>Brake & Clutch system parts & linings have no excessive wear, severe distortion, and damage.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[28]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[28]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[28]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[28];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>2.20</strong></td>
                <td><strong> Seat and back cushion are not torn.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[29]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[29]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[29]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[29];?>" disabled>
    </td>
            </tr>
            
			
			</tbody>
			
			<thead class="thead-dark">
            <tr>
                <th style="text-align: center;">3</th>
                <th style="text-align: center;"> INSPECTION CRITERIA</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
		</thead>
		<tbody>
 
 <tr>
                <td><strong>3.1</strong></td>
                <td><strong>  No deterioration or leakage in air or hydraulic is found. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[30]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[30]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[30]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[30];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.2</strong></td>
                <td><strong>Tires have no tears, sidewall cuts & excessive wear.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[31]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[31]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[31]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[31];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.3</strong></td>
                <td><strong> Wheel hubs and gear boxes have no leakages.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[32]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[32]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[32]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[32];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.4</strong></td>
                <td><strong> Wheel bearings / bushing have no signs of excessive wear.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[33]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[33]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[33]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[33];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.5</strong></td>
                <td><strong>  No indication of loose, damaged, or missing components including supports and anchorages on under chassis.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[34]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[34]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[34]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[34];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.6</strong></td>
                <td><strong> Control & drive mechanisms are properly adjusted and without excessive wear.    </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[35]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[35]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[35]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[35];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.7</strong></td>
                <td><strong> Brake fluid level is correctly topped-up.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[36]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[36]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[36]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[36];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.8</strong></td>
                <td><strong> Parking brake is correctly working.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[37]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[37]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[37]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[37];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.9</strong></td>
                <td><strong>Steering cylinders, knuckles, kingpins, tie rods, equalizer bar, etc. have no excessive plays and not excessively worn-out.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[38]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[38]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[38]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[38];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>3.10</strong></td>
                <td><strong> No damage tubing, piping, electrical cables, or hoses, and their fittings.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[39]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[39]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[39]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[39];?>" disabled>
    </td>
            </tr>
			
			</tbody>
			
			 <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">4</th>
                <th style="text-align: center;">   ENGINE & ELECTRICAL SYSTEM</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			
			<tbody>
            
			<tr>
                <td><strong>4.1</strong></td>
                <td><strong>Engine has no excessive smoke, & engine oil leak.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[40]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[40]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[40]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[40];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>4.2</strong></td>
                <td><strong>Fuel is not leaking.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[41]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[41]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[41]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[41];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>4.3</strong></td>
                <td><strong> Engine has no loss of power.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[42]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[42]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[42]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[42];?>" disabled>
    </td>
            </tr>
			
			<tr>
                <td><strong>4.4</strong></td>
                <td><strong> Fan, Alternator, & steering belts tension are not loose.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[43]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[43]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[43]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[43];?>" disabled>
    </td>
            </tr>
			
			<tr>
                <td><strong>4.5</strong></td>
                <td><strong>  All indicator lights are not broken and are functioning correctly.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[44]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[44]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[44]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[44];?>" disabled>
    </td>
            </tr>
			
			<tr>
                <td><strong>4.6</strong></td>
                <td><strong>  Strobe light or rotating beacon light is provided working.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[45]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[45]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[45]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[45];?>" disabled>
    </td>
            </tr>
			
			
			<tr>
                <td><strong>4.7</strong></td>
                <td><strong>  Head light & working lights are not broken and are functioning correctly. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[46]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[46]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[46]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[46];?>" disabled>
    </td>
            </tr>
			
			<tr>
                <td><strong>4.8</strong></td>
                <td><strong> Brake & tail lights, including reverse light are working.   </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[47]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[47]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[47]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[47];?>" disabled>
    </td>
            </tr>
			
			
			<tr>
                <td><strong>4.9</strong></td>
                <td><strong>   Back-Up alarm is working.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[48]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[48]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[48]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[48];?>" disabled>
    </td>
            </tr>
			
			
			<tr>
                <td><strong>4.10</strong></td>
                <td><strong> Horn is working.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[49]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[49]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[49]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[49];?>" disabled>
    </td>
            </tr>
			
			
			
			<tr>
                <td><strong>4.11</strong></td>
                <td><strong>  Radiator coolant level is correct and no sign of water leakage.  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[50]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[50]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[50]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[50];?>" disabled>
    </td>
            </tr>
			
			
			<tr>
                <td><strong>4.12</strong></td>
                <td><strong>  Turn signal lights are provided and working correctly. </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[51]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[51]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[51]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[51];?>" disabled>
    </td>
            </tr>
			
			
			<tr>
                <td><strong>4.13</strong></td>
                <td><strong>Battery water/electrolyte level is correct.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[52]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[52]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[52]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[52];?>" disabled>
    </td>
            </tr>
			
			<tr>
                <td><strong>4.14</strong></td>
                <td><strong>Fire extinguisher is provided and has the valid inspection tag.</strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS" 
        <?php echo $selected_results[53]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL" 
        <?php echo $selected_results[53]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA" 
        <?php echo $selected_results[53]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[0]" value="<?php echo $chek_remark[53];?>" disabled>
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
                <th style="width: 25%;">SUPERVISOR’S NAME:</th>
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
