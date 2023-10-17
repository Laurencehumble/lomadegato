<?php include('../database/dbconfig.php');
session_start();


if(isset($_POST['add-clearance'])){
    date_default_timezone_set('Asia/Manila');
    $id =$_POST['id'];
$purpose = $_POST['purpose'];
$cost = $_POST['cost'];
$residentcertID = 'RESI-'.strtotime(date("YmdHis"));
$today = date('Y-m-d');
$date = date('Y-m-d H:i:s');
$selectQuery = $conn->query("SELECT * FROM tbl_resident_cert WHERE resident_id='$id' AND DATE(`date`)='$today' AND purpose='$purpose'")->fetch_assoc();
if($selectQuery){
   $_SESSION['message'] = 'Already have a existing certificate!';
		$_SESSION['success'] = 'danger';
    header("Location:../residentClerance.php?id=".$id);
}else{
    $insert = "INSERT INTO `tbl_resident_cert`(`residentcertID`,`residentID`,resident_id,`purpose`,cost,`date`) 
    VALUES ('$residentcertID','$id','$id','$purpose','$cost','$date')";
  $result = mysqli_query($conn, $insert);
  
  if($result){
      $last_id = $conn->insert_id;
    echo '<script>alert("Success!")</script>';
      echo "<script> 
    
      location.href=('../residentClerance.php?id=$id');
      window.open('../page/print_resident_clearance.php?id=$last_id');
      </script>";
  }
}

}
?>