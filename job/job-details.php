<?php
include_once('../file/config.php');
include '../file/auth.php';
include_once('../inc/function.php');

// Check if project_id is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $project_id = $_GET['id'];

    // Query to fetch project details
    $queryProject = "SELECT * FROM project_info WHERE project_id = ?";
    $stmtProject = $conn->prepare($queryProject);
    $stmtProject->bind_param("i", $project_id);
    $stmtProject->execute();
    $resultProject = $stmtProject->get_result();

    if ($resultProject->num_rows > 0) {
        $project = $resultProject->fetch_assoc();

        // Retrieve checklist_status and report_status directly from the project_info table
        $checklistStatus = $project['checklist_status'];
        $reportStatus = $project['report_status'];

        // Determine if the "Add Certificate" button should be enabled
        $enableAddCertificate = ($checklistStatus === "Created" && $reportStatus === "Generated");
    } else {
        echo "No details found for this project.";
        exit;
    }

    // Query to fetch checklist data
    $queryChecklist = "SELECT * FROM checklist_information WHERE project_id = ?";
    $stmtChecklist = $conn->prepare($queryChecklist);
    $stmtChecklist->bind_param("i", $project_id);
    $stmtChecklist->execute();
    $resultChecklist = $stmtChecklist->get_result();

   //  $checklistStatus = "Incomplete";
   //  if ($resultChecklist->num_rows > 0) {
   //      while ($checklist = $resultChecklist->fetch_assoc()) {
   //          if (in_array($checklist['status'], ['Created', 'Generated'])) {
   //              $checklistStatus = "Complete";
   //              break;
   //          }
   //      }
   //  }


    // Query to fetch report data
    $queryReport = "SELECT * FROM reports WHERE project_id = ?";
    $stmtReport = $conn->prepare($queryReport);
    $stmtReport->bind_param("i", $project_id);
    $stmtReport->execute();
    $resultReport = $stmtReport->get_result();

   //  $reportStatus = "Incomplete";
   //  if ($resultReport->num_rows > 0) {
   //      while ($report = $resultReport->fetch_assoc()) {
   //          if (in_array($report['status'], ['Created', 'Generated'])) {
   //              $reportStatus = "Complete";
   //              break;
   //          }
   //      }
   //  }

    // Determine if the button should be enabled
   //  $enableAddCertificate = ($checklistStatus === "Complete" && $reportStatus === "Complete");
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
                                    <?php echo htmlspecialchars($project['equipment_location']); ?></li>
                                    <li class="call">
                                       <a href="tel:+01234567891">+0 (123) 456 7891</a> <br />
                                       <a href="tel:+01234567891">
                                       <?php echo htmlspecialchars($project['customer_mobile']); ?>
                                       </a>
                                    </li>
                                    <li class="mail">
                                    <?php echo htmlspecialchars($project['customer_email']); ?>
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
                                    <?php echo htmlspecialchars($project['project_id']); ?>
                                    
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCertificateModal">
        Add Certificate
    </button>
    </div>
                        <div class="row">
                        <div class="col-xl-4 col-md-6">
        <!-- Checklist Details -->
        <div class="invoice payment-details mt-5 mt-xl-0">
            <div class="bold black font-17 mb-3">Checklist Details:</div>
            
                <ul class="status-list">
                <li><span class="key">Checklist Status:</span> <span class="black"><?php echo htmlspecialchars($project['checklist_status']); ?></span></li>
                <?php if ($resultChecklist->num_rows > 0): ?>
                    <?php while ($checklist = $resultChecklist->fetch_assoc()): ?>
                        <li><span class="key">Checklist No:</span> <span class="black"><?php echo htmlspecialchars($checklist['checklist_no']); ?></span></li>
                        
                        <!-- <li><span class="key">Equipment ID:</span> <span class="black"><?php echo htmlspecialchars($checklist['equipment_id']); ?></span></li> -->
                        <li><span class="key">Inspector:</span> <span class="black"><?php echo htmlspecialchars($checklist['inspected_by']); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No checklist data found.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <!-- Report Details -->
        <div class="invoice invoice-form">
            <div class="bold black font-17 mb-3">Report Details:</div>
            
                <ul class="status-list">
                <li><span class="key">Report Status:</span> <span class="black"><?php echo htmlspecialchars($project['report_status']); ?></span></li>
                <?php if ($resultReport->num_rows > 0): ?>
                    <?php while ($report = $resultReport->fetch_assoc()): ?>
                        <li><span class="key">Report No:</span> <span class="black"><?php echo htmlspecialchars($report['report_no']); ?></span></li>
                        <li><span class="key">Sticker:</span> <span class="black"><?php echo htmlspecialchars($report['sticker_number_issued']); ?></span></li>
                        <li><span class="key">Date of Creation:</span> <span class="black"><?php echo htmlspecialchars($report['date_of_creation']); ?></span></li>
                        
                        <li><span class="key">Rep. Name:</span> <span class="black"><?php echo htmlspecialchars($report['rep_name']); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No report data found.</p>
            <?php endif; ?>
        </div>
    </div>
                           <div class="col-xl-4 col-md-6">
                              <!-- Invoice To -->
                              <div class="invoice invoice-to mt-5 mt-md-0">
                                 <div class="black bold font-17 mb-3">Certificate Details :</div>
      
                                 <ul class="status-list">
                                    <li><span class="key">Certificate no</span> <span class="black font-17 black bold">12</span></li>
                                    <li><span class="key">Status</span> <span class="black">Created</span></li>
                                    <li><span class="key">Date of Creation</span> <span class="black">01/12/2024</span></li>
                                    <li><span class="key">Certificate Type</span> <span class="black"> Health Check</span></li>
                                    <li><span class="key">Equipment ID</span> <span class="black">123466</span></li>
                                    <li><span class="key">Prepare by</span> <span class="black">West New York, NJ 07093 23 <br /> Sussex Ave.</span></li>
                                 </ul>
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
                    <input type="text" class="form-control" id="projectId" value="<?php echo htmlspecialchars($project['project_id']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="checklistNo">Checklist No</label>
                    <input type="text" class="form-control" id="checklistNo" value="<?php echo htmlspecialchars($checklist['checklist_no']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="reportNo">Report No</label>
                    <input type="text" class="form-control" id="reportNo" value="<?php echo htmlspecialchars($project['report_no']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="certificateType">Certificate Type</label>
                    <select class="form-control" id="certificateType" required>
                        <option value="" disabled selected>Select Certificate Type</option>
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
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
                              <!-- <table class="shop_table style-two">
                                 <tbody>
                                    <tr class="cart-subtotal">
                                       <th>Subtotal</th>
                                       <th>
                                          <span class="Price-amount amount">
                                             <span class="Price-currencySymbol">$</span>2654.36</span>
                                       </th>
                                    </tr>
                                    <tr class="cart-tax">
                                       <td>Tax (19%)</td>
                                       <td>
                                          <span class="Price-amount amount">
                                             <span class="Price-currencySymbol">$</span>154.45</span>
                                       </td>
                                    </tr>
                                    <tr class="cart-tax">
                                       <td>Discount (5%)</td>
                                       <td>
                                          <span class="Price-amount amount">
                                             <span class="Price-currencySymbol">-$</span>54.45</span>
                                       </td>
                                    </tr>
                     
                                    <tr class="order-total">
                                       <td>Total</td>
                                       <td>
                                          <strong>
                                             <span class="Price-amount amount"><span class="Price-currencySymbol">$</span>3654.45</span>
                                          </strong> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table> -->
                     
                              <div class="proceed-to-checkout d-flex align-items-center justify-content-end mr-20 mt-4">
                                 <a href="#" class="download-btn mr-3"><img src="<?php echo $url;?>assets/img/svg/download.svg" alt="" class="svg"></a>
                                 <a href="#" class="print-btn mr-20"><img src="<?php echo $url;?>assets/img/svg/print-yellow.svg" alt="" class="svg"></a>
                                 <!-- <a href="#" class="btn">View Now</a> -->
                              </div>
                           </div>
                        </div>
                        <!-- End Cart Collaterals -->
                     </div>
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
            type1: '../document/health-check/create.php',
            type2: '../document/lifting/create.php',
            type3: '../document/loadtest/with_load.php',
            type4: '../document/loadtest/with_load.php',
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