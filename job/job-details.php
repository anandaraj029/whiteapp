<?php
include_once('../file/config.php');
include '../file/auth.php';
include_once('../inc/function.php');

// Check if project_id is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $data_id = $_GET['id'];

    // Query to fetch project, checklist, and report details using JOIN
    $query = "
        SELECT 
            p.project_id, p.equipment_location, p.customer_mobile, p.customer_email, p.checklist_status, p.report_status, p.certificatestatus,
            c.checklist_no, c.inspected_by,
            r.report_no, r.sticker_number_issued
        FROM project_info p
        LEFT JOIN checklist_information c ON p.project_id = c.project_id
        LEFT JOIN reports r ON p.project_id = r.project_id
        WHERE p.project_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $data_id);
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
        
        $checklistStatus = $data['checklist_status'];
        $dataStatus = $data['report_status'];

        // Determine if the "Add Certificate" button should be enabled
        $enableAddCertificate = ($checklistStatus === "Created" && $dataStatus === "Generated");
    } else {
        echo "No details found for this project.";
        exit;
    }

    // Query to fetch certificate data
    $query = "
        SELECT 
            'healthcheck' AS certificate_type,
            hc.certificate_no
        FROM crane_health_check_certificate hc
        WHERE hc.project_id = ?        

        UNION

        SELECT 
            'loadtestwithload' AS certificate_type,
            lw.certificate_no
        FROM loadtest_certificate lw
        WHERE lw.project_id = ?

        UNION

        SELECT 
            'mobile' AS certificate_type,
            mc.certificate_no
        FROM mobile_crane_loadtest mc
        WHERE mc.project_id = ?


        UNION

        SELECT 
            'lifting' AS certificate_type,
            lc.certificate_no
        FROM lifting_gear_certificates lc
        WHERE lc.project_id = ?


        UNION

        SELECT 
            'mpi' AS certificate_type,
            mp.certificate_no
        FROM mpi_certificates mp
        WHERE mp.project_id = ?
       
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiiii", $data_id, $data_id, $data_id, $data_id, $data_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $certificates = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $certificates[] = $row;
        }
    } else {
        echo "No certificates found for this project.";
    }
} else {
    echo "Invalid Project ID.";
    exit;
}
?>

         <div class="main-content d-flex flex-column flex-md-row">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <!-- Invoice Header -->
                     <div class="invoice-details-header bg-white d-flex align-items-sm-center flex-column flex-sm-row mb-30 justify-content-sm-between">
                        <div class="d-flex align-items-center">
                           <a href="#" class="mr-2"><img src="<?php echo $url;?>assets/img/svg/angle-left.svg" alt="" class="svg"></a>
                           <h2 class="regular mr-3 font-30">JOB ID</h2>
                           <h4 class="c4">#256987</h4>
                        </div>

                        <div class="invoice-header-right d-flex align-items-center justify-content-around justify-content-sm-end mt-3 mt-sm-0">
                           <!-- Starred -->
                           <!-- <div class="star mr-20">
                              <a href="#"><img src="<?php echo $url;?>assets/img/svg/star.svg" alt="" class="svg"></a>
                           </div> -->
                           <!-- End Starred -->

                           <!-- Delete Mail -->
                           <div class="delete_mail mr-20">
                              <a href="#"><img src="<?php echo $url;?>assets/img/svg/delete.svg" alt="" class="svg"></a>
                           </div>
                           <!-- End Delete Mail -->

                           <!-- Edit Invoice Button -->
                           <div class="edit-invoice-btn pr-1">
                              <a href="invoice-add-new.html" class="btn-circle">
                                 <img src="<?php echo $url;?>assets/img/svg/writing.svg" alt="" class="svg">
                              </a>
                           </div>
                           <!-- End Edit Invoice Button -->

                        
                        </div>
                     </div>
                     <!-- End Invoice Header -->

                     <!-- Invoice Top -->
                     <div class="invoice-pd c2-bg" data-bg-img="../../../assets/img/media/invoice-pattern.png">
                        <div class="row">
                           <div class="col-md-4">
                              <!-- Invoice Left -->
                              <div class="invoice-left">
                              <h3 class="white font-20 mb-3">Customer Details</h3>
                                 <ul class="list-invoice">
                                    <li class="location">CA <br />
                                    <?php echo htmlspecialchars($data['equipment_location']); ?></li>
                                    <li class="call">
                                       <a href="tel:+01234567891">+0 (123) 456 7891</a> <br />
                                       <a href="tel:+01234567891">
                                       <?php echo htmlspecialchars($data['customer_mobile']); ?>
                                       </a>
                                    </li>
                                    <li class="mail">
                                    <?php echo htmlspecialchars($data['customer_email']); ?>
                                 </li>
                                    </li>
                                    
                                 </ul>
                              </div>
                              <!-- End Invoice Left -->
                           </div>
                           <div class="col-md-4">
                              <!-- Invoice Right -->
                              <div class="invoice-right mt-5 mt-md-0">
                                 <h3 class="white font-20 mb-3">Project Status</h3>

                                 <ul class="status-list">
                                    <li><span class="key font-14">Serial No:</span> <span class="white bold font-17">
                                       #256987
                                    </span></li>
                                    <li><span class="key font-14">Project No:</span> <span class="white bold font-17">
                                    <?php echo htmlspecialchars($data['project_id']); ?>
                                    
                                    </span></li>
                                    <li><span class="key font-14">Start Date:</span> <span class="white bold font-17">08/12/2019</span></li>
                                    <li><span class="key font-14">End Date:</span> <span class="white bold font-17">07/03/2019</span></li>
                                    <li><span class="key font-14">Status:</span> <span class="white status-btn completed">
                                       
                                    
                                    Completed</span></li>
                                 </ul>
                              </div>
                              <!-- End Invoice Right -->
                           </div>
                           <div class="col-md-4">
                              <!-- Invoice Right -->
                              <div class="invoice-right mt-5 mt-md-0">
                                 <h3 class="white font-20 mb-3">QR Status</h3>
                           <img class="img-responsive" src="../document/code.png" alt="Qr code" width="150px">
                              
                              </div>
                              <!-- End Invoice Right -->
                           </div>
                        </div>
                     </div>
                     <!-- End Invoice Top -->

                     <!-- Invois Wrapper -->
                     <div class="bg-white invoice-pd position-relative">
                        <!-- Button in the top-right corner -->
    <div class="position-absolute" style="top: 10px; right: 10px;">
    <?php if (!isset($certificateStatus) || $certificateStatus !== "Certificate Created"): ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCertificateModal">
        Add Certificate
    </button>
