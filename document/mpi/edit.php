<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch the record based on project_no
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no']; // Assuming project_no is passed via URL

    // Fetch certificate record
    $query = "SELECT * FROM mpi_certificates WHERE project_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch certificate record
    } else {
        echo "No record found!";
        exit; // Stop further execution
    }

    // Fetch associated images from mpi_images table
    $imageQuery = "SELECT id, image_path FROM mpi_images WHERE certificate_id = ?";
    $imageStmt = $conn->prepare($imageQuery);
    $imageStmt->bind_param('i', $row['id']); // Use the certificate's ID
    $imageStmt->execute();
    $imageResult = $imageStmt->get_result();

    $images = [];
    if ($imageResult->num_rows > 0) {
        while ($imageRow = $imageResult->fetch_assoc()) {
            $images[] = $imageRow; // Store image data
        }
    }
} else {
    echo "Invalid request! No project_no provided.";
    exit; // Stop further execution
}
?>


            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="card bg-transparent pb-3">
                        <div class="card-body bg-white ">
                            <div class="row">
                               <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">EDIT MAGNETIC PARTICLE INSPECTION CERTIFICATE</h4>
                                </div>
                        <div class="col-6 text-right">
                       <button type="button" class="btn" >View List</button>               
                        </div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                <form action="update_mpi.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="project_no" value="<?php echo $row['project_no']; ?>" />
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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
                                            <input type="date" class="theme-input-style" name="date_of_report" value="<?php echo $row['date_of_report']; ?>"  placeholder="Date of Report">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Certificate No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="certificate_no" value="<?php echo $row['certificate_no']; ?>" placeholder="Certificate No" readonly>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Report No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="report_no" value="<?php echo $row['report_no']; ?>" placeholder="Report No" readonly>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">JRN</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" name="jrn" value="<?php echo $row['jrn']; ?>" placeholder="JRN" readonly>
                                        </div>
                                    </div>


                                    <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="project_no" class="theme-input-style" value="<?php echo $row['project_no']; ?>" readonly>
                            </div>
                        </div>


                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="companyName" class="theme-input-style" value="<?php echo $row['companyName']; ?>" readonly>
                            </div>
                        </div> -->
                                           
                                    
                                    
                                
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
                                                
                                                <input type="text" class="form-control pl-1" name="customer_name" placeholder="Type Your Name" value="<?php echo $row['customer_name']; ?>" readonly>
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
                                                <input type="email" class="form-control pl-1" name="customer_email" value="<?php echo $row['customer_email']; ?>"  placeholder="Type Email Address" readonly>
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
                                                <input type="number" class="form-control pl-1" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Contact Number" readonly>
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
                                                <input type="text" class="form-control pl-1" name="inspector" value="<?php echo $row['inspector']; ?>" placeholder="Inspector name" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->                                

<!-- Technical Manager Dropdown -->
<div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Technical Manager</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="theme-input-style" name="technical_manager">
                                    <option value="Veera" <?php echo ($row['technical_manager'] ?? '') === 'Veera' ? 'selected' : ''; ?>>Veera</option>
                                    <option value="Sathish" <?php echo ($row['technical_manager'] ?? '') === 'Sathish' ? 'selected' : ''; ?>>Sathish</option>
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

                    <div class="form-group">
                        <label class="font-14 bold mb-2">LOCATION</label>
                        <input type="text" class="theme-input-style" name="location" placeholder="Enter LOCATION" value="<?php echo $row['location']; ?>">
                    </div>                 
                    
                    <div class="form-group">
                        <label class="font-14 bold mb-2">INSPECTION DATE</label>
                        <input type="date" class="theme-input-style" name="inspection_date" placeholder="INSPECTION DATE" value="<?php echo $row['inspection_date']; ?>">
                    </div> 


</div>

                    <div class="col-lg-6">                        
                    <div class="form-group">
                        <label class="font-14 bold mb-2">REFERENCE NO</label>
                        <input type="text" class="theme-input-style" name="reference_no" placeholder="Enter REFERENCE NO" value="<?php echo $row['reference_no']; ?>">
                    </div>    
   
                    <div class="form-group">
                        <label class="font-14 bold mb-2">Next Inspection Date</label>
                        <input type="date" class="theme-input-style" name="next_inspection_date" placeholder="Next Inspection Date" value="<?php echo $row['next_inspection_date']; ?>">
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
                        <input type="text" class="theme-input-style" name="inspected_item" placeholder="Enter INSPECTED ITEM" value="<?php echo $row['inspected_item']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">SERIAL NUMBERS</label>
                        <input type="text" class="theme-input-style" name="serial_numbers" placeholder="Enter SERIAL NUMBERS" value="<?php echo $row['serial_numbers']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">ID</label>
                        <input type="text" class="theme-input-style" name="id_numbers" placeholder="Enter ID" value="<?php echo $row['id_numbers']; ?>" >
                    </div>
