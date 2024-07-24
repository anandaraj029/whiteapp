
      <!-- Main Wrapper -->
      <div class="main-wrapper">
         <!-- Sidebar -->
         <nav class="sidebar" data-trigger="scrollbar">
            <!-- Sidebar Header -->
            <div class="sidebar-header d-none d-lg-block">
               <!-- Sidebar Toggle Pin Button -->
               <div class="sidebar-toogle-pin">
                  <i class="icofont-tack-pin"></i>
               </div>
               <!-- End Sidebar Toggle Pin Button -->
            </div>
            <!-- End Sidebar Header -->

            <!-- Sidebar Body -->
            <div class="sidebar-body">
               <!-- Nav -->
               <ul class="nav">
                  <li class="nav-category">Main</li>
                  <li class="active">
                     <a href="<?php echo $url; ?>dashboard/">
                        <i class="icofont-pie-chart"></i>
                        <span class="link-title">Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <i class="icofont-shopping-cart"></i>
                        <span class="link-title">Sticker Portal</span>
                     </a>

                     <!-- Sub Menu -->
                     <ul class="nav sub-menu">
                        <li><a href="<?php echo $url; ?>sticker/add-sticker.php">Add Sticker</a></li>
                        <li><a href="<?php echo $url; ?>sticker/sticker-list.php">Sticker List</a></li>
                        <!-- <li><a href="">Status Project</a></li> -->
                      
                     </ul>
                     <!-- End Sub Menu -->
                  </li>
                  <li>
                     <a href="#">
                        <i class="icofont-navigation-menu"></i>
                        <span class="link-title">Job Portal</span>
                     </a>

                     <!-- Sub Menu -->
                     <ul class="nav sub-menu">
                         <li><a href="<?php echo $url; ?>job/overall-job-list.php">Over all Projects</a></li>
                        <li><a href="<?php echo $url; ?>job/create-job.php">Lifting Equipment</a></li>
                        <li><a href="">NDT Equipment</a></li>
                      </ul>
                     <!-- End Sub Menu -->
                  </li>
                  <li>
                     <a href="#">
                        <i class="icofont-contacts"></i>
                        <span class="link-title">Customer Portal</span>
                     </a>

                     <!-- Sub Menu -->
                     <ul class="nav sub-menu">
                        <li><a href="">Create Customer</a></li>
                        <li><a href="<?php echo $url; ?>customer/customer-list.php">Customer List</a></li>
                        <li><a href="<?php echo $url; ?>customer/view-customer.php">Customer Status</a></li>
                      
                     </ul>
                     <!-- End Sub Menu -->
                  </li>
                  <li>
                     <a href="#">
                        <i class="icofont-edit"></i>
                        <span class="link-title">Report Portal</span>
                     </a>

                     <!-- Sub Menu -->
                     <ul class="nav sub-menu">
                        <li><a href="">Customer Report</a></li>
                        <li><a href="">Job Report</a></li>
                        <li><a href="">Document Report</a></li>
                      
                     </ul>
                     <!-- End Sub Menu -->
                  </li>

                  <li class="has-sub-item">
                            <a href="#">
                                <i class="icofont-database"></i>
                                <span class="link-title">Document Portal</span>
                            </a>

                            <!-- Sub Menu -->
                            <ul class="nav sub-menu" style="display: none;">
                           
                                <li class="has-sub-item"><a href="#">Report</a>
                                <!-- Sub Menu -->
                                <ul class="nav sub-menu" style="display: none;">
                                    <li><a href="#">equp name</a></li>
                                    <li><a href="#">equp name</a></li>
                                </ul>
                                <!-- End Sub Menu -->
                                </li>
                                <li class="has-sub-item"><a href="#">Checklist</a>
                                <!-- Sub Menu -->
                                <ul class="nav sub-menu" style="display: none;">
                                    <li><a href="#">Check name</a></li>
                                    <li><a href="#">Check name</a></li>
                                </ul>
                                <!-- End Sub Menu -->
                                </li>
                                <li class="has-sub-item"><a href="#">Certificate</a>
                                <!-- Sub Menu -->
                                <ul class="nav sub-menu" style="display: none;">
                                    <li><a href="#">Cert name</a></li>
                                    <li><a href="#">Cert name</a></li>
                                </ul>
                                <!-- End Sub Menu -->
                                </li>
                            </ul>
                            <!-- End Sub Menu -->
                        </li>
                        <li>
                     <a href="#">
                        <i class="icofont-binary"></i>
                        <span class="link-title">General Setup</span>
                     </a>

                     <!-- Sub Menu -->
                     <ul class="nav sub-menu">
                        <li><a href="<?php echo $url; ?>/setup/inspector-list.php">Inspector List</a></li>
                        <li><a href="<?php echo $url; ?>/setup/timeline.php">Timeline</a></li>
                        <li><a href="">Account Settings</a></li>
                      
                     </ul>
                     <!-- End Sub Menu -->
                  </li>
            
                  <li class="nav-category">Support</li>
               </ul>
               <!-- End Nav -->
            </div>
            <!-- End Sidebar Body -->
         </nav>
         <!-- End Sidebar -->