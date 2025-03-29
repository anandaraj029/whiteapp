<?php
include_once('../file/config.php');
include_once('../inc/function.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
   header("Location: ../index.php");
   exit();
}

// Check if the user has the 'document controller' role
if ($_SESSION['role'] !== 'document controller') {
   // Redirect to a default page or show an error
   header("Location: ../index.php");
   exit();
}

// Query to get total projects count
$result_projects = mysqli_query($conn, "SELECT COUNT(*) AS total_projects FROM project_info");
$total_projects = mysqli_fetch_assoc($result_projects)['total_projects'];

// Query to get total pending projects count for the document controller
$result_pending_projects = mysqli_query($conn, "SELECT COUNT(*) AS pending_projects FROM project_info WHERE project_status = 'Pending'");
$pending_projects = mysqli_fetch_assoc($result_pending_projects)['pending_projects'];

// Query to get recent projects with their status
$query_recent_projects = "SELECT project_no, customer_name, project_status, creation_date 
                          FROM project_info 
                          ORDER BY creation_date DESC 
                          LIMIT 6"; // Adjust the limit as needed
$result_recent_projects = mysqli_query($conn, $query_recent_projects);

// Query to get ongoing pending projects
// $query_pending = "SELECT project_no, customer_name, project_status 
//                   FROM project_info 
//                   WHERE project_status = 'Pending' 
//                   ORDER BY creation_date DESC 
//                   LIMIT 4";
// $result_pending = mysqli_query($conn, $query_pending);


$query_completed = "SELECT project_no, customer_name, project_status 
                    FROM project_info 
                    WHERE project_status = 'Completed' 
                    ORDER BY creation_date DESC 
                    LIMIT 4";
$result_completed = mysqli_query($conn, $query_completed);


// Query to get paginated recent projects
$total_projects_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM project_info");
$total_projects = mysqli_fetch_assoc($total_projects_query)['total'];

$projects_per_page = 6;
$total_pages = ceil($total_projects / $projects_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
} elseif ($page > $total_pages) {
    $page = $total_pages;
}

$offset = ($page - 1) * $projects_per_page;

$query_paginated_projects = "SELECT project_no, customer_name, project_status, equipment_type, equipment_location, inspector_name, creation_date 
                             FROM project_info 
                             WHERE project_status = 'Pending' 
                             ORDER BY creation_date DESC 
                             LIMIT $projects_per_page OFFSET $offset";
$result_paginated_projects = mysqli_query($conn, $query_paginated_projects);


// Query to get latest news
$news_query = "SELECT * FROM news ORDER BY created_at DESC";
$news_result = mysqli_query($conn, $news_query);


// Query to get notifications for document controller
$query_notifications = "SELECT id, project_no, notification_message, created_at 
                        FROM project_notifications 
                        WHERE document_controller = 'pending' OR document_controller IS NOT NULL
                        ORDER BY created_at DESC 
                        LIMIT 5";
