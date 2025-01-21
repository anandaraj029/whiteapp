<?php
ob_start();  // Start output buffering

include_once('../../inc/function.php');
include_once('../../file/config.php'); // Database connection

// Check if 'project_id' is provided
if (!isset($_GET['project_id'])) {
    die("Project ID is not set.");
}

$project_id = $_GET['project_id'];

// Fetch existing report data
$query = "SELECT * FROM reports WHERE project_id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $report_data = $result->fetch_assoc();
} else {
    die("No record found for project ID: $project_id");
}
$stmt->close();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jrn = $_POST['jrn'];
    $checklist_no = $_POST['checklist_no'];
    $report_no = $_POST['report_no'];    
    $client_company_name = $_POST['client_company_name'];
    $client_company_address = $_POST['client_company_address'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $prev_sticker_no = $_POST['prev_sticker_no'];
    $issued_by = $_POST['issued_by'];
    $capacity = $_POST['capacity'];
    $equipment_id_no = $_POST['equipment_id_no'];
    $equipment_serial_no = $_POST['equipment_serial_no'];
    $location = $_POST['location'];
    $date_of_inspection = $_POST['date_of_inspection'];
    $next_inspection_due_date = $_POST['next_inspection_due_date'];
    $inspection_status = $_POST['inspection_status'];
    $sticker_number_issued = $_POST['sticker_number_issued'];
    
    // Handle deficiencies
    $deficiencies = $_POST['deficiency'];
    $corrective_actions = $_POST['corrective_action'];
    $deficiencyData = [];

    foreach ($deficiencies as $index => $deficiency) {
        $corrective_action = $corrective_actions[$index];
        $deficiencyData[] = [
            'deficiency' => $deficiency,
            'corrective_action' => $corrective_action,
        ];
    }

    $deficiencyJson = json_encode($deficiencyData);

    // Validate date format
    if (!strtotime($date_of_inspection) || !strtotime($next_inspection_due_date)) {
        echo "Invalid date format provided.";
        exit;
    }

    // Update query
    $updateQuery = "UPDATE reports SET 
        jrn = ?, checklist_no = ?, report_no = ?, client_company_name = ?, client_company_address = ?, manufacturer = ?, 
        model = ?, type = ?, prev_sticker_no = ?, issued_by = ?, capacity = ?, equipment_id_no = ?, equipment_serial_no = ?, 
        location = ?, date_of_inspection = ?, next_inspection_due_date = ?, inspection_status = ?, sticker_number_issued = ?, 
        deficiencies = ? WHERE project_id = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssssssssssssssssssi", 
        $jrn, $checklist_no, $report_no, $client_company_name, $client_company_address, $manufacturer, 
        $model, $type, $prev_sticker_no, $issued_by, $capacity, $equipment_id_no, $equipment_serial_no, 
        $location, $date_of_inspection, $next_inspection_due_date, $inspection_status, $sticker_number_issued, 
        $deficiencyJson, $project_id
    );

    if ($stmt->execute()) {
        header("Location: index.php?msg=Report updated successfully");
        exit();
    } else {
        error_log("Error updating data: " . $stmt->error);
        echo "Error saving report. Please try again.";
        exit();
    }

    $stmt->close();
    $conn->close();
}
ob_end_flush();  // Flush the output buffer
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
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['client_company_name']); ?>" name="client_company_name" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Client Company Address</label>
                    <textarea class="theme-input-style" name="client_company_address" required><?php echo htmlspecialchars($report_data['client_company_address']); ?></textarea>

                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Manufacturer</label>
                    <input type="text" class="theme-input-style" placeholder="Enter manufacturer" value="<?php echo htmlspecialchars($report_data['manufacturer']); ?>" name="manufacturer" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Model</label>
                    <input type="text" class="theme-input-style" placeholder="Enter model" value="<?php echo htmlspecialchars($report_data['model']); ?>" name="model" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Type</label>
                    <input type="text" class="theme-input-style" placeholder="Enter type" value="<?php echo htmlspecialchars($report_data['type']); ?>" name="type" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Previous Sticker S.No.</label>
                    <input type="text" class="theme-input-style" placeholder="Enter previous sticker serial number" value="<?php echo htmlspecialchars($report_data['prev_sticker_no']); ?>" name="prev_sticker_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Issued by</label>
                    <input type="text" class="theme-input-style"  value="<?php echo htmlspecialchars($report_data['issued_by']); ?>"  placeholder="Issued by" name="issued_by" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Capacity</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['capacity']); ?>" placeholder="Enter capacity" name="capacity" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Report No</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['report_no']); ?>" placeholder="Enter report no" name="report_no" required>
                </div>

            </div>

            <div class="col-lg-6">                        
                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Identification Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter identification number" value="<?php echo htmlspecialchars($report_data['equipment_id_no']); ?>" name="equipment_id_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Serial Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter serial number" value="<?php echo htmlspecialchars($report_data['equipment_serial_no']); ?>" name="equipment_serial_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Location</label>
                    <!-- <input type="text" class="theme-input-style" placeholder="Enter location" name="location" required> -->
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['location']); ?>" name="location" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Date of Inspection</label>
                    <!-- <input type="date" class="theme-input-style" name="date_of_inspection" required> -->                    
                    <input type="date" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['date_of_inspection']); ?>" name="date_of_inspection" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Next Inspection Due Date</label>
                    <input type="date" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['next_inspection_due_date']); ?>" name="next_inspection_due_date" required>
                </div>

                <!-- Inspection Status -->
