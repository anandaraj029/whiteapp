<?php 
include_once('../../inc/function.php');

?>

            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                   
                        <div class="col-lg-12">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 multiple-column">
                                <h4 class="font-20 mb-20">Checklist Information</h4>

                                <!-- Form -->
                                <form action="#" method="POST">

                                    <div class="row">
                                        <div class="col-lg-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                <label class="font-14 bold mb-2">Checklist NO</label>
                                                <input type="text" class="theme-input-style" placeholder="Checklist NO">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">REPORT NO</label>
                                                <input type="text" class="theme-input-style" placeholder="REPORT NO">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">CLIENT’S NAME</label>
                                                <input type="text" class="theme-input-style" placeholder="CLIENT’S NAME">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">LOCATION</label>
                                                <input type="text" class="theme-input-style" placeholder="LOCATION">
                                            </div>
                                            <!-- End Form Group -->
                                             
                                       
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">CRANE ASSET NO</label>
                                                <input type="text" class="theme-input-style" placeholder="CRANE ASSET NO">
                                            </div>
                                            <!-- End Form Group -->
                                             
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">EQUIPMENT TYPE</label>
                                                <input type="text" class="theme-input-style" placeholder="EQUIPMENT TYPE">
                                            </div>
                                            <!-- End Form Group -->
                                        </div>

                                        <div class="col-lg-6">

                                         <!-- Form Group -->
                                         <div class="form-group">
                                                <label class="font-14 bold mb-2">Checklist Type</label>
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
                                            <!-- End Form Group -->
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">INSPECTION DATE</label>
                                                <input type="text" class="theme-input-style" placeholder="INSPECTION DATE">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">INSPECTED BY</label>
                                                <input type="text" class="theme-input-style" placeholder="INSPECTED BY">
                                            </div>
                                            <!-- End Form Group -->
                                            
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">STICKER NO</label>
                                                <input type="text" class="theme-input-style" placeholder="STICKER NO">
                                            </div>
                                            <!-- End Form Group -->
                                               <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">CRANE SERIAL NO.</label>
                                                <input type="text" class="theme-input-style" placeholder="CRANE SERIAL NO.">
                                            </div>
                                            <!-- End Form Group -->
                                               <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="font-14 bold mb-2">CAPACITY (SWL)</label>
                                                <input type="text" class="theme-input-style" placeholder="CAPACITY (SWL)">
                                            </div>
                                            <!-- End Form Group -->

                                               <!-- Form Group -->
                                            
                                            <!-- End Form Group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                                <label class="font-14 bold mb-2">REMARKS / RECOMMENDATIONS:</label>
                                             <textarea class="form-control" placeholder="Remarks" row="5" name="remarks"></textarea>
                                            </div>
                                    <!-- Form Row -->
                                    <div class="form-group pt-1">
                                        <div class="d-flex align-items-center mb-3">
                                            <!-- Custom Checkbox -->
                                            <label class="custom-checkbox position-relative mr-2">
                                                <input type="checkbox" id="check5">
                                                <span class="checkmark"></span>
                                            </label>
                                            <!-- End Custom Checkbox -->
                                            
                                            <label for="check5">Remember me</label>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn long">Submit</button>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            <?php 
        include_once('../../inc/footer.php');
        ?>
        