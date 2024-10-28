<?php 
include_once('../../inc/function.php');

?>

            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="card bg-transparent pb-3">
                        <div class="card-body bg-white ">
                            <div class="row">
                               <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">WITH LOAD TEST</h4>
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
                    <input type="text" class="theme-input-style" placeholder="Enter client company name" name="client_company_name" required>
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
                    <input type="text" class="theme-input-style" placeholder="Enter report no" name="report_no" required>
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
                    <input type="text" class="theme-input-style" placeholder="Enter location" name="location" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Date of Inspection</label>
                    <input type="date" class="theme-input-style" name="date_of_inspection" required>
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
                    <input type="text" class="theme-input-style" placeholder="Enter Project ID" name="project_id" required>
                </div>

                <div class="form-group">
                    <label class="font-14 bold mb-2">Checklist No</label>
                    <input type="text" class="theme-input-style" placeholder="Enter Checklist No" name="checklist_no" required>
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
                    <tbody>
                        <!-- Rows for deficiencies and corrective actions -->
                        <tr>
                            <td>1</td>
                            <td><textarea class="theme-input-style" name="deficiency_1" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_1" placeholder="Enter corrective action"></textarea></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td><textarea class="theme-input-style" name="deficiency_2" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_2" placeholder="Enter corrective action"></textarea></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td><textarea class="theme-input-style" name="deficiency_3" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_3" placeholder="Enter corrective action"></textarea></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td><textarea class="theme-input-style" name="deficiency_4" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_4" placeholder="Enter corrective action"></textarea></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td><textarea class="theme-input-style" name="deficiency_5" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_5" placeholder="Enter corrective action"></textarea></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td><textarea class="theme-input-style" name="deficiency_6" placeholder="Enter deficiency"></textarea></td>
                            <td><textarea class="theme-input-style" name="corrective_action_6" placeholder="Enter corrective action"></textarea></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>

<div class="form-group text-center mt-3">
<button type="submit" class="btn long" value="Save Certificate">Save All</button>
</div>
</form>

</div>

</div>
            
            <!-- End Main Content -->

            <?php 
        include_once('../../inc/footer.php');
        ?>
        