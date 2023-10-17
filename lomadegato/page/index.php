
<?php

include('../security/security.php');

include('../includes/header.php');

include('../includes/navbar.php');

$check_clearance = $conn->query("SELECT COUNT(residentcertID) as total_clearance, SUM(cost) as total_cost FROM tbl_resident_cert  ")->fetch_assoc();
$check_indigency = $conn->query("SELECT COUNT(indigencyCertID) as total_indigency, SUM(cost) as total_cost FROM tbl_indigency_cert  ")->fetch_assoc(); 
$check_cert = $conn->query("SELECT COUNT(barangayID) as total_cert, SUM(cost) as total_cost FROM tbl_barangay_cert  ")->fetch_assoc(); 
$check_business =$conn->query("SELECT COUNT(clearanceID) as total_clearance, SUM(cost) as total_cost FROM tbl_clearance  ")->fetch_assoc();
$residents = $conn->query("SELECT COUNT(residentID) as total_residents FROM tbl_resident_list  ")->fetch_assoc(); 
 
$total_revenue = floatval($check_clearance['total_cost'])+floatval($check_indigency['total_cost'])+floatval($check_cert['total_cost'])+floatval($check_business['total_cost']);

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
<?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
          <div class="row">
            <div class="col-md-6 grid-margin">
              <div class="row mb-n5">
                        
              </div>
            </div>            
          </div>
          <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_GET['success']; ?>
                </div>
                <?php } ?>
          <div class="row">           
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <!--  Barangay Clearance -->
               
                <div class="col-12 mb-4 mb-xl-0">
                  <h6 class=" mb-3">List of Total Services</h6>
                </div>           
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4"> Barangay Clearance</p>
                      <p class="fs-30 mb-2">
                        <?php  
                          echo $check_clearance['total_clearance'];
                        ?>
                      </p>
                      <?php if($_SESSION['Access']=='admin'){ ?>
                      <a  href="clerance_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="bottom" title="Click to Proceed in Barangay Clearance">View more info</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Indigency Certificate</p>
                      <p class="fs-30 mb-2">
                      <?php  
                          echo $check_indigency['total_indigency'];
                        ?>
                      </p>
                      <?php if($_SESSION['Access']=='admin'){ ?>
                      <a href="indigency_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="bottom" title="Click to Proceed in Indigency Certificate">View more info</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- Business CLearance -->
             
              </div>
              <div class="row">
                <!-- Barangay Certification -->
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Barangay Certification</p>
                      <p class="fs-30 mb-2">
                      <?php  
                          echo $check_cert['total_cert'];
                        ?>
                      </p>
                      <?php if($_SESSION['Access']=='admin'){ ?>
                      <a href="certificate_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="bottom" title="Click to Proceed in Barangay Certification">View more info</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- Business Permit -->
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Blotter</p>
                      <p class="fs-30 mb-2">
                      <?php  $check_blotter = $conn->query("SELECT COUNT(blotterID) as total_blotter FROM tbl_blotter  ")->fetch_assoc(); 
                          echo $check_blotter['total_blotter'];
                        ?>
                      </p>
                      <?php if($_SESSION['Access']=='admin'){ ?>
                      <a href="blotter_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="bottom" title="Click to Proceed in Blotter Report">View more info</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4"> Business Clearance</p>
                      <p class="fs-30 mb-2">
                        <?php  
                          echo $check_business['total_clearance'];
                        
                        ?>
                      </p>
                      <?php if($_SESSION['Access']=='admin'){ ?>
                      <a href="business_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="bottom" title="Click to Proceed in Business Clearance">View more info</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
                       
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
              <div class="col-md-12 mb-5 mt-4 stretch-card">
                  <div class="card data-icon-card-primary mb-n4">
                    <div class="card-people mt-auto" style="
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: center;
    padding: 20px;
">
                      <img src="../images/dashboard/time.png" alt="donations" style="width:20%;flex:1">
                      <div class="d-flex" style="flex:3">
                        
                        
 			<!--Time-->
                    <script type="text/javascript">
                        tday=new Array	("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                        tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
                  
                        function GetClock(){
                        var d=new Date();
                        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
                        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;
                  
                        if(nhour==0){ap=" AM";nhour=12;}
                        else if(nhour<12){ap=" AM";}
                        else if(nhour==12){ap=" PM";}
                        else if(nhour>12){ap=" PM";nhour-=12;}
                  
                        if(nmin<=9) nmin="0"+nmin;
                        if(nsec<=9) nsec="0"+nsec;
                  
                        document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+tday[nday]+", "+nhour+":"+nmin+":"+nsec+ap+"";
                        }
                        window.onload=function(){
                        GetClock();
                        setInterval(GetClock,1000);
                        }
                    </script>  
                      
                      <div class="ml-2" style="width:100%;text-align:center">
                            <a>
                            <p class="fs-30 mb-0 font-weight-normal"id="clockbox" style="font-size:20px;"></p>
                            </a>
                          </div>
                            <!-- <h3><span class="mb-0 font-weight-normal"id="clockbox"></span>
				i class="fa fa-money mr-2"<?php //echo number_format($total_revenue,2); ?></h3> -->
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-12 mb-4">
                  <div class="card tale-bg">
                    <div class="card-people mt-auto">
                      <a> <img src="../images/dashboard/missed2.svg" alt="residents" style="max-height: 18.1rem;"></a>
                      <div class="weather-info">
                        <div class="d-flex">
                          <div>
                            <h2 class="mb-0 font-weight-normal"><i class="icon-head mr-2"></i><?php  
                          echo $residents['total_residents'];
                        ?></h2>
                        <br>
                        <h4 class="location font-weight-normal">Residents Registered</h4>
                        <?php if($_SESSION['Access']=='admin'){ ?>
                            <a href="resident_list.php" class="btn btn-light btn-sm mt-2" data-toggle="tooltip" data-placement="top" title="Click to Proceed in Resident List">View more info</a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- <div class="col-md-4 mt-5 mb-4">
                  <button type="button" class="btn btn-outline-primary btn-block btn-icon-text mt-5">
                  <a href="addResident.php">  Add Resident </a>
                  </button>
                  <button type="button" class="btn btn-link btn-block btn-icon-text">
                    <a href="resident_list.php"> View Resident List </a>
                  </button>
                </div> -->
              </div>
             
              
              
            </div>
          </div>         
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


<?php
include('../includes/footer.php');
include('../includes/script.php');
?>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>