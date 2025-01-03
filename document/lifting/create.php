<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Ensure `project_id` is set in the request
if (isset($_GET['project_id']) && !empty($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // SQL query to join tables
    // $query = "
    //     SELECT 
    //         p.project_id, p.customer_name, p.customer_email, p.customer_mobile, p.company_name,
    //         c.checklist_no, c.inspected_by,
    //         r.report_no, r.sticker_number_issued, r.date_of_creation, r.rep_name
    //     FROM 
    //         project_info p
    //     LEFT JOIN 
    //         checklist_information c ON p.project_id = c.project_id
    //     LEFT JOIN 
    //         report r ON p.project_id = r.project_id
    //     WHERE 
    //         p.project_id = ?
    // ";



    $query = "
    SELECT 
        p.project_id, p.customer_name, p.customer_email, p.customer_mobile, p.inspector_name,
        c.checklist_no,
        r.report_no
    FROM 
        project_info p
    LEFT JOIN 
        checklist_information c ON p.project_id = c.project_id
    LEFT JOIN 
        reports r ON p.project_id = r.project_id
    WHERE 
        p.project_id = ?
";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $project_id);
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
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">LIFTING GEARS CERTIFICATE</h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn">View List</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        
        <form action="save_form.php" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-element py-30 mb-30">
                    <h4 class="font-20 mb-30">Header Data</h4>
                    
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Date of Report</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="date_of_report" class="theme-input-style" required>
                            </div>
                        </div>

                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="certificate_no" class="theme-input-style" required>
                            </div>
                        </div> -->

                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="certificate_no[]" class="theme-input-style certificate-no" value="24403-1" readonly>
                            </div>
                        </div> -->

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Report No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="report_no" class="theme-input-style" required>
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">JRN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="jrn" class="theme-input-style">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Color Code (if required)</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="color_code" class="theme-input-style">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Applicable Standard(s)</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="applicable_standards" class="theme-input-style">
                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" class="theme-input-style" name="project_id" value="<?php echo $data['project_id'] ?? ''; ?>" placeholder="Project ID">
                            </div>
                        </div>


                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="companyName" class="theme-input-style">
                            </div>
                        </div>
                    
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-element py-30 mb-30" style="height: 589px;">
                    <h4 class="font-20 mb-30">Customer Information / Inspector</h4>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Customer Name</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="customer_name" class="form-control pl-1" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Customer Email</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="email" name="customer_email" class="form-control pl-1" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Mobile</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" name="mobile" class="form-control pl-1" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Inspector</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="inspector" class="form-control pl-1" required>
                        </div>
                    </div>

                    
                </div>
            </div>
            </div>


            <div id="form-container">
                <div class="form-section">
                    <!-- General Information A -->

            <!-- General Information A -->
            <div class="row">
            <div class="col-lg-12">
                <div class="form-element py-30 multiple-column">
                    <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>

                    <div class="row">
                        <div class="col-lg-6">

                        <div class="form-group">
                        <label for="certificate_no">Certificate No:</label>
                        <input type="text" name="certificate_no[]" class="certificate-no" value="24403-1" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Name & Address of Employer</label>
                                <input type="text" name="employer_name_address[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Identification No./Serial No.</label>
                                <input type="text" name="identification_no[]" class="theme-input-style">
                            </div>

                            

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Working Load Limit / Safe Working Load (WLL/SWL)</label>
                                <input type="text" name="wll_swl[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">QTY</label>
                                <input type="text" name="qty[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Type</label>
                                <input type="text" name="type[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Last Examination</label>
                                <input type="date" name="date_last_examination[]" class="theme-input-style">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Manufacturer</label>
                                <input type="text" name="manufacturer[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Size</label>
                                <input type="text" name="size[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Length</label>
                                <input type="text" name="length[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Color</label>
                                <input type="text" name="color[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">No. of PLY (if any)</label>
                                <input type="text" name="ply[]" class="theme-input-style">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Information B -->
            <div class="col-lg-12">
                <div class="form-element py-30 multiple-column">
                    <h4 class="font-20 mb-20">B. GENERAL INFORMATION</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Address of Premises</label>
                                <input type="text" name="address_of_premises[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Next Examination Due Date</label>
                                <input type="date" name="next_examination_date[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Reason for Examination</label>
                                <input type="text" name="reason_for_examination[]" class="theme-input-style">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Examination</label>
                                <input type="date" name="date_of_this_examination[]" class="theme-input-style">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Details of Any Test Applied</label>
                                <textarea name="test_details[]" class="theme-input-style"></textarea>
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
                                <input type="text" name="status[]" class="theme-input-style">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Safe to Use</label>
                                <input type="text" name="safe_to_use[]" class="theme-input-style">
                            </div>
                        </div>
                    </div>

                    
                </div>
          
            </div>

                   
            </div>
            </div>
            </div>

            <!-- Add More Button -->
    <div class="text-center mb-4">
        <button id="add-form-btn" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add More
        </button>
    </div>
            <div class="form-group text-center mt-3">
                        <button type="submit" class="btn long" name="save_data_lifting">Save All</button>
                    </div>
            </form>
        
    </div>
</div>


<!-- FontAwesome for Icons -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>

<!-- JavaScript -->
<script>
        let certificateCounter = 1; // Starting counter for certificate numbers
document.getElementById("add-form-btn").addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default form submission

    const formContainer = document.getElementById("form-container");
    const formSection = document.querySelector(".form-section");
    const clonedForm = formSection.cloneNode(true); // Clone the form section

    // Increment the certificate counter and update the certificate number
    certificateCounter++;
    const certField = clonedForm.querySelector(".certificate-no");
    if (certField) {
        certField.value = `24403-${certificateCounter}`;
    }

    // Clear input values in the cloned form except for the certificate number
    clonedForm.querySelectorAll("input, textarea").forEach(input => {
        if (!input.classList.contains("certificate-no")) {
            input.value = "";
        }
    });

    // Append the cloned form to the container
    formContainer.appendChild(clonedForm);
});

    </script>


<?php include_once('../../inc/footer.php'); ?>
