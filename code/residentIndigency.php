<?php include('../database/dbconfig.php');
session_start();

if(isset($_POST['add-indigency'])){
  date_default_timezone_set('Asia/Manila');
    $residentID =$_POST['resident'];
    $purpose = $_POST['purpose'];
    $cost = $_POST['cost'];
    $residentcertID = 'IND-'.strtotime(date("YmdHis"));
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $selectQuery = $conn->query("SELECT * FROM tbl_indigency_cert WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND indigencyPurpose='$purpose'")->fetch_assoc();
    if($selectQuery){
        $_SESSION['message'] = 'Already have a existing indigency!';
		$_SESSION['success'] = 'danger';
    header("Location:../residentClerance.php?id=".$residentID);
    }else{
        $insert = "INSERT INTO `tbl_indigency_cert`(`indigencyCertID`, `residentID`,resident_id, `indigencyPurpose`,cost,`date`) 
        VALUES ('$residentcertID','$residentID','$residentID','$purpose','$cost','$date')";
      $result = mysqli_query($conn, $insert);
      
      if($result){
          $last_id = $conn->insert_id;
         echo '<script>alert("Success!")</script>';
          echo "<script> 
        
          location.href=('../residentClerance.php?id=$residentID');  
          window.open('../page/print_indigency.php?id=$last_id');
          </script>";
      }
    }
}
?>