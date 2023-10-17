<?php 
include('../security/security.php');

    
	$name 	= $conn->real_escape_string($_POST['name']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$status 	= 'Active';

    if(!empty($name) && !empty($pos) ){

        $insert  = "INSERT INTO tbl_officials (`name`,  `position`, `status`) VALUES ('$name','$pos','$status')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Official added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../page/officials.php");

	$conn->close();