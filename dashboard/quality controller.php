<?php
// session_start();
// Ensure session is started
include_once('../file/config.php');
include_once('../inc/function.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
   header("Location: ../index.php");
   exit();
}

// Check if the user has the 'quality controller' role
if ($_SESSION['role'] !== 'quality controller') {
   // Redirect to a default page or show an error
   header("Location: ../index.php");
   exit();
}

// Query to get total projects count
$result_total_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_projects FROM project_info");
$total_projects = mysqli_fetch_assoc($result_total_projects)['total_projects'];

// Query to get total pending QC checks
$result_pending_qc = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_qc FROM project_info WHERE project_status = 'Pending'");
$total_pending_qc = mysqli_fetch_assoc($result_pending_qc)['total_pending_qc'];

// Query to get total completed QC checks
$result_completed_qc = mysqli_query($conn, "SELECT COUNT(*) AS total_completed_qc FROM project_info WHERE project_status = 'Completed'");
$total_completed_qc = mysqli_fetch_assoc($result_completed_qc)['total_completed_qc'];

// Query to get recent projects requiring QC checks
$query_recent_projects = "SELECT project_no, customer_name, project_status, certificatestatus, review_status, creation_date 
                          FROM project_info 
                          WHERE project_status = 'Pending'
                          ORDER BY creation_date DESC 
                          LIMIT 5"; // Adjust the limit as needed
$result_recent_projects = mysqli_query($conn, $query_recent_projects);

// Query to get latest news
$news_query = "SELECT * FROM news ORDER BY created_at DESC";
$news_result = mysqli_query($conn, $news_query);
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
                        <i class="fa-solid fa-hourglass-half fa-3x text-warning"></i> <!-- Pending Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending QC Checks</p>
                        <h2><?php echo $total_pending_qc; ?></h2>
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
                        <i class="fa-solid fa-check-circle fa-3x text-success"></i> <!-- Completed Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Completed QC Checks</p>
                        <h2><?php echo $total_completed_qc; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
         </div>

         <!-- <div class="col-xl-3 col-sm-6">
            
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <i class="fa-solid fa-exclamation-triangle fa-3x text-danger"></i> 
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Expiring Stickers</p>
                        <h2>46</h2>
                     </div>
                  </div>
               </div>
            </div>
            
         </div> -->



         <!-- Quality Controller Notifications Card -->
