<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Check if 'project_id' is passed
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Query to fetch checklist_no based on project_id
    // $query = "SELECT checklist_no FROM checklist_information WHERE project_id = '$project_id' LIMIT 1";

    $query = "
    SELECT c.checklist_no, c.client_name, c.location, c.equipment_type, c.inspection_date, c.report_no,
           p.project_no, p.creation_date, p.sticker_status, p.customer_name, p.equipment_location,
           p.inspector_name, p.checklist_type
    FROM checklist_information c
    JOIN project_info p ON c.project_id = p.project_id
    WHERE c.project_id = '$project_id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $checklist_no = $row['checklist_no'];
        $client_name = $row['client_name'];
        $location = $row['location'];
        $equipment_type = $row['equipment_type'];
        $inspection_date = $row['inspection_date'];
        $report_no = $row['report_no'];
        $project_no = $row['project_no'];
        $creation_date = $row['creation_date'];
        $sticker_status = $row['sticker_status'];
        $customer_name = $row['customer_name'];
        $equipment_location = $row['equipment_location'];
        $inspector_name = $row['inspector_name'];
        $checklist_type = $row['checklist_type'];
    } else {
        echo "No checklist found for the provided Project ID!";
        exit;
    }
} else {
    echo "No project ID provided!";
    exit;
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
                <form action="save_report.php" method="POST">
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
                    <textarea class="theme-input-style" placeholder="Enter company address" name="client_company_address" required></textarea>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Manufacturer</label>
                    <input type="text" class="theme-input-style" placeholder="Enter manufacturer" name="manufacturer" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Model</label>
                    <input type="text" class="theme-input-style" placeholder="Enter model" name="model" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Type</label>
                    <input type="text" class="theme-input-style" placeholder="Enter type" name="type" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Previous Sticker S.No.</label>
                    <input type="text" class="theme-input-style" placeholder="Enter previous sticker serial number" name="prev_sticker_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Issued by</label>
                    <input type="text" class="theme-input-style" placeholder="Issued by" name="issued_by" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Capacity</label>
                    <input type="text" class="theme-input-style" placeholder="Enter capacity" name="capacity" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Report No</label>
                    <input type="text" class="theme-input-style" value="<?php echo htmlspecialchars($report_no); ?>" name="report_no" required>
                </div>

            </div>

            <div class="col-lg-6">                        
                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Identification Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter identification number" name="equipment_id_no" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Equipment Serial Number</label>
                    <input type="text" class="theme-input-style" placeholder="Enter serial number" name="equipment_serial_no" required>
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
                    <input type="text" class="theme-input-style" placeholder="Enter sticker number issued" name="sticker_number_issued" required>
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
                    <input type="text" class="theme-input-style" placeholder="Enter JRN" name="jrn" required>
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
        