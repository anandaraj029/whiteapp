<?php
include_once('./view-fetch.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISUAL INSPECTION CHECKLIST FOR ARC WELDING EQUIPMENT </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../style.css" rel="stylesheet">


    <style>
        /* Hide elements with the "no-print" class when printing */
        @media print {
            .no-print {
                display: none !important;
            }
        }

        /* .large-checkbox {
    width: 20px;
    height: 20px;
} */
        /* Custom checkbox styling */
        .custom-checkbox {
            appearance: none;
            width: 24px;
            height: 26px;
            border: 2px solid #ccc;
            border-radius: 3px;
            display: inline-block;
            vertical-align: middle;
            margin: 0;
            outline: none;
            cursor: not-allowed;
            /* Indicates it's disabled */
            position: relative;
        }

        /* Checked state with blue background */
        /* .custom-checkbox:checked { */
        /* background-color: #007bff;  */
        /* Blue background */
        /* border-color: #007bff; */
        /* Match the border with the background */
        /* } */

        .custom-checkbox:checked::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 7px;
            width: 5px;
            height: 10px;
            border: 2px solid blue;
            /* Checkmark in blue */
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        /* Ensure styles are applied when printing */
        @media print {
            /* .custom-checkbox {
        border-color: #007bff;
        background-color: #007bff;
    } */

            .custom-checkbox:checked::after {
                border-color: blue;
            }
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
                    <th>EQUIP.SERIAL NO.:</th>
                    <td><strong> <?php echo htmlspecialchars($row['crane_serial_no']); ?></strong></td>
                </tr>
                <!-- <tr>
        <th>EQUIPMENT TYPE</th>
        <td><strong> <?php echo htmlspecialchars($row['equipment_type']); ?></strong></td>
        <th>CAPACITY (SWL)</th>
        <td><strong> <?php echo htmlspecialchars($row['capacity_swl']); ?></strong></td>
    </tr> -->

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
                            <th style="text-align: center;" colspan="3">RESULT</th>
                            <th style="text-align: center;">REMARKS/ RECOMMENDATIONS</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">1</th>
                            <th style="text-align: center;">REQUIRED DOCUMENTS</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> </th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td><strong>1.1</strong></td>
                            <td><strong> Owner’s Manual or Technical Manual. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[0] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[0] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[0] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[0]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>1.2</strong></td>
                            <td><strong>Crane Log Book Records. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[1] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[1] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[1] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[1]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.3</strong></td>
                            <td><strong>Preventive Maintenance Schedule or Planned Maintenance as per Manufacturer’s recommendation records. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[2] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[2] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[2] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[2]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.4</strong></td>
                            <td><strong>Crane Maintenance and Repair Records. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[3] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[3] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[3] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[3]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>1.5</strong></td>
                            <td><strong>Slew/Swing Gear and Pinion Clearances Report. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[4] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[4] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[4] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[4]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>1.6</strong></td>
                            <td><strong>Operator’s Daily Pre-Operational Inspection Checklists. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[5] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[5] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[5] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[5]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>1.7</strong></td>
                            <td><strong>Previous Inspection Reports are available & deficiencies were already rectified. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[6] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[6] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[6] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[6]; ?>" disabled>
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
                            <td><strong>Crane Class Certificates. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[7] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[7] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[7] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[7]; ?>" disabled>
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
                            <td><strong>Main Load Hoist Rope Ø = 36 mm</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[8] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[8] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[8] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[8]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.2.2</strong></td>
                            <td><strong>No. 1 Auxiliary Load Hoist Rope Ø = 32 mm </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[9] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[9] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[9] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[9]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>2.2.3</strong></td>
                            <td><strong>No. 2 Auxiliary Hoist Rope </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[10] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[10] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[10] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[10]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.2.4</strong></td>
                            <td><strong>Boom Hoist Rope </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[11] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[11] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[11] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[11]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.2.5</strong></td>
                            <td><strong>Pendant Rope</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[12] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[12] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[12] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[12]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>2.3</strong></td>
                            <td><strong> Crane Load Test Certificates. </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[13] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[13] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[13] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[13]; ?>" disabled>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[14] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[14] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[14] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[14]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.4.2</strong></td>
                            <td><strong>Main Hook Blocks </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[15] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[15] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[15] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[15]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.4.3</strong></td>
                            <td><strong>Auxiliary Hook Blocks </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[16] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[16] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[16] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[16]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.5</strong></td>
                            <td><strong>Operator Certificate for the type/model of crane.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[17] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[17] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[17] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[17]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.6</strong></td>
                            <td><strong>LMI/RCL/SLI/AML Calibration Certificates. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[18] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[18] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[18] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[18]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2.7</strong></td>
                            <td><strong>Boom Rocking Test Certificates.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[19] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[19] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[19] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[19]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">3</th>
                            <th style="text-align: center;">MARKING AND SAFETY DECALS</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> REMARKS / RECOMMENDATIONS</th>
                        </tr>

                        <tr>
                            <td><strong>3.1</strong></td>
                            <td><strong>Crane asset number/identification is stenciled prominently.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[20] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[20] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[20] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[20]; ?>" disabled>
                            </td>
                        </tr>



                        <tr>
                            <td><strong>3.2</strong></td>
                            <td><strong> Crane’s SWL is prominently stenciled/marked.</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[21] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[21] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[21] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[21]; ?>" disabled>
                            </td>
                        </tr>



                        <tr>
                            <th style="text-align: center;">3.3</th>
                            <th style="text-align: center;">Hook Blocks’ SWL and weights are stenciled on the items. </th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> REMARKS / RECOMMENDATIONS</th>
                        </tr>

                        <tr>
                            <td><strong>3.3.1</strong></td>
                            <td><strong>Main Hook Block </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[22] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[22] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[22] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[22]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3.3.2</strong></td>
                            <td><strong>Auxiliary Hook Block</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[23] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[23] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[23] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[23]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>3.4</strong></td>
                            <td><strong> WARNING SIGN: Operator Should Not Rely Solely on Any Automatic Device as a Substitute for Safe Operating Practice, is posted inside the cabin’s wall or control panel.</strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[24] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[24] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[24] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[24]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.5</strong></td>
                            <td><strong>CRANE’S DATA PLATE (Crane Manufacturer Name, Model, Serial Number, and Year of Manufacture) is available and posted or stamped on the crane structure.</td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[25] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[25] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[25] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[25]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>3.6</strong></td>
                            <td><strong>Warning Decal stating: “Warning! Switch Limit must be tested before the start of Lifting Operation and NO Personnel is allowed to By-pass the Crane Limit at any time.
                                </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[26] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[26] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[26] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[26]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>3.7</strong></td>
                        <td><strong> Hand signal decal is posted on the pedestal or mast and cabin. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[27] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[27] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[27] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[27]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>3.8</strong></td>
                        <td><strong>Load rating charts and range diagrams are posted on the wall inside the cabin. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[28] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[28] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[28] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[28]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>3.9</strong></td>
                        <td><strong>Labels of the directional control levers are marked legibly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[29] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[29] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[29] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[29]; ?>" disabled>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[30] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[30] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[30] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[30]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong> 4.1.1 </strong></td>
                        <td><strong>Main Boom </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[31] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[31] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[31] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[31]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>4.1.2 </strong></td>
                        <td><strong> Lattice Boom: Chords, Lacings, Splices, and bridle have no bent, corroded, deformed, damaged, and dents. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[32] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[32] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[32] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[32]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>4.1.3 </strong></td>
                        <td><strong>Knuckle Boom </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[33] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[33] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[33] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[33]; ?>" disabled>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[34] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[34] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[34] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[34]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>4.3.2</strong></td>
                        <td><strong> Boom Telescopic </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[35] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[35] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[35] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[35]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>4.3.3 </strong></td>
                        <td><strong>Boom Articulating </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[36] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[36] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[36] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[36]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.4 </strong></td>
                        <td><strong>The HOLDING VALVES of boom lifting, telescoping, and articulating/ knuckling are in good working condition and have no signs of boom dropping. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[37] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[37] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[37] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[37]; ?>" disabled>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[38] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[38] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[38] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[38]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.5.2 </strong></td>
                        <td><strong>Main Load Hoist </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[39] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[39] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[39] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[39]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.5.3 </strong></td>
                        <td><strong>Auxiliary Load Hoist </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[40] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[40] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[40] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[40]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.6 </strong></td>
                        <td><strong>No leakages are visible on the hydraulic hoses, fittings, valves, & manifolds. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[41] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[41] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[41] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[41]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>4.7 </strong></td>
                        <td><strong>Nothing was deformed on the tubing, fittings, & other related components. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[42] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[42] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[42] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[42]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.8 </strong></td>
                        <td><strong>Boom angle indicator is provided and working properly.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[43] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[43] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[43] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[43]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.9 </strong></td>
                        <td><strong>BOOM BACK STOPS: Fixed bumper, Shock absorbing bumper, or Hydraulic bumper, is provided and in good condition. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[44] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[44] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[44] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[44]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.10 </strong></td>
                        <td><strong>WINCH DRUM’S LOCK (PAWLS) is in good condition & properly functioning (as applicable): </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[45] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[45] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[45] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[45]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.10.1 </strong></td>
                        <td><strong>Boom Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[46] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[46] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[46] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[46]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>4.10.2 </strong></td>
                        <td><strong> Main Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[47] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[47] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[47] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[47]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.10.3 </strong></td>
                        <td><strong>Auxiliary Hoist Drum </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[48] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[48] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[48] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[48]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.11 </strong></td>
                        <td><strong>Automatic Boom Back Stops: Maximum boom angle is 82 degrees. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[49] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[49] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[49] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[49]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.12 </strong></td>
                        <td><strong>Automatic stop limit for minimum boom angle is 9.32 degrees. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[50] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[50] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[50] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[50]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.13 </strong></td>
                        <td><strong>Minimum Boom Length is 37.9 m <br> Maximum Boom Length is 39.9 m </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[51] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[51] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[51] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[51]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.14 </strong></td>
                        <td><strong>Boom cradle is provided and can secure the boom at rest. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[52] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[52] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[52] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[52]; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                        <td><strong>4.15</strong></td>
                        <td><strong>Sheaves are free from deformation, dent, bent, or damage and their bearings sufficiently lubricated. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[53] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[53] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[53] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[53]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>4.16</strong></td>
                        <td><strong>Aviation or pilot light is provided and is working. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[54] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[54] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[54] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[54]; ?>" disabled>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[55] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[55] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[55] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[55]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>5.2 </strong></td>
                        <td><strong>Base Structure/Pedestal/mast’s welds and joints are free from corrosion and cracks.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[56] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[56] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[56] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[56]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>5.3 </strong></td>
                        <td><strong>Pins, bearings, shafts, gears, and locking devices are free from distortion, cracks and corrosion. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[57] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[57] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[57] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[57]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>5.4</strong></td>
                        <td><strong>Swing brakes operate and can restrict further movement of the rotating structure. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[58] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[58] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[58] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[58]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>5.5</strong></td>
                        <td><strong>Swing positive locking device is provided and can lock the structure from further movement.</strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[59] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[59] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[59] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[59]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>5.6 </strong></td>
                        <td><strong>Swing brake is adjustable to compensate its wear. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[60] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[60] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[60] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[60]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>5.7 </strong></td>
                        <td><strong>All swing moving parts are sufficiently lubricated. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[61] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[61] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[61] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[61]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                        <td><strong>5.8 </strong></td>
                        <td><strong>Platforms and walkways are skid resistant. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[62] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[62] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[62] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[62]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>5.9 </strong></td>
                        <td><strong>Access ladders, & guard rails are free from rust, damage, & corrosion </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[63] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[63] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[63] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[63]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">6</th>
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
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[64] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[64] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[64] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[64]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.2</strong></td>
                        <td><strong> Electrical wirings and related equipment are free of damages. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[65] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[65] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[65] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[65]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.3 </strong></td>
                        <td><strong>Manholes and hatches’ covers are provided to protect personnel from accidental fall. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[66] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[66] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[66] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[66]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.4 </strong></td>
                        <td><strong>Electrical and hydraulic motors & pumps are in good working condition. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[67] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[67] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[67] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[67]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.5 </strong></td>
                        <td><strong>Hydraulic hoses, fittings, tubes, and manifold joints have no evidence of leakages and not damage. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[68] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[68] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[68] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[68]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.6</strong></td>
                        <td><strong>Hydraulic/pneumatic cylinders, pumps and motors have no leaks and working properly. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[69] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[69] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[69] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[69]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.7</strong></td>
                        <td><strong>Engine power driven motors and pumps are working properly and have no signs of leaks. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[70] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[70] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[70] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[70]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.8</strong></td>
                        <td><strong>Machinery compartment is free from spills and obstruction. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[71] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[71] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[71] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[71]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.9</strong></td>
                        <td><strong>Fire extinguisher is provided in the compartment with minimum rating of 10BC. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[72] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[72] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[72] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[72]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                        <td><strong>6.10</strong></td>
                        ===============<td><strong>An emergency lowering system, if provided, shall be checked for proper function. </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[73] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[73] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[73] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[73]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[74] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[74] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[74] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[74]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[75] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[75] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[75] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[75]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[76] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[76] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[76] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[76]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[77] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[77] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[77] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[77]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[78] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[78] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[78] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[78]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[79] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[79] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[79] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[79]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[80] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[80] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[80] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[80]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[81] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[81] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[81] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[81]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[82] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[82] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[82] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[82]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[83] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[83] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[83] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[83]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[84] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[84] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[84] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[84]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[85] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[85] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[85] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[85]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[86] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[86] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[86] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[86]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[87] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[87] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[87] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[87]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[88] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[88] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[88] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[88]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[89] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[89] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[89] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[89]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[90] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[90] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[90] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[90]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[91] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[91] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[91] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[91]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[92] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[92] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[92] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[92]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[93] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[93] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[93] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[93]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[94] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[94] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[94] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[94]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[95] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[95] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[95] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[95]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[96] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[96] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[96] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[96]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[97] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[97] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[97] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[97]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[98] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[98] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[98] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[98]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[99] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[99] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[99] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[99]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[100] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[100] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[100] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[100]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[101] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[101] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[101] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[101]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[102] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[102] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[102] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[102]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[103] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[103] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[103] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[103]; ?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[104] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[104] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[104] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[104]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[105] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[105] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[105] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[105]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><strong>6.4</strong></td>
                            <td><strong>Data Plate & Markings </strong></td>

                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox1" value="PASS"
                                    <?php echo $selected_results[106] == "PASS" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox2" value="FAIL"
                                    <?php echo $selected_results[106] == "FAIL" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td class="checkbox-cell">
                                <input type="checkbox" name="checked_arr[0][]" id="checkbox3" value="NA"
                                    <?php echo $selected_results[106] == "NA" ? 'checked' : ''; ?> disabled class="custom-checkbox">
                            </td>
                            <td>
                                <input type="text" name="remarks[0]" value="<?php echo $chek_remark[106]; ?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <th style="text-align: center;">6</th>
                            <th style="text-align: center;">GENERAL CONDITION</th>
                            <th style="text-align: center;">PASS</th>
                            <th style="text-align: center;">FAIL</th>
                            <th style="text-align: center;">NA</th>
                            <th> </th>
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
                        <td style="width: 25%;">
                            <strong>
                                <?php echo htmlspecialchars($row['inspected_by']); ?>
                            </strong>
                        </td>
                        <th style="width: 25%;">CLIENT’S REP. NAME:</th>
                        <td style="width: 25%;">

                            <?php echo htmlspecialchars($client_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>SIGNATURE & DATE:</th>
                        <td>
                            <?php
                            // Query the inspector table for the profile photo
                            $inspector_name = $row['inspected_by'];
                            $sql = "SELECT signature_photo FROM inspectors WHERE inspector_name = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $inspector_name);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $inspector = $result->fetch_assoc();
                                $image_path = '../../../../inspector/uploads/' . preg_replace('/\s+/', '_', strtolower($inspector_name)) . '/images/' . $inspector['signature_photo'];


                                // Check if the image exists
                                if (file_exists($image_path)) {
                                    echo "<img src='$image_path' alt='Inspector Signature' style='max-width: 100px; max-height: 50px;'>";
                                } else {
                                    echo "Image not available.";
                                }
                            } else {
                                echo "Inspector not found.";
                            }
                            ?>
                        </td>
                        <th>SIGNATURE & DATE:</th>
                        <td> <img src="../../../uploads/<?php echo htmlspecialchars($project_no); ?>.png" height="50px" width="100px" alt="Client Signature">
                        </td>
                    </tr>
                </table>
            </div>


            <div class="col-12 d-flex justify-content-center mt-4">
                <a href="../../index.php" class="mr-4 btn btn-primary no-print">Back</a>
                <button type="submit" onclick="window.print()" class="btn btn-primary no-print">Print</button>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>