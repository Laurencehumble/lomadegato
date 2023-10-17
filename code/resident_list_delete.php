<?php
 include('../security/security.php');

if (isset($_GET['residentID'])){
   

   $id = $_GET['residentID'];

   $query = " DELETE FROM tbl_resident_list WHERE residentID ='$id'";
       $result = mysqli_query($conn, $query);

       $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Deleted Resident','$residentID')";
$query = mysqli_query($conn, $activitylog);

      if($result)
       {
         $_SESSION['message'] = 'successfully Deleted!';
         $_SESSION['success'] = 'success';
         header('Location: ../page/resident_list.php'); 
       }
       else
       {
         $_SESSION['message'] = 'unknown error occured&user_data!';
         $_SESSION['success'] = 'danger';
         header('Location: ../page/resident_list.php'); 
       }
}else{

   header("Location: ../page/resident_list.php");
}

?>