<?php
 include('../security/security.php');

if (isset($_GET['clearanceID'])){
   

   $id = $_GET['clearanceID'];

   $query = " DELETE FROM tbl_clearance WHERE clearanceID ='$id'";
       $result = mysqli_query($conn, $query);

       if($result)
       {
           header("Location: ../page/clearance_list.php?success= successfully Deleted! ");
       }
       else
       {
          header("Location: ../page/clearance_list.php?error=unknown error occured&user_data");
       }
}else{

   header("Location: ../page/clearance_list.php");
}

?>