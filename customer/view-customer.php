<?php 
include_once('../file/config.php');

$cus_name = ""; // Initialize customer name
$profilePhoto = ""; // Initialize profile photo
// $mobileNew = "";

// Ensure cus_id is passed and valid
if (isset($_GET['cusid'])) {
    $customer_id = $_GET['cusid'];

    $sql = "SELECT * FROM customers WHERE cus_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $customer_id); // "s" specifies the variable type is string

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cus_name = $row['customer_name']; // Get customer name
      //   $mobileNew = $row['mobile'];
        
        
        $profilePhoto = $row['profile_photo'] ?: $url . 'assets/img/media/profile-pic.jpg'; // Default photo if not set
    } else {
        echo "No customer found with ID: $customer_id";
    }
} else {
    echo "Customer ID not provided.";
}

include_once('../inc/customer-option.php');
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


                                    <!-- Upload Photo -->
                                    <!-- <div class="upload-button">
                                        <img src="<?php echo $url; ?>assets/img/svg/gallery.svg" alt="" class="svg mr-2">
                                        <span>Upload Photo</span>
                                        <input class="file-input" type="file" id="fileUpload2" accept="image/*">
                                    </div> -->
                                    <!-- End Upload Photo -->
                                </div>

                                <div>
                                    <h3><?php echo htmlspecialchars($cus_name); ?></h3>
                                    <p class="font-14">Head Of Business Development</p>
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
                                                 <a class="conncetion" href="connection.html">
                                                     <div class="btn-circle mr-20">
                                                         <img src="<?php echo $url; ?>assets/img/svg/user-check.svg" alt="" class="svg">
                                                     </div>
                                                     <div class="font-14">
                                                         <h4>154</h4>
                                                         <p class="font-14 text_color">Connections</p>
                                                     </div>
                                                 </a>
                                             </li>
                                             <li>
                                                 <a class="p_nav-link has-before active" href="about.html">About</a>
                                             </li>
                                             <li>
    <a class="p_nav-link" href="project.php?cus_id=<?php echo $customer_id; ?>">Projects</a>
</li>
                                             <li>
                                                 <a class="p_nav-link" href="news-feed.html">News Feed</a>
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
                                                    <a href="edit-customer.php">Edit Profile</a>
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
                                             <p class="font-14">Praesent tempor dictum tellus ut molestie. Sed sed ullamcorper lorem, id faucibus odio.</p>
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
                                     <div class="p-30">
                                         <div class="about-myself mt-2 pb-2">
                                             <h4 class="mb-3">About Myself</h4>
                                             <p>Fusce at nisi eget dolor rhoncus facilisis. Mauris ante nisl, consectetur et luctus et, porta ut dolor. Curabitur ultricies ultrices nulla. Morbi blandit nec est vitae dictum. Etiam vel consectetur diam. Maecenas vitae egestas dolor. Fusce tempor magna at tortor aliquet finibus. Sed eu nunc sit amet elit euismod faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                                         </div>



                                         



 
 
