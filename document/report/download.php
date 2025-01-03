<?php
require_once('../../vendor/autoload.php');

include_once('../../file/config.php');  // Include your database connection file

// Ensure the project_id is provided
if (!isset($_GET['project_id'])) {
    die("Project ID not provided!");
}

$project_id = $_GET['project_id'];

// Fetch the record based on project_id
$query = "SELECT * FROM reports WHERE project_id = '$project_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $deficiencies = json_decode($row['deficiencies'], true); // Decode JSON into PHP array
} else {
    die("No record found for the provided project ID!");
}

// Start capturing output
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Inspection Report</title>
    <style>
        /* Include styles for the PDF */
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        h3, h4 { margin: 0; }
        td {
            /* border: 2px solid #eee; */
            border: 1px solid black;
            padding-left: 10px;
            /* padding-bottom: 30px; */
        }

    
        .checkbox input[type="checkbox"]:checked~label::after {
            transform: rotate(-45deg) scale(1);
        }

        .notes {
            background-attachment: local;
            background-image: linear-gradient(to right, white 10px, transparent 10px),
            linear-gradient(to left, white 10px, transparent 10px),
            repeating-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
            line-height: 31px;
        }


        .card {
            background-color: #242b75;
        }

        .fail {
            color: red;
        }

        .flex-row {
            display: flex;
        }

        .wrapper {
            border-right: 0;
        }


        /* Example: Adjusting Bootstrap columns for print */
@media print {
    .col-md-6, .col-md-5, .col-md-1 {
        float: left;
        width: auto;
    }
}


@media print {
        .row {
            display: flex;
            flex-wrap: nowrap;
        }
        .col-md-1,
        .col-md-6,
        .col-md-5 {
            flex: none;
            max-width: none;
        }
        .col-md-1 {
            width: 10%;
        }
        .col-md-6 {
            width: 60%;
        }
        .col-md-5 {
            width: 30%;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        h3, h4 {
            margin: 0;
            padding: 0;
        }
        p {
            margin: 0;
        }
    }


.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid black;
}


.table th, .table td {
    padding: 1rem;
    vertical-align: top;
    border-top: 1px solid black; 
}
    </style>
