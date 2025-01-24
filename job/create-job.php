<?php 
include_once('../inc/function.php');
include_once('../file/config.php');

// Fetch the latest project number from the database
// Auto-generate project number
$projectQuery = "SELECT MAX(CAST(SUBSTRING(project_no, 5) AS UNSIGNED)) AS last_project_no FROM project_info";
$projectResult = $conn->query($projectQuery);

if ($projectResult && $projectResult->num_rows > 0) {
    $row = $projectResult->fetch_assoc();
    $lastProjectNo = $row['last_project_no'];
    $newProjectNo = intval($lastProjectNo) + 1; // Increment project number
} else {
    $newProjectNo = 1; // Default to 1 if no project exists
}

// Format the project ID as "CIMS001"
$formattedProjectNo = "CIMS" . str_pad($newProjectNo, 3, "0", STR_PAD_LEFT);

// Return the generated ID
// echo $formattedProjectNo;




// Fetch student names from the database
$customerQuery = "SELECT * FROM customers";
$customerResult = $conn->query($customerQuery);

// Fetch inspector names from the inspector table
$sql = "SELECT * FROM inspectors"; // Assuming 'inspector_name' is the column
$result = mysqli_query($conn, $sql); // Execute query

?>

            <!-- Main Content -->
            <div class="main-content">

                        <div class="container-fluid">
                        <div class="card bg-transparent pb-3">
                         <div class="card-body bg-white ">

                    <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Create New Project
                        </h4>
                    </div>
                        <div class="col-6 text-right">
                   <a href="overall-job-list.php">
                    <button type="button" class="btn">View List</button>               
                   </a>   
                </div>
                    </div>
                    </div>
                    </div>

            </div>
                <div class="container-fluid">
                 <div class="row">

                        <div class="col-lg-6">
                            <!-- Base Horizontal Form -->
                            <div class="form-element py-30 mb-30" style="height: 410px;">
                                <h4 class="font-20 mb-30">Project Data</h4>

                                <!-- Form -->
                                <form action="../file/create-job.php" method="POST">

                                      <!-- Form Row -->
                                      <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Project No*</label>
                                        </div>
                                        <div class="col-sm-8">
                                        

                                <input type="text" name="project_no" class="theme-input-style" 
                                       value="<?php echo htmlspecialchars($formattedProjectNo); ?>" readonly>
                            </div>
                                    </div>
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <!-- <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Date of Creation*</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="creation_date" class="theme-input-style" placeholder="Date of Creation">
                                        </div>
                                    </div> -->
                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="equipment_type" class="theme-input-style">
                                        <option value="Lifting Equipment">Lifting Equipment</option>
                                        <option value="NDT Equipment">NDT Equipment</option>
                                    </select>
                                                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->

                                      <!-- Form Row -->
                                      <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Sticker / Non Sticker</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="sticker_status" class="theme-input-style">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                                                    
                                        </div>
                                    </div>
                                    <!-- End Form Row -->


                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Equipment Location</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="text" name="equipment_location" class="theme-input-style" placeholder="Location">
                                        </div>
                                    </div>
                                   
                                    <!-- End Form Row -->
                                    
                           

                                    <!-- Form Row -->
                                    <!-- <div class="form-row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn long">Save</button>
                                        </div>
                                    </div> -->
                                    <!-- End Form Row -->
                             
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 mb-30">
                                <h4 class="font-20 mb-30">Customer Information / Inspector </h4>

                        
                                     <!-- Form Row -->
                                     <!-- Customer Information -->
<div class="form-row mb-20">
    <div class="col-sm-4">
        <label for="customer_id" class="font-14 bold">Select Customer</label>
    </div>
    <div class="col-sm-8">


    
    

                    

    <select name="customer_id" id="customer-select" class="theme-input-style">
    <option value="">Select Customer</option>

    <?php
                                            // Check if customers exist
                        if ($customerResult && $customerResult->num_rows > 0) {
                                                // Loop through the student records and populate the dropdown
                                                while ($row = $customerResult->fetch_assoc()) {
                                                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['customer_name']) . "</option>";
                                                }
                                            } else {
                                                echo "<option value='' disabled>No customers found</option>";
                                            }
                                            ?>    
