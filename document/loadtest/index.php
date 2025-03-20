<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// SQL query to fetch data from the 'mobile_crane_certificate' table
// $sql = "SELECT * FROM loadtest_certificate";
// $result = $conn->query($sql);
$sql = "SELECT lc.*, pi.project_status 
        FROM loadtest_certificate lc
        LEFT JOIN project_info pi ON lc.project_no = pi.project_no";

$result = $conn->query($sql);

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
                           
                           <div class="card-body bg-white">
                           <div class="main-header-btn ">
                                 <a href="#" class="btn">lifting Gears Certificate</a>
                              </div>
                            </div>
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
                              <!-- Grid -->

                                    <!-- Add New Contact Btn -->
                                    <div class="add-new-contact mr-20">
                                       <a href="#" class="btn-circle" data-toggle="modal" data-target="#contactAddModal">
                                          <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg">
                                       </a>
                                 </div>
                                 <!-- End Add New Contact Btn -->
                              <!-- <div class="grid">
                                 <a href="contact-grid.html">
                                    <img src="<?php echo $url; ?>assets/img/svg/grid-icon.svg" alt="" class="svg">
                                </a>
                              </div> -->
                              <!-- End Grid -->

                              <!-- Starred -->
                              <div class="star">
                                 <a href="#">
                                    <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg">
                                </a>
                              </div>
                              <!-- End Starred -->

                              <!-- Delete Mail -->
                              <div class="delete_mail">
                                 <a href="#">
                                    <img src="<?php echo $url; ?>assets/img/svg/delete.svg" alt="" class="svg">
                                </a>
                              </div>
                              <!-- End Delete Mail -->

                              <!-- Pagination -->
                              <!-- <div class="pagination style--two d-flex flex-column align-items-center ml-n2">
                                 <ul class="list-inline d-inline-flex align-items-center">
                                 <li><a href="#">
                                       <img src="<?php echo $url; ?>assets/img/svg/left-angle.svg" alt="" class="svg">
                                 </a></li>
                                 <li><a href="#" class="current">
                                       <img src="<?php echo $url; ?>assets/img/svg/right-angle.svg" alt="" class="svg">
                                 </a></li>
                                 </ul>
                              </div> -->
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

                <!-- Star -->
                <div class="star">
                    <a href="#"><img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg"></a>
                </div>
                <!-- End Star -->
            </th>
            <th>Certificate No</th>
            <th>Project ID</th>
            <th>Report No</th>
            <th class="text-center">Inspector Name</th>
            <th>Date of Inspection</th>
            <th>Company Name</th>
            <th>Serial Number</th>  
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through the fetched data and populate the table rows
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <!-- Custom Checkbox -->
                    <label class="custom-checkbox">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <!-- End Custom Checkbox -->

                    <!-- Star -->
                    <div class="star">
                        <a href="./view.php?project_no=<?php echo $row['project_no']; ?>">
                            <div class="icon text-primary">
                                <i class="et-clipboard"></i>
                            </div>
                        </a>
                    
                    <a href="./download.php?project_no=<?php echo $row['project_no']; ?>">
                                    <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" style="margin-left: 10px; margin-top: -10px;">
                                </a>
                              </div>
                    <!-- End Star -->
                </td>                
                <td><?php echo $row['certificate_no']; ?></td>
                <td><?php echo $row['project_no']; ?></td>
                <td><?php echo $row['report_no']; ?></td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="img mr-20">
                            <img src="../../inspector/uploads/<?php echo $row['inspector_name']; ?>/images/profile_image.jpg" class="img-40" alt="">
                        </div>
                        <div class="name bold">
                            <?php echo $row['inspector_name']; ?>
                        </div>
                    </div>
                </td>
                <td><?php echo date('F d, Y', strtotime($row['examination_date'])); ?></td>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['serial_numbers']; ?></td>
                <td class="actions">
    <!-- Edit action: Only allowed for 'document controller' and if project is not completed -->
    <?php if ($_SESSION['role'] === 'document controller' && $row['project_status'] !== 'Completed') : ?>
        <a href="edit_loadtest.php?project_no=<?php echo $row['project_no']; ?>" class="contact-edit">
            <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
        </a>
    <?php else : ?>
        <a class="contact-edit disabled" style="pointer-events: none; opacity: 0.5;">
            <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
        </a>
    <?php endif; ?>

    <!-- Delete action -->
    <span class="contact-close" onclick="deleteRow('<?php echo $row['project_no']; ?>', this)">
        <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
    </span>
</td>


            </tr>
        <?php } ?>
    </tbody>
</table>
                            <!-- End Invoice List Table -->
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Contact Add New PopUp -->
                    
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
                                             
                                             <!-- <div class="date datepicker dashboard-date style--two" id="datePickerExample2">
                                                <span class="input-group-addon mr-0"><img src="<?php echo $url; ?>assets/img/svg/calender.svg" alt="" class="svg"></span>
                                                <input type="text" class="pl-2" required>
                                             </div> -->
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
        include_once('../../inc/footer.php');
        ?>
        

<script>
function deleteRow(project_no, element) {
    if (confirm("Are you sure you want to delete this row?")) {
        // Send AJAX request to delete the row from the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_project.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // On success, remove the row from the table
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Remove the row from the table
                    var row = element.closest('tr');
                    row.parentNode.removeChild(row);
                } else {
                    alert("Error deleting row: " + response.error);
                }
            }
        };

        // Send project_no as data
        xhr.send("project_no=" + project_no);
    }
}
</script>