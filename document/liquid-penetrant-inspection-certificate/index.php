<?php
include_once('../../inc/function.php');
include_once('../../file/config.php'); // Include your database connection

// SQL query to fetch data from the 'eddy_current_inspection' table
$sql = "SELECT certificate_no, project_no, report_no, inspector, inspection_date FROM liquid_penetrant_inspection";
$result = $conn->query($sql);
if (!$result) {
    die("Error fetching data: " . $conn->error); // Handle query errors
}
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
                                 <a href="#" class="btn">Liquid Penetrant Inspection Certificate</a>
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
                                                                


                                 <div class="add-new-contact mr-20">
   <a href="create.php" class="btn-circle">
      <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg">
   </a>
</div>



                                 <!-- End Add New Contact Btn -->                            

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
                <!-- <th>Company Name</th> -->
                <!-- <th>Serial Number</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
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
                                <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg">
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
                                <?php
                                // Construct the image path
                                $inspector_image_path = "../../inspector/uploads/" . urlencode($row['inspector']) . "/images/profile_image.jpg";

                                // Check if the image file exists
                                if (file_exists($inspector_image_path)) {
                                    echo "<img src='$inspector_image_path' class='img-40' alt='Inspector Image'>";
                                } else {
                                    // Placeholder image if the file doesn't exist
                                    echo "<img src='{$url}assets/img/avatar/default-avatar.png' class='img-40' alt='Default Image'>";
                                }
                                ?>
                            </div>
                            <div class="name bold">
                                <?php echo $row['inspector']; ?>
                            </div>
                        </div>
                    </td>
                    <td><?php echo date('F j, Y', strtotime($row['inspection_date'])); ?></td>
                    <!-- <td><?php echo $row['companyName']; ?></td> -->
                    <!-- <td><?php echo $row['serial_no']; ?></td> -->
                    <td class="actions">
                        <?php if ($_SESSION['role'] === 'document controller' && $row['project_status'] !== 'Completed') : ?>
                            <a href="edit.php?project_no=<?php echo $row['project_no']; ?>" class="contact-edit">
                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                            </a>
                        <?php else : ?>
                            <a class="contact-edit disabled" style="pointer-events: none; opacity: 0.5;">
                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                            </a>
                        <?php endif; ?>

                        <span class="contact-close" onclick="deleteRow('<?php echo $row['project_no']; ?>', this)">
                            <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
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
        include_once('../../inc/footer.php');
        ?>
        

        <script>
    function deleteRow(project_no, element) {
        if (confirm("Are you sure you want to delete this row?")) {
            // Remove the row from the frontend
            var row = element.closest('tr');
            row.parentNode.removeChild(row);

            // Send an AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert("Row deleted successfully");
                } else if (xhr.status != 200) {
                    alert("Failed to delete row. Please try again.");
                }
            };
            xhr.send("project_no=" + project_no);
        }
    }
</script>