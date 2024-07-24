<?php include_once('inc/head.php');?>

<body>

    <div class="mn-vh-100 d-flex align-items-center">
        <div class="container">
            <!-- Card -->
            <div class="card justify-content-center auth-card">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <h4 class="mb-5 font-20">Welcome To Cims</h4>

                        <form method="post" action="dashboard/">
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="email" class="mb-2 font-14 bold black">Email Address</label>
                                <input type="email" id="email" class="theme-input-style" placeholder="Email Address">
                            </div>
                            <!-- End Form Group -->
                            
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="password" class="mb-2 font-14 bold black">Password</label>
                                <input type="password" id="password" class="theme-input-style" placeholder="********">
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-between mb-20">
                                <div class="d-flex align-items-center">
                                    <!-- Custom Checkbox -->
                                    <label class="custom-checkbox position-relative mr-2">
                                        <input type="checkbox" id="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- End Custom Checkbox -->
                                    
                                    <label for="checkbox" class="font-14">Remember Me</label>
                                </div>

                                <a href="authentication/forget-pass.html" class="font-12 text_color">Forgot Password?</a>
                            </div>
<!-- 
                            <div class="mb-30">
                                <a href="#" class="light-btn mr-3 mb-20">Log In With Facebook</a>
                                <a href="#" class="light-btn style--two mb-20">Log In With Gmail</a>
                            </div> -->

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn long mr-20">Log In</button>
                                <!-- <span class="font-12 d-block"><a href="register.html" class="bold">Sign Up</a>,If you have no account.</span> -->
                            </div>
                        </form>
                    </div>                                    
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer style--two">
       CIMS © 2024 created by <a href="https://www.burion.in/"> Burion</a>
    </footer>
    <!-- End Footer -->

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="<?php echo $url; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $url; ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/script.js"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
</body>

</html>