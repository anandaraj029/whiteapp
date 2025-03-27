<?php
include_once('../file/config.php');
// include '../file/auth.php';
include_once('../inc/function.php');

$userRole = $_SESSION['role'] ?? ''; // Default to empty if not set

// Check if the user is a reviewer
$isReviewer = ($userRole === 'reviewer');

// Check if project_no is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $data_id = $_GET['id'];

    // Query to fetch project, checklist, and report details using JOIN
    $query = "
        SELECT 
            p.project_no, p.creation_date, p.project_status, p.equipment_location, p.customer_mobile, p.customer_email, p.checklist_status, p.report_status, p.certificatestatus, p.review_status,
            c.checklist_no, c.client_name, c.inspected_by, c.created_at, c.checklist_type, c.checklist_id,
            r.report_no, r.sticker_number_issued, r.inspection_status, r.created_at
        FROM project_info p
        LEFT JOIN checklist_information c ON p.project_no = c.project_no
        LEFT JOIN reports r ON p.project_no = r.project_no
        WHERE p.project_no = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $data_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Determine checklist and report creation status
        $checklistCreated = isset($data['checklist_no']);
        $reportCreated = isset($data['report_no']);

        // Extract the certificatestatus from the database
        $certificateStatus = $data['certificatestatus'];
        // Retrieve checklist_status and report_status directly from the joined data
        $project_status = $data['project_status'];
        $checklistStatus = $data['checklist_status'];
        $dataStatus = $data['report_status'];
        $reviewStatus = $data['review_status']; // Default to 'Pending' if not set

        // Determine if the "Add Certificate" button should be enabled
        // $enableAddCertificate = ($checklistStatus === "Created" && $dataStatus === "Generated");

        // $enableAddCertificate = ($checklistStatus === "Created" && $dataStatus === "Generated" && $reviewStatus === "Completed" && $userRole === 'document controller');

        $enableAddCertificate = ($checklistStatus === "Created" && $dataStatus === "Generated" && $reviewStatus === "Completed" && $userRole === 'document controller' && $certificateStatus !== "Certificate Created");

        // Fetch review status (assuming you have a field `review_status` in your database)
        
    } else {
        echo "No details found for this project.";
        exit;
    }

    // Query to fetch certificate data
    $query = "
    SELECT 
        'healthcheck' AS certificate_type,
        hc.certificate_no,
        COALESCE(hc.inspector, NULL) AS inspector,
        hc.created_at
    FROM crane_health_check_certificate hc
    WHERE hc.project_no = ?        

    UNION

    SELECT 
        'loadtestwithload' AS certificate_type,
        lw.certificate_no,
        COALESCE(lw.inspector_name, NULL) AS inspector,
        lw.created_at
    FROM loadtest_certificate lw
    WHERE lw.project_no = ?

    UNION

    SELECT 
        'mobile' AS certificate_type,
        mc.certificate_no,
        COALESCE(mc.inspector_name, NULL) AS inspector,
        mc.created_at
    FROM mobile_crane_loadtest mc
    WHERE mc.project_no = ?

    UNION

    SELECT 
        'lifting' AS certificate_type,
        lc.certificate_no,
        COALESCE(lc.inspector, NULL) AS inspector,
        lc.created_at
    FROM lifting_gear_certificates lc
    WHERE lc.project_no = ?

    UNION

    SELECT 
        'mpi' AS certificate_type,
        mp.certificate_no,
        COALESCE(mp.inspector, NULL) AS inspector,
        mp.created_at
    FROM mpi_certificates mp
    WHERE mp.project_no = ?
    
    UNION

    SELECT 
        'eddycurrent' AS certificate_type,
        ec.certificate_no,
        COALESCE(ec.inspector, NULL) AS inspector,
        ec.created_at
    FROM eddy_current_inspection ec
    WHERE ec.project_no = ?

    UNION

    SELECT 
        'liquidpenetrantinspection' AS certificate_type,
        lpi.certificate_no,
        COALESCE(lpi.inspector, NULL) AS inspector,
        lpi.created_at
    FROM liquid_penetrant_inspection lpi
    WHERE lpi.project_no = ?

    UNION

    SELECT 
        'rocktest' AS certificate_type,
        rt.certificate_no,
        COALESCE(rt.inspector, NULL) AS inspector,
        rt.created_at
    FROM rocking_test_certificate rt
    WHERE rt.project_no = ?
