<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php'); 


$query = "SELECT * FROM activitylog ORDER BY id DESC";
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
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title col-6">Activity Logs</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee ID</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                        <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $index=>$row){ ?>
                                    <tr>
                                        <td align="center" width="2%"><?php echo $index+1; ?></td>
                                        <td><?php echo $row['employee_id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['action']; ?></td>
                                        <td><?php echo date('F d,Y h:ia',strtotime($row['datetime'])); ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function(index){
        $("table").DataTable();
    });
</script>
<script> 
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>