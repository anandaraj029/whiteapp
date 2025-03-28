<?php
include_once('./get-checklist.php');
// Ensure $row is accessible
if (!isset($row) || empty($row)) {
    echo "No checklist data available.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISUAL INSPECTION CHECKLIST FOR ARC WELDING EQUIPMENT </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <style>
        .large-checkbox {
            width: 20px;
            height: 20px;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="w-100">
                <tr>
                    <td rowspan="4" class="logo-cell ">
                        <img src="../../logo.png" alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
                    </td>
                    <td colspan="3" class="no-border">
                        <span class="main-title">CRANE INSPECTION & MAINTENANCE SERVICES</span><br>
                        A DIVISION OF AL-KHOBAR GATE INTERNATIONAL TRADING EST.
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="">
                        <strong>INSPECTION CHECKLIST FOR ARC WELDING EQUIPMENT</strong>
                    </td>
                </tr>
                <tr>
                    <td>FRM.0601-1.16</td>
                    <td>Revision 01</td>
                    <td>Issue Date: 28/JAN/2021</td>
                </tr>
                <tr>
                    <td class="left-align">Prepared By<br>Operations Manager</td>
                    <td class="left-align">Reviewed & Approved By<br>Managing Director</td>
                    <td><img src="../../code.png" width="80px" height="80px" alt="" /></td>
                </tr>
            </table>
        </div>

        <h4>ARC WELDING EQUIPMENT </h4>
        <h4>BS EN 60974-4:2007 </h4>

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
                    <td><strong> <?php echo htmlspecialchars($row['inspected_by']); ?></strong></td>
                </tr>
                <tr>
                    <th>LOCATION</th>
                    <td><strong> <?php echo htmlspecialchars($row['location']); ?></strong></td>
                    <th>STICKER NO.</th>
                    <td><strong> <?php echo htmlspecialchars($row['sticker_no']); ?></strong></td>
                </tr>
                <tr>
                    <th>EQUIPMENT NO</th>
                    <td><strong> <?php echo htmlspecialchars($row['crane_asset_no']); ?></strong></td>
                    <th>EQUIP. SERIAL NO.</th>
                    <td><strong> <?php echo htmlspecialchars($row['crane_serial_no']); ?></strong></td>
                </tr>
            </table>
        </div>



        <form method="post" action="./update_checklist.php" id="checklistForm" onsubmit="saveClientDetails()">
            <input type="hidden" name="checklist_no" value="<?php echo $row['checklist_id'] ?>" />

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center;">S.N</th>
                            <th style="text-align: center;">ACCEPTANCE CRITERIA</th>
                            <th style="text-align: center;" colspan="3">RESULT</th>
                            <th style="text-align: center;">REMARKS/ RECOMMENDATIONS</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">1</th>
                            <th style="text-align: center;">REQUIRED DOCUMENTS </th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>1.1</strong></td>
                            <td><strong>Owner’s Manual or Technical Manual.</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[1][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[1][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[1][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[1]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>1.2</strong></td>
                            <td><strong>Crane Log Book Records. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[2][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[2][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[2][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[2]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.3</strong></td>
                            <td><strong>Preventive Maintenance Schedule or Planned Maintenance as per Manufacturer’s recommendation records.
                                </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[3][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[3][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[3][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[3]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.4</strong></td>
                            <td><strong>Crane Maintenance and Repair Records.</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[4][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[4][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[4][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[4]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>1.5</strong></td>
                            <td><strong> Slew/Swing Gear and Pinion Clearances Report.
                                </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[5][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[5][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[5][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[5]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>1.6</strong></td>
                            <td><strong> Operator’s Daily Pre-Operational Inspection Checklists.
                                </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[6][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[6][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[6][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[6]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.7</strong></td>
                            <td><strong> Previous Inspection Reports are available & deficiencies were already rectified.</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[7][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[7][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[7][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[7]">
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">2</th>
                            <th style="text-align: center;">CERTIFICATES</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>

                        <tr>
                            <td><strong>2.1</strong></td>
                            <td><strong>Crane Class Certificates.</strong></td>
                            <!-- <td style="text-align: center;"><strong> </strong></td> -->
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[8][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[8][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[8][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[8]">
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">2.2</th>
                            <th style="text-align: center;">ROPE Manufacturer’s Test Certificates</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>

                        <tr>
                            <td><strong>2.2.1</strong></td>
                            <td><strong> Main Load Hoist Rope Ø = 36 mm </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[9][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[9][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[9][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[9]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.2.2</strong></td>
                            <td><strong> No. 1 Auxiliary Load Hoist Rope Ø = 32 mm </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[10][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[10][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[10][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[10]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.2.3 </strong></td>
                            <td><strong>No. 2 Auxiliary Hoist Rope
                                </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[11][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[11][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[11][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[11]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.2.4</strong></td>
                            <td><strong>Boom Hoist Rope</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[12][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[12][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[12][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[12]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.2.5</strong></td>
                            <td><strong> Pendant Rope </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[13][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[13][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[13][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[13]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.3</strong></td>
                            <td><strong> Crane Load Test Certificates. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[14][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[14][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[14][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[14]">
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: center;">2.4</th>
                            <th style="text-align: center;">NDT/MPI Certificates:</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> REMARKS / RECOMMENDATIONS</th>
                        </tr>

                        <tr>
                            <td><strong>2.4.1</strong></td>
                            <td><strong>Crane Structure Welds </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[15][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[15][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[15][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[15]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.4.2</strong></td>
                            <td><strong>Main Hook Blocks </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[16][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[16][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[16][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[16]">
                            </td>
                        </tr>



                        <tr>
                            <td><strong>2.4.3 </strong></td>
                            <td><strong> Auxiliary Hook Blocks </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[17][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[17][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[17][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[17]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.5</strong></td>
                            <td><strong> Operator Certificate for the type/model of crane. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[18][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[18][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[18][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[18]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.6 </strong></td>
                            <td><strong>LMI/RCL/SLI/AML Calibration Certificates. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[19][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[19][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[19][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[19]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.7 </strong></td>
                            <td><strong>Boom Rocking Test Certificates. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[20][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[20][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[20][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[20]">
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">3 </th>
                            <th style="text-align: center;">MARKING AND SAFETY DECALS</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> REMARKS / RECOMMENDATIONS</th>
                        </tr>

                        <tr>
                            <td><strong>3.1 </strong></td>
                            <td><strong>Crane asset number/identification is stenciled prominently.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[21][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[21][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[21][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[21]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3.2</strong></td>
                            <td><strong>Crane’s SWL is prominently stenciled/marked.</strong></td>
                            <!-- <td style="text-align: center;"><strong> </strong></td> -->
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[22][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[22][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[22][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[22]">
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">3.3 </th>
                            <th style="text-align: center;">Hook Blocks’ SWL and weights are stenciled on the items. </th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> REMARKS / RECOMMENDATIONS</th>
                        </tr>

                        <tr>
                            <td><strong>3.3.1 </strong></td>
                            <td><strong>Main Hook Block </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[23][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[23][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[23][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[23]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.3.2 </strong></td>
                            <td><strong>Auxiliary Hook Block</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[24][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[24][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[24][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[24]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.4 </strong></td>
                            <td><strong> WARNING SIGN: Operator Should Not Rely Solely on Any Automatic Device as a Substitute for Safe Operating Practice, is posted inside the cabin’s wall or control panel.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[25][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[25][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[25][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[25]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.5 </strong></td>
                            <td><strong>CRANE’S DATA PLATE (Crane Manufacturer Name, Model, Serial Number, and Year of Manufacture) is available and posted or stamped on the crane structure.
                                </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[26][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[26][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[26][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[26]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3.6 </strong></td>
                            <td><strong>Warning Decal stating: “Warning! Switch Limit must be tested before the start of Lifting Operation and NO Personnel is allowed to By-pass the Crane Limit at any time.
                                </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[27][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[27][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[27][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[27]">
                            </td>
                        </tr>



                        <tr>
                            <td><strong>3.7</strong></td>
                            <td><strong> Hand signal decal is posted on the pedestal or mast and cabin. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[28][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[28][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[28][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[28]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.8</strong></td>
                            <td><strong>Load rating charts and range diagrams are posted on the wall inside the cabin. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[29][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[29][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[29][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[29]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3.9</strong></td>
                            <td><strong>Labels of the directional control levers are marked legibly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[30][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[30][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[30][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[30]">
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">4</th>
                            <th style="text-align: center;">VISUAL INSPECTION & FUNCTIONAL TEST</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>

                        <tr>
                            <td><strong>4.1</strong></td>
                            <td><strong>BOOM STRUCTURE: There have no signs of excessive wear in the boom pivot shafts, boom cylinder anchor bushings & shafts, & boom telescopic wear surfaces & strips/pads. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[31][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[31][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[31][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[31]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong> 4.1.1 </strong></td>
                            <td><strong>Main Boom </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[32][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[32][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[32][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[32]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.1.2 </strong></td>
                            <td><strong> Lattice Boom: Chords, Lacings, Splices, and bridle have no bent, corroded, deformed, damaged, and dents. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[33][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[33][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[33][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[33]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.1.3 </strong></td>
                            <td><strong>Knuckle Boom </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[34][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[34][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[34][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[34]">
                            </td>
                        </tr>



                        <tr>
                            <td><strong>4.2 </strong></td>
                            <td><strong>The boom assembly has no signs of corrosion, distortion, deformation, cracks, & wear. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[35][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[35][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[35][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[35]">
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">4.3</th>
                            <th style="text-align: center;">HYDRAULIC CYLINDERS are properly working and no signs of leakages; There is no noticeable boom dropping:</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>




                        <tr>
                            <td><strong>4.3.1 </strong></td>
                            <td><strong>Boom Lift </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[36][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[36][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[36][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[36]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.3.2</strong></td>
                            <td><strong> Boom Telescopic </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[37][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[37][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[37][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[37]">
                            </td>
                        </tr>



                        <tr>
                            <td><strong>4.3.3 </strong></td>
                            <td><strong>Boom Articulating </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[38][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[38][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[38][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[38]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.4 </strong></td>
                            <td><strong>The HOLDING VALVES of boom lifting, telescoping, and articulating/ knuckling are in good working condition and have no signs of boom dropping. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[39][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[39][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[39][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[39]">
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">4.5</th>
                            <th style="text-align: center;">HOISTING OPERATION: Properly working including their brakes.</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>


                        <tr>
                            <td><strong>4.5.1 </strong></td>
                            <td><strong>Boom Hoist </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[40][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[40][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[40][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[40]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>4.5.2 </strong></td>
                            <td><strong>Main Load Hoist </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[41][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[41][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[41][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[41]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.5.3 </strong></td>
                            <td><strong>Auxiliary Load Hoist </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[42][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[42][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[42][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[42]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.6 </strong></td>
                            <td><strong>No leakages are visible on the hydraulic hoses, fittings, valves, & manifolds. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[43][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[43][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[43][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[43]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.7 </strong></td>
                            <td><strong>Nothing was deformed on the tubing, fittings, & other related components. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[44][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[44][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[44][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[44]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.8 </strong></td>
                            <td><strong>Boom angle indicator is provided and working properly.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[45][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[45][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[45][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[45]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.9 </strong></td>
                            <td><strong>BOOM BACK STOPS: Fixed bumper, Shock absorbing bumper, or Hydraulic bumper, is provided and in good condition. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[46][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[46][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[46][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[46]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.10 </strong></td>
                            <td><strong>WINCH DRUM’S LOCK (PAWLS) is in good condition & properly functioning (as applicable): </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[47][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[47][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[47][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[47]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.10.1 </strong></td>
                            <td><strong>Boom Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[48][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[48][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[48][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[48]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.10.2 </strong></td>
                            <td><strong> Main Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[49][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[49][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[49][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[49]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.10.3 </strong></td>
                            <td><strong>Auxiliary Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[50][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[50][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[50][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[50]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.11 </strong></td>
                            <td><strong>Automatic Boom Back Stops: Maximum boom angle is 82 degrees. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[51][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[51][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[51][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[51]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.12 </strong></td>
                            <td><strong>Automatic stop limit for minimum boom angle is 9.32 degrees. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[52][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[52][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[52][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[52]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.13 </strong></td>
                            <td><strong>Minimum Boom Length is 37.9 m <br> Maximum Boom Length is 39.9 m </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[53][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[53][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[53][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[53]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.14 </strong></td>
                            <td><strong>Boom cradle is provided and can secure the boom at rest. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[54][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[54][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[54][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[54]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.15</strong></td>
                            <td><strong>Sheaves are free from deformation, dent, bent, or damage and their bearings sufficiently lubricated. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[55][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[55][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[55][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[55]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>4.16</strong></td>
                            <td><strong>Aviation or pilot light is provided and is working. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[56][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[56][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[56][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[56]">
                            </td>
                        </tr>



                        <tr>
                            <th style="text-align: center;">5</th>
                            <th style="text-align: center;">CRANE STRUCTURE AND SWING COMPONENTS</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>

                        <tr>
                            <td><strong>5.1</strong></td>
                            <td><strong>Base Structure/Pedestal/mast has no signs of loose bolts and fasteners.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[57][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[57][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[57][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[57]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>5.2 </strong></td>
                            <td><strong>Base Structure/Pedestal/mast’s welds and joints are free from corrosion and cracks.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[58][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[58][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[58][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[58]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>5.3 </strong></td>
                            <td><strong>Pins, bearings, shafts, gears, and locking devices are free from distortion, cracks and corrosion. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[59][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[59][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[59][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[59]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.4</strong></td>
                            <td><strong>Swing brakes operate and can restrict further movement of the rotating structure. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[60][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[60][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[60][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[60]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.5</strong></td>
                            <td><strong>Swing positive locking device is provided and can lock the structure from further movement.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[61][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[61][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[61][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[61]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.6 </strong></td>
                            <td><strong>Swing brake is adjustable to compensate its wear. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[62][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[62][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[62][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[62]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.7 </strong></td>
                            <td><strong>All swing moving parts are sufficiently lubricated. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[63][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[63][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[63][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[63]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.8 </strong></td>
                            <td><strong>Platforms and walkways are skid resistant. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[64][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[64][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[64][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[64]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>5.9 </strong></td>
                            <td><strong>Access ladders, & guard rails are free from rust, damage, & corrosion </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[65][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[65][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[65][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[65]">
                            </td>
                        </tr>



                        <tr>
                            <th style="text-align: center;">6 </th>
                            <th style="text-align: center;">MACHINERY POWER, ELECTRICAL COMPONENTS & HYDRAULIC COMPONENTS</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>


                        <tr>
                            <td><strong>6.1 </strong></td>
                            <td><strong>Work areas, companion ways, access ladders, are equipped with anti-slip surface materials. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[66][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[66][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[66][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[66]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.2</strong></td>
                            <td><strong> Electrical wirings and related equipment are free of damages. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[67][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[67][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[67][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[67]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.3 </strong></td>
                            <td><strong>Manholes and hatches’ covers are provided to protect personnel from accidental fall. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[68][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[68][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[68][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[68]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4 </strong></td>
                            <td><strong>Electrical and hydraulic motors & pumps are in good working condition. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[69][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[69][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[69][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[69]">
                            </td>
                        </tr>



                        <tr>
                            <td><strong>6.5 </strong></td>
                            <td><strong>Hydraulic hoses, fittings, tubes, and manifold joints have no evidence of leakages and not damage. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[70][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[70][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[70][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[70]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.6</strong></td>
                            <td><strong>Hydraulic/pneumatic cylinders, pumps and motors have no leaks and working properly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[71][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[71][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[71][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[71]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.7</strong></td>
                            <td><strong>Engine power driven motors and pumps are working properly and have no signs of leaks. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[72][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[72][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[72][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[72]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.8</strong></td>
                            <td><strong>Machinery compartment is free from spills and obstruction. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[73][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[73][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[73][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[73]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.9</strong></td>
                            <td><strong>Fire extinguisher is provided in the compartment with minimum rating of 10BC. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[74][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[74][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[74][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[74]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.10</strong></td>
                            <td><strong>An emergency lowering system, if provided, shall be checked for proper function. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[75][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[75][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[75][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[75]">
                            </td>
                        </tr>



                        <tr>
                            <th style="text-align: center;">7 </th>
                            <th style="text-align: center;">CABIN</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>


                        <tr>
                            <td><strong>7.1 </strong></td>
                            <td><strong>Portable fire extinguisher is provided. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[76][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[76][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[76][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[76]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>7.2 </strong></td>
                            <td><strong>Toolbox with basic tools are available. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[77][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[77][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[77][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[77]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>7.3 </strong></td>
                            <td><strong>An Emergency stop button shall be available and working effectively. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[78][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[78][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[78][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[78]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>7.4 </strong></td>
                            <td><strong>Wipers are installed and working properly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[79][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[79][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[79][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[79]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.5 </strong></td>
                            <td><strong>An audible warning device is provided for any errors in the system. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[80][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[80][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[80][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[80]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.6 </strong></td>
                            <td><strong>Cabin has a good housekeeping. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[81][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[81][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[81][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[81]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.7 </strong></td>
                            <td><strong>Cabin door is open outward or sliding backward. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[82][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[82][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[82][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[82]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.8</strong></td>
                            <td><strong> Windshield is of Safety glazing glass. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[83][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[83][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[83][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[83]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.9 </strong></td>
                            <td><strong>Operator seat condition (torn seat or back cushions). </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[84][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[84][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[84][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[84]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.10 </strong></td>
                            <td><strong>Cabin A/C is provided and is working. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[85][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[85][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[85][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[85]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.11 </strong></td>
                            <td><strong>The Installed anemometer is working. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>7.12 </strong></td>
                            <td><strong>The installed view camera is working </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>7.13 </strong></td>
                            <td><strong> All applicable indicators like but not limited to; oil or water temperature gauge, hydraulic oil pressure gauge, etc. are working correctly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align: center;">8</th>
                            <th style="text-align: center;">HOIST ROPES</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th>REMARKS / RECOMMENDATIONS </th>
                        </tr>


                        <tr>
                            <td><strong>8.1.1 </strong></td>
                            <td><strong>Boom Hoist </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
                            </td>
                        </tr>

                        <tr>
                            <td><strong>8.1.2 </strong></td>
                            <td><strong>Main Load Hoist </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
                            </td>
                        </tr>


                        <tr>
                            <td><strong>8.1.3 </strong></td>
                            <td><strong>Auxiliary Load Hoist </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox4" value="PASS" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox5" value="FAIL" class="large-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="result[86][]" id="checkbox6" value="NA" class="large-checkbox">
                            </td>
                            <td>
                                <input type="text" name="checklist_remark[86]">
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
                                <textarea style="width: 100%; height: 100%; box-sizing: border-box;" name="recommendations">

                                </textarea>
                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>




            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 25%;">INSPECTOR’S NAME:</th>
                        <td style="width: 25%;">
                            <strong>
                                <?php echo htmlspecialchars($row['inspected_by']); ?>
                            </strong>
                        </td>
                        <th style="width: 25%;">CLIENT’S REP. NAME:</th>
                        <td style="width: 25%;" onclick="openModal()">
                            <span id="clientNameDisplay">Click to enter</span>
                        </td>
                    </tr>
                    <tr>
                        <th>SIGNATURE & DATE:</th>
                        <td>
                            <?php
                            if (!empty($row['inspected_by'])) {
                                $inspector_name = $row['inspected_by'];

                                // Query inspectors table
                                $sql = "SELECT signature_photo FROM inspectors WHERE inspector_name = ?";
                                $stmt = $conn->prepare($sql);

                                if ($stmt) {
                                    $stmt->bind_param("s", $inspector_name);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $inspector = $result->fetch_assoc();
                                        $image_path = '../../../inspector/uploads/' . preg_replace('/\s+/', '_', strtolower($inspector_name)) . '/images/' . $inspector['signature_photo'];

                                        if (file_exists($image_path)) {
                                            echo "<img src='$image_path' alt='Inspector Signature' style='max-width: 100px; max-height: 50px;'>";
                                        } else {
                                            echo "Image not available.";
                                        }
                                    } else {
                                        echo "Inspector not found.";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Error preparing statement: " . $conn->error;
                                }
                            } else {
                                echo "Inspector's name is not available.";
                            }
                            ?>
                        </td>
                        <th>SIGNATURE & DATE:</th>
                        <td style="width: 25%;" onclick="openModal()">
                            <img id="clientSignatureDisplay" src="" alt="Click to add signature" style="max-width: 100px; max-height: 50px; cursor: pointer;">
                        </td>
                    </tr>
                </table>
            </div>


            <!-- Modal for Client's Name and Signature -->
            <div id="clientSignatureModal" class="modal" style="display: none;">
                <div class="modal-content" style="padding: 20px; width: 400px; margin: auto; background: #fff; border-radius: 8px;">
                    <span class="close" onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
                    <h3>Enter Client's Details</h3>

                    <div>
                        <label for="clientName">Client's Name:</label>
                        <input type="text" id="clientName" name="client_name" required style="width: 100%; padding: 5px; margin-bottom: 15px;">
                    </div>
                    <div>
                        <label>Signature:</label>
                        <canvas id="signaturePad" style="border: 1px solid #ccc; width: 100%; height: 150px;"></canvas>
                        <button type="button" onclick="clearSignature()" style="margin-top: 10px;">Clear Signature</button>
                    </div>
                    <div style="margin-top: 15px;">
                        <button type="button" onclick="saveClientDetails()">Save</button>
                    </div>
                </div>
            </div>


            <input type="hidden" name="client_name" id="hiddenClientName">
            <input type="hidden" name="client_signature" id="hiddenClientSignature">


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <?php
    // Close the connection at the very end
    $conn->close();
    ?>


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
        document.addEventListener("DOMContentLoaded", function() {
            const checklistForm = document.getElementById("checklistForm");

            if (checklistForm) {
                // Ensure only one checkbox is selected per row for the result field
                checklistForm.addEventListener("change", function(event) {
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



    <script>
        let signaturePad;

        // Ensure SignaturePad is loaded and ready
        function openModal() {
            if (typeof SignaturePad !== "undefined") {
                document.getElementById("clientSignatureModal").style.display = "block";

                const canvas = document.getElementById("signaturePad");
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;

                signaturePad = new SignaturePad(canvas);
            } else {
                console.error("SignaturePad library is not loaded.");
            }
        }

        function closeModal() {
            document.getElementById("clientSignatureModal").style.display = "none";
        }

        function clearSignature() {
            if (signaturePad) {
                signaturePad.clear();
            }
        }

        function saveClientDetails() {
            if (!signaturePad) {
                alert("Signature pad is not initialized. Please try again.");
                return;
            }

            if (signaturePad.isEmpty()) {
                alert("Please provide a signature.");
                return;
            }

            const clientName = document.getElementById("clientName").value;
            if (!clientName) {
                alert("Please enter the client's name.");
                return;
            }

            const signatureData = signaturePad.toDataURL(); // Base64 format
            document.getElementById("clientNameDisplay").innerText = clientName;
            document.getElementById("clientSignatureDisplay").src = signatureData;

            // Set hidden inputs for submission
            document.getElementById("hiddenClientName").value = clientName;
            document.getElementById("hiddenClientSignature").value = signatureData;

            closeModal();
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>