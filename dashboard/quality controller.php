<?php
session_start(); // Ensure session is started
include_once('../file/config.php');
include_once('../inc/function.php');


// Get the logged-in user's name and role from the session
$username = $_SESSION['username']; // Assuming you store the username in the session
$role = $_SESSION['role']; // Assuming you store the role in the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
   header("Location: ../index.php");
   exit();
}

// Check if the user has the 'quality controller' role
if ($_SESSION['role'] !== 'quality controller') {
   // Redirect to a default page or show an error
   header("Location: ../index.php");
   exit();
}



?>

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
                        <img src="../assets/img/png-icon/tax.png" alt="">
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Total Projects</p>
                        <h2>20</h2>
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
                        <img src="../assets/img/png-icon/revenue.png" alt="">
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Pending Projects</p>
                        <h2>20</h2>
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
                        <img src="../assets/img/png-icon/user.png" alt="">
                     </div>
                     <div class="state-content">
                        <p class="font-14 mb-2">Expiring Sticker</p>
                        <h2>46</h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card -->
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