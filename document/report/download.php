<?php
require_once('../../vendor/autoload.php');

include_once('../../file/config.php'); // include your database connection

// Get the project ID from the query parameter
$project_id = $_GET['project_id'];

// Fetch the data based on the projectid
$sql = "SELECT * FROM reports WHERE project_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $project_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("No data found for the given project id.");
}

$stmt->close();
$conn->close();


use Mpdf\Mpdf;

// Load Bootstrap CSS
$bootstrapCSS = file_get_contents('../../assets/css/bootstrap.css');

// Your HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CIMS Report</title>

    <!-- Embedding Bootstrap CSS for mPDF compatibility -->
    <style>
        /* Bootstrap CSS */
        <?php echo file_get_contents('../../assets/bootstrap/css/bootstrap.min.css'); ?>

        /* Custom Styles */
        td {
            /* border: 2px solid #eee; */
            border: 1px solid black;
            padding-left: 10px;
            padding-bottom: 30px;
        }

        .checkbox input[type="checkbox"] {
            width: auto;
            opacity: 0.00000001;
            position: absolute;
            left: 0;
            margin-left: -20px;
        }

        .checkbox label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 31px;
            transition: transform 0.28s ease;
            border-radius: 3px;
        }

        .checkbox label:after {
            content: '';
            display: block;
            width: 35px;
            height: 14px;
            border-bottom: 2px solid #7bbe72;
            border-left: 2px solid #7bbe72;
            transform: rotate(-45deg) scale(0);
            transition: transform ease 0.25s;
            position: absolute;
            top: 0;
            left: 0;
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

        #printable {
            display: block;
        }

        @media print {
            table {
                page-break-inside: auto
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto
            }

            #non-printable {
                display: none;
            }

            #printable {
                display: block;
            }

            pre,
            blockquote {
                page-break-inside: avoid;
            }

            * {
                -webkit-print-color-adjust: exact;
            }
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

        canvas#signature-pad {
            background: #fff;
            width: 100%;
            height: 100%;
            cursor: crosshair;
        }

        button#clear {
            height: 100%;
            background: #4b00ff;
            border: 1px solid transparent;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        button#clear span {
            transform: rotate(90deg);
            display: block;
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
    <div class="container-fluid" style="page-break-before:always">
        <div class="report">
            <form method="POST" action="./view_report_fetch.php?viewid=">
                <div class="panel_s mtop20">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="../logo.png" alt="CIMS" width="90" height="120">
                            </div>
                            <div class="col-md-6">
                                <h3>Crane Inspection & Maintenance Services</h3>
                                <p>
                                <b>P.O.BOX 74007, AL- Khobar 31952, Saudi Arabia</b><br>
                                    <b>TEL.: 013 814 6861 - 013 814 6862 Ext.109 - Fax: 013 814 6863</b><br>
                                    <b>Email: office@cims.com.sa - info@cims.com.sa</b>                               </p>
                                
                            </div>
                            <div class="col-md-5">
                                <h4 style="font-size: 19px;" class="bold estimate-html-number" >Report No : 96421<span class="alert-success"></span></h4>
                                
                                
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                              
                            </div>
                            <div class="col-md-6">
                                
                                    <h4 style="font-size: 19px;">Heavy Equipment & Elevating / Lifting Equipment Inspection Report</h4>
                            </div>
                            <div class="col-md-5">
                                
                                <h4 style="font-size: 19px;">JRN:                                 
                                {$row['jrn']}    
                            
                            </h4>
                                
                            </div>
                            <!-- <div class="col-md-2">
                                <img src="../code.png" alt="CIMS" width="120" height="120">
                            </div> -->
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-8">
                            <h4 style="text-align: center;">Heavy Equipment & Elevating / Lifting Equipment Inspection Report</h4>
                            </div>
                            <div class="col-md-4">
                               
                                                            </div>
                            
                        </div> -->
                        <table style="border:1px solid black; width: 100%; height: 184px;">
                            <tbody>
                                <tr>
                                    <td colspan="2" rowspan="3" style="vertical-align: top;">
                                        <b>Client Company / Name & Address</b><br/>
                                    
                                        {$row['client_company_name']}<br/>
                                        {$row['client_company_address']}
                                        
                                    </td>
                                    <td><b>Manufacturer : </b><br/>
                                    {$row['manufacturer']}
                                </td>
                                    <td> <b> Equipment Identification Number:</b>
                                <br/>
                                {$row['equipment_id_no']}
                                
                                
                                </td>
                                    <td><b>Date of Inspection: </b>
                                
                                    {$row['date_of_inspection']}
                                
                                </td>
                                    
                                </tr>
                                <tr>
                                    <td><b>Model: </b>
                                    {$row['model']}
                                </td>
                                    <td><b> Equipment Serial Number : </b>
                                    {$row['equipment_serial_no']}
                                </td>
                                    <td><b>Next Inspection Due Date : </b>
                                    {$row['next_inspection_due_date']}
                                </td>
                                </tr>
                                <tr>
                                    <td  style="vertical-align: top;"> <b> Type:</b></td>
                                    <td style="vertical-align: top;" rowspan="2"> <b>
                                        Location:
                                    </b>
                                    {$row['location']}
                                    
                                </td>
                                    <td colspan="2">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <b>Inspection Status:</b>
        <div style="display: flex; flex-direction: column; margin-left: 20px;">
            <div>
                <label for="pass"><b>Passed</b></label>
                <input type="checkbox" id="pass" name="ins_result_pass" value="pass">
            </div>
            <div>
                <label for="fail"><b>Failed</b></label>
                <input type="checkbox" id="fail" name="ins_result_fail" value="fail">
            </div>
        </div>
    </div>
