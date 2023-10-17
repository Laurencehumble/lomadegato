<?php
 include('../security/security.php');

if (isset($_GET['id'])){
   

   $id = $_GET['id'];

   $query = " DELETE FROM tbl_resident_cert WHERE resident_id ='$id'";
       $result = mysqli_query($conn, $query);
       $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
       VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Delete Barangay Clearance','$residentID')";
       $query = mysqli_query($conn, $activitylog);
       if($result)
       {
         $_SESSION['message'] = 'Successfully Deleted!';
		$_SESSION['success'] = 'success';
          header("Location:../page/clerance_list.php");
       }
       else
       {
          $_SESSION['message'] = 'error=unknown error occured&user_data';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/clerance_list.php'); 
       }
}else{

   header("Location: ../page/clerance_list.php");
}

?>