<?php 

include_once('./get-checklist.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR MANBASKETS </title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">

    <style>
        .large-checkbox {
    width: 20px;
    height: 20px;
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
            <strong>INSPECTION CHECKLIST FOR PERSONNEL LIFTING SYSTEMS </strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.10</td>
        <td>Revision 02</td>
        <td><b>Issue Date: </b>30/SEP/2020</td>
    </tr>
    <tr>
        <td class="left-align"><b>Prepared By</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By</b><br>Managing Director</td>
   
   <td><img src="../../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
            <!-- <table class="table table-bordered">
                <tbody>
				
				<tr>
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR PERSONNEL LIFTING SYSTEMS  </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.10</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>PERSONNEL LIFTING SYSTEMS (MANBASKET)</h4>
        <h4>ASME B30.23 – 2016     </h4>
		
        
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
                    <th style="text-align: center;">RATINGS & MARKINGS</th>
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
                <td><strong> Documentation is available. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 Sec 1.2.1(c)(1,2,3)
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
                <td><strong>  Platform has an identification number / asset number marked on it. </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23 SEC 1.1(7)(-c)
 </strong></td>
 <td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox2_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox2_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[2][]" id="checkbox2_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[2]">
</td>
            </tr>
			<tr>
                <td><strong>1.3</strong></td>
                <td><strong> Platform’s SWL is prominently marked Minimum Platform rating is 300 lbs. (136 kg).   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 SEC 1.1.1 (B)(1)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox3_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox3_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[3][]" id="checkbox3_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[3]">
</td>
            </tr>
			<tr>
                <td><strong>1.4</strong></td>
                <td><strong> Maximum number of persons allowed on the platform is clearly marked.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox4_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox4_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[4][]" id="checkbox4_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[4]">
</td>
            </tr>
			<tr>
                <td><strong>1.5</strong></td>
                <td><strong>An Identification Plate is provided with the following items are clearly marked: Manufacturer name & address, weight of the empty platform, date of manufacture, number of personnel allowed on the platform, certificate number of compliance to the design, construction and testing.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 Sec 1.2(c)
Sec 1.1.
(7)(-a)(d)(-e)
  </strong></td>
  <td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox5_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox5_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[5][]" id="checkbox5_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[5]">
</td>
            </tr>
			<tr>
                <td><strong>1.6</strong></td>
                <td><strong>  Rope sling and chain sling suspension systems shall have each leg of the system permanently marked with the rated load of the leg.   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(10)(-h)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox6_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox6_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[6][]" id="checkbox6_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[6]">
</td>
            </tr>
			<tr>
                <td><strong>1.7</strong></td>
                <td><strong>  The master link in the system shall be permanently marked with the suspension system's rated load and identification as a personnel lifting platform suspension component.   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(10)(-h)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox7_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox7_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[7][]" id="checkbox7_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[7]">
</td>
            </tr>
			
            
			</tbody>
			
			<thead class="thead-dark">
            <tr>
                <th style="text-align: center;">2</th>
                <th style="text-align: center;">INSPECTION POINTS</th>
				<th style="text-align: center;"> </th>				
                <th style="text-align: center;">PASS</th>
                <th style="text-align: center;">FAIL</th>
                <th style="text-align: center;">N/A</th>
                <th style="text-align: center;">REMARKS</th>
            </tr>
			</thead>
			<tbody>
			
			<tr>
                <td><strong>2.1</strong></td>
                <td><strong>  Shackles shall be of a bolt type with cotter pin.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(10)(-i)   </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox8_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox8_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[8][]" id="checkbox8_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[8]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.2</strong></td>
                <td><strong>  Access system (gate), if provided, shall only open inward. </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(8)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox9_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox9_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[9][]" id="checkbox9_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[9]">
</td>
            </tr>
			<tr>
                <td><strong>2.3</strong></td>
                <td><strong>Rope Sling Suspension System with Mechanically spliced Flemish eyes, if used, have thimbles in all eyes.  (Wire rope clips, wedge sockets, or knots shall not be used).    </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(10)(-a)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox10_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox10_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[10][]" id="checkbox10_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[10]">
</td>
            </tr>
            <tr>
                <td><strong>2.4</strong></td>
                <td><strong> Chain sling, if used, has a minimum of grade 80 chain.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23 sec 1.1(10)(-c) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox11_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox11_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[11][]" id="checkbox11_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[11]">
</td>
            </tr>
			<tr>
                <td><strong>2.5</strong></td>
                <td><strong>All sling suspension systems utilized a master link for attachment to the hoisting equipment’s hook or bolt type shackle with cotter pin.   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23 sec 1.1(10)(-d) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox12_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox12_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[12][]" id="checkbox12_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[12]">
</td>
            </tr>
			<tr>
                <td><strong>2.6</strong></td>
                <td><strong>  Guard rail protection consists of: Top rail (not less than 39” (990 mm & not more than 45” in 1,140 mm),  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1.1(2)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox13_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox13_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[13][]" id="checkbox13_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[13]">
</td>
            </tr>
			<tr>
                <td><strong>2.7</strong></td>
                <td><strong> Intermediate rail, toe board has a min. in height of 3.9”(90 mm) from the top of the platform floor.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1.1(2)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox14_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox14_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[14][]" id="checkbox14_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[14]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.8</strong></td>
                <td><strong> Anchorage points are provided within the platform or on the boom tip.   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(3)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox15_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox15_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[15][]" id="checkbox15_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[15]">
</td>
            </tr>
			<tr>
                <td><strong>2.9</strong></td>
                <td><strong> Hand Railings are provided around the platform, with the exception of any access gate or door. Hand railings shall have the clearance of not less than 1.5” (39 mm) between the railings and any other structure.   </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(4)(-c)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox16_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox16_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[16][]" id="checkbox16_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[16]">
</td>
            </tr>
			<tr>
                <td><strong>2.10</strong></td>
                <td><strong> Flooring with a slip-resistant surface and provisions to facilitate the free drainage of fluids and that will stand the forces developed under proof load test. Flooring shall have no opening that will allow a sphere of 0.5” (13 mm) to pass through.   </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23 sec 1.1(5) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox17_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox17_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[17][]" id="checkbox17_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[17]">
</td>
            </tr>
			<tr>
                <td><strong>2.11</strong></td>
                <td><strong>  Synthetic webbing sling or natural synthetic fiber rope sling is not used for suspension systems.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.23 sec 1.1(10)(-e) </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox18_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox18_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[18][]" id="checkbox18_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[18]">
</td>
            </tr>
			
			<tr>
                <td><strong>2.12</strong></td>
                <td><strong>  Overhead protection if provided, shall allow for a clear view of the hoist equipment components directly overhead from any position in the platform. Any openings designed in the overhead protection shall not allow a sphere of 0.5” (13 mm) to pass through.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.23 sec 1.1(11)  </strong></td>
                <td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox19_1" value="PASS">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox19_2" value="FAIL">
</td>
<td class="checkbox-cell">
    <input type="checkbox" name="result[19][]" id="checkbox19_3" value="NA">
</td>
<td>
    <input type="text" name="checklist_remark[19]">
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
