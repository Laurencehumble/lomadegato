
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');



$query = "SELECT tbl_barangay_cert.*,CONCAT(tbl_resident_list.firstName,' ',tbl_resident_list.middleName,' ',tbl_resident_list.lastName,' ',tbl_resident_list.suffixName) AS resident_name,tbl_resident_list.gender,
tbl_barangay_cert.date,
tbl_barangay_cert.barangayPurpose AS purpose,
tbl_barangay_cert.cost,
tbl_barangay_cert.id
FROM tbl_barangay_cert 
LEFT JOIN tbl_resident_list 
ON tbl_resident_list.id = tbl_barangay_cert.resident_id ORDER BY tbl_barangay_cert.id ASC";
$result = $conn->query($query);


$certificates = array();
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
<?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title col-6">Barangay Certificate</div>
                            <span data-toggle="tooltip" data-placement="top" title="Click to Create Certificate">
                            <button type="button" href="#add" data-toggle="modal" class="btn btn-sm btn-primary ml-2"><span class="fa fa-plus"></span> Create Certificate</button>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id ="certificate_list_id">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Resident</th>
                                        <th>Purpose</th>
                                        <th>Date Serve</th>
                                        <th>Cost</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php foreach($result as $index=>$row){ ?>
                                    <tr>
                                        <td align="center" width="2%"><?php echo $index+1; ?></td>
                                        <td><?php echo $row['resident_name']; ?></td>
                                        <td><?php echo $row['purpose']; ?></td>
                                     	 <td><?php echo date('F d,Y h:ia',strtotime($row['date'])); ?></td>
                                        <td>₱ <?php echo number_format($row['cost'],2); ?></td>
                                        <td align="center" width="5%">
                                            <a href="print_certificate.php?id=<?php echo $row['id']; ?>" class="certificate_list btn btn-primary btn-sm"  target="_blank" data-toggle="tooltip" data-placement="top" title="Click to Print"><span class="fa fa-print"></span></a>
                                            <a href="../code/certificate_list_delete.php?id=<?=$row['id']?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Click to Delete"><span class="fa fa-times text-white"></span></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Brgy Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="query.php" id="add-certificate-form">
                    <div class="form-group">
                        <label>Resident</label>
                        <select class="form-control" required name="resident">
                            <option value="">Select Resident</option>
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
        $("#certificate_list_id").on("click",".certificate_list",function(){ 
            var id=$(this).data("id");

            $.ajax({
          url: 'query.php',
          method: 'post',
          data: {
            'certificate_list' : 1,
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