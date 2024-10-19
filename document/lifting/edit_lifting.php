<?php
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// Fetch existing data (assuming the certificate_no is passed via GET)
$projectid = $_GET['projectid']; // Get the certificate number from URL
$query = "SELECT * FROM lifting_gears_certificate WHERE projectid = '$projectid'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result); // Fetch data into an associative array
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">EDIT LIFTING GEARS CERTIFICATE</h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn" onclick="window.location.href='index.php'">View List</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="update_data_lifting.php" method="POST">
            <input type="hidden" name="projectid" value="<?php echo $data['projectid']; ?>" />

            <div class="row">
                <!-- Header Data Form Section -->
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Header Data</h4>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Date of Report</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="date_of_report" class="theme-input-style" value="<?php echo $data['date_of_report']; ?>" required>
                            </div>
                        </div>
                        <!-- Repeat similar structure for other fields, pre-populating values from $data -->


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="certificate_no" class="theme-input-style"  value="<?php echo $data['certificate_no']; ?>" required>
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="report_no" class="theme-input-style"  value="<?php echo $data['report_no']; ?>" required>
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="jrn" class="theme-input-style" value="<?php echo $data['jrn']; ?>">
                            </div>
                        </div>


                        <div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold mb-2">Color Code (if required)</label>
    </div>
    <div class="col-sm-8">
        <select name="color_code" class="theme-input-style">
            <option value="A" <?php if($data['color_code'] == 'A') echo 'selected'; ?>>A</option>
            <option value="B" <?php if($data['color_code'] == 'B') echo 'selected'; ?>>B</option>
            <option value="C" <?php if($data['color_code'] == 'C') echo 'selected'; ?>>C</option>
            <option value="D" <?php if($data['color_code'] == 'D') echo 'selected'; ?>>D</option>
            <option value="E" <?php if($data['color_code'] == 'E') echo 'selected'; ?>>E</option>
        </select>
    </div>
</div>



                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Applicable Standard(s)</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="applicable_standards" class="theme-input-style" value="<?php echo $data['applicable_standards']; ?>">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="projectid" class="theme-input-style" value="<?php echo $data['projectid']; ?>">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="companyName" class="theme-input-style" value="<?php echo $data['companyName']; ?>">
                            </div>
                        </div>
                    

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Customer Information / Inspector</h4>

                        <!-- Customer Name Field -->
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="customer_name" class="form-control pl-1" value="<?php echo $data['customer_name']; ?>" required>
                            </div>
                        </div>

                        <!-- Repeat similar structure for other fields -->


                        <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Customer Email</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="email" name="customer_email" class="form-control pl-1" value="<?php echo $data['customer_email']; ?>" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Mobile</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" name="mobile" class="form-control pl-1" value="<?php echo $data['mobile']; ?>" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Inspector</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="inspector" class="form-control pl-1" value="<?php echo $data['inspector']; ?>" required>
                        </div>
                    </div>


                    </div>
                </div>
            </div>

            <!-- General Information A, B, C Sections (pre-populate fields as necessary) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 multiple-column">
                        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
                        <!-- Prepopulate similar form groups using $data array -->

                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Name & Address of Employer</label>
                                <input type="text" name="employer_name_address" class="theme-input-style" value="<?php echo $data['employer_name_address']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Identification No./Serial No.</label>
                                <input type="text" name="identification_no" class="theme-input-style" value="<?php echo $data['identification_no']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Working Load Limit / Safe Working Load (WLL/SWL)</label>
                                <input type="text" name="wll_swl" class="theme-input-style" value="<?php echo $data['wll_swl']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">QTY</label>
                                <input type="text" name="qty" class="theme-input-style" value="<?php echo $data['qty']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Type</label>
                                <input type="text" name="type" class="theme-input-style" value="<?php echo $data['type']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Last Examination</label>
                                <input type="date" name="date_last_examination" class="theme-input-style" value="<?php echo $data['date_last_examination']; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Manufacturer</label>
                                <input type="text" name="manufacturer" class="theme-input-style" value="<?php echo $data['manufacturer']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Size</label>
                                <input type="text" name="size" class="theme-input-style" value="<?php echo $data['size']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Length</label>
                                <input type="text" name="length" class="theme-input-style" value="<?php echo $data['length']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Color</label>
                                <input type="text" name="color" class="theme-input-style" value="<?php echo $data['color']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">No. of PLY (if any)</label>
                                <input type="text" name="ply" class="theme-input-style" value="<?php echo $data['ply']; ?>">
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <!-- Repeat for Sections B and C -->


                <div class="col-lg-12">
                <div class="form-element py-30 multiple-column">
                    <h4 class="font-20 mb-20">B. GENERAL INFORMATION</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Address of Premises</label>
                                <input type="text" name="address_of_premises" class="theme-input-style" value="<?php echo $data['address_of_premises']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Next Examination Due Date</label>
                                <input type="date" name="next_examination_date" class="theme-input-style" value="<?php echo $data['next_examination_date']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Reason for Examination</label>
                                <input type="text" name="reason_for_examination" class="theme-input-style" value="<?php echo $data['reason_for_examination']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Examination</label>
                                <input type="date" name="date_of_this_examination" class="theme-input-style" value="<?php echo $data['date_of_this_examination']; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
    <div class="form-group">
        <label class="font-14 bold mb-2">Details of Any Test Applied</label>
        <textarea name="test_details" class="theme-input-style"><?php echo $data['test_details']; ?></textarea>
    </div>
</div>

                    </div>
                </div>
            </div>





              <!-- General Information C -->
              <div class="col-lg-12">
                <div class="form-element py-30 multiple-column">
                    <h4 class="font-20 mb-20">C. GENERAL INFORMATION</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Status</label>
                                <input type="text" name="status" class="theme-input-style" value="<?php echo $data['status']; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Safe to Use</label>
                                <input type="text" name="safe_to_use" class="theme-input-style" value="<?php echo $data['safe_to_use']; ?>">
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>


            </div>

            <div class="form-group text-center mt-3">
                <button type="submit" class="btn long" name="update_data_lifting">Update All</button>
            </div>
        </form>
    </div>
</div>

<?php include_once('../../inc/footer.php'); ?>
