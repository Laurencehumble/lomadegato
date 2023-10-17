
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');
$email = $_SESSION['Email'];
$query = "SELECT * FROM users WHERE email='$email' ORDER BY ID DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

?>

<style>

.tooltip{
  
  font-size: large;
  z-index: 100000000; /* Use half of the width (120/2 = 60), to center the tooltip */
}

</style>

<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
 <!-- partial --> 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin">
              <div class="row mb-n5">
                        
              </div>
            </div>            
          </div>
          
          <div class="row">           
            <div class="col-md-12 ">
                <div class="card p-4">
                   <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                    <div class="card-body">
                   
                <?php
                // switch($_SESSION['Access']){
                //     case "admin":

                ?>
                    <form method="POST" action="../code/edit_profile.php" enctype="multipart/form-data">
                      <h6 class="heading-small text-muted mb-4">User information</h6>
                      
                        <div class="row">
                          <div class="col-md-6">
                             <input type="hidden" name="size" value="1000000">
                                  <div class="text-center">
                                        <div id="my_camera" style="height: 250;" class="text-center">
                                      <?php if(empty($row['avatar'])): ?>
                                          <img src="../images/faces/faces_user_icon.png" alt="..." class="img img-fluid" id="image-display" width="250" >
                                      <?php else: ?>
                                        <?php $filename = '../images/faces/'.$row['avatar'];
                                        if (file_exists($filename)) {
                                        ?>
                                          <img src="<?= '../images/faces/'.$row['avatar'] ?>" alt="..." class="img img-fluid" width="250" >
                                        <?php }else{ ?>
                                            <img src="<?= $row['avatar'] ?>" alt="..." class="img img-fluid" width="250" >
                                      <?php
                                        }
                                        endif ?>
                                  </div>
                                
                                  <div class="form-group">
                                      <input data-toggle="tooltip" data-placement="bottom" title="Choose Photo" type="file" class="form-control" name="img" accept="image/*">
                                  </div>
                              </div>
                          </div>
                      <div class="col-md-3">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-email">Email address</label>
                                  <input type="email" id="email" name="email" class="form-control form-control-alternative" readonly value="<?php echo $row['email'];?>">
                              </div>
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-first-name">employee ID</label>
                                  <input type="text" id="employeeID" name="employeeID" class="form-control form-control-alternative" readonly value="<?php echo $row['employeeID'];?>">
                              </div>
                              <div class="form-group focused">
                                  <label class="form-control-label" for="input-access">Access</label>
                                  <input type="text" id="access" name="access" class="form-control form-control-alternative" readonly value=" <?php if($_SESSION['Access']=='admin'){echo 'Admin';}else{ echo 'Encoder';}?>">
                              </div>
                          </div>
                          <div class="col-md-3">
                          <div class="form-group">
                                  <label class="form-control-label" for="input-firstname">First Name</label>
                                  <input type="text" id="first_name" name="first_name" class="form-control form-control-alternative" readonly value="<?php echo $row['first_name'];?>">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label" for="input-middlename">Middle Name</label>
                                  <input type="text" id="middle_name" name="middle_name" class="form-control form-control-alternative" readonly value="<?php echo $row['middle_name'];?>">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label" for="input-lastname">Last Name</label>
                                  <input type="text" id="last_name" name="last_name" class="form-control form-control-alternative" readonly value="<?php echo $row['last_name'];?>">
                              </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-suffix">Suffix</label>
                                  <input type="text" id="u_suffix" name="u_suffix" class="form-control form-control-alternative" readonly value="<?php echo $row['u_suffix'];?>">
                              </div>
                              </div>
                              <div class="form-group col-md-4">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-age">Birthdate</label>
                                  <input type="date" id="u_birthday" name="u_birthday" class="form-control form-control-alternative" readonly value="<?php echo $row['u_birthday'];?>">
                              </div>
                              </div>
                              <div class="form-group col-md-4">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-last-gender">Gender</label>
                                  <input type="text" id="gender" name="gender" class="form-control form-control-alternative" readonly value="<?php echo $row['gender'];?>">
                              </div>
                              </div>
                              </div>
                              <div class="form-group" align="center">
                              <button type="submit" class="btn btn-primary" name="user_submit">Submit</button>
                          </div>
                    </div>
                  <input type="hidden" id="ID" name="ID" class="form-control form-control-alternative" value="<?php echo $row['ID'];?>">
            
        </div>
        <!-- <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary" name="user_submit">Submit</button>
        </div> -->
        
        <hr class="my-4">
        
          
       
    </form>
<?php
    // break;
    //     default : echo "<script>window.location.replace('http://localhost/bulacan/pages/samples/error-404.html');</script>";
    // }
?>
             
            
                    </div>
                </div>   
            </div>
          </div>        
        </div>

<!-- =========================================================== -->

<!-- =========================================================== -->
<?php
include('../includes/footer.php');
include('../includes/script.php');
?>

<script  src="webcamjs/webcam.min.js"></script>

<script>
    $(document).ready(function(index){
       
    });
</script>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>