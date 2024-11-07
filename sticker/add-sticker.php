<?php 
include_once('../inc/function.php');

?>

            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Bulk sticker create</h4>

                                <!-- Form -->
                                <form action="./sticker-create.php" method="POST">

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Sticker Start No</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="text" name="sticker_start_no" class="theme-input-style" placeholder="Sticker Start No">
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Assign Inspector</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <div class="form-group ">
                                    
                                    <div class="custom-select style--two">
                                    <select name="assign_inspector" class="theme-input-style" id="exampleSelect3">
                                        <option value="Inspector name 1	">Inspector name 1	</option>
                                        <option value="Inspector name 2	">Inspector name 2</option>
                                        <!-- <option value="03">Inspector 03</option>
                                        <option value="04">Inspector 04</option>
                                        <option value="05">Inspector 05</option> -->
                                    </select>
                                    </div>
                                </div>
                                            <!-- <input type="email" class="theme-input-style" placeholder="Assign Inspector"> -->
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">No of Sticker</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="number" name="no_of_stickers" class="theme-input-style" placeholder="No of Sticker">
                                        </div>
                                    </div>
                                
                                    <div class="form-row justify-content-end">
                                        <div class="col-sm-8">
                                            <div class="d-flex align-items-center mb-3">
                                                <!-- Custom Checkbox -->
                                                <label class="custom-checkbox position-relative mr-2">
                                                    <input type="checkbox" id="check1">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <!-- End Custom Checkbox -->
                                                
                                                <label for="check1">Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn long">Create now</button>
                                        </div>
                                    </div>
                                    <!-- End Form Row -->
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            <?php 
        include_once('../inc/footer.php');
        ?>
        