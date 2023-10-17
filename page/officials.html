
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');

$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position WHERE `status`='Active' ORDER BY tbl_position.order ASC ";
$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position ORDER BY tbl_position.order ASC, `status` ASC ";
$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position WHERE `status`='Active' ORDER BY tbl_position.order ASC ";
$res_o = $conn->query($off_q);
$official = array();
while($row = $res_o->fetch_assoc()){
$official[] = $row; 

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
                            <div class="card-title">Current Barangay Officials</div>
                                <?php if(isset($_SESSION['userID'])):?>
                                
                                <div class="card-tools">
                                <?php if($_SESSION['Access']=='admin'):?>                 
                                    
                                    <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
                                    <span data-toggle="tooltip" data-placement="top" title="Click to Add Official">
                                        <i class="fa fa-plus"></i>
                                        Official        
                                    </a>
                                </span>
                                        <?php endif ?>
                                </div>
                            <?php endif?>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                    

                    </div>
                <?php } ; ?>

                <?php if(isset($_SESSION['message'])): 
                    $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
                    VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Officials','')";
                    $query = mysqli_query($conn, $activitylog); ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                    <div class="table-responsive">
										<table class="table table-striped" style="width:100%;">
											<thead>
												<tr>
													<th scope="col">Fullname</th>
													<th scope="col">Position</th>
													<?php if(isset($_SESSION['userID'])):?>
														<th>Action</th>
													<?php endif?>
                                                

												</tr>
											</thead>
											<tbody>
												<?php if(!empty($official)): ?>
													<?php foreach($official as $row): ?>
														<tr>
															<td class="text-uppercase"><?= $row['name'] ?></td>
															<td><?= $row['position'] ?></td>
															<?php if(isset($_SESSION['userID'])):?>
														  
																<td>
                                                                <?php if($_SESSION['Access']=='admin'):?>
																	<a type="button" class="btn btn-link btn-primary update"  
																		title="Edit Position" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-position="<?= $row['pos_id'] ?>" data-toggle="tooltip" data-placement="top"> 
																		<i class="fa fa-edit text-white"></i>
                                                                    </a>
																	<a type="button" data-toggle="tooltip" href="../code/remove_official.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this official?');" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="tooltip" data-placement="top" title="Click to Delete">
																		<i class="fa fa-times text-white"></i>
																	</a>
																	<?php endif ?>
																</td>
															<?php endif?>
														</tr>
													<?php endforeach ?>
												<?php else: ?>
													<tr>
														<td colspan="3" class="text-center">No Available Data</td>
													</tr>
												<?php endif ?>
											</tbody>
											<tfoot>
												<tr>
													<th scope="col">Fullname</th>
													<th scope="col">Position</th>
													<?php if(isset($_SESSION['userID'])):?>
														<th>Action</th>
													<?php endif?>
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../code/edit_official.php" >
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Fullname" name="name" required>
                                </div>
								
								<div class="form-group">
                                    <label>Position</label>
                                    <select class="form-control" id="position" required name="position">
                                        <option disabled selected>Select Official Position</option>
										<?php foreach($position as $row): ?>
											<option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
							
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="off_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../code/save_official.php" >
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="name" required>
                                </div>
							
								<div class="form-group">
                                    <label>Position</label>
                                    <select class="form-control" id="pillSelect" required name="position">
                                        <option disabled selected>Select Official Position</option>
										<?php foreach($position as $row): ?>
											<option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
								
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="pos_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
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
    $(document).ready(function(index){
        $(document).on('click','.update',function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var position = $(this).data('position');
            $('#name').val(name);
            $('#position').val(position);
            $('#off_id').val(id);
            $('#edit').modal('show');
        });
    });
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
