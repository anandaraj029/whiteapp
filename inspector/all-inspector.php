<?php 
include_once('../inc/function.php');

?>
        <!-- Main Content -->
        <div class="main-content d-flex flex-column flex-md-row">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                    <!-- Card -->
                    <div class="card bg-transparent">
                        <!-- Contact Header -->
                        <div class="contact-header d-flex align-items-sm-center media flex-column flex-sm-row bg-white mb-30">
                           <div class="contact-header-left media-body d-flex align-items-center mr-4">
                                 <!-- Add New Contact Btn -->
                                 <div class="add-new-contact mr-20">
                                     <h3>  Inspector List  </h3>
                                      <!-- <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg"> -->
                                      
                                 </div>
                                 <!-- End Add New Contact Btn -->

                                 <!-- Search Form -->
                                 <form action="#" class="search-form flex-grow">
                                    <div class="theme-input-group style--two">
                                    <input type="text" class="theme-input-style" placeholder="Search Here">

                                    <button type="submit"><img src="<?php echo $url; ?>assets/img/svg/search-icon.svg" alt=""
                                          class="svg"></button>
                                    </div>
                                 </form>
                                 <!-- End Search Form -->
                           </div>

                           <div class="contact-header-right d-flex align-items-center justify-content-end mt-3 mt-sm-0">
                           <div class="add-new-contact mr-20">
                                       <a href="./create-inspector.php" class="btn" >
                                         Create New
                                       </a>
                            </div>
                              <!-- End Pagination -->
                           </div>
                        </div>
                        <!-- End Contact Header -->


                        <div class="table-responsive">
                            <!-- Invoice List Table -->
                            <table class="contact-list-table text-nowrap bg-white">
                                <thead>
                                    <tr>
                                        <th>
                                            <!-- Custom Checkbox -->
                                            <label class="custom-checkbox">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <!-- End Custom Checkbox -->

                                         
                                            <!-- End Star -->
                                        </th>
                                        <th class="text-center">Inspector ID </th>
                                        <th class="text-center">Inspector Name </th>
                                        <th>Emp.ID</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Inspect crane</th>
                                        <th>Status</th>
                                         <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
include ('../file/config.php');

$sql = "SELECT * FROM inspectors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

      // Deserialize handle_crane if it's not null
      $handle_crane_list = $row['handle_crane'] ? unserialize($row['handle_crane']) : [];

      // Convert handle_crane array into a comma-separated string
      $handle_crane_display = !empty($handle_crane_list) ? implode(", ", $handle_crane_list) : "N/A";

      // Status - You can add your logic here (e.g., fetched from the DB or a default value)
      $status = "Active"; // Change this as per your requirement

        echo "<tr>
            <td>
                <label class='custom-checkbox'>
                    <input type='checkbox' class='select-checkbox'>
                    <span class='checkmark'></span>
                </label>
            </td>
            <td>{$row['inspector_id']}</td>
          <td>
                <img src='{$url2}uploads/{$row['profile_photo']}' alt='Profile Photo' class='img-thumbnail' style='width: 50px; height: 50px; object-fit: cover; margin-right: 10px;'>
                {$row['inspector_name']}
            </td>
            <td>{$row['emp_id']}</td>
            <td>{$row['email']}</td>
            <td>{$row['mobile']}</td>                        
            <td>{$row['address']}</td>
            <td>{$handle_crane_display}</td>
                    <td>{$status}</td>
            
            <td>
    <a href='index.php?id={$row['id']}' class='btn btn-sm btn-primary'>View</a>

    <a href='edit-inspector.php?id={$row['id']}' class='btn btn-sm'>Edit</a>
    <a href='delete-inspector.php?id={$row['id']}' class='btn btn-sm text-danger'>Delete</a>
