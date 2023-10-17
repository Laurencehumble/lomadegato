<?php include('database/dbconfig.php');


session_start();

if(isset($_POST['add-business'])){
  date_default_timezone_set('Asia/Manila');
  $residentID =$_POST['resident'];
    $business_name =$_POST['business-name'];
    $business_type =$_POST['business-type'];
    $address =$_POST['address'];
    $cost =$_POST['cost'];
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $residentcertID = 'BUS-'.strtotime(date("YmdHis"));
    $selectQuery = $conn->query("SELECT * FROM tbl_clearance WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND business_name='$business_name'")->fetch_assoc();
    if($selectQuery){
      $_SESSION['message'] = 'Already have a existing  business clearance!';
		$_SESSION['success'] = 'danger';
    header('Location: residentClerance.php'); 
    }else{
        
        $insert = "INSERT INTO `tbl_clearance`(`clearanceID`,type_business, residentID, `business_name`,`address`,cost,resident_id,`date`) 
        VALUES ('$residentcertID','$business_type','$residentID','$business_name','$address','$cost','$residentID','$date')";

     $result = mysqli_query($conn, $insert);
      if($result){
    
        $last_id = $conn->insert_id;
      echo '<script>alert("Success!")</script>';
        echo "<script> 
      
        location.href='residentClerance.php?id=$residentID'; 
        window.open('../page/print_business.php?id=$last_id');
        </script>";
        }
    }
}
?>