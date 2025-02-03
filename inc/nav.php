<?php
// session_start(); // Start the session

// Check if the role is set in the session
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user'; // Default to 'user' if not set
?>


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

            <!-- Sticker Portal (Visible to Admin Only) -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
               <li>
                  <a href="#">
                     <i class="icofont-shopping-cart"></i>
                     <span class="link-title">Sticker Portal</span>
                  </a>
                  <!-- Sub Menu -->
                  <ul class="nav sub-menu">
                     <li><a href="<?php echo $url; ?>sticker/add-sticker.php">Add Sticker</a></li>
                     <li><a href="<?php echo $url; ?>sticker/sticker-list.php">Sticker List</a></li>
                  </ul>
                  <!-- End Sub Menu -->
               </li>
            <?php endif; ?>

            <!-- Job Portal (Visible to All Users) -->
            <li>
               <a href="#">
                  <i class="icofont-navigation-menu"></i>
                  <span class="link-title">Job Portal</span>
               </a>
               <!-- Sub Menu -->
               <ul class="nav sub-menu">
                  <li><a href="<?php echo $url; ?>job/overall-job-list.php">Over all Projects</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- Certificate Portal (Visible to Admin Only) -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
               <li>
                  <a href="#">
                     <i class="icofont-navigation-menu"></i>
                     <span class="link-title">Certficate Portal</span>
                  </a>
                  <!-- Sub Menu -->
                  <ul class="nav sub-menu">
                     <li><a href="<?php echo $url; ?>document/health-check/">Health-Check</a></li>
                     <li><a href="<?php echo $url; ?>document/lifting/">Lifting</a></li>
                     <li><a href="<?php echo $url; ?>document/loadtest/">Load test</a></li>
                     <li><a href="<?php echo $url; ?>document/mobile/">Mobile</a></li>
                     <li><a href="<?php echo $url; ?>document/mpi/">MPI</a></li>
                  </ul>
                  <!-- End Sub Menu -->
               </li>
            <?php endif; ?>

            <!-- Checklist Portal (Visible to All Users) -->
            <li>
               <a href="#">
                  <i class="icofont-contacts"></i>
                  <span class="link-title">Checklist Portal</span>
               </a>
               <!-- Sub Menu -->
               <ul class="nav sub-menu">
                  <li><a href="<?php echo $url; ?>document/checklist/">All Checklist</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- Report Portal (Visible to All Users) -->
            <li>
               <a href="#">
                  <i class="icofont-contacts"></i>
                  <span class="link-title">Report Portal</span>
               </a>
               <!-- Sub Menu -->
               <ul class="nav sub-menu">
                  <li><a href="<?php echo $url; ?>document/report">All Report List</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- KPI Result (Visible to All Users) -->
            <li>
               <a href="#">
                  <i class="icofont-edit"></i>
                  <span class="link-title">KPI Result</span>
               </a>
               <!-- Sub Menu -->
               <ul class="nav sub-menu">
                  <li><a href="">Customer Report</a></li>
                  <li><a href="">Job Report</a></li>
                  <li><a href="">Document Report</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- Customer Portal (Visible to All Users) -->
            <li>
               <a href="#">
                  <i class="icofont-contacts"></i>
                  <span class="link-title">Customer Portal</span>
               </a>
               <!-- Sub Menu -->
               <ul class="nav sub-menu">
                  <li><a href="<?php echo $url; ?>customer/customer-list.php">Customer List</a></li>
                  <li><a href="<?php echo $url; ?>customer/view-customer.php">Customer Status</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- General Setup (Visible to Admin Only) -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
               <li>
                  <a href="#">
                     <i class="icofont-binary"></i>
                     <span class="link-title">General Setup</span>
                  </a>
                  <!-- Sub Menu -->
                  <ul class="nav sub-menu">
                     <li><a href="<?php echo $url; ?>/inspector/all-inspector.php">Inspector List</a></li>
                     <li><a href="<?php echo $url; ?>/setup/timeline.php">Timeline</a></li>
                     <li><a href="">Account Settings</a></li>
                  </ul>
                  <!-- End Sub Menu -->
               </li>
            <?php endif; ?>

            <li class="nav-category">Support</li>
         </ul>
         <!-- End Nav -->
      </div>
      <!-- End Sidebar Body -->
   </nav>
   <!-- End Sidebar -->