</select>

    </div>
</div>

<!-- Customer Email -->
<div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Customer Email</label>
    </div>
    <div class="col-sm-8">
        <input type="email" id="customer-email" name="email" class="theme-input-style" placeholder="Customer Email" readonly>
    </div>
</div>

<!-- Customer Mobile -->
<div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Customer Mobile</label>
    </div>
    <div class="col-sm-8">
        <input type="number" id="customer-mobile" name="mobile" class="theme-input-style" placeholder="Customer Mobile" readonly>
    </div>
</div>


                                    <!-- End Form Row -->

                                    <!-- Form Row -->
                                    <!-- <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Mobile</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="../../assets/img/svg/mobile3.svg" alt="" class="svg">
                                                    </div>
                                                </div>
                                                <input type="number" name="customer_mobile" class="form-control pl-1" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- End Form Row -->

                                     <!-- Form Row -->
                                     <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Select Inspector</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select name="inspector_name" id="inspector_select" class="theme-input-style">
    <option value="" disabled selected>Select an Inspector</option>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . htmlspecialchars($row['inspector_name']) . '">' . htmlspecialchars($row['inspector_name']) . '</option>';
        }
    } else {
        echo '<option value="">No Inspectors Found</option>';
    }
    ?>
</select>
    </div>
                                    </div>


                                    <div class="form-row mb-20">
                                        <div class="col-sm-4">
                                            <label class="font-14 bold">Handle Crane</label>
                                        </div>


                                        <div class="col-sm-8">
    <select id="crane_select" name="checklist_type" class="theme-input-style">
        <option value="" disabled selected>Select a Crane</option>
    </select>
</div>

                                        <!-- <div class="col-sm-8">

                                        <select name="checklist_type" class="theme-input-style">
                                            <option value="arc-welding-machine">Arc Welding Machine</option>
                                            <option value="articulating_boom">Articulating Boom</option>
                                            <option value="base_mounted_drum">Base Mounted Drum Hoist (Winches)</option>
                                            <option value="bulldozer">Bulldozer</option>
                                            <option value="elevators">Elevators</option>
                                            <option value="excavator">Excavator</option>
                                            <option value="fixed-cranes-hoist">Fixed Cranes & Hoist</option>
                                            <option value="forklift">Forklift</option>
                                            <option value="frames-and-mobile-gantries"> Frames and Mobile Gantries</option>
                                            <option value="jib-davit">JIB & DAVIT</option>
                                            <option value="lifting-beam-spreader-bar">Lifting Beam Spreader Bar</option>
                                            <option value="manbaskets">Manbaskets</option>
                                            <option value="marine-offshore-cranes">Marine & Offshore Cranes</option>
                                            <option value="mobile_locomotive">Mobile Locomotive</option>
                                        </select>
                                       
                                    
                                        </div> -->
                                    </div>
                                    <!-- End Form Row -->
                                         <!-- Form Row -->
                              

                                         <!-- Hidden Fields for Inspector Details -->
        <!-- <input type="hidden" id="inspector_image_url" name="inspector_image">
        <input type="hidden" id="inspector_signature_url" name="inspector_signature">

                                         <div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Inspector Image</label>
    </div>
    <div class="col-sm-8">
        <img id="inspector-image" src="" alt="Inspector Image" style="display:none; max-width:100px; max-height:100px;"/>
    </div>
</div>

<div class="form-row mb-20">
    <div class="col-sm-4">
        <label class="font-14 bold">Inspector Signature</label>
    </div>
    <div class="col-sm-8">
        <img id="inspector-signature" src="" alt="Inspector Signature" style="display:none; max-width:100px; max-height:100px;"/>
    </div>
