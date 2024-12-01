<?php 

include_once('./get-checklist.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR A-FRAMES AND MOBILE GANTRIES</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: auto;
            padding: 20px;
           
        }
        h1, h2, h3, h4 {
            text-align: center;
			font-size: 18px;
			font-weight: 700;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
			
        }
		
		table th{
		background-color: #1b6bab47 !important;
		color: black;
		}
		
        th {
            background-color: #1b6bab47;
        }
		
				.large-checkbox {
      width: 27px;
      height: 15px;
	  
      
    }
	
	
    .checkbox-cell {
    text-align: center; /* Center horizontally */
    vertical-align: middle; /* Center vertically */
    height: 100%; /* Ensure the cell has enough height */
}
	
	.table-bordered td, .table-bordered th {
    border: 1px solid black;
}


.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid black;
}

.table .thead-dark th {
    color: black;
    
    border-color: #454d55;
}

	
       
        @media (max-width: 768px) {
            .signature-section {
                flex-direction: column;
                align-items: center;
            }
            .signature {
                margin-bottom: 20px;
            }
        }
		
		@media print {
      .no-print {
        display: none;
      }
    }
    </style>
</head>
<body>
    <div class="container">
	
	  <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
				
				<tr>
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR A-FRAMES AND MOBILE GANTRIES</strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.14</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table>
			
			</div>

        <h4>A-FRAMES AND MOBILE GANTRIES</h4>
        <h4>ASME B30.16-2017, ASME B30.17-2015</h4>
		
        
		 <!--<button class="btn btn-primary no-print" onclick="preparePrint()">Print View</button>-->

         <div class="table-responsive">
            <table class="table table-bordered">
                
				
				<tr>
                <th style="width: 25%;">REPORT NO:</th>
                <td style="width: 25%;"><strong> <?php echo htmlspecialchars($row['report_no']); ?></strong></td>
                <th style="width: 25%;">INSPECTION DATE:</th>
                <td style="width: 25%;"><strong> <?php echo htmlspecialchars($row['inspection_date']); ?> </strong></td>
            </tr>
            <tr>
                <th>CLIENT’S NAME:</th>
                <td><strong>  <?php echo htmlspecialchars($row['client_name']); ?> </strong></td>
                <th>INSPECTED BY:</th>
                <td><strong> <?php echo htmlspecialchars($row['inspected_by']); ?> </strong></td>
            </tr>
            <tr>
                <th>LOCATION:</th>
                <td><strong><?php echo htmlspecialchars($row['location']); ?></strong></td>
                <th>STICKER NO.:</th>
                <td><strong><?php echo htmlspecialchars($row['sticker_no']); ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT NO:</th>
                <td><strong><?php echo htmlspecialchars($row['crane_asset_no']); ?></strong></td>
                <th>EQUIP.SERIAL NO.:</th>
                <td><strong><?php echo htmlspecialchars($row['crane_serial_no']); ?></strong></td>
            </tr>
            <tr>
                <th>EQUIPMENT TYPE:</th>
                <td><strong><?php echo htmlspecialchars($row['equipment_type']); ?></strong></td>
                <th>CAPACITY (SWL):</th>
                <td><strong><?php echo htmlspecialchars($row['capacity_swl']); ?></strong></td>
            </tr>
            
        </table>
