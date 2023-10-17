<?php 
include('../database/dbconfig.php');
session_start();

$activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a New User','')";
$query = mysqli_query($conn, $activitylog);

$query = "SELECT * FROM users ORDER BY employeeID DESC LIMIT 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);


$lastid = $row;
    if($lastid == "employeeID")
    {
        $empid = "EMP-";
    }
    else
    {
        
        $rand = "EMP-" . date("y")."-".strtotime(date("His"))."-".date("m");
         
         $empid = $rand;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clearance Automate - Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/Brgy-logo.png" />
  <script src="https://kit.fontawesome.com/89c7bdb9b2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
<link rel="stylesheet" href="../vendors/css/atlantis.css">
<link rel="stylesheet" href="../vendors/css/custom.css">

<style>
    #loading-container{
        position: absolute;
        display: flex;
        height: 100%;
        width: 100%;
        background-color: white;
        z-index: 9999;
    }
    #loading-screen{
        position: absolute;
        left: 48%;
        top: 48%;
        z-index: 9999;
        text-align: center;
    }
</style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="../images/logo.png" alt="logo" style="height: 5rem;width:23rem;">
              </div>
              
              <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong></strong> <?Php echo $_SESSION['status']; ?>
               </div>
              <?php
               unset($_SESSION['status']);
              }
              ?>
              <form class="pt-3" action="../code/registercode.php"  method="POST"  >
              
                       
              <div class="form-group">
              <label for="">Employee ID</label>
                    <input type="text" class="form-control form-control-lg" name="employeeID" id="exampleInputUsername1" required >
                  </div>
<div class="form-group">
              <label for="">First Name</label>
                    <input type="text" class="form-control form-control-lg" name="first_name" id="exampleInputUsername1" required >
                  </div>
                  <div class="form-group">
              <label for="">Middle Name</label>
                    <input type="text" class="form-control form-control-lg" name="middle_name" id="exampleInputUsername1" required >
                  </div>
                  <div class="form-group">
              <label for="">Last Name</label>
                    <input type="text" class="form-control form-control-lg" name="last_name" id="exampleInputUsername1" required >
                  </div>
                  <div class="form-group">
              <label for="">Suffix</label>
              <select name="u_suffix" class="form-control" >
                                <option value="">Choose...</option>
                                <option value="SR">SR</option>
                                <option value="JR">JR</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                              </select>
                  </div><div class="form-group">
              <label for="">Birthdate</label>
                    <input type="date" class="form-control form-control-lg" name="u_birthday" id="exampleInputUsername1" required >
                  </div><div class="form-group">
              <label for="">Gender</label>
                          <select name="gender" class="form-control form-control-lg"required>
                          <option selected>Choose...</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Others">Others</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Username"required>
                  </div>
                <div class="form-group">
                <label for="official"></label> 
                  <select class="form-control form-control-lg" name="access" id="exampleFormControlSelect2" required>
                  <option  value="admin">Admin</option>
                  <option value="enconder">Encoder</option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg"name="password" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"name="cpassword" id="exampleInputPassword1" placeholder="Confirm Password" required>
                  </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">Create</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  <a href="user_list.php" class="text-primary">Back</a>
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <script src="../js/custom.js"></script>
  <script src="../js/customFunction.js"></script>
  
  <script src="../js/core/jquery.3.2.1.min.js"></script>

<script src="../js/core/bootstrap.min.js"></script>




<script  src="../webcamjs/webcam.min.js"></script>

<script src="../js/customFunction.js"></script>

<script>
    var $window = $(window);
    $window.on("load",function (){
        // Preloader
        $(".preloader").fadeOut(500);
    });
</script>

    
  

  
  <!-- endinject -->
</body>

</html>
