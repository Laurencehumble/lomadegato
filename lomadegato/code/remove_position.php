<?php
 include('../security/security.php');

 $id 	= $conn->real_escape_string($_GET['id']);

 if($id != ''){
    $query 		= "DELETE FROM tbl_position WHERE id = '$id'";
    
    $result 	= $conn->query($query);
    
    if($result === true){
          $_SESSION['message'] = 'Position has been removed!';
          $_SESSION['success'] = 'danger';
          
      }else{
          $_SESSION['message'] = 'Something went wrong!';
          $_SESSION['success'] = 'danger';
      }
 }else{

    $_SESSION['message'] = 'Missing Position ID!';
    $_SESSION['success'] = 'danger';
 }

 header("Location: ../page/position.php");
 $conn->close();