<?php endif; ?>
    </div>
                        <div class="row">
                        <div class="col-xl-4 col-md-6">
        <!-- Checklist Details -->
        <div class="invoice payment-details mt-5 mt-xl-0">
            <div class="bold black font-17 mb-3">Checklist Details:</div>
             <?php if ($checklistCreated): ?>
            <ul class="status-list">
                                    <li><span class="key">Checklist No:</span> <span class="black"><?php echo htmlspecialchars($data['checklist_no']); ?></span></li>
                                    <li><span class="key">Inspector:</span> <span class="black"><?php echo htmlspecialchars($data['inspected_by']); ?></span></li>
                                </ul>
                                <?php else: ?>
                    <p class="black">Checklist not created.</p>
                <?php endif; ?>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <!-- Report Details -->
        <div class="invoice invoice-form">
            <div class="bold black font-17 mb-3">Report Details:</div>
            <?php if ($reportCreated): ?>
            
            <ul class="status-list">
                                    <li><span class="key">Report No:</span> <span class="black"><?php echo htmlspecialchars($data['report_no']); ?></span></li>
                                    <li><span class="key">Sticker:</span> <span class="black"><?php echo htmlspecialchars($data['sticker_number_issued']); ?></span></li>
                                    <!-- <li><span class="key">Date of Creation:</span> <span class="black"><?php echo htmlspecialchars($data['date_of_creation']); ?></span></li>
                                    <li><span class="key">Rep. Name:</span> <span class="black"><?php echo htmlspecialchars($data['rep_name']); ?></span></li> -->
                                </ul>

                                <?php else: ?>
                    <p class="black">Report not created.</p>
                <?php endif; ?>
            
                <!-- <p>No report data found.</p> -->
            
        </div>
    </div>
                           <div class="col-xl-4 col-md-6">
                              <!-- Invoice To -->
                              <div class="invoice invoice-to mt-5 mt-md-0">
                                 <div class="black bold font-17 mb-3">Certificate Details :</div>
      
                                 <?php if (!empty($certificates)) : ?>
                                    <ul class="status-list">
                            <?php foreach ($certificates as $certificate) : ?>
                                <li>
                                    <!-- <strong>Type:</strong> <?php echo htmlspecialchars($certificate['certificate_type']); ?>, -->
                                    <strong>Number:</strong> <?php echo htmlspecialchars($certificate['certificate_no']); ?>;
                                    <!-- <strong>Status:</strong> <?php echo htmlspecialchars($certificate['status']); ?>,
                                    <strong>Created On:</strong> <?php echo htmlspecialchars($certificate['date_of_creation']); ?>,
                                    <strong>Prepared By:</strong> <?php echo htmlspecialchars($certificate['prepared_by']); ?> -->
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p>Certificates not available for this project.</p>
                    <?php endif; ?>
                              </div>
                              <!-- End Invoice To -->
                           </div>
                          
                        </div>


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
                    <label for="projectId">Project ID</label>
                    <input type="text" class="form-control" id="projectId" value="<?php echo htmlspecialchars($data['project_id']); ?>" readonly>
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

                        <!-- Add more options as required -->
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

                     </div>
                     <!-- End Invois Wrapper -->

                     <!-- Invoice Details List Wrapper -->
                      
                     <?php if (isset($certificateStatus) && $certificateStatus === "Certificate Created"): ?>
    <div class="bg-white details-list-wrap">
        <div class="table-responsive">
            <!-- Invoice List Table -->
            <table class="invoice-list-table style-two some-center text-nowrap">
                <thead>
                    <tr>
                        <th>Doc ID</th>
                        <th>Document Type</th>
                        <th>Date of Creation</th>
                        <th>Create By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    <tr>
                        <td class="bold">#01</td>
                        <td>Crane Checklist</td>
                        <td>26/12/2024</td>
                        <td>Inspector</td>
                        <td>Complete</td>
                        <td> 
                            <a href="#" class="download-btn mr-3"><img src="<?php echo $url;?>assets/img/svg/download.svg" alt="" class="svg"></a>
                            <a href="#" class="download-btn mr-3 bg-info"><img src="<?php echo $url;?>assets/img/svg/copy.svg" alt="" class="svg"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">#01</td>
                        <td>Crane Checklist</td>
                        <td>26/12/2024</td>
                        <td>Inspector</td>
                        <td>Complete</td>
                        <td> 
                            <a href="#" class="download-btn mr-3"><img src="<?php echo $url;?>assets/img/svg/download.svg" alt="" class="svg"></a>
                            <a href="#" class="download-btn mr-3 bg-info"><img src="<?php echo $url;?>assets/img/svg/copy.svg" alt="" class="svg"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End Invoice List Table -->
        </div>

        <!-- Cart Collaterals -->
        <div class="cart-collaterals">
            <div class="cart_totals calculated_shipping">
                <div class="proceed-to-checkout d-flex align-items-center justify-content-end mr-20 mt-4">
                    <a href="#" class="download-btn mr-3"><img src="<?php echo $url;?>assets/img/svg/download.svg" alt="" class="svg"></a>
                    <a href="#" class="print-btn mr-20"><img src="<?php echo $url;?>assets/img/svg/print-yellow.svg" alt="" class="svg"></a>
                </div>
            </div>
        </div>
        <!-- End Cart Collaterals -->
    </div>
    
