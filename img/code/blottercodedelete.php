<?php
 include('../security/security.php');

if (isset($_GET['blotterID'])){
   

   $id = $_GET['blotterID'];

   $query = " DELETE FROM tbl_blotter WHERE blotterID ='$id'";
       $result = mysqli_query($conn, $query);

       if($result)
       {
          $_SESSION['message'] = 'Successfully Deleted!';
		$_SESSION['success'] = 'success';
          header("Location:../page/blotter_list.php");
       }
       else
       {
        $_SESSION['message'] = 'error=unknown error occured&user_data!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/blotter_list.php'); 
       }
}else{

   header("Location: ../page/blotter_list.php");
}

?>