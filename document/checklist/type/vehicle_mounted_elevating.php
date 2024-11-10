<?php 

include_once('./get-checklist.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle-Mounted Elevating & Aerial Rotating Devices</title>
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
            <strong>INSPECTION CHECKLIST FOR VEHICLE-MOUNTED ELEVATING & ROTATING AERIAL DEVICES</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.9</td>
        <td>Revision 00</td>
        <td><b>Issue Date: </b>24/SEP/2020</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR VEHICLE-MOUNTED ELEVATING & ROTATING AERIAL DEVICES</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.9</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 00</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 24/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>VEHICLE-MOUNTED ELEVATING & ROTATING AERIAL DEVICES </h4>
        <h4> ANSI/SAIA A92.2-2015</h4>
		
        
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
                <th>EQUIP. SERIAL NO.:</th>
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
                    <th style="text-align: center;">MARKINGS, CONSTRUCTION, & INSPECTION</th>
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
                <td><strong> Documentation is available such as but not limited to; manufacturer test certificate, operator’s manual, etc. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2
 Sec. 4.11.1(3),sec. 8.11, 
Sec7.4, sec 6.4, sec 6.5.3
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
                <td><strong>  Equipment has an identification number / asset number marked on it.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2 
Sec. 4.11.1 (1)
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
                <td><strong>  Previous inspection reports are available and checked.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2 
Sec. 9.35
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
                <td><strong>Equipment has the information data plate bearing the Manufacturer Name, Type/Model Number, Serial Number, & Year of manufacture.</strong></td>
				<td style="text-align: center;"><strong>  ANSI/SAIA A92.2 
sec. 6.2.2.1(1), sec 6.5

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
                <td><strong>IDENTIFICATION MARKINGS (Placard) are posted: 1. Make, 2. model, 3.Insulating or non-insulating, 4.qualification of voltage date of test, 5. Serial number, 6. year of manufacture, 7. rated load capacity, 8. Rated platform height, 9. Aerial device system pressure or aerial device control system voltage or both, 10. Number of platforms, 11. Category of insulating aerial device (if applicable), 12. Ambient temperature range for which the aerial device is designed, 13. Name & location of manufacturer, 14. Installer, 15. Unit equipped with material handling attachment or not.  </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2
sec. 6.5.2.(1-15)
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
                <td><strong> Operator is qualified, trained, & and authorized to operate the machine.   </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 10.2  </strong></td>
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
                <td><strong>  Rated platform height from the ground to the bottom of the platform is 1 meter or 40 inches.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2
sec. 6.2.2.3
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
                <td><strong> Platform’s SWL (Rated Load) is prominently marked on each side of the boom. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2 
sec. 6.2.2.2
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
                <td><strong> Platform’s reach is measured horizontally from the center line of the pedestal (rotation) to the outer edge (rail) of the platform. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2 
sec. 6.2.2.4
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
                <td><strong>  Maximum number of persons allowed on the platform is marked.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.4.2  </strong></td>
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
                <td><strong> Mobile unit (MEWP) is stable on a slope not greater than 5°</strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 4.5.2  </strong></td>
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
                <td><strong>Slope indicator is provided and visible to the operator during set-up.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.5.4 </strong></td>
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
                <td><strong> Manually operated stabilizer is designed to prevent unintentional movement.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.5.7 </strong></td>
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
                <td><strong>Parking brake interlock is provided for mobile unit.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.5.8 </strong></td>
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
                <td><strong> Control levers are labeled of each directional function. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2 sec 4.3.1-7, sec 6.5.3  </strong></td>
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
                <td><strong> Control levers return to neutral position when released. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2 sec 4.3.1  </strong></td>
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
                <td><strong> Lower control is provided with a means to override the upper control system when operated at ground. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2 sec 4.3.3 </strong></td>
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
                <td><strong>Power rating is provided and marked (DC and/or AC)  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2 , sec 6.2.2.6,
sec. 6.5.2(3)(4)(9)(11)
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
                <td><strong> Electrical Hazard decals are marked. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 6.5.4 (1)  </strong></td>
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
                <td><strong> Decals stating clearances to power lines are posted. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.5.4 (2) </strong></td>
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
                <td><strong>Information decal related to the use and load rating of the equipment is posted.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.5.4 (4) </strong></td>
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
                <td><strong> Information decal related to the use of aerial device for mobile operation is posted. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.5.4 (7) </strong></td>
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
                <td><strong> Notice decal that the aerial device shall not be operated with missing covers or guards except as required for the maintenance or testing of it is posted. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.5.4 (8) </strong></td>
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
                <td><strong> Emergency stop is properly identified and is working effectively. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec. 4.3.5, sec 8.2.3((8)(c) </strong></td>
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
                <td><strong> Aerial ladder is provided with a securing device when in travelling position. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.4.1 </strong></td>
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
                <td><strong> Boom is provided with a securing device to remain in cradled position when in transport. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.4.2 </strong></td>
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
                <td><strong> Platform can withstand vibration and shock loading during travel. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.4.3 </strong></td>
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
                <td><strong>Guardrail system (with the exemption of Bucket & Basket) shall have top rail with 42” (1067 mm) high, plus or minus 3” (76mm) above the platform surface.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.1(1) </strong></td>
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
                <td><strong> Guardrail system (with the exemption of Bucket & Basket) shall at least include one rail approximately midway between the top rail and the platform surface. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.1(2) </strong></td>
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
                <td><strong> Platform with folding type floors and steps or rungs maybe used without rails & kickplates. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.3 </strong></td>
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
                <td><strong>Anchorages for lanyard are provided.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.4.1 </strong></td>
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
                <td><strong> Notice decal that fiberglass or plastic covers are not insulating is posted. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 6.5.4 (9)  </strong></td>
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
                <td><strong> Inspection Sticker is posted prominently on the structure. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2,sec 8.3.1 </strong></td>
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
                <td><strong> Steps/ladders: Distance between the ground or lower platform surface to the top surface of the first step should not exceed 27 inches where possible.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 7.6.1 </strong></td>
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
                <td><strong> Distance between the top surface of steps or rungs should not exceed 16 inches where possible. </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 7.6.1  </strong></td>
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
                <td><strong> Each step or rung should have a minimum width of 6 inches for placement of one foot or 12 inches for placement of two feet and minimum rung diameter of one inch. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 7.6.1 </strong></td>
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
                <td><strong> Access opening passage should have a minimum width of 18 inches and minimum opening height of 30 inches. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 7.6.2 </strong></td>
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
			
            
			</tbody>
			
			<thead class="thead-dark">
            
			
			
			<tr>
                    <th style="text-align: center;">S.N</th>
                    <th style="text-align: center;">ACCEPTANCE CRITERIA</th>
<th style="text-align: center;" >REFERENCE</th>					
                    <th style="text-align: center;" colspan="3">RESULT</th>                    
                    <th style="text-align: center;">REMARKS</th>
                </tr>
				
				<tr>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">MECHANICAL TESTS & VISUAL INSPECTION</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
			</thead>
			<tbody>
			
			<tr>
                <td><strong>2.0</strong></td>
                <td><strong>Boom Elevating and lowering mechanisms are operable and no evidence of dropping. </strong></td>
				<td style="text-align: center;"><strong>  ANSI/SAIA A92.2, sec 6.6.1(1) </strong></td>
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
                <td><strong>2.1</strong></td>
                <td><strong>Boom extension/retraction mechanism is operable. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.1(2)  </strong></td>
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
                <td><strong>2.2</strong></td>
                <td><strong>  Rotating mechanism is functioning correctly and smoothly. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.1(3) </strong></td>
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
                <td><strong>2.3</strong></td>
                <td><strong> Aerial device is stable.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.1(4) </strong></td>
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
                <td><strong>2.4</strong></td>
                <td><strong> All safety devices have been checked and are properly functioning.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.1(5) </strong></td>
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
                <td><strong>2.5</strong></td>
                <td><strong>  No damage or deformation is evident on either the lower or upper structure. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.2 </strong></td>
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
                <td><strong>2.6</strong></td>
                <td><strong>  No visible hydraulic oil leak from any component , such as but not limited to; hydraulic motors, hydraulic pumps, hydraulic rams, hydraulic valves, hydraulic tank, etc. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.2 </strong></td>
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
                <td><strong>2.7</strong></td>
                <td><strong> No loose connections were found from both the upper and lower structure.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 6.6.2 </strong></td>
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
                <td><strong>2.8</strong></td>
                <td><strong>The vehicle’s electrical system were properly functioning, i.e. but not limited to headlights, turn signal lights, beacon lights/warning lights, brake lights, reverse lights and back-up alarms, etc.   </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, 
                    sec. 8.2.4(11)
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
                <td><strong>2.9</strong></td>
                <td><strong> Both service & parking brakes are operable.  </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 10.5  </strong></td>
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
                <td><strong>2.10</strong></td>
                <td><strong> All locking pins shall be secured against unintentional disengagement and loss.   </strong></td>
				<td style="text-align: center;"><strong>ANSI/SAIA A92.2, sec 7.5.1  </strong></td>
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
                <td><strong>2.11</strong></td>
                <td><strong>  Interlocks are properly operating. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 7.5.1 </strong></td>
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
                <td><strong>2.12</strong></td>
                <td><strong>  Visual and audible safety devices are properly operating. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 8.2.3(3) </strong></td>
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
                <td><strong>2.13</strong></td>
                <td><strong> Fiberglass and insulating components have no visible damage and contamination  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 8.2.3(4) </strong></td>
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
                <td><strong>2.14</strong></td>
                <td><strong> Hydraulic and pneumatic systems have no observable deterioration and excessive leakages.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 8.2.3(6) </strong></td>
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
                <td><strong>2.15</strong></td>
                <td><strong> Electrical systems related to the aerial device have no signs of excessive deterioration & malfunctions, dirt and moisture accumulation.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 8.2.3(7) </strong></td>
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
                <td><strong>2.16</strong></td>
                <td><strong> Stabilizers/outriggers are check for proper operation and no dropping is evident.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.5.5
                Sec. 4.5.7
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
                <td><strong>2.17</strong></td>
                <td><strong> Safety harness anchorage is fitted in the platform.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SAIA A92.2, sec 4.9.4.4 </strong></td>
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
                <td><strong>2.18</strong></td>
                <td><strong> Spirit level is fitted and is operational.  </strong></td>
				<td style="text-align: center;"><strong> SAIA/SIA 92.5 </strong></td>
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
                <td><strong>2.19</strong></td>
                <td><strong>  All moving parts are lubricated. </strong></td>
				<td style="text-align: center;"><strong> ANSI/SIA 92.2, sec. 6.6.1 </strong></td>
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
                <td><strong>2.20</strong></td>
                <td><strong> Upper station does not include drive and steering controls.  </strong></td>
				<td style="text-align: center;"><strong> ANSI/SIA 92.2, sec. 6.6.1 </strong></td>
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
