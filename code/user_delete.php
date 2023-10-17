

<?php
 include('../security/security.php');

if (isset($_GET['ID'])){
   

   $id = $_GET['ID'];

   $query = " DELETE FROM users WHERE ID ='$id'";
       $result = mysqli_query($conn, $query);

       if($result)
       {
         $_SESSION['message'] = 'Successfully Deleted!';
		$_SESSION['success'] = 'success';
          header("Location:../page/user_list.php");
       }
       else
       {
          $_SESSION['message'] = 'error=unknown error occured&user_data';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/user_list.php'); 
       }
}else{

   header("Location: ../page/user_list.php");
}

?>