</div> -->

                           
                              
                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>

                      
                        </div>
                   
                       
                            <!-- Form Row -->
                            <div class="form-row">
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" id="confirm-text" class="btn long s_alert">Save</button>
                                        </div>
                                    </div>

                                    </form>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script>
   document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        swal({
            icon: "success",
            title: "Success!",
            text: "Your project has been created successfully.",
        });
    } else if (status === 'error') {
        swal({
            icon: "error",
            title: "Error!",
            text: "There was an issue creating your project. " + (message || ""),
        });
    } else if (status === 'invalid_request') {
        swal({
            icon: "warning",
            title: "Invalid Request!",
            text: "This page does not accept GET requests.",
        });
    }
});

</script>




<script>
        $(document).ready(function () {
            $('#customer-select').change(function () {
                var customerId = $(this).val(); // Get selected customer ID
                console.log("Selected Customer ID:", customerId);

                if (customerId) {
                    $.ajax({
                        url: 'fetch-customer-details.php', // PHP script to fetch details
                        type: 'GET',
                        data: { customer_id: customerId },
                        dataType: 'json',
                        success: function (response) {
                            console.log("Response from server:", response); // Debugging

                            if (response.success) {
                                $('#customer-email').val(response.email);
                                $('#customer-mobile').val(response.mobile);
                            } else {
                                alert(response.message || "Customer details not found.");
                                $('#customer-email').val('');
                                $('#customer-mobile').val('');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", status, error);
                            alert("Error fetching customer details.");
                        }
                    });
                } else {
                    $('#customer-email').val('');
                    $('#customer-mobile').val('');
                    console.warn("No customer ID selected.");
                }
            });
        });
    </script>



<script>
$(document).ready(function() {
    $('#inspector_select').change(function() {
        let inspectorName = $(this).val(); // Get selected inspector name

        if (inspectorName) {
            $.ajax({
                url: 'fetch_cranes.php', // Path to your PHP script
                type: 'GET',
                data: { inspector_name: inspectorName }, // Pass inspector name as parameter
                dataType: 'json',
                success: function(response) {
                    // Populate the crane dropdown
                    let optionsHtml = '<option value="">Select Crane</option>';
                    response.forEach(function(item) {
                        optionsHtml += `<option value="${item.value}">${item.label}</option>`;
                    });
                    $('#crane_select').html(optionsHtml);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching cranes: " + error);
                    alert("Error fetching cranes. Please try again.");
                }
            });
        } else {
            // Clear the crane dropdown if no inspector is selected
            $('#crane_select').html('<option value="">Select Crane</option>');
        }
    });
});


</script>

<!-- <script>

$(document).ready(function() {
    $('#inspector_select').change(function() {
        let inspectorName = $(this).val(); // Get selected inspector name

        if (inspectorName) {
            $.ajax({
                url: 'fetch_inspector_details.php', // Path to your PHP script
                type: 'GET',
                data: { inspector_name: inspectorName }, // Pass inspector name as parameter
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Display the image and signature
                        $('#inspector-image').attr('src', response.profile_photo).show();
                        $('#inspector-signature').attr('src', response.signature_photo).show();

                        // Set the hidden inputs
                        $('#inspector_image_url').val(response.profile_photo);
                        $('#inspector_signature_url').val(response.signature_photo);
                    } else {
                        alert(response.message || "Inspector details not found.");
                        $('#inspector-image').hide();
                        $('#inspector-signature').hide();

                        // Clear the hidden inputs
                        $('#inspector_image_url').val('');
                        $('#inspector_signature_url').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching inspector details: " + error);
                    alert("Error fetching inspector details. Please try again.");
                }
            });
        } else {
            // Hide image and signature if no inspector is selected
            $('#inspector-image').hide();
            $('#inspector-signature').hide();

            // Clear the hidden inputs
            $('#inspector_image_url').val('');
            $('#inspector_signature_url').val('');
        }
    });
});

</script> -->
<?php 
        include_once('../inc/footer.php');
        ?>
        