<?php include_once('../inc/function.php'); ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white ">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Create Inspector</h4>
                    </div>
                    <div class="col-6 text-right">
    <a href="./all-inspector.php" class="btn btn-primary" >View List</a>
</div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        
            <form action="./add-customer.php" method="POST" enctype="multipart/form-data">
              
                <div class="row">

                <div class="col-lg-12">
                            <!-- Base Horizontal Form With Icons -->
                            <div class="form-element py-30 multiple-column">
                                <!-- <h4 class="font-20 mb-20">Multiple Column</h4> -->

                            
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label class="font-14 bold mb-2">Inspector Name</label>
                <input type="text" class="theme-input-style" name="customer_name" placeholder="Type Your Name">
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">Email</label>
                <input type="email" class="theme-input-style" name="email" placeholder="Your Email Address">
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">Handle Crane</label>
                <input type="text" class="theme-input-style" name="company" placeholder="Company Name">
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">Emp ID</label>
                <input type="text" class="theme-input-style" name="rep_name" placeholder="Rep Name">
            </div>



            <div class="upload-avatar d-xl-flex align-items-center flex-column mt-4">

<div>
    <div class="attach-file style--two rounded-0 align-items-end mb-3">
        <img src="../assets/img/img-placeholder.png" class="profile-avatar" alt="">
        <div class="upload-button mb-20">
           <img src="../assets/img/svg/gallery.svg" alt="" class="svg mr-2">
           <span>Upload Photo</span>
           <input class="file-input" type="file" id="fileUpload" accept="image/*">
        </div>
     </div>

     <div class="content">
        <h4 class="mb-2">Upload Photo</h4>
        <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>   
     </div>
</div>
</div>
            <!-- <div class="form-group">
        <label for="profile_photo">Upload Profile Photo</label>
        <input type="file" class="form-control" name="profile_photo" accept="image/*" required>
    </div> -->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label class="font-14 bold mb-2">Mobile</label>
                <input type="text" class="theme-input-style" name="mobile" placeholder="Contact Number">
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">Password</label>
                <input type="password" class="theme-input-style" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">Address</label>
                <textarea class="form-control" name="address" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label class="font-14 bold mb-2">City</label>
                <select class="form-control" name="city">
                    <option value="Kobar">Al Kobar</option>
                    <option value="Riyadh">Riyadh</option>
                </select>
            </div>

            <!-- <div class="form-group">
        <label for="profile_photo">Upload Signature</label>
        <input type="file" class="form-control" name="profile_photo" accept="image/*" required>
    </div> -->

    <div class="upload-avatar d-xl-flex align-items-center flex-column mt-4">

<div>
    <div class="attach-file style--two rounded-0 align-items-end mb-3">
        <img src="../assets/img/img-placeholder.png" class="profile-avatar" alt="">
        <div class="upload-button mb-20">
           <img src="../assets/img/svg/gallery.svg" alt="" class="svg mr-2">
           <span>Upload Sign</span>
           <input class="file-input" type="file" id="fileUpload2" accept="image/*">
        </div>
     </div>

     <div class="content">
        <h4 class="mb-2">Upload Sign</h4>
        <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>   
     </div>
</div>
</div>

        </div>
    </div>
    <div class="form-group pt-1">
        <label class="custom-checkbox position-relative mr-2">
            <input type="checkbox" name="info_correct">
            <span class="checkmark"></span>
        </label>
        <label for="check5">Confirm whether the provided details are correct</label>
    </div>
  

                                <!-- End Form -->
                            </div>
                            <!-- End Horizontal Form With Icons -->
                        </div>

                </div>

                <!-- Entire Save Button -->
                <div class="form-row">
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn long" name="save_all">Create Now</button>
                    </div>
                </div>
            </form>
        </div>
    
</div>

<?php include_once('../inc/footer.php'); ?>