</td>

        </tr>";
    }
} else {
    echo "<tr><td colspan='9' class='text-center'>No inspectors found.</td></tr>";
}
?>
</tbody>

                            </table>
                            <!-- End Invoice List Table -->
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Contact Add New PopUp -->
                     <div id="contactAddModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered">
                           <div class="modal-content">
                              <!-- Modal Body -->
                              <div class="modal-body">
                                 <form action="#">

                                    <div class="media flex-column flex-sm-row">
                                       <div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0">

                                          <div class="attach-file style--two mb-3">
                                             <img src="<?php echo $url; ?>assets/img/img-placeholder.png" class="profile-avatar" alt="">
                                             <div class="upload-button">
                                                <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                                <span>Upload Logo</span>
                                                <input class="file-input" type="file" id="fileUpload" accept="image/*">
                                             </div>
                                          </div>

                                          <div class="content">
                                             <h4 class="mb-2">Upload a Photo</h4>
                                             <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>
                                          </div>
                                       </div>
            
            
                                       <div class="contact-account-setting media-body">

                                          <h4 class="mb-4">Account Settings</h4>

                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_name">Company Name</label>
                                             <input type="text" id="as_name" class="theme-input-style" placeholder="Type Here" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_email">Email</label>
                                             <input type="email" id="email" class="theme-input-style" placeholder="Type Here" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2"  for="as_phone">Phone</label>
                                             <input type="number" id="phone" class="theme-input-style" placeholder="Type Here" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_age">City</label>
                                             <input type="text" id="city" class="theme-input-style" placeholder="Type Here" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_post">Address</label>
                                             <textarea name="address" id="address" class="theme-input-style"  row="2"  placeholder="Type Here" ></textarea>
                                             <!-- <input type="text" id="address" class="theme-input-style" placeholder="Type Here" required> -->
                                          </div>
                                          
                                          <div class="mb-10">
                                             <label class="bold black mb-2">Joining Date</label>
                                             
                                             <div class="date datepicker dashboard-date style--two" id="datePickerExample">
                                                <span class="input-group-addon mr-0"><img src="<?php echo $url; ?>assets/img/svg/calender.svg" alt="" class="svg"></span>
                                                <input type="text" class="pl-2" required>
                                             </div>
                                          </div>
                                          <div class="d-flex align-items-center pb-20">
                                    <!-- Custom Checkbox -->
                                    <label class="custom-checkbox position-relative ">
                                        <input type="checkbox" id="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- End Custom Checkbox -->
                                    
                                    <label for="checkbox" class="font-14">Create the Customer profile </label>
                                </div>
                                          <div class="">
                                             <a href="#" class="btn mr-4">Save Changes</a>
                                             <a href="#" class="cancel font-14 bold" data-dismiss="modal">Cancel</a>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <!-- End Modal Body -->
                           </div>
                        </div>
                     </div>
                     <!-- End Contact Add New PopUp -->

                     <!-- Contact Edit PopUp -->
                     <div id="contactEditModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered">
                           <div class="modal-content">
                              <!-- Modal Body -->
                              <div class="modal-body">
                                 <form action="#">
                                    <div class="media flex-column flex-sm-row">
                                       <div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0">

                                             <div class="attach-file style--two mb-3">
                                                <img src="<?php echo $url; ?>assets/img/product/pg2.png" class="profile-avatar" alt="">
                                                <div class="upload-button">
                                                   <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                                   <span>Upload Photo</span>
                                                   <input class="file-input" type="file" id="fileUpload2" accept="image/*">
                                                </div>
                                             </div>

                                             <div class="content">
                                                <h4 class="mb-2">Upload a Photo</h4>
                                                <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br /> of 800kB</p>
                                             </div>
                                       </div>
            
            
                                       <div class="contact-account-setting media-body">

                                          <h4 class="mb-4">Account Settings</h4>

                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_name2">Name</label>
                                             <input type="text" id="as_name2" class="theme-input-style" value="Arden Spencer" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_email2">Email</label>
                                             <input type="email" id="as_email2" class="theme-input-style" value="Evangeline62@yahoo.com" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2"  for="as_phone2">Phone</label>
                                             <input type="text" id="as_phone2" class="theme-input-style" value="(023) 708-6818 x4267" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_age2">Age</label>
                                             <input type="text" id="as_age2" class="theme-input-style" value="28" required>
                                          </div>
                                          
                                          <div class="mb-4">
                                             <label class="bold black mb-2" for="as_post2">Post</label>
                                             <input type="text" id="as_post2" class="theme-input-style" value="UX Researcher" required>
                                          </div>
                                          
                                          <div class="mb-30">
                                             <label class="bold black mb-2">Joining Date</label>
                                             
                                             <div class="date datepicker dashboard-date style--two" id="datePickerExample2">
                                                <span class="input-group-addon mr-0"><img src="<?php echo $url; ?>assets/img/svg/calender.svg" alt="" class="svg"></span>
                                                <input type="text" class="pl-2" required>
                                             </div>
                                          </div>

                                          <div class="">
                                             <a href="#" class="btn mr-4">Save Changes</a>
                                             <a href="#" class="cancel font-14 bold" data-dismiss="modal">Cancel</a>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <!-- End Modal Body -->
                           </div>
                        </div>
                     </div>
                     <!-- End Contact Edit PopUp -->
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
        