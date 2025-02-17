<?php
include_once('../inc/function.php'); 

//  include_once('./get-user.php');

?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Create user</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./all-user.php" class="btn btn-primary">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="add-user.php" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 multiple-column">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                    <label class="font-14 bold mb-2">User ID</label>
                                    <!-- <input type="text" name="user_id" class="theme-input-style" 
                                    value="<?php echo htmlspecialchars($new_id); ?>" readonly> -->

                                    <input type="text" class="theme-input-style" name="user_id" placeholder="Type Your User ID" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">User Name</label>
                                    <input type="text" class="theme-input-style" name="user_name" placeholder="Type Your Name" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Email</label>
                                    <input type="email" class="theme-input-style" name="email" placeholder="Your Email Address" required>
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

                                <div class="form-group">
    <label class="font-14 bold mb-2">Select Role</label>
    <select class="form-control" name="role" required>
        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="reviewer">Reviewer</option>
        <!-- <option value="technical_manager">Technical Manager</option> -->
        <option value="quality_controller">Quality Controller</option>
        <option value="document_controller">Document Controller</option>
    </select>
</div>

                                <!-- <div class="form-group pt-4">
                                    <label for="profile_photo" class="font-14 bold mb-2">Upload Photo</label>
                                    <input type="file" class="form-control" name="profile_photo" accept="image/*" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="signature_photo" class="font-14 bold mb-2">Upload Signature</label>
                                    <input type="file" class="form-control" name="signature_photo" accept="image/*" required>
                                </div> -->
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
                    <button type="submit" class="btn btn-primary" name="save_user">Create Now</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const submitButton = document.querySelector("button[type='submit']");

    form.addEventListener("submit", function () {
        // Disable the submit button to prevent double submission
        submitButton.disabled = true;
        submitButton.innerText = "Creating User..."; // Optional: Change button text
    });
});

</script>

<?php include_once('../inc/footer.php'); ?>
