<?php
include_once('../file/config.php');
include_once('../inc/function.php');

// Check if the user is logged in
$logged_in_user = $_SESSION['username'] ?? null; // Replace with the appropriate session key
$user_role = $_SESSION['role'] ?? null; // Assuming you have a role stored in the session

if (!$logged_in_user || $user_role !== 'inspector') {
    // Redirect to login page if not logged in or not an inspector
    header("Location: ../index.php");
    exit;
}

// Query to get total projects count for the logged-in inspector
$result_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_projects FROM project_info WHERE inspector_name = '$logged_in_user'");
$total_projects = mysqli_fetch_assoc($result_projects)['total_projects'];

// Query to get total pending projects count for the logged-in inspector
$result_pending_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_projects FROM project_info WHERE inspector_name = '$logged_in_user' AND project_status = 'Pending'");
$total_pending_projects = mysqli_fetch_assoc($result_pending_projects)['total_pending_projects'];

// Query to get total pending checklist count for the logged-in inspector
$result_pending_checklist = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_checklist FROM project_info WHERE inspector_name = '$logged_in_user' AND checklist_status = 'Pending'");
$total_pending_checklist = mysqli_fetch_assoc($result_pending_checklist)['total_pending_checklist'];

// Query to get total pending report count for the logged-in inspector
$result_pending_report = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_report FROM project_info WHERE inspector_name = '$logged_in_user' AND report_status = 'Pending'");
$total_pending_report = mysqli_fetch_assoc($result_pending_report)['total_pending_report'];

// Fetch recent projects with their status for the logged-in inspector
$query_recent_projects = "SELECT project_no, customer_name, project_status, creation_date 
                          FROM project_info 
                          WHERE inspector_name = '$logged_in_user'
                          ORDER BY creation_date DESC"; // Adjust the limit as needed

$result_recent_projects = mysqli_query($conn, $query_recent_projects);

// Fetch ongoing projects for the logged-in inspector
$query_ongoing_projects = "SELECT project_no, customer_name, project_status 
                           FROM project_info 
                           WHERE inspector_name = '$logged_in_user' AND project_status = 'Pending' 
                           ORDER BY creation_date DESC 
                           LIMIT 4";

$result_ongoing_projects = mysqli_query($conn, $query_ongoing_projects);


// Query to fetch notifications for the logged-in inspector
// Fetch all notifications for the inspector
$query_notifications = "SELECT project_no FROM project_notifications 
                        WHERE inspector_name = '$logged_in_user'";

$result_notifications = mysqli_query($conn, $query_notifications);

while ($row = mysqli_fetch_assoc($result_notifications)) {
    $project_no = $row['project_no'];

    // Check project status from project_info table
    $status_query = "SELECT project_status FROM project_info WHERE project_no = '$project_no'";
    $status_result = mysqli_query($conn, $status_query);
    $status_row = mysqli_fetch_assoc($status_result);

    // If project is completed, delete the notification
    if ($status_row && $status_row['project_status'] == "Completed") {
        $delete_query = "DELETE FROM project_notifications WHERE project_no = '$project_no'";
        mysqli_query($conn, $delete_query);
    }
}

// Now fetch only active notifications
$query_notifications = "SELECT project_no, Notification_message, created_at 
                        FROM project_notifications 
                        WHERE inspector_name = '$logged_in_user' 
                        ORDER BY created_at DESC";

$result_notifications = mysqli_query($conn, $query_notifications);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Internal Styles for Pagination -->
    <style>

.list-group-item {
   border-left: 5px solid #007bff; /* Blue border for notifications */
   transition: background 0.3s;
}

.list-group-item:hover {
   background: #f8f9fa;
}

      
    </style>
</head>
<body>

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
                        <p class="font-14 mb-2">Pending Projects</p>
                        <h2><?php echo $total_pending_projects; ?></h2>
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
                        <i class="fa-solid fa-clipboard-list fa-3x text-danger"></i> <!-- Checklist Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Checklists</p>
                        <h2><?php echo $total_pending_checklist; ?></h2>
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
                        <i class="fa-solid fa-file-alt fa-3x text-info"></i> <!-- Report Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Reports</p>
                        <h2><?php echo $total_pending_report; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
         </div>

<div class="col-xl-6 col-lg-6">
   <div class="card mb-30">
      <div class="card-body">
         <h4 class="mb-3">Notifications</h4>
         <p class="font-14">Recent project assignments and updates.</p>
         
         <ul class="list-group">
            <?php while ($row = mysqli_fetch_assoc($result_notifications)): ?>
               <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div>
                     <h6 class="mb-1"><?php echo htmlspecialchars($row['project_no']); ?></h6>
                     <p class="mb-0"><?php echo htmlspecialchars($row['Notification_message']); ?></p>
                     <small class="text-muted"><?php echo date("d M Y, H:i A", strtotime($row['created_at'])); ?></small>
                  </div>
               </li>
            <?php endwhile; ?>
            
            <?php if (mysqli_num_rows($result_notifications) == 0): ?>
               <li class="list-group-item text-center">No new notifications.</li>
            <?php endif; ?>
         </ul>
      </div>
   </div>
</div>
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
                     <?php while ($row = mysqli_fetch_assoc($result_ongoing_projects)) { ?>
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
                        <p class="font-14">List of recent projects assigned to you.</p>
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
                           <th>Status</th>
                           <th>Equip. Type</th>
                           <th>Location</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $query_recent = "SELECT * FROM project_info WHERE inspector_name = '$logged_in_user' ORDER BY creation_date DESC LIMIT 10";
                        $result_recent = mysqli_query($conn, $query_recent);

                        if ($result_recent->num_rows > 0) {
                           while ($row = $result_recent->fetch_assoc()) {
                              ?>
                              <tr>
                                 <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                                 <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                                 <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                                 <td class="status-btn">
                                    <a href="#" class="btn s_alert <?php echo ($row["project_status"] === "Completed") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
                                       <?php echo ($row["project_status"] === "Completed") ? 'Completed' : 'Pending'; ?>
                                    </a>
                                 </td>
                                 <td><?php echo htmlspecialchars($row["equipment_type"]); ?></td>
                                 <td><?php echo htmlspecialchars($row["equipment_location"]); ?></td>
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
                           echo "<tr><td colspan='7' class='text-center'>No records found.</td></tr>";
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Main Content -->
                     </body>
                     </html>
<?php
include_once('../inc/footer.php');
?>