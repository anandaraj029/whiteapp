<?php 
session_start();
include_once('../file/config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
 
// Check if the user has the 'customer' role
if ($_SESSION['role'] !== 'customer') {
    header("Location: ../index.php");
    exit();
}

// Fetch customer details from database based on customer_name
$customer_name = $_SESSION['username']; // Assuming username is stored in session as customer_name
$sql = "SELECT * FROM customers WHERE customer_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customer_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
    
    // Set variables for display
    $cus_name = $customer['customer_name'];
    $profilePhoto = !empty($customer['profile_photo']) ? $customer['profile_photo'] : $url . 'assets/img/media/profile-pic.jpg';
    $signaturePhoto = !empty($customer['signature_photo']) ? $customer['signature_photo'] : '';
    $email = $customer['email'];
    $mobile = $customer['mobile'];
    $address = $customer['address'];
    $city = $customer['city'];
    $reg_name = $customer['reg_name'];
    $created_at = date('F j, Y', strtotime($customer['created_at']));
    $cus_id = $customer['cus_id']; // Get OSS ID from the result
} else {
    // Handle case where customer not found
    echo "Customer not found";
    exit();
}

include_once('../inc/customer-option.php');


// Fetch project details for the logged-in customer based on customer_name
$sql = "SELECT p.project_no, p.creation_date, p.project_status, 
               p.equipment_type, p.equipment_location, p.inspector_name,
               p.checklist_status, p.customer_name 
        FROM project_info p
        WHERE p.customer_name = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cus_name); // Use customer_name from session
$stmt->execute();
$result = $stmt->get_result();

?>

