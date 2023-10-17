<?php 
session_start();


?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clearance Automate - Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Brgy-logo.png" />
  <script src="https://kit.fontawesome.com/89c7bdb9b2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
              <!-- <h4 class="text-center text-small text-strong">LOGIN ACCOUNT</h4> -->
              <h3 class="font-weight-strong text-center">ACCOUNT LOGIN</h3>
              <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
               
              <form class="pt-3" autocomplete="off" action="code/logincode.php" method="POST" class="needs-validation" validate>                
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-user"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Username" autocomplete="off" required>
                  </div>
                </div>                
               
                 <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" name="password"id="exampleInputPassword1" placeholder="Password"  autocomplete="off" required>
                    <div class="input-group-append">
                      <span class="input-group-text bg-primary" onclick="myFunction()"> <a href="#"><i data-toggle="tooltip" data-placement="bottom" title="See Password" class="fa fa-eye text-white"></i></a> </span>
                      
                    </div>
                  </div>
                </div>                 

                <div class=" my-2 d-flex justify-content-around  mb-2 mr-sm-2 align-items-center">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.html">SIGN IN</a> -->
                  <div class="my-2 d-flex"><a data-toggle="tooltip" data-placement="bottom" title="Go back" class="btn btn-primary" style="width: 135px;"  href="index2.php" type="button" value="Back" >Back</a></div>
                  <span></span>
                   <button type="submit" class="btn btn-block btn-primary" style="width: 135px;" name="login" onclick="lsRememberMe()" data-toggle="tooltip" data-placement="bottom" title="Click Log in to Proceed">Log In</button>
                  <!-- <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button> -->
                </div>
                <div class="my-2 d-flex justify-content-center align-items-center">
                  <!-- <div  class="form-check">
                              <label class="form-check-label text-muted" for="rememberMe" >
                              <input class="form-check-input" type="checkbox" value="lsRememberMe" id="rememberMe" checked />
                               Remember me </label>
                <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"  name="remember" required>
                     Click me to proceed.
                    </label>
                  </div>
                  </div> -->
<div class="my-2 d-flex justify-content-center align-items-center">
                <a href="forgot.php" class="auth-link text-black" style="font-size: 15px;">Forgot password?</a>
                  </div>
                          </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/custom.js"></script>
  <script>
function myFunction() {
  var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!-- <script>
  const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
</script> -->
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<footer class="footer mt-n5 p-3">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Barangay Loma De Gato Clearance Automate System.</span>
          </div>         
        </footer> 
  <!-- endinject -->
</body>

</html>
