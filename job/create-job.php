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
                                <form action="#" method="POST">

                                      <!-- Form Row -->
                                      <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Project No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="theme-input-style" placeholder="Project No">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Creation</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" class="theme-input-style" placeholder="Date of Creation">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="theme-input-style">

                                            <option value="">Select</option>
                                            <option value="">Lifting Equipment</option>
                                            <option value="">NDT Equipment</option>
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
                                            <select class="theme-input-style">

                                            <option value="">Select</option>
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                            </select>
                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Checklist Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select class="theme-input-style">
                                                    <option>Select Type</option>
                                                    <option>Articulating boom</option>
                                                    <option>Elevators</option>
                                                    <option>Mobile & Locomotive Cranes</option>
                                                    <option>Marine & Offshore Cranes</option>
                                                    <option>Storage Retrieval</option>
                                                    <option>Articulating Boom Cranes</option>
                                                    <option>Lifting Beam Spreader Bar</option>
                                                    <option>Powered Platforms (Sky Climbers)</option>
                                                    <option>Vehicle-Mounted Elevating & Aerial Rotating Devices</option>
                                                </select> 
                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                    
                           

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                </form>
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
                                            <select class="theme-input-style">

                                            <option value="">Select</option>
                                            <option value="">Customer name 1</option>
                                            <option value="">Customer name 2</option>
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
                                                <input type="email" class="form-control pl-1" placeholder="Type Email Address">
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
                                                <input type="number" class="form-control pl-1" placeholder="Contact Number">
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
                                            <select class="theme-input-style">

                                            <option value="">Select</option>
                                            <option value="">Inspector name 1</option>
                                            <option value="">Inspector name 2</option>
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
                                            <input type="text" class="theme-input-style" placeholder="location">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>

                      
                        </div>
                        <div class="col-lg-12 d-none">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 multiple-column">
                                <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>

                                <!-- Form -->
                            

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Vessel Name & Location</label>
                                                <input type="text" class="theme-input-style" placeholder="Vessel Name & Location">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Manufacturer</label>
                                                <input type="text" class="theme-input-style" placeholder="Manufacturer">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Type of Crane</label>
                                                <input type="text" class="theme-input-style" placeholder="Type of Crane">
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Asset Number</label>
                                                <input type="text" class="theme-input-style" placeholder="Asset Number">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Serial Number</label>
                                                <input type="text" class="theme-input-style" placeholder="Serial Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Model</label>
                                                <input type="text" class="theme-input-style" placeholder="Model">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Manufacturing Year</label>
                                                <input type="text" class="theme-input-style" placeholder="Manufacturing Year">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Address</label>
                                                <input type="text" class="theme-input-style" placeholder="Address">
                                            </div>
                                            <!-- End Form Group -->
                                              <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Capacity (SWL)	</label>
                                                <input type="text" class="theme-input-style" placeholder="Capacity (SWL)">
                                            </div>
                                            <!-- End Form Group -->
                                              <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">Date of Previous Test of Crane</label>
                                                <input type="date" class="theme-input-style" placeholder="Date of Previous Test of Crane">
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
                               
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>
                       
                            <!-- Form Row -->
                            <div class="form-row">
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div>

                                    </form>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            <?php 
        include_once('../inc/footer.php');
        ?>
        