<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Fetch the record to be edited based on project_no
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];
    $sql = "SELECT * FROM eddy_current_inspection WHERE project_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Eddy Current Inspection Certificate</title>
    <!-- Add your CSS styles here -->
</head>
<body>
<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">EDIT EDDY CURRENT INSPECTION CERTIFICATE</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="project_no" value="<?php echo $data['project_no']; ?>">

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
                                <input type="date" class="theme-input-style" name="inspection_date" value="<?php echo $data['inspection_date']; ?>" placeholder="Date of Inspection" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="certificate_no" value="<?php echo $data['certificate_no']; ?>" placeholder="Certificate No" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="report_no" value="<?php echo $data['report_no']; ?>" placeholder="Report No" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" value="<?php echo $data['jrn']; ?>" name="jrn" placeholder="JRN" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="project_no" value="<?php echo $data['project_no']; ?>" placeholder="Project No" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="companyName" value="<?php echo $data['companyName']; ?>" placeholder="Company Name" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REFERENCE NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="reference_no" value="<?php echo $data['reference_no']; ?>" placeholder="Reference No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SITE/LOCATION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="location" value="<?php echo $data['location']; ?>" placeholder="Site/Location" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT INSPECTION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_inspection_date" value="<?php echo $data['next_inspection_date']; ?>" placeholder="Next Inspection Date" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Customer Information / Inspector -->
                    <div class="form-element py-30 mb-30" style="height: 470px;">
                        <h4 class="font-20 mb-30">Customer Information / Inspector</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name']; ?>" placeholder="Customer Name" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Email</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" class="theme-input-style" name="customer_email" value="<?php echo $data['customer_email']; ?>" placeholder="Type Email Address" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Mobile</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="theme-input-style" name="mobile" value="<?php echo $data['mobile']; ?>" placeholder="Contact Number" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector" value="<?php echo $data['inspector']; ?>" placeholder="Inspector Name" readonly>
                            </div>
                        </div>
                        <!-- Add Technical Manager Dropdown -->
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
            <!-- Header Data -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Inspection Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">INSPECTED ITEM</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspected_item" value="<?php echo $data['inspected_item']; ?>" placeholder="Inspected Item">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">TYPE OF JOINT</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="type_of_joint" value="<?php echo $data['type_of_joint']; ?>" placeholder="Type of Joint">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SPECIFICATION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="specification" value="<?php echo $data['specification']; ?>" placeholder="Type specification">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">INSPECTION METHOD</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="inspection_method">
                                    <option value="surface" <?php echo ($data['inspection_method'] == 'surface') ? 'selected' : ''; ?>>Surface</option>
                                    <option value="weld" <?php echo ($data['inspection_method'] == 'weld') ? 'selected' : ''; ?>>Weld</option>
                                    <option value="coatingthickness" <?php echo ($data['inspection_method'] == 'coatingthickness') ? 'selected' : ''; ?>>Coating Thickness</option>
                                    <option value="other" <?php echo ($data['inspection_method'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">CALIBRATION DETAILS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="calibration_details" value="<?php echo $data['calibration_details']; ?>" placeholder="Calibration Details">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">GAIN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="gain" value="<?php echo $data['gain']; ?>" placeholder="Gain">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">PROBE FREQUENCY</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="probe_frequency">
                                    <option value="yes" <?php echo ($data['probe_frequency'] == 'yes') ? 'selected' : ''; ?>>YES</option>
                                    <option value="no" <?php echo ($data['probe_frequency'] == 'no') ? 'selected' : ''; ?>>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DEVICE MAKER</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="device_maker" value="<?php echo $data['device_maker']; ?>" placeholder="Device Maker">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">MODEL</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="model" value="<?php echo $data['model']; ?>" placeholder="Model">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SERIAL NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="serial_no" value="<?php echo $data['serial_no']; ?>" placeholder="Serial No">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inspection Method Dropdown -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Cable Type</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">CABLE TYPE</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="cable_type">
                                    <option value="bnc" <?php echo ($data['cable_type'] == 'bnc') ? 'selected' : ''; ?>>BNC</option>
                                    <option value="lemo" <?php echo ($data['cable_type'] == 'lemo') ? 'selected' : ''; ?>>LEMO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Sensor Type</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SENSOR TYPE</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="sensor_type">
                                    <option value="absoluteprobe" <?php echo ($data['sensor_type'] == 'absoluteprobe') ? 'selected' : ''; ?>>Absolute Probe</option>
                                    <option value="coil" <?php echo ($data['sensor_type'] == 'coil') ? 'selected' : ''; ?>>Coil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ref. Block Type Dropdown -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Ref. Block Type</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REF. BLOCK TYPE</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="ref_block_type">
                                    <option value="notchblock" <?php echo ($data['ref_block_type'] == 'notchblock') ? 'selected' : ''; ?>>Notch Block</option>
                                    <option value="notchdepth" <?php echo ($data['ref_block_type'] == 'notchdepth') ? 'selected' : ''; ?>>Notch Depth</option>
                                    <option value="5mm" <?php echo ($data['ref_block_type'] == '5mm') ? 'selected' : ''; ?>>0.5 mm</option>
                                    <option value="10mm" <?php echo ($data['ref_block_type'] == '10mm') ? 'selected' : ''; ?>>1.0 mm</option>
                                    <option value="20mm" <?php echo ($data['ref_block_type'] == '20mm') ? 'selected' : ''; ?>>2.0 mm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Material</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">MATERIAL</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="material">
                                    <option value="ferromagnetic" <?php echo ($data['material'] == 'ferromagnetic') ? 'selected' : ''; ?>>Ferromagnetic: Carbon Steel</option>
                                    <option value="nonferromagnetic" <?php echo ($data['material'] == 'nonferromagnetic') ? 'selected' : ''; ?>>Non-Ferromagnetic</option>
                                    <option value="mtl" <?php echo ($data['material'] == 'mtl') ? 'selected' : ''; ?>>MTL. THK.</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inspection Result Dropdown -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION 1</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_1" value="<?php echo $data['description_1']; ?>" placeholder="Description 1">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION 2</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_2" value="<?php echo $data['description_2']; ?>" placeholder="Description 2">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION 3</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_3" value="<?php echo $data['description_3']; ?>" placeholder="Description 3">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION OF INSPECTION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_of_inspection" value="<?php echo $data['description_of_inspection']; ?>" placeholder="Description of inspection">
                            </div>
                        </div>
                        <h4 class="font-20 mb-30">Inspection Result</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">INSPECTION RESULT</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" id="inspectionResult" name="inspection_result" onchange="toggleOptions()">
                                    <option value="">Select an option</option>
                                    <option value="noSurfaceIndication" <?php echo ($data['inspection_result'] == 'noSurfaceIndication') ? 'selected' : ''; ?>>No surface indication found at the time of inspection</option>
                                    <option value="notAcceptable" <?php echo ($data['inspection_result'] == 'notAcceptable') ? 'selected' : ''; ?>>NOT ACCEPTABLE DUE TO:</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20" id="notAcceptableOptions" style="display: <?php echo ($data['inspection_result'] == 'notAcceptable') ? 'block' : 'none'; ?>;">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REASON</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="reason">
                                    <option value="">Select a reason</option>
                                    <option value="crack" <?php echo ($data['reason'] == 'crack') ? 'selected' : ''; ?>>Crack</option>
                                    <option value="wear" <?php echo ($data['reason'] == 'wear') ? 'selected' : ''; ?>>Wear</option>
                                    <option value="other" <?php echo ($data['reason'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inspection Method Dropdown -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Inspector Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold"> INSPECTOR  NAME </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector_name" value="<?php echo $data['inspector_name']; ?>" placeholder="Inspector Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold"> INSPECTOR  SIGNATURE </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="theme-input-style" name="inspector_signature" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Authenticating Person Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold"> NAME </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="authenticating_person_name" value="<?php echo $data['authenticating_person_name']; ?>" placeholder="Inspector Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold"> SIGNATURE </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="theme-input-style" name="signature" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="form-row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn long" name="update_all">Update Certificate</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('../../inc/footer.php'); ?>

<script>
    function toggleOptions() {
        var inspectionResult = document.getElementById("inspectionResult").value;
        var notAcceptableOptions = document.getElementById("notAcceptableOptions");

        if (inspectionResult === "notAcceptable") {
            notAcceptableOptions.style.display = "block";
        } else {
            notAcceptableOptions.style.display = "none";
        }
    }
</script>