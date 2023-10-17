<?php 
include('../security/security.php');

$pos 	= $conn->real_escape_string($_POST['position']);
	$order 	= $conn->real_escape_string($_POST['order']);

    if(!empty($pos) && !empty($order)){

        $insert  = "INSERT INTO tbl_position (`position`, `order`) VALUES ('$pos', $order)";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Position added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../page/position.php");

	$conn->close();