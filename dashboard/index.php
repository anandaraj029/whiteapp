<?php
include_once('../file/config.php');
// include '../file/auth.php';
// include '';

include_once('../inc/function.php');


// Check if the user is logged in
$logged_in_user = $_SESSION['username'] ?? null; // Replace with the appropriate session key
$user_role = $_SESSION['role'] ?? null; // Assuming you have a role stored in the session


// Query to get total projects count
$result_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_projects FROM project_info");
$total_projects = mysqli_fetch_assoc($result_projects)['total_projects'];


// Query to get total customers count
$result_customers = mysqli_query($conn, "SELECT COUNT(*) AS total_customers FROM customers");
$total_customers = mysqli_fetch_assoc($result_customers)['total_customers'];

// Query to get total pending projects count
$result_pending_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_projects FROM project_info WHERE project_status = 'Pending'");
$total_pending_projects = mysqli_fetch_assoc($result_pending_projects)['total_pending_projects'];



if ($logged_in_user) {
    // Fetch data based on user role
    if ($user_role === 'admin') {
        // Fetch all data from the 'project_info' table for admin
        $sql = "SELECT * FROM project_info ORDER BY creation_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // Fetch data from the 'project_info' table for the logged-in inspector
        $sql = "SELECT * FROM project_info WHERE inspector_name = ? ORDER BY creation_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $logged_in_user);
        $stmt->execute();
        $result = $stmt->get_result();
    }
} else {
    // Redirect to login page if not logged in
    header("Location: ../index.php");
    exit;
}



$query = "SELECT project_no, customer_name, project_status 
          FROM project_info 
          WHERE project_status = 'Pending' 
          ORDER BY creation_date DESC 
          LIMIT 4";

$result_pending = mysqli_query($conn, $query);




// Fetch recent projects with their status
$query_recent_projects = "SELECT project_no, customer_name, project_status, creation_date 
                          FROM project_info 
                          ORDER BY creation_date DESC 
                          LIMIT 5"; // Adjust the limit as needed

$result_recent_projects = mysqli_query($conn, $query_recent_projects);

?>


<!-- Main Content -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
               <div class="state">
               <div class="d-flex align-items-center flex-wrap">
    <div class="state-icon d-flex justify-content-center">
        <i class="fa-solid fa-folder-open fa-3x text-primary"></i> <!-- Folder Open Icon -->
    </div>
    <div class="state-content">
        <p class="font-14 mb-2">Total Projects</p>
        <h2><?php echo $total_projects; ?></h2>
    </div>
