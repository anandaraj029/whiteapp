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
                                <form action="save_checklist.php" method="POST">
                                <!-- <input type="hidden" name="checklist_type"> Example checklist type -->

    <div class="row">
        <div class="col-lg-6">
            <!-- Checklist NO -->
            <div class="form-group">
                <label class="font-14 bold mb-2">Checklist NO</label>
                <input type="text" name="checklist_no" class="theme-input-style" placeholder="Checklist NO" required>
            </div>
            
            <!-- REPORT NO -->
            <div class="form-group">
                <label class="font-14 bold mb-2">REPORT NO</label>
                <input type="text" name="report_no" class="theme-input-style" placeholder="REPORT NO" required>
            </div>
            
            <!-- CLIENT’S NAME -->
            <div class="form-group">
                <label class="font-14 bold mb-2">CLIENT’S NAME</label>
                <input type="text" name="client_name" class="theme-input-style" placeholder="CLIENT’S NAME" required>
            </div>
            
            <!-- LOCATION -->
            <div class="form-group">
                <label class="font-14 bold mb-2">LOCATION</label>
                <input type="text" name="location" class="theme-input-style" placeholder="LOCATION" required>
            </div>
            
            <!-- CRANE ASSET NO -->
            <div class="form-group">
                <label class="font-14 bold mb-2">CRANE ASSET NO</label>
                <input type="text" name="crane_asset_no" class="theme-input-style" placeholder="CRANE ASSET NO" required>
            </div>
            
            <!-- EQUIPMENT TYPE -->
            <div class="form-group">
                <label class="font-14 bold mb-2">EQUIPMENT TYPE</label>
                <input type="text" name="equipment_type" class="theme-input-style" placeholder="EQUIPMENT TYPE" required>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Checklist Type -->
            <div class="form-group">
                <label class="font-14 bold mb-2">Checklist Type</label>
                <select name="checklist_type" class="theme-input-style">
                <option value="">Select Type</option>
            <option value="articulating-boom">Articulating boom</option>
            <option value="elevators">Elevators</option>
            <option value="mobile_locomotive">Mobile & Locomotive Cranes</option>
            <option value="marine-offshore-cranes">Marine & Offshore Cranes</option>
            <option value="storage-retrieval">Storage Retrieval</option>
            <option value="articulating-boom-cranes">Articulating Boom Cranes</option>
            <option value="lifting-beam-spreader-bar">Lifting Beam Spreader Bar</option>
            <option value="powered-platforms">Powered Platforms (Sky Climbers)</option>
            <option value="vehicle-mounted-elevating-aerial-rotating-devices">Vehicle-Mounted Elevating & Aerial Rotating Devices</option>
                </select> 
            </div>

            <!-- INSPECTION DATE -->
            <div class="form-group">
                <label class="font-14 bold mb-2">INSPECTION DATE</label>
                <input type="text" name="inspection_date" class="theme-input-style" placeholder="INSPECTION DATE" required>
            </div>
            
            <!-- INSPECTED BY -->
            <div class="form-group">
                <label class="font-14 bold mb-2">INSPECTED BY</label>
                <input type="text" name="inspected_by" class="theme-input-style" placeholder="INSPECTED BY" required>
            </div>
            
            <!-- STICKER NO -->
            <div class="form-group">
                <label class="font-14 bold mb-2">STICKER NO</label>
                <input type="text" name="sticker_no" class="theme-input-style" placeholder="STICKER NO" required>
            </div>
            
            <!-- CRANE SERIAL NO. -->
            <div class="form-group">
                <label class="font-14 bold mb-2">CRANE SERIAL NO.</label>
                <input type="text" name="crane_serial_no" class="theme-input-style" placeholder="CRANE SERIAL NO." required>
            </div>
            
            <!-- CAPACITY (SWL) -->
            <div class="form-group">
                <label class="font-14 bold mb-2">CAPACITY (SWL)</label>
                <input type="text" name="capacity_swl" class="theme-input-style" placeholder="CAPACITY (SWL)" required>
            </div>
        </div>
    </div>

    <!-- Remarks / Recommendations -->
    <div class="form-group">
        <label class="font-14 bold mb-2">REMARKS / RECOMMENDATIONS: (IF NO REMARKS LEAVE EMPTY)</label>
        <textarea name="remarks" class="form-control" placeholder="Remarks" rows="5"></textarea>
    </div>

    <!-- Submit Button -->
    <div class="form-row">
        <div class="col-12 text-center">
            <button type="submit" class="btn long">Submit</button>
        </div>
    </div>
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
        