</div>
        


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
				<td style="text-align: center;"><strong>ASME B30.17 Sec.2.1.5
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
                <td><strong>Previous inspection reports are checked </strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.2.1..2(g)
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
                <td><strong>Safe working load is clearly marked on the runway and the lifting machine</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.1</strong></td>
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
                <td><strong>Rated load is clearly marked on hoist or trolley unit</strong></td>
				<td style="text-align: center;"><strong> ASME B30.16, Sec.1.1.1</strong></td>
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
                <td><strong>Equipment number is clearly marked for identification purposes</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1</strong></td>
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
                <td><strong>Safe working load is clearly marked on the runway and the lifting machine</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.1 </strong></td>
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
                <td><strong>Crane manufacturer name, address, serial number and power ratings are clearly marked or tagged</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.1.1.(b)
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
                <td><strong>Controls are clearly marked with their functions and modes of operation</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.2</strong></td>
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
                <td><strong>Hoist and swing drives are capable of starts and stops with variable acceleration and deceleration required in normal operation</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(f)
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
                <td><strong>Hoist drum specifications are marked (rated load, drum size, rope size, rope speed (ft/min or m/s), rated power)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec1.1.3</strong></td>
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
                <td><strong>Hand Chain Hoist: Manufacturer data, serial number and safe working load are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3a</strong></td>
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
                <td><strong>Electric Powered Hoist: Manufacturer data, serial number, safe working load, voltage and  phase are clearly </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3b</strong></td>
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
                <td><strong>Air Powered Hoist: Manufacturer data, serial number, model, safe working load and  rated air pressure are </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3c</strong></td>
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
                <td><strong>Warning signs/labels are provided on the hoist units and electrical enclosures</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.4</strong></td>
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
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">CRANE RUNWAY AND MONORAIL TRACKS</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>2.1</strong></td>
                <td><strong>Structure is vibration free under normal operating condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1</strong></td>
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
                <td><strong>2.2</strong></td>
                <td><strong>Monorail end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1g</strong></td>
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
                <td><strong>2.3</strong></td>
                <td><strong>Jib crane end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1g</strong></td>
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
                <td><strong>2.4</strong></td>
                <td><strong>Tracks are properly installed and aligned</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1c</strong></td>
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
                <td><strong>2.5</strong></td>
                <td><strong>Crane runways or monorail tracks are fastened and Secured to a supporting structure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.2</strong></td>
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
                <td><strong>2.6</strong></td>
                <td><strong>All welded members are free of defects and not corroded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.4</strong></td>
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
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">GUARDS FOR MOVING PARTS</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>3.1</strong></td>
                <td><strong>Guards protect moving parts such as gears, chains, chain sprockets</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.7.1</strong></td>
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
                <td><strong>3.2</strong></td>
                <td><strong>Guards protect ropes where liable to come in contact with conductors</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.7.2</strong></td>
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
                <td><strong>3.3</strong></td>
                <td><strong>Guards are provided to prevent contact between crane bridge or runway conductors and hoisting ropes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.7.2</strong></td>
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
                    <th style="text-align: center;">4</th>
                    <th style="text-align: center;">HOISTING BRAKES</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
				
 <tr>
                <td><strong>4.1</strong></td>
                <td><strong>Hand chain operated hoist : Hoist automatically stops and holds lifted load when the actuating force is removed</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11a</strong></td>
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
                <td><strong>4.2</strong></td>
                <td><strong>Electric Powered Hoist : Braking system will stop and hold the load hook when controls are released under any load </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-</strong></td>
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
                <td><strong>4.3</strong></td>
                <td><strong>Air Powered Hoist : Braking system will stop and hold the load hook when controls are released under any load </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-</strong></td>
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
                <td><strong>4.4</strong></td>
                <td><strong>An electric hoist stops and holds the load block in the event of power failure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-</strong></td>
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
                <td><strong>4.5</strong></td>
                <td><strong>An air hoist stops and holds the load block in the event of air pressure loose</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-</strong></td>
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
                <td><strong>4.6</strong></td>
                <td><strong>Braking systems has means for adjustment to compensate for wear</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.16.1.2.11(b3)</strong></td>
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
                    <th style="text-align: center;">5</th>
                    <th style="text-align: center;">ELECTRICAL EQUIPMENT</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
	<tr>
                <td><strong>5.0</strong></td>
                <td><strong>Control circuit voltage does not  exceed 600v for AC or DC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.1(b)</strong></td>
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
                <td><strong>5.1</strong></td>
                <td><strong>Controls are clearly marked with their functions and modes of operation</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.2</strong></td>
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
                <td><strong>5.2</strong></td>
                <td><strong>Pendant control station is constructed to prevent electrical conductors strain</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.1(d)</strong></td>
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
                <td><strong>5.3</strong></td>
                <td><strong>Push button enclosure is grounded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.1(e)</strong></td>
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
                <td><strong>5.4</strong></td>
                <td><strong>Push button enclosure is marked for identification of function</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.1(e)</strong></td>
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
                <td><strong>5.5</strong></td>
                <td><strong>Parts of electrical equipment are enclosed and are not exposed to inadvertent contact under normal operating </strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.2(a)</strong></td>
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
                <td><strong>5.6</strong></td>
                <td><strong>Live parts of electrical equipment are protected from direct exposure to grease and oil and protected from dirt and moisture</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.2(b)</strong></td>
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
                <td><strong>5.7</strong></td>
                <td><strong>Guards on live parts are not deformed or/and in contact</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.2(c)</strong></td>
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
                <td><strong>5.8</strong></td>
                <td><strong>Floor operated cranes controllers return to off position when released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.3(b1)</strong></td>
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
                <td><strong>5.9</strong></td>
                <td><strong>Pendant push buttons that control motion return to off position when pressure is released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.3(b2)</strong></td>
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
                    <th style="text-align: center;">6</th>
                    <th style="text-align: center;">LOAD CHAIN, ROPE AND HOOK BLOCK</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
	<tr>
                <td><strong>6.0</strong></td>
                <td><strong>Chain passes over all load sprockets without binding</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.8</strong></td>
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
                <td><strong>6.1</strong></td>
                <td><strong>Hand Operated Chain : Chain length for extension (stretch)  tolerance is no longer than 2.5% of unused chain or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)</strong></td>
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
                <td><strong>6.2</strong></td>
                <td><strong>Power Operated Chain : Chain length for extension (stretch)  tolerance is no longer than 1.5% of unused chain or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)</strong></td>
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
                <td><strong>6.3</strong></td>
                <td><strong>The chain does not suffer from gouges, nicks, corrosion, weld spatter or distorted links (Judgement to be used as to the suitability or otherwise of using chain with these deficiencies)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(b)</strong></td>
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
                <td><strong>6.4</strong></td>
                <td><strong>The chain does not bind, jump or gets noisy when hoist is operated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(b)</strong></td>
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
                <td><strong>6.5</strong></td>
                <td><strong>The chain is not stretched or elongated more than 1/4" (6.3 mm) in 12" (305 mm) with reference to the manufacturer's manual (roller chain)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(c1)</strong></td>
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
                <td><strong>6.6</strong></td>
                <td><strong>The chain is not twisted more than 15 degree in 5 ft. (1.52 m) sections (roller chain).</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(c2)</strong></td>
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
                <td><strong>6.7</strong></td>
                <td><strong>The roller chain pins, links and rollers move freely and are not corroded, pitted, discolored or damaged.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(d)</strong></td>
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
                <td><strong>6.8</strong></td>
                <td><strong>Fitted sling or chain would be retained slack in the bowl of the hook where latches are provided.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.9</strong></td>
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
                <td><strong>6.9</strong></td>
                <td><strong>Hand operated hoist : Load block is provided with a guard against load chain jamming in the load block under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10</strong></td>
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
                <td><strong>6.10</strong></td>
                <td><strong>Electric or Air Powered Hoist: Load block is of the enclosed type and means is provided to guard against rope or load chain jamming in the load block under </strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10</strong></td>
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
                <td><strong>6.11</strong></td>
                <td><strong>Rope is free of damages