</head>
<body>
<div class="container-fluid " >
        <div class="report">
            <form method="POST">
                <div class="panel_s ">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="../logo.png" alt="CIMS" width="60" height="80">
                            </div>
                            <div class="col-md-6">
                                <h3>Crane Inspection & Maintenance Services</h3>
                                <p>
                                <b>P.O.BOX 74007, AL- Khobar 31952, Saudi Arabia</b><br>
                                    <b>TEL.: 013 814 6861 - 013 814 6862 Ext.109 - Fax: 013 814 6863</b><br>
                                    <b>Email: office@cims.com.sa - info@cims.com.sa</b>  <br>                             </p>
                                    <h4 style="font-size: 18px;margin-top:15px;">Heavy Equipment & Elevating / Lifting Equipment Inspection Report</h4>
                            </div>
                            <div class="col-md-3">
                                <h5 style="font-size: 16px;" class="bold " >
                                Report No: <?php echo htmlspecialchars($row['report_no']); ?><br>
                               JRN: <?php echo htmlspecialchars($row['jrn']); ?> <br>
                               <img src="../code.png" alt="CIMS" width="90" height="90" style="margin-top: -5px;">
                                   </h5>
                                  
                                
                            </div>
                            
                        </div>

                   
                        <table style="border:1px solid black; width: 100%; height: 154px;margin-top:-20px;">
                            <tbody>
                                <tr>
                                    <td colspan="2" rowspan="3" style="vertical-align: top;">
                                        <b>Client Company / Name & Address:</b> <?php echo htmlspecialchars($row['client_company_address']); ?></td>
                                    <td><b>Manufacturer : </b> <?php echo htmlspecialchars($row['manufacturer']); ?></td>
                                    <td> <b> Equipment Identification Number:</b> <?php echo htmlspecialchars($row['equipment_id_no']); ?></td>
                                    <td><b>Date of Inspection: </b><?php echo htmlspecialchars($row['date_of_inspection']); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td><b>Model: </b><?php echo htmlspecialchars($row['model']); ?></td>
                                    <td><b> Equipment Serial Number : </b> <?php echo htmlspecialchars($row['equipment_serial_no']); ?></td>
                                    <td><b>Next Inspection Due Date : </b> <?php echo htmlspecialchars($row['next_inspection_due_date']); ?></td>
                                </tr>
                                <tr>
                                    <td  style="vertical-align: top;"> <b> Type:</b></td>
                                    <td style="vertical-align: top;" rowspan="2"> <b>
                                        Location:
                                    </b><?php echo htmlspecialchars($row['location']); ?></td>
                                    <td colspan="2">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <b>Inspection Status:</b>
                                    <div style="display: flex; flex-direction: column; margin-left: 20px;">
                                        <div>
                                            <label for="pass"><b>Passed</b></label>
                                            <input type="checkbox" id="pass" name="ins_result_pass" value="pass" <?php // echo ($row['ins_result_pass'] == 'pass') ? 'checked' : ''; ?> disabled>
                                        </div>
                                        <div>
                                            <label for="fail"><b>Failed</b></label>
                                            <input type="checkbox" id="fail" name="ins_result_fail" value="fail" <?php // echo ($row['ins_result_fail'] == 'fail') ? 'checked' : ''; ?> disabled>
                                        </div>
                                    </div>
                                </div>
                            </td>


                                    
                                </tr>
                                <tr>
                                    <td> <b>Previous Sticker S.No.:</b><?php echo htmlspecialchars($row['prev_sticker_no']); ?></td>
                                    <td><b>Issued by: </b><?php echo htmlspecialchars($row['issued_by']); ?></td>
                                    <td><b>Capacity: </b><?php echo htmlspecialchars($row['capacity']); ?></td>
                                    <td> <b>Sticker Number Issued:</b><?php echo htmlspecialchars($row['sticker_number_issued']); ?></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- <br> -->
                         <p>
                     <b>
                           Above Equipment was visually inspected in accordance with local and international standards. Deficiencies that require corrective actions are listed below. Specific repairs to correct each deficiency should be noted in the right column.
                         </b></p>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                <table class="table items items-preview estimate-items-preview" style="border:1px solid black; width: 100%;"> 
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="description" style="text-align: center;">DEFICIENCIES</th>
                                            <th style="text-align: center;">CORRECTIVE ACTION TAKEN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                // Parse deficiencies and corrective actions into arrays
                                $deficiencies = explode("\n", trim($row['deficiency'] ?? ''));
                                $corrective_actions = explode("\n", trim($row['corrective_action'] ?? ''));

                                // Display each deficiency and action
                                foreach ($deficiencies as $index => $deficiency) {
                                    echo "<tr>
                                        <td style='width: 50px;'>" . ($index + 1) . "</td>
                                        <td style='height:170px; width:700px'>" . htmlspecialchars(trim($deficiency)) . "</td>
                                        <td>" . htmlspecialchars(trim($corrective_actions[$index] ?? 'N/A')) . "</td>
                                    </tr>";
                                }
                                ?>
                                </tbody>
                                </table>


                                    
                                </div>
                            </div>
                            </div>
                          
                           <div class="col-md-12 estimate-html-note">
                                <p>When re-inspected, a complete copy of this report should be ready for review by the inspector.</p>
                                <h4 style="padding: 5px;"> <input type="checkbox" style="padding-right: 5px;">I agree to take full responsibility for this inspection
                                                   <span> اواوافق الى تحمل المسؤليه الكامله عن هذا الفحص</span>
                                               </h4> 
                               
                                <div class="row">
                            <div class="col-md-12">
                            <table class="table table-responsive" style="width:100%";>
                            <tr>
                            <td>Report Receiver's Name & Signature</td>
                            <td>Contact Tel. / Mobile Number</td>
                            <td> Inspector Name & Signature</td>
                            </tr>
                            <tr>
                            <td><img src="../sign.jpg" alt="" width="70px" height="90px">Sathish Kumar</td>
                            <td><img src="../sign.jpg" alt="" width="70px" height="90px">Sathish Kumar</td>
                            <td><img src="../sign.jpg" alt="" width="70px" height="90px">Sathish Kumar</td>
                            </tr>

                            </table>
                            </div>
                                </div>

                             
                            </div>
                        </div>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$html = ob_get_clean();

// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Write HTML content to the PDF
$mpdf->WriteHTML($html);


// Output as a PDF
$mpdf->Output('inspection_report.pdf', 'D'); // Download the PDF


?>
