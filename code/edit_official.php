<?php 
include('../security/security.php');


$id 	= $conn->real_escape_string($_POST['id']);
$name 	= $conn->real_escape_string($_POST['name']);
$pos 	= $conn->real_escape_string($_POST['position']);

if(!empty($id)){

    $query 		= "UPDATE tbl_officials SET `name`='$name', `position`='$pos' WHERE id=$id;";	
    $result 	= $conn->query($query);

    if($result === true){
        
        $_SESSION['message'] = 'Brgy Official has been updated!';
        $_SESSION['success'] = 'success';

    }else{

        $_SESSION['message'] = 'Somethin went wrong!';
        $_SESSION['success'] = 'danger';
    }

}else{
    $_SESSION['message'] = 'No Brgy Official ID found!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../page/officials.php");