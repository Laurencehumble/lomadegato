<?php 
include('../security/security.php');
$activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Edit a Profile','$residentID')";
$query = mysqli_query($conn, $activitylog);


$email 	= $_POST['email'];

// $profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
$profile2 	= $_FILES['img']['name'];
$employeeID = $_POST['employeeID'];

// change profile2 name
$ext = pathinfo($profile2, PATHINFO_EXTENSION);
$newName = date('dmYHis').'.'.$ext;
 
// image file directory
$target = "../images/faces/".basename($newName);



if(!empty($email)){
    $query = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($query);

    if($res->num_rows == 0){

        $_SESSION['message'] = 'User not found!';
        $_SESSION['success'] = 'danger';

    }else{
        if($_FILES['img']['name']!=''){

            $insert = "UPDATE users SET `avatar`='$newName', employeeID='$employeeID' WHERE `email`='$email'";

            $query = mysqli_query($conn,$insert);
            if($query){

            move_uploaded_file($_FILES['img']['tmp_name'], $target);
            $_SESSION['avatar'] = $newName;

            $_SESSION['message'] = 'Profile Picture Successfully Updated!';
		    $_SESSION['success'] = 'success';
             header("Location: ../page/user.php");
            }
        }else{
            $insert = "UPDATE users SET employeeID='$employeeID' WHERE `email`='$email'";

            $query = mysqli_query($conn,$insert);

            if($query){
               $_SESSION['message'] = 'EmployeeID Successfully Updated!';
                $_SESSION['success'] = 'success';
                  header("Location: ../page/user.php");
            }
        }

$_SESSION['message'] = "Profile has been updated!";
        $_SESSION['success'] = 'success';
       
    }
    
}else{
    $_SESSION['message'] = 'Please fill up the form completely!';
    $_SESSION['success'] = 'danger';
}



