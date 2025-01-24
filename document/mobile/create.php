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
        $certQuery = "SELECT certificate_no FROM mobile_crane_loadtest ORDER BY id DESC LIMIT 1";
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
                        <h4 class="pl-2 pt-3 pb-2 font-20">MOBILE CRANE LOAD TEST CERTIFICATE</h4>
                                </div>
                        <div class="col-6 text-right">
                       <button type="button" class="btn" >View List</button>               
                        </div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                <form action="save_mobile_certificate.php" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" class="theme-input-style" placeholder="Report No" name="report_no" value="<?php echo $data['report_no'] ?? ''; ?>" readonly required>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Sticker No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Sticker No" value="<?php echo $data['report_no'] ?? ''; ?>" name="sticker_no" required>
                                        </div>
                                    </div>
                               
                                <!-- End Form -->

                                <!-- Form Row -->
                                <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Project ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Project ID" value="<?php echo $data['project_no'] ?? ''; ?>" name="project_no" required>
                                        </div>
                                    </div>
                               
                                <!-- End Form -->


                                <!-- Form Row -->
                                <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Company Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Company Name" name="company_name" required>
                                        </div>
                                    </div>
                               
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Customer Information / Inspector </h4>

                                <!-- Form -->                               

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
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
                                                
                                                <input type="text" class="form-control pl-1" placeholder="Type Your Name"  name="customer_name" required>
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
                                                <input type="email" class="form-control pl-1" placeholder="Type Email Address" name="customer_email" required>
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
                                                <input type="number" class="form-control pl-1" placeholder="Contact Number" name="customer_mobile" required>
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
                                                <input type="text" class="form-control pl-1" placeholder="Inspector name"  name="inspector_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->         
                                
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>                       

<div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <!-- <h4 class="font-20 mb-30">Header Data</h4> -->
                                <!-- Form -->
                              


<!-- Form Row -->
<div class="form-row mb-20">
   <div class="col-sm-4">
   <label class="font-14 bold">Name and Address of employer for whom the thorough examination was made:</label>
   </div>
    <div class="col-sm-8">
    <input type="text" class="theme-input-style" placeholder="Name and Address of employer:" name="employer_address">
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
                                            <input type="text" class="theme-input-style" placeholder="Description and Identification of the equipment:" name="equipment_description">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Manufacturer</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Manufacturer" name="manufacturer">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Model:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Model:" name="model">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment ID No.: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Equipment ID No"  name="equipment_id">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Serial No.:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Equipment Serial No" name="equipment_serial_no">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Main Hook Block SWL:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Main Hook Block SWL" name="main_hook_block_swl">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Serial No.:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Serial No" name="serial_numbers">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Rope Dia.:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Rope Dia" name="rope_dia">
                                        </div>
                                    </div>

                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Falls:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Falls" name="falls">
                                        </div>
                                    </div>


                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold"> Certificate No.:
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Enter Certificate No" name="certificate_no" value="<?= $newCertificateNo ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold"> JRN:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Enter JRN" name="jrn">
                                        </div>
                                    </div>                                
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
						
						
						<div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30" style="height: 638px;">
                                <!-- <h4 class="font-20 mb-30">Customer Information / Inspector </h4> -->

                                <!-- Form -->
                                

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
                                                
                                                <input type="text" class="form-control pl-1" placeholder="Type Address of premises" name="premises_address">
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
                                            <input type="text" class="theme-input-style" placeholder="Enter Safe Working Load" name="safe_working_load">
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
                                    
                                
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>     


                        <!-- end -->
                      
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30" style="height: 367px;">
                                <!-- <h4 class="font-20 mb-30">Header Data</h4> -->
                                <!-- Form -->
                                


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
                                    
                                
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
						
						
						
						
						<div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Was the examination carried out:</h4>

                                <!-- Form -->
                              

                                    <!-- Form Row -->
                                    <!-- End Form Row -->
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


                        <!-- end -->
                    

  <div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
        <!-- Form -->
      
<div class="row">    
<div class="col-lg-6">
                    

<div class="form-group">
    <label class="font-14 bold mb-2">Identification of any part found to have a defect which is or could become a danger to persons and a description of the defect (If none state NONE)</label>
    <textarea class="theme-input-style" placeholder="Enter details" name="identification_any_part"></textarea>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Is the above a defect which is of immediate danger to persons</label>
    <select class="theme-input-style" name="defect">
        <!-- <option name="">Select</option> -->
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
    <textarea class="theme-input-style" placeholder="Enter details" name="repair_details"></textarea>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Particulars of any tests carried out as part of the examination: (If none state NONE) (SEE ATTACHED PAGE 2)</label>
    <textarea class="theme-input-style" placeholder="Enter details" name="test_particulars"></textarea>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">IS THIS EQUIPMENT FIT FOR PURPOSE?</label>
    <select class="theme-input-style" name="equipment_fit">
        <!-- <option name="">Select</option> -->
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>


