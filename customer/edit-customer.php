    
<?php 
include_once('../inc/customer-option.php');

?>
    <!-- Main Content -->
      <div class="main-content2 ">
                
                <div class="container-fluid pb-60">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card -->
                            <div class="card">
                                <!-- User Profile Image -->
                                <div class="user-profile-img">
                                    <div class="cover-img">
                                            <img src="<?php echo $url; ?>assets/img/media/cover.jpg" class="w-100" alt="">

                                            <!-- Upload Photo -->
                                            <div class="upload-button">
                                                <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                                <span>Upload Photo</span>
                                                <input class="file-input" type="file" id="fileUpload3" accept="image/*">
                                            </div>
                                            <!-- End Upload Photo -->
                                    </div>
                                </div>
                                <!-- End User Profile Image -->
                            </div>
                            <!-- End Card -->

                            <div class="mx-2 mx-lg-4 mx-xl-5">
                                <div class="card mb-30 mt-1">
                                    <!-- User Profile Nav -->
                                    <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                                        <!-- Profile Info -->
                                        <div class="profile-info d-flex align-items-center">
                                            <div class="profile-pic mr-3">
                                                <img src="<?php echo $url; ?>assets/img/media/profile-pic.jpg" alt="">
        
                                                <!-- Upload Photo -->
                                                <div class="upload-button">
                                                    <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                                    <span>Upload Photo</span>
                                                    <input class="file-input" type="file" id="fileUpload2" accept="image/*">
                                                </div>
                                                <!-- End Upload Photo -->
                                            </div>

                                            <div>
                                                <h3>Abrilay Khatun</h3>
                                                <p class="font-14">Head Of Business Development</p>
                                            </div>
                                        </div>
                                        <!-- End Profile Info -->

                                        <div class="d-flex align-items-center mt-3 mt-xl-0">
                                            <ul class="nav profile-nav-tabs">
                                                <li>
                                                    <a class="active pr-0 pl-2 pl-xl-30">
                                                        <span class="chat">
                                                            <img src="<?php echo $url; ?>assets/img/svg/chat-icon.svg" alt="" class="svg">
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="conncetion" href="connection.html">
                                                        <div class="btn-circle mr-20">
                                                            <img src="<?php echo $url; ?>assets/img/svg/user-check.svg" alt="" class="svg">
                                                        </div>
                                                        <div class="font-14">
                                                            <h4>154</h4>
                                                            <p class="font-14 text_color">Connections</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="p_nav-link has-before" href="about.html">About</a>
                                                </li>
                                                <li>
                                                    <a class="p_nav-link" href="gallery.html">Gallery</a>
                                                </li>
                                                <li>
                                                    <a class="p_nav-link" href="news-feed.html">News Feed</a>
                                                </li>
                                            </ul>

                                            <div class="px-3">
                                                <!-- Dropdown Button -->
                                                <div class="dropdown-button">
                                                    <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                                    <div class="menu-icon style--two w-auto justify-content-center mr-0">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="edit-profile.html">Edit Profile</a>
                                                        <a href="user-dashboard.html">User Dashboard</a>
                                                    </div>
                                                </div>
                                                <!-- End Dropdown Button -->
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End User Profile Nav -->
                                </div>

                                
                                <!-- Form -->
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body p-30">
                                                    <div class="about-myself mb-5">
                                                        <h4 class="mb-3">About Myself</h4>
                                                        <textarea class="theme-input-style style--two">Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et, porta ut dolor. Curabitur ultricies ultrices nulla. Morbi blandit nec est vitae dictum. Etiam vel consectetur diam. Maecenas vitae egestas dolor. Fusce tempor magna at tortor aliquet finibus. Sed eu nunc sit amet elit euismod faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</textarea>
                                                    </div>

                                                    <!-- Edit Personal Info -->
                                                    <div class="edit-personal-info mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="mb-3">Personal Information</h4>
                                                            </div>
                                                        </div>

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-fname">First Name</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-fname" class="form-control" value="Abrilay">
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-lname">Last Name</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-lname" class="form-control" value="Khatun">
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-age">Age</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-age" class="form-control" value="26">
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-position">Position</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-position" class="form-control" value="Front End Developer">
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-address">Address</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-address" class="form-control" value="228 Park Ave Str. New York, USA">
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-phone">Phone</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="text" id="edit-phone" class="form-control" value="00 2136 4545">
                                                                <span class="font-12 c4">**We'll never share your phone no with anyone else.</span>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-email">Email</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <input type="email" id="edit-email" class="form-control" value="abrilakh@gmail.com">
                                                                <span class="font-12 c4">**We'll never share your email with anyone else.</span>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                    </div>
                                                    <!-- End Edit Personal Info -->

                                                    <!-- Edit Skill -->
                                                    <div class="edit-skill">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="mb-3">Skill</h4>
                                                            </div>
                                                        </div>

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-20 row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-ui">UI Design</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" id="edit-ui" class="form-control" value="68%">

                                                                    <div class="process-bar-wrapper style--five">
                                                                        <span class="process-bar" data-process-width="68"></span>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-20 row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-ux">UX Design</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" id="edit-ux" class="form-control" value="85%">

                                                                    <div class="process-bar-wrapper style--five pink">
                                                                        <span class="process-bar" data-process-width="85"></span>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-20 row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-html">HTML</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" id="edit-html" class="form-control" value="35%">

                                                                    <div class="process-bar-wrapper style--five green">
                                                                        <span class="process-bar" data-process-width="35"></span>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-20 row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-css">CSS</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" id="edit-css" class="form-control" value="50%">

                                                                    <div class="process-bar-wrapper style--five blue">
                                                                        <span class="process-bar" data-process-width="50"></span>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-0 row align-items-center">
                                                            <div class="col-3">
                                                                <label for="edit-wp">Wordpress</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" id="edit-wp" class="form-control" value="50%">

                                                                    <div class="process-bar-wrapper style--five c2">
                                                                        <span class="process-bar" data-process-width="50"></span>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                    </div>
                                                    <!-- End Edit Skill -->
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- Card -->
                                            <div class="card mb-30">
                                                <div class="card-body p-30">
                                                    <!-- Account Setting -->
                                                    <div class="account-setting">

                                                        <div><h4 class="mb-20 pt-2">Account Setting</h4></div>

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Email me when someone comments onmy article</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Email me when someone answers on my form</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Invites me to co-own a moodboard</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Receive an email summary of notifications instead of individual emails</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-20 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Notifications about upcoming live events</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <div><h4 class="mb-20 pt-3">Activity</h4></div>

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Blocked users will no longer be allowed to: follow you, see your work in their feed.</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Receive an email summary of notifications instead of individual emails</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-10 d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <!-- Switch -->
                                                                <label class="switch">
                                                                    <input type="checkbox">
                                                                    <span class="control"></span>
                                                                </label>
                                                                <!-- End Switch -->
                                                            </div>
                                                            <div>Error saving: please try again later</div>
                                                        </div>
                                                        <!-- End Form Group -->

                                                    </div>
                                                    <!-- End Account Setting -->
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="card mb-30">
                                                <div class="card-body p-30">
                                                    <!-- Change Password -->
                                                    <div class="change-password">

                                                        <div><h4 class="mb-4 pt-2">Change Password</h4></div>

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4">
                                                            <label for="old-pass" class="bold font-14 mb-2 black">Old Password</label>
                                                            <input type="password" class="theme-input-style" id="old-pass" placeholder="********">
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-4">
                                                            <label for="new-pass" class="bold font-14 mb-2 black">New Password</label>
                                                            <input type="password" class="theme-input-style" id="new-pass" placeholder="********">
                                                        </div>
                                                        <!-- End Form Group -->

                                                        <!-- Form Group -->
                                                        <div class="form-group mb-10">
                                                            <label for="retype-pass" class="bold font-14 mb-2 black">Retype Password</label>
                                                            <input type="password" class="theme-input-style" id="retype-pass" placeholder="********">
                                                        </div>
                                                        <!-- End Form Group -->

                                                    </div>
                                                    <!-- End Change Password -->
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>

                                        <div class="col-12 text-center">
                                            <!-- Button Group -->
                                            <div class="button-group pt-1">
                                                <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">Back</button>
                                                <button type="button" class="btn">Save Changes</button>
                                            </div>
                                            <!-- End Button Group -->
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->



                            </div>

                            
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
        