<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Fetch the record ID from the URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Fetch the existing record from the database
    $sql = "SELECT * FROM rocking_test_certificate WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    // Redirect or handle the case where no ID is provided
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rocking Test Certificate</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Edit Rocking Test Certificate</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Header Data -->
            <div class="row">
                <div class="col-lg-6">
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
                                <input type="text" class="theme-input-style" name="certificate_no" placeholder="Certificate No" value="<?php echo $data['certificate_no'] ?? ''; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="report_no" value="<?php echo $data['report_no'] ?? ''; ?>" placeholder="Report No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="jrn" value="<?php echo $data['jrn'] ?? ''; ?>" placeholder="JRN">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="project_no" value="<?php echo $data['project_no'] ?? ''; ?>" placeholder="Project No" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REFERENCE NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="reference_no" value="<?php echo $data['reference_no'] ?? ''; ?>" placeholder="Reference No" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SITE/LOCATION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="location" value="<?php echo $data['location'] ?? ''; ?>" placeholder="Site/Location" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT INSPECTION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_inspection_date" value="<?php echo $data['next_inspection_date'] ?? ''; ?>" placeholder="Next Inspection Date" readonly>
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
                                <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name'] ?? ''; ?>" placeholder="Customer Name" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Email</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" class="theme-input-style" name="customer_email" value="<?php echo $data['customer_email'] ?? ''; ?>" placeholder="Type Email Address" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Mobile</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="theme-input-style" name="mobile" value="<?php echo $data['mobile'] ?? ''; ?>" placeholder="Contact Number" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector" value="<?php echo $data['inspector'] ?? ''; ?>" placeholder="Inspector Name" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Technical Manager</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="technical_manager">
                                    <option value="Veera" <?php echo ($data['technical_manager'] == 'Veera') ? 'selected' : ''; ?>>Veera</option>
                                    <option value="Sathish" <?php echo ($data['technical_manager'] == 'Sathish') ? 'selected' : ''; ?>>Sathish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add other sections similarly -->




            <div class="row">
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Header Data</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DATE OF REPORT</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="report_date" value="<?php echo $data['report_date'] ?? ''; ?>" placeholder="Date of Report">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">COLOR CODE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="color_code" value="<?php echo $data['color_code'] ?? ''; ?>" placeholder="Enter Color code">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">APPLICABLE STANDARDS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="applicable_standards" value="<?php echo $data['applicable_standards'] ?? ''; ?>" placeholder="Enter applicable standards">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">EMPLOYER NAME & ADDRESS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="employer_address" value="<?php echo $data['employer_address'] ?? ''; ?>" placeholder="Employer Name & Address">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">PREMISES ADDRESS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="premises_address" value="<?php echo $data['premises_address'] ?? ''; ?>" placeholder="Premises Address">
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
                                <input type="text" class="theme-input-style" name="inspected_item_type" value="<?php echo $data['inspected_item_type'] ?? ''; ?>" placeholder="Inspected Item Type">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">IDENTIFICATION NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="identification_no" value="<?php echo $data['identification_no'] ?? ''; ?>" placeholder="Identification No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">QUANTITY</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="quantity" value="<?php echo $data['quantity'] ?? ''; ?>" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description" value="<?php echo $data['description'] ?? ''; ?>" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">WLL/SWL</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="wll_swl" value="<?php echo $data['wll_swl'] ?? ''; ?>" placeholder="WLL/SWL">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">LAST EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="last_exam_date" value="<?php echo $data['last_exam_date'] ?? ''; ?>" placeholder="Last Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">THIS EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="this_exam_date" value="<?php echo $data['this_exam_date'] ?? ''; ?>" placeholder="This Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT EXAMINATION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_exam_date" value="<?php echo $data['next_exam_date'] ?? ''; ?>" placeholder="Next Examination Date">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REASON FOR EXAMINATION</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="reason_for_exam">
                                    <option value="A" <?php echo ($data['reason_for_exam'] == 'A') ? 'selected' : ''; ?>>3 Monthly: A</option>
                                    <option value="B" <?php echo ($data['reason_for_exam'] == 'B') ? 'selected' : ''; ?>>6 Monthly: B</option>
                                    <option value="C" <?php echo ($data['reason_for_exam'] == 'C') ? 'selected' : ''; ?>>12 Monthly: C</option>
                                    <option value="D" <?php echo ($data['reason_for_exam'] == 'D') ? 'selected' : ''; ?>>Written Scheme: D</option>
                                    <option value="E" <?php echo ($data['reason_for_exam'] == 'E') ? 'selected' : ''; ?>>Exceptional Circumstance: E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DETAILS OF TEST</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="details_of_test" value="<?php echo $data['details_of_test'] ?? ''; ?>" placeholder="Details of Test">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">STATUS</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="status">
                                    <option value="ND" <?php echo ($data['status'] == 'ND') ? 'selected' : ''; ?>>ND - No Defect</option>
                                    <option value="SDR" <?php echo ($data['status'] == 'SDR') ? 'selected' : ''; ?>>SDR - See Defect Report</option>
                                    <option value="NF" <?php echo ($data['status'] == 'NF') ? 'selected' : ''; ?>>NF - Not Found</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SAFE TO USE</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="safe_to_use">
                                    <option value="Yes" <?php echo ($data['safe_to_use'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="No" <?php echo ($data['safe_to_use'] == 'No') ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


 <!-- Grease Sample Condition -->
 <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Grease Sample Condition After Analyzing</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Condition</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="grease_condition">
                                    <option value="OK" <?php echo ($data['grease_condition'] == 'OK') ? 'selected' : ''; ?>>OK</option>
                                    <option value="Not OK" <?php echo ($data['grease_condition'] == 'Not OK') ? 'selected' : ''; ?>>Not OK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Last Measured Limits -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Test Positions</h4>
                        <h4 class="font-20 mb-30">Last Measured Limits to be compared</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-3">
                                <label class="font-14 bold">AFT (mm)</label>
                                <input type="text" class="theme-input-style" name="last_aft" value="<?php echo $data['last_aft'] ?? ''; ?>" placeholder="AFT">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">STBD (mm)</label>
                                <input type="text" class="theme-input-style" name="last_stbd" value="<?php echo $data['last_stbd'] ?? ''; ?>" placeholder="STBD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">FORWARD (mm)</label>
                                <input type="text" class="theme-input-style" name="last_forward" value="<?php echo $data['last_forward'] ?? ''; ?>" placeholder="FORWARD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">PORT SIDE (mm)</label>
                                <input type="text" class="theme-input-style" name="last_port_side" value="<?php echo $data['last_port_side'] ?? ''; ?>" placeholder="PORT SIDE">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actual Deviation Measured by Dial Gauge Readings -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Actual Deviation Measured by Dial Gauge Readings</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-3">
                                <label class="font-14 bold">AFT (mm)</label>
                                <input type="text" class="theme-input-style" name="actual_aft" value="<?php echo $data['actual_aft'] ?? ''; ?>" placeholder="AFT">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">STBD (mm)</label>
                                <input type="text" class="theme-input-style" name="actual_stbd" value="<?php echo $data['actual_stbd'] ?? ''; ?>" placeholder="STBD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">FORWARD (mm)</label>
                                <input type="text" class="theme-input-style" name="actual_forward" value="<?php echo $data['actual_forward'] ?? ''; ?>" placeholder="FORWARD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">PORT SIDE (mm)</label>
                                <input type="text" class="theme-input-style" name="actual_port_side" value="<?php echo $data['actual_port_side'] ?? ''; ?>" placeholder="PORT SIDE">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Permitted Limits to be Compared -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Permitted Limits to be Compared</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-3">
                                <label class="font-14 bold">AFT (mm)</label>
                                <input type="text" class="theme-input-style" name="permitted_aft" value="<?php echo $data['permitted_aft'] ?? ''; ?>" placeholder="AFT">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">STBD (mm)</label>
                                <input type="text" class="theme-input-style" name="permitted_stbd" value="<?php echo $data['permitted_stbd'] ?? ''; ?>" placeholder="STBD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">FORWARD (mm)</label>
                                <input type="text" class="theme-input-style" name="permitted_forward" value="<?php echo $data['permitted_forward'] ?? ''; ?>" placeholder="FORWARD">
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">PORT SIDE (mm)</label>
                                <input type="text" class="theme-input-style" name="permitted_port_side" value="<?php echo $data['permitted_port_side'] ?? ''; ?>" placeholder="PORT SIDE">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result/OK or Defect of SGOCC -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Result/OK or Defect of SGOCC</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-3">
                                <label class="font-14 bold">AFT</label>
                                <select class="theme-input-style" name="result_aft">
                                    <option value="OK" <?php echo ($data['result_aft'] == 'OK') ? 'selected' : ''; ?>>OK</option>
                                    <option value="Defect" <?php echo ($data['result_aft'] == 'Defect') ? 'selected' : ''; ?>>Defect</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">STBD</label>
                                <select class="theme-input-style" name="result_stbd">
                                    <option value="OK" <?php echo ($data['result_stbd'] == 'OK') ? 'selected' : ''; ?>>OK</option>
                                    <option value="Defect" <?php echo ($data['result_stbd'] == 'Defect') ? 'selected' : ''; ?>>Defect</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">FORWARD</label>
                                <select class="theme-input-style" name="result_forward">
                                    <option value="OK" <?php echo ($data['result_forward'] == 'OK') ? 'selected' : ''; ?>>OK</option>
                                    <option value="Defect" <?php echo ($data['result_forward'] == 'Defect') ? 'selected' : ''; ?>>Defect</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="font-14 bold">PORT SIDE</label>
                                <select class="theme-input-style" name="result_port_side">
                                    <option value="OK" <?php echo ($data['result_port_side'] == 'OK') ? 'selected' : ''; ?>>OK</option>
                                    <option value="Defect" <?php echo ($data['result_port_side'] == 'Defect') ? 'selected' : ''; ?>>Defect</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="form-row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn long" name="update">Update Certificate</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('../../inc/footer.php'); ?>