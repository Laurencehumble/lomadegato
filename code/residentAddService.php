<?php include('../database/dbconfig.php');
session_start();

if(isset($_POST['add-service'])){
    date_default_timezone_set('Asia/Manila');
    $residentID =$_POST['resident'];
    $title = $_POST['title'];
    $add_details = $_POST['add_details'];
    $cost = $_POST['cost'];
    $serviceID = 'Service-'.strtotime(date("YmdHis"));
    $today = date('Y-m-d');
  $date = date('Y-m-d H:i:s');
    $selectQuery = $conn->query("SELECT * FROM tbl_create_service WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND title='$title'AND add_details='$add_details'")->fetch_assoc();
    if($selectQuery){
        $_SESSION['message'] = 'Already have a existing certificate!';
    $_SESSION['success'] = 'danger';
    header("Location:../residentClerance.php?id=".$residentID); 
    }else{
        $insert = "INSERT INTO `tbl_create_service`(`serviceID`, `residentID`,resident_id,`title`, `add_details`,cost,`date`) 
        VALUES ('$serviceID','$residentID','$residentID','$title','$add_details','$cost','$date')";
      $result = mysqli_query($conn, $insert);
      
      if($result){
          $last_id = $conn->insert_id;
       echo '<script>alert("Success!")</script>';
          echo "<script> 
        
          location.href=('../residentClerance.php?id=$residentID'); 
          window.open('../page/print_service.php?id=$last_id');
          </script>";
      }
    }
  }
  
?>