</div>

               </div>
            </div>
            <!-- End Card -->
         </div>

         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <!-- <img src="../assets/img/png-icon/revenue.png" alt=""> -->
                        <i class="fa-solid fa-hourglass-half fa-3x text-warning"></i> <!-- Pending Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Projects</p>
                        <h2><?php echo $total_pending_projects; ?></h2>
                        <!-- <h2>
                           25</h2> -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
         </div>

         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <!-- <img src="../assets/img/png-icon/comission.png" alt=""> -->
                        <i class="fa-solid fa-user fa-3x text-primary"></i> <!-- Customer Icon -->

                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Total Customer</p>
                        <h2><?php echo $total_customers; ?></h2>

                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
         </div>

         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <!-- <img src="../assets/img/png-icon/user.png" alt=""> -->
                        <i class="fa-solid fa-triangle-exclamation fa-3x text-danger"></i> <!-- Expiring Stickers Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Expiring Sticker</p>
                        <h2>46</h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
         </div>

        

         <!-- <div class="col-xl-6 col-lg-6">
            
            <div class="card pb-2 mb-30">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-xl-12 mb-40">
                                    <h4 class="mb-3">Timeline</h4>
                                    <p>Vestibulum blandit viverra convallis.</p>
                                </div>

                                <div class="col-xl-12 p-4">
                                    
                                    <div id="timeline-wrap">
                                        <ul class="timeline">
                                            <li class="event" data-date="12 October 2019">
                                                <span>1:08 AM</span>
                                                <h4>Vitae eius reiciendis</h4>
                                                <p>Recusandae quia explicabo.</p>
                                            </li>
                                            <li class="event">
                                                <span>8:00 PM</span>
                                                <h4>Est accusamus rerum molestias.</h4>
                                                <p> Ut illo ut aut. Est exercitationem voluptas optio molestiae modi.</p>
                                            </li>
                                            <li class="event" data-date="13 October 2019">
                                                <span>2:50 PM</span>
                                                <h4>Quam aut exercitationem adipisci</h4>
                                                <p> Alias vitae voluptatum et. Aut odit facere iure dolore. Ut consequatur omnis.</p>
                                            </li>
                                            <li class="event" data-date="14 October 2019">
                                                <span>1:06 PM</span>
                                                <h4>Mollitia assumenda aut sit vel</h4>
                                                <p>Eum dolores nemo quasi repudiandae sunt nesciunt aut possimus.</p>
                                            </li>
                                             <li class="event" data-date="">
                                                <span>11:21 PM</span>
                                                <h4>Voluptas voluptas aut magnam</h4>
                                                <p>Rerum repudiandae voluptatem aut.</p>
                                            </li>
                                            <li class="event" data-date="15 October 2019">
                                                <span>7:10 PM</span>
                                                <h4> dolor excepturi enim.</h4>
                                                <p>Aperiam eos sint repellat nihil ut fuga autem molestiae accusamus.</p>
                                            </li> 
                                        </ul>
                                        
                                    </div>
                                    <a href="../setup/timeline.php" class="d-flex justify-content-center pt-4"><button type="button" class="details-btn">View More <i class="icofont-arrow-right"></i></button></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            
         </div> -->



         <div class="col-xl-6 col-lg-6">
    <!-- Card -->
    <div class="card pb-2 mb-30">
        <div class="p-4">
            <div class="row">
                <div class="col-xl-12 mb-40">
                    <h4 class="mb-3">Recent Projects Timeline</h4>
                    <p>Overview of the most recent projects and their status in a timeline format.</p>
                </div>

                <div class="col-xl-12 p-4">
                    <!-- Timeline Wrap -->
                    <div id="timeline-wrap">
                        <ul class="timeline">
                            <?php while ($row = mysqli_fetch_assoc($result_recent_projects)): ?>
                                <li class="event" data-date="<?php echo htmlspecialchars($row['creation_date']); ?>">
                                    <!-- <span><?php echo htmlspecialchars($row['creation_date']); ?></span> -->
                                    <h4><?php echo htmlspecialchars($row['project_no']); ?></h4>
                                    <p><strong>Customer:</strong> <?php echo htmlspecialchars($row['customer_name']); ?></p>
                                    <p><strong>Status:</strong> 
    <?php 
        $status = htmlspecialchars($row['project_status']);
        $badgeClass = ($status == 'Pending') ? 'badge-danger' : (($status == 'Completed') ? 'badge-success' : 'badge-secondary'); 
    ?>
    <span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span>