</div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">MANUFACTURER / EQUIP. NO.</label>
                        <input type="text" class="theme-input-style" name="manufacturer" placeholder="Enter MANUFACTURER / EQUIP. NO." value="<?php echo $row['manufacturer']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">STANDARDS</label>
                        <input type="text" class="theme-input-style" name="standards" placeholder="Enter STANDARDS" value="<?php echo $row['standards']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">SWL</label>
                        <input type="text" class="theme-input-style" name="swl" placeholder="Enter SWL" value="<?php echo $row['swl']; ?>" >
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
                        <input type="text" class="theme-input-style" name="mpi_equip_type" placeholder="MPI EQUIP. TYPE" value="<?php echo $row['mpi_equip_type']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">CURRENT</label>
                        <input type="text" class="theme-input-style" name="current" placeholder="Enter CURRENT" value="<?php echo $row['current']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">CONTRAST PAINT</label>
                        <input type="text" class="theme-input-style" name="contrast_paint" placeholder="Enter CONTRAST PAINT" value="<?php echo $row['contrast_paint']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">PARTICLE MEDIUM</label>
                        <input type="text" class="theme-input-style" name="particle_medium" placeholder="Enter PARTICLE MEDIUM" value="<?php echo $row['particle_medium']; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="font-14 bold mb-2">CALIBRATION EXPIRY DATE</label>
                        <input type="date" class="theme-input-style" name="calibration_expiry_date" placeholder="Enter CALIBRATION EXPIRY DATE" value="<?php echo $row['calibration_expiry_date']; ?>" >
                    </div>                    
</div>


<div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-14 bold mb-2">BRAND</label>
                        <input type="text" class="theme-input-style" name="brand" placeholder="Enter BRAND" value="<?php echo $row['brand']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">PROD. SPACING</label>
                        <input type="text" class="theme-input-style" name="prod_spacing" placeholder="Enter PROD. SPACING" value="<?php echo $row['prod_spacing']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">INK</label>
                        <input type="text" class="theme-input-style" name="ink" placeholder="Enter INK" value="<?php echo $row['ink']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">YOKE S/N</label>
                        <input type="text" class="theme-input-style" name="yoke_sn" placeholder="Enter YOKE S/N" value="<?php echo $row['yoke_sn']; ?>" >
                    </div>

                    <div class="form-group">
                        <label class="font-14 bold mb-2">MODEL NO.</label>
                        <input type="text" class="theme-input-style" name="model_no" placeholder="Enter MODEL NO." value="<?php echo $row['model_no']; ?>" >
                    </div>
</div>
            </div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>




<!-- Image Upload Section -->
<div class="col-lg-12">
                    <!-- Image Upload Section -->
                    <div class="form-group">
                        <label>Upload Images</label>
                        <?php foreach ($images as $image): ?>
                            <div>
                                <img src="<?php echo $image['image_path']; ?>" alt="Image" style="max-width: 200px;">
                                <a href="delete_image.php?image_id=<?php echo $image['id']; ?>&project_no=<?php echo $project_no; ?>"
                                   onclick="return confirm('Are you sure you want to delete this image?');">
                                    Delete
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <input type="file" name="images[]" multiple>
                    </div>
                </div>







<div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">       
        <!-- Form -->

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
                        <label class="font-14 bold mb-2">RESULT</label>
                        <input type="text" class="theme-input-style" name="result" placeholder="Enter RESULT" value="<?php echo $row['result']; ?>" >
        </div>                   
    </div>
<div class="col-lg-6">
        <div class="form-group">
                        <label class="font-14 bold mb-2">COMMENTS / ACTION</label>
                        <input type="text" class="theme-input-style" name="comments" placeholder="Enter COMMENTS / ACTION" value="<?php echo $row['comments']; ?>" >
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
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-14 bold mb-2">NDT Inspector</label>
            <input type="text" class="theme-input-style" name="ndt_inspector" placeholder="Enter NDT Inspector" value="<?php echo $row['inspector']; ?>" readonly>
            <?php
                $inspector_name = strtolower(str_replace(' ', '_', $row['inspector']));
                $signature_path = "../../inspector/uploads/$inspector_name/images/signature_image.jpg";
                
                if (!file_exists($signature_path)) {
                    $signature_path = "../default-signature.jpg"; // Fallback image
                }
            ?>
            <div style="margin-top: 10px;">
                <img src="<?php echo $signature_path; ?>" alt="Inspector Signature" style="width: 120px; height: 60px; border: 1px solid #ccc;">
            </div>
        </div>                   
    </div>

    <!-- <div class="col-lg-6">
        <div class="form-group">
            <label class="font-14 bold mb-2">NDT Level III</label>
            <input type="text" class="theme-input-style" name="ndt_level" placeholder="Enter NDT Level III" value="<?php echo $row['ndt_level']; ?>" readonly>
        </div>                   
    </div> -->
</div>



<div class="row">
<div class="col-lg-12">
<div class="form-element py-30">
<button type="submit" class="btn btn-success">Update Certificate</button>
</div>
</div>
</div>

            
        
        <!-- End Form -->
    </div>
       <!-- End Horizontal Form With Icons -->
</div>

                        </div>                        
                    </div>                    

                    </form>            
                </div>
            </div>
            <!-- End Main Content -->

<?php 
        include_once('../../inc/footer.php');
?>        


<!-- Script to Add More File Inputs -->
<script>
  document.getElementById('add-image-button').addEventListener('click', function() {
    const additionalImagesContainer = document.getElementById('additional-images');
    const newFormGroup = document.createElement('div');
    newFormGroup.className = 'form-group mt-3';
    newFormGroup.innerHTML = `
      <input type="file" name="images[]" class="theme-input-style" accept="image/*" placeholder="Upload Image">
    `;
    additionalImagesContainer.appendChild(newFormGroup);
  });
</script>