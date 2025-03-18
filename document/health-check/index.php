<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// SQL query to fetch data from the 'lifting_gears_certificate' table


$sql = "SELECT chc.certificate_no, chc.project_no, chc.report_no, chc.inspector, chc.inspection_date, chc.customer_name, pi.project_status 
        FROM crane_health_check_certificate chc
        LEFT JOIN project_info pi 
        ON chc.project_no = pi.project_no";

$result = $conn->query($sql);


// $sql = "SELECT chc.*, pi.project_status 
//         FROM crane_health_check_certificate chc
//         LEFT JOIN project_info pi 
//         ON chc.project_no = pi.project_no";

// $result = $conn->query($sql);


// $sql = "SELECT * FROM crane_health_check_certificate ORDER BY created_at DESC";
// $result = $conn->query($sql);

// SQL query to fetch data from the 'crane_health_check_certificate' table and join with the 'inspector' table
// $sql = "SELECT 
//             chc.*, 
//             i.profile_photo AS inspector_image 
//         FROM crane_health_check_certificate chc
//         LEFT JOIN inspector i 
//         ON chc.inspector = i.name";

// $result = $conn->query($sql);
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
                                 <a href="#" class="btn">Health Check Certificate</a>
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
                                    <!-- <div class="add-new-contact mr-20">
                                       <a href="#" class="btn-circle" data-toggle="modal" data-target="#contactAddModal">
                                          <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg">
                                       </a>
                                 </div> -->


                                 <div class="add-new-contact mr-20">
   <a href="create.php" class="btn-circle">
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
            <th>Client Name</th>
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

                        <a href="./download.php?project_no=<?php echo $row['project_no']; ?>"><img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg"></a>
                    </div>
                    <!-- End Star -->

                    
                </td>
                <td><?php echo $row['certificate_no']; ?></td>
                <td><?php echo $row['project_no']; ?></td> <!-- Assuming jrn is the Project ID -->
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
                <td><?php echo $row['customer_name']; ?></td>
                 <!-- Assuming customer_name is the company name -->
                <!-- <td><?php echo $row['serial_number']; ?></td> -->
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

                            <!-- End Invoice List Table -->
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
