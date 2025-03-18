<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php');

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
                        <h4 class="pl-2 pt-3 pb-2 font-20">MAGNETIC PARTICLE INSPECTION CERTIFICATE</h4>
                                </div>
                        <div class="col-6 text-right">
                       <button type="button" class="btn" >View List</button>               
                        </div>
                </div>
            </div>
        </div>

            </div>
                <div class="container-fluid">
                <form action="save_mpi_certificate.php" method="POST" enctype="multipart/form-data">
                 <div class="row">
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Header Data</h4>
                                <!-- Form -->
                                
                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Report</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="theme-input-style" name="date_of_report" placeholder="Date of Report">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Certificate No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="certificate_no" placeholder="Certificate No">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Report No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="report_no" value="<?php echo $data['report_no'] ?? ''; ?>" placeholder="Report No" readonly >
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">JRN</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="jrn" value="<?php echo $data['jrn'] ?? ''; ?>" placeholder="JRN" readonly>
                                        </div>
                                    </div>


                                    <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="project_no" class="theme-input-style" value="<?php echo $data['project_no'] ?? ''; ?>" readonly>
                            </div>
                        </div>


                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="companyName" class="theme-input-style">
                            </div>
                        </div>   -->
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Customer Information / Inspector </h4>

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
                                                
                                                <input type="text" class="form-control pl-1" name="customer_name" value="<?php echo $data['customer_name'] ?? ''; ?>" placeholder="Type Your Name" readonly>
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
                                                <input type="email" class="form-control pl-1" name="customer_email" value="<?php echo $data['customer_email'] ?? ''; ?>" placeholder="Type Email Address" readonly>
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
                                                <input type="number" class="form-control pl-1" name="mobile" placeholder="Contact Number" value="<?php echo $data['customer_mobile'] ?? ''; ?>" readonly>
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
                                                <input type="text" class="form-control pl-1" name="inspector" placeholder="Inspector name" value="<?php echo $data['inspector_name'] ?? ''; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->          
                                     
                                    
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

                                    
                                
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>                       

                      

  <div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
        <!-- Form -->
        
<div class="row">    
<div class="col-lg-6">
                    <!-- <div class="form-group">
                        <label class="font-14 bold mb-2">CERTIFICATE NO.</label>
                        <input type="text" class="theme-input-style" name="" placeholder="Enter CERTIFICATE NO." value="">
                    </div>
  
                    <div class="form-group">
                        <label class="font-14 bold mb-2">CUSTOMER NAME</label>
                        <input type="text" class="theme-input-style" name="" placeholder="Enter CUSTOMER NAME" value="">
                    </div> -->

                    <div class="form-group">
                        <label class="font-14 bold mb-2">LOCATION</label>
                        <input type="text" class="theme-input-style" name="location" placeholder="Enter LOCATION" value="">
                    </div>                 
                    
                    <div class="form-group">
                        <label class="font-14 bold mb-2">INSPECTION DATE</label>
                        <input type="date" class="theme-input-style" name="inspection_date" placeholder="INSPECTION DATE" value="">
                    </div> 


</div>

                    <div class="col-lg-6">                        
                    <div class="form-group">
                        <label class="font-14 bold mb-2">REFERENCE NO</label>
                        <input type="text" class="theme-input-style" name="reference_no" placeholder="Enter REFERENCE NO" value="">
                    </div>    
   
                    <div class="form-group">
                        <label class="font-14 bold mb-2">Next Inspection Date</label>
                        <input type="date" class="theme-input-style" name="next_inspection_date" placeholder="Next Inspection Date" value="">
                    </div>
</div>
</div>           
        
        <!-- End Form -->
    </div>
        
</div>




<!-- Section 2 -->

<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">B. GENERAL INFORMATION</h4>
        <!-- Form -->
        
<div class="row">
<div class="col-lg-6">    
                    <div class="form-group">
                        <label class="font-14 bold mb-2">INSPECTED ITEM</label>
                        <input type="text" class="theme-input-style" name="inspected_item" placeholder="Enter INSPECTED ITEM" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">SERIAL NUMBERS</label>
                        <input type="text" class="theme-input-style" name="serial_numbers" placeholder="Enter SERIAL NUMBERS" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">ID</label>
                        <input type="text" class="theme-input-style" name="id_numbers" placeholder="Enter ID" value="">
                    </div>
