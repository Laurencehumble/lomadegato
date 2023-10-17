
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');



$query = "SELECT 
CONCAT(tbl_resident_list.firstName,' ',tbl_resident_list.middleName,' ',tbl_resident_list.lastName,' ',tbl_resident_list.suffixName) AS resident_name,
tbl_resident_list.gender,
tbl_clearance.date,
tbl_clearance.business_name,
tbl_clearance.address,
tbl_clearance.type_business,
tbl_clearance.cost,
tbl_clearance.id
FROM tbl_clearance
LEFT JOIN tbl_resident_list
ON tbl_resident_list.id = tbl_clearance.resident_id";
$result = $conn->query($query);


$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}
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
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title col-6">Business Clearance</div>
                            <span data-toggle="tooltip" data-placement="top" title="Click to Create Clearance">
                            <button type="button" href="#add" data-toggle="modal" class="btn btn-sm btn-primary ml-2"><span class="fa fa-plus"></span> Create Business Clearance</button>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="business_cert_id">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Business Name</th>
                                        <th>Owner Name</th>
                                        <th>Address</th>
                                        <th>Business Type</th>
                                        <th>Date Serve</th>
                                        <th>Cost</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($result as $index=>$da_res){ ?>
                                    <tr>
                                        <td><?php echo $index+1; ?></td>
                                        <td><?php echo $da_res['business_name']; ?></td>
                                        <td><?php echo $da_res['resident_name']; ?></td>
                                        <td><?php echo $da_res['address']; ?></td>
                                        <td><?php echo $da_res['type_business']; ?></td>
                                        <td><?php echo date('F d,Y h:ia',strtotime($da_res['date'])); ?></td>

                                        <td>₱ <?php echo number_format($da_res['cost'],2); ?></td>
                                        <td>
                                        <a href="print_business.php?id=<?php echo $da_res['id']; ?>" class="business_cert btn btn-primary btn-sm" target="_blank" data-id="<?php echo $row["business_cert"]?>" data-toggle="tooltip" data-placement="top" title="Click to Print"><span class="fa fa-print"></span></a>
                                        <a href="../code/business_list_delete.php?id=<?=$da_res['id']?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Click to Delete"><span class="fa fa-times text-white"></span></a>
                                        </td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Business Clearance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="query.php" id="add-business-form">
                    <div class="form-group">
                        <label>Owner</label>
                        <select class="form-control" required name="resident">
                            <option value="">Select Owner</option>
                            <?php 
                            $result=mysqli_query($conn, "SELECT * FROM `tbl_resident_list`");
                            while($row=mysqli_fetch_array($result))
                            {
                                $first = strtoupper($row['firstName']);
                                $last = strtoupper($row['lastName']);
                                $selectQuery = $conn->query("SELECT * FROM tbl_blotter WHERE respondent LIKE '$first%$last%' AND `status`='Active'")->fetch_assoc();
                                $mode = '';
                                $test = '';
                                if($selectQuery){
                                    $mode = 'disabled';
                                    $test ='<b class="text-danger" style="color:red !important;">[With Active Case]</b>';
                                }
                                echo "<option value='$row[id]' $mode>".strtoupper($row['firstName']).' '.strtoupper($row['middleName']).' '.strtoupper($row['lastName']).' '.strtoupper($row['suffixName'])." $test</option>";
                                
                            }
                            ?>
                        </select>
                    </div>
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
<?php
include('../includes/footer.php');
include('../includes/script.php');
?>

<script>
    $(document).ready(function(index){
       
    });
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
    $(document).ready(function(index){
        $("#business_cert_id").on("click",".business_cert",function(){ 
            var id=$(this).data("id");

            $.ajax({
          url: 'query.php',
          method: 'post',
          data: {
            'business_cert' : 1,
            'id' : id,
          },
          success: function(data){
          },
          error: function(data){
              console.log("Error: " + data);
        }});

        })
    });
</script>