<?php 

include_once('./get-checklist.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR ELEVATORS AND ESCALATORS </title>
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
            <strong>INSPECTION CHECKLIST FOR ELEVATORS AND ESCALATORS</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.2</td>
        <td>Revision 02</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR ELEVATORS AND ESCALATORS</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.2</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>ELEVATORS AND ESCALATORS</h4>
        <h4>ASME A17.1</h4>
		
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->
         <!-- <?php if (isset($row)): ?> -->
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
<!-- <?php endif; ?> -->

        
<form method="post" action="./update_checklist.php" id="checklistForm">
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
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;">GENERAL REQUIREMENTS</th>
                    <th style="text-align: center;"></th>					
                    <th style="text-align: center;" colspan="3"></th>                    
                    <th style="text-align: center;"></th>
                </tr>
				
				<tr>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">HYDRAULIC ELEVATOR</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;"></th>
                    <th> </th>
                </tr>
					<tr>
                    <th style="text-align: center;">1.1</th>
                    <th style="text-align: center;">INSIDE OF CAR</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>

 <tr>
                <td><strong>1.1.1</strong></td>
                <td><strong> Door reopening device is operating correctly </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.13(3.13),
8.11.2.1.1a, 8.11.3.1.1a)

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
                <td><strong>1.1.2</strong></td>
                <td><strong>  Emergency stop switches are not provided on passenger elevators but are provided on freight elevators, in the car and in or adjacent to each car operating panel </strong></td>
				<td style="text-align: center;"><strong> ASME A17.1 Sec. (3.26.4.2a,
3.26.4.2f, 8.11.3.1.1b)

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
                <td><strong>1.1.3</strong></td>
                <td><strong> All operating control devices are of the enclosed electric type   </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.26.1.1(3.26.1),
  3.26.3, 8.11.3.1.1c)
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
                <td><strong>1.1.4</strong></td>
                <td><strong> Sills are of the correct type and are of sufficient strength and clearance with adjoining car platform or hoist way sill  (min. clearance 13mm)  </strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.5.1(3.5), 2.11.10.3 (3.11), 2.11.11.1,
2.11.13.1, 2.15.16 (3.15), 8.11.3.1.1d)
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
                <td><strong>1.1.5</strong></td>
                <td><strong>Door reopening device is operating correctly</strong></td>
				<td style="text-align: center;"><strong>    ASME A17.1 Sec. (2.13(3.13),
8.11.2.1.1a,
8.11.3.1.1a)
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
                <td><strong>1.1.6</strong></td>
                <td><strong>Emergency stop switches are not provided on passenger elevators but are provided on freight elevators, in the car and in or adjacent to each car operating panel</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec. (3.26.4.2a,
3.26.4.2f,
8.11.3.1.1b)
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
                <td><strong>1.1.7</strong></td>
                <td><strong>All operating control devices are of the enclosed electric type</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec.(2.26.1.1(3.26.1),
3.26.3,
8.11.3.1.1c)
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
                <td><strong>1.1.8</strong></td>
                <td><strong>Sills are of the correct type and are of sufficient strength and clearance with adjoining car platform or hoist way sill  (min. clearance 13mm)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.5.1(3.5),
2.11.10.3 (3.11),
2.11.11.1,
2.11.13.1, 2.15.16
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
                <td><strong>1.1.9</strong></td>
                <td><strong>Car has minimum of two lamps (min. of 50 lux for passenger and 25 lux for freight elevators) (Passenger elevators shall have auxiliary lighting which automatically turns on if normal power fails)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (3.14, 8.11.3.1.1e)
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
                <td><strong>1.1.10</strong></td>
                <td><strong>Car emergency communication signal to authorized and emergency personnel is available and working</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.27.1 (3.27),
8.11.3.1.1f)

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
                <td><strong>1.1.11</strong></td>
                <td><strong>Each car door or gate has electric contacts or interlocks (where required) to prevent operation of the driving machine when the door or gate is  open</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.12.7.3 (3.12),
2.13.2.1 (3.13),
2.14.4, 2.14.6
(3.14), 2.26.2
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
                <td><strong>1.1.12</strong></td>
                <td><strong> Force required to prevent door closing  does not exceed 30 ft.lb</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1 
  Sec. (2.13.4.2.3,
8.11.3.1.1h)
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
                <td><strong>1.1.13</strong></td>
                <td><strong>An Identification Plate is provided with the following items are clearly marked: Manufacturer name & address, weight of the empty platform, date of manufacture, number of personnel allowed on the platform, certificate number of compliance to the design, construction and testing.  </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1    
Sec. (2.13.3 (3.13),
8.11.3.1.1i)
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
                <td><strong>1.1.14</strong></td>
                <td><strong>Power opening of doors or gates only occurs when the car is at rest at the landing, or in the landing zone</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.12.5 (3.12),
2.26.1.6, 2.26.9
(2.26.9.3), 3.26.3,
8.11.3.1.1j)
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
                <td><strong>1.1.15</strong></td>
                <td><strong>Car vision panels and glass car doors meet specifications (not more than 0.1 sq. m. and no panel more than 150mm wide, glass to be laminated or safety glass or safety plastic)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
 Sec. (2.14.2.5, 2.14.5.8
(3.14), 8.11.3.1.1k)
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
                <td><strong>1.1.16</strong></td>
                <td><strong>Car enclosure is in compliance with the required equipment (specification)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14 (3.14),
2.29.1 (3.27),
8.3.7, 8.7.2.14,
8.7.3.13,8.11.3.1.1l)
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
                <td><strong>1.1.17</strong></td>
                <td><strong>Ventilation (natural or forced) complies with the various opening and size requirements as well as air change volume per minute (for forced ventilation)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.14.2.3, 2.14.3.3
(3.14), 8.11.3.1.1n)
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
                <td><strong>1.1.18</strong></td>
                <td><strong>Signs and operating device symbols are installed and legible</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 (2.26.12, 8.11.3.1.1b)
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
                <td><strong>1.1.19</strong></td>
                <td><strong>Signs and operating device symbols are installed and legible</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.12, 8.11.3.1.1b)
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
                <td><strong>1.1.20</strong></td>
                <td><strong>Rated load, platform area and data plate are available and legible</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.16 (3.16),
8.11.3.1.1p)
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
                <td><strong>1.1.21</strong></td>
                <td><strong>Standby power operation (at least one elevator at a time) with rated load in the event of power supply failure (transfer from normal to standby supply is automatic)
</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.27.2 (3.27),
8.11.2.2.7
(8.11.3.2.3f),
8.11.3.1.1q)

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
                <td><strong>1.1.22</strong></td>
                <td><strong>Restricted opening of car or hoist way doors (4" max) is possible outside the unlocking zone</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.12.5 (3.12),
8.11.3.1.1r)
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
                <td><strong>1.1.23</strong></td>
                <td><strong>Car ride is smooth in acceleration and deceleration throughout its travel</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.15, 3.23.1,
8.6.1.6.2 (8.6.5),
8.11.3.1.1s)
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
                    <th style="text-align: center;">1.2</th>
                    <th style="text-align: center;">MACHINE ROOM</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>

 <tr>
                <td><strong>1.2.1</strong></td>
                <td><strong> Access to the machine space is in conformance with the type of access, location , and combustibility allowed</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (3.1,3.7, 8.11.3.1.2a)
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
                <td><strong>1.2.2</strong></td>
                <td><strong>  Emergency stop switches are not provided on passenger elevators but are provided on freight elevators, in the car and in or adjacent to each car operating panel Minimum headroom clearance is either 84" , 53", 42", or 35" depending on type and location of machine room / hoist way</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.4.7 (3.7),