•	Max of 12 randomly broken wires in 1 lay
•	4 broken wires in 1 strand of 1 lay
•	1 broken wire protruding from the core (2 for rotation resistant ropes)
•	Wear of 1/3 of the original diameter of outside individual wires
Kinking, crushing, birdcaging or other distortion
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7, Sec.2.4.1(c2)</strong></td>
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
                <td><strong>6.12</strong></td>
                <td><strong>Rope termination is completed at the hoist wedge anchor with a drop forged U- clip</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.6</strong></td>
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
                <td><strong>6.13</strong></td>
                <td><strong>Pendant push buttons that control motion return to off position when pressure is released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.9.3(b2)</strong></td>
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
                    <th style="text-align: center;">7</th>
                    <th style="text-align: center;">ROPE DRUM</th>
					<th style="text-align: center;"> </th>                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
	<tr>
                <td><strong>7.0</strong></td>
                <td><strong>Electric and air powered hoists : Rope drum is grooved and free of surface defects that could cause rope damage (excluding hoists made for special applications)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.5</strong></td>
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
                <td><strong>7.1</strong></td>
                <td><strong>Hoist drum specifications are marked (rated load, drum size, rope size, rope speed (ft/min or m/s), rated power)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.1.3</strong></td>
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
                <td><strong>7.2</strong></td>
                <td><strong>Hand Chain Hoist: Manufacturer data, serial number and safe working load are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3a</strong></td>
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
                <td><strong>7.3</strong></td>
                <td><strong>Electric Powered Hoist: Manufacturer data, serial number, safe working load, voltage and phase are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3b</strong></td>
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
                <td><strong>7.4</strong></td>
                <td><strong>Air Powered Hoist: Manufacturer data, serial number, model, safe working load and rated air pressure are clearly displayed on the item</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.3c</strong></td>
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
                <td><strong>7.5</strong></td>
                <td><strong>Warning signs/labels are provided on the hoist units and electrical enclosures</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.1.4</strong></td>
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
                <td><strong>7.6</strong></td>
                <td><strong>Hoist drum is adequately lubricated as per the hoist manufacturers manual</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.3.</strong></td>
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
                <td><strong>7.7</strong></td>
                <td><strong>Drum has a minimum of two wraps of rope on it</strong></td>
				<td style="text-align: center;"><strong>ASME B30.716 Sec.1.2.6(c)</strong></td>
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
                <td><strong>7.8</strong></td>
                <td><strong>Structure is vibration free under normal operating condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1(b)</strong></td>
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
                <td><strong>7.9</strong></td>
                <td><strong>Monorail end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.4.2, Sec 1.5.3</strong></td>
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
                <td><strong>7.10</strong></td>
                <td><strong>Jib crane end stops are installed and in good condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.4.2, Sec 1.5.3</strong></td>
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
                <td><strong>7.11</strong></td>
                <td><strong>Tracks are properly installed and aligned</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.1  Sec 1.4.1</strong></td>
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
                <td><strong>7.12</strong></td>
                <td><strong>Crane runways or monorail tracks are fastened and Secured to a supporting structure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.2</strong></td>
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
                <td><strong>7.13</strong></td>
                <td><strong>All welded members are free of defects and not corroded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.3.4</strong></td>
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
                <td><strong>7.14</strong></td>
                <td><strong>Guards protect moving parts such as gears, chains, chain sprockets</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.1</strong></td>
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
                <td><strong>7.15</strong></td>
                <td><strong>Guards protect ropes where liable to come in contact with conductors</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.2(a)</strong></td>
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
                <td><strong>7.16</strong></td>
                <td><strong>Guards are provided to prevent contact between crane bridge or runway conductors and hoisting ropes.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.11.2(b)</strong></td>
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
                <td><strong>7.17</strong></td>
                <td><strong>Hand chain operated Hoist: Hoist automatically stops and holds lifted load when the actuating force is removed</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11a</strong></td>
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
                <td><strong>7.18</strong></td>
                <td><strong>Electric Powered Hoist: Braking system will stop and hold the load hook when controls are released under any load condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-b)</strong></td>
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
                <td><strong>7.19</strong></td>
                <td><strong>Air Powered Hoist: Braking system will stop and hold the load hook when controls are released under any load condition</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-a)</strong></td>
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
                <td><strong>7.20</strong></td>
                <td><strong>An electric hoist stops and holds the load block in the event of power failure</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b1-c)</strong></td>
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
                <td><strong>7.21</strong></td>
                <td><strong>An air hoist stops and holds the load block in the event of air pressure loose</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(c1-b)</strong></td>
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
                <td><strong>7.22</strong></td>
                <td><strong>Braking systems has means for adjustment to compensate for wear</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.11(b3/c)</strong></td>
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
                <td><strong>7.23</strong></td>
                <td><strong>Control circuit voltage does not exceed 600v for AC or DC</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec. 1.14.1(b)</strong></td>
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
                <td><strong>7.24</strong></td>
                <td><strong>Push button enclosure is grounded</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.1(e)
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
                <td><strong>7.25</strong></td>
                <td><strong>Push button enclosure is marked for identification of function</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.1(e)
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
                <td><strong>7.26</strong></td>
                <td><strong>Parts of electrical equipment are enclosed and are not exposed to inadvertent contact under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.2(a)
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
                <td><strong>7.27</strong></td>
                <td><strong>Live parts of electrical equipment are protected from direct exposure to grease and oil and protected from dirt and moisture</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 
