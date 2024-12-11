<?php
include_once('../file/config.php');
include '../file/auth.php';


include_once('../inc/function.php');





// Check if project_id is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $project_id = $_GET['id'];
   
   // SQL query to fetch details based on project_id
   $query = "SELECT * FROM project_info WHERE project_id = ?";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("i", $project_id); // Bind the project_id as an integer
   $stmt->execute();
   $result = $stmt->get_result();
   
   if ($result->num_rows > 0) {
       $project = $result->fetch_assoc();
   } else {
       echo "No details found for this project.";
       exit;
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
                           <div class="col-md-8">
                              <!-- Invoice Left -->
                              <div class="invoice-left">
                              <h3 class="white font-20 mb-3">Customer Details</h3>
                                 <ul class="list-invoice">
                                    <li class="location">330, North Brand Boulevard Glendale, CA <br />
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
                        </div>
                     </div>
                     <!-- End Invoice Top -->

                     <!-- Invois Wrapper -->
                     <div class="bg-white invoice-pd">
                        <div class="row">
                           <div class="col-xl-4 col-md-6">
                              <!-- Invoice Form -->
                              <div class="invoice invoice-form">
                                 <div class="invoice-title c4 bold font-14 mb-3">Checklist Details</div>
      
                                 <ul class="list-invoice">
                                    <li class="user bold black font-17">Adam Hudson</li>
                                    <li class="location">712 Clarkson Ave Brooklyn,<br />
                                       NY 11203, USA</li>
                                    <li class="call">
                                       <a href="tel:+01234567891">+0 (123) 456 7891</a>
                                    </li>
                                    <li class="mail"><a href="mailto:asdad@email.com">adamhud@email.com</a></li>
                                 </ul>
                              </div>
                              <!-- End Invoice Form -->
                           </div>
                           <div class="col-xl-4 col-md-6">
                              <!-- Invoice To -->
                              <div class="invoice invoice-to mt-5 mt-md-0">
                                 <div class="invoice-title c4 bold font-14 mb-3">Certificate Details</div>
      
                                 <ul class="list-invoice">
                                    <li class="user bold black font-17">Nicolas McDonald</li>
                                    <li class="location">712 Clarkson Ave Brooklyn,<br />
                                       NY 11203, USA</li>
                                    <li class="call">
                                       <a href="tel:+01234567891">+0 (123) 456 7891</a>
                                    </li>
                                    <li class="mail"><a href="mailto:adamhud@email.com">adamhud@email.com</a></li>
                                 </ul>
                              </div>
                              <!-- End Invoice To -->
                           </div>
                           <div class="col-xl-4 col-md-6">
                              <!-- Invoice Payment Details -->
                              <div class="invoice payment-details mt-5 mt-xl-0">
                                 <div class="invoice-title c4 bold font-14 mb-3">Equipment Details:</div>
      
                                 <ul class="status-list">
                                    <li><span class="key">Total Due</span> <span class="black font-17 black bold">Staus</span></li>
                                    <li><span class="key">Bank name</span> <span class="black">DR International Bank</span></li>
                                    <li><span class="key">SWIFT code</span> <span class="black">AS4F1</span></li>
                                    <li><span class="key">IBAN</span> <span class="black">ETD85039283901259</span></li>
                                    <li><span class="key">Country</span> <span class="black">Canada</span></li>
                                    <li><span class="key">Address</span> <span class="black">West New York, NJ 07093 23 <br /> Sussex Ave.</span></li>
                                 </ul>
                              </div>
                              <!-- End Invoice Payment Details -->
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
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Hours</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                 </tr>
                              </thead>

                              <tbody class="bg-white">
                                 <tr>
                                    <td class="bold">#01</td>
                                    <td>PSD to html conversion</td>
                                    <td>26</td>
                                    <td>$64.3</td>
                                    <td>$2654.36</td>
                                 </tr>

                                 <tr>
                                    <td class="bold">#01</td>
                                    <td>PSD to html conversion</td>
                                    <td>26</td>
                                    <td>$64.3</td>
                                    <td>$2654.36</td>
                                 </tr>

                                 <tr>
                                    <td class="bold">#01</td>
                                    <td>PSD to html conversion</td>
                                    <td>26</td>
                                    <td>$64.3</td>
                                    <td>$2654.36</td>
                                 </tr>

                                 <tr>
                                    <td class="bold">#01</td>
                                    <td>PSD to html conversion</td>
                                    <td>26</td>
                                    <td>$64.3</td>
                                    <td>$2654.36</td>
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
                                 <a href="#" class="btn">View Now</a>
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

     


<?php
include_once('../inc/footer.php');
?>