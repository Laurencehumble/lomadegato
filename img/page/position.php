
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');

$query = "SELECT * FROM tbl_position ORDER BY `order`";
$result = $conn->query($query);

$position = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}

?>
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
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Barangay Positions</div>
                            <div class="card-tools">
                            <?php if($_SESSION['Access']=='admin'):?>
                                <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
                                <span data-toggle="tooltip" data-placement="top" title="Click to Add Position">
                                    <i class="fa fa-plus"></i>
                                    Position
                                </a>	
                            </span>	
                                    
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php if(isset($_SESSION['message'])): 
                        $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
                        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Positions','')";
                        $query = mysqli_query($conn, $activitylog);
                        ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($position)): ?>
                                                    <?php $no=1; foreach($position as $row): ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $row['position'] ?></td>
                                                        <td><?= $row['order'] ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                            <?php if($_SESSION['Access']=='admin'):?>
                                                                <span data-toggle="tooltip" data-placement="top" title="Edit Position">	
                                                                <a type="button" href="#edit" data-toggle="modal" class="btn btn-primary"
                                                                    onclick="editPos(this)" data-pos="<?= $row['position'] ?>" data-order="<?= $row['order'] ?>" data-id="<?= $row['id'] ?>">
                                                                 <i class="fa fa-edit text-white"></i> 
				                                                    </a></span>
                                                                <span data-toggle="tooltip" data-placement="top" title="Click to Delete">
                                                                <a type="button" data-toggle="tooltip" href="../code/remove_position.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this position?');" class="btn btn-danger">
                                                                    <i class="fa fa-times text-white"></i>
                                                                </a>
                                                                </span>
                                                                    <?php endif ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Available Data</td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Order</th>
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

<!-- =========================================================== -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../code/save_position.php" >
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" placeholder="Enter Position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label >Order</label>
                        <input type="number" class="form-control" placeholder="Enter Order" min="1" step="1" name="order" required>
                        <small class="form-text text-muted">Example: Captain is for 1, Councilor 1 is for 2 and so on.</small>
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
                <form method="POST" action="../code/edit_position.php" >
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" placeholder="Position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" placeholder="Order" min="1" step="1" name="order" required>
                        <small class="form-text text-muted">Example: Captain is for 1, Councilor 1 is for 2 and so on.</small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="pos_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- =========================================================== -->
<?php
include('../includes/footer.php');
include('../includes/script.php');
?>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
    $(document).ready(function(index){
       
    });
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>