Sec. 1.14.2(b)
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
                <td><strong>7.28</strong></td>
                <td><strong>Guards on live parts are not deformed or/and in contact</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.2(c)</strong></td>
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
                <td><strong>7.29</strong></td>
                <td><strong>Floor operated cranes controllers return to off position when released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.3(c1)</strong></td>
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
                <td><strong>7.30</strong></td>
                <td><strong>Pendant push buttons that control motion return to off position when pressure is released</strong></td>
				<td style="text-align: center;"><strong>ASME B30.17 Sec.1.14.3(c)</strong></td>
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
                <td><strong>7.31</strong></td>
                <td><strong>Chain passes over all load sprockets without binding</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.8</strong></td>
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
                <td><strong>7.32</strong></td>
                <td><strong>Hand Operated Chain: Chain length for extension (stretch) tolerance is no longer than 2.5% of unused chain or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)</strong></td>
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
                <td><strong>7.33</strong></td>
                <td><strong>Power Operated Chain: Chain length for extension (stretch) tolerance is no longer than 1.5% of unused chain or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)</strong></td>
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
                <td><strong>7.34</strong></td>
                <td><strong>The chain does not suffer from gouges, nicks, corrosion, weld spatter or distorted links (Judgement to be used as to the suitability or otherwise of using chain with these deficiencies)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(b)</strong></td>
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
                <td><strong>7.35</strong></td>
                <td><strong>The chain does not bind jump or gets noisy when hoist is operated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(b)</strong></td>
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
                <td><strong>7.36</strong></td>
                <td><strong>The chain is not stretched or elongated more than 1/4" (6.3 mm) in 12" (305 mm) with reference to the manufacturer's manual (roller chain)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(c1)</strong></td>
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
                <td><strong>7.37</strong></td>
                <td><strong>The chain is not twisted more than 15 degree in 5 ft (1.52 m) sections (roller chain)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(c2)</strong></td>
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
                <td><strong>7.38</strong></td>
                <td><strong>The roller chain pins, links and rollers move freely and are not corroded, pitted, discolored or damaged</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.6.1(d)</strong></td>
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
                <td><strong>7.39</strong></td>
                <td><strong>Fitted sling or chain would be retained slack in the bowl of the hook where latches are provided</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.9</strong></td>
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
                <td><strong>7.40</strong></td>
                <td><strong>Hand operated hoist: Load block is provided with a guard against load chain jamming in the load block under normal operating conditions</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10</strong></td>
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
                <td><strong>7.41</strong></td>
                <td><strong>Electric or Air Powered Hoist: Load block is of the enclosed type and means is provided to guard against rope or load chain jamming in the load block under normal operating conditions.</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.10</strong></td>
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
                <td><strong>7.42</strong></td>
                <td><strong>Rope termination is completed at the hoist wedge anchor with a drop forged U- clip</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.5.2(a)</strong></td>
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
                <td><strong>7.43</strong></td>
                <td><strong>A rope thimble is used in the eye when an eye splice is used in a rope termination (in accordance with the manufacturer’s instructions)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.6</strong></td>
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
                <td><strong>7.44</strong></td>
                <td><strong>Electric and air powered hoists: Rope drum is grooved and free of surface defects that could cause rope damage (excluding hoists made for special applications</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.5</strong></td>
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
                <td><strong>7.45</strong></td>
                <td><strong>Hoist drum is adequately lubricated as per the hoist manufacturers manual</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.2.3.4</strong></td>
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
                <td><strong>7.46</strong></td>
                <td><strong>Drum capacity can accommodate the specific rope size and length</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c)</strong></td>
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
                <td><strong>7.47</strong></td>
                <td><strong>Drum has a minimum of two wraps of rope on it</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.6(c)</strong></td>
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
                <td><strong>7.48</strong></td>
                <td><strong>Each drum end of the rope is anchored by a clamp attached to the drum or by a socket arrangement (approved by the manufacturer)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c2)</strong></td>
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
                <td><strong>7.49</strong></td>
                <td><strong>Drum flanges always extend a minimum of 1/2" (13mm) above the top layer of rope at all times</strong></td>
				<td style="text-align: center;"><strong>ASME B30.7 Sec.1.2.2(c3)</strong></td>
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
                    <th style="text-align: center;">8</th>
                    <th style="text-align: center;">HOOKS</th>
					<th style="text-align: center;"> </th>
                    
                    <th style="text-align: center;">PASS</th>
                    <th style="text-align: center;">FAIL</th>
                    <th style="text-align: center;">NA</th>
                    <th> </th>
                </tr>
	<tr>
                <td><strong>8.0</strong></td>
                <td><strong>Labeling and manufacturer data are available and legible</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.2.1.1</strong></td>
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
                <td><strong>8.1</strong></td>
                <td><strong>Hook is freely swiveling and lubricated</strong></td>
				<td style="text-align: center;"><strong>ASME B30.16 Sec.1.2.9</strong></td>
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
                <td><strong>8.2</strong></td>
                <td><strong>Hook's weight is clearly marked/printed on the hook</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.1.1</strong></td>
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
                <td><strong>8.3</strong></td>
                <td><strong>Safe working load is clearly marked on the hook</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec2.1.1</strong></td>
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
                <td><strong>8.4</strong></td>
                <td><strong>Hook is not bent or twisted Max. bending or twisting not to exceed 10 degrees from plane of unbent hook or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.3(c1)</strong></td>
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
                <td><strong>8.5</strong></td>
                <td><strong>Hook is not distorted in the throat opening
