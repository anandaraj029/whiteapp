<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocking Test Certificate</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Rocking Test Certificate</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="display.php" method="POST">
            <!-- Header Data -->


            <div class="row">
            <div class="col-lg-6">
                    <!-- Header Data -->
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Header Data</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Date of Inspection</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="inspection_date" value="<?php echo $data['inspection_date'] ?? ''; ?>" placeholder="Date of Inspection">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="certificate_no" placeholder="Certificate No" >
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="report_no" value="<?php echo $data['report_no'] ?? ''; ?>" placeholder="Report No" >
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" value="<?php echo $data['jrn'] ?? ''; ?>" name="jrn" placeholder="JRN" >
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="project_no" value="<?php echo $data['project_no'] ?? ''; ?>" placeholder="Project No" >
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Company Name</label>
                            </div>
                            <div class="col-sm-8">

                                <input type="text" class="theme-input-style" name="companyName" placeholder="Company Name">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REFERENCE NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="reference_no" placeholder="Reference No">
                            </div>
                        </div>
                        
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SITE/LOCATION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="location" placeholder="Site/Location">
                            </div>
                        </div>
                       
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT INSPECTION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_inspection_date" placeholder="Next Inspection Date">
                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Customer Information / Inspector -->
                    <div class="form-element py-30 mb-30" style="height: 660px;">
                        <h4 class="font-20 mb-30">Customer Information / Inspector</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name'] ?? ''; ?>" placeholder="Customer Name" >
                                <!-- <input type="text" class="theme-input-style" name="" placeholder=""> -->
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Email</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" class="theme-input-style" name="customer_email" value="<?php echo $data['customer_email'] ?? ''; ?>" placeholder="Type Email Address" >
                                <!-- <input type="" class="theme-input-style" name="" placeholder=""> -->
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Mobile</label>
                            </div>
                            <div class="col-sm-8">

                                <input type="number" class="theme-input-style" name="mobile" value="<?php echo $data['customer_mobile'] ?? ''; ?>" placeholder="Contact Number" >
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector</label>
                            </div>
                            <div class="col-sm-8">
                                <!-- <input type="" class="theme-input-style" name="" placeholder=""> -->
                                <input type="text" class="theme-input-style" name="inspector" value="<?php echo $data['inspector_name'] ?? ''; ?>" placeholder="Inspector Name" >
                            </div>
                        </div>
                        <!-- Add Technical Manager Dropdown -->
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Technical Manager</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="technical_manager">
                                    <option value="Veera">Veera</option>
                                    <option value="Sathish">Sathish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Header Data</h4>
                        
                        
                        
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DATE OF REPORT</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="report_date" placeholder="Date of Report">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">COLOR CODE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="color_code" placeholder="Enter Color code">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">APPLICABLE STNDARDS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="applicable_standards" placeholder="Enter applicable standards">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">EMPLOYER NAME & ADDRESS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="employer_address" placeholder="Employer Name & Address">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">PREMISES ADDRESS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="premises_address" placeholder="Premises Address">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Inspection Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">INSPECTED ITEM TYPE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspected_item_type" placeholder="Inspected Item Type">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">IDENTIFICATION NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="identification_no" placeholder="Identification No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">QUANTITY</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="quantity" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">WLL/SWL</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="wll_swl" placeholder="WLL/SWL">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">LAST EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="last_exam_date" placeholder="Last Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">THIS EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="this_exam_date" placeholder="This Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_exam_date" placeholder="Next Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REASON FOR EXAMINATION</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="reason_for_exam">
                                    <option value="A">3 Monthly: A</option>
                                    <option value="B">6 Monthly: B</option>
                                    <option value="C">12 Monthly: C</option>
                                    <option value="D">Written Scheme: D</option>
                                    <option value="E">Exceptional Circumstance: E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DETAILS OF TEST</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="details_of_test" placeholder="Details of Test">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">STATUS</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="status">
                                    <option value="ND">ND - No Defect</option>
                                    <option value="SDR">SDR - See Defect Report</option>
                                    <option value="NF">NF - Not Found</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SAFE TO USE</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="safe_to_use">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
            <div class="col-lg-12">
 <!-- Grease Sample Condition -->
 <div class="form-element py-30 mb-30">
                <h4 class="font-20 mb-30">Grease Sample Condition After Analyzing</h4>
                <div class="form-row mb-20">
                    <div class="col-sm-4">
                        <label class="font-14 bold">Condition</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="theme-input-style" name="grease_condition">
                            <option value="OK">OK</option>
                            <option value="Not OK">Not OK</option>
                        </select>
                    </div>
                </div>
            </div>


