<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');

$sql = "SELECT * FROM tbl_clearance ORDER BY clearanceID DESC";
$result = mysqli_query($conn, $sql);
?>

<?php
switch($_SESSION['Access']){
    case "admin":

?>
 <!-- partial -->
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin">
              <div class="row mb-n5">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h6 class="font-weight-normal mb-0">Clearance List</h6>
                </div>                
              </div>
            </div>            
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <div class="table-responsive">

                  <?php if (mysqli_num_rows($result)) { ?>

                    <table id="clearanceTable" class="table table-striped">
                    <thead class="bg-primary text-white text-center py-3">
    <tr>
    <th scope="col">ClearanceID</th>
      <th scope="col">Business Name</th>
      <th scope="col">Business Owner</th>
      <th scope="col">Business Partner</th>
      <th scope="col">Nature</th>
      <th scope="col">Date </th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
     
        while($rows = mysqli_fetch_assoc($result)) {
            
    ?>
  <tr>
    <td><?php echo $rows['clearanceID'];?></td>
    <td><?php echo $rows['bname'];?></td>
    <td><?php echo $rows['owner'];?></td>
    <td><?php echo $rows['partner_owner'];?></td>
    <td><?php echo $rows['nature'];?></td>
    <td><?php echo $rows['date'];?></td>
    <td><a href="clearance_update.php?clearanceID=<?=$rows['clearanceID']?>" class="btn btn-primary">Update</a>
    <a href="../code/clearancecodedelete.php?clearanceID=<?=$rows['clearanceID']?>" class="btn btn-danger">Delete</a>
    <a href="clearance_certificate.php?clearanceID=<?= $rows['clearanceID'] ?>" class="btn btn-danger" data-original-title="Generate Report">Generate</a>
  </td>
  </tr>
  <?php } ?>
    </tbody>
    </table>
        <?php } ?>
    
  <div class="link-right">
        <a href="addBlotter.php" class="link-primary">Create</a>        
</div>

                        
						</div>
					</div>
            </div> 
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php
break;
default : echo "<script>window.location.replace('http://localhost/bulacan/pages/samples/error-404.html');</script>";
}
?>

<?php
include('../includes/footer.php');
include('../includes/script.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
  $(function () {
    $("#clearanceTable").DataTable({
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
    }).buttons().container().appendTo('#clearanceTable_wrapper .col-md-6:eq(0)');
  });

</script>