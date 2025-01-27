<?php 
include_once('../inc/function.php');
include_once('../file/config.php');

// Fetch inspector names from the database
$sql = "SELECT inspector_name FROM inspectors"; // Assuming 'inspector_name' is the column
$result = mysqli_query($conn, $sql); // Execute query
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
                                <div class="form-group">
                                    <div class="custom-select style--two">
                                        <select name="assign_inspector" class="theme-input-style" id="exampleSelect3">
                                            <?php
                                            // Check if the query returned any results
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                // Fetch and display each inspector name
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . htmlspecialchars($row['inspector_name']) . '">' . htmlspecialchars($row['inspector_name']) . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No inspectors available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
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
        