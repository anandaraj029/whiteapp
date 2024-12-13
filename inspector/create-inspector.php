<?php
include_once('../inc/function.php'); ?>

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
                                    <label class="font-14 bold mb-2">Inspector Name</label>
                                    <input type="text" class="theme-input-style" name="customer_name" placeholder="Type Your Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Email</label>
                                    <input type="email" class="theme-input-style" name="email" placeholder="Your Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Handle Crane</label>
                                    <div class="form-control" style="height:auto;">
                                        <label><input type="checkbox" name="handle_crane[]" value="Crane Type A"> Crane Type A</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="Crane Type B"> Crane Type B</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="Crane Type C"> Crane Type C</label><br>
                                        <label><input type="checkbox" name="handle_crane[]" value="Crane Type D"> Crane Type D</label>
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
