<?php

include_once('../inc/function.php');
include ('../file/config.php');

$cus_id = $_GET['cusid'] ?? '';

// Fetch customer data based on cus_id
$sql = "SELECT * FROM customers WHERE cus_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cus_id);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();

if (!$customer) {
    echo "Customer not found!";
    exit;
}
?>
  <!-- Main Content -->
   <div class="main-content d-flex flex-column flex-md-row">
                <div class="mb-4 mb-md-0">
                    <!-- Tasks Aside -->
                    <div class="aside">
                        <!-- Aside Body -->
                        <nav class="aside-body">
                            <h4 class="mb-3">Account Settings</h4>
<ul class="nav flex-column">
    <li><a class="active" data-toggle="tab" href="#general">General</a></li>
    <li><a data-toggle="tab" href="#c_pass">Change Password</a></li>
    <!-- <li><a data-toggle="tab" href="#info">Info</a></li>     -->
    <!-- <li><a data-toggle="tab" href="#notifications">Notifications</a></li> -->
                            </ul>
                        </nav>
                        <!-- End Aside Body -->
                    </div>
                    <!-- End Tasks Aside -->
                 </div>
                 <div class="container-fluid">
                    <div class="row">
     
                       <div class="col-xl-10 mb-30 mb-xl-0">
                          <!-- Card -->
                          <div class="card h-100">
                             <div class="card-body p-30">
                                <div class="tab-content">
                                <div class="tab-pane fade show active" id="general">
    <h4 class="mb-4">Account Settings</h4>

    <form action="../customer/update-profile.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="cus_id" value="<?php echo $customer['cus_id']; ?>">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="form-group mb-20">
                    <label for="userName" class="mb-2 font-14 bold black">Company Name</label>
                    <input type="text" id="userName" name="customer_name" class="theme-input-style" value="<?php echo $customer['customer_name']; ?>">
                </div>
                <div class="form-group mb-20">
                    <label for="email" class="mb-2 font-14 bold black">Email</label>
                    <input type="email" name="email" id="email" class="theme-input-style" value="<?php echo $customer['email']; ?>">
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="form-group mb-20">
                    <label for="name" class="mb-2 font-14 bold black">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="theme-input-style" value="<?php echo $customer['mobile']; ?>">
                </div>
                <!-- <div class="form-group mb-20">
                    <label for="company" class="mb-2 font-14 bold black">Company</label>
                    <input type="text" id="company" name="company" class="theme-input-style" value="<?php echo $customer['company']; ?>">
                </div> -->
            </div>
            <div class="col-xl-4">
    <!-- Profile Photo Upload -->
    <div class="upload-avatar d-xl-flex align-items-center flex-column">
        <div>
            <div class="attach-file style--two rounded-0 align-items-end mb-3">
                <div class="upload-button mb-20">
                    <!-- Display updated profile photo -->
                    <img src="<?php echo $customer['profile_photo']; ?>" alt="Profile Photo" class="profile-avatar mb-3">
                    <span>Upload Profile Photo</span>
                    <input class="file-input" type="file" id="fileUpload" name="profile_photo" accept="image/*">
                </div>
            </div>
            <div class="content">
                <h4 class="mb-2">Upload Profile Photo</h4>
                <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4">
    <!-- Signature Upload -->
    <div class="upload-avatar d-xl-flex align-items-center flex-column">
        <div>
            <div class="attach-file style--two rounded-0 align-items-end mb-3">
                <div class="upload-button mb-20">
                    <!-- Display updated signature photo -->
                    <img src="<?php echo $customer['signature_photo']; ?>" alt="Signature Photo" class="profile-avatar mb-3">
                    <span>Upload Signature</span>
                    <input class="file-input" type="file" id="signatureUpload" name="signature_photo" accept="image/*">
                </div>
            </div>
            <div class="content">
                <h4 class="mb-2">Upload Signature</h4>
                <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>
            </div>
        </div>
    </div>
