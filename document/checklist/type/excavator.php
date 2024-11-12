<?php 

include_once('./get-checklist.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRM.0601-2.1 (rev.01) - Excavator</title>
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
            <img src="../../logo.png"  alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
        </td>
        <td colspan="3" class="no-border">
            <span class="main-title">CRANE INSPECTION & MAINTENANCE SERVICES</span><br>
            A DIVISION OF AL-KHOBAR GATE INTERNATIONAL TRADING EST.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="">
            <strong>INSPECTION CHECKLIST FOR EXCAVATOR</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-2.1</td>
        <td>Revision 01</td>
        <td><b>Issue Date: </b>24/Dec/2020</td>
    </tr>
    <tr>
        <td class="left-align"><b>Prepared By:</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By:</b><br>Managing Director</td>
   
   <td><img src="../../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
            
			
			</div>

        <h4>HYDRAULIC EXCAVATOR</h4>
        <h4>(EARTH MOVING MACHINERY) </h4>
        <h4>DS/EN 474-1:2006+A6:2019</h4>
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
            <table class="table table-bordered">
                
            <tr>
                <th style="width: 25%;">CLIENT’S NAME:</th>
                <td style="width: 25%;"></strong></td>
                <th style="width: 25%;">INSPECTION DATE:</th>
                <td style="width: 25%;"></strong></td>
            </tr>
            <tr>
                <th>LOCATION:</th>
                <td><strong></strong></td>
                <th>REPORT NO:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT NO:</th>
                <td><strong></strong></td>
                <th>STICKER NO.:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE:</th>
                <td><strong></strong></td>
                <th>EQUIP. SERIAL NO.:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>MANUFACTURER:</th>
                <td><strong></strong></td>
                <th>YEAR MODEL:</th>
                <td><strong></strong></td>
            </tr>
            <tr>
                <th>EQUIP. MODEL NO.:</th>
                <td><strong></strong></td>
                <th>CAPACITY:</th>
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
                <td><strong>Documentation is available.  </strong></td>
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
                <td><strong> Equipment asset ID Number is prominently marked.</strong></td>
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
                <td><strong> Nameplate, caution, and instruction markings are available on the equipment.</strong></td>
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
                <td><strong>All controls are marked for identification of function. </strong></td>
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
                <td><strong>All safety & warning decals are posted. </strong></td>
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
                <td><strong>Nameplate (Manufacturer, capacity, serial number, and model) of Blade, Ripper, Towing winch are available. </strong></td>
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
                <td><strong> The machine is operated by Qualified Operator. </strong></td>
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
                <td><strong> Fire extinguisher is provided and has valid inspection tag.  </strong></td>
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
                <td><strong> Cab Mirrors, Glasses, etc. condition  </strong></td>
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
                <td><strong>2.2</strong></td>
                <td><strong>Bucket is in good condition  </strong></td>
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
                <td><strong>2.3</strong></td>
                <td><strong>  No excessive corrosion on frames, anchorages, structures are present. </strong></td>
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
                <td><strong>2.4</strong></td>
                <td><strong>Lift cylinders are operating correctly & without hydraulic oil leaks.  </strong></td>
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
                <td><strong>2.5</strong></td>
                <td><strong> Dipper cylinders are operating correctly & without hydraulic oil leaks. </strong></td>
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
                <td><strong>2.6</strong></td>
                <td><strong> Steering controls are operating correctly   </strong></td>
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
                <td><strong>2.7</strong></td>
                <td><strong> ROPS or overhead guard is provided and can withstand the drop test based on the applicable table or rated capacity. </strong></td>
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
                <td><strong>2.8</strong></td>
                <td><strong> Track Chain/ Link condition is good  </strong></td>
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
                <td><strong>2.9</strong></td> 
                <td><strong>  Track Grouser Plates condition is good    </strong></td>
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
                <td><strong>2.10</strong></td>
                <td><strong>  Track Sprocket and Rollers condition is good  </strong></td>
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
                <td><strong>2.11</strong></td>
                <td><strong> Track Idler condition is good  </strong></td>
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
                <td><strong>2.12</strong></td>
                <td><strong> Safety belt is provided.   </strong></td>
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
                <td><strong>2.13</strong></td>
                <td><strong> All control levers are within reach of operator during the normal operating conditions.  </strong></td>
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
                <td><strong>2.14</strong></td>
                <td><strong>All hydraulic hoses are free of tears, and no signs of leaks on their hose fittings.  </strong></td>
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
                <td><strong>2.15</strong></td>
                <td><strong>Hydraulic oil tank level is correct and tank is securely fastened, and no signs of oil leakages.   </strong></td>
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
                <td><strong>2.16</strong></td>
                <td><strong>Fuel tank is secured & not leaking.  </strong></td>
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
                <td><strong>2.17</strong></td>
                <td><strong> Steering & transmission oil levels are correct & not leaking.  </strong></td>
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
                <td><strong>2.18</strong></td>
                <td><strong> Lubrication points are accessible.  </strong></td>
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
                <td><strong>2.19</strong></td>
                <td><strong>No deterioration of Hydraulic hoses & fittings or leakage of oil. </strong></td>
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
                <td><strong>2.20</strong></td>
                <td><strong>Access and Step Ladders </strong></td>
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
                <td><strong>2.21</strong></td>
                <td><strong> No indication of loose, damaged, or missing components including supports and anchorages on under carriage    </strong></td>
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
                <td><strong>2.22</strong></td>
                <td><strong>Control & drive mechanisms are properly adjusted and without excessive wear.  </strong></td>
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
                <td><strong>2.23</strong></td>
                <td><strong>Seat and back cushions are not torn.  </strong></td>
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
                <td><strong>2.24</strong></td>
                <td><strong>No damage tubing, piping, electrical cables, or hoses, and their fittings. </strong></td>
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
                <td><strong>2.25</strong></td>
                <td><strong>Front & Rear Windshields are in good condition & Wiper Motor Assembly is working. </strong></td>
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
                <td><strong>2.26</strong></td>
                <td><strong> Limit Switches are properly working. </strong></td>
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
                <td><strong>  Engine oil level is correct </strong></td>
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
                <td><strong>3.2</strong></td>
                <td><strong>Engine has no excessive smoke, & engine oil leak. </strong></td>
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
                <td><strong>3.3</strong></td>
                <td><strong> Fuel is not leaking. </strong></td>
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
                <td><strong>3.4</strong></td>
                <td><strong>Engine has no loss of power.   </strong></td>
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
            <tr>
                <td><strong>3.5</strong></td>
                <td><strong>Fan, Alternator, & steering belts tension are not loose.   </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[39][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[39]">
</td>
            </tr>
            <tr>
                <td><strong>3.6</strong></td>
                <td><strong>  Instrument Panel Indicator Lights are functioning correctly.  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[40][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[40]">
</td>
            </tr>
            <tr>
                <td><strong>3.7</strong></td>
                <td><strong> Strobe light or rotating beacon light is working.  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[41][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[41]">
</td>
            </tr>
            <tr>
                <td><strong>3.8</strong></td>
                <td><strong>Head light & working lights are not broken and are functioning correctly. </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[42][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[42]">
</td>
            </tr>
            <tr>
                <td><strong>3.9</strong></td>
                <td><strong> Back-Up (Reverse) Light and alarm are working. </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[43][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[43]">
</td>
            </tr>
            <tr>
                <td><strong>3.10</strong></td>
                <td><strong>Horn is working. </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[44][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[44]">
</td>
            </tr>
			<tr>
                <td><strong> 3.11</strong></td>
                <td><strong>Battery water/electrolyte level is correct.  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[45][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[45]">
</td>
            </tr>
			<tr>
                <td><strong>3.12 </strong></td>
                <td><strong> Radiator coolant level is correct and no sign of water leakage. </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[46][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[46]">
</td>
            </tr>
			<tr>
                <td><strong>3.13 </strong></td>
                <td><strong> Housekeeping is satisfactory  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[47][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[47]">
</td>
            </tr>
			
			</tbody>
			
			 <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">4</th>
                <th style="text-align: center;">   ATTACHMENTS/IMPLEMENTS</th>
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			
			<tbody>
            
			<tr>
                <td><strong>4.1</strong></td>
                <td><strong>Bucket condition is good </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[48][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[48]">
</td>
            </tr>
            <tr>
                <td><strong>4.2</strong></td>
                <td><strong> Grappler condition is good</strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[49][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[49]">
</td>
            </tr>
            <tr>
                <td><strong>4.3</strong></td>
                <td><strong> Rock Breaker condition is good </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[50][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[50]">
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
                <td><img src="../../sign.jpg" width="140px"></td>
                <th>SIGNATURE & DATE:</th>
                <td><img src="../../sign.jpg" width="140px"></td>
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