</td>



                                    
                                </tr>
                                <tr>
                                    <td> <b>Previous Sticker S.No.:</b><br/>
                                    {$row['prev_sticker_no']}
                                </td>
                                    <td><b>Issued by: </b><br/>
                                    {$row['issued_by']}
                                </td>
                                    <td><b>Capacity: </b><br/>
                                    {$row['capacity']}
                                </td>
                                    <td> <b>Sticker Number Issued:</b>
                                    {$row['sticker_number_issued']}
                                </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- <br> -->
                     <b>
                           Above Equipment was visually inspected in accordance with local and international standards. Deficiencies that require corrective actions are listed below. Specific repairs to correct each deficiency should be noted in the right column.
    </b>
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
                                            <tr>
                                                <td>1</td>
                                                <td>{$row['deficiency_1']}</td>
                                                <td>{$row['corrective_action_1']}</td>
                                                
                                                <!-- <td class="description">
                                                    <textarea class="notes" name="corrective" cols="65" rows="10"></textarea>
                                                </td>
                                                <td>
                                                    <textarea class="notes" name="action" cols="32" rows="10"></textarea>
                                                </td> -->
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>{$row['deficiency_2']}</td>
                                                <td>{$row['corrective_action_2']}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>{$row['deficiency_3']}</td>
                                                <td>{$row['corrective_action_3']}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>{$row['deficiency_4']}</td>
                                                <td>{$row['corrective_action_4']}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>{$row['deficiency_5']}</td>
                                                <td>{$row['corrective_action_5']}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>{$row['deficiency_6']}</td>
                                                <td>{$row['corrective_action_6']}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>

                                                <td style="width: 25%;">
                                                <b>
                                                Report Receiver's Name & Signature
    </b>    
                                            </td>
                                                <td>
                                                   <b> Contact Tel. & Mobile Number
    </b></td>
                                                <td>
                                                <b>Inspector Name & Signature<br>

                                                    Telephone No.: 013 814 6861 / 2 Ext. 109
    </b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                           <!-- <div class="col-md-12 estimate-html-note">
                                <p>When re-inspected, a complete copy of this report should be ready for review by the inspector.</p>
                                <div class="col-md-12" style="border:2px solid #d0cece;padding:10px;">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" checked style="zoom:2;">
                                            <label class="form-check-label" for="gridCheck">
                                                <h3>I agree to take full responsibility for this inspection
                                                    <span style="margin-left:30px;float:right;">اواوافق الى تحمل المسؤليه الكامله عن هذا الفحص</span>
                                                </h3>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        Receiver Name : <b></b><br>
                                        Badge : <b></b>
                                    </div>
                                    <div class="col-md-4">
                                        Inspection Date : <b></b><br>
                                        Signature : <b></b>
                                    </div>
                                    <div class="col-md-4">
                                        Issued By : <b></b><br>
                                        Signature : <b></b>
                                    </div>
                                </div> 
                            </div>-->
                        </div>
                        <br>
                        <!-- <center>
                            <p>This is a digital printout and does not require a signature.</p>
                        </center> -->
                        <br>
                        <div id="non-printable">
                            <button type="submit" class="btn btn-primary">Save as PDF</button>
                            <button type="button" class="btn btn-danger" onclick="window.print()">Print</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

HTML;

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); // 'L' for landscape
$mpdf->WriteHTML($html);
$mpdf->Output('report.pdf', 'D'); // 'D' to force download, use 'I' to inline view
