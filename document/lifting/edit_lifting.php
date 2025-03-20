<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Ensure `project_no` is set in the request
if (isset($_GET['project_no']) && !empty($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Fetch project data
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
        echo "No data found for the given project ID.";
        exit;
    }


// Fetch static data (color_code and applicable_standards)
$staticQuery = "
    SELECT DISTINCT 
        color_code, applicable_standards, mobile
    FROM 
        lifting_gear_certificates 
    WHERE 
        project_no = ?
";
$staticStmt = $conn->prepare($staticQuery);
$staticStmt->bind_param("s", $project_no);
$staticStmt->execute();
$staticResult = $staticStmt->get_result();
$staticData = $staticResult->fetch_assoc(); // Fetch static fields




    // Fetch dynamic form data (e.g., lifting gear details)
    $dynamicQuery = "SELECT * FROM lifting_gear_certificates WHERE project_no = ?";
    $dynamicStmt = $conn->prepare($dynamicQuery);
    $dynamicStmt->bind_param("s", $project_no);
    $dynamicStmt->execute();
    $dynamicResult = $dynamicStmt->get_result();
    $dynamicData = [];
    while ($row = $dynamicResult->fetch_assoc()) {
        $dynamicData[] = $row;
    }
} else {
    echo "Invalid or missing project ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lifting Gear Certificate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .theme-input-style {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container-fluid">
            <form action="update_form.php" method="POST">
                <input type="hidden" name="project_no" value="<?php echo $data['project_no']; ?>">

                <!-- Static Fields -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-element py-30 mb-30">
                            <h4 class="font-20 mb-30">Header Data</h4>
                            <div class="form-row mb-20">
                                <div class="col-sm-4">
                                    <label class="font-14 bold">Date of Report</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="date" name="date_of_report" class="theme-input-style" value="<?php echo $data['inspection_date'] ?? ''; ?>" required>
                                </div>
                            </div>
                            <div class="form-row mb-20">
                                <div class="col-sm-4">
                                    <label class="font-14 bold">Report No</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="report_no" value="<?php echo $data['report_no'] ?? ''; ?>" class="theme-input-style" readonly required>
                                </div>
                            </div>
                            <!-- Add other static fields similarly -->
                            

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
<select name="color_code[]" class="theme-input-style">
<option value="A" <?php if(($staticData['color_code'] ?? '') == 'A') echo 'selected'; ?>>A</option>
<option value="B" <?php if(($staticData['color_code'] ?? '') == 'B') echo 'selected'; ?>>B</option>
<option value="C" <?php if(($staticData['color_code'] ?? '') == 'C') echo 'selected'; ?>>C</option>
<option value="D" <?php if(($staticData['color_code'] ?? '') == 'D') echo 'selected'; ?>>D</option>
<option value="E" <?php if(($staticData['color_code'] ?? '') == 'E') echo 'selected'; ?>>E</option>
</select>
    </div>
</div>



                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Applicable Standard(s)</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" name="applicable_standards" class="theme-input-style" value="<?php echo $staticData['applicable_standards']; ?>">

                            </div>
                        </div>

                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Project ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="project_no" class="theme-input-style" value="<?php echo $data['project_no']; ?>">
                            </div>
                        </div>


                        <!-- <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold mb-2">Company Name</label>
                            </div>
                            <div class="col-sm-8">
                            <input type="text" name="company_name" class="theme-input-style" value="<?php echo $staticData['companyName'] ?? ''; ?>">
                            </div>
                        </div> -->

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
                            <input type="number" name="mobile" class="form-control pl-1" value="<?php echo $staticData['mobile']; ?>" required>
                        </div>
                    </div>

                    <div class="form-row mb-20">
                        <div class="col-sm-4">
                            <label class="font-14 bold">Inspector</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="inspector" class="form-control pl-1" value="<?php echo $data['inspector_name']; ?>" required>
                        </div>
                    </div>


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


                    </div>
                </div>

                </div>

                <!-- Dynamic Fields -->
                <div id="form-container">
                    <?php foreach ($dynamicData as $index => $gear): ?>
                        <div class="form-section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-element py-30 multiple-column">
                                        <h4 class="font-20 mb-20">Lifting Gear Details #<?php echo $index + 1; ?></h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-14 bold mb-2">Certificate No</label>
                                                    <input type="text" name="certificate_no[]" class="theme-input-style certificate-no" value="<?php echo $gear['certificate_no'] ?? ''; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-14 bold mb-2">Name & Address of Employer</label>
                                                    <input type="text" name="employer_name_address[]" class="theme-input-style" value="<?php echo $gear['employer_name_address'] ?? ''; ?>">
                                                </div>
                                                <div class="form-group">
                                <label class="font-14 bold mb-2">Identification No./Serial No.</label>
                                <input type="text" name="identification_no[]" class="theme-input-style" value="<?php echo $gear['identification_no'] ?? ''; ?>">
                            </div>

                            

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Working Load Limit / Safe Working Load (WLL/SWL)</label>
                                <input type="text" name="wll_swl[]" class="theme-input-style" value="<?php echo $gear['wll_swl'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">QTY</label>
                                <input type="text" name="qty[]" class="theme-input-style" value="<?php echo $gear['qty'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Type</label>
                                <input type="text" name="type[]" class="theme-input-style" value="<?php echo $gear['type'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Last Examination</label>
                                <input type="date" name="date_last_examination[]" class="theme-input-style" value="<?php echo $gear['date_last_examination'] ?? ''; ?>">
                            </div>
                                                <!-- Add other dynamic fields similarly -->
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-14 bold mb-2">Manufacturer</label>
                                                    <input type="text" name="manufacturer[]" class="theme-input-style" value="<?php echo $gear['manufacturer'] ?? ''; ?>">
                                                </div>
                                                <!-- Add other dynamic fields similarly -->


                                                <div class="form-group">
                                <label class="font-14 bold mb-2">Size</label>
                                <input type="text" name="size[]" class="theme-input-style" value="<?php echo $gear['size'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Length</label>
                                <input type="text" name="length[]" class="theme-input-style" value="<?php echo $gear['length'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Color</label>
                                <input type="text" name="color[]" class="theme-input-style" value="<?php echo $gear['color'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">No. of PLY (if any)</label>
                                <input type="text" name="ply[]" class="theme-input-style" value="<?php echo $gear['ply'] ?? ''; ?>">
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
                                <input type="text" name="address_of_premises[]" class="theme-input-style" value="<?php echo $gear['address_of_premises'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Next Examination Due Date</label>
                                <input type="date" name="next_examination_date[]" class="theme-input-style" value="<?php echo $gear['next_examination_date'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Reason for Examination</label>
                                <input type="text" name="reason_for_examination[]" class="theme-input-style" value="<?php echo $gear['reason_for_examination'] ?? ''; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-14 bold mb-2">Date of Examination</label>
                                <input type="date" name="date_of_this_examination[]" class="theme-input-style" value="<?php echo $gear['date_of_this_examination']; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Details of Any Test Applied</label>
                                <textarea name="test_details[]" class="theme-input-style" value="<?php echo $gear['test_details']; ?>">

                                </textarea>
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
                                <input type="text" name="status[]" class="theme-input-style" value="<?php echo $gear['status'] ?? ''; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-14 bold mb-2">Safe to Use</label>
                                <input type="text" name="safe_to_use[]" class="theme-input-style" value="<?php echo $gear['safe_to_use'] ?? ''; ?>">
                            </div>
                        </div>
                    </div>                    
                </div>          
            </div> 



                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Add More Button -->
                <div class="text-center mb-4">
                    <button id="add-form-btn" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add More
                    </button>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn long">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let certificateCounter = <?php echo count($dynamicData); ?>; // Start counter from the number of existing records
        const currentYear = new Date().getFullYear();

        document.getElementById("add-form-btn").addEventListener("click", function (e) {
            e.preventDefault();

            const formContainer = document.getElementById("form-container");
            const formSection = document.querySelector(".form-section");
            const clonedForm = formSection.cloneNode(true);

            // Increment the certificate counter
            certificateCounter++;
            const certField = clonedForm.querySelector(".certificate-no");

            if (certField) {
                const newCertificateNo = `CLC-${String(certificateCounter).padStart(3, "0")}-${currentYear}`;
                certField.value = newCertificateNo;
            }

            // Clear input values in the cloned form
            clonedForm.querySelectorAll("input").forEach((input) => {
                if (!input.classList.contains("certificate-no")) {
                    input.value = "";
                }
            });

            formContainer.appendChild(clonedForm);
        });
    </script>
</body>
</html>