";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error in SQL query: " . $conn->error);
}

$stmt->bind_param("ssssssss", $data_id, $data_id, $data_id, $data_id, $data_id, $data_id, $data_id, $data_id);
$stmt->execute();
$result = $stmt->get_result();

    $certificates = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $certificates[] = $row;
        }
    }
    
    // Example: Display the new data
// foreach ($certificates as $certificate) {
//     echo "Type: " . $certificate['certificate_type'] . "<br>";
//     echo "Certificate No: " . $certificate['certificate_no'] . "<br>";
//     echo "Created At: " . $certificate['created_at'] . "<br>";
//     echo "Inspector: " . $certificate['inspector'] . "<br>";
 
// }

} else {
    echo "Invalid Project ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <!-- Include your CSS and JS files here -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
    <script src="<?php echo $url; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="main-content d-flex flex-column flex-md-row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Invoice Header -->
                    <div class="invoice-details-header bg-white d-flex flex-column flex-sm-row mb-30 justify-content-between">
                        <div class="d-flex align-items-center mb-3 mb-sm-0">
                            <a href="#" class="mr-2">
                                <img src="<?php echo $url; ?>assets/img/svg/angle-left.svg" alt="" class="svg">
                            </a>
                            <h2 class="regular mr-3 font-30">JOB ID</h2>
                            <h4 class="c4">#<?php echo htmlspecialchars($data['project_no']); ?></h4>
                        </div>
                        <div class="invoice-header-right d-flex align-items-center justify-content-end">
                            <div class="delete_mail mr-20">
                                <a href="#"><img src="<?php echo $url; ?>assets/img/svg/delete.svg" alt="" class="svg"></a>
                            </div>
                            <div class="edit-invoice-btn pr-1">
                                <a href="invoice-add-new.html" class="btn-circle">
                                    <img src="<?php echo $url; ?>assets/img/svg/writing.svg" alt="" class="svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Invoice Header -->

                    <!-- Invoice Top -->
                    <div class="invoice-pd c2-bg" data-bg-img="../../../assets/img/media/invoice-pattern.png">
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <!-- Invoice Left -->
                                <div class="invoice-left">
                                    <h3 class="white font-20 mb-3">Customer Details</h3>
                                    <ul class="list-invoice">
                                        <li class="location"> 
                                            <?php echo htmlspecialchars($data['equipment_location']); ?>
                                        </li>
                                        <li class="call">
                                            <a href="tel:+01234567891"><?php echo htmlspecialchars($data['customer_mobile']); ?></a>
                                        </li>
                                        <li class="mail"><?php echo htmlspecialchars($data['customer_email']); ?></li>
                                    </ul>
                                </div>
                                <!-- End Invoice Left -->
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <!-- Invoice Right -->
                                <div class="invoice-right">
                                    <h3 class="white font-20 mb-3">Project Status</h3>
                                    <ul class="status-list">
                                        <!-- <li><span class="key font-14">Serial No:</span>
                                            <span class="white bold font-17"><?php echo htmlspecialchars($data['crane_serial_no']); ?></span>
                                        </li> -->
                                        <li><span class="key font-14">Project No:</span>
                                            <span class="white bold font-17"><?php echo htmlspecialchars($data['project_no']); ?></span>
                                        </li>
                                        <li>
                                            <span class="key font-14">Start Date:</span>
                                            <span class="white bold font-17"><?php echo htmlspecialchars(date('d/m/Y', strtotime($data['creation_date']))); ?></span>
                                        </li>
                                        <li><span class="key font-14">End Date:</span>
                                            <!-- <span class="white bold font-17">07/03/2019</span> -->
                                        </li>
                                        <li><span class="key font-14">Status:</span>
                                            <span class="white status-btn completed"><?php echo htmlspecialchars($data['project_status']); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Invoice Right -->
                            </div>
                            <div class="col-md-4">
    <!-- Invoice Right -->
    <div class="invoice-right">
        <h3 class="white font-20 mb-3">QR Status</h3>
        <img class="img-fluid" src="../document/code.png" alt="QR Code" width="150px" id="qrCode">
    </div>
    <!-- End Invoice Right -->
</div>
                        </div>
                    </div>
                    <!-- End Invoice Top -->

                    <!-- Invoice Wrapper -->
                    <div class="bg-white invoice-pd position-relative">
                        <!-- Button in the top-right corner -->
                        <?php if ($enableAddCertificate): ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCertificateModal" id="addCertificateButton">
        Add Certificate
    </button>
<?php endif; ?>

<!-- Add Certificate Modal -->
<div class="modal fade" id="addCertificateModal" tabindex="-1" role="dialog" aria-labelledby="addCertificateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addCertificateModalLabel">Add Certificate</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="projectNo">Project ID</label>
                                            <input type="text" class="form-control" id="projectNo" value="<?php echo htmlspecialchars($data['project_no']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="checklistNo">Checklist No</label>
                                            <input type="text" class="form-control" id="checklistNo" value="<?php echo htmlspecialchars($data['checklist_no']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="reportNo">Report No</label>
                                            <input type="text" class="form-control" id="reportNo" value="<?php echo htmlspecialchars($data['report_no']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="certificateType">Certificate Type</label>
                                            <select class="form-control" id="certificateType" required>
                                                <option value="" disabled selected>Select Certificate Type</option>
                                                <option value="healthcheck">Health Check</option>
                                                <option value="loadtestwithload">With Load</option>
                                                <option value="mobile">Mobile</option>
                                                <option value="lifting">Lifting</option>
                                                <option value="mpi">MPI</option>
                                                <option value="eddycurrent">Eddy Current</option>
                                                <option value="liquidpenetrantinspection">Liquid Penetrant Inspection</option>
                                                <option value="rocktest">Rock Test</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="createCertificateBtn">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>

          <!-- Add Certificate Modal End-->              


                        <div class="row">
                            <div class="col-lg-4 col-md-6 mt-5">
                                <!-- Checklist Details -->
                                <div class="invoice payment-details mt-5 mt-xl-0">
                                    <div class="bold black font-17 mb-3">Checklist Details:</div>
                                    <?php if ($checklistCreated): ?>
                                        <ul class="status-list">
                                            <li><span class="key">Checklist No:</span> <span class="black"><?php echo htmlspecialchars($data['checklist_no']); ?></span></li>
                                            <li><span class="key">Inspector:</span> <span class="black"><?php echo htmlspecialchars($data['inspected_by']); ?></span></li>
                                            <li><span class="key">Client Name:</span> <span class="black"><?php echo htmlspecialchars($data['client_name']); ?></span></li>
                                            <li><span class="key">Created At:</span> <span class="black"><?php echo date('F d, Y', strtotime($data['created_at'])); ?></span></li>
                                            <li><span class="key">Review Status:</span> <span class="text-warning"><?php echo htmlspecialchars($reviewStatus); ?></span></li>
                                            <a href="../document/checklist/type/view/<?php echo htmlspecialchars($data['checklist_type']); ?>.php?checklist_type=<?php echo htmlspecialchars($data['checklist_type']); ?>&checklist_no=<?php echo htmlspecialchars($data['checklist_id']); ?>">
                                                <span class="bg-primary text-white status-btn completed"> View</span>
                                            </a>
                                        </ul>
                                    <?php else: ?>
                                        <p class="black">Checklist not created.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            

                            <div class="col-lg-4 col-md-6 mt-5">
                                <!-- Report Details -->
                                <div class="invoice invoice-form">
                                    <div class="bold black font-17 mb-3">Report Details:</div>
                                    <?php if ($reportCreated): ?>
                                        <ul class="status-list">
                                            <li><span class="key">Report No:</span> <span class="black"><?php echo htmlspecialchars($data['report_no']); ?></span></li>
                                            <li><span class="key">Sticker:</span> <span class="black"><?php echo htmlspecialchars($data['sticker_number_issued']); ?></span></li>
                                            <li><span class="key">Inspection Status:</span> <span class="black"><?php echo htmlspecialchars($data['inspection_status']); ?></span></li>
                                            <li><span class="key">Created At:</span> <?php echo htmlspecialchars($data['created_at']); ?></li>
                                            <li><span class="key">Review Status:</span> <span class="text-warning"><?php echo htmlspecialchars($reviewStatus); ?></span></li>                                            
                                            <a href="../document/report/view.php?project_no=<?php echo $data['project_no']; ?>">
                                                <span class="bg-primary text-white status-btn completed"> View</span>
                                            </a>
                                            <?php if ($isReviewer && $reviewStatus === 'Pending'): ?>
    <a href="#" data-toggle="modal" data-target="#reviewModal" 
       data-project-no="<?php echo htmlspecialchars($data['project_no']); ?>" 
       data-checklist-no="<?php echo htmlspecialchars($data['checklist_no']); ?>" 
       data-checklist-type="<?php echo htmlspecialchars($data['checklist_type']); ?>" 
       data-report-no="<?php echo htmlspecialchars($data['report_no']); ?>" 
       id="reviewButton">
        <span class="white status-btn completed">Review</span>
    </a>
<?php endif; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p class="black">Report not created.</p>
                                    <?php endif; ?>
                                </div>
                            </div>


<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Checklist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <div class="form-group">
                        <label for="projectNo">Project No</label>
                        <input type="text" class="form-control" id="projectNo" name="projectNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="checklistNo">Checklist No</label>
                        <input type="text" class="form-control" id="checklistNo" name="checklistNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="checklistType">Checklist Type</label>
                        <input type="text" class="form-control" id="checklistType" name="checklistType" readonly>
                    </div>
                    <div class="form-group">
                        <label for="reportNo">Report No</label>
                        <input type="text" class="form-control" id="reportNo" name="reportNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="reviewStatus">Review Status</label>
                        <select class="form-control" id="reviewStatus" name="reviewStatus" required>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentBox">Comment</label>
                        <textarea class="form-control" id="commentBox" name="commentBox" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitReview">Submit</button>
            </div>
        </div>
    </div>
</div>





                            <!-- Certificate Details -->
<div class="col-lg-4 col-md-6 mt-5">
    <div class="invoice invoice-form">
        <div class="black bold font-17 mb-3">Certificate Details:</div>
        <?php if (!empty($certificates)): ?>
            <ul class="status-list">
                <?php 
                // Define path mapping for certificate types
                $certificate_paths = [
                    'healthcheck' => 'health-check',
                    'loadtestwithload' => 'loadtest',
                    'mobile' => 'mobile',
                    'lifting' => 'lifting',
                    'mpi' => 'mpi',
                    'eddycurrent' => 'eddycurrent',
                    'liquidpenetrantinspection' => 'liquid-penetrant-inspection-certificate',
                    'rocktest' => 'rocktest'
                ];
                
                foreach ($certificates as $certificate): 
                     $path = $certificate_paths[$certificate['certificate_type']] ?? strtolower($certificate['certificate_type']);
                ?>
                    <li>
                        <span class="key">Certificate No:</span> 
                        <span class="black"><?php echo htmlspecialchars($certificate['certificate_no']); ?></span>
                    </li>
                    <li>
                        <span class="key">Created On:</span> 
                        <span class="black"><?php echo date('F d, Y', strtotime($certificate['created_at'])); ?></span>
                    </li>
                    <li>
                        <span class="key">Type:</span> 
                        <span class="black"><?php echo ucfirst(str_replace(['-', 'with'], [' ', 'with '], $certificate['certificate_type'])); ?></span>
                    </li>
                    <a href="../document/<?php echo htmlspecialchars($path); ?>/view.php?project_no=<?php echo $data['project_no']; ?>" class="d-inline-block mt-2">
                        <span class="bg-primary text-white status-btn completed">View Certificate</span>
                    </a>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Certificates not created yet.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Document Details -->
<div class="col-lg-4 col-md-6 mt-5">
    <div class="invoice invoice-form">
        <div class="black bold font-17 mb-3">Uploaded Documents:</div>
        <?php
        // Fetch uploaded documents from the database using MySQLi
        $project_no = $data['project_no'];
        $query = "SELECT COUNT(*) AS total_docs FROM documents WHERE project_no = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $project_no);
        $stmt->execute();
        $result = $stmt->get_result();
        $docCount = $result->fetch_assoc()['total_docs'];
        ?>

        <?php if ($docCount > 0): ?>
            <p class="black">Total Documents Uploaded: <strong><?php echo $docCount; ?></strong></p>
        <?php else: ?>
            <p>No documents uploaded.</p>
        <?php endif; ?>
    </div>
        <?php if ($userRole === 'inspector'): ?>
        <div class="d-flex justify-content-center mt-3">
          <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#uploadModal">
             Upload Documents
          </button>
        </div>
        <?php endif; ?>
    </div>

<!-- Upload Modal -->
<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select Documents (Max 10, JPG/PNG/PDF)</label>
                        <input type="file" class="form-control" name="documents[]" multiple accept=".jpg,.png,.pdf" required>
                    </div>
                    <input type="hidden" name="project_no" value="<?php echo htmlspecialchars($data['project_no']); ?>">
                    <input type="hidden" name="uploaded_by" value="<?php echo htmlspecialchars($userRole); ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="uploadBtn">Upload</button>
            </div>
        </div>
    </div>
</div>
<div>
</div>


                        </div>

                        
                    </div>
                    <!-- End Invoice Wrapper -->

                    <!-- Invoice Details List Wrapper -->
                    <?php if ($project_status === 'Completed' && $checklistCreated && $reportCreated && !empty($certificates)): ?>
                        <div class="bg-white details-list-wrap">
                            <div class="table-responsive">
                                <!-- Invoice List Table -->
                                <table class="invoice-list-table style-two some-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Doc ID</th>
                                            <th>Document Type</th>
                                            <th>Date of Creation</th>
                                            <th>Inspector</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php if ($checklistCreated): ?>
                                            <tr>
                                                <td class="bold">#<?php echo htmlspecialchars($data['checklist_no']); ?></td>
                                                <td class="bold"><?php echo htmlspecialchars($data['checklist_type']); ?> Checklist</td>
                                                <td><?php echo date('F d, Y', strtotime($data['created_at'])); ?></td>
                                                <td><?php echo htmlspecialchars($data['inspected_by']); ?></td>
                                                <td>Completed</td>
                                                <td>
                                                    <a href="../document/checklist/type/view/<?php echo htmlspecialchars($data['checklist_type']); ?>.php?checklist_type=<?php echo htmlspecialchars($data['checklist_type']); ?>&checklist_no=<?php echo htmlspecialchars($data['checklist_id']); ?>" class="download-btn mr-3 bg-info">
                                                        <img src="<?php echo $url; ?>assets/img/svg/copy.svg" alt="" class="svg">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($reportCreated): ?>
                                            <tr>
                                                <td class="bold">#<?php echo htmlspecialchars($data['report_no']); ?></td>
                                                <td>Report</td>
                                                <td><?php echo date('F d, Y', strtotime($data['created_at'])); ?></td>
                                                <td><?php echo htmlspecialchars($data['inspected_by']); ?></td>
                                                <td>Generated</td>
                                                <td>
                                                    <a href="../document/report/download.php?project_no=<?php echo $data['project_no']; ?>" class="download-btn mr-3">
                                                        <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg">
                                                    </a>
                                                    <a href="../document/report/view.php?project_no=<?php echo $data['project_no']; ?>" class="download-btn mr-3 bg-info">
                                                        <img src="<?php echo $url; ?>assets/img/svg/copy.svg" alt="" class="svg">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php foreach ($certificates as $certificate): ?>
                                            <tr>
                                                <td class="bold">#<?php echo htmlspecialchars($certificate['certificate_no']); ?></td>
                                                <td><?php echo ucfirst(htmlspecialchars($certificate['certificate_type'])); ?> Certificate</td>
                                                <td><?php echo date('F d, Y', strtotime($certificate['created_at'])); ?></td>
                                                <td><?php echo htmlspecialchars($certificate['inspector'] ?? 'N/A'); ?></td>
                                                <td>Created</td>
                                                <td>
                                                    <?php
                                                    $certificate_types = [
                                                        'healthcheck' => 'health-check',
                                                        'liquidpenetrantinspection' => 'liquid-penetrant-inspection-certificate',
                                                    ];
                                                    
                                                    foreach ($certificates as $certificate) {
                                                        $certificate_type = isset($certificate_types[$certificate['certificate_type']]) 
                                                            ? $certificate_types[$certificate['certificate_type']] 
                                                            : $certificate['certificate_type'];
                                                        ?>
                                                        <a href="../document/<?php echo htmlspecialchars($certificate_type); ?>/download.php?project_no=<?php echo $data['project_no']; ?>" class="download-btn mr-3">
                                                            <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg">
                                                        </a>
                                                        <a href="../document/<?php echo htmlspecialchars($certificate_type); ?>/view.php?project_no=<?php echo $data['project_no']; ?>" class="download-btn mr-3 bg-info">
                                                            <img src="<?php echo $url; ?>assets/img/svg/copy.svg" alt="" class="svg">
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    <!-- Uploaded Documents Rows -->
                    <?php
                    // Fetch uploaded documents from the database
                    $project_no = $data['project_no'];
                    $query = "SELECT * FROM documents WHERE project_no = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $project_no);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($document = $result->fetch_assoc()) {
                            // Loop through file columns (file_1 to file_10)
                            for ($i = 1; $i <= 10; $i++) {
                                $fileColumn = "file_$i";
                                if (!empty($document[$fileColumn])) {
                                    $fileName = $document[$fileColumn];
                                    $uploadedAt = $document['uploaded_at'];
                                    $uploadedBy = $document['uploaded_by'];
                                    $project_no  = $document['project_no'];
                                    ?>
                                    <tr>
                                        <td class="bold">#<?php echo htmlspecialchars($document['id']); ?></td>
                                        <td>Uploaded Document (File <?php echo $i; ?>)</td>
                                        <td><?php echo date('F d, Y', strtotime($uploadedAt)); ?></td>
                                        <td><?php echo htmlspecialchars($uploadedBy); ?></td>
                                        <td>Uploaded</td>
                                        <td>
                                            <a href="uploads/<?php echo htmlspecialchars($project_no); ?>/<?php echo htmlspecialchars($fileName); ?>" class="download-btn mr-3" download>
                                                <img src="<?php echo $url; ?>assets/img/svg/download.svg" alt="" class="svg">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                                    </tbody>
                                </table>
                                <!-- End Invoice List Table -->
                            </div>
                        </div>
                    <?php else: ?>
                        <div style="display: block; text-align: center; padding: 20px">
                        <?php if ($userRole === 'quality controller' && $certificateStatus === "Certificate Created"): ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qcReviewModal">
        QC Controller Review
    </button>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <!-- End Invoice Details List Wrapper -->

                    <!-- QC Controller Review Modal -->
<div class="modal fade" id="qcReviewModal" tabindex="-1" role="dialog" aria-labelledby="qcReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qcReviewModalLabel">QC Controller Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="qcReviewForm">
                    <div class="form-group">
                        <label for="qcProjectNo">Project No</label>
                        <input type="text" class="form-control" id="qcProjectNo" name="qcProjectNo" value="<?php echo htmlspecialchars($data['project_no']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qcChecklistNo">Checklist No</label>
                        <input type="text" class="form-control" id="qcChecklistNo" name="qcChecklistNo" value="<?php echo htmlspecialchars($data['checklist_no']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qcChecklistType">Checklist Type</label>
                        <input type="text" class="form-control" id="qcChecklistType" name="qcChecklistType" value="<?php echo htmlspecialchars($data['checklist_type']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qcReportNo">Report No</label>
                        <input type="text" class="form-control" id="qcReportNo" name="qcReportNo" value="<?php echo htmlspecialchars($data['report_no']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qcCertificateType">Certificate Type</label>
                        <input type="text" class="form-control" id="qcCertificateType" name="qcCertificateType" value="<?php echo htmlspecialchars($certificates[0]['certificate_type']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qcReviewStatus">Review Status</label>
                        <select class="form-control" id="qcReviewStatus" name="qcReviewStatus" required>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitQcReview">Submit</button>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
<script>
        document.addEventListener("DOMContentLoaded", function () {
    const addCertificateButton = document.querySelector("button[data-target='#addCertificateModal']");
    if (<?php echo json_encode($enableAddCertificate); ?>) {
        addCertificateButton.removeAttribute("disabled");
    } else {
        addCertificateButton.setAttribute("disabled", "true");
    }

    // Disable review button if review is already completed
    const reviewButton = document.getElementById('reviewButton');
    if (reviewButton && <?php echo json_encode($reviewStatus === 'Completed'); ?>) {
        reviewButton.style.pointerEvents = 'none';
        reviewButton.style.opacity = '0.5';
    }
});     

        document.getElementById('createCertificateBtn').addEventListener('click', function () {
    const projectNo = document.getElementById('projectNo').value.trim();
    const checklistNo = document.getElementById('checklistNo').value.trim();
    const reportNo = document.getElementById('reportNo').value.trim();
    const certificateType = document.getElementById('certificateType').value.trim();

    if (!projectNo || !checklistNo || !reportNo || !certificateType) {
        alert('Please fill in all the required fields.');
        return;
    }

    const formData = new FormData();
    formData.append('project_no', projectNo);
    formData.append('checklist_no', checklistNo);
    formData.append('report_no', reportNo);
    formData.append('certificate_type', certificateType);

    fetch('save_certificate.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Certificate saved successfully!');
            if (data.redirect_url) {
                window.location.href = data.redirect_url; // Open the correct page
            }
        } else {
            alert('Error saving certificate: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});        
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    $('#reviewModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var projectNo = button.data('project-no'); // Extract info from data-* attributes
        var checklistNo = button.data('checklist-no');
        var checklistType = button.data('checklist-type');
        var reportNo = button.data('report-no');

        // Update the modal's content.
        var modal = $(this);
        modal.find('#projectNo').val(projectNo);
        modal.find('#checklistNo').val(checklistNo);
        modal.find('#checklistType').val(checklistType);
        modal.find('#reportNo').val(reportNo);
    });

    document.getElementById('submitReview').addEventListener('click', function () {
        const formData = new FormData(document.getElementById('reviewForm'));

        fetch('submit_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Review submitted successfully!');
                $('#reviewModal').modal('hide');

                // Disable the review button
                const reviewButton = document.getElementById('reviewButton');
                if (reviewButton) {
                    reviewButton.style.pointerEvents = 'none';
                    reviewButton.style.opacity = '0.5';
                }

                // Enable the "Add Certificate" button if the user is a document controller
                const addCertificateButton = document.querySelector("button[data-target='#addCertificateModal']");
                if (addCertificateButton && <?php echo json_encode($userRole === 'document controller'); ?>) {
                    addCertificateButton.removeAttribute("disabled");
                }
            } else {
                alert('Error submitting review: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>

<script>
        document.addEventListener("DOMContentLoaded", function () {
            const addCertificateButton = document.getElementById('addCertificateButton');
            const certificateStatus = "<?php echo $certificateStatus; ?>";

            if (certificateStatus === "Certificate Created" && addCertificateButton) {
                addCertificateButton.style.display = 'none';
            }
        });
    </script>


<script>
document.getElementById('submitQcReview').addEventListener('click', function () {
    const formData = new FormData(document.getElementById('qcReviewForm'));

    fetch('submit_qc_review.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('QC Review submitted successfully!');
            $('#qcReviewModal').modal('hide');

            // Update project status if review is completed
            if (data.reviewStatus === 'Completed') {
                fetch('update_project_status.php', {
                    method: 'POST',
                    body: new FormData(document.getElementById('qcReviewForm'))
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Project status updated to Completed!');
                        window.location.reload();
                    } else {
                        alert('Error updating project status: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        } else {
            alert('Error submitting QC review: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
    
<script>
    $(document).ready(function() {
        // Get the modal
        var modal = document.getElementById("qrPopup");

        // Get the QR code image
        var qrCode = document.getElementById("qrCode");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get the project status from PHP
        var projectStatus = "<?php echo htmlspecialchars($data['project_status']); ?>";

        // When the user clicks on the QR code, redirect to verify.php if project status is "Completed"
        qrCode.onclick = function() {
            if (projectStatus === "Completed") {
                window.location.href = "verify.php";
            } else {
                alert("QR code scanning is invalid");
            }
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle the submit button click
        $("#submitStickerNo").click(function() {
            var stickerNo = $("#stickerNo").val();
            if (stickerNo) {
                // Redirect to the form page with the sticker number as a query parameter
                window.location.href = "form.php?stickerNo=" + stickerNo;
            } else {
                alert("Please enter a sticker number.");
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
    $("#uploadBtn").click(function() {
        var formData = new FormData($("#uploadForm")[0]);

        $.ajax({
            url: "upload_documents.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                location.reload(); // Refresh after upload
            }
        });
    });
});
</script>

    
<?php
include_once('../inc/footer.php');
?>
</body>
</html>