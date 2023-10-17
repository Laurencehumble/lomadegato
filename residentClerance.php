<?php 

include('../includes/header.php');
include('database/dbconfig.php');
session_start();


global $conn;

$query = "SELECT CONCAT(rl.firstName,' ',rl.middleName,' ',rl.lastName,' ',rl.suffixName) AS resident_name,
rl.gender,
ic.date,
ic.barangayPurpose AS purpose,
ic.cost,
ic.id
FROM tbl_barangay_cert ic, tbl_resident_list rl
WHERE rl.input_resident_id = ic.residentID
GROUP BY ic.id";
$result = $conn->query($query);

$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}

global $conn;

$query = "SELECT 
CONCAT(rl.firstName,' ',rl.middleName,' ',rl.lastName,' ',rl.suffixName) AS resident_name,
rl.gender,
ic.date,
ic.indigencyPurpose AS purpose,
ic.cost,
ic.id
FROM tbl_indigency_cert ic, tbl_resident_list rl
WHERE rl.input_resident_id = ic.residentID
GROUP BY ic.id";
$result = $conn->query($query);

$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}

$query = "SELECT CONCAT(rl.firstName,' ',rl.middleName,' ',rl.lastName,' ',rl.suffixName) AS resident_name,
rl.gender,
ic.date,
ic.employeeID,
ic.business_name,
ic.address,
ic.type_business,
ic.cost,
ic.id
FROM tbl_clearance ic, tbl_resident_list rl
GROUP BY ic.id";
$result = $conn->query($query);

$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}

global $conn;

$query = "SELECT 
CONCAT(rl.firstName,' ',rl.middleName,' ',rl.lastName,' ',rl.suffixName) AS resident_name,
rl.gender,
ic.date,
ic.title AS title,
ic.add_details,
ic.cost,
ic.id
FROM tbl_create_service ic, tbl_resident_list rl
WHERE rl.input_resident_id = ic.residentID
GROUP BY ic.id";
$result = $conn->query($query);

