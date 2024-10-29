<?php 
include_once('../../../../file/config.php'); // include your database connection

// Check if checklist_type parameter is set in the URL, use 'wheel-loader' as default for testing
$checklist_type = isset($_GET['checklist_type']) ? $_GET['checklist_type'] : 'wheel-loader';

// Debug line to check the checklist_type
echo "Checklist Type: " . htmlspecialchars($checklist_type) . "<br>";

if (!empty($checklist_type)) {
    // SQL query to fetch data from the 'checklist_information' table based on checklist type
    $query = "SELECT * FROM checklist_information WHERE checklist_type = '$checklist_type';";
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cheklist_no = $row['checklist_id'];  // Fetch record into $row array
    } else {
        echo "No record found!";
        $row = []; // Initialize as an empty array if no record found
    }
} else {
    echo "No checklist type provided!";
    $row = []; // Initialize as an empty array if checklist type is not provided
}

//fetch checklist
// Example checklist ID to fetch
$checklist_no = $_GET['checklist_no'] ?? null; // Assuming checklist_no is passed via GET

// Initialize variables
$selected_results = [];
$db_remark = '';

if ($checklist_no) {
    // Fetch checklist data
    $stmt = $conn->prepare("SELECT result, checklist_remark FROM checklist_results WHERE checklist_id = ?");
    $stmt->bind_param("i", $checklist_no);
    $stmt->execute();
    $stmt->bind_result($db_result, $db_remark);
    $stmt->fetch();
    $stmt->close();

    // Debugging output
    echo "Database Result: " . htmlspecialchars($db_result) . "<br>";
    echo "Database Remark: " . htmlspecialchars($db_remark) . "<br>";

    // Convert the result to an array for easy checking
    $selected_results = explode(",", $db_result);
    $chek_remark = explode(",", $db_remark);
} else {
    echo "Checklist ID is required.";
    exit;
}



// $fetchLang = mysqli_query($conn, "SELECT * FROM checklist_results WHERE checklist_id = $checklist_no");
// if (mysqli_num_rows($fetchLang) > 0) {
//     $result = mysqli_fetch_assoc($fetchLang);
//     $checked_arr = explode(", ", $result['result']);
//     $chek_remark = explode(",", $result['checklist_remark']);
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL </title>
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
            <img src="../../../logo.png"  alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
        </td>
        <td colspan="3" class="no-border">
            <span class="main-title">CRANE INSPECTION & MAINTENANCE SERVICES</span><br>
            A DIVISION OF AL-KHOBAR GATE INTERNATIONAL TRADING EST.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="">
            <strong>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.5</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR STORAGE RETRIEVAL </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.5</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>STORAGE RETRIEVAL</h4>
        <h4> ASME B30.13-2017   </h4>
        
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
                    <th style="text-align: center;">N/A</th>
                    <th> </th>
                </tr>
				</thead>
 
                <tbody>

            <tr>
                <td><strong>1.1</strong></td>
                <td><strong>Equipment documentation is available</strong></td>
                <td style="text-align: center;"><strong> ASME B30.13 sec.2.1.5  </strong></td>
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
                <td><strong> Previous inspection reports are checked </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.2.1.5  </strong></td>

                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[1][]" id="checkbox4" value="PASS" 
        <?php echo $selected_results[1]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[1][]" id="checkbox5" value="FAIL" 
        <?php echo $selected_results[1]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[1][]" id="checkbox6" value="NA" 
        <?php echo $selected_results[1]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[1]" value="<?php echo $chek_remark[1];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.3</strong></td>
                <td><strong> Rated load is clearly marked and visible to the operator </strong></td>
				<td style="text-align: center;"><strong> CIMS-QHSE-06 (13.1.1.1)  </strong></td>
              
                <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[1][]" id="checkbox7" value="PASS" 
        <?php echo $selected_results[2]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="checked_arr[1][]" id="checkbox8" value="FAIL" 
        <?php echo $selected_results[2]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox9" value="NA" 
        <?php echo $selected_results[2]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[1]" value="<?php echo $chek_remark[2];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.4</strong></td>
                <td><strong> Warning and cautionary labels are affixed at aisle entrance points or access positions and are durable and legible </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec. 1.1.2 </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox10" value="PASS" 
        <?php echo $selected_results[3]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox11" value="FAIL" 
        <?php echo $selected_results[3]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox12" value="NA" 
        <?php echo $selected_results[3]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[1]" value="<?php echo $chek_remark[3];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.5</strong></td>
                <td><strong> Clearances and tolerances within the system are as determined by the manufacturer or user (specifications) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec.1.2  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox13" value="PASS" 
        <?php echo $selected_results[4]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox14" value="FAIL" 
        <?php echo $selected_results[4]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox15" value="NA" 
        <?php echo $selected_results[4]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[1]" value="<?php echo $chek_remark[4];?>" disabled>
    </td>
            </tr>
            <tr>
                <td><strong>1.6</strong></td>
                <td><strong> A fire extinguisher with minimum 10BC rating is available (in the cab) </strong></td>
				<td style="text-align: center;"><strong> ASME B30.13 sec..1.4.3  </strong></td>
                <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox16" value="PASS" 
        <?php echo $selected_results[5]=="PASS"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]"  id="checkbox17" value="FAIL" 
        <?php echo $selected_results[5]=="FAIL"?'checked':''; ?>> 
    </td>
    <td class="checkbox-cell">
        <input type="checkbox" name="result[1][]" id="checkbox18" value="NA" 
        <?php echo $selected_results[5]=="NA"?'checked':''; ?>> 
    </td>
    <td>
        <input type="text" name="remarks[1]" value="<?php echo $chek_remark[5];?>" disabled>
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
                <td><input name="remarks" ></td>
                <th>SIGNATURE & DATE:</th>
                <td><input name="remarks" ></td>
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
