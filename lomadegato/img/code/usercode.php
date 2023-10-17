<?php 
include('../security/security.php');

if (isset($_POST['user_submit'])) {


    $id= $_POST['ID'];
        $employeeID = $_POST['employeeID'];
        $email = $_POST['email'];
        $access = $_POST['access'];
        $date = $_POST['date'];
        $profile = $_POST['pp'];
        
        
        $query = "SELECT * FROM users ORDER BY ID DESC LIMIT 1";
   $result1 = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result1);

  

            $query = " INSERT INTO `users` (`ID`,`employeeID`, `email`, `access`, `date`, `pp`, `date`) values('$id','$employeeID','$email','$access','$date','$pp','$date')";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                header("Location: ../page/user.php?success= successfully created! ");
            }
            else
            {
               header("Location: ../page/user.php?error=unknown error occured&user_data");
            }
        }




?>