<?php else: ?>
    <p class="bg-white details-list-wrap">Certificate not yet created for this project.</p>
<?php endif; ?>

                     <!-- End Invoice Details List Wrapper -->
                  </div>
               </div>
            </div>
         </div>
         <!-- End Main Content -->
      </div>
      <!-- End Main Wrapper -->

      <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const addCertificateButton = document.querySelector("button[data-target='#addCertificateModal']");
                        if (<?php echo json_encode($enableAddCertificate); ?>) {
                            addCertificateButton.removeAttribute("disabled");
                        } else {
                            addCertificateButton.setAttribute("disabled", "true");
                        }
                    });
                </script>

      <script>
    document.getElementById('createCertificateBtn').addEventListener('click', function () {
        // Get form values
        const projectId = document.getElementById('projectId').value;
        const checklistNo = document.getElementById('checklistNo').value;
        const reportNo = document.getElementById('reportNo').value;
        const certificateType = document.getElementById('certificateType').value;

        if (!checklistNo || !reportNo || !certificateType) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Define redirection URLs for each certificate type
        const certificateLinks = {
            healthcheck: '../document/health-check/create.php',
            lifting: '../document/lifting/create.php',
            loadtestwithload: '../document/loadtest/with_load.php',            
            mobile: '../document/mobile/create.php',
            mpi: '../document/mpi/create.php',
            // Add more mappings as needed
        };

        // Check if the selected certificate type has a link
        if (certificateLinks[certificateType]) {
            // Redirect to the appropriate link
            const redirectUrl = `${certificateLinks[certificateType]}?project_id=${projectId}&checklist_no=${checklistNo}&report_no=${reportNo}`;
            window.location.href = redirectUrl;
        } else {
            alert('Invalid certificate type selected.');
        }
    });
</script>


<?php
include_once('../inc/footer.php');
?>