</div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">MANUFACTURER / EQUIP. NO.</label>
                        <input type="text" class="theme-input-style" name="manufacturer" placeholder="Enter MANUFACTURER / EQUIP. NO." value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">STANDARDS</label>
                        <input type="text" class="theme-input-style" name="standards" placeholder="Enter STANDARDS" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">SWL</label>
                        <input type="text" class="theme-input-style" name="swl" placeholder="Enter SWL" value="">
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
        <h4 class="font-20 mb-20">TESTING TOOLS</h4>
        <!-- Form -->
        
<div class="row">
<div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">MPI EQUIP. TYPE</label>
                        <input type="text" class="theme-input-style" name="mpi_equip_type" placeholder="MPI EQUIP. TYPE" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">CURRENT</label>
                        <input type="text" class="theme-input-style" name="current" placeholder="Enter CURRENT" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">CONTRAST PAINT</label>
                        <input type="text" class="theme-input-style" name="contrast_paint" placeholder="Enter CONTRAST PAINT" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">PARTICLE MEDIUM</label>
                        <input type="text" class="theme-input-style" name="particle_medium" placeholder="Enter PARTICLE MEDIUM" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">CALIBRATION EXPIRY DATE</label>
                        <input type="date" class="theme-input-style" name="calibration_expiry_date" placeholder="Enter CALIBRATION EXPIRY DATE" value="">
                    </div>                    
</div>


<div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">BRAND</label>
                        <input type="text" class="theme-input-style" name="brand" placeholder="Enter BRAND" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">PROD. SPACING</label>
                        <input type="text" class="theme-input-style" name="prod_spacing" placeholder="Enter PROD. SPACING" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">INK</label>
                        <input type="text" class="theme-input-style" name="ink" placeholder="Enter INK" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">YOKE S/N</label>
                        <input type="text" class="theme-input-style" name="yoke_sn" placeholder="Enter YOKE S/N" value="">
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">MODEL NO.</label>
                        <input type="text" class="theme-input-style" name="model_no" placeholder="Enter MODEL NO." value="">
                    </div>
</div>

            </div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>





<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">       
        <!-- Form -->
        
        <div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label class="font-14 bold mb-2">Upload Image</label>
      <input type="file" name="image[]" id="image" class="theme-input-style" accept="image/*" placeholder="Upload Image">
    </div>
    <div id="additional-images"></div>
    <button type="button" id="add-image-button" class="btn btn-primary mt-3">Add Another Image</button>
  </div>
</div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>




<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">       
        <!-- Form -->

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
                        <label class="font-14 bold mb-2">RESULT</label>
                        <input type="text" class="theme-input-style" name="result" placeholder="Enter RESULT" value="">
        </div>                   
    </div>
<div class="col-lg-6">
        <div class="form-group">
                        <label class="font-14 bold mb-2">COMMENTS / ACTION</label>
                        <input type="text" class="theme-input-style" name="comments" placeholder="Enter COMMENTS / ACTION" value="">
        </div>                   
</div>
</div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>




<!-- <div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">       
       

<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="font-14 bold mb-2">NDT Inspector</label>
<input type="text" class="theme-input-style" name="ndt_inspector" placeholder="Enter NDT Inspector" value="">
        </div>                   
    </div>
<div class="col-lg-6">
        <div class="form-group">
<label class="font-14 bold mb-2">NDT Level III</label>
<input type="text" class="theme-input-style" name="ndt_level" placeholder="Enter NDT Level III" value="">
        </div>                   
</div>
</div>

            
        
       
    </div>
       
</div> -->

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
        
        <script>
  document.getElementById('add-image-button').addEventListener('click', function() {
    const additionalImagesContainer = document.getElementById('additional-images');
    const newFormGroup = document.createElement('div');
    newFormGroup.className = 'form-group mt-3';
    newFormGroup.innerHTML = `
      <input type="file" name="image[]" class="theme-input-style" accept="image/*" placeholder="Upload Image">
    `;
    additionalImagesContainer.appendChild(newFormGroup);
  });
</script>