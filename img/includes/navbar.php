<?php
include('header.php');

?>
<?php

$selectUser = "SELECT * FROM  users WHERE ID='".$_SESSION['userID']."'";
$queryUser = mysqli_query($conn,$selectUser);
// $row = mysqli_fetch_assoc($queryUser)
$email = $_SESSION['Email'];
$querys = "SELECT * FROM users WHERE email='$email' ORDER BY ID DESC";
$results = mysqli_query($conn,$querys);
$rowsss = mysqli_fetch_array($results);

?>

<style>

.tooltip{
  
  font-size: large;
  z-index: 100000000; /* Use half of the width (120/2 = 60), to center the tooltip */
}

.sidebar .nav .nav-item:hover {
  background-color:#4B49AC
}

.sidebar .nav .nav-item .nav-link i.menu-icon {
  color:
} 

.sidebar .nav:not(.sub-menu) > .nav-item > .nav-link[aria-expanded="true"] i.menu-icon {color:#ffffff}

</style>

<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
<body>
 
<div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0  fixed-top d-flex flex-row generate" >
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center generate"  data-toggle="tooltip" data-placement="bottom" title="Click This Logo proceed to Dashboard " >
        <a class="navbar-brand brand-logo ml-2 generate" href="index.php"><img src="../images/logo.png" class="mr-2 generate" alt="logo" style="height: 3rem;width:14rem;"/></a>
        <a class="navbar-brand brand-logo-mini generate" href="index.php"><img src="../images/Brgy-logo.png" alt="logo" style="height: 3rem;width:3rem;"/></a>
      </div>
      
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu" data-toggle="tooltip" data-placement="bottom" title="Click to close sidebar"></span>
        </button>       
        <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item">
          </li>
          <li class="nav-item nav-profile dropdown" id="profileDropdown" data-toggle="tooltip" data-placement="left" title="Click to Proceed in Profile">

            <a class="nav-link dropdown-toggle generate"  data-toggle="dropdown" >

            <?php $filename = '../images/faces/'.$rowsss['avatar'];
                                        if (file_exists($filename)) {
                                        ?>
              <img src="<?= '../images/faces/'.$rowsss['avatar'] ?>" class="generate" alt="profile"/> 
              <?php }else{ ?>
                                            <img src="<?= $rowsss['avatar'] ?>" alt="..." class="generate" >
                                      <?php
                                        }
                                         ?>
              <?php if($_SESSION['Access']=='admin'){echo 'Admin';}else{ echo 'Encoder';}?>
             |&nbsp;<a><?php echo $_SESSION['Email']?></a>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../page/user.php">
                <i class="ti-user text-primary"></i>
                Profile Account
              </a>      
            </div>
          </li>
          <li class="nav-item">
              <button type="button" class="btn btn-sm btn-outline-danger btn-icon-text generate" data-toggle="modal" data-target="#logoutModal">
                <i class="ti-power-off btn-icon-prepend"></i>                                                    
                Logout
              </button>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"   >
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa fa-bolt menu-icon mr-3"></i>
              <span class="menu-title generate" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Dashboard">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">
              <i class="fa-user fa-solid fa-info menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Profile">Profile</span>
            </a>           
          </li>  

          <li class="nav-item">
            <a class="nav-link" href="resident_list.php">
              <i class="fa fa-person-walking menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right"  title="Click to Proceed in Resident List">Resident List</span>
            </a>           
          </li>   



          <li class="nav-item pb-1">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-stamp menu-icon mr-3"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Services">Services</span>
              <i class="menu-arrow"></i>
            </a>
           </li>
           
            <div class="collapse" id="collapseExample">
           
            <li class="nav-item">
            <a class="nav-link active" href="clerance_list.php">
              <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
              <span class="menu-title"  data-toggle="tooltip" data-placement="right" title="Click to Proceed in Brangay Clearance">Barangay Clearance</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="certificate_list.php">
              <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
              <span class="menu-title"  data-toggle="tooltip" data-placement="right" title="Click to Proceed in Brangay Certificate">Barangay Certificate</span>
            </a> 
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="indigency_list.php">
              <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
              <span class="menu-title"   data-toggle="tooltip" data-placement="right" title="Click to Proceed in Indigency Certificate">Indigency Certificate</span>
            </a> 
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="business_list.php" >
              <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
              <span class="menu-title"  data-toggle="tooltip" data-placement="right" title="Click to Proceed in Business Clearance">Business Clearance</span>
            </a>         
            </li>
            <li class="nav-item">
          <a class="nav-link active" href="create_service.php">
              <i class="fa-regular fa-newspaper menu-icon mr-4" ></i>
              <span class="menu-title"  data-toggle="tooltip" data-placement="right" title="Click to Proceed in Create Service">Create Service</span>
            </a>  
            </li>
            </div>
          


          <li class="nav-item">
            <a class="nav-link" href="blotter_list.php">
              <i class="fa fa-bug menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Blotter">Blotter</span>
            </a>           
          </li>  
          <?php if($_SESSION['Access']=='admin'){ ?>

          <li class="nav-item">
            <a class="nav-link" href="officials.php">
              <i class="fa fa-user-gear menu-icon mr-3"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Officials">Officials</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="position.php">
              <i class="fa-briefcase fa-solid fa-info menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Position">Position</span>
            </a>           
          </li>  

          <li class="nav-item">
            <a class="nav-link" href="user_list.php">
              <i class="fa-users fa-solid fa-info menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip"data-placement="right" title="Click to Proceed in Users">Users</span>
            </a>           
          </li>  

          <li class="nav-item">
            <a class="nav-link" href="user_logs.php">
              <i class="fa-list fa-solid fa-info menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in User In/Out Logs">User In/Out Logs</span>
            </a>           
          </li>  

          <li class="nav-item">
            <a class="nav-link" href="activitylog.php">
              <i class="fa fa-archive menu-icon mr-4"></i>
              <span class="menu-title" data-toggle="tooltip" data-placement="right" title="Click to Proceed in Activity Log">Activity Logs</span>
            </a>           
          </li>  



          
         

          

          <?php } ?>

                

          

        
         

      </nav>


       <!-- LOGOUT SESSION-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="../code/logout.php" method="POST">
                        <button type="submit" name="logoutBTN" class="btn btn-primary">Logout</button>
                    </form>
                </div><!-- /modal footer -->
            </div><!-- /modal-content -->
        </div> <!-- /modal-dialog -->
  </div><!-- /LOGOUT SESSION -->
</body>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">
<script src="../js/core/element.js"></script>