<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Check if 'project_id' is passed
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Query to fetch data from project_info table
    $stmt = $conn->prepare("SELECT equipment_type, checklist_type, inspector_name, customer_name, equipment_location FROM project_info WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $equipment_type = $row['equipment_type'];
        $checklist_type = $row['checklist_type'];
        $inspected_by = $row['inspector_name'];
        $client_name = $row['customer_name'];
        $location = $row['equipment_location'];        
    } else {
        echo "Invalid Project ID!";
        exit;
    }

    $stmt->close();
} else {
    echo "No project ID provided!";
    exit;
}

// Fetch the latest checklist_no from the database
$checklistQuery = "SELECT MAX(checklist_no) AS last_checklist_no FROM checklist_information"; // Replace 'checklists' with your actual table name
$checklistResult = $conn->query($checklistQuery);

if ($checklistResult && $checklistResult->num_rows > 0) {
    $row = $checklistResult->fetch_assoc();
    $lastChecklistNo = $row['last_checklist_no'];
    $newChecklistNo = intval($lastChecklistNo) + 1; // Increment checklist number
} else {
    $newChecklistNo = 1; // Default to 1 if no checklist exists
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist Form</title>
    <link rel="stylesheet" href="../../assets/css/custom-style.css"> <!-- Custom Styles -->
    <style>
        /* Custom styles here */
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- Base Horizontal Form With Icons -->
                    <div class="form-element py-30 multiple-column">
                        <h4 class="font-20 mb-20">Checklist Information</h4>

                        <!-- Form -->
                        <form action="save_checklist.php" method="POST">
                            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                            <!-- <input type="hidden" name="inspector_image" value="<?php echo htmlspecialchars($inspector_image); ?>">
                            <input type="hidden" name="inspector_signature" value="<?php echo htmlspecialchars($inspector_signature); ?>"> -->


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <!-- Checklist NO -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">Checklist NO</label>
                                        <input type="text" name="checklist_no" class="theme-input-style" placeholder="Checklist NO" value="<?php echo htmlspecialchars($newChecklistNo); ?>" readonly required>
                                    </div>
                                    
                                    <!-- REPORT NO -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">REPORT NO</label>
                                        <input type="text" name="report_no" class="theme-input-style" placeholder="REPORT NO" required>
                                    </div>
                                    
                                    <!-- CLIENT’S NAME -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">CLIENT’S NAME</label>
                                        <!-- <input type="text" name="client_name" class="theme-input-style" placeholder="CLIENT’S NAME" required> -->
                                        <input type="text" name="client_name" class="theme-input-style" placeholder="CLIENT’S NAME" value="<?php echo htmlspecialchars($client_name); ?>" readonly required>
                                    </div>
                                    
                                    <!-- LOCATION -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">LOCATION</label>
                                        <!-- <input type="text" name="location" class="theme-input-style" placeholder="LOCATION" required> -->
                                        <input type="text" name="location" class="theme-input-style" placeholder="LOCATION" value="<?php echo htmlspecialchars($location); ?>" readonly required>
                                    </div>
                                    
                                    <!-- CRANE ASSET NO -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">CRANE ASSET NO</label>
                                        <input type="text" name="crane_asset_no" class="theme-input-style" placeholder="CRANE ASSET NO" required>
                                    </div>
                                    
                                    <!-- EQUIPMENT TYPE -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">EQUIPMENT TYPE</label>
                                        <input type="text" name="equipment_type" class="theme-input-style" placeholder="Equipment Type" value="<?php echo htmlspecialchars($equipment_type); ?>" readonly required>
                                    </div>

                                    <!-- MANUFACTURER -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">MANUFACTURER</label>
                                        <input type="text" name="manufacturer" class="theme-input-style" placeholder="MANUFACTURER">
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <!-- Checklist Type -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">Checklist Type</label>
                                        <!-- <select name="checklist_type" class="theme-input-style">
                                            <option value="">Select Type</option>
                                            <option value="arc-welding-machine">ARC Welding Machine Checklist (2020)</option>            
                                            <option value="articulating_boom">Articulating boom</option>
                                            <option value="base_mounted_drum">Base Mounted Drum Hoist (Winches)</option>
                                            <option value="bulldozer">Bulldozer</option>
                                            <option value="elevators">Elevators</option>
                                            <option value="excavator">Excavator</option>
                                            <option value="fixed-cranes-hoist">Fixed Cranes & Hoist</option>
                                            <option value="forklift">Forklift</option>
                                            <option value="frames-and-mobile-gantries">Frames and Mobile Gantries</option>
                                            <option value="jib-davit">JIB & DAVIT</option>
                                            <option value="lifting-beam-spreader-bar">Lifting Beam Spreader Bar</option>
                                            <option value="manbaskets">Manbaskets</option>
                                            <option value="marine-offshore-cranes">Marine & Offshore Cranes</option>
                                            <option value="mobile_locomotive">Mobile Locomotive</option>
                                            <option value="motor-grade">Motor Grade</option>
                                            <option value="powered-platforms">Powered Platforms (Sky Climbers)</option>
                                            <option value="side-boom-tractors">Side Boom Tractors</option>
                                            <option value="storage-retrieval">Storage Retrieval</option>                         
                                            <option value="tower-cranes">Tower Cranes</option>                                    
                                            <option value="vehicle_mounted_elevating">Vehicle-Mounted Elevating & Aerial Rotating Devices</option>
                                            <option value="wheel-loader">Wheel Loader</option>
                                        </select>  -->



                                        <input type="text" name="checklist_type" class="theme-input-style" placeholder="Checklist Type" value="<?php echo htmlspecialchars($checklist_type); ?>" readonly required>

                                    </div>

                                    <!-- INSPECTION DATE -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">INSPECTION DATE</label>
                                        <input type="date" name="inspection_date" class="theme-input-style" placeholder="INSPECTION DATE" required>
                                    </div>
                                    
                                    <!-- INSPECTED BY -->
                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">INSPECTED BY</label>
                                        <!-- <input type="text" name="inspected_by" class="theme-input-style" placeholder="INSPECTED BY" required> -->
                                        <input type="text" name="inspected_by" class="theme-input-style" placeholder="INSPECTED BY" value="<?php echo htmlspecialchars($inspected_by); ?>" readonly required>
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

                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">YEAR MODEL</label>
                                        <input type="text" name="year_model" class="theme-input-style" placeholder="YEAR MODEL">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-14 bold mb-2">EQUIPMENT NO</label>
                                        <input type="text" name="equipment_no" class="theme-input-style" placeholder="EQUIPMENT NO">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php 
include_once('../../inc/footer.php');
?>
