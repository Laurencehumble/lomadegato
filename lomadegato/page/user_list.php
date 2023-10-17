
<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');

$query = "SELECT * FROM users ORDER BY ID ASC";
$result = $conn->query($query);

$certificates = array();
while($rows = $result->fetch_assoc()){
    $position[] = $rows;
}
?>
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
            <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                ?> 
              <div class="alert alert-success alert-dismissible fade show" role="success">
                 <strong></strong> <?Php echo $_SESSION['status']; ?>
               </div>
              <?php
               unset($_SESSION['status']);
              }
              ?>
                <div class="card p-4">
                    <div class="card-header">
                    <h4 class="font-weight-normal mb-0">Users List
                      <a href="register.php"  class="btn btn-info btn-border btn-round btn-sm " data-toggle="tooltip" data-placement="top" title="Click to Add User">
                          <i class="fa fa-plus"></i>
                          User
                      </a>
                    </h4>
                    </div>
<?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                    <div class="card-body">
                    <div class="table-responsive">



  <table id="blotterTable" class="table table-striped">
  <thead class="bg-primary text-white text-center py-3">
<tr>
<th scope="col">#</th>
<th scope="col">ID</th>
<th scope="col">Profile Picture</th>
<th scope="col">Employee ID</th>
<th scope="col">Email</th>
<th scope="col">Access</th>
<th scope="col">Date </th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php foreach($result as $index=>$row){ ?>
                                    <tr>
                                    <td align="center" width="2%"><?php echo $index+1; ?></td>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td>
                                          <div class="avatar avatar-xs">
                                            
                                                   <?php $filename = '../images/faces/'.$row['avatar'];
                                        if (file_exists($filename)) {
                                        ?>
                                        <img src="<?= '../images/faces/'.$row['avatar'] ?>" class="avatar-img rounded-circle" alt="profile"/> 
                                        <?php }else{ ?>
                                            <img src="<?= $row['avatar'] ?>" alt="..." class="avatar-img rounded-circle" >
                                      <?php
                                        }
                                         ?>
                                          </div>
                                      </td>
                                      <td><?php echo $row['employeeID'];?></td>
                                      <td><?php echo $row['email'];?></td>
                                      <td><?php echo $row['access'];?></td>
                                      <td><?php echo date('F d,Y h:ia',strtotime($row['date'])); ?></td>
                                                    
<td>
<a href="../code/user_delete.php?ID=<?=$row['ID']?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Click to Delete"><i class="fa fa-times text-white"></i></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>



      
      </div>
             
            
                    </div>
                </div>   

                <?php

?>
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
    $(document).ready(function(index){
       
    });
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>