</p>

                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <!-- End Timeline Wrap -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
         <div class="col-xl-6 col-lg-6">
    <div class="card mb-30">
        <div class="card-body" style="min-height: 877px;">
            <div class="d-flex align-items-start align-items-sm-end justify-content-between mb-3">
                <div class="">
                    <h4 class="mb-3">Ongoing Projects</h4>
                    <p class="font-14">List of recent pending projects.</p>
                </div>
            </div>

            <div class="product-list p-4">
                <?php while ($row = mysqli_fetch_assoc($result_pending)) { ?>
                    <div class="product-list-item mb-20 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <!-- <div class="img mr-3">
                                <img src="../assets/img/project/default.png" alt="Project Image">
                            </div> -->

                            <div class="icon mr-3">
                                <i class="fa-solid fa-file-alt fa-2x text-primary"></i> <!-- Document Icon -->
                            </div>
                            <div class="content">
                                <p class="black mb-1"><?= htmlspecialchars($row['project_no']) ?></p>
                                <span class="c3 bold font-14">Client: <?= htmlspecialchars($row['customer_name']) ?></span>
                            </div>
                        </div>
                        <p class="font-14"><?= htmlspecialchars($row['project_status']) ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

         
         <div class="col-xl-12">
            <!-- Card -->
            <div class="card">
               <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                     <div class="title-content mb-4">
                        <h4 class="mb-2">Recent Projects</h4>
                        <p class="font-14">Tell use paid law ever yet new. Meant to learn of vexed if style allow he there.</p>
                     </div>                     
                  </div>
               </div>

        <div class="table-responsive">
        <!-- Invoice List Table -->
      
        <div class="table-responsive">
        <table id="job-table" class="order-list-table style--three table-centered text-nowrap">
    <thead>
        <tr>
            <th>Project ID</th>
            <th>Start Date</th>
            <th>Progress</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Equip. Type</th>
            <th>Location</th>
            <th>Inspector</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                    <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                    <!-- <td>
                        <div class="product-img">
                        <badge class="primary">
                       <a href=""><i class="icofont-checked color-primary"></i> Checklist</a> </badge>
                       <a href=""><i class="icofont-edit color-primary"></i> Report</a> 
                       <a href=""><i class="icofont-data color-primary"></i> Certificate</a> 
                             <img src="../assets/img/product/product1.png" alt="">
                            <img src="../assets/img/product/product1.png" alt="">
                            <img src="../assets/img/product/product1.png" alt=""> 
                        </div>
                    </td> -->


                    <td>
    <div class="product-img">
        <?php if ($row['checklist_status'] === 'Pending') { ?>
            <a href="../document/checklist/add-checklist.php?project_no=<?php echo $row['project_no']; ?>" class="text-primary">
                <i class="icofont-checked color-primary"></i> Create Checklist
            </a>
        <?php } else { ?>
            <span class="text-success">
                <i class="icofont-check color-success"></i> Checklist Created
            </span>
        <?php } ?>

        <!-- Report Button Logic -->
        <!-- Report Button Logic -->
        <?php if ($row['checklist_status'] === 'Created') { ?>
    <?php if ($row['report_status'] === 'Pending') { ?>
        <a href="../document/report/create.php?project_no=<?php echo $row['project_no']; ?>" class="text-primary">
            <i class="icofont-edit color-primary"></i> Create Report
        </a>
    <?php } elseif ($row['report_status'] === 'Generated') { ?>
        <span class="text-success">
            <i class="icofont-check color-success"></i> Report Created
        </span>
    <?php } else { ?>
        <span class="text-muted">
            <i class="icofont-lock"></i> Report Locked
        </span>
    <?php } ?>
<?php } else { ?>
    <span class="text-muted">
        <i class="icofont-lock"></i> Checklist Pending
    </span>
<?php } ?>

        <!-- Certificate Link -->
        <!-- <a href="generate-certificate.php?id=<?php echo $row['project_no']; ?>">
            <i class="icofont-data color-primary"></i> Certificate
        </a>  -->
    </div>
</td>

                    <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                    <td class="status-btn pending"><?php echo htmlspecialchars($row["project_status"]); ?></td>
                    <td><?php echo htmlspecialchars($row["equipment_type"]); ?></td>
                    <td><?php echo htmlspecialchars($row["equipment_location"]); ?></td>
                    <td><?php echo htmlspecialchars($row["inspector_name"]); ?></td>
                    <td>
                     
                     <a href="../job/job-details.php?id=<?php echo $row['project_no']; ?>">
                                                        <button type="button" class="details-btn">
                                                            Details <i class="icofont-arrow-right"></i>
                                                        </button>
                                                    </a>
                                                    
                                                    
                                                </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>
               </div>
        <!-- End Invoice List Table -->
    </div>
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