</div>

            <div class="col-lg-12">
                <div class="button-group mt-30 mt-xl-n5">
                    <button type="submit" class="btn">Save Changes</button>
                    <button type="button" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>



                                    <div class="tab-pane fade" id="c_pass">
                                        <h4 class="mb-4">Change Password</h4>

                                        <form action="../customer/change-password.php" method="POST">
                                            <!-- Form Group -->
                                            <div class="form-group mb-20">
                                                <label for="oldPassword" class="mb-2 font-14 bold black">Old Password</label>
                                                <input type="password" id="oldPassword" name="old_password" class="theme-input-style" placeholder="Type Here">
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group mb-20">
                                                <label for="newPassword" class="mb-2 font-14 bold black">New Password</label>
                                                <input type="password" id="newPassword" name="new_password" class="theme-input-style" placeholder="Type Here">
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group mb-20">
                                                <label for="retypePassword" class="mb-2 font-14 bold black">Retype Password</label>
                                                <input type="password" id="retypePassword" name="retype_password" class="theme-input-style" placeholder="Type Here">
                                            </div>
                                            <!-- End Form Group -->

                                            <div class="button-group mt-30">
                                                <button type="submit" class="btn">Save Changes</button>
                                                <button type="button" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- <div class="tab-pane fade" id="info">
                                        <h4 class="mb-4">Informations</h4>

                                        <form action="#">
                                            
                                            <div class="form-group mb-20">
                                                <label for="bio" class="mb-2 font-14 bold black">Bio</label>
                                                <textarea id="bio" class="theme-input-style style--two" placeholder="Type Your Bio"></textarea>
                                            </div>
                                            

                                            
                                            <div class="form-group mb-20">
                                                <label for="default-date" class="mb-2 font-14 bold black">Date Of Birth</label>
                                                <input type="text" id="default-date" class="theme-input-style" placeholder="05 September 1998">
                                            </div>
                                            

                                            
                                            <div class="form-group mb-20">
                                                <label class="mb-2 font-14 bold black">Country</label>
                                                <select class="form-control">
                                                    <option value="bangladesh">Bangladesh</option>
                                                    <option value="india">India</option>
                                                    <option value="nepal">Nepal</option>
                                                    <option value="pakistan">Pakistan</option>
                                                </select>
                                            </div>
                                            

                                            
                                            <div class="form-group mb-20">
                                                <label class="mb-2 font-14 bold black">Lenguage</label>
                                                 
                                                <select class="language-select" name="states[]" multiple="multiple">
                                                    <option value="english">English</option>
                                                    <option value="bangla">Bangla</option>
                                                    <option value="arabic">Arabic</option>
                                                    <option value="french">French</option>
                                                </select>
                                            </div>
                                            

                                            
                                            <div class="form-group mb-20">
                                                <label for="phone" class="mb-2 font-14 bold black">Phone</label>
                                                <input type="text" id="phone" class="theme-input-style" placeholder="(+656) 254 2568">
                                            </div>
                                            

                                            
                                            <div class="form-group mb-20">
                                                <label for="webSite" class="mb-2 font-14 bold black">Website</label>
                                                <input type="url" id="webSite" class="theme-input-style" placeholder="Type Here">
                                            </div>
                                            

                                            <div class="button-group mt-30">
                                                <button type="submit" class="btn">Save Changes</button>
                                                <button type="button" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button>
                                            </div>
                                        </form>
                                    </div> -->
                                    

                                    <!-- <div class="tab-pane fade" id="notifications">
                                        <h4 class="mb-5">Notification Settings</h4>

                                        <form action="#">
                                            <h5 class="text_color mb-4">Account Settings</h5>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="control"></span>
                                                    </label>
                                                   
                                                </div>

                                                <span>Email me when someone comments onmy article</span>

                                            </div>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Email me when someone answers on my form</span>

                                            </div>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Invites me to co-own a moodboard</span>

                                            </div>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="control"></span>
                                                    </label>
                                                   
                                                </div>

                                                <span>Receive an email summary of notifications instead of individual emails</span>

                                            </div>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Notifications about upcoming live events</span>
                                            </div>

                                            
                                            <h5 class="text_color pt-3 mb-4">Activity</h5>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Blocked users will no longer be allowed to: follow you, see your work in their feed.</span>
                                            </div>

                                            <div class="d-flex align-items-center mb-4">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Receive an email summary of notifications instead of individual emails</span>

                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="switch-wrap">
                                                    
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="control"></span>
                                                    </label>
                                                    
                                                </div>

                                                <span>Error saving: please try again later</span>
                                            </div>


                                            <div class="button-group mt-30">
                                                <button type="submit" class="btn">Save Changes</button>
                                                <button type="button" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button>
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                             </div>
                          </div>
                          <!-- End Card -->
                       </div>
     
                    </div>
                 </div>
            </div>
            <!-- End Main Content -->
        </div>
        <!-- End Main Wrapper -->
        <?php 
        include_once('../inc/footer.php');
        ?>
        