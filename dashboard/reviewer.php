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

// Check if the user has the 'reviewer' role
if ($_SESSION['role'] !== 'reviewer') {
   header("Location: ../index.php");
   exit();
}

// Query to get total projects count
$result_total_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_projects FROM project_info");
$total_projects = mysqli_fetch_assoc($result_total_projects)['total_projects'];

// Query to get total pending reviews
$result_pending_reviews = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_reviews FROM project_info WHERE review_status = 'Pending'");
$total_pending_reviews = mysqli_fetch_assoc($result_pending_reviews)['total_pending_reviews'];

// Query to get total completed reviews
$result_completed_reviews = mysqli_query($conn, "SELECT COUNT(*) AS total_completed_reviews FROM project_info WHERE review_status = 'Completed'");
$total_completed_reviews = mysqli_fetch_assoc($result_completed_reviews)['total_completed_reviews'];

// Query to get recent projects requiring reviews
$query_recent_reviews = "SELECT project_no, customer_name, review_status, creation_date FROM project_info WHERE review_status = 'Pending' ORDER BY creation_date DESC LIMIT 5";
$result_recent_reviews = mysqli_query($conn, $query_recent_reviews);
?>

<!-- Main Content -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-3 col-sm-6">
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <i class="fa-solid fa-folder-open fa-3x text-primary"></i>
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Total Projects</p>
                        <h2><?php echo $total_projects; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-sm-6">
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <i class="fa-solid fa-hourglass-half fa-3x text-warning"></i>
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Reviews</p>
                        <h2><?php echo $total_pending_reviews; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-sm-6">
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <i class="fa-solid fa-check-circle fa-3x text-success"></i>
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Completed Reviews</p>
                        <h2><?php echo $total_completed_reviews; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-6 col-lg-6">
            <div class="card pb-2 mb-30">
               <div class="p-4">
                  <h4 class="mb-3">Recent Reviews Timeline</h4>
                  <p>Overview of the most recent projects requiring review.</p>
                  <ul class="timeline">
                     <?php while ($row = mysqli_fetch_assoc($result_recent_reviews)): ?>
                        <li class="event" data-date="<?php echo htmlspecialchars($row['creation_date']); ?>">
                           <h4><?php echo htmlspecialchars($row['project_no']); ?></h4>
                           <p><strong>Customer:</strong> <?php echo htmlspecialchars($row['customer_name']); ?></p>
                           <p><strong>Status:</strong> <span class="badge badge-warning">Pending</span></p>
                        </li>
                     <?php endwhile; ?>
                  </ul>
               </div>
            </div>
         </div>

         <div class="col-xl-12">
            <div class="card">
               <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                     <div class="title-content mb-4">
                        <h4 class="mb-2">Recent Reviews</h4>
                        <p class="font-14">List of recent projects requiring review.</p>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table id="review-table" class="order-list-table style--three table-centered text-nowrap">
                     <thead>
                        <tr>
                           <th>Project ID</th>
                           <th>Start Date</th>
                           <th>Customer</th>
                           <th>Review Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $query_recent = "SELECT * FROM project_info ORDER BY creation_date DESC LIMIT 10";
                        $result_recent = mysqli_query($conn, $query_recent);
                        while ($row = mysqli_fetch_assoc($result_recent)) {
                           echo "<tr>
                                 <td>#" . str_pad($row['project_no'], 5, "0", STR_PAD_LEFT) . "</td>
                                 <td>" . date("d M Y", strtotime($row['creation_date'])) . "</td>
                                 <td>" . htmlspecialchars($row['customer_name']) . "</td>
                                 <td><span class='badge badge-warning'>" . htmlspecialchars($row['review_status']) . "</span></td>
                                 <td><a href='../job/job-details.php?id=" . $row['project_no'] . "' class='btn btn-primary'>Details</a></td>
                              </tr>";
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

<?php include_once('../inc/footer.php'); ?>