</div>

                    <div class="col-lg-6">
                        
                    <div class="form-group">
    <label class="font-14 bold mb-2">Name of person making this report:</label>
    <input type="text" class="theme-input-style" placeholder="Enter name & qualifications" name="name_qualifications_person">
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Qualifications of person making this report:</label>
    <input type="text" class="theme-input-style" placeholder="Enter qualifications" name="report_making_person_qualifications">
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Name of person authenticating this report:</label>
    <input type="text" class="theme-input-style" placeholder="Enter name" name="authenticating_person_name">
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Latest date by which next thorough examination must be carried out:</label>
    <input type="date" class="theme-input-style" name="latest_date_exam">
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Name and address of employer of persons making and authenticating this report:</label>
    <textarea class="theme-input-style" placeholder="Enter name and address" name="name_address_of_employer"></textarea>
</div>

</div>
</div>



            
        
        <!-- End Form -->
    </div>
        
</div>




<!-- Section 2 -->

<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">B. LOAD TEST</h4>
        <!-- Form -->
        
<div class="row">
<div class="col-lg-6">

                    <div class="form-group">
                        <label class="font-14 bold mb-2">Boom Length (m)</label>
                        <input type="text" class="theme-input-style" placeholder="Enter Boom Length (m)" name="boom_length">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">Boom Angle (°)</label>
                        <input type="text" class="theme-input-style" placeholder="Enter Boom Angle (°)" name="boom_angle">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">SWL/Test Weight</label>
                        <input type="text" class="theme-input-style" placeholder="Enter SWL/Test Weight" name="swl_test_weight">
                    </div>
</div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">	Radius (m)	</label>
                        <input type="text" class="theme-input-style" placeholder="Enter Radius (m)" name="radius">
                    </div>
                    <!-- <div class="form-group">
                        <label class="font-14 bold mb-2">STANDARDS</label>
                        <input type="text" class="theme-input-style" placeholder="Enter STANDARDS" name="">
                    </div> -->
                    <div class="form-group">
                        <label class="font-14 bold mb-2">COMMENTS</label>
                        <input type="text" class="theme-input-style" placeholder="Enter Comments" name="comments">
                    </div>
</div>
            </div>

            
        
        <!-- End Form -->
    </div>
    <!-- End Horizontal Form With Icons -->


    
</div>
<!-- end of section 2 -->





<!-- start of section 3 -->
<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">C. RESULT OF INSPECTION</h4>
        <!-- Form -->
        
<div class="row">
<div class="col-lg-6">


<div class="form-group">
                        <label class="font-14 bold mb-2">Boom Lifting</label>
                        <select class="theme-input-style" name="boom_lifting">
                            <option value="GOOD">GOOD</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>

<div class="form-group">
                        <label class="font-14 bold mb-2">M. Winch Hoist</label>
                        <select class="theme-input-style" name="m_winch_hoist">
                            <option value="GOOD">GOOD</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>

<div class="form-group">
                        <label class="font-14 bold mb-2">Aux. Winch Hoist</label>
                        <select class="theme-input-style" name="aux_winch_hoist">
                            <option value="N/A">N/A</option>
                            <option value="GOOD">GOOD</option>
                        </select>
                    </div>


<div class="form-group">
    <label class="font-14 bold mb-2">Boom Extending</label>
    <select class="theme-input-style" name="boom_extending">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">Outriggers</label>
    <select class="theme-input-style" name="outriggers">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">Swings / Slew</label>
    <select class="theme-input-style" name="swings_slew">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>



<div class="form-group">
    <label class="font-14 bold mb-2">Hydraulic System</label>
    <select class="theme-input-style" name="hydraulic_system">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>




</div>


<div class="col-lg-6">
<div class="form-group">
    <label class="font-14 bold mb-2">Auto Moment Limiter</label>
    <select class="theme-input-style" name="auto_moment_limiter">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Swing & Winch Brake</label>
    <select class="theme-input-style" name="swing_winch_brake">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Winch Drum Lock (Pawl)</label>
    <select class="theme-input-style" name="winch_drum_lock">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">Leveling Device</label>
    <select class="theme-input-style" name="leveling_device">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">Hook Block Assembly</label>
    <select class="theme-input-style" name= "hook_block_assembly">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>


<div class="form-group">
    <label class="font-14 bold mb-2">Boom Angle Indicator</label>
    <select class="theme-input-style" name= "boom_angle_indicator">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>

<div class="form-group">
    <label class="font-14 bold mb-2">Wind Speed Indicator (Anemometer)</label>
    <select class="theme-input-style" name="wind_speed_indicator">
    <option value="GOOD">GOOD</option>
    <option value="N/A">N/A</option>
    </select>
</div>



</div>

            </div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>


<!-- End of section 3 -->

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
        