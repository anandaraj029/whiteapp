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


// Query to get total pending projects count for the logged-in reviewer

$result_pending_reviewer = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_reviewer FROM project_info WHERE checklist_status = 'created' 
          AND report_status = 'generated' 
          AND review_status = 'pending'");
$total_pending_reviewer = mysqli_fetch_assoc($result_pending_reviewer)['total_pending_reviewer'];





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
                          LIMIT 6"; // Adjust the limit as needed

$result_recent_projects = mysqli_query($conn, $query_recent_projects);



// Query to get total pending projects for the logged-in inspector
$result_pending_inspector = mysqli_query($conn, "SELECT COUNT(*) AS total_pending_inspector 
    FROM project_info 
    WHERE checklist_status != 'Created' 
    OR report_status != 'Generated'");

$total_pending_inspector = mysqli_fetch_assoc($result_pending_inspector)['total_pending_inspector'];



// Calculate total number of projects
$total_projects_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM project_info");
$total_projects = mysqli_fetch_assoc($total_projects_query)['total'];

// Number of projects per page
$projects_per_page = 6;

// Calculate total number of pages
$total_pages = ceil($total_projects / $projects_per_page);

// Get the current page number from the URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Ensure the page number is within the valid range
if ($page < 1) {
    $page = 1;
} elseif ($page > $total_pages) {
    $page = $total_pages;
}

// Calculate the offset for the SQL query
$offset = ($page - 1) * $projects_per_page;

// Fetch projects for the current page
$query_paginated_projects = "SELECT project_no, customer_name, project_status, equipment_type, equipment_location, inspector_name, creation_date 
                             FROM project_info 
                             ORDER BY creation_date DESC 
                             LIMIT $projects_per_page OFFSET $offset";

$result_paginated_projects = mysqli_query($conn, $query_paginated_projects);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Internal Styles for Pagination -->
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
                        <!-- <img src="../assets/img/png-icon/revenue.png" alt=""> -->
                        <i class="fa-solid fa-hourglass-half fa-3x text-warning"></i> <!-- Pending Icon -->
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Reviewer Pending Projects</p>
                        <h2><?php echo $total_pending_reviewer; ?></h2>
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
                    <i class="fa-solid fa-user fa-3x text-primary"></i> <!-- Customer Icon -->
                </div>
                <div class="state-content">
                    <p class="font-14 mb-2">Inspector Pending Projects</p>
                    <h2><?php echo $total_pending_inspector; ?></h2>
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
                        <p class="font-14"> Most recent projects will be displayed here</p>
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
        <!-- End Invoice List Table -->
    </div>
    </div>
    </div>







    <!-- News Section -->
<!-- News Section -->

<div class="col-xl-12" style="margin-top: 27px;">
    <div class="card mb-30">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Latest News</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal">
                    Update News
                </button>
            </div>
            <div id="newsList">
                <?php
                // Fetch the latest news from the database
                $news_query = "SELECT * FROM news ORDER BY created_at DESC";
                $news_result = mysqli_query($conn, $news_query);
                if (mysqli_num_rows($news_result) > 0) {
                    while ($news_row = mysqli_fetch_assoc($news_result)) {
                        // Generate a random color for each news item
                        $colors = ['#FF6B6B', '#4ECDC4', '#45B7D5', '#9B59B6', '#E67E22', '#2ECC71'];
                        $random_color = $colors[array_rand($colors)];
                        echo '
                        <div class="news-item mb-4 p-4 rounded shadow position-relative" style="background-color: ' . $random_color . ';" data-id="' . $news_row['id'] . '">
                            <button class="btn btn-sm btn-danger delete-news" style="position: absolute; top: 10px; right: 10px;">
                                <i class="fas fa-trash"></i>
                            </button>
                            <p class="text-white mb-2">' . htmlspecialchars($news_row['news_text']) . '</p>
                            <small class="text-white-50">' . date("d M Y H:i", strtotime($news_row['created_at'])) . '</small>
                        </div>';
                    }
                } else {
                    echo '<p>No news available.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- News Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newsForm">
                    <div class="form-group">
                        <label for="newsText">News Text</label>
                        <textarea class="form-control" id="newsText" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveNews">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- News Modal -->
<!-- <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newsForm">
                    <div class="form-group">
                        <label for="newsText">News Text</label>
                        <textarea class="form-control" id="newsText" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveNews">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

         
      </div>
   </div>
</div>




<!-- Add this script at the end of your HTML file, before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Save news
    $('#saveNews').on('click', function() {
        var newsText = $('#newsText').val();
        if (newsText) {
            $.ajax({
                url: 'save_news.php',
                type: 'POST',
                data: { news_text: newsText },
                success: function(response) {
                    $('#newsModal').modal('hide');
                    var colors = ['#FF6B6B', '#4ECDC4', '#45B7D5', '#9B59B6', '#E67E22', '#2ECC71'];
                    var random_color = colors[Math.floor(Math.random() * colors.length)];
                    var newsItem = `
                        <div class="news-item mb-4 p-4 rounded shadow position-relative" style="background-color: ${random_color};" data-id="${response.id}">
                            <button class="btn btn-sm btn-danger delete-news" style="position: absolute; top: 10px; right: 10px;">
                                <i class="fas fa-trash"></i>
                            </button>
                            <p class="text-white mb-2">${newsText}</p>
                            <small class="text-white-50">Just now</small>
                        </div>`;
                    $('#newsList').prepend(newsItem);
                    $('#newsText').val('');
                },
                error: function() {
                    alert('Error saving news.');
                }
            });
        } else {
            alert('Please enter some news text.');
        }
    });

    // Delete news
    $(document).on('click', '.delete-news', function() {
    var newsItem = $(this).closest('.news-item');
    var newsId = newsItem.data('id');

    if (confirm('Are you sure you want to delete this news item?')) {
        $.ajax({
            url: 'delete_news.php',
            type: 'POST',
            data: { id: newsId },
            success: function(response) {
                console.log(response); // Log the server response
                if (response.status === 'success') {
                    newsItem.remove(); // Remove the news item from the UI
                } else {
                    alert('Error deleting news: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the error details
                alert('Error deleting news. Check the console for details.');
            }
        });
    }
});
});
</script>

    </body>
    </html>
<!-- End Main Content -->
</div>
<!-- End Main Wrapper -->


<?php
include_once('../inc/footer.php');
?>