$result_notifications = mysqli_query($conn, $query_notifications);
$unread_count = mysqli_num_rows($result_notifications);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Controller Dashboard</title>
    <!-- Add your CSS and JS links here -->
    <style>
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
        }
        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }
        .news-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .news-item p {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .news-item small {
            font-size: 12px;
            opacity: 0.9;
        }
        .delete-news {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
        .delete-news:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }


        
/* Add these to your existing style section */
.list-group-item {
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}
.list-group-item:hover {
    background-color: #f8f9fa;
    border-left-color: #007bff;
}
.notification-time {
    font-size: 0.8rem;
    color: #6c757d;
}

    </style>
</head>
<body>

<!-- Main Content -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
         <!-- Total Projects Card -->
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

         <!-- Pending Projects Card -->
         <div class="col-xl-3 col-sm-6">
            <div class="card mb-30">
               <div class="state">
                  <div class="d-flex align-items-center flex-wrap">
                     <div class="state-icon d-flex justify-content-center">
                        <i class="fa-solid fa-hourglass-half fa-3x text-warning"></i>
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Projects</p>
                        <h2><?php echo $pending_projects; ?></h2>
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
                        <p class="font-14 mb-2">Pending Projects</p>
                        <h2><?php echo $pending_projects; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>




         <!-- Notifications Card -->
<div class="col-xl-6 col-lg-6">
    <div class="card pb-2 mb-30">
        <div class="p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Notifications</h4>
                <?php if ($unread_count > 0): ?>
                    <span class="badge badge-danger"><?php echo $unread_count; ?> new</span>
                <?php endif; ?>
            </div>
            <p>Recent notifications requiring your attention.</p>
            <ul class="list-group">
                <?php 
                if (mysqli_num_rows($result_notifications) > 0) {
                    while ($row = mysqli_fetch_assoc($result_notifications)) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>' . htmlspecialchars($row['notification_message']) . '</strong>
                                    <div class="text-muted small mt-1">
                                        Project: ' . htmlspecialchars($row['project_no']) . ' • ' . 
                                        date("M j, Y g:i A", strtotime($row['created_at'])) . '
                                    </div>
                                </div>
                                <a href="../job/job-details.php?id=' . $row['project_no'] . '" class="btn btn-sm btn-primary">View</a>
                              </li>';
                    }
                } else {
                    echo '<li class="list-group-item text-center text-muted">No notifications found</li>';
                }
                ?>
            </ul>
            <?php if ($unread_count > 0): ?>
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary mark-all-read">Mark all as read</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
         <!-- Recent Projects Timeline -->
        <!-- Latest News Section -->
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

                        // Define an array of Bootstrap color classes for variety
                        $colors = ['primary', 'success', 'warning', 'info', 'danger'];
                        $i = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $color = $colors[$i % count($colors)]; // Rotate colors
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

         <!-- Ongoing Projects -->
         <div class="col-xl-6 col-lg-6">
            <div class="card mb-30">
               <div class="card-body" style="min-height: 580px;">
                  <div class="d-flex align-items-start align-items-sm-end justify-content-between mb-3">
                     <div class="">
                        <h4 class="mb-3">Ongoing Projects</h4>
                        <p class="font-14">List of recent completed projects.</p>
                     </div>
                  </div>
                  <div class="product-list p-4">
                     <?php while ($row = mysqli_fetch_assoc($result_completed)) { ?>
                        <div class="product-list-item mb-20 d-flex justify-content-between align-items-center">
                           <div class="d-flex align-items-center">
                              <div class="icon mr-3">
                                 <i class="fa-solid fa-file-alt fa-2x text-primary"></i>
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

         <!-- Recent Projects Table -->
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                     <div class="title-content mb-4">
                        <h4 class="mb-2">Pending Projects</h4>
                        <p class="font-14"> Pending projects will be displayed here</p>
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
                           <th>Inspector</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        if ($result_paginated_projects->num_rows > 0) {
                           while ($row = $result_paginated_projects->fetch_assoc()) {
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
                           echo "<tr><td colspan='8' class='text-center'>No records found.</td></tr>";
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               <!-- Pagination Links -->
               <div class="pagination" style="margin-bottom: 20px;">
                  <?php if ($page > 1): ?>
                     <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                  <?php endif; ?>
                  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                     <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                  <?php endfor; ?>
                  <?php if ($page < $total_pages): ?>
                     <a href="?page=<?php echo $page + 1; ?>">Next</a>
                  <?php endif; ?>
               </div>
            </div>
         </div>

         <!-- Latest News Section -->
         
      </div>
   </div>
</div>

<!-- News Modal -->


</body>
</html>
<!-- End Main Content -->
</div>
<!-- End Main Wrapper -->

<script>
   
// Mark all notifications as read
document.querySelector('.mark-all-read')?.addEventListener('click', function(e) {
    e.preventDefault();
    
    fetch('mark_notifications_read.php', {
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
            document.querySelector('.mark-all-read')?.remove();
            
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