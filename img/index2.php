
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
  <style>
hr {
    border: none;
    border-top: 1px groove #333;
    color: #333;
    overflow: visible;
    text-align: center;
    font-size: 12px;
}

hr:after {
    background: #fff;
    content: 'OR';
    position: relative;
    top: -10px;
}

  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
              <!-- <h4 class="text-center text-small text-strong">LOGIN ACCOUNT</h4> -->
              <h3 class="font-weight-strong text-center"></h3>
              <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                <form autocomplete="off" action="code/residentFormCode.php" method="POST" class="needs-validation" validate>
              <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                  <a  class="btn btn-outline-primary btn-lg btn-block" href="residentForm.php">
                          <i class="ti-file btn-icon-prepend"></i>
                          Click to fill up  Form 
              </a>

                        <br>
                        <br>
                        <hr>
                        <br>
                        <a class="btn btn-block btn-primary " href="login.php" data-toggle="tooltip" data-placement="bottom" title="Click Log in to Proceed">Admin</a> 
                        
                        <div class="my-2 d-flex justify-content-center align-items-center">
                        <a href="index.php" class="auth-link text-black pt-3" style="font-size: 15px;">Go Back</a>
                         </div>
                  </div>
                </div>
              </div>
            </div>
                </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
            </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/custom.js"></script>
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