8.11.3.1.2b)
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
                <td><strong>1.2.3</strong></td>
                <td><strong>Electric lighting in the machine room is not less than 200 lux at floor level and the control switch is at the lock - jamb side of the access door wherever practicable.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.7.5.1 (3.7),
8.11.3.1.2c)
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
                <td><strong>1.2.4</strong></td>
                <td><strong> Strength and construction of the floor of the machine room, windows, skylights and fire resistance is in accordance with the relevant building code.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.7.1.1 (3.7),
2.9.2, 2.9.4 (3.9),
8.11.3.1.2d)
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
                <td><strong>1.2.5</strong></td>
                <td><strong>Housekeeping is adequate.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (8.6.1.2, 8.6.4.8
(8.6.5), 8.6.10.3, 8.11.3.1.2e)
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
                <td><strong>1.2.6</strong></td>
                <td><strong>Ventilation (natural or forced) complies with the various opening and size requirements as well as air change volume per minute (for forced ventilation).</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
  Sec. (2.7.5.2 (3.7),
2.8.4, 8.11.3.1.2f)
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
                <td><strong>1.2.7</strong></td>
                <td><strong>Fire extinguisher is available in the machine room (Class ABC).</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (8.11.3.1.2g,
(8.6.5))
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
                <td><strong>1.2.8</strong></td>
                <td><strong>Pipes, wiring and ducts conform to the relevant specification (Pipes - 15psi steam or hot water only; wiring to NFPA70 or CSA-C22.1 standard).</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.8.1, 2.8.2 (3.8), 8.11.3.1.2h)
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
                <td><strong>1.2.9</strong></td>
                <td><strong>Guarding of exposed auxiliary equipment is in place and secure.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.10.1 (3.10),
8.11.3.1.2i)
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
                <td><strong>1.2.10</strong></td>
                <td><strong>Verify numbering of elevators (min. 50mm height figures) on driving machine , disconnect switch, mg set, controller, selector, governor and the car crosshead or frame </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
 Sec. (2.10.4.2, 2.29.1
(3.27), 3.26)
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
                <td><strong>1.2.11</strong></td>
                <td><strong>Electrical disconnecting means (devices) and controls operate correctly</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.26, 3.26.3.1 (3.26.3.1.4b), 8.11.3.1.2k)
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
                <td><strong>1.2.12</strong></td>
                <td><strong>Controller wiring, fuses, grounding, etc. conform to NFPA 70 or CSA C22.1</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.8.1 (3.8), 3.26,
3,26.5, 8.6.1.6.3,
8.6.5, 8.11.3.1.2l)
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
                <td><strong>1.2.13</strong></td>
                <td><strong>Governor, over speed switch and seal conform to requirements:  namely, an over speed switch on every car and counterweight governor, sealing of the means to regulate the governor rope pull-out force (carrier) once set, to not more than 60% of the pull through </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.17, 2.18,
3.17.1, 8.6.1.2,
8.7.2.19,
8.11.2.2.2,
8.11.3.2.3,
  </strong></td>
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
                <td><strong>1.2.14</strong></td>
                <td><strong>Code date plate states correct information and is legible</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (8.7.1.8, 8.9)
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
                <td><strong>1.2.15</strong></td>
                <td><strong>Hydraulic power unit is operational, undamaged and does not leak</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.24, 8.6.5,
8.11.3.1.2m)
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
			
      <tr>
                <td><strong>1.2.16</strong></td>
                <td><strong>Hydraulic relief valve(s) are fitted between the pump and check valve and are of sufficient capacity to pass the rated capacity of the pump without raising working pressure more than 50% above normal  (valve should be sealed )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.19.1, 3.19.2,
3.19.4.2, 3.28,
8.10.3.2.2m,
8.11.3.2.1)
</strong></td>
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
                <td><strong>1.2.17</strong></td>
                <td><strong>Hydraulic control valve(s) are marked with their rated pressure and electrical data</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.19, 8.11.3.1.2o)
 </strong></td>
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
                <td><strong>1.2.18</strong></td>
                <td><strong>Oil tanks are of sufficient capacity to provide reserve liquid, prevent ingress of air and be clearly marked with minimum level.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (3.24, 8.6.5.1,
8.6.5.2, 8.6.5.5,
8.6.5.6, 8.7.3.29,
8.11.3.1.2p, 8.11.3.3.2)
 </strong></td>
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
                <td><strong>1.2.19</strong></td>
                <td><strong>Flexible hydraulic hoses and fitting assemblies are undamaged and leak- free.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.
(3.19.3.3,8.11.3.1.2q,8.11.3.2.4)
</strong></td>
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
                <td><strong>1.2.20</strong></td>
                <td><strong>Supply line and shutoff line are leak-free, and the shut-off valve is located between pump and jack and outside the hoist way</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
  Sec. (3.19, 8.11.3.1.2r)
</strong></td>
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
                <td><strong>1.2.21</strong></td>
                <td><strong>Hydraulic cylinders are free from damage and are leak-free </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.18.3, 8.11.3.1.2s,
8.11.3.2.2)
  </strong></td>
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
                <td><strong>1.2.22</strong></td>
                <td><strong>Pressure switch is fitted if the top of the cylinder is above the top of the storage tank in line between cylinder and valve, the latter activating on loss of positive pressure at the top of the cylinder</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(3.26.8,8.11.3.1.2t,
8.11.3.2.5)
</strong></td>
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
                <td><strong>1.2.23</strong></td>
                <td><strong>Pressure switch prevents automatic door opening and the operation of the lowering valve(s) (Car doors can be opened when in the unlocking zone using the in-car button)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.26.8,8.11.3.1.2t,
8.11.3.2.5)
</strong></td>
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
                    <th style="text-align: center;">1.3</th>
                    <th style="text-align: center;">TOP OF CAR</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>

 <tr>
                <td><strong>1.3.1</strong></td>
                <td><strong> Car top stop switch is provided and operational</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.26.4, 8.11.3.1.3a)
 </strong></td>
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
			
			<tr>
                <td><strong>1.3.2</strong></td>
                <td><strong>  Emergency stop switches areCar top light and outlet is provided and operational</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.7 (3.14),
8.11.3.1.3b)
 </strong></td>
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
                <td><strong>1.3.3</strong></td>
                <td><strong>Car top operating device is provided (for inspection purposes)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.26.2, 8.11.3.1.3c)
  </strong></td>
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
                <td><strong>1.3.4</strong></td>
                <td><strong> Car top clearance and refuge space dimensions: varies for the former: minimum 43" for the latter</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.4, 3.18.4,
8.10.3.2.2s,
8.10.3.2.3d,
8.11.3.1.3d)
  </strong></td>
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
			<tr>
                <td><strong>1.3.5</strong></td>
                <td><strong>Terminal stopping devices are provided and arranged to slow down and stop the car automatically at or near the top and bottom terminal landings (with up to rated load) and at a speed attained in normal
