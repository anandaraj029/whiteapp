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
                                        <label><input type="checkbox" name="handle_crane[]" value="arc-welding-machine"> Arc Welding Machine</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="articulating_boom"> Articulating Boom</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="base_mounted_drum"> Base Mounted Drum Hoist (Winches)</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="bulldozer"> Bulldozer</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="elevators"> Elevators</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="excavator"> Excavator</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="fixed-cranes-hoist"> Fixed Cranes & Hoist</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="forklift"> Forklift</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="frames-and-mobile-gantries"> Frames and Mobile Gantries</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="jib-davit"> JIB & DAVIT</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="lifting-beam-spreader-bar"> Lifting Beam Spreader Bar</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="manbaskets"> Manbaskets</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="marine-offshore-cranes"> Marine & Offshore Cranes</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="mobile_locomotive"> Mobile Locomotive</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="motor-grade"> Motor Grade</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="powered-platforms">Powered Platforms (Sky Climbers)</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="side-boom-tractors">Side Boom Tractors</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="storage-retrieval">Storage Retrieval</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="tower-cranes">Tower Cranes</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="vehicle_mounted_elevating">Vehicle-Mounted Elevating & Aerial Rotating Devices</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="wheel-loader">Wheel Loader</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Emp ID</label>
                                    <input type="text" class="theme-input-style" name="emp_id" placeholder="Employee ID" required>
                                </div>
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
