<?php 
include('../security/security.php');

$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){
		$query 		= "DELETE FROM tbl_officials WHERE id = '$id'";
		
		$result 	= $conn->query($query);
		
		if($result === true){
            $_SESSION['message'] = 'Official has been removed!';
            $_SESSION['success'] = 'danger';
            
        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }
	}else{

		$_SESSION['message'] = 'Missing Official ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../page/officials.php");
	$conn->close();