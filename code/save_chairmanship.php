
<?php 
include('../security/security.php');

$title 	= $conn->real_escape_string($_POST['chair']);

    if(!empty($title)){

        $insert  = "INSERT INTO tbl_chairmanship (`title`) VALUES ('$title')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Chairmanship added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../page/chairmanship.php");

	$conn->close();