<!-- Last Measured Limits -->
<div class="form-element py-30 mb-30">
            <h4 class="font-20 mb-30">Test Positions</h4>
                <h4 class="font-20 mb-30">Last Measured Limits to be compared</h4>
                <div class="form-row mb-20">
                    <div class="col-sm-3">
                        <label class="font-14 bold">AFT (mm)</label>
                        <input type="text" class="theme-input-style" name="last_aft" placeholder="AFT">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">STBD (mm)</label>
                        <input type="text" class="theme-input-style" name="last_stbd" placeholder="STBD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">FORWARD (mm)</label>
                        <input type="text" class="theme-input-style" name="last_forward" placeholder="FORWARD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">PORT SIDE (mm)</label>
                        <input type="text" class="theme-input-style" name="last_port_side" placeholder="PORT SIDE">
                    </div>
                </div>
            </div>

            <!-- Actual Deviation Measured by Dial Gauge Readings -->
            <div class="form-element py-30 mb-30">
                <h4 class="font-20 mb-30">Actual Deviation Measured by Dial Gauge Readings</h4>
                <div class="form-row mb-20">
                    <div class="col-sm-3">
                        <label class="font-14 bold">AFT (mm)</label>
                        <input type="text" class="theme-input-style" name="actual_aft" placeholder="AFT">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">STBD (mm)</label>
                        <input type="text" class="theme-input-style" name="actual_stbd" placeholder="STBD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">FORWARD (mm)</label>
                        <input type="text" class="theme-input-style" name="actual_forward" placeholder="FORWARD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">PORT SIDE (mm)</label>
                        <input type="text" class="theme-input-style" name="actual_port_side" placeholder="PORT SIDE">
                    </div>
                </div>
            </div>

            <!-- Permitted Limits to be Compared -->
            <div class="form-element py-30 mb-30">
                <h4 class="font-20 mb-30">Permitted Limits to be Compared</h4>
                <div class="form-row mb-20">
                    <div class="col-sm-3">
                        <label class="font-14 bold">AFT (mm)</label>
                        <input type="text" class="theme-input-style" name="permitted_aft" placeholder="AFT">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">STBD (mm)</label>
                        <input type="text" class="theme-input-style" name="permitted_stbd" placeholder="STBD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">FORWARD (mm)</label>
                        <input type="text" class="theme-input-style" name="permitted_forward" placeholder="FORWARD">
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">PORT SIDE (mm)</label>
                        <input type="text" class="theme-input-style" name="permitted_port_side" placeholder="PORT SIDE">
                    </div>
                </div>
            </div>

            <!-- Result/OK or Defect of SGOCC -->
            <div class="form-element py-30 mb-30">
                <h4 class="font-20 mb-30">Result/OK or Defect of SGOCC</h4>
                <div class="form-row mb-20">
                    <div class="col-sm-3">
                        <label class="font-14 bold">AFT</label>
                        <select class="theme-input-style" name="result_aft">
                            <option value="OK">OK</option>
                            <option value="Defect">Defect</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">STBD</label>
                        <select class="theme-input-style" name="result_stbd">
                            <option value="OK">OK</option>
                            <option value="Defect">Defect</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">FORWARD</label>
                        <select class="theme-input-style" name="result_forward">
                            <option value="OK">OK</option>
                            <option value="Defect">Defect</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="font-14 bold">PORT SIDE</label>
                        <select class="theme-input-style" name="result_port_side">
                            <option value="OK">OK</option>
                            <option value="Defect">Defect</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            </div>            

            <!-- Save Button -->
            <div class="form-row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn long" name="save_all">Generate Certificate</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('../../inc/footer.php'); ?>