<div class="col-xl-6 col-lg-6">
    <div class="card pb-2 mb-30">
        <div class="p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">QC Notifications</h4>
                <?php 
                $qc_notifications_query = "SELECT COUNT(*) AS qc_count FROM project_notifications 
                                          WHERE quality_controller = 'pending' OR quality_controller IS NOT NULL";
                $qc_result = mysqli_query($conn, $qc_notifications_query);
                $qc_count = mysqli_fetch_assoc($qc_result)['qc_count'];
                
                if ($qc_count > 0): ?>
                    <span class="badge badge-danger"><?php echo $qc_count; ?> new</span>
                <?php endif; ?>
            </div>
            <p>Certificates requiring your quality control review.</p>
            <ul class="list-group">
                <?php 
                $qc_notifications_list = "SELECT id, project_no, certificate_no, notification_message, created_at 
                                        FROM project_notifications 
                                        WHERE quality_controller = 'pending' OR quality_controller IS NOT NULL
                                        ORDER BY created_at DESC 
                                        LIMIT 5";
                $qc_list_result = mysqli_query($conn, $qc_notifications_list);
                
                if (mysqli_num_rows($qc_list_result) > 0) {
                    while ($row = mysqli_fetch_assoc($qc_list_result)) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>' . htmlspecialchars($row['notification_message']) . '</strong>
                                    <div class="text-muted small mt-1">
                                        Project: ' . htmlspecialchars($row['project_no']) . ' • ' . 
                                        date("M j, Y g:i A", strtotime($row['created_at'])) . '
                                    </div>
                                </div>
                                <a href="../certificates/view_certificate.php?certificate_no=' . $row['certificate_no'] . '" class="btn btn-sm btn-primary">Review</a>
                              </li>';
                    }
                } else {
                    echo '<li class="list-group-item text-center text-muted">No QC notifications found</li>';
                }
                ?>
            </ul>
            <?php if ($qc_count > 0): ?>
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary mark-qc-read">Mark all as read</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

      <div class="col-xl-6 col-lg-6">
        <div class="card pb-2 mb-30">
            <div class="p-4">
                <div class="row">
                    <div class="col-xl-12 mb-40">
                        <h4 class="mb-3">Latest News</h4>
                        <p>Stay updated with the latest news and announcements.</p>
                    </div>
                    <div class="col-xl-12 p-4">
                        <?php
                        include '../file/config.php';
                        $query = "SELECT id, news_text, created_at FROM news ORDER BY created_at DESC LIMIT 5";
                        $result = mysqli_query($conn, $query);


                        $colors = ['primary', 'success', 'warning', 'info', 'danger'];
                        $i = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $color = $colors[$i % count($colors)]; 
                            echo '<div class="card bg-' . $color . ' text-white mb-3">
                                    <div class="card-body">
                                        <p class="mb-1 font-weight-bold">' . htmlspecialchars($row['news_text']) . '</p>
                                        <small class="text-white-50">' . date("F j, Y, g:i A", strtotime($row['created_at'])) . '</small>
                                    </div>
                                  </div>';
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

         <!-- <div class="col-xl-6 col-lg-6">
           
            <div class="card pb-2 mb-30">
               <div class="p-4">
                  <div class="row">
                     <div class="col-xl-12 mb-40">
                        <h4 class="mb-3">Recent Projects Timeline</h4>
                        <p>Overview of the most recent projects requiring QC checks.</p>
                     </div>

                     <div class="col-xl-12 p-4">
                        
                        <div id="timeline-wrap">
                           <ul class="timeline">
                              <?php while ($row = mysqli_fetch_assoc($result_recent_projects)): ?>
                                 <li class="event" data-date="<?php echo htmlspecialchars($row['creation_date']); ?>">
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
                        
                     </div>
                  </div>
               </div>
            </div>
            
         </div> -->

         <div class="col-xl-6 col-lg-6">
            <!-- Card -->
            <div class="card mb-30">
               <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-end justify-content-between mb-3">
                     <div class="">
                        <h4 class="mb-1">Ongoing QC Checks</h4>
                        <p class="font-14">List of projects pending QC checks.</p>
                     </div>
                  </div>

                  <!-- Product List -->
                  <div class="product-list">
                     <?php
                     // Query to get ongoing QC checks
                     $query_ongoing_qc = "SELECT project_no, customer_name, project_status 
                                          FROM project_info 
                                          WHERE project_status = 'Pending'
                                          ORDER BY creation_date DESC 
                                          LIMIT 4";
                     $result_ongoing_qc = mysqli_query($conn, $query_ongoing_qc);

                     while ($row = mysqli_fetch_assoc($result_ongoing_qc)): ?>
                        <div class="product-list-item mb-20 d-flex justify-content-between align-items-center">
                           <div class="d-flex align-items-center">
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
                     <?php endwhile; ?>
                  </div>
                  <!-- End Product List -->
               </div>
            </div>
            <!-- End Card -->
         </div>

         <div class="col-xl-12">
            <!-- Card -->
            <div class="card">
               <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                     <div class="title-content mb-4">
                        <h4 class="mb-2">Recent Projects</h4>
                        <p class="font-14">List of recent projects requiring QC checks.</p>
                     </div>
                  </div>
               </div>

               <div class="table-responsive">
                  <table id="job-table" class="order-list-table style--three table-centered text-nowrap">
                     <thead>
                        <tr>
                           <th>Project ID</th>
                           <th>Start Date</th>
                           <th>Customer</th>
                           <th>Certificate Status</th>
                           <th>Review Status</th>                           
                           <th>QC Status</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        // Query to get recent projects requiring QC checks
                        $query_recent = "SELECT * FROM project_info ORDER BY creation_date DESC LIMIT 10";
                        $result_recent = mysqli_query($conn, $query_recent);

                        if ($result_recent->num_rows > 0) {
                           while ($row = $result_recent->fetch_assoc()) {
                              ?>
                              <tr>
                                 <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                                 <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                                 <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                                 <td class="status-btn">
                                    <a href="#" class="btn s_alert <?php echo ($row["certificatestatus"] === "Certificate Created") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
                                       <?php echo ($row["certificatestatus"] === "Certificate Created") ? 'Certificate Created' : 'pending'; ?>
                                    </a>
                                 </td>
                                 <td class="status-btn">
                                    <a href="#" class="btn s_alert <?php echo ($row["review_status"] === "Completed") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
                                       <?php echo ($row["review_status"] === "Completed") ? 'Completed' : 'Pending'; ?>
                                    </a>
                                 </td>
                                 <td class="status-btn">
                                    <a href="#" class="btn s_alert <?php echo ($row["project_status"] === "Completed") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
                                       <?php echo ($row["project_status"] === "Completed") ? 'Completed' : 'Pending'; ?>
                                    </a>
                                 </td>
                                 <td class="status-btn">
                                    <a href="#" class="btn s_alert <?php echo ($row["project_status"] === "Completed") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
                                       <?php echo ($row["project_status"] === "Completed") ? 'Completed' : 'Pending'; ?>
                                    </a>
                                 </td>
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
                           echo "<tr><td colspan='6' class='text-center'>No records found.</td></tr>";
                        }
                        ?>
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


   <script>
// Mark all QC notifications as read
document.querySelector('.mark-qc-read')?.addEventListener('click', function(e) {
    e.preventDefault();
    
    fetch('mark_qc_notifications_read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the badge and "mark as read" button
            document.querySelector('.badge')?.remove();
            document.querySelector('.mark-qc-read')?.remove();
            
            // Optionally change the notification style to indicate they're read
            document.querySelectorAll('.list-group-item').forEach(item => {
                item.style.opacity = '0.8';
            });
        }
    });
});
</script>


<?php
include_once('../inc/footer.php');
?>