operation </strong></td>
<td style="text-align: center;"><strong> ASME A17.1
Sec. (3.25.1.1,8.10.2.3.2k,
8.11.2.2.5 (8.11.3.2.3),
8.11.3.1.3e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[51][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[51]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.6</strong></td>
                <td><strong>Final terminal stopping devices are electro-mechanically operated and cause power to the driving machine motor to be removed automatically after the car has passed a terminal landing
</strong></td>
<td style="text-align: center;"><strong>ASME A17.1
  Sec. (2.7.5.2 (3.7),
2.8.4, 8.11.3.1.2f)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[52][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[52]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.7</strong></td>
                <td><strong>Anti-creep device controls the car within 25mm of the landing irrespective of hoist way door position</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1  Sec.(3.26.3, 3.26.4,
8.11.3.1.3g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[53][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[53]">
</td>
            </tr>
			
      <tr>
                <td><strong>1.3.8</strong></td>
                <td><strong>Top emergency exit is at least 16" square</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.14.1.5 (3.14), 8.11.3.1.3i)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[54][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[54]">
</td>
            </tr>  
 <tr>
                <td><strong>1.3.9</strong></td>
                <td><strong>Verify floor level and emergency identification numbering of elevators (min. 50mm height)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.29.1 (3.27),
2.29.2 (3.1),
8.11.3.1.3j)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[55][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[55]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.3.10</strong></td>
                <td><strong>Hoist way construction complies with appropriate standards and building regulations (where applicable)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.1, 8.11.3.1.3k)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[56][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[56]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.11</strong></td>
                <td><strong>Hoist way smoke control arrangements are satisfactory enough to prevent the accumulation of  smoke and hot gases</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.4 (3.1),
8.11.3.1.3l)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[57][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[57]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.12</strong></td>
                <td><strong>Pipes, wiring and ducts conform to the relevant specification (Pipes - 15psi steam or hot water only; wiring to NFPA70 or CSA-C22.1 standard)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.8(3.8),
8.11.3.1.3m)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[58][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[58]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.13</strong></td>
                <td><strong>Windows, projections, recesses and setbacks comply with the appropriate building codes and hoist way enclosures generally have flush surfaces on the hoist way side</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.5, 2.1.6 (3.1),
2.11.10 (3.11),
8.11.3.1.3n)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[59][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[59]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.14</strong></td>
                <td><strong>Various hoist way clearances are at least the same all the way around (20mm )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.5(3.5), 2.11 
(3.11), 8.11.3.1.3o)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[60][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[60]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.15</strong></td>
                <td><strong>Multiple hoist ways (and the number of elevators in a hoist way) conforms with the appropriate building code</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.1.1.4 (3.1), 8.11.3.1.3p)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[61][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[61]">
</td>
            </tr>
			
      <tr>
                <td><strong>1.3.16</strong></td>
                <td><strong>Traveling cables and junction boxes conforms to NFPA70 or CSA - C22.1, whichever is applicable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec. (2.8.1 (3.8),
8.11.3.1.3q)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[62][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[62]">
</td>
            </tr>
 <tr>
                <td><strong>1.3.17</strong></td>
                <td><strong>Door and gate equipment operation are satisfactory and in accordance with manufacturers recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.11 (3.11), 2.12
(3.12), 2.26.1.6
(3.26.3), 8.11.3.1.3r)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[63][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[63]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.3.18</strong></td>
                <td><strong>Car frame and stiles are suitable for the purpose and show no defects</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.15, 8.8 (3.18.5), 8.11.3.1.3s)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[64][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[64]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.19</strong></td>
                <td><strong>Guide rails fastening and equipment are suitable for the purpose, show no defects, and the guide rails are correctly lubricated (where required) (manufacturer specification )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.23 (3.23.2),
3.15, 3.23, 3.38,
8.11.3.1.3t)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[65][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[65]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.20</strong></td>
                <td><strong>Governor rope condition and that it is fitted with a tag</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.18.5, 3.17.1,
8.6.4.2, 8.7.2.19,
8.11.2.1.3,
8.11.3.1.3w)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[66][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[66]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.21</strong></td>
                <td><strong>Condition of governor releasing carrier and that it is set to require a tension in the governor rope to pull the rope from the carrier of not more than 60% of the pull-through tension developed by the governor. The means to regulate this force shall be mechanical and shall be sealed. </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.17.15, 3.17.1,
8.11.3.1.3y,
8.11.3.4)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[67][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[67]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.22</strong></td>
                <td><strong>Wire rope fastening and hitch plate are secured using bolts or rivets.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.9.3.3, 2.15.13,
2.20, 3.18.1.2,
8.6.3, 8.11.3.1.3x)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[68][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[68]">
</td>
            </tr>
			<tr>
                <td><strong>1.3.23</strong></td>
                <td><strong>Specification and suitability of the suspension rope and its fastenings is acceptable (in the case of a new rope the sheave material shall be assessed as suitable or not )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.20, 8.2.7, 8.6.2.5, 8.7.2.21, 8.7.3.25,
8.11.2.1.3cc,
8.11.3.1.3y)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[69][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[69]">
</td>
            </tr>	
	<tr>
                <td><strong>1.3.24</strong></td>
                <td><strong>PrSpeed test in both directions is in accordance with manufacturers specifications</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.17.16, 3.4,
8.10.3.2.3cc,
8.11.3.1.3h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[70][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[70]">
</td>
            </tr>
	<tr>
                <td><strong>1.3.25</strong></td>
                <td><strong>Slack rope device (roped-hydraulic elevators installed under A17.1b- 1989 and later editions) does cause the electric power to be removed from the hydraulic machine pump motor and control valves should a rope become slack</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (3.18.1.2, 3.26.4, 8.11.3.1.3z)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[71][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[71]">
</td>
            </tr>
	<tr>
                <td><strong>1.3.26</strong></td>
                <td><strong>Travelling sheave (roped-hydraulic elevators installed under A17.1b-1989 and later editions) is attached using suitable fastenings (the loading being the resultant of the maximum tensions in the ropes leading from the sheave with the elevator at rest and with rated load in the car)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.20, 2.24.2,
2.24.3, 2.24,5.
3.18.1.2, 3.23.2,
8.7.3.25,8.11.3.1.3aa)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[72][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[72]">
</td>
            </tr>
	<tr>
                <td><strong>1.3.27</strong></td>
                <td><strong>Counterweight, counterweight buffers and safeties are in compliance with design requirements</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec.
(3.4.6, 3.17.2,
3.22.2, 8.2.3)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[73][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[73]">
</td>
            </tr>	
<tr>
                    <th style="text-align: center;">1.4</th>
                    <th style="text-align: center;">OUTSIDE HOIST WAY</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>

 <tr>
                <td><strong>1.4.1</strong></td>
                <td><strong> Car platform guard plates comply with material specification (steel ) and thickness (not less than 1.5 mm)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.15, 8.11.3.1.4a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[74][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[74]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.4.2</strong></td>
                <td><strong> Hoist way doors operate correctly</strong></td>
				<td style="text-align: center;"><strong>       ASME A17.1
Sec. (2.11 (3.11),
2.12.2.2, 2.12.3.2
(3.12), 3.26.4,
8.10.3.2.3r,
8.11.3.1.4b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[75][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[75]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.3</strong></td>
                <td><strong>Car vision panel (if fitted) is 0.1sq.m. (Max) and either wire-glass or laminated, and in the case of glass doors be laminated, safety glass or safety plastic, with not less than 60% of the total visible door panel surface area as glass.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.11.7 (3.11),
8.11.3.1.4c)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[76][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[76]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.4</strong></td>
                <td><strong> Hoist way door locking devices are operational (interlocks)</strong></td>
				<td style="text-align: center;"><strong>  ASME A17.1
Sec.(2.12 (3.12),
8.11.3.1.4d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[77][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[77]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.5</strong></td>
                <td><strong>Access to hoist way (at top or bottom landing) is by use of an access switch adjacent to the entrance </strong></td>
<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.12.6, 2.12.7
(3.12), 8.11.3.1.4e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[78][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[78]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.6</strong></td>
                <td><strong>Hoist way doors are power closing</strong></td>
<td style="text-align: center;"><strong>ASME A17.1
  Sec. (2.13.3, 2.13.6
 (3.13), 8.11.3.1.4f)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[79][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[79]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.7</strong></td>
                <td><strong>Sequence of operation of hoist way doors is correct</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4 (3.13),
2.13.6, 8.11.3.1.4g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[80][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[80]">
</td>
            </tr>
			
      <tr>
                <td><strong>1.4.8</strong></td>
                <td><strong>Verify hoist way enclosure fire resistance (or non-fire resistance, depending on building code) (other general requirements such as floor strength and location depend on the code - check specification)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.1.1, 2.1.4, 2.1.5
(3.1), 8.11.3.1.4h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[81][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[81]">
</td>
            </tr>  
 <tr>
                <td><strong>1.4.9</strong></td>
                <td><strong>Elevator parking devices are operable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.11.3.1.4i)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[82][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[82]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.4.10</strong></td>
                <td><strong>Emergency doors in blind hoist way are on every third floor, not more than 11m from sill to sill with a clear opening of 700mm x 2030mm (at least) , and doors are self-closing and self-locking and marked "Danger Elevator Hoist way" in 50mm letters  (an open or unlocked door removes power from the elevator motor)
</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.11.1.1,2.11.1.2)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[83][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[83]">
</td>
            </tr>
			<tr>
                <td><strong>1.4.11</strong></td>
                <td><strong>Standby power selection switch is marked "Elevator Emergency Power" and key operated under a locked cover</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.8 (3.16),
2.27.2, 2.27.8
(3.27), 8.11.2.2.7,
8.11.3.1.4k,
8.11.3.2.3)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[84][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[84]">
</td>
            </tr>	
<tr>
                    <th style="text-align: center;">1.5</th>
                    <th style="text-align: center;">ELEVATOR PIT</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>

 <tr>
                <td><strong>1.5.1</strong></td>
                <td><strong> Pit access, lighting and stop switch meet design requirements</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.8 (3.8), 3.6, 3.26.4, 8.6.4.7,
8.11.3.1.5a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[85][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[85]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.5.2</strong></td>
                <td><strong> Verify bottom clearance as 600mm ;  run by clearance as 75mm (min.) 150mm (max., speed dependent) ;   and minimum refuge space as 600 x1200 x600 mm or 450 x 900 x 1070 mm.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(3.4, 3.18.3.3, 8.10.3.2.5c,
8.11.3.1.5b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[86][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[86]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.3</strong></td>
                <td><strong>Normal terminal stopping devices operate correctly to slow down and operate the car correctly at or near top and bottom terminal landings (up to rated load and speed)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.25.1,8.11.2.2.5
(8.11.3.2.3), 8.11.3.1.5e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[87][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[87]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.4</strong></td>
                <td><strong> Travel cables are undamaged and serviceable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.8.2 (3.8),
8.11.3.1.5f)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[88][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[88]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.5</strong></td>
                <td><strong>Governor-rope tension device is working satisfactorily </strong></td>
<td style="text-align: center;"><strong> AASME A17.1
Sec. (2.18.7, 3.17.1,
8.6.1.6.2, 8.11.3.1.5k)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[89][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[89]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.6</strong></td>
                <td><strong>Car frame and platform meet requirements as per manufacturers specification</strong></td>
<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.15, 2.18.2.3,
3.28, 8.11.3.1.5g)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[90][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[90]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.7</strong></td>
                <td><strong>Car safeties guarding members are in place and secure - including roped- hydraulic elevators installed under A17.1b-1989 and later editions (where applicable)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.17, 3.17.1,
8.2.6, 8.11.3.1.5j)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[91][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[91]">
</td>
            </tr>
			
      <tr>
                <td><strong>1.5.8</strong></td>
                <td><strong>Plunger and cylinder comply with design requirements  (Plunger shall not strike the safety bulkhead of the cylinder when the car is resting on its fully compressed buffer </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.18, 8.6.5.1,
8.6.5.2, 8.6.5.5,
8.6.5.6, 8.11.3.1.5c)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[92][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[92]">
</td>
            </tr>  
 <tr>
                <td><strong>1.5.9</strong></td>
                <td><strong>Plunger stops are provided to prevent the plunger from travelling beyond the limits of the cylinder in the up direction at maximum speed and full load pressure.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (3.18, 8.6.5.1,
8.6.5.2, 8.6.5.5,
8.6.5.6, 8.11.3.1.5c)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[93][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[93]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.10</strong></td>
                <td><strong> Car buffers are in place where required and undamaged</strong></td>
				<td style="text-align: center;"><strong>  ASME A17.1
Sec. (3.22.1, 3.26.4,
8.2.3.2, 8.6.4.4,
8.11.3.1.5d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[94][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[94]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.11</strong></td>
                <td><strong> Guiding members are in position, securely bracketed, and meet design requirements</strong></td>
				<td style="text-align: center;"><strong>  ASME A17.1
Sec. (3.23, 3.28,
8.6.4.3, 8.11.3.1.5h)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[95][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[95]">
</td>
            </tr>
			<tr>
                <td><strong>1.5.12</strong></td>
                <td><strong> Oil supply piping meets design requirements (as per manufacturer) and is leak-proof and secure</strong></td>
				<td style="text-align: center;"><strong>  ASME A17.1
Sec. (2.24, 8.10.3.2.2r, 8.11.3.1.5i)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[96][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[96]">
</td>
            </tr>
<tr>
                    <th style="text-align: center;">1.6</th>
                    <th style="text-align: center;">FIREFIGHTER’S SERVICE</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>

 <tr>
                <td><strong>1.6.1</strong></td>
                <td><strong> Verify / check operation of elevators under fire and other emergency conditions (A17.1b- 1973 through A17.1b- 1980)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[97][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[97]">
</td>
            </tr>
			
			<tr>
                <td><strong>1.6.2</strong></td>
                <td><strong> Verify / check operation of elevators under fire and other emergency conditions (A17.1- 1981 through A17.1b- 1983)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[98][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[98]">
</td>
            </tr>
			<tr>
                <td><strong>1.6.3</strong></td>
                <td><strong>Verify / check operation of elevators under fire and other emergency conditions (A17.1- 1984 through A17.1a- 1988 and A17.3)</strong></td>
				<td style="text-align: center;"><strong>    ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[99][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[99]">
</td>
            </tr>
			<tr>
                <td><strong>1.6.4</strong></td>
                <td><strong> Verify / check operation of elevators under fire and other emergency conditions (A17.1b- 1989 and later edition)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[100][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[100]">
</td>
            </tr>
	<tr>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">ELECTRIC ELEVATOR</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;"></th>
                    <th> </th>
                </tr>
					<tr>
                    <th style="text-align: center;">2.1</th>
                    <th style="text-align: center;">INSIDE OF CAR</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.1.1</strong></td>
                <td><strong> Door reopening device is operating correctly </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.11.2.1.1a)

 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[101][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[101]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.1.2</strong></td>
                <td><strong>  Emergency stop switches are not provided on passenger elevators but are provided on freight elevators, in the car and in or adjacent to each car operating panel </strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.26.2.5,
2.26.2.21, 8.11.2.1.1b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[102][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[102]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.3</strong></td>
                <td><strong> All operating control devices are of the enclosed electric type   </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.1.1,
2.26.1.6, 8.11.2.1.1c)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[103][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[103]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.4</strong></td>
                <td><strong> Sills are of the correct type and are of sufficient strength and clearance with adjoining car platform or hoist way sill  (min. clearance 13mm)  </strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec.(2.5.1.4 ,2.11.10.3,
2.11.11.1, 2.11.13.1,
2.15.16, 8.11.2.1.1d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[104][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[104]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.5</strong></td>
                <td><strong>Car has minimum of two lamps (min. of 50 lux for passenger and 25 lux for freight elevators)    (Passenger elevators shall have auxiliary lighting which automatically turns on if normal power fails )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.14.7, 8.11.2.1.1e)
ASME A17.3
Sec. (3.4.5, 3.4.6)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[105][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[105]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.6</strong></td>
                <td><strong>Passenger elevators are equipped with auxiliary lighting which automatically turns on if normal power fails</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.14.7,
8.11.2.1.1e)
ASME A17.3
Sec. (3.4.5, 3.4.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[106][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[106]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.7</strong></td>
                <td><strong>Car emergency communication signal to authorized and emergency personnel is available and working</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.27.1,
8.11.2.1.1f)
ASME A17.3
Sec. (3.11.1)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[107][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[107]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.1.8</strong></td>
                <td><strong>Car door or gate has electric contacts or interlocks (where required) to prevent operation of the driving machine when the door or gate is open</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.2.1, 2.14.4,
2.14.5, 2.14.6,
2.26.2.15, 8.11.2.1.1g
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[108][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[108]">
</td>
            </tr>  
 <tr>
                <td><strong>2.1.9</strong></td>
                <td><strong>The force necessary to prevent door closing  does not exceed 30ft.lb</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.4.2.3,
8.11.2.1.1h,
8.11.2.2.8)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[109][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[109]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.1.10</strong></td>
                <td><strong>Power closing of doors or gates (vertically sliding) is preceded by a warning bell at least 5 seconds prior to door or gate movement and continues until substantial closure (Closure using a switch or button in the car omits the 5 second time interval)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3,
8.11.2.1.1i)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[110][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[110]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.11</strong></td>
                <td><strong>Power opening of doors or gates only occurs when the car is at rest at the landing , or in the landing zone</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1.
Sec. (2.26.1.6, 2.26.9,
2.26.9.3, 8.11.2.1.1j,
8.11.2.3.7, 8.11.2.3.8,
8.11.2.3.9)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[111][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[111]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.12</strong></td>
                <td><strong> Car vision panel (if fitted) is 0.1sq.m. (Max) and either wire-glass or laminated, and in the case of glass doors be laminated, safety glass or safety plastic, with not less than 60% of the total visible door panel surface area as glass.</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
(2.14.2.5, 2.14.5.8,
8.11.2.1.1k)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[112][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[112]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.13</strong></td>
                <td><strong>Laminated glass vision panel is a safety glass or safety plastic, with not less than 60% of the total visible door panel surface area as glass</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.2.5,
2.14.5.8, 8.11.2.1.1k)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[113][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[113]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.14</strong></td>
                <td><strong>Car enclosure is in compliance with the required equipment (specification)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14, 2.16.2.2,
2.16.4, 2.16.5, 2.29.1, 8.3.7, 8.7.2.14,
8.11.2.1.1m)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[114][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[114]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.15</strong></td>
                <td><strong>Verify the emergency exit (and cover ) is provided in the top of the car (except cars in partially enclosed hoist ways)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.1.5,
2.14.1.10, 8.11.2.1.1m)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[115][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[115]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.1.16</strong></td>
                <td><strong>Ventilation (natural or forced ) complies with the various opening and size requirements as well as air change volume per minute (for forced ventilation)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.2.3, 2.14.3.3,
8.11.2.1.1n)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[116][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[116]">
</td>
            </tr>
 <tr>
                <td><strong>2.1.17</strong></td>
                <td><strong>Signs and operating device symbols are installed and legible</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.12,
8.11.2.1.1o)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[117][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[117]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.1.18</strong></td>
                <td><strong>Rated load (depending on net platform) is in compliance with  load area (chart) and data plate information</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16, 8.11.2.1.1p)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[118][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[118]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.19</strong></td>
                <td><strong>Standby power is operable (at least one elevator at a time ) with rated load in the event of power supply failure  (transfer from normal to standby supply is automatic)</strong></td>
				<td style="text-align: center;"><strong>AASME A17.1
Sec. (2.16.18, 2.26.10,
2.27.2, 8.11.2.1.1q,
8.11.2.2.7, 8.11.2.3.5)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[119][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[119]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.20</strong></td>
                <td><strong>Restricted opening of car or hoist way doors (4" max) is possible outside the unlocking zone</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.11.2.1.1r)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[120][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[120]">
</td>
            </tr>
			<tr>
                <td><strong>2.1.21</strong></td>
                <td><strong>Car ride is smooth in acceleration and deceleration throughout its travel</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.15.2, 2.23,
8.11.2.1.1s)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[121][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[121]">
</td>
            </tr>
					<tr>
                    <th style="text-align: center;">2.2</th>
                    <th style="text-align: center;">MACHINE ROOM</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.2.1</strong></td>
                <td><strong> The access to the machine space is in conformance with the type of access, location , and combustibility allowed </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.7.1.1, 2.7.3.1,
2.7.3.2, 2.7.3.3,
2.7.3.4, 8.11.2.1.2a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[122][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[122]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2.2</strong></td>
                <td><strong>Minimum headroom clearance is either 84" , 53", 42", or 35" depending on type and location of machine room / hoist way</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.7.4, 8.11.2.1.2c)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[123][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[123]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.3</strong></td>
                <td><strong> Electric lighting in the machine room is not less than 200 lux at floor level and the control switch is at the lock - jamb side of the access door </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.7.5.1,
8.11.2.1.2c)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[124][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[124]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.4</strong></td>
                <td><strong> The strength and construction of the floor of the machine room, windows, skylights and fire resistance is in accordance with the relevant building code(s)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec.(2.1.3.3, 2.1.3.4,
2.1.5, 2.7.1.1,
2.7.2.1, 2.7.8,
8.11.2.1.2d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[125][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[125]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.5</strong></td>
                <td><strong>Housekeeping is adequate</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.6.4.8, 8.6.10.3, 8.11.2.1.2e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[126][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[126]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.6</strong></td>
                <td><strong>Ventilation (natural or forced ) complies with the elevator equipment manufacturers requirements for ambient air temperature and humidity(as posted in machine room )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.7.5.2, 2.8.4,
8.11.2.1.2g)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[127][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[127]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.7</strong></td>
                <td><strong>Fire extinguisher is available in the machine room (Class ABC)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.6.1.6.5,
8.11.2.1.2g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[128][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[128]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.2.8</strong></td>
                <td><strong>Pipes, wiring and ducts conform to the relevant specification (Pipes - 15psi steam or hot water only; wiring to NFPA70 or CSA-C22.1 standard)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.8.1, 2.8.2,
8.11.2.1.2h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[129][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[129]">
</td>
            </tr>  
 <tr>
                <td><strong>2.2.9</strong></td>
                <td><strong>Guarding of exposed auxiliary equipment is in place and secure</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.10.1,
8.11.2.1.2i)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[130][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[130]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2.10</strong></td>
                <td><strong>Verify numbering of elevators (min. 50mm height figures) on driving machine , disconnect switch, mg set, controller, selector, governor and the car crosshead or frame</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.4, 2.29.1,
8.11.2.1.2j)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[131][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[131]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.11</strong></td>
                <td><strong>Electrical disconnecting means (devices) and controls are working properly</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.4,
8.11.2.1.2k)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[132][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[132]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.12</strong></td>
                <td><strong>Controller wiring, fuses, grounding, etc. conform to NFPA 70 or CSA C22.1</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.8.1, 2.26.4,
8.6.1.6.3,
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[133][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[133]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.13</strong></td>
                <td><strong>Governor, over speed switch and seal conform to requirements:  namely, an over speed switch on every car and counterweight governor, sealing of the means to regulate the governor rope pull-out force (carrier) once set, to not more than 60% of the pull through tension developed by the governor</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.17.15, 2.18,
2.26.2, 2.26.2.10,
8.6.1.6.2,
8.10.2.1.2cc-1,
8.11.2.1.2bb, 8.11.2.3.1, 8.11.2.3.2)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[134][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[134]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.14</strong></td>
                <td><strong>Code date plate indicates the code and edition in effect at the time of installation (or alteration)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.7.1.8, 8.9)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[135][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[135]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.15</strong></td>
                <td><strong>Static control is available with  each type of hoist motor/ DC source/ inverter arrangement</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.2, 2.26.9.5, 8.10.2.2.2m,
8.11.2.1.2m)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[136][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[136]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.2.16</strong></td>
                <td><strong>Overhead beams and fastenings are secure and suitable for the duty (beams shall be or re-inforced concrete)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.9.1, 2.9.2,
2.9.3, 8.11.2.1.2n)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[137][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[137]">
</td>
            </tr>
 <tr>
                <td><strong>2.2.17</strong></td>
                <td><strong>Drive machine brake (on its own) holds the car at rest with the rated load, and when empty</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.2.2, 2.16.8,
2.24.8.3, 2.26.8,
8.11.2.1.2o,
8.11.2.3.4)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[138][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[138]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2.18</strong></td>
                <td><strong>Drive machine brake stops a decelerating empty car in the upward direction from governor overspeed setting, not to exceed 9.8 m/sec/sec</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.2.2, 2.16.8,
2.24.8.3, 2.26.8,
8.11.2.1.2o,
8.11.2.3.4)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[139][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[139]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.19</strong></td>
                <td><strong>Gears, bearings and flexible couplings are lubricated (where required) as per manufacturers recommendations as to grade and type</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.6.1.6.2,
8.11.2.1.2q)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[140][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[140]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.20</strong></td>
                <td><strong>Winding drum machine slack cable device is operational when the rope is slack</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.20.10, 2.24.10,
2.26.2, 8.6.4.10,
8.11.2.1.2r,8.11.2.2.4)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[141][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[141]">
</td>
            </tr>
			<tr>
                <td><strong>2.2.21</strong></td>
                <td><strong>Belt or chain drive machines include three belts or chains (or more) operating together in parallel as a set</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1.
Sec. (2.24.9,
8.11.2.1.2s)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[142][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[142]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.22</strong></td>
                <td><strong>Motor generator cannot supply sufficient current to the driving machine motor to move the car when the motor control switches are in the off position</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.9.7,
8.10.2.2.2t,
8.11.2.1.2t)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[143][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[143]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.23</strong></td>
                <td><strong>Absorption of regenerated power is available to prevent elevator from reaching governor trip speed or in excess of 125% rated speed</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.26.10,
8.10.2.2.2u,
8.11.2.1.2u)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[144][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[144]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.24</strong></td>
                <td><strong>AC drives from DC source use a static inverter and other devices as a means of control</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec.(2.26.2, 2.26.9.6, 8.11.2.1.2v, </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[145][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[145]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.25</strong></td>
                <td><strong>Traction sheaves comply with requirements as to material (metal) and finished grooves. Diameter to be not less than 40 times rope diameter (suspension ropes), or not less than 32 times rope diameter (compensating ropes )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.8, 2.20,
2.24.2, 8.6.1.6,
8.6.4.1, 8.7.2.21,
8.11.2.1.2w)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[146][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[146]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.26</strong></td>
                <td><strong>Secondary and deflector sheaves comply as 1.2.25 above</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.24, 8.6.1.6.2, 8.11.2.1.2x)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[147][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[147]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.27</strong></td>
                <td><strong>Rope fastenings comply with type and material requirements</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.9.3.3, 2.20,
8.11.2.1.2y)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[148][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[148]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.28</strong></td>
                <td><strong>Terminal stopping devices are provided and arranged to slow down and stop the car automatically at or near the top and bottom terminal landings (with up to rated load) and at a speed attained in normal operation</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 
Sec. (2.25,8.11.2.1.2Z,
8.11.2.3.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[149][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[149]">
</td>
            </tr>
						<tr>
                <td><strong>2.2.29</strong></td>
                <td><strong>Car and counterweight safeties comply with number and type requirements, namely;  one or more type A, B or C attached to the car frame,  and one below the frame</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.27, table
2.17.3, 8.2.6,
8.7.2.18, 8.10.2.2,
8.11.2.1.2cc,
8.11.2.2.2, 8.11.2.3.1)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[150][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[150]">
</td>
            </tr>
								<tr>
                    <th style="text-align: center;">2.3</th>
                    <th style="text-align: center;">TOP OF CAR</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.3.1</strong></td>
                <td><strong>Top of car stop switch is provided and operational</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.2.8,
8.11.2.1.3a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[151][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[151]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.3.2</strong></td>
                <td><strong>Car of top light and outlet are provided and operational</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.7,
8.11.2.1.3b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[152][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[152]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.3</strong></td>
                <td><strong>Top of car operating device is provided (for inspection purposes) </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.1.7,
2.26.1.4, 8.11.2.1.3c)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[153][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[153]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.4</strong></td>
                <td><strong>Top of car clearance and refuge space dimensions vary for the former, minimum 43" for the latter</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.4, 8.2.4,
8.6.4.11)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[154][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[154]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.5</strong></td>
                <td><strong>Terminal stopping devices are provided and arranged to slow down and stop the car automatically at or near the top and bottom terminal landings (with up to rated load) and at a speed attained in normal operation</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.16.4, 2.25.2,
2.26.2, 8.10.2.2.2z,
8.10.2.3.2k,
8.11.2.1.3g,
8.11.2.2.5)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[155][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[155]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.6</strong></td>
                <td><strong>Final terminal stopping devices meet the general requirement that they be mechanically operated and cause power to the driving machine motor and brake to be removed automatically after the car has passed a terminal landing</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.25.3,
8.10.2.3.2k, 8.11.2.1.3h,
8.11.2.2.5)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[156][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[156]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.7</strong></td>
                <td><strong>Car leveling and anticreep devices operate satisfactorily within the given landing zone (3" above and below)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.26.1.6,
8.11.2.1.3j)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[157][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[157]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.3.8</strong></td>
                <td><strong>Top emergency exit is at least 16" square</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.14.1.5,
8.11.2.1.3l)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[158][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[158]">
</td>
            </tr>  
 <tr>
                <td><strong>2.3.9</strong></td>
                <td><strong>Verify floor level and emergency identification numbering of elevators (min. 50mm height)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.29.1, 2.29.2,
8.11.2.1.3o)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[159][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[159]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.3.10</strong></td>
                <td><strong>Hoistway construction complies with appropriate standards and building regulations (where applicable)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1, 8.11.2.1.3p)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[160][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[160]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.11</strong></td>
                <td><strong>Hoistway smoke control arrangements are satisfactory enough to prevent the accumulation of smoke and hot gases</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.4,
8.11.2.1.3q)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[161][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[161]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.12</strong></td>
                <td><strong>Pipes, wiring and ducts conform to the relevant specification (Pipes - 15psi steam or hot water only; wiring to NFPA70 or CSA-C22.1 standard)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.8, 8.11.2.1.3r)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[162][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[162]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.13</strong></td>
                <td><strong>Windows, projections, recesses and setbacks comply with the appropriate building codes and hoistway enclosures generally have flush surfaces on the hoistway side</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.5, 2.1.6,
2.11.10, 8.11.2.1.3s)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[163][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[163]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.14</strong></td>
                <td><strong>Various hoistway clearances are at least the same all the way around (20mm)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.4, 2.5, 8.11.2.1.3t)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[164][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[164][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[164][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[164]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.15</strong></td>
                <td><strong>Multiple hoistways (and the number of elevators in a hoistway ) conforms with the appropriate building code</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.1.4,
8.11.2.1.3u)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[165][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[165][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[165][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[165]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.3.16</strong></td>
                <td><strong>Traveling cables and junction boxes conforms to NFPA70 or CSA -C22.1 whichever is applicable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.8.1, 8.11.2.1.3v)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[166][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[166][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[166][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[166]">
</td>
            </tr>
 <tr>
                <td><strong>2.3.17</strong></td>
                <td><strong>Door and gate equipment operation is satisfactory and in accordance with manufacturers recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.11, 2.12,
2.26.1.6, 8.11.2.1.3w)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[167][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[167][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[167][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[167]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.3.18</strong></td>
                <td><strong>Car frame and stiles are suitable for the purpose and show no defects</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec. (2.15, 8.6.2,
8.7.2.15.1, 8.8)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[168][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[168][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[168][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[168]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.19</strong></td>
                <td><strong>Guide rails fastening and equipment are suitable for the purpose, show no defects, and the guide rails are correctly lubricated (where required) as per the manufacturer specification</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.17.16, 8.6.4.3,
8.11.2.1.3y)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[169][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[169][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[169][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[169]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.20</strong></td>
                <td><strong>The governor rope is in good condition and fitted with a tag describing all relevant rope data </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.18.5, 8.6.4.2,
8.7.2.19, 8.11.2.1.3z)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[170][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[170][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[170][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[170]">
</td>
            </tr>
			<tr>
                <td><strong>2.3.21</strong></td>
                <td><strong>The governor releasing carrier is in good condition and set to require a tension in the governor rope to pull the rope from the carrier of not more than 60% of the  </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.17.15,
8.11.2.1.3aa)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[171][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[171][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[171][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[171]">
</td>
            </tr>
		<tr>
                <td><strong>2.3.22</strong></td>
                <td><strong>Rope fastening and hitch plate  are secured using bolts or rivets</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.9.3.3, 2.15.13,
2.20, 8.6.3, 8.6.4.10,
8.11.2.1.3bb)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[172][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[172][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[172][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[172]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.23</strong></td>
                <td><strong>Suspension rope is satisfactory and complies with the specifications as marked on the rope data tag</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.18.7, 2.20,
8.6.2.5, 8.7.2.21,
8.11.2.1.3cc)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[173][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[173][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[173][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[173]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.24</strong></td>
                <td><strong>Top counterweight clearance is not less than the sum of all other relevant clearances such as bottom run by, car buffer stroke, 50% of gravity stopping distance, plus 150mm</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1 Sec. (2.4.9,8.11.2.1.3e)</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[174][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[174][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[174][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[174]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.25</strong></td>
                <td><strong>Traction sheaves comply with requirements as to material (metal) and finished grooves.  Diameter to be not less than 40 times rope diameter (suspension ropes) or not less than 32 times rope diameter (compensating ropes)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.24)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[175][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[175][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[175][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[175]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.26</strong></td>
                <td><strong>Broken rope, chain or tape switch are working</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.25.2.3.2,
2.26.2.6, 8.11.2.1.3i,
8.11.2.2.9)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[176][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[176][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[176][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[176]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.27</strong></td>
                <td><strong>Crosshead data plate states: the complete car weight, rated load and speed, wire rope data, name or trade mark of manufacturer, rail lubrication instructions</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.16.3, 2.20.2,
8.7.2.21, 8.11.2.1.3k)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[177][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[177][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[177][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[177]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.28</strong></td>
                <td><strong>Counterweight and counterweight buffers are in compliance with design requirements</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.21, 2.22,
8.11.2.1.3M)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[178][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[178][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[178][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[178]">
</td>
            </tr>
						<tr>
                <td><strong>2.3.29</strong></td>
                <td><strong>Counterweight safeties are fitted and working  in accessible areas below the car or hoistway</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.6,2.17, 8.2.3,
8.10.2.2, 8.11.2.1.3n,
8.11.2.3.1)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[179][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[179][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[179][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[179]">
</td>
            </tr>
									<tr>
                <td><strong>2.3.30</strong></td>
                <td><strong>Compensating ropes and chains are in place to tie the counterweight and car together</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.21.4, 8.10.2.2.3w-3,
8.11.2.1.3dd)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[180][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[180][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[180][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[180]">
</td>
            </tr>		
											<tr>
                    <th style="text-align: center;">2.4</th>
                    <th style="text-align: center;">OUTSIDE HOISTWAY</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.4.1</strong></td>
                <td><strong>Car platform guard plates comply with material specification (steel ) and thickness ( not less than 1.5 mm )</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.15.9,
8.11.2.1.4a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[181][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[181][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[181][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[181]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.4.2</strong></td>
                <td><strong>Hoistway doors operate correctly</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.12.7, 2.26.2,
8.11.2.1.4b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[182][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[182][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[182][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[182]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.3</strong></td>
                <td><strong>Car vision panel (if fitted) is 0.1sq.m. (Max) and either wire-glass or laminated, and in the case of glass doors be laminated, safety glass or safety plastic, with not less than 60% of the total visible door panel surface area as glass. </strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec.(2.11.7,8.11.2.1.4c)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[183][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[183][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[183][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[183]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.4</strong></td>
                <td><strong>Hoistway door locking devices are operational (interlocks)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.12, 8.11.2.1.4d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[184][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[184][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[184][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[184]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.5</strong></td>
                <td><strong>Access to hoistway (at top or bottom landing) is by use of an access switch adjacent to the entrance.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.12.6, 2.12.7,
8.11.2.1.4e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[185][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[185][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[185][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[185]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.6</strong></td>
                <td><strong>Hoistway doors are power closing</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13, 8.11.2.1.4f)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[186][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[186][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[186][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[186]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.7</strong></td>
                <td><strong>Sequence of operation of hoistway doors is correct</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.6, 8.11.2.1.4g)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[187][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[187][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[187][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[187]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.4.8</strong></td>
                <td><strong>Hoistway enclosure is fire resistance (or non-fire resistance, depending on building code)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.1.1, 2.1.4,
2.1.5, 8.11.2.1.4h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[188][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[188][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[188][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[188]">
</td>
            </tr>  
 <tr>
                <td><strong>2.4.9</strong></td>
                <td><strong>Elevator parking devices are operable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (8.11.2.1.4i)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[189][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[189][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[189][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[189]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.4.10</strong></td>
                <td><strong>Emergency doors in blind hoistway are on every third floor, not more than 11m from sill to sill with a clear opening of 700mm x 2030mm (at least)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.11.1.1,
2.11.1.2, 8.11.2.1.4j)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[190][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[190][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[190][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[190]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.11</strong></td>
                <td><strong>Doors are self-closing and self-locking and marked "Danger Elevator Hoistway" in 50mm letters (an open or unlocked door removes power from the elevator motor)</strong></td>
				<td style="text-align: center;"><strong>     ASME A17.1
Sec. (2.11.1.1,
2.11.1.2, 8.11.2.1.4j)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[191][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[191][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[191][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[191]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.12</strong></td>
                <td><strong>Access to hoistway (at top or bottom landing) is by use of an access switch adjacent to the entrance.</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.12.6, 2.12.7,
8.11.2.1.4e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[192][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[192][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[192][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[192]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.13</strong></td>
                <td><strong>Access to hoistway (at top or bottom landing) is by use of an access switch adjacent to the entrance.</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.12.6, 2.12.7,
8.11.2.1.4e)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[193][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[193][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[193][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[193]">
</td>
            </tr>
			<tr>
                <td><strong>2.4.14</strong></td>
                <td><strong>Hoistway doors are power closing</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13, 8.11.2.1.4f)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[194][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[194][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[194][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[194]">
</td>
            </tr>
			<tr>
                    <th style="text-align: center;">2.5</th>
                    <th style="text-align: center;">ELEVATOR PIT</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.5.1</strong></td>
                <td><strong>The pit access, lighting and stop switch meet design requirements</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.3.2, 2.8,
2.26.2.7, 8.6.4.7,
8.11.2.1.5a)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[195][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[195][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[195][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[195]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.5.2</strong></td>
                <td><strong>Bottom clearance, runby and minimum refuge space dimensions meet design requirements (min. 600mm) (min. 150mm for bottom runby)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.3.2, 2.4.1,
2.4.2, 2.22.4.8,
8.6.4.11, 8.11.2.1.5b)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[196][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[196][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[196][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[196]">
</td>
            </tr>
			<tr>
                <td><strong>2.5.3</strong></td>
                <td><strong>Final and emergency terminal stopping devices operate correctly and remove power from driving machine</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.25.3,8.10.2.2.5c, 8.11.2.1.5d)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[197][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[197][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[197][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[197]">
</td>
            </tr>
			<tr>
                <td><strong>2.5.4</strong></td>
                <td><strong>Normal terminal stopping devices operate correctly to slow down and operate the car correctly at or near top and bottom terminal landings (up to rated load and speed)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.25, 8.11.2.2.5)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[198][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[198][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[198][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[198]">
</td>
            </tr>
			<tr>
                <td><strong>2.5.5</strong></td>
                <td><strong>Travel cables are undamaged and serviceable</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.8.1.2)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[199][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[199][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[199][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[199]">
</td>
            </tr>
			<tr>
                <td><strong>2.5.6</strong></td>
                <td><strong>Governor rope tension devices are operating correctly</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.18.7, 8.6.1.6.2, 8.11.2.1.5g)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[200][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[200][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[200][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[200]">
</td>
            </tr>
			<tr>
                <td><strong>2.5.7</strong></td>
                <td><strong>Car frame and platform conforms to correct material and fixings requirements as permitted in relevant specifications</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.15.6, 2.15.8,
2.16.2.2, 8.11.2.1.5h)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[201][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[201][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[201][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[201]">
</td>
            </tr>
			
      <tr>
                <td><strong>2.5.8</strong></td>
                <td><strong>Car safeties guiding members- including roped-hydraulic elevators installed under A17.1b-1989 and later editions - are lubricated and clean</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.15, 2.17.11,
8.6.4.5, 8.7.2.15.1,
8.11.2.1.5j, 8.11.2.3.1)
</strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[202][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[202][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[202][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[202]">
</td>
            </tr>  
 <tr>
                <td><strong>2.5.9</strong></td>
                <td><strong>Buffers and terminal speed devices are operating correctly</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.6,2.22,
2.26.2.22, 8.2.3, 8.6.1.6.3, 8.10.2.2.5c,
8.11.2.3.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[203][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[203][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[203][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[203]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.5.10</strong></td>
                <td><strong>Compensating ropes and chains are in place to tie the counterweight and car together</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.17.17, 2.21.4,
2.26.2.3, 8.11.2.1.5h)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[204][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[204][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[204][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[204]">
</td>
            </tr>
			<tr>
                    <th style="text-align: center;">2.6</th>
                    <th style="text-align: center;">FIREFIGHTER’S SERVICE</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>
				<tr>
 <tr>
                <td><strong>2.6.1</strong></td>
                <td><strong>Verify / check operation of elevators under fire and other emergency conditions (A17.1b- 1973 through A17.1b- 1980)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[205][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[205][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[205][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[205]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.6.2</strong></td>
                <td><strong>Verify / check operation of elevators under fire and other emergency conditions (A17.1- 1981 through A17.1b- 1983)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
 </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[206][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[206][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[206][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[206]">
</td>
            </tr>
			<tr>
                <td><strong>2.6.3</strong></td>
                <td><strong>Verify / check operation of elevators under fire and other emergency conditions (A17.1- 1984 through A17.1a- 1988 and A17.3)</strong></td>
				<td style="text-align: center;"><strong>ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[207][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[207][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[207][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[207]">
</td>
            </tr>
			<tr>
                <td><strong>2.6.4</strong></td>
                <td><strong>Verify Firefighters' service (A17.1b- 1989 and later edition)</strong></td>
				<td style="text-align: center;"><strong> ASME A17.1
Sec. (2.13.3.4, 2.13.5,
8.6.10.1, 8.11.2.1.4l,
8.11.2.2.6)
  </strong></td>
                 <td class="checkbox-cell">
    <input type="checkbox" name="result[208][]" id="checkbox4" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[208][]" id="checkbox5" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[208][]" id="checkbox6" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[208]">
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
                <?php echo htmlspecialchars($row['remarks']); ?></td>
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

        </div>

<div class="col-12">
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>


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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
