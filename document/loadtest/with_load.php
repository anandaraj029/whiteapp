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
        r.report_no, r.jrn, r.sticker_number_issued
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
        
        $certQuery = "SELECT certificate_no FROM loadtest_certificate ORDER BY id DESC LIMIT 1";
        $certResult = $conn->query($certQuery);

        if ($certResult->num_rows > 0) {
            $lastCert = $certResult->fetch_assoc()['certificate_no'];
            
            // Extract the numeric part
            preg_match('/CWL-(\d+)-\d{4}/', $lastCert, $matches);
            $nextNumber = isset($matches[1]) ? (int)$matches[1] + 1 : 1;
        } else {
            $nextNumber = 1; // Start with 1 if no previous certificates exist
        }

        // Format the new certificate number
        $newCertificateNo = sprintf("CWL-%03d-%s", $nextNumber, $currentYear);

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
                        <h4 class="pl-2 pt-3 pb-2 font-20">WITH LOAD TEST</h4>
                                </div>
                        <!-- <div class="col-6 text-right">
                       <button type="button" class="btn" >View List</button>               
                        </div> -->

                        <div class="col-6 text-right">
    <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
</div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                <form action="save_with_load.php" method="POST">
                 <div class="row">
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Header Data</h4>
                                <!-- Form -->                          


                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Thorough Examination</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="theme-input-style" placeholder="Date of Thorough Examination" name="examination_date" required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Report</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="theme-input-style" placeholder="Date of Report" name="report_date" required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Report No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Report No" value="<?php echo $data['report_no'] ?? ''; ?>" name="report_no" required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Sticker No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Sticker No" value="<?php echo $data['sticker_number_issued'] ?? ''; ?>" name="sticker_no" required>
                                        </div>
                                    </div>           
                                    <!-- Form Row -->

                                     <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Project ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Project ID" value="<?php echo $data['project_no'] ?? ''; ?>" name="project_no" required readonly>
                                        </div>
                                    </div>                                          
                                    
                                    <!-- Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Serial No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Serial No" name="serial_numbers" required>
                                        </div>
                                    </div>                                          
                                    
                                    <!-- Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Company Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Company Name" name="company_name" required>
                                        </div>
                                    </div>       
                                    
                                <!-- </form> -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30" style="height: 540px;">
                                <h4 class="font-20 mb-30" >Customer Information / Inspector </h4>

                                <!-- Form -->
                                <!-- <form action="#" method="POST"> -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20" >
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Customer Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/user3.svg" alt="" class="svg">
                                                    </div>
                                                </div>                                                
                                                <input type="text" class="form-control pl-1" placeholder="Type Customer Name" value="<?php echo $data['customer_name'] ?? ''; ?>" name="customer_name" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Customer Email</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/mail3.svg" alt="" class="svg">
                                                    </div>
                                                </div>
                                                <input type="email" class="form-control pl-1" placeholder="Type Email Address" value="<?php echo $data['customer_email'] ?? ''; ?>" name="customer_email" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Mobile</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/mobile3.svg" alt="" class="svg">
                                                    </div>
                                                </div>
                                                <input type="number" class="form-control pl-1" placeholder="Contact Number" value="<?php echo $data['customer_mobile'] ?? ''; ?>" name="customer_mobile" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Inspector</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/key3.svg" alt="" class="svg">
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control pl-1" placeholder="Inspector name" name="inspector_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->                             

                                    
                                <!-- </form> -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>                       


<!-- <body part> -->



<div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <!-- <h4 class="font-20 mb-30">Header Data</h4> -->
                                <!-- Form -->
                                <!-- <form action="#" method="POST"> -->


<!-- Form Row -->
<div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Name and Address of employer for whom the thorough examination was made:</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="text" class="theme-input-style" placeholder="Name and Address of employer:" name="employer_address" required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    <!-- <h4 class="font-20 mb-30">Customer Information / Inspector </h4> -->                                   

                                    
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Description and Identification of the equipment:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Description and Identification of the equipment:" name="equipment_description" required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Manufacturer</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style"  placeholder="Manufacturer" name="manufacturer" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Model:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Model:" name="model" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment ID No.: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Equipment ID No" name="equipment_id" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Serial No.:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Equipment Serial No" name="equipment_serial_no" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Width</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Width" name="width" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Thickness</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Thickness" name="thickness" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold"> Certificate No.:         </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Enter Certificate No" name="certificate_no" required>
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold"> JRN:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Enter JRN" name="jrn" value="<?php echo $data['jrn'] ?? ''; ?>" required readonly>
                                        </div>
                                    </div>    
                                <!-- </form> -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>						
						
						
						
						<div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30" style="height: 720px;">
                                <!-- <h4 class="font-20 mb-30">Customer Information / Inspector </h4> -->

                                <!-- Form -->
                                <!-- <form action="#" method="POST"> -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Address of premises at which the examination was made:</label>
                                        </div>

                                        
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/user3.svg" alt="" class="svg">
                                                    </div>
                                                </div>
                                                
                                                <input type="text" class="form-control pl-1" placeholder="Type Address of premises" name="premises_address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->


                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold"> Safe Working Load:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Enter Safe Working Load" name="safe_working_load" required>
                                        </div>
                                    </div>
                                    
                                    <!-- End Form Row -->

                                    <!-- Additional Row 1 -->
