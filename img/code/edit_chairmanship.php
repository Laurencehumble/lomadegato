<?php 
include('../security/security.php');

$chair 	= $conn->real_escape_string($_POST['chair']);
    $id 	= $conn->real_escape_string($_POST['id']);

	if(!empty($id)){

		$query 		= "UPDATE tbl_chairmanship SET `title` = '$chair' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Title has been updated!';
			$_SESSION['success'] = 'success';

		}else{
			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No title ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../page/chairmanship.php");

	$conn->close();