<?php 
include_once('./get-checklist.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFTING BEAMS/SPREADER BARS </title>
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
            <strong>INSPECTION CHECKLIST FOR LIFTING BEAMS / SPREADER BARS </strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-1.7</td>
        <td>Revision 02</td>
        <td><b>Issue Date: </b>30/SEP/2020</td>
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
                <td colspan="3" style="text-align: center;"><strong>INSPECTION CHECKLIST FOR LIFTING BEAMS/SPREADER BARS  </strong></td>
				</tr>
            <tr>
                <td style="width: 25%; text-align: center;"><strong>FRM.0601-1.7</strong></td>
                <td style="width: 25%; text-align: center;"> <strong>Revision 02</strong></td>
                
                <td style="width: 25%; text-align: center;"> <strong>Issue Date: 30/SEP/2020</strong></td>
            </tr>
			</tbody>
			</table> -->
			
			</div>

        <h4>LIFTING BEAMS/SPREADER BARS</h4>
        <h4>ASME B30.20 – 2018     </h4>
	        
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
                    <th style="text-align: center;">MARKINGS, CONSTRUCTION & INSTALLATION</th>
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
                <td><strong> Documentation is available such as but not limited to; manufacturer test certificate, load test certificate, etc.  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.3.8.2 </strong></td>
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
                <td><strong>  Lifter has an identification number / asset number marked on it.  </strong></td>
				<td style="text-align: center;"><strong>ASME B30.20 sec 1.2.1 (b)  </strong></td>
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
                <td><strong> Lifter has the information data plate bearing the Manufacturer Name, Type/Model Number, Serial Number, & Year of manufacture.    </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.2.1 (b)   </strong></td>
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
                <td><strong> Lifter’s Weight is marked. </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.20 sec 1.2.1 (b)(3)  </strong></td>
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
                <td><strong> Lifter’s SWL (Rated Load) is prominently marked on each side.</strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.2.1 (b)(6)  </strong></td>
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
                <td><strong>   Structural member has no signs of deformation, cracks, or excessive wear  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.3.3(a) </strong></td>
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
                <td><strong> Pad eye lifting lug has no signs of excessive wear </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.20 sec 1.3.4(d)  </strong></td>
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
                <td><strong>Pad eye weldments have no signs of cracks  </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.3.4(a)   </strong></td>
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
                <td><strong> Slings when employed shall met ASME B30.9 </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.20 sec 1.2.2(e)   </strong></td>
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
                <td><strong> Hooks when employed shall met ASME B30.10 </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.2.2(f)   </strong></td>
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
                <td><strong> Rigging Hardware when employed shall met ASME B30.26 </strong></td>
				<td style="text-align: center;"><strong>  ASME B30.20 sec 1.2.2(g)  </strong></td>
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
                <td><strong> Lifter is operated by a qualified person. </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20
Sec 1.4.2(a to c)
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
                <td><strong>1.13</strong></td>
                <td><strong> Inspection Sticker is posted prominently on the Lifter. </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.3.6 & sec 1.2.3(a)
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
                <td><strong>1.14</strong></td>
                <td><strong> Previous inspection report is available. </strong></td>
				<td style="text-align: center;"><strong> ASME B30.20 sec 1.2.3(a)
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
