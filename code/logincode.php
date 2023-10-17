<?php 
include('../security/security.php');
// include('../database/dbconfig.php');
// session_start();
if (isset($_POST['login'])) {
    
  //$username = htmlspecialchars($_POST['username']??'');
  $email =  $_POST['email'];
  $password = $_POST['password'];
  

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result_register = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result_register);
  //echo $row['password'];
  if (password_verify($password,$row['password'])) {
      $_SESSION['userID'] = $row['ID'];
      $_SESSION['Access'] = $row['access'];
      $_SESSION['Email'] = $row['email'];
      $_SESSION['Employee'] = $row['employeeID'];
      $_SESSION['Date'] = $row['date'];
      $_SESSION['id'] = $row['user_id'];
      $_SESSION['idresident'] = $row['input_resident_id'];

      $id = $row['user_id'];
      $fullname = $row['email'];
      $employee_id = $row['employeeID'];
      date_default_timezone_set('Asia/Manila'); 
      $date = date('Y-m-d H:i:s');
      $insert = "INSERT INTO `user_log`(`user_id`, `fullname`,employee_id,`date`) 
      VALUES ('$id','$fullname','$employee_id','$date')";
    $result = mysqli_query($conn, $insert);

 $_SESSION['message'] = 'Login Successfully!';
		$_SESSION['success'] = 'success';
          header("Location: ../page/index.php");
     
  }else {
    $_SESSION['message'] = 'Username or Password is Invalid!';
		$_SESSION['success'] = 'danger';
    $_SESSION['status'] = "Username or Password is Invalid";
    header('Location: ../login.php'); 
  }
  };
?>
