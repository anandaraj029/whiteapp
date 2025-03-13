<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">EDDY CURRENT INSPECTION CERTIFICATE</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <form action="display.php" method="POST" enctype="multipart/form-data">

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
                    <div class="form-element py-30 mb-30" style="height: 470px;">
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
                                <input type="text" class="theme-input-style" name="inspected_item" placeholder="Inspected Item">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">TYPE OF JOINT</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="type_of_joint" placeholder="Type of Joint">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SPECIFICATION</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="specification" placeholder="Type specification">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">INSPECTION METHOD</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="inspection_method">
                                    <option value="surface">Surface</option>
                                    <option value="weld">Weld</option>
                                    <option value="coatingthickness">Coating Thickness</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">CALIBRATION DETAILS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="calibration_details" placeholder="Calibration Details">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">GAIN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="gain" placeholder="Gain">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">PROBE FREQUENCY</label>
                            </div>
                            <div class="col-sm-8">
                            <select class="theme-input-style" name="probe_frequency">
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                    
                            </select>
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DEVICE MAKER</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="device_maker" placeholder="Device Maker">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">MODEL</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="model" placeholder="Model">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">SERIAL NO.</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="serial_no" placeholder="Serial No">
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
                                    <option value="bnc">BNC</option>
                                    <option value="lemo">LEMO</option>
                                    
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
                                    
                                    <option value="absoluteprobe">Absolute Probe</option>
                                    <option value="coil">Coil</option>
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
                                    <option value="notchblock">Notch Block</option>
                                    <option value="notchdepth">Notch Depth</option>
                                    <option value="5mm">0.5 mm</option>
                                    <option value="10mm">1.0 mm</option>
                                    <option value="20mm">2.0 mm</option>
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
                                    <option value="ferromagnetic">Ferromagnetic: Carbon Steel</option>
                                    <option value="nonferromagnetic">Non-Ferromagnetic</option>
                                    <option value="mtl">MTL. THK.</option>
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
                            <input type="text" class="theme-input-style" name="description_1" placeholder="Description 1">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION 2</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" class="theme-input-style" name="description_2" placeholder="Description 2">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION 3</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" class="theme-input-style" name="description_3" placeholder="Description 3">
                            </div>
                        </div>

                    <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">DESCRIPTION OF INSPECTION</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" class="theme-input-style" name="description_of_inspection" placeholder="Description of inspection">
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
                                    <option value="noSurfaceIndication">No surface indication found at the time of inspection</option>
                                    <option value="notAcceptable">NOT ACCEPTABLE DUE TO:</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-20" id="notAcceptableOptions" style="display: none;">
                            <div class="col-sm-4">
                                <label class="font-14 bold">REASON</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="reason">
                                    <option value="">Select a reason</option>
                                    <option value="crack">Crack</option>
                                    <option value="wear">Wear</option>
                                    <option value="other">Other</option>
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
                            <input type="text" class="theme-input-style" name="inspector_name" placeholder="Inspector Name">
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
                            <input type="text" class="theme-input-style" name="authenticating_person_name" placeholder="Inspector Name">
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
                    <button type="submit" class="btn long" name="save_all">Save Certificate</button>
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