<div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Date of Manufacture (if known):</label>
    </div>
    <div class="col-sm-8">
        <input type="date" class="theme-input-style" name="manufacture_date">
    </div>
</div>
<!-- End Additional Row 1 -->

<!-- Additional Row 2 -->
<div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Date of Last Thorough Examination:</label>
    </div>
    <div class="col-sm-8">
        <input type="date" class="theme-input-style" name="last_exam_date">
    </div>
</div>
<!-- End Additional Row 2 -->                                  
<!-- </form> -->
<!-- End Form -->
</div>
<!-- End Horizontal Form With Icons -->
</div>                                       
                     
                      
                      
                      
<div class="col-lg-6">
<!-- Base Horizontal Form -->
<div class="form-element py-30 mb-30" style="height: 330px;">
<!-- <h4 class="font-20 mb-30">Header Data</h4> -->
<!-- Form -->
<!-- <form action="#" method="POST"> -->


<!-- Form Row -->
<!-- Additional Input Row 3 (First Examination) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">Is this the first examination after installation or assembly at a new site or location?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="first_examination" value="yes"> YES</label>
        <label><input type="radio" name="first_examination" value="no"> NO</label>
    </div>
</div>

<!-- Additional Input Row 4 (Equipment Installation) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">If the answer to the above question is YES, has the equipment been installed correctly?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="installed_correctly" value="yes"> YES</label>
        <label><input type="radio" name="installed_correctly" value="no"> NO</label>
    </div>
</div>
                                    
                                <!-- </form> -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
						
<div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Was the examination carried out:</h4>

                                <!-- Form -->                                    

<!-- Additional Input Row 5 (Interval of 6 months) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">Within an interval of 6 months?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="interval_6_months" value="yes"> YES</label>
        <label><input type="radio" name="interval_6_months" value="no"> NO</label>
    </div>
</div>

<!-- Additional Input Row 6 (Interval of 12 months) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">Within an interval of 12 months?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="interval_12_months" value="yes"> YES</label>
        <label><input type="radio" name="interval_12_months" value="no"> NO</label>
    </div>
</div>

<!-- Additional Input Row 7 (Examination Scheme) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">In accordance with an examination scheme?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="examination_scheme" value="yes"> YES</label>
        <label><input type="radio" name="examination_scheme" value="no"> NO</label>
    </div>
</div>

<!-- Additional Input Row 8 (Exceptional Circumstances) -->
<div class="form-row mb-20">
    <div class="col-sm-6">
        <label class="font-14 bold">After the occurrence of exceptional circumstances?</label>
    </div>
    <div class="col-sm-6">
        <label><input type="radio" name="exceptional_circumstances" value="yes"> YES</label>
        <label><input type="radio" name="exceptional_circumstances" value="no"> NO</label>
    </div>
</div>                                   
                                    
                                <!-- End Form -->
</div>
                            <!-- End Horizontal Form With Icons -->
</div>     
                     

  <div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
        <!-- Form -->
        <!-- <form action="#" method="POST"> -->
<div class="row">    
<div class="col-lg-6">                    

<div class="form-group">
    <label class="font-14 bold mb-2">Identification of any part found to have a defect which is or could become a danger to persons and a description of the defect (If none state NONE)</label>
    <textarea class="theme-input-style" placeholder="Enter details" name="identification_any_part" required></textarea>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Is the above a defect which is of immediate danger to persons</label>
    <select class="theme-input-style" name="defect">
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Is the above a defect which is not yet but could become a danger to persons: (If YES state the date by when)</label>
    <input type="date" class="theme-input-style" name="date_defect">
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Particulars of any repair, renewal or alteration required to remedy the defect identified above:</label>
    <textarea class="theme-input-style" placeholder="Enter details" name="repair_details" required></textarea>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Particulars of any tests carried out as part of the examination: (If none state NONE) (SEE ATTACHED PAGE 2)</label>
    <textarea class="theme-input-style" placeholder="Enter details" name="test_particulars" required>Fork Length – 178 cm (Out) 171 cm (In)
    Load Applied @ Load Centre – 10 Ton @ 850 mm</textarea>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">IS THIS EQUIPMENT FIT FOR PURPOSE?</label>
    <select class="theme-input-style"  name="equipment_fit">
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>
</div>

<div class="col-lg-6">                        
<div class="form-group">
    <label class="font-14 bold mb-2">Name of person making this report:</label>
    <input type="text" class="theme-input-style" placeholder="Enter name" name="name_qualifications_person" required>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Qualifications of person making this report:</label>
    <input type="text" class="theme-input-style" placeholder="Enter qualifications" name="report_making_person_qualifications" required>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Name of person authenticating this report:</label>
    <input type="text" class="theme-input-style" placeholder="Name of person authenticating this report" name="authenticating_person_name" required>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Latest date by which next thorough examination must be carried out:</label>
    <input type="date" class="theme-input-style" name="latest_date_exam" required>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Name and address of employer of persons making and authenticating this report:</label>
    <textarea class="theme-input-style" placeholder="Enter name and address of employer of persons making and authenticating this report" name="name_address_of_employer" required></textarea>
</div>
</div>

</div>
</div>
        
</div>

</div>

<div class="form-group text-center mt-3">
<button type="submit" class="btn long" value="Save Certificate">Save All</button>
</div>
</form>

</div>

</div>
            
            <!-- End Main Content -->

            <?php 
        include_once('../../inc/footer.php');
        ?>
        