Max. allowable throat opening is 15% compared to new hook, or as per manufacturer recommendations
</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c2)</strong></td>
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
                <td><strong>8.6</strong></td>
                <td><strong>Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c3)</strong></td>
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
                <td><strong>8.7</strong></td>
                <td><strong>Maximum wear in the hook bowl is not exceeding 10% (compared to new hook) or as per manufacturer recommendations</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c3)</strong></td>
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
                <td><strong>8.8</strong></td>
                <td><strong>Hook is not cracked, gouged or shows nicks</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.2(c3)</strong></td>
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
                <td><strong>8.9</strong></td>
                <td><strong>Hook can lock (if it is a self-locking hook)</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c4)</strong></td>
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
                <td><strong>8.10</strong></td>
                <td><strong>Hook latch is operative</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec.1.2.1.3(c5)</strong></td>
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
                <td><strong>8.11</strong></td>
                <td><strong>Hook is free to rotate</strong></td>
				<td style="text-align: center;"><strong>ASME B30.10 Sec1.2.1.3(c5)</strong></td>
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
			
        </table>
</div>
        


<div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
				
				<tr>
                <th colspan="3" style="text-align: center;">REMARKS / RECOMMENDATIONS: </th>
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
                <td style="width: 25%;"><strong></strong></td>
                <th style="width: 25%;">CLIENT’S REP. NAME:</th>
                <td style="width: 25%;"><strong></strong></td>
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
