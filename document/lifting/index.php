<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// SQL query to fetch data from the 'lifting_gears_certificate' table
// $sql = "SELECT * FROM lifting_gear_certificates";
// $result = $conn->query($sql);

$sql = "SELECT lgc.*, pi.project_status 
        FROM lifting_gear_certificates lgc
        LEFT JOIN project_info pi 
        ON lgc.project_no = pi.project_no";
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
                                 <a href="#" class="btn">Lifting Gears Certificate</a>
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
                                       <a href="./create.php" class="btn-circle">
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
                <!-- Star -->
                <div class="star">
                    <a href="#"><img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg"></a>
                </div>
            </th>
            <th>Certificate No</th>
            <th>Project ID </th>
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
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>
        <label class='custom-checkbox'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>
        <div class='star'>
            <a href='./view.php?project_no=" . $row['project_no'] . "'>
                <div class='icon text-primary'>
                    <i class='et-clipboard'></i>
                </div>
            </a>

            <a href='./download.php?project_no=" . $row['project_no'] . "'>
                                                    <div class='icon text-primary'>
                                                        <i class='et-download'></i>
                                                    </div>
                                                </a>
        </div>        
      </td>";

                echo "<td>" . $row['certificate_no'] . "</td>";
                echo "<td>" . $row['project_no'] . "</td>";
                echo "<td>" . $row['report_no'] . "</td>";
                echo "<td>
                        <div class='d-flex align-items-center'>
                            <div class='img mr-20'>
                                <img src='" . $url . "assets/img/avatar/m16.png' class='img-40' alt=''>
                            </div>
                            <div class='name bold'>" . $row['inspector'] . "</div>
                        </div>
                    </td>";
                echo "<td>" . $row['date_of_this_examination'] . "</td>";
                echo "<td>" . $row['companyName'] . "</td>";
                echo "<td>" . $row['identification_no'] . "</td>";
                echo "<td class='actions'>";

// Check if the user is 'document_controller' and the project is not completed
if ($_SESSION['role'] === 'document controller' && $row['project_status'] !== 'Completed') {
    echo "<span class='contact-edit' onclick='redirectToEditLifting(" . $row['project_no'] . ")'>
            <img src='" . $url . "assets/img/svg/c-edit.svg' alt='' class='svg'>
          </span>";
} else {
    echo "<span class='contact-edit disabled'>
            <img src='" . $url . "assets/img/svg/c-edit.svg' alt='' class='svg' style='opacity: 0.5; cursor: not-allowed;'>
          </span>";
}

// Delete action remains unchanged
echo "<span class='contact-close' onclick='deleteRow(" . $row['project_no'] . ")'>
        <img src='" . $url . "assets/img/svg/c-close.svg' alt='' class='svg'>
      </span>";

echo "</td>";



                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found.</td></tr>";
        }
        // Close the connection
        $conn->close();
        ?>
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
      <script>
function deleteRow(projectNo) {
    if (confirm('Are you sure you want to delete this row?')) {
        // AJAX call to delete the row from the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_lifting.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('row_' + projectNo).remove();
            } else {
                alert('Error: Unable to delete record.');
            }
        };
        xhr.send('project_no=' + projectNo);
    }
}
</script>
<script>
    function redirectToEditLifting(project_no) {
        // Redirect to edit_lifting.php with project_no as a query parameter
        window.location.href = 'edit_lifting.php?project_no=' + project_no;
    }
</script>

<?php 
include_once('../../inc/footer.php');
?>
        