<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Ensure `project_no` is set in the request
if (isset($_GET['project_no']) && !empty($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // SQL query to join tables
    // $query = "
    //     SELECT 
    //         p.project_no, p.customer_name, p.customer_email, p.customer_mobile, p.company_name,
    //         c.checklist_no, c.inspected_by,
    //         r.report_no, r.sticker_number_issued, r.date_of_creation, r.rep_name
    //     FROM 
    //         project_info p
    //     LEFT JOIN 
    //         checklist_information c ON p.project_no = c.project_no
    //     LEFT JOIN 
    //         report r ON p.project_no = r.project_no
    //     WHERE 
    //         p.project_no = ?
    // ";



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
            preg_match('/CHC-(\d+)-\d{4}/', $lastCert, $matches);
            $nextNumber = isset($matches[1]) ? (int)$matches[1] + 1 : 1;
        } else {
            $nextNumber = 1; // Start with 1 if no previous certificates exist
        }

        // Format the new certificate number
        $newCertificateNo = sprintf("CHC-%03d-%s", $nextNumber, $currentYear);

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
                        <h4 class="pl-2 pt-3 pb-2 font-20">CRANE HEALTH CHECK CERTIFICATE</h4>
                    </div>
                    <div class="col-6 text-right">
    <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
</div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">        
            <form action="save_crane_certificate.php" method="POST">
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
                                <input type="text" class="theme-input-style" name="certificate_no" placeholder="Certificate No" value="<?= $newCertificateNo ?>" readonly>
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
                                <input type="text" class="theme-input-style" value="<?php echo $data['jrn'] ?? ''; ?>" name="jrn" placeholder="JRN">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" class="theme-input-style" name="project_no" value="<?php echo $data['project_no'] ?? ''; ?>" placeholder="Project ID">
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
                            <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name'] ?? ''; ?>" placeholder="Customer Name">    
                            <!-- <input type="text" class="theme-input-style" name="" placeholder=""> -->
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Email</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="email" class="theme-input-style" name="customer_email" value="<?php echo $data['customer_email'] ?? ''; ?>" placeholder="Type Email Address">    
                                <!-- <input type="" class="theme-input-style" name="" placeholder=""> -->
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Mobile</label>
                            </div>
                            <div class="col-sm-8">
                                
                                <input type="number" class="theme-input-style" name="mobile" value="<?php echo $data['customer_mobile'] ?? ''; ?>" placeholder="Contact Number">    
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Inspector</label>
                            </div>
                            <div class="col-sm-8">
                                <!-- <input type="" class="theme-input-style" name="" placeholder=""> -->
                                <input type="text" class="theme-input-style" name="inspector" value="<?php echo $data['inspector_name'] ?? ''; ?>" placeholder="Inspector Name">    
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <!-- General Information -->
                    <div class="form-element py-30 multiple-column">
                        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Vessel Name & Location</label>
                                    <input type="text" class="theme-input-style" name="vessel_name_location" placeholder="Vessel Name & Location">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Manufacturer</label>
                                    <input type="text" class="theme-input-style" name="manufacturer" value="<?php echo $data['manufacturer'] ?? ''; ?>" placeholder="Manufacturer">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Type of Crane</label>
                                    <input type="text" class="theme-input-style" name="crane_type" placeholder="Type of Crane">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Asset Number</label>
                                    <input type="text" class="theme-input-style" name="asset_number" value="<?php echo $data['crane_asset_no'] ?? ''; ?>" placeholder="Asset Number">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Serial Number</label>
                                    <input type="text" class="theme-input-style" name="serial_number" value="<?php echo $data['crane_serial_no'] ?? ''; ?>" placeholder="Serial Number">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Model</label>
                                    <input type="text" class="theme-input-style" name="model" placeholder="Model">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Manufacturing Year</label>
                                    <input type="text" class="theme-input-style" name="manufacturing_year" placeholder="Manufacturing Year">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Address</label>
                                    <input type="text" class="theme-input-style" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Capacity (SWL)</label>
                                    <input type="text" class="theme-input-style" name="capacity_swl" value="<?php echo $data['capacity_swl'] ?? ''; ?>" placeholder="Capacity (SWL)">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Date of Previous Test of Crane</label>
                                    <input type="date" class="theme-input-style" name="previous_test_date" placeholder="Date of Previous Test of Crane">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row">

                <div class="col-lg-12">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 multiple-column">
                                <h4 class="font-20 mb-20">B. GENERAL INFORMATION</h4>

                                <!-- Form -->
                                <!-- <form action="#" method="POST"> -->

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Crane Structure Condition:</label>
                                                <!-- Crane Structure Condition -->
<select class="form-control" name="crane_structure_condition">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                            
                                               <!-- Form Group -->
                                               <div class="form-group">
                                                <label class="font-14 bold mb-2">Swinging / Slewing Function:	</label>
                                                <!-- Swinging / Slewing Function -->
<select class="form-control" name="swinging_slewing_function">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                  <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Hydraulic & Pneumatic System</label>
                                                <!-- Hydraulic & Pneumatic System -->
<select class="form-control" name="hydraulic_pneumatic_system">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->

                                                 <!-- Form Group -->
                                                 <div class="form-group">
                                                <label class="font-14 bold mb-2">Wire Ropes Condition:</label>
                                                <!-- Wire Ropes Condition -->
<select class="form-control" name="wire_ropes_condition">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                  <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Boom Lifting, Extending & Retracting:</label>
                                                <!-- Boom Lifting, Extending & Retracting -->
<select class="form-control" name="boom_lifting_extending_retracting">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                   <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Emergency Boom Lowering:</label>
                                                <!-- Emergency Boom Lowering -->
<select class="form-control" name="emergency_boom_lowering">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                        </div>
                                        <div class="col-lg-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Auto Moment Limiter (LMI):</label>
                                               <!-- Auto Moment Limiter (LMI) -->
                                                <select class="form-control" name="auto_moment_limiter">
                                                    <option value="SATISFACTORY">SATISFACTORY</option>
                                                    <option value="NA">N/A</option>
                                                </select>
                                                 </div>
                                            <!-- End Form Group -->
                                            
                                               <!-- Form Group -->
                                               <div class="form-group">
                                                <label class="font-14 bold mb-2">Anti-Two-Block (A2B) Function:</label>
                                                <!-- Anti-Two-Block (A2B) Function -->
<select class="form-control" name="anti_two_block">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                  <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">	Winch Drum Lock / Pawls:</label>
                                                <!-- Winch Drum Lock / Pawls -->
<select class="form-control" name="winch_drum_lock_pawls">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->

                                                 <!-- Form Group -->
                                                 <div class="form-group">
                                                <label class="font-14 bold mb-2">Hook Block Assembly:</label>
                                                <!-- Hook Block Assembly -->
<select class="form-control" name="hook_block_assembly">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                  <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Boom Angle Indicator:</label>
                                                <!-- Boom Angle Indicator -->
<select class="form-control" name="boom_angle_indicator">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                                   <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Emergency Shutdown:</label>
                                               <!-- Emergency Shutdown -->
<select class="form-control" name="emergency_shutdown">
    <option value="SATISFACTORY">SATISFACTORY</option>
    <option value="NA">N/A</option>
</select>
                                                 </div>
                                            <!-- End Form Group -->
                                        </div>
                                      
                                    </div>

                               

                                    <!-- Form Row -->
                                    <!-- <div class="form-row">
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div> -->
                                    <!-- End Form Row -->
                                <!-- </form> -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>

                </div>

                <!-- Entire Save Button -->
                <div class="form-row">
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn long" name="save_all">Save All</button>
                    </div>
                </div>
            </form>
        </div>
    
</div>

<?php include_once('../../inc/footer.php'); ?>
