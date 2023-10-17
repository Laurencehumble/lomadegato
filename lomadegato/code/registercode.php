<?php
include('../security/security.php');

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['employeeID']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $access = $_POST['access'];
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $u_suffix = mysqli_real_escape_string($conn, $_POST['u_suffix']);
    $u_birthday = mysqli_real_escape_string($conn, $_POST['u_birthday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = $_POST['date'];
    $profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
	$profile2 	= $_FILES['img']['name'];


    $ext = pathinfo($profile2, PATHINFO_EXTENSION);
    $newName = date('dmYHis').'.'.$ext;

    // image file directory
    $target = "../images/faces/".basename($newName);


    // change profile2 name
    $newName = date('dmYHis').str_replace(" ", "", $profile2);

    // image file directory
    // $target = "../assets/uploads/avatar/".basename($newName);

    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $sql = "SELECT * FROM users WHERE email = '$email'AND DATE(`date`)='$today'";
    $user = $conn->query($sql) or die ($conn->error);
    $row = $user->fetch_assoc();

    $result_register = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_register) > 0) {
       
        $_SESSION['userID'] = $row['ID'];
        $_SESSION['Access'] = $row['access'];
        $_SESSION['Email'] = $row['email'];
        $_SESSION['Employee'] = $row['employeeID'];
        $_SESSION['Date'] = $row['date'];
       

      $_SESSION['status'] = "username already exist!";

      header('Location: ../page/register.php'); 
        // $error[] = 'user already exist!';
        exit();
    }
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $sql1 = "SELECT * FROM users WHERE employeeID = '$username'AND DATE(`date`)='$today'";
    $user1 = $conn->query($sql1) or die ($conn->error);
    $row = $user1->fetch_assoc();

    $result_register1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result_register1) > 0) {
       
        $_SESSION['userID'] = $row['ID'];
        $_SESSION['Access'] = $row['access'];
        $_SESSION['Email'] = $row['email'];
        $_SESSION['Employee'] = $row['employeeID'];
        $_SESSION['Date'] = $row['date'];
        
       

      $_SESSION['status'] = "employeeID already exist!";

      header('Location: ../page/register.php'); 
        // $error[] = 'user already exist!';
        exit();
}
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
  $sql2 = "SELECT * FROM users WHERE first_name='$first_name' AND last_name='$last_name'AND DATE(`date`)='$today'";
  $user2 = $conn->query($sql2) or die ($conn->error);
  $row = $user1->fetch_assoc();

  $result_register2 = mysqli_query($conn, $sql2);

  if (mysqli_num_rows($result_register2) > 0) {

      $_SESSION['status'] = 'Duplicated Resident already exists!';

    header('Location: ../page/register.php');
  // echo '<script>alert("Duplicated firstname already exists!")</script>';
  // echo "<script> location.href='../page/resident_list.php'; </script>";
  exit();
  }


else {
        if ($password != $cpass) {
           
            $_SESSION['userID'] = $row['ID'];
            $_SESSION['Access'] = $row['access'];
            $_SESSION['Email'] = $row['email'];

      $_SESSION['status'] = "password not matched!";

      header('Location: ../page/register.php'); 
            // $error[] = 'password not matched!';
        }else {
            date_default_timezone_set('Asia/Manila');
            $today = date('Y-m-d');
            $date = date('Y-m-d H:i:s');
            $id =  date("y")."-".strtotime(date("His"))."-".date("m");
            $password  = password_hash($password,PASSWORD_DEFAULT);
           $insert = "INSERT INTO users(ID, avatar, employeeID, email, password, access, first_name, middle_name, last_name, u_suffix,u_birthday, gender,date) VALUES('$id', '$profile','$username','$email','$password','$access','$first_name','$middle_name','$last_name','$u_suffix','$u_birthday','$gender','$date')";
            mysqli_query($conn, $insert);

            $_SESSION['status'] = "create account success!";
            header('Location: ../page/user_list.php'); 
            if(!empty($profile) && !empty($profile2)){
                $today = date('Y-m-d');
                 $date = date('Y-m-d H:i:s');
                date_default_timezone_set('Asia/Manila');
                $insert = "INSERT INTO users(ID, avatar, employeeID, email, password, access, first_name, middle_name, last_name, u_suffix, u_birthday, gender,date ) VALUES('$id', '$profile','$username','$email','$password','$access','$first_name','$middle_name','$last_name','$u_suffix','$u_birthday','$gender','$date')";
                $result  = $conn->query($insert);
    
                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }else if(!empty($profile) && empty($profile2)){
                $today = date('Y-m-d');
                $date = date('Y-m-d H:i:s');
                date_default_timezone_set('Asia/Manila');
               $insert = "INSERT INTO users(ID, avatar, employeeID, email, password, access, first_name, middle_name, last_name, u_suffix, u_birthday, gender,date) VALUES('$id', '$profile','$username','$email','$password','$access','$first_name','$middle_name','$last_name','$u_suffix','$u_birthday','$gender','$date')";
                $result  = $conn->query($insert);
    
                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }else if(empty($profile) && !empty($profile2)){
                $today = date('Y-m-d');
                $date = date('Y-m-d H:i:s');
                date_default_timezone_set('Asia/Manila');
                $insert = "INSERT INTO users(ID, avatar, employeeID, email, password, access, first_name, middle_name, last_name, u_suffix,u_birthday, gender,date) VALUES('$id', '$profile','$username','$email','$password','$access','$first_name','$middle_name','$last_name','$u_suffix','$u_birthday','$gender','$date')";
                $result  = $conn->query($insert);

                move_uploaded_file($_FILES['img']['tmp_name'], $target);

                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                
            }
            }
        }

    }
    
};

?>