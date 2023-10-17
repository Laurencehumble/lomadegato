<?php
include('../security/security.php');

if(isset($_POST['logoutBTN'])){

    $fullname = $_SESSION['Email'];
    $employee_id = $_SESSION['Employee'];
    $id = $_SESSION['id'];


    date_default_timezone_set('Asia/Manila'); 
      $date = date('Y-m-d H:i:s');
      $insert = "INSERT INTO `user_log`(`user_id`, `fullname`,employee_id,`date`,`type`) 
      VALUES ('$id','$fullname','$employee_id','$date','OUT')";
    $result = mysqli_query($conn, $insert);

   
    unset($_SESSION['userID']);
    unset($_SESSION['Access']);
    unset($_SESSION['Email']);
    unset($_SESSION['Employee']);
    unset($_SESSION['Date']);
    unset($_SESSION['Propic']);
    unset($_SESSION['idResident']);

$_SESSION['message'] = 'Logout Successfully!';
		$_SESSION['success'] = 'success';
    header('Location: ../login.php');
}
?>