<div class="form-group">
    <label class="font-14 bold mb-2">Inspection Status</label>
    <div>
        <label>
            <input type="radio" name="inspection_status" value="Passed" <?php echo ($report_data['inspection_status'] == 'Passed') ? 'checked' : ''; ?>> Passed
        </label>
        <label>
            <input type="radio" name="inspection_status" value="Failed" <?php echo ($report_data['inspection_status'] == 'Failed') ? 'checked' : ''; ?>> Failed
        </label>
    </div>
</div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Sticker Number Issued</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['sticker_number_issued']); ?>" placeholder="Enter sticker number issued" name="sticker_number_issued" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Project ID</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['project_id']); ?>" name="project_id" readonly required>


                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Checklist No</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['checklist_no']); ?>" name="checklist_no" readonly required>
                </div>

              


                <div class="form-group">
                    <label class="font-14 bold mb-2">JRN</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_data['jrn']); ?>" placeholder="Enter JRN" name="jrn" required>
                </div>

            </div>
        </div>

        <!-- Deficiency Table -->
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
            <?php
                // Decode the JSON data from the database for deficiencies
                $deficiencyData = json_decode($report_data['deficiencies'], true);
                if ($deficiencyData) {
                    foreach ($deficiencyData as $index => $deficiency) {
                        echo '<tr>';
                        echo '<td>' . ($index + 1) . '</td>';
                        echo '<td><textarea class="theme-input-style" name="deficiency[]" placeholder="Enter deficiency">' . htmlspecialchars($deficiency['deficiency']) . '</textarea></td>';
                        echo '<td><textarea class="theme-input-style" name="corrective_action[]" placeholder="Enter corrective action">' . htmlspecialchars($deficiency['corrective_action']) . '</textarea></td>';
                        echo '</tr>';
                    }
                } else {
                    // If no deficiencies, display one empty row
                    echo '<tr>';
                    echo '<td>1</td>';
                    echo '<td><textarea class="theme-input-style" name="deficiency[]" placeholder="Enter deficiency"></textarea></td>';
                    echo '<td><textarea class="theme-input-style" name="corrective_action[]" placeholder="Enter corrective action"></textarea></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
    <!-- <button type="button" onclick="addRow()">Add Row</button> -->
    </div>
</div>
    </div>
</div>


</div>

<div class="form-group text-center mt-3">
<!-- <button type="submit" class="btn long" value="Save Certificate">Save All</button> -->
<button type="submit" class="btn long">Update Report</button>

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
        