$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clearance Automate - Resident Clearance</title>
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
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
              <!-- <h4 class="text-center text-small text-strong">LOGIN ACCOUNT</h4> -->
              <h3 class="font-weight-strong text-center"></h3>
              <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='success' ? 'bg-success text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                <form method="POST" action="code/residentAddClerance.php" id="add-clearance-form">
              <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                  <a  class="btn btn-outline-primary btn-lg btn-block" href="#add" data-toggle="modal">
                  <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
                          Barangay Clearance
              </a>
              <a  class="btn btn-outline-primary btn-lg btn-block" href="#add2" data-toggle="modal">
                  <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
                          Barangay Certificate
              </a>
              <a  class="btn btn-outline-primary btn-lg btn-block" href="#add3" data-toggle="modal">
                  <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
                          Indigency Certificate
              </a>
              <a  class="btn btn-outline-primary btn-lg btn-block" href="#add4" data-toggle="modal">
                  <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
                          Business Certificate
              </a>
              <a  class="btn btn-outline-primary btn-lg btn-block" href="#add5" data-toggle="modal">
                  <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
                          Create Service
              </a>

                <a class="btn btn-block btn-primary " href="login.php" data-toggle="tooltip" data-placement="bottom" title="Click Log in to Proceed">Admin</a>
                <a class="btn btn-block btn-primary " href="index.php" data-toggle="tooltip" data-placement="bottom" title="Go Back">Go Back</a> 
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
  <!-- =========================================================== -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Resident Clearance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="code/residentAddClerance.php" id="add-clearance-form">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                <div class="form-group">
                        <label>Purpose</label>
                        <select class="form-control" required name="purpose">
                            <option value="">Select Purpose</option>
                            <?php 
                            $result=mysqli_query($conn, "SELECT * FROM `tbl_resident_purpose`");
                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option value='$row[residentPurposeDesc]'>".strtoupper($row['residentPurposeDesc'])."</option>";
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input class="form-control" name="cost" required type="number" value="50.00" step="any"/>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-clearance-form" name="add-clearance">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->
 <!-- =========================================================== -->
 <div class="modal fade" id="add2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Brgy Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="code/residentAddCertificate.php" id="add-certificate-form">
                <input type="hidden" name="resident" value="<?php echo $_GET['id']?>">
                    <div class="form-group">
                        <label>Purpose</label>
                        <select class="form-control" required name="purpose">
                            <option value="">Select Purpose</option>
                            <?php 
                            $result=mysqli_query($conn, "SELECT * FROM `tbl_barangay_purpose`");
                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option value='$row[barangayPurpDesc]'>".strtoupper($row['barangayPurpDesc'])."</option>";
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input class="form-control" name="cost" required type="number" value="75.00" step="any"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-certificate-form" name="add-certificate">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->
<!-- =========================================================== -->
<div class="modal fade" id="add3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Indigency Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="code/residentIndigency.php" id="add-indigency-form">
                    <input type="hidden" name="resident" value="<?php echo $_GET['id']?>">
                    <!-- <div class="form-group">
                        <label>Resident</label>
                        <select class="form-control" required name="resident">
                            <option value="">Select Resident</option>
                            <?php 
                            // $result=mysqli_query($conn, "SELECT * FROM `tbl_resident_list`");
                            // while($row=mysqli_fetch_array($result))
                            // {
                            //     $first = strtoupper($row['firstName']);
                            //     $last = strtoupper($row['lastName']);
                            //     $selectQuery = $conn->query("SELECT * FROM tbl_blotter WHERE respondent LIKE '$first%$last%' AND `status`='Active'")->fetch_assoc();
                            //     $mode = '';
                            //     $test = '';
                            //     if($selectQuery){
                            //         $mode = 'disabled';
                            //         $test ='<b class="text-danger" style="color:red !important;">[With Active Case]</b>';
                            //     }
                            //     echo "<option value='$row[id]' $mode>".strtoupper($row['firstName']).' '.strtoupper($row['middleName']).' '.strtoupper($row['lastName']).' '.strtoupper($row['suffixName'])." $test</option>";
                                
                            // }
                            ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Purpose</label>
                        <select class="form-control" required name="purpose">
                            <option value="">Select Purpose</option>
                            <?php 

                            $result=mysqli_query($conn, "SELECT * FROM `tbl_indigency_purpose`");
                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option value='$row[indigencyPurpDesc]'>".strtoupper($row['indigencyPurpDesc'])."</option>";
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input class="form-control" name="cost" required type="number" value="75.00" step="any"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-indigency-form" name="add-indigency">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->
<!-- =========================================================== -->
<div class="modal fade" id="add4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Business Clearance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="residentAddBusiness.php" id="add-business-form">
                <input type="hidden" name="resident" value="<?php echo $_GET['id']?>">
                    <div class="form-group">
                        <label>Business Name</label>
                        <input class="form-control" name="business-name" required maxlength="255"/>
                    </div>
                    <div class="form-group">
                        <label>Type of Business</label>
                        <input class="form-control" name="business-type" required maxlength="100"/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" required name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input class="form-control" name="cost" required type="number" value="500.00" step="any"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-business-form" name="add-business">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->
<!-- =========================================================== -->
<div class="modal fade" id="add5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="code/residentAddService.php" id="add-service-form">
                <input type="hidden" name="resident" value="<?php echo $_GET['id']?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" required maxlength="255"/>
                    </div>
                    <div class="form-group">
                        <label>Add Details</label>
                        <textarea class="form-control" rows="3" required name="add_details"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input class="form-control" name="cost" required type="number" value="500.00" step="any"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-service-form" name="add-service">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->

<?php
include('includes/footer.php');
include('includes/script.php');
?>
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
  <!-- endinject -->
</body>

</html>
