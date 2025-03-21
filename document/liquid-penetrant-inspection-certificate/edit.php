<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Fetch the existing data based on the project_no passed in the URL
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];
    $query = "SELECT * FROM liquid_penetrant_inspection WHERE project_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">EDIT LIQUID PENETRANT INSPECTION CERTIFICATE</h4>
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
                                <input type="date" class="theme-input-style" name="inspection_date" value="<?php echo $data['inspection_date']; ?>" placeholder="Date of Inspection">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="certificate_no" value="<?php echo $data['certificate_no']; ?>" placeholder="Certificate No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="report_no" value="<?php echo $data['report_no']; ?>" placeholder="Report No">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="jrn" value="<?php echo $data['jrn']; ?>" placeholder="JRN">
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
                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="companyName" value="<?php echo $data['companyName']; ?>" placeholder="Company Name">
                            </div>
                        </div> -->
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
                                <input type="text" class="theme-input-style" name="location" value="<?php echo $data['location']; ?>" placeholder="Site/Location">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">NEXT INSPECTION DATE</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="next_inspection_date" value="<?php echo $data['next_inspection_date']; ?>" placeholder="Next Inspection Date">
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
                                <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name']; ?>" placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Email</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" class="theme-input-style" name="customer_email" value="<?php echo $data['customer_email']; ?>" placeholder="Type Email Address">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Mobile</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="theme-input-style" name="mobile" value="<?php echo $data['mobile']; ?>" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector" value="<?php echo $data['inspector']; ?>" placeholder="Inspector Name">
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

            <!-- Testing Preparation -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Testing Preparation</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Standard</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="standard" value="<?php echo $data['standard']; ?>" placeholder="Standard">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Material</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="material" value="<?php echo $data['material']; ?>" placeholder="Material">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Surface Temperature</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="surface_temperature" value="<?php echo $data['surface_temperature']; ?>" placeholder="Surface Temperature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testing Tools -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Testing Tools</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Technique/Procedure</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="technique_procedure" value="<?php echo $data['technique_procedure']; ?>" placeholder="Technique/Procedure">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Brand</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="brand" value="<?php echo $data['brand']; ?>" placeholder="Brand">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Penetrant</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="penetrant" value="<?php echo $data['penetrant']; ?>" placeholder="Penetrant">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Penetrant Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="penetrant_apply" value="<?php echo $data['penetrant_apply']; ?>" placeholder="Penetrant Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Dwell Time</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="dwell_time" value="<?php echo $data['dwell_time']; ?>" placeholder="Dwell Time">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Cleaner</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="cleaner" value="<?php echo $data['cleaner']; ?>" placeholder="Cleaner">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Remove Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="remove_apply" value="<?php echo $data['remove_apply']; ?>" placeholder="Remove Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developer</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developer" value="<?php echo $data['developer']; ?>" placeholder="Developer">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developer Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developer_apply" value="<?php echo $data['developer_apply']; ?>" placeholder="Developer Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developing Time</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developing_time" value="<?php echo $data['developing_time']; ?>" placeholder="Developing Time">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testing Result -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Testing Result</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description" value="<?php echo $data['description']; ?>" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Item Checked</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="item_checked" value="<?php echo $data['item_checked']; ?>" placeholder="Item Checked">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Results</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="results" value="<?php echo $data['results']; ?>" placeholder="Results">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Condition</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="condition_new" value="<?php echo $data['condition_new']; ?>" placeholder="Condition">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Description 1</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description 1</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_1" value="<?php echo $data['description_1']; ?>" placeholder="Description 1">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description 2</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_2" value="<?php echo $data['description_2']; ?>" placeholder="Description 2">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description 3</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_3" value="<?php echo $data['description_3']; ?>" placeholder="Description 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inspector and Authenticating Person Details -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Inspector Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector_name" value="<?php echo $data['inspector_name']; ?>" placeholder="Inspector Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector Signature</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="theme-input-style" name="inspector_signature" accept="image/*">
                                <?php if (!empty($data['inspector_signature'])): ?>
                                    <img src="<?php echo $data['inspector_signature']; ?>" alt="Inspector Signature" width="100">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Authenticating Person Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="authenticating_person_name" value="<?php echo $data['authenticating_person_name']; ?>" placeholder="Authenticating Person Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                        <input type="hidden" name="existing_inspector_signature" value="<?php echo $data['inspector_signature']; ?>">
                        <input type="hidden" name="existing_authenticating_person_signature" value="<?php echo $data['authenticating_person_signature']; ?>">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Signature</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="theme-input-style" name="authenticating_person_signature" accept="image/*">
                                <?php if (!empty($data['authenticating_person_signature'])): ?>
                                    <img src="<?php echo $data['authenticating_person_signature']; ?>" alt="Authenticating Person Signature" width="100">
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> -->

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