<?php
// session_start(); // Start the session

// Check if the role is set in the session
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; // Default to empty if not set

// If the role is not set or is 'guest', redirect to login page or another appropriate page
if ($role == '' || $role == 'guest') {
    header("Location: ../index.php"); // Redirect to login if the user is not logged in or is a guest
    exit();
}
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
            <!-- Dashboard Link Based on Role -->
            <!-- <li class="active">
   <a href="<?php echo $url; ?>dashboard/<?php echo $role; ?>.php">
      <i class="icofont-pie-chart"></i>
      <span class="link-title">Dashboard</span>
   </a>
</li> -->



<li class="active">
   <a href="<?php 
      // Conditional check for role to link to the correct dashboard
      if ($role === 'admin') {
         echo $url . 'dashboard/index.php'; // Admin dashboard
      } elseif ($role === 'customer') {
         echo $url . 'dashboard/customer_new.php'; // Inspector dashboard
      } elseif ($role === 'inspector') {
         echo $url . 'dashboard/inspector.php'; // Inspector dashboard
      } elseif ($role === 'reviewer') {
         echo $url . 'dashboard/reviewer.php'; // Reviewer dashboard      
      } elseif ($role === 'document controller') {
      echo $url . 'dashboard/document controller.php'; // Reviewer dashboard
      } elseif ($role === 'quality controller') {
         echo $url . 'dashboard/quality controller.php'; // Reviewer dashboard
      }
      else {
         echo $url . 'dashboard/'; // Default fallback
      }
   ?>">
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
        <!-- Sub Menu for Admin -->
        <ul class="nav sub-menu">
            <li><a href="<?php echo $url; ?>sticker/add-sticker.php">Add Sticker</a></li>
            <li><a href="<?php echo $url; ?>sticker/sticker-list.php">Sticker List</a></li>
        </ul>
        <!-- End Sub Menu -->
    </li>
<?php elseif ($_SESSION['role'] === 'inspector'): ?>
    <li>
        <a href="<?php echo $url; ?>sticker/sticker-list.php">
            <i class="icofont-shopping-cart"></i>
            <span class="link-title">Sticker List</span>
        </a>
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
                  <?php if ($_SESSION['role'] === 'admin'): ?>
                     <li><a href="<?php echo $url; ?>job/create-job.php">Create New Project</a></li>
                  <?php endif; ?>
                  <li><a href="<?php echo $url; ?>job/overall-job-list.php">Over all Projects</a></li>
                  <li><a href="<?php echo $url; ?>job/pending_projects.php">Pending Projects</a></li>
               </ul>
               <!-- End Sub Menu -->
            </li>

            <!-- Certificate Portal (Visible to Admin Only) -->
           
               <li>
                  <a href="#">
                     <i class="icofont-navigation-menu"></i>
                     <span class="link-title">Certificate Portal</span>
                  </a>
                  <!-- Sub Menu -->
                  <ul class="nav sub-menu">
                     <li><a href="<?php echo $url; ?>document/health-check/">Health-Check</a></li>
                     <li><a href="<?php echo $url; ?>document/lifting/">Lifting</a></li>
                     <li><a href="<?php echo $url; ?>document/loadtest/">Load test</a></li>
                     <li><a href="<?php echo $url; ?>document/mobile/">Mobile</a></li>
                     <li><a href="<?php echo $url; ?>document/mpi/">MPI</a></li>
                     <li><a href="<?php echo $url; ?>document/eddycurrent/">Eddy Current</a></li>
                     <li><a href="<?php echo $url; ?>document/liquid-penetrant-inspection-certificate/">Liquid Penetrant Inspection Certificate</a></li>
                     <li><a href="<?php echo $url; ?>document/rocktest/">Rocking Test</a></li>
                  </ul>
                  <!-- End Sub Menu -->
               </li>
            

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
            <?php if ($_SESSION['role'] === 'admin'): ?>
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
            <?php endif; ?>

            <!-- General Setup (Visible to Admin Only) -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
               <li>
                  <a href="#">
                     <i class="icofont-binary"></i>
                     <span class="link-title">General Setup</span>
                  </a>
                  <!-- Sub Menu -->
                  <ul class="nav sub-menu">
                     <li><a href="<?php echo $url; ?>inspector/all-inspector.php">Inspector List</a></li>
                     <li><a href="<?php echo $url; ?>user/all-user.php">User List</a></li>
                     <li><a href="<?php echo $url; ?>setup/timeline.php">Timeline</a></li>
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