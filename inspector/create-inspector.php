<?php
include_once('../inc/function.php'); 
include_once('./get-inspector.php');
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Create Inspector</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./all-inspector.php" class="btn btn-primary">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="add-inspector.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 multiple-column">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                    <label class="font-14 bold mb-2">Inspector ID</label>
                                    <input type="text" name="inspector_id" class="theme-input-style" 
                                    value="<?php echo htmlspecialchars($new_id); ?>" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Inspector Name</label>
                                    <input type="text" class="theme-input-style" name="inspector_name" placeholder="Type Your Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Email</label>
                                    <input type="email" class="theme-input-style" name="email" placeholder="Your Email Address" required>
                                </div>
                                <div class="form-group">
    <label class="font-14 bold mb-2">Handle Crane</label>
    <div class="form-control" style="height:auto;">
        <label><input type="checkbox" name="handle_crane[]" value="arc-welding-machine" checked> Arc Welding Machine</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="articulating_boom" checked> Articulating Boom</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="base_mounted_drum" checked> Base Mounted Drum Hoist (Winches)</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="bulldozer" checked> Bulldozer</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="elevators" checked> Elevators</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="excavator" checked> Excavator</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="fixed-cranes-hoist" checked> Fixed Cranes & Hoist</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="forklift" checked> Forklift</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="frames-and-mobile-gantries" checked> Frames and Mobile Gantries</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="jib-davit" checked> JIB & DAVIT</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="lifting-beam-spreader-bar" checked> Lifting Beam Spreader Bar</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="manbaskets" checked> Manbaskets</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="marine-offshore-cranes" checked> Marine & Offshore Cranes</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="mobile_locomotive" checked> Mobile Locomotive</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="motor-grade" checked> Motor Grade</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="powered-platforms" checked> Powered Platforms (Sky Climbers)</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="side-boom-tractors" checked> Side Boom Tractors</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="storage-retrieval" checked> Storage Retrieval</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="tower-cranes" checked> Tower Cranes</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="vehicle_mounted_elevating" checked> Vehicle-Mounted Elevating & Aerial Rotating Devices</label><br>
        <label><input type="checkbox" name="handle_crane[]" value="wheel-loader" checked> Wheel Loader</label>
    </div>
</div>

                                <!-- <div class="form-group">
                                    <label class="font-14 bold mb-2">Emp ID</label>
                                    <input type="text" class="theme-input-style" name="emp_id" placeholder="Employee ID" required>
                                </div> -->
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Mobile</label>
                                    <input type="text" class="theme-input-style" name="mobile" placeholder="Contact Number" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Password</label>
                                    <input type="password" class="theme-input-style" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Address</label>
                                    <textarea class="form-control" name="address" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">City</label>
                                    <select class="form-control" name="city">
                                        <option value="Kobar">Al Kobar</option>
                                        <option value="Riyadh">Riyadh</option>
                                    </select>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="profile_photo" class="font-14 bold mb-2">Upload Photo</label>
                                    <input type="file" class="form-control" name="profile_photo" accept="image/*" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="signature_photo" class="font-14 bold mb-2">Upload Signature</label>
                                    <input type="file" class="form-control" name="signature_photo" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-1">
                            <label class="custom-checkbox position-relative mr-2">
                                <input type="checkbox" name="info_correct" required>
                                <span class="checkmark"></span>
                            </label>
                            <label>Confirm whether the provided details are correct</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary" name="save_inspector">Create Now</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once('../inc/footer.php'); ?>

<script>
    document.querySelector("form").addEventListener("submit", function (event) {
        let valid = true;

        document.querySelectorAll("input[required], textarea[required], select[required]").forEach((input) => {
            if (!input.value.trim()) {
                valid = false;
                input.style.border = "2px solid red";
            } else {
                input.style.border = "";
            }
        });

        let checkboxes = document.querySelectorAll("input[type='checkbox'][name='handle_crane[]']");
        let isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (!isChecked) {
            alert("Please select at least one crane type.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            alert("Please fill out all required fields!");
        }
    });
</script>