<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary files
include_once('../../inc/function.php');
include_once('../../file/config.php'); // Ensure this file initializes $conn

// Check if database connection is working
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables
$jrn = '';
$checklist_no = '';
$report_no = '';    
$client_name = '';
$client_company_address = '';
$manufacturer = '';
$model = '';
$type = '';
$prev_sticker_no = '';
$issued_by = '';
$capacity = '';
$equipment_id_no = '';
$equipment_serial_no = '';
$location = '';
$inspection_date = '';
$next_inspection_due_date = '';
$inspection_status = '';
$sticker_number_issued = '';
$created_at = '';
$project_id = '';

// Fetch data if `project_id` is provided
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Prepare SQL query to fetch the report data
    $query = "SELECT * FROM reports WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $project_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $report_data = $result->fetch_assoc();

            // Map data to variables
            $jrn = $report_data['jrn'];
            $checklist_no = $report_data['checklist_no'];
            $report_no = $report_data['report_no'];
            $client_name = $report_data['client_company_name'];
            $client_company_address = $report_data['client_company_address'];
            $manufacturer = $report_data['manufacturer'];
            $model = $report_data['model'];
            $type = $report_data['type'];
            $prev_sticker_no = $report_data['prev_sticker_no'];
            $issued_by = $report_data['issued_by'];
            $capacity = $report_data['capacity'];
            $equipment_id_no = $report_data['equipment_id_no'];
            $equipment_serial_no = $report_data['equipment_serial_no'];
            $location = $report_data['location'];
            $inspection_date = $report_data['date_of_inspection'];
            $next_inspection_due_date = $report_data['next_inspection_due_date'];
            $inspection_status = $report_data['inspection_status'];
            $sticker_number_issued = $report_data['sticker_number_issued'];
            $created_at = $report_data['created_at'];
        } else {
            die("No record found for project ID: $project_id");
        }
    } else {
        die("Error fetching data: " . $stmt->error);
    }

    $stmt->close();
} else {
    die("Project ID is not set.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data safely
    $client_name = $_POST['client_company_name'] ?? '';
    $client_company_address = $_POST['client_company_address'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $model = $_POST['model'] ?? '';
    $type = $_POST['type'] ?? '';
    $prev_sticker_no = $_POST['prev_sticker_no'] ?? '';
    $issued_by = $_POST['issued_by'] ?? '';
    $capacity = $_POST['capacity'] ?? '';
    $report_no = $_POST['report_no'] ?? '';
    $equipment_id_no = $_POST['equipment_id_no'] ?? '';
    $equipment_serial_no = $_POST['equipment_serial_no'] ?? '';
    $location = $_POST['location'] ?? '';
    $inspection_date = $_POST['date_of_inspection'] ?? '';
    $next_inspection_due_date = $_POST['next_inspection_due_date'] ?? '';
    $inspection_status = $_POST['inspection_status'] ?? '';
    $sticker_number_issued = $_POST['sticker_number_issued'] ?? '';
    $jrn = $_POST['jrn'] ?? '';

    // Update the database
    $query = "UPDATE reports SET 
        client_company_name = ?, 
        client_company_address = ?, 
        manufacturer = ?, 
        model = ?, 
        type = ?, 
        prev_sticker_no = ?, 
        issued_by = ?, 
        capacity = ?, 
        report_no = ?, 
        equipment_id_no = ?, 
        equipment_serial_no = ?, 
        location = ?, 
        date_of_inspection = ?, 
        next_inspection_due_date = ?, 
        inspection_status = ?, 
        sticker_number_issued = ?, 
        jrn = ? 
        WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssssssi", 
        $client_name, $client_company_address, $manufacturer, $model, $type, $prev_sticker_no, 
        $issued_by, $capacity, $report_no, $equipment_id_no, $equipment_serial_no, 
        $location, $inspection_date, $next_inspection_due_date, $inspection_status, 
        $sticker_number_issued, $jrn, $project_id
    );

    if ($stmt->execute()) {
        echo "Data updated successfully.";
    } else {
        die("Error updating data: " . $stmt->error);
    }

    $stmt->close();
}
?>



            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="card bg-transparent pb-3">
                        <div class="card-body bg-white ">
                            <div class="row">
                               <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">REPORT</h4>
                                </div>
                        <!-- <div class="col-6 text-right">
                       <button type="button" class="btn" >View List</button>               
                        </div> -->

                        <div class="col-6 text-right">
    <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
</div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                <form action="" method="POST">
                <!-- <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> -->
                 <div class="row">
                        

<!-- <body part> -->


                     

  <div class="col-lg-12">    
    <div class="form-element py-30 multiple-column">
        <h4 class="font-20 mb-20">A. GENERAL INFORMATION</h4>
        <!-- Form -->
        <!-- <form action="#" method="POST"> -->
        <div class="row">    
            <div class="col-lg-6">                    

                <div class="form-group">
                    <label class="font-14 bold mb-2">Client Company / Name</label>
                    <!-- <input type="text" class="theme-input-style" placeholder="Enter client company name" name="client_company_name" required> -->
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($client_name); ?>" name="client_company_name" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Client Company Address</label>
                    <textarea class="theme-input-style" name="client_company_address" required><?php echo htmlspecialchars($client_company_address); ?></textarea>

                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Manufacturer</label>
                    <input type="text" class="theme-input-style" placeholder="Enter manufacturer" value="<?php echo htmlspecialchars($manufacturer); ?>" name="manufacturer" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Model</label>
                    <input type="text" class="theme-input-style" placeholder="Enter model" value="<?php echo htmlspecialchars($model); ?>" name="model" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Type</label>
                    <input type="text" class="theme-input-style" placeholder="Enter type" value="<?php echo htmlspecialchars($type); ?>" name="type" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Previous Sticker S.No.</label>
                    <input type="text" class="theme-input-style" placeholder="Enter previous sticker serial number" value="<?php echo htmlspecialchars($prev_sticker_no); ?>" name="prev_sticker_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Issued by</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($issued_by); ?>" value="<?php echo htmlspecialchars($issued_by); ?>"  placeholder="Issued by" name="issued_by" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Capacity</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($capacity); ?>" placeholder="Enter capacity" name="capacity" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Report No</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_no); ?>" placeholder="Enter report no" name="report_no" required>
                </div>

            </div>

            <div class="col-lg-6">                        
                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Identification Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter identification number" value="<?php echo htmlspecialchars($equipment_id_no); ?>" name="equipment_id_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Serial Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter serial number" value="<?php echo htmlspecialchars($equipment_serial_no); ?>" name="equipment_serial_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Location</label>
                    <!-- <input type="text" class="theme-input-style" placeholder="Enter location" name="location" required> -->
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($location); ?>" name="location" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Date of Inspection</label>
                    <!-- <input type="date" class="theme-input-style" name="date_of_inspection" required> -->                    
                    <input type="date" class="theme-input-style" value="<?php echo htmlspecialchars($inspection_date); ?>" name="date_of_inspection" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Next Inspection Due Date</label>
                    <input type="date" class="theme-input-style" name="next_inspection_due_date" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Inspection Status</label>
                    <div>
                        <label><input type="radio" name="inspection_status" value="Passed"> Passed</label>
                        <label><input type="radio" name="inspection_status" value="Failed"> Failed</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Sticker Number Issued</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($sticker_number_issued); ?>" placeholder="Enter sticker number issued" name="sticker_number_issued" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Project ID</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($project_id); ?>" name="project_id" readonly required>


                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Checklist No</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($checklist_no); ?>" name="checklist_no" readonly required>
                </div>

              


                <div class="form-group">
                    <label class="font-14 bold mb-2">JRN</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($jrn); ?>" placeholder="Enter JRN" name="jrn" required>
                </div>

            </div>
        </div>

        <h4 class="font-20 mb-20">B. DEFICIENCIES</h4>
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Deficiencies</th>
                        <th>Corrective Action Taken</th>
                    </tr>
                </thead>
                <tbody id="deficiencyTable">
                    <tr>
                        <td>1</td>
                        <td><textarea class="theme-input-style" name="deficiency[]" placeholder="Enter deficiency"></textarea></td>
                        <td><textarea class="theme-input-style" name="corrective_action[]" placeholder="Enter corrective action"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" onclick="addRow()">Add Row</button>
            </div>
        </div>
    </div>
</div>


</div>

<div class="form-group text-center mt-3">
<button type="submit" class="btn long" value="Save Certificate">Save All</button>
</div>
</form>


 <!-- JavaScript for Adding Rows -->
 <script>
            function addRow() {
                const table = document.getElementById('deficiencyTable');
                const rowCount = table.rows.length + 1;
                const newRow = `
                    <tr>
                        <td>${rowCount}</td>
                        <td><textarea class="theme-input-style" name="deficiency[]" placeholder="Enter deficiency"></textarea></td>
                        <td><textarea class="theme-input-style" name="corrective_action[]" placeholder="Enter corrective action"></textarea></td>
                    </tr>
                `;
                table.insertAdjacentHTML('beforeend', newRow);
            }
        </script>
        
</div>

</div>
            
            <!-- End Main Content -->

            <?php 
        include_once('../../inc/footer.php');
        ?>
        