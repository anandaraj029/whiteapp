<?php 
include_once('../inc/function.php');





?>

            <!-- Main Content -->
            <div class="main-content">

                        <div class="container-fluid">
                        <div class="card bg-transparent pb-3">
                         <div class="card-body bg-white ">

                    <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Create New Project
                        </h4>
                    </div>
                        <div class="col-6 text-right">
                   <a href="overall-job-list.php">
                    <button type="button" class="btn">View List</button>               
                   </a>   
                </div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                 <div class="row">

                        <div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Project Data</h4>

                                <!-- Form -->
                                <form action="../file/create-job.php" method="POST">

                                      <!-- Form Row -->
                                      <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Project No*</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="project_no" class="theme-input-style" placeholder="Project No">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Creation*</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="creation_date" class="theme-input-style" placeholder="Date of Creation">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="equipment_type" class="theme-input-style">
                                        <option value="Lifting Equipment">Lifting Equipment</option>
                                        <option value="NDT Equipment">NDT Equipment</option>
                                    </select>
                                                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                      <!-- Form Row -->
                                      <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Sticker / Non Sticker</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="sticker_status" class="theme-input-style">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Checklist Type</label>
                                        </div>
                                        <div class="col-sm-8">

                                        <select name="checklist_type" class="theme-input-style">
                                            <option value="Articulating boom">Articulating boom</option>
                                            <option value="Elevators">Elevators</option>
                                            <option value="Mobile & Locomotive Cranes">Mobile & Locomotive Cranes</option>
                                            <option value="Marine & Offshore Cranes">Marine & Offshore Cranes</option>
                                            <option value="Storage Retrieval">Storage Retrieval</option>
                                            <option value="Articulating Boom Cranes">Articulating Boom Cranes</option>
                                            <option value="Lifting Beam Spreader Bar">Lifting Beam Spreader Bar</option>
                                            <option value="Powered Platforms (Sky Climbers)">Powered Platforms (Sky Climbers)</option>
                                            <option value="Vehicle-Mounted Elevating & Aerial Rotating Devices">Vehicle-Mounted Elevating & Aerial Rotating Devices</option>
                                        </select>
                                       
                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    
                           

                                    <!-- Form Row -->
                                    <!-- <div class="form-row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div> -->
                                    <!-- End Form Row -->
                             
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
                                            <label class="font-14 bold">Select Customer</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="customer_name" class="theme-input-style">
                                        <option value="Customer name 1">Customer name 1</option>
                                        <option value="Customer name 2">Customer name 2</option>
                                    </select>
                                                                    
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
                                                <input type="email" name="customer_email" class="form-control pl-1" placeholder="Type Email Address">

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
                                                <input type="number" name="customer_mobile" class="form-control pl-1" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                     <!-- Form Row -->
                                     <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Select Inspector</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="inspector_name" class="theme-input-style">
                                        <option value="Inspector name 1">Inspector name 1</option>
                                        <option value="Inspector name 2">Inspector name 2</option>
                                    </select>
                                                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                         <!-- Form Row -->
                                         <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Location</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="text" name="equipment_location" class="theme-input-style" placeholder="Location">
                                        </div>
                                    </div>
                           
                              
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>

                      
                        </div>
                   
                       
                            <!-- Form Row -->
                            <div class="form-row">
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" id="confirm-text" class="btn long s_alert">Save</button>
                                        </div>
                                    </div>

                                    </form>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script>
   document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        swal({
            icon: "success",
            title: "Success!",
            text: "Your project has been created successfully.",
        });
    } else if (status === 'error') {
        swal({
            icon: "error",
            title: "Error!",
            text: "There was an issue creating your project. " + (message || ""),
        });
    } else if (status === 'invalid_request') {
        swal({
            icon: "warning",
            title: "Invalid Request!",
            text: "This page does not accept GET requests.",
        });
    }
});

</script>

<?php 
        include_once('../inc/footer.php');
        ?>
        