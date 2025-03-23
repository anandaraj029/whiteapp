<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Ensure `project_no` is set in the request
if (isset($_GET['project_no']) && !empty($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    $query = "
    SELECT 
        p.project_no, p.customer_name, p.customer_email, p.customer_mobile, p.inspector_name,
        c.checklist_no, c.inspection_date, c.crane_asset_no, c.crane_serial_no, c.capacity_swl,
        r.report_no, r.jrn
    FROM 
        project_info p
    LEFT JOIN 
        checklist_information c ON p.project_no = c.project_no
    LEFT JOIN 
        reports r ON p.project_no = r.project_no
    WHERE 
        p.project_no = ?
";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Generate certificate number logic
        $currentYear = date('Y');

        $certQuery = "SELECT certificate_no FROM crane_health_check_certificate ORDER BY id DESC LIMIT 1";
        $certResult = $conn->query($certQuery);

        if ($certResult->num_rows > 0) {
            $lastCert = $certResult->fetch_assoc()['certificate_no'];

            // Extract the numeric part
            preg_match('/CLP-(\d+)-\d{4}/', $lastCert, $matches);
            $nextNumber = isset($matches[1]) ? (int)$matches[1] + 1 : 1;
        } else {
            $nextNumber = 1; // Start with 1 if no previous certificates exist
        }

        // Format the new certificate number
        $newCertificateNo = sprintf("CLP-%03d-%s", $nextNumber, $currentYear);

        // Display or use the certificate number as needed
        // echo "<h3>Generated Certificate Number: $newCertificateNo</h3>";

    } else {
        $data = null;
    }
} else {
    echo "Invalid or missing project ID.";
    exit;
}
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">LIQUID PENETRANT INSPECTION CERTIFICATE</h4>
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
                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Company Name</label>
                            </div>
                            <div class="col-sm-8">

                                <input type="text" class="theme-input-style" name="companyName" placeholder="Company Name">
                            </div>
                        </div> -->


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

            <div class="col-lg-12">
                    <!-- Testing Preparation -->
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Testing Preparation</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Standard</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="standard" placeholder="Standard">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Material</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="material" placeholder="Material">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Surface Temperature</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="surface_temperature" placeholder="Surface Temperature">
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
                                <input type="text" class="theme-input-style" name="technique_procedure" placeholder="Technique/Procedure">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Brand</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="brand" placeholder="Brand">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Penetrant</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="penetrant" placeholder="Penetrant">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Penetrant Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="penetrant_apply" placeholder="Penetrant Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Dwell Time</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="dwell_time" placeholder="Dwell Time">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Cleaner</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="cleaner" placeholder="Cleaner">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Remove Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="remove_apply" placeholder="Remove Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developer</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developer" placeholder="Developer">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developer Apply</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developer_apply" placeholder="Developer Apply">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Developing Time</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="developing_time" placeholder="Developing Time">
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
                                <input type="text" class="theme-input-style" name="description" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Item Checked</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="item_checked" placeholder="Item Checked">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Results</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="results" placeholder="Results">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Condition</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="condition_new" placeholder="Condition">
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
                                <input type="text" class="theme-input-style" name="description_1" placeholder="Description 1">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description 2</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_2" placeholder="Description 2">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Description 3</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="description_3" placeholder="Description 3">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Inspector and Authenticating Person Details -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Inspector Details</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="inspector_name" placeholder="Inspector Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector Signature</label>
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
                                <label class="font-14 bold">Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="authenticating_person_name" placeholder="Authenticating Person Name">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Signature</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="theme-input-style" name="authenticating_person_signature" accept="image/*">
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