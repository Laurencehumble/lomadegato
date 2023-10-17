<?php include('../security/security.php');



if(isset($_POST['add-certificate'])){
    date_default_timezone_set('Asia/Manila');
      $residentID =$_POST['resident'];
      $purpose = $_POST['purpose'];
      $cost = $_POST['cost'];
      $residentcertID = 'BRGY-'.strtotime(date("YmdHis"));
      $today = date('Y-m-d');
      $date = date('Y-m-d H:i:s');
      $selectQuery = $conn->query("SELECT * FROM tbl_barangay_cert WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND barangayPurpose='$purpose'")->fetch_assoc();
      if($selectQuery){
          $_SESSION['message'] = 'Already have a existing certificate!';
          $_SESSION['success'] = 'danger';
          header("Location:../residentClerance.php?id=".$residentID);
      }else{
          $insert = "INSERT INTO `tbl_barangay_cert`(`barangayID`, `residentID`,resident_id, `employeeID`, `barangayPurpose`,cost,`date`) 
          VALUES ('$residentcertID','$residentID','$residentID','".$_SESSION['userID']."','$purpose','$cost','$date')";
        $result = mysqli_query($conn, $insert);
        
        if($result){
            $last_id = $conn->insert_id;
         echo '<script>alert("Success!")</script>';
            echo "<script> 
          
            location.href=('../residentClerance.php?id=$residentID');  
            window.open('../page/print_certificate.php?id=$last_id');
            </script>";
        }
      }
  }
?>