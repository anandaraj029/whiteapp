
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
                                     <h3>  Customer List  </h3>
                                      <!-- <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg"> -->
                                      
                                 </div>
                                 <!-- End Add New Contact Btn -->

                                 <!-- Search Form -->
                                 <form action="#" class="search-form flex-grow">
                                    <div class="theme-input-group style--two">
                                    <input type="text" class="theme-input-style" placeholder="Search Here">

                                    <button type="submit">
                                       <img src="<?php echo $url; ?>assets/img/svg/search-icon.svg" alt=""
                                          class="svg"></button>
                                    </div>
                                 </form>
                                 <!-- End Search Form -->
                           </div>

                           <div class="contact-header-right d-flex align-items-center justify-content-end mt-3 mt-sm-0">
                           <div class="add-new-contact mr-20">
                                       <a href="./create-customer.php" class="btn" >
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
                                        <th class="text-center">Customer ID </th>
                                        <th class="text-center">Customer Name </th>                                        
                                        <th class="text-center">Signature </th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Create at </th>
                                        <th>Rep.name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
include ('../file/config.php');

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>
                <label class='custom-checkbox'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>
            </td>
             <td>{$row['cus_id']}</td>
            <td>
                <div class='d-flex align-items-center'>
                    <div class='img mr-20'>
                        <img src='{$row['profile_photo']}' 
     alt='Profile Photo' 
     class='img-thumbnail' 
     style='max-width: 50px; max-height: 50px; object-fit: contain; margin-right: 10px;'>

                    </div>
                    <div class='name bold'>
                       {$row['customer_name']}
                    </div>
                </div>
            </td>

            <td>
                <div class='d-flex align-items-center'>
                    <div class='img mr-20'>
                        <img src='{$row['signature_photo']}' alt='Profile Photo' class='img-thumbnail' style='width: 50px; height: 50px; object-fit: cover; margin-right: 10px;'>
                    </div>
                 
                </div>
            </td>
            <td>{$row['email']}</td>
            <td>{$row['mobile']}</td>
            <td>{$row['city']}</td>
            <td>{$row['address']}</td>
            <td>" . date('F d, Y', strtotime($row['created_at'])) . "</td>
            <td>{$row['rep_name']}</td>
            <td class='actions'>
              <span class='contact-edit'>
                <a href='view-customer.php?cusid={$row['cus_id']}'> <img src='$url/assets/img/svg/user-icon.svg' alt='' class='svg'></a>
                </span>
                <span class='contact-edit'>
                <!-- Link to the edit page -->
                <a href='edit.php?cusid={$row['cus_id']}'> 
                    <img src='$url/assets/img/svg/c-edit.svg' alt='' class='svg'>
                </a>
              </span>
                <span class='contact-close'>
                <a href='delete_customer.php?cusid={$row['cus_id']}'> 
                    <img src='$url/assets/img/svg/c-close.svg' alt='' class='svg'>
                </a>
                    
                </span>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='9' class='text-center'>No customers found.</td></tr>";
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
                                             
                                             <a href="#" class="cancel font-14 bold mr-4" data-dismiss="modal">Cancel</a>
                                             <a href="#" class="btn ">Save Changes</a>
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
        
        <script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this customer?");
}
</script>

        <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to delete buttons
        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function() {
                const customerId = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this customer?')) {
                    // Send AJAX request
                    fetch('delete_customer.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ cus_id: customerId }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Customer deleted successfully.');
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert('Error deleting customer: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the customer.');
                    });
                }
            });
        });
    });
</script> -->
