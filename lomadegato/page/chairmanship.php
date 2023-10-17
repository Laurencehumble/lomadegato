<?php

include('../security/security.php');
include('../includes/header.php');
// include('../includes/navbar.php');


?>
<?php
$query = "SELECT * FROM tbl_chairmanship";
$result = $conn->query($query);

$chair = array();
while($row = $result->fetch_assoc()){
	$chair[] = $row; 
}
?>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
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
    button{
    margin-left: 200%;
    margin-top: 50%;
    width: 300%;
    height: 50%;
}
  </style>
</head>

<center>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="card mt-2">
						
                        
                        <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_GET['success']; ?>
                </div>
                <?php } ?>

                <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php unset($_SESSION['message']); ?>
                            <?php endif ?>

              <div class="brand-logo">
              <img src="../images/logo.png" alt="logo" style="height: 5rem;width:23rem;">
              </div>
              <div class="form-group mb-2">
   
   <div class="card">
     <div class="card-header">
       <div class="card-head-row">
         <div class="card-title">Chairmanship</div>
         <div class="card-tools">
         <?php if($_SESSION['Access']=='admin'):?>
           <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
             <i class="fa fa-plus"></i>
             Chairmanship
           </a>
            <?php endif ?>
         </div>
       </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Title</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
             <?php if(!empty($chair)): ?>
               <?php $no=1; foreach($chair as $row): ?>
               <tr>
                 <td><?= $no ?></td>
                 <td><?= $row['title'] ?></td>
                 <td>
                   <div class="form-button-action">
                   <?php if($_SESSION['Access']=='admin'):?>					
                     <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" 
                       title="Edit Title" onclick="editChair(this)" data-title="<?= $row['title'] ?>" data-id="<?= $row['id'] ?>">
                       <i class="fa fa-edit"></i>
                     </a>
                     <a type="button" data-toggle="tooltip" href="../code/remove_chair.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this title?');" 
                       class="btn btn-link btn-danger" data-original-title="Remove">
                       <i class="fa fa-times"></i>
                     </a>
                      <?php endif ?>
                   </div>
                 </td>
               </tr>
               <?php $no++; endforeach ?>
             <?php else: ?>
               <tr>
                 <td colspan="3" class="text-center">No Available Data</td>
               </tr>
             <?php endif ?>
           </tbody>
           <tfoot>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Title</th>
               <th scope="col">Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Create Chairmanship</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="../code/save_chairmanship.php" >
                     <div class="form-group">
                         <label>Chairmanship</label>
                         <input type="text" class="form-control" placeholder="Enter Chairmanship" name="chair" required>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Create</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="../code/edit_chairmanship.php" >
                     <div class="form-group">
                         <label for="position">Chairmanship</label>
                         <input type="text" class="form-control" id="chair" placeholder="Chairmanship" name="chair" required>
                     </div>
                 
             </div>
             <div class="modal-footer">
                 <input type="hidden" id="chair_id" name="id">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Update</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 </div>
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
        <!-- partial:partials/_footer.html -->


<!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
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
</center>
<br>
  <?php include('../includes/footer.php'); ?>