<div class="row mt-5">
<div class="col-md-3">
                                              <nav>
                                                 <div class="nav flex-md-column about-nav-tab">
 
                                                     <a class="active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview">Overview</a>
 
                                                     <!-- <a id="nav-work-tab" data-toggle="tab" href="#nav-work">Work</a> -->
                                                     <a id="nav-basic-tab" data-toggle="tab" href="#nav-basic">Contact And Basic Info</a>
 
                                                     <a id="nav-education-tab" data-toggle="tab" href="#nav-education">Equipments</a>
 
                                                     
 
                                                     <!-- <a id="nav-skill-tab" data-toggle="tab" href="#nav-skill">Skills</a> -->
                                                 </div>
                                             </nav>
                                           </div>
 
                                           <div class="col-md-9">
                                              <div class="tab-content about-tab-content pl-md-5 mt-4 mt-md-0">
                                                    <div class="tab-pane fade show active" id="nav-overview" role="tabpanel">
                                                       <!-- Overview -->
                                                       <div class="overview">
                                                          <h4 class="mb-3">Overview</h4>
 
                                                          <ul class="p_overview-list list-unstyled">
                                                                <li>
                                                                   <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                            <img src="<?php echo $url; ?>assets/img/png-icon/themelooks.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                            <a href="#">Front-end Web Developer</a> at <a href="#">ThemeLooks</a>,
                                                                            <br />
                                                                            <a href="#">Front-end Web Development Intern</a> at <a href="#">ThemeLooks</a>
                                                                            <div>
                                                                               <a data-toggle="tab" href="#nav-work" class="c2 hover-to-show">Edit your work</a>
                                                                            </div>
                                                                      </div>
                                                                   </div>
                                                                </li>
                                                                <li>
                                                                   <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                            <img src="<?php echo $url; ?>assets/img/png-icon/fci.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                            Studied SEIP at 
                                                                            <a href="#">FENI COMPUTER INSTITUTE (FCI)</a>
                                                                            <div>
                                                                               <div>Attended from 2018 to 2018</div>
                                                                               <a data-toggle="tab" href="#nav-education" class="c2 hover-to-show">Edit your education</a>
                                                                            </div>
                                                                      </div>
                                                                   </div>
                                                                </li>
                                                               
                                                                <li>
                                                                   <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                            <i class="icofont-mobile-phone"></i>
                                                                      </div>
                                                                      <div class="content">
                <a href="tel:<?php echo htmlspecialchars($row['mobile']); ?>" class="text_color">
                <?php echo htmlspecialchars($row['mobile']); ?>
                </a>
            </div>
                                                                   </div>
                                                                </li>
                                                                <li>
                                                                   <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                            <i class="icofont-globe"></i>
                                                                      </div>
                                                                      <div class="content">
                                                                            <a href="<?php echo htmlspecialchars($row['email']); ?>" class="text_color"><?php echo htmlspecialchars($row['email']); ?></a>
                                                                      </div>
                                                                   </div>
                                                                </li>
                                                                <li>
                                                                   <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                            <i class="icofont-birthday-cake"></i>
                                                                      </div>
                                                                      <div class="content">
                                                                            September 25, 1991
                                                                      </div>
                                                                   </div>
                                                                </li>
                                                          </ul>
                                                       </div>
                                                       <!-- End Overview -->
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-work" role="tabpanel">
                                                       <h4 class="mb-3">Work</h4>
 
                                                       <ul class="p_work-list list-unstyled">
                                                          <li>
                                                             <div class="add-workplace">
                                                                <div class="iconwrap mr-3">
                                                                   <i class="icofont-plus"></i>
                                                                </div>
                                                                <h4 class="c2 regular">Add a Workplace</h4>
                                                             </div>
 
                                                             <!-- Add Work From -->
                                                             <div class="add-work-form mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="company" class="col-sm-3 col-lg-2 col-form-label">Company</label>
                                                                      <div class="col-sm-9 col-md-10">
                                                                         <input type="text" class="form-control" name="company" id="company" placeholder="Where have you worked?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position" class="col-sm-3 col-lg-2 col-form-label">Position</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="position" id="position" placeholder="What is your job title?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="cityTown" class="col-sm-3 col-lg-2 col-form-label">City/Town</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="city" id="cityTown">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex align-items-center position-relative mb-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                            
                                                                            <span class="d-inline-block ml-4">I currently work here</span>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect1">
                                                                                  <option>Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option selected="">20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month">
                                                                                  <option>Month</option>
                                                                                  <option selected="">January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year">
                                                                                  <option>Year</option>
                                                                                  <option>2019</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option selected="">1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to present</span>
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
 
 
                                                                </form>
                                                             </div>
                                                             <!-- End Add Work From -->
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/themelooks.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="#"><h4 class="c2 company-name">ThemeLooks</h4></a>
                                                                         <div>
                                                                            <span class="d-inline-block position mr-2">Front-end Web Developer</span>
                                                                            <span class="d-inline-block mr-2">
                                                                               <span class="month">December</span> 
                                                                               <span class="day">15</span>, 
                                                                               <span class="year">2017</span> to present
                                                                            </span>
                                                                            <span class="d-inline-block city">Dhaka, Bangladesh</span>
                                                                         </div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                             <!-- Work Update From -->
                                                             <div class="work-update-form mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="company2" class="col-sm-3 col-lg-2 col-form-label">Company</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="company" id="company2" placeholder="Where have you worked?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position2" class="col-sm-3 col-lg-2 col-form-label">Position</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="position" id="position2" placeholder="What is your job title?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="cityTown2" class="col-sm-3 col-lg-2 col-form-label">City/Town</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="city" id="cityTown2">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description2" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description2" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex align-items-center position-relative mb-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                            
                                                                            <span class="d-inline-block ml-4">I currently work here</span>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect2">
                                                                                  <option selected="">Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option>20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month2">
                                                                                  <option selected="">Month</option>
                                                                                  <option>January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year2">
                                                                                  <option selected="">Year</option>
                                                                                  <option>2019</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option>1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to present</span>
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                </form>
                                                             </div>
                                                             <!-- End Work Update From -->
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/themelooks.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="https://www.themelooks.com"><h4 class="c2 company-name">ThemeLooks</h4></a>
                                                                         <div>
                                                                            <span class="d-inline-block position mr-2">Front-end Web Developer</span>
                                                                            <span class="d-inline-block mr-2">
                                                                               <span class="month">October</span> 
                                                                               <span class="day">1</span>, 
                                                                               <span class="year">2019</span> 
                                                                               to present
                                                                            </span>
                                                                            <span class="d-inline-block city">Dhaka, Bangladesh</span>
                                                                         </div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                             <!-- Work Update From -->
                                                             <div class="work-update-form mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="company3" class="col-sm-3 col-lg-2 col-form-label">Company</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="company" id="company3" placeholder="Where have you worked?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position3" class="col-sm-3 col-lg-2 col-form-label">Position</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="position" id="position3" placeholder="What is your job title?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="cityTown3" class="col-sm-3 col-lg-2 col-form-label">City/Town</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="city" id="cityTown3">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description3" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description3" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex align-items-center position-relative mb-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                            
                                                                            <span class="d-inline-block ml-4">I currently work here</span>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect3">
                                                                                  <option selected="">Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option>20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month3">
                                                                                  <option selected="">Month</option>
                                                                                  <option>January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year3">
                                                                                  <option selected="">Year</option>
                                                                                  <option>2019</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option>1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to present</span>
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                </form>
                                                             </div>
                                                             <!-- End Work Update From -->
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/freelancer.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="#"><h4 class="c2 company-name">Freelancer.com</h4></a>
                                                                         <div>
                                                                            <span class="d-inline-block position mr-0">Front-end Web Developer</span>
                                                                            <span class="d-inline-block mr-2">
                                                                               <span class="month">November</span> 
                                                                               <span class="day">27</span>, 
                                                                               <span class="year">2016</span> 
                                                                               to present
                                                                            </span>
                                                                            <span class="d-inline-block city">Dhaka, Bangladesh</span>
                                                                         </div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                            
                                                          </li>
                                                       </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-education" role="tabpanel">
                                                       <h4 class="mb-3">Education</h4>
 
                                                       <ul class="p_education-list list-unstyled">
                                                          <li>
                                                             <div class="add-workplace">
                                                                <div class="iconwrap mr-3">
                                                                   <i class="icofont-plus"></i>
                                                                </div>
                                                                <h4 class="c2 regular">Add a College</h4>
                                                             </div>
 
                                                             <!-- Add College From -->
                                                             <div class="add-work-form college mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="school" class="col-sm-3 col-lg-2 col-form-label">School</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="school" id="school" placeholder="What school did you attend?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect6">
                                                                                  <option selected="">Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option>20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month">
                                                                                  <option selected="">Month</option>
                                                                                  <option>January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year5">
                                                                                  <option selected="">Year</option>
                                                                                  <option>2019</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option>1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
 
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to</span>
                                                                            </div>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect7">
                                                                               <option selected="">Day</option>
                                                                               <option>1</option>
                                                                               <option>2</option>
                                                                               <option>3</option>
                                                                               <option>4</option>
                                                                               <option>5</option>
                                                                               <option>6</option>
                                                                               <option>7</option>
                                                                               <option>8</option>
                                                                               <option>9</option>
                                                                               <option>10</option>
                                                                               <option>11</option>
                                                                               <option>12</option>
                                                                               <option>13</option>
                                                                               <option>14</option>
                                                                               <option>15</option>
                                                                               <option>16</option>
                                                                               <option>17</option>
                                                                               <option>18</option>
                                                                               <option>19</option>
                                                                               <option>20</option>
                                                                               <option>21</option>
                                                                               <option>22</option>
                                                                               <option>23</option>
                                                                               <option>24</option>
                                                                               <option>25</option>
                                                                               <option>26</option>
                                                                               <option>27</option>
                                                                               <option>28</option>
                                                                               <option>29</option>
                                                                               <option>30</option>
                                                                               </select>
                                                                         </div>
                                                                         <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month5">
                                                                                  <option selected="">Month</option>
                                                                                  <option>January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                         </div>
                                                                         <div class="form-group">
                                                                               <select class="form-control" name="year" id="year6">
                                                                               <option selected="">Year</option>
                                                                               <option>2019</option>
                                                                               <option>2018</option>
                                                                               <option>2017</option>
                                                                               <option>2016</option>
                                                                               <option>2015</option>
                                                                               <option>2014</option>
                                                                               <option>2013</option>
                                                                               <option>2012</option>
                                                                               <option>2011</option>
                                                                               <option>2010</option>
                                                                               <option>2009</option>
                                                                               <option>2008</option>
                                                                               <option>2007</option>
                                                                               <option>2006</option>
                                                                               <option>2005</option>
                                                                               <option>2004</option>
                                                                               <option>2003</option>
                                                                               <option>2002</option>
                                                                               <option>2001</option>
                                                                               <option>2000</option>
                                                                               <option>1999</option>
                                                                               <option>1998</option>
                                                                               <option>1997</option>
                                                                               <option>1996</option>
                                                                               <option>1995</option>
                                                                               <option>1994</option>
                                                                               <option>1993</option>
                                                                               <option>1992</option>
                                                                               <option>1991</option>
                                                                               <option>1990</option>
                                                                               <option>1989</option>
                                                                               <option>1988</option>
                                                                               <option>1987</option>
                                                                               <option>1986</option>
                                                                               <option>1985</option>
                                                                               <option>1984</option>
                                                                               <option>1983</option>
                                                                               <option>1982</option>
                                                                               <option>1981</option>
                                                                               <option>1980</option>
                                                                               </select>
                                                                         </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-4 col-sm-3 col-lg-2 col-form-label">Graduated</label>
                                                                      <div class="col-8 col-sm-9 com-lg-10">
                                                                         <div class="mt-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description6" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description6" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position" class="col-sm-3 col-lg-2 col-form-label">Connection</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control mb-3" name="connection" id="connection">
 
                                                                         <input type="text" class="form-control mb-3" name="connection" id="connection2">
 
                                                                         <input type="text" class="form-control" name="connection" id="connection3">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Attended for</label>
                                                                      <div class="col-sm-9 com-lg-10">
 
                                                                         <div class="radio d-flex align-items-center mb-3">
                                                                            <!-- Custom Radio -->
                                                                            <div class="custom-radio mr-2">
                                                                               <input type="radio" name="radio" id="radio4" checked>
                                                                               <label for="radio4"></label>
                                                                            </div>
                                                                            <!-- End Custom Radio -->
                            
                                                                            <label for="radio4">College</label>
                                                                         </div>
 
                                                                         <div class="radio d-flex align-items-center mb-3">
                                                                            <!-- Custom Radio -->
                                                                            <div class="custom-radio mr-2">
                                                                               <input type="radio" name="radio" id="radio5">
                                                                               <label for="radio5"></label>
                                                                            </div>
                                                                            <!-- End Custom Radio -->
                            
                                                                            <label for="radio5">Graduate School</label>
                                                                         </div>
 
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
 
 
                                                                </form>
                                                             </div>
                                                             <!-- End Add College From -->
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/fci.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="#">
                                                                            <h4 class="c2 company-name">FENI COMPUTER INSTITUTE (FCI)</h4>
                                                                         </a>
                                                                         <div class="font-12">Feni, Chittagong, Bangladesh</div>
                                                                         <div class="font-12 desc">SEIP - Skill for employment investment program.</div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                             
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/edu.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="https://www.themelooks.com"><h4 class="c2 company-name">Feni Government College</h4></a>
                                                                         <div class="font-12">Feni, Chittagong, Bangladesh</div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                             <!-- Work Update From -->
                                                             <div class="work-update-form mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="company333" class="col-sm-3 col-lg-2 col-form-label">Company</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="company" id="company333" placeholder="Where have you worked?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position333" class="col-sm-3 col-lg-2 col-form-label">Position</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="position" id="position333" placeholder="What is your job title?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="cityTown333" class="col-sm-3 col-lg-2 col-form-label">City/Town</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="city" id="cityTown333">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description33" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description33" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex align-items-center position-relative mb-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                            
                                                                            <span class="d-inline-block ml-4">I currently work here</span>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect8">
                                                                                  <option>Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option selected="">20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month6">
                                                                                  <option>Month</option>
                                                                                  <option selected="">January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year7">
                                                                                  <option>Year</option>
                                                                                  <option>2019</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option selected="">1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to present</span>
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                </form>
                                                             </div>
                                                             <!-- End Work Update From -->
                                                          </li>
                                                          <li>
                                                             <div class="work-content">
                                                                <div class="d-flex">
                                                                      <div class="img mr-3">
                                                                         <img src="<?php echo $url; ?>assets/img/png-icon/edu.png" alt="">
                                                                      </div>
                                                                      <div class="content">
                                                                         <a href="#"><h4 class="c2 company-name">Feni Government Pilot High School</h4></a>
                                                                         <div class="font-12">Feni, Chittagong, Bangladesh</div>
                                                                      </div>
                                                                </div>
 
                                                                <!-- Dropdown Button -->
                                                                <div class="dropdown-button">
                                                                   <a href="#" class="text_color" data-toggle="dropdown">
                                                                      Option
                                                                      <i class="icofont-caret-down mt-1 c4"></i>
                                                                   </a>
                                                                   <div class="dropdown-menu dropdown-menu-right">
                                                                      <a href="#" class="edit">Edit</a>
                                                                      <a href="#" class="delete">Delete</a>
                                                                   </div>
                                                                </div>
                                                                <!-- End Dropdown Button -->
                                                             </div>
 
                                                             <!-- Work Update From -->
                                                             <div class="work-update-form mb-3">
                                                                <form action="#">
 
                                                                   <!-- Close Button -->
                                                                   <div class="add-work-form-close work-form-close">
                                                                      <i class="icofont-close c4"></i> Cancel
                                                                   </div>
                                                                   <!-- End Close Button -->
 
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="company5" class="col-sm-3 col-lg-2 col-form-label">Company</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="company" id="company5" placeholder="Where have you worked?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="position44" class="col-sm-3 col-lg-2 col-form-label">Position</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="position" id="position44" placeholder="What is your job title?">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="cityTown44" class="col-sm-3 col-lg-2 col-form-label">City/Town</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <input type="text" class="form-control" name="city" id="cityTown44">
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label for="description44" class="col-sm-3 col-lg-2 col-form-label">Description</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <textarea id="description44" name="description" class="theme-input-style style--three"></textarea>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
                                                                   
                                                                   <!-- Form Group -->
                                                                   <div class="form-group row">
                                                                      <label class="col-sm-3 col-lg-2 col-form-label">Time Period</label>
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex align-items-center position-relative mb-2">
                                                                            <!-- Custom Checkbox -->
                                                                            <label class="custom-checkbox">
                                                                               <input type="checkbox" checked>
                                                                               <span class="checkmark"></span>
                                                                            </label>
                                                                            <!-- End Custom Checkbox -->
                                                                            
                                                                            <span class="d-inline-block ml-4">I currently work here</span>
                                                                         </div>
 
                                                                         <div class="d-flex align-items-center">
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="day" id="exampleFormControlSelect44">
                                                                                  <option selected="">Day</option>
                                                                                  <option>1</option>
                                                                                  <option>2</option>
                                                                                  <option>3</option>
                                                                                  <option>4</option>
                                                                                  <option>5</option>
                                                                                  <option>6</option>
                                                                                  <option>7</option>
                                                                                  <option>8</option>
                                                                                  <option>9</option>
                                                                                  <option>10</option>
                                                                                  <option>11</option>
                                                                                  <option>12</option>
                                                                                  <option>13</option>
                                                                                  <option>14</option>
                                                                                  <option>15</option>
                                                                                  <option>16</option>
                                                                                  <option>17</option>
                                                                                  <option>18</option>
                                                                                  <option>19</option>
                                                                                  <option>20</option>
                                                                                  <option>21</option>
                                                                                  <option>22</option>
                                                                                  <option>23</option>
                                                                                  <option>24</option>
                                                                                  <option>25</option>
                                                                                  <option>26</option>
                                                                                  <option>27</option>
                                                                                  <option>28</option>
                                                                                  <option>29</option>
                                                                                  <option>30</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                               <select class="form-control" name="month" id="month444">
                                                                                  <option selected="">Month</option>
                                                                                  <option>January</option>
                                                                                  <option>February</option>
                                                                                  <option>March</option>
                                                                                  <option>April</option>
                                                                                  <option>May</option>
                                                                                  <option>June</option>
                                                                                  <option>July</option>
                                                                                  <option>August</option>
                                                                                  <option>September</option>
                                                                                  <option>October</option>
                                                                                  <option>November</option>
                                                                                  <option>December</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                               <select class="form-control" name="year" id="year444">
                                                                                  <option selected="">Year</option>
                                                                                  <option>2018</option>
                                                                                  <option>2017</option>
                                                                                  <option>2016</option>
                                                                                  <option>2015</option>
                                                                                  <option>2014</option>
                                                                                  <option>2013</option>
                                                                                  <option>2012</option>
                                                                                  <option>2011</option>
                                                                                  <option>2010</option>
                                                                                  <option>2009</option>
                                                                                  <option>2008</option>
                                                                                  <option>2007</option>
                                                                                  <option>2006</option>
                                                                                  <option>2005</option>
                                                                                  <option>2004</option>
                                                                                  <option>2003</option>
                                                                                  <option>2002</option>
                                                                                  <option>2001</option>
                                                                                  <option>2000</option>
                                                                                  <option>1999</option>
                                                                                  <option>1998</option>
                                                                                  <option>1997</option>
                                                                                  <option>1996</option>
                                                                                  <option>1995</option>
                                                                                  <option>1994</option>
                                                                                  <option>1993</option>
                                                                                  <option>1992</option>
                                                                                  <option>1991</option>
                                                                                  <option>1990</option>
                                                                                  <option>1989</option>
                                                                                  <option>1988</option>
                                                                                  <option>1987</option>
                                                                                  <option>1986</option>
                                                                                  <option>1985</option>
                                                                                  <option>1984</option>
                                                                                  <option>1983</option>
                                                                                  <option>1982</option>
                                                                                  <option>1981</option>
                                                                                  <option>1980</option>
                                                                               </select>
                                                                            </div>
                                                                            <div class="form-group ml-2">
                                                                               <span class="d-inline-block ml-2 black">to present</span>
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                   </div>
                                                                   <!-- End Form Group -->
 
                                                                   <div class="row justify-content-end">
                                                                      <div class="col-sm-9 com-lg-10">
                                                                         <div class="d-flex">
                                                                            <button type="submit" class="change-card-btn c2">Save Changes</button>
                                                                            <button type="reset" class="change-card-btn work-form-close ml-3">Cancel</button>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                </form>
                                                             </div>
                                                             <!-- End Work Update From -->
                                                          </li>
                                                       </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-basic" role="tabpanel">
                                                       <!-- Personal Info -->
                                                       <div class="personal-info">
                                                          <h4 class="mb-3">Personal Information</h4>
       
                                                          <ul class="info-list list-unstyled">
                                                                <li><span>First Name</span> Abrilay</li>
                                                                <li><span>Last Name</span> Khatun</li>
                                                                <li><span>age</span> 26</li>
                                                                <li><span>Position</span> Front End Developer</li>
                                                                <li><span>Address</span> 228 Park Ave Str. New York, USA</li>
                                                                <li><span>Phone</span> <a href="tel:0021364545">00 2136 4545</a></li>
                                                                <li><span>Phone</span> <a href="mailto:abrilakh@gmail.com">abrilakh@gmail.com</a></li>
                                                          </ul>
                                                       </div>
                                                       <!-- End Personal Info -->
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-skill" role="tabpanel">
                                                       <!-- Skill -->
                                                       <div class="skill">
                                                          <h4 class="mb-3">Skill</h4>
       
                                                          <ul class="skill-list list-unstyled">
                                                                <li>
                                                                   <span>UI Design</span>
                                                                   
                                                                   <div class="process-bar-wrapper style--five">
                                                                      <span class="process-bar" data-process-width="68"></span>
                                                                   </div>
                                                                </li>
                                                                
                                                                <li>
                                                                   <span>UX Design</span>
                                                                   
                                                                   <div class="process-bar-wrapper style--five pink">
                                                                      <span class="process-bar" data-process-width="90"></span>
                                                                   </div>
                                                                </li>
                                                                
                                                                <li>
                                                                   <span>HTML</span>
                                                                   
                                                                   <div class="process-bar-wrapper style--five green">
                                                                      <span class="process-bar" data-process-width="30"></span>
                                                                   </div>
                                                                </li>
                                                                
                                                                <li>
                                                                   <span>CSS</span>
                                                                   
                                                                   <div class="process-bar-wrapper style--five blue">
                                                                      <span class="process-bar" data-process-width="50"></span>
                                                                   </div>
                                                                </li>
                                                                
                                                                <li>
                                                                   <span>Wordpress</span>
                                                                   
                                                                   <div class="process-bar-wrapper style--five c2">
                                                                      <span class="process-bar" data-process-width="52"></span>
                                                                   </div>
                                                                </li>
                                                          </ul>
                                                       </div>
                                                       <!-- End Skill -->
                                                    </div>
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
       </div>

        
      <?php 
        include_once('../inc/footer.php');
        ?>
        