<!-- Main Content -->
<div class="main-content3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mx-2 mx-lg-4 mx-xl-5">
                    <!-- User Profile Image -->
                    <div class="user-profile-img">
                        <div class="cover-img">
                            <img src="<?php echo $url; ?>assets/img/media/cover.jpg" class="w-100" alt="">

                            <!-- Upload Photo -->
                            <div class="upload-button">
                                <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                <span>Upload Photo</span>
                                <input class="file-input" type="file" id="fileUpload3" accept="image/*">
                            </div>
                            <!-- End Upload Photo -->
                        </div>
                    </div>
                    <!-- End User Profile Image -->
                </div>
                <div class="mx-2 mx-lg-4 mx-xl-5">
                    <div class="card mt-1">
                        <!-- User Profile Nav -->
                        <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                            <!-- Profile Info -->
                            <div class="profile-info d-flex align-items-center">
                                <div class="profile-pic mr-3">
                                    <img src="<?php echo $profilePhoto . '?v=' . time(); ?>" alt="Profile Picture">
                                </div>

                                <div>
                                    <h3><?php echo htmlspecialchars($cus_name); ?></h3>
                                    <!-- <p class="font-14">Registered Name: <?php echo htmlspecialchars($reg_name); ?></p> -->
                                     <p class="font-14">Customer</p>
                                </div>
                            </div>
                            <!-- End Profile Info -->

                            <div class="d-flex align-items-center mt-3 mt-xl-0">
                                <ul class="nav profile-nav-tabs">
                                    <li>
                                        <a class="active pr-0 pl-2 pl-xl-30">
                                            <span class="chat">
                                                <img src="<?php echo $url; ?>assets/img/svg/chat-icon.svg" alt="" class="svg">
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="p_nav-link has-before active" href="../dashboard/customer_new.php">About</a>
                                    </li>
                                    <li>
                                        <!-- <a class="p_nav-link" href="project.php?cus_id=<?php echo $customer_id; ?>">Projects</a> -->
                                        <!-- <a class="p_nav-link" href="../customer/project.php?php echo $customer_id; ?>">Projects</a> -->
                                        <a href="../customer/project.php?cusid=<?php echo urlencode($customer['cus_id']); ?>">Projects</a>
                                    </li>
                                </ul>

                                <div class="px-3">
                                    <!-- Dropdown Button -->
                                    <div class="dropdown-button">
                                        <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                            <div class="menu-icon style--two w-auto justify-content-center mr-0">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <a href="../profile/edit-profile.php?cusid={$row['cus_id']}">Edit Profile</a> -->
                                            <a href="../profile/edit-profile.php?cusid=<?php echo urlencode($customer['cus_id']); ?>">Edit Profile</a>
                                            <a href="">User Dashboard</a>
                                        </div>
                                    </div>
                                    <!-- End Dropdown Button -->
                                </div>
                            </div>
                        </div>
                        <!-- End User Profile Nav -->
                    </div>

                    <div class="mt-30">
                        <!-- Profile Completion -->
                        <div class="profile-completion d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <!-- Progress -->
                                <div class="progress_22 mr-3">
                                    <div class="ProgressBar-wrap2 position-relative">
                                        <div class="ProgressBar ProgressBar_22" data-progress="86">
                                            <svg class="ProgressBar-contentCircle" viewBox="0 0 200 200">
                                                <!-- on rotation circle -->
                                                <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="100" cy="100" r="85" />
                                                <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="100" cy="100" r="85" />
                                            </svg>
                                            
                                            <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Progress -->

                                <div class="">
                                    <h4 class="c2 mb-1">Profile Completion</h4>
                                    <p class="font-14">Member since: <?php echo $created_at; ?></p>
                                </div>
                            </div>

                            <!-- Edit Profile Button -->
                            <div class="edit-profile-btn pr-1">
                                <a href="edit-customer.php" class="btn-circle">
                                    <img src="<?php echo $url; ?>assets/img/svg/writing.svg" alt="" class="svg">
                                </a>
                            </div>
                            <!-- End Edit Profile Button -->
                        </div>
                        <!-- End Profile Completion -->

                        <!-- Card -->
                        <div class="card">

                        <div class="card mb-30">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h4 class="font-20">Job List</h4>
        </div>
    </div>

    <div class="table-responsive">
        <table id="job-table" class="order-list-table style--three table-centered text-nowrap">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Start Date</th>
                    <th>Checklist</th>
                    <th>Report</th>
                    <th>Certificate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $project_no = $row['project_no'];
                        
                        // Fetch additional details for each project
                        $details_query = "
                            SELECT 
                                p.project_no, p.project_status, p.checklist_status, p.report_status, p.certificatestatus,
                                c.checklist_no, c.checklist_type, c.checklist_id,
                                r.report_no,
                                (
                                    SELECT COUNT(*) 
                                    FROM (
                                        SELECT certificate_no FROM crane_health_check_certificate WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM loadtest_certificate WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM mobile_crane_loadtest WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM lifting_gear_certificates WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM mpi_certificates WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM eddy_current_inspection WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM liquid_penetrant_inspection WHERE project_no = ?
                                        UNION ALL
                                        SELECT certificate_no FROM rocking_test_certificate WHERE project_no = ?
                                    ) AS certificates
                                ) AS certificate_count
                            FROM project_info p
                            LEFT JOIN checklist_information c ON p.project_no = c.project_no
                            LEFT JOIN reports r ON p.project_no = r.project_no
                            WHERE p.project_no = ?
                        ";
                        
                        $stmt_details = $conn->prepare($details_query);
                        $stmt_details->bind_param("sssssssss", $project_no, $project_no, $project_no, $project_no, 
                                                $project_no, $project_no, $project_no, $project_no, $project_no);
                        $stmt_details->execute();
                        $details_result = $stmt_details->get_result();
                        
                        if ($details_result->num_rows > 0) {
                            $details = $details_result->fetch_assoc();
                            ?>
                            <tr>
                                <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                                <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                                
                                <!-- Checklist Column -->
                                <!-- <td>
                                    <?php if ($details['checklist_no']) { ?>
                                        <a href="../document/checklist/type/view/<?php echo htmlspecialchars($details['checklist_type']); ?>.php?checklist_type=<?php echo htmlspecialchars($details['checklist_type']); ?>&checklist_no=<?php echo htmlspecialchars($details['checklist_id']); ?>" 
                                           class="btn btn-sm btn-primary" target="_blank">
                                            View Checklist
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-muted">Not Created</span>
                                    <?php } ?>
                                </td> -->

                                <!-- Checklist Column -->
<td>
    <?php if ($row["project_status"] === 'Completed' && $details['checklist_no']) { ?>
        <a href="../document/checklist/type/view/<?php echo htmlspecialchars($details['checklist_type']); ?>.php?checklist_type=<?php echo htmlspecialchars($details['checklist_type']); ?>&checklist_no=<?php echo htmlspecialchars($details['checklist_id']); ?>" 
           class="btn btn-sm btn-primary" target="_blank">
            View Checklist
        </a>
    <?php } else { ?>
        <span class="text-muted">
            <?php echo $row["project_status"] === 'Completed' ? 'Not Created' : 'Not Available'; ?>
        </span>
    <?php } ?>
</td>
                                
                                <!-- Report Column -->
                                <!-- <td>
                                    <?php if ($details['report_no']) { ?>
                                        <a href="../document/report/view.php?project_no=<?php echo $project_no; ?>" 
                                           class="btn btn-sm btn-primary" target="_blank">
                                            View Report
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-muted">Not Generated</span>
                                    <?php } ?>
                                </td> -->


                                <!-- Report Column -->
<td>
    <?php if ($row["project_status"] === 'Completed' && $details['report_no']) { ?>
        <a href="../document/report/view.php?project_no=<?php echo $project_no; ?>" 
           class="btn btn-sm btn-primary" target="_blank">
            View Report
        </a>
    <?php } else { ?>
        <span class="text-muted">
            <?php echo $row["project_status"] === 'Completed' ? 'Not Generated' : 'Not Available'; ?>
        </span>
    <?php } ?>
</td>

                                
                                <!-- Certificate Column -->
                                <!-- <td>
                                    <?php if ($details['certificate_count'] > 0) { ?>
                                        <button class="btn btn-sm btn-info view-certificates" 
                                                data-project-no="<?php echo $project_no; ?>">
                                            View Certificates (<?php echo $details['certificate_count']; ?>)
                                        </button>
                                    <?php } else { ?>
                                        <span class="text-muted">Not Created</span>
                                    <?php } ?>
                                </td> -->


<!-- Certificate Column -->
<td>
    <?php if ($row["project_status"] === 'Completed' && $details['certificate_count'] > 0) { ?>
        <button class="btn btn-sm btn-info view-certificates" 
                data-project-no="<?php echo $project_no; ?>">
            View Certificates (<?php echo $details['certificate_count']; ?>)
        </button>
    <?php } else { ?>
        <span class="text-muted">
            <?php echo $row["project_status"] === 'Completed' ? 'Not Created' : 'Not Available'; ?>
        </span>
    <?php } ?>
</td>

                                
<td class="status-btn">
    <a href="#" class="btn s_alert 
        <?php echo strtolower($row["project_status"]) === 'completed' 
            ? 'bg-success-light text-success' 
            : 'bg-danger-light text-danger'; ?> 
        mr-3 mr-sm-4 mb-10">
        <?php echo htmlspecialchars($row["project_status"]); ?>
    </a>
</td>

                                
                                <td>
                                    <a href="../job/job-details.php?id=<?php echo $project_no; ?>" 
                                       class="btn btn-sm btn-secondary">
                                        Details
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No projects found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Certificate Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" role="dialog" aria-labelledby="certificateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="certificateModalLabel">Certificates for Project: <span id="modalProjectNo"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Certificate Type</th>
                                <th>Certificate No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="certificateTableBody">
                            <!-- Certificate data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                           
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->

<?php 
include_once('../inc/footer.php');
?>

<script>
$(document).ready(function() {
    // Handle click on view certificates button
    $('.view-certificates').click(function() {
        var projectNo = $(this).data('project-no');
        $('#modalProjectNo').text(projectNo);
        
        // AJAX call to fetch certificate details
        $.ajax({
            url: 'fetch_certificates.php',
            type: 'POST',
            data: { project_no: projectNo },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var html = '';
                    $.each(response.certificates, function(index, certificate) {
                        // Determine the view and download URLs based on certificate type
                        var viewUrl = '';
                        var downloadUrl = '';
                        var certificateType = '';
                        
                        // Map certificate types to their respective URLs
                        switch(certificate.certificate_type) {
                            case 'healthcheck':
                                viewUrl = '../document/health-check/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/health-check/download.php?project_no=' + projectNo;
                                certificateType = 'Health Check';
                                break;
                            case 'loadtestwithload':
                                viewUrl = '../document/loadtest/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/loadtest/download.php?project_no=' + projectNo;
                                certificateType = 'Load Test With Load';
                                break;
                            case 'mobile':
                                viewUrl = '../document/mobile/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/mobile/download.php?project_no=' + projectNo;
                                certificateType = 'Mobile Crane';
                                break;
                            case 'lifting':
                                viewUrl = '../document/lifting/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/lifting/download.php?project_no=' + projectNo;
                                certificateType = 'Lifting';
                                break;
                            case 'mpi':
                                viewUrl = '../document/mpi/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/mpi/download.php?project_no=' + projectNo;
                                certificateType = 'MPI';
                                break;
                            case 'eddycurrent':
                                viewUrl = '../document/eddycurrent/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/eddycurrent/download.php?project_no=' + projectNo;
                                certificateType = 'Eddy Current';
                                break;
                            case 'liquidpenetrantinspection':
                                viewUrl = '../document/liquid-penetrant-inspection-certificate/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/liquid-penetrant-inspection-certificate/download.php?project_no=' + projectNo;
                                certificateType = 'Liquid Penetrant Inspection Certificate';
                                break;
                            case 'rocktest':
                                viewUrl = '../document/rocktest/view.php?project_no=' + projectNo;
                                downloadUrl = '../document/rocktest/download.php?project_no=' + projectNo;
                                certificateType = 'Rocktest';
                                break;                            
                            // Add cases for other certificate types
                            default:
                                viewUrl = '#';
                                downloadUrl = '#';
                                certificateType = certificate.certificate_type;
                        }
                        
                        html += '<tr>' +
                                    '<td>' + certificateType + '</td>' +
                                    '<td>' + certificate.certificate_no + '</td>' +
                                    '<td>' +
                                        '<a href="' + viewUrl + '" class="text-info mr-3" target="_blank" title="View">' +
                                            '<i class="fas fa-eye fa-lg"></i>' +
                                        '</a>' +
                                        '<a href="' + downloadUrl + '" class="text-primary" title="Download">' +
                                            '<i class="fas fa-download fa-lg"></i>' +
                                        '</a>' +
                                    '</td>' +
                                '</tr>';
                    });
                    
                    $('#certificateTableBody').html(html);
                    $('#certificateModal').modal('show');
                } else {
                    alert('Error fetching certificates: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('AJAX Error: ' + error);
            }
        });
    });
});
</script>