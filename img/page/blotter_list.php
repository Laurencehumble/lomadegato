<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');

$sql_query = "SELECT * FROM tbl_resident_list";
$residents = mysqli_query($conn, $sql_query);
$sql_querys = "SELECT * FROM tbl_resident_list";
$residentss = mysqli_query($conn, $sql_querys);

$sql = "SELECT * FROM tbl_blotter ORDER BY blotterID DESC";
$result = mysqli_query($conn, $sql);
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
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h6 class="font-weight-normal mb-0"></h6>
                </div>                
              </div>
            </div>            
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
<?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                <div class="card-body">
                  <h4 class="card-title">
                    Blotter List 
                    <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm ">
                    <span data-toggle="tooltip" data-placement="top" title="Click to Add Blotter">
                          <i class="fa fa-plus"></i>
                          Blotter List
                      </a>
                      </span>
                  </h4>
                  <div class="table-responsive">
                    <table id="blotterTable" class="table table-striped">
                      <thead class="bg-primary text-white text-center py-3">
                          <tr>
                            <th scope="col">BlotterID</th>
                            <th scope="col">Complainant</th>
                            <th scope="col">Defendant</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date </th>
                            <th scope="col">Time</th>
                            <th scope="col">Details</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                              <td><?php echo $rows['blotterID'];?></td>
                              <td><?php echo $rows['complainant'];?></td>
                              <td><?php echo $rows['respondent'];?></td>
                              <td><?php echo $rows['location'];?></td>
                              <td><?php echo $rows['date'];?></td>
                              <td><?php echo $rows['time'];?></td>
                              <td><?php echo $rows['details'];?></td>
                              <td><?php echo $rows['status'];?></td>
                              <td>
                                <a class="btn btn-link btn-primary update" data-id="<?php echo $rows['blotterID'];?>" data-toggle="tooltip" data-placement="top" title="Click to Update"><i class="fa fa-edit text-white"></i></a>
                                <!-- <a href="../code/blottercodedelete.php?blotterID=" class="btn btn-danger"><i class="fa fa-times text-white"></i></a> -->
                              </td>
                            </tr>
                      <?php } ?>
                    </tbody>
                  </table> 
						    </div>

					</div>
        </div> 
        <!-- =========================================================================================================== -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 60%; " role="document">
        <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Blotter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     
                      <form class="pt-3" autocomplete="off" action="../code/blottercode.php" id="add-blotter-form" method="POST" class="needs-validation" >         
                              <div class="row pt-3">
                            <div class="form-group col-md-6 pt-3">
                              <div class="form-group pt-3">
                                <label >Complainant</label>
                                <input type="text" class="form-control" placeholder="Enter Complainant Name"  name="complainant" required>
                              </div>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                            <div class="checkbox form-group pt-3">
                              <label >
                             <input type="checkbox" id="resident" data-toggle="tooltip" data-placement="top" title="Check the box if you want to Select from Resident List">   
                             Defendant</label>     
                           
                                 
                                 
                                <input type="text" class="form-control" placeholder="Enter Defendant Name"  name="respondent" required>
                                
                                <select class="form-control" name="resident_id" style="display:none; pt-3"> 
                                    <option value="">Select Resident</option>
                                    <?php
                                        while($resident = mysqli_fetch_assoc($residents)) {
                                    ?>
                                    <option value="<?php echo $resident['id']; ?>" data-name="<?php echo $resident['firstName'].' '.$resident['middleName'].' '.$resident['lastName'].' '.$resident['suffixName']; ?>" ><?php echo $resident['firstName'].' '.$resident['middleName'].' '.$resident['lastName'].' '.$resident['suffixName']; ?></option>
                                    <?php } ?>
                                </select>
                     
                              </div>
                            </div>
                            </div>
                        <div class="form-group col-md-6 pb-3 ">
                            <div class="form-group ">
                              <label >Victim(s)</label>
                              <input type="text" class="form-control" placeholder="Enter Victim(s) Name"  name="victim" required>
                            </div>
                          </div>
                          <hr>
                          <div class="row pt-3">
                          <div class="form-group col-md-6 pt-3">
                            <div class="form-group">
                              <label >Location</label>
                              <input type="text" class="form-control" placeholder="Enter Location" name="location" required>
                            </div>
                            </div>
                          <div class="form-group col-md-6  pt-3">
                            <div class="form-group">
                              <label >Date</label>
                              <input type="date" class="form-control" name="date" required>
                            </div>
                          </div>
                           </div>
                           <div class="row">
                          <div class="form-group col-md-6">
                            <div class="form-group">
                              <label >Time</label>
                              <input type="time" class="form-control" name="time"  required>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-group">
                              <label >Status</label>
                              <select class="form-control" name="status" >
                                  <option disabled selected>Select Status</option>
                                  <option value="Active">Active</option>
                                  <option value="Solve Case">Solve</option>
                              </select>
                            </div>
                          </div>
                          </div>
                       
                          <div class="form-group col-md-8">
                              <div class="form-group">
                                <label >Details</label>
                                <textarea type="text" class="form-control " rows="5" cols="70" name="details"  required></textarea>
                              </div>
                          </div>
                           
                              
                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="add-blotter-form">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 60%; " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Blotter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form class="pt-3" autocomplete="off" action="../code/updated_blotter.php" id="update-blotter-form" method="POST" class="needs-validation" >         
                        <div class="row pt-3">
                            <div class="form-group col-md-6 pt-3">
                              <div class="form-group pt-3">
                                <label >Complainant</label>
                                <input type="text" class="form-control" placeholder="Enter Complainant Name" id="complainant" name="complainant" required>
                              </div>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                            <div class="checkbox form-group pt-3">
                              <label >
                             <input type="checkbox" id="resident" data-toggle="tooltip" data-placement="top" title="Check the box if you want to Select from Resident List">   
                             Defendant</label> 
                                 
                                 
                                 
                                <input type="text" class="form-control" placeholder="Enter Defendant Name" id="respondent" name="respondent" >
                           
                                <select class="form-control rerserse" id="resident_id" name="resident_id" style="display:none; pt-3">
                                    <option value="">Select Resident</option>
                                    <?php
                                        while($residentsss = mysqli_fetch_assoc($residentss)) {
                                    ?>
                                    <option value="<?php echo $residentsss['id']; ?>" data-name="<?php echo $residentsss['firstName'].' '.$residentsss['middleName'].' '.$residentsss['lastName'].' '.$residentsss['suffixName']; ?>" ><?php echo $residentsss['firstName'].' '.$residentsss['middleName'].' '.$residentsss['lastName'].' '.$residentsss['suffixName']; ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-6 pb-3">
                            <div class="form-group">
                              <label >Victim(s)</label>
                              <input type="text" class="form-control" placeholder="Enter Victim(s) Name" id="victim" name="victim" required>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="form-group col-md-6 pt-3">
                            <div class="form-group">
                              <label >Location</label>
                              <input type="text" class="form-control" placeholder="Enter Location" id="location" name="location" required>
                            </div>
                          </div>
                          <div class="form-group col-md-6 pt-3">
                            <div class="form-group">
                              <label >Date</label>
                              <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <div class="form-group">
                              <label >Time</label>
                              <input type="time" class="form-control" name="time" id="time" required>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <div class="form-group">
                              <label >Status</label>
                              <select class="form-control" name="status" id="status">
                                  <option disabled selected>Select Status</option>
                                  <option value="Active">Active</option>
                                  <option value="Solve Case">Solve</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-8">
                              <div class="form-group">
                                <label >Details</label>
                                <textarea type="text" class="form-control"  rows="5" cols="70" name="details" id="details" required></textarea>
                              </div>
                          </div>
                        </div>     
                        <input type="hidden"  name="blotterID"  >     
                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" name="blotter_update" form="update-blotter-form">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========================================================================================================== -->
      </div>
      <!-- =========================================================================================================== -->
      <!-- <div class="modal fade pt-3" id="checkbox">
        <div class="modal-dialog" style="max-width: 20%;">
            <div class="modal-content">
                <div class="modal-body  bg-success text-white">Check the box if you want to Select from "Resident list".</div>
                <button class="close pb-3 bg-success text-white" type="button" data-dismiss="modal" aria-label="Close">
                       ×
                    </button> -->
            <!-- </div>/modal-content
        </div> /modal-dialog
  </div>/LOGOUT SESSION -->

<?php
include('../includes/footer.php');
include('../includes/script.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
  $(function () {
    $("#blotterTable").DataTable({
      "responsive": true, "autoWidth": false,

      "lengthMenu": [
                      [10, 25, 50, -1],
                      ['10 rows', '25 rows', '50 rows', 'Show all']
                  ],
      "lengthChange": true,
      "aoColumnDefs": [
          { "bSortable": false, "aTargets": [ 4 ] } ,
          {className: 'dt-center', "aTargets": [ 0 ] } 
          ],
      "buttons": ["csv", "excel","pdf", "colvis"],
      "order": [ 0, 'asc' ],
    }).buttons().container().appendTo('#blotterTable_wrapper .col-md-6:eq(0)');
  });

</script>
<script>

$(document).on('change','#resident',function(){
  if ($(this).is(':checked')) {
      $('select[name="resident_id"]').show();
      $('select[name="resident_id"]').prop('required',true);
      $('input[name="respondent"]').attr('type','hidden');
       $('select[name="resident_id"]').val('');
  }else{
      $('select[name="resident_id"]').prop('required',false);
      $('select[name="resident_id"]').hide();
      $('input[name="respondent"]').attr('type','show');
      $('input[name="respondent"]').val('');
  }
});
$(document).on('change','#defendant',function(){
  if ($(this).is(':checked')) {
      $('.rerserse').show();
      $('.rerserse').prop('required',true);
      $('#respondent').attr('type','hidden');
  }else{
      $('.rerserse').prop('required',false);
      $('.rerserse').hide();
      $('#respondent').attr('type','show');
  }
});



$(document).on('change','select[name="resident_id"]',function(){
    var name = $(this).find(':selected').data('name');
    $('input[name="respondent"]').val(name);
});
  $(document).on('click','.update',function(){
      
      
    var id = $(this).data('id');
    $('input[name="blotterID"]').val(id);
    $.post("query.php",{id:id,blotter_details:'blotter_details'},function(data){
     var new_data = JSON.parse(data);
     $('#complainant').val(new_data['complainant']);
     $('#respondent').val(new_data['respondent']);
     $('#defendant').val(new_data['defendant']);
     $('#victim').val(new_data['victim']);
     $('#type').val(new_data['type']);
     $('#location').val(new_data['location']);
     $('#date').val(new_data['date']);
     $('#time').val(new_data['time']);
     $('#status').val(new_data['status']);
     $('#details').val(new_data['details']);
    
     if($.trim(new_data['resident_id'])){
         $('#defendant').prop('checked',true);
          $('.rerserse').show();
          $('.rerserse').prop('required',true);
          $('#respondent').attr('type','hidden');
          $('#resident_id').val(new_data['resident_id']);
     }else{
         $('#defendant').prop('checked',false);
           $('.rerserse').prop('required',false);
          $('.rerserse').hide();
          $('#respondent').attr('type','show');
     }
     
     $('#update').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>