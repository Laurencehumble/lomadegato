<?php include('../security/security.php');



if (isset($_POST['submit'])) {
  $id =$_POST['id'];
  // $purpose_res =$_POST['purpose_res'];
   $firstName =$_POST['firstName'];
   $middleName = $_POST['middleName']  ??'';
   $lastName =$_POST['lastName'];
   $suffixName = $_POST['suffixName'];
   $birthday =$_POST['birthday'];
   $bplace =$_POST['bplace'];
   $civil_status =$_POST['civil_status'];
   $maiden =$_POST['maiden'] ??'';
   $gender =$_POST['gender'];
   $occupation =$_POST['occupation'];
   $citizenship =$_POST['citizenship'];
   $voter =$_POST['voter'];
   $precint =$_POST['precint'] ??'';
   $contactTracer =$_POST['contactTracer'];
   $lifeStatus =$_POST['lifeStatus'];
   $res_province =$_POST['res_province'];
   $res_city =$_POST['res_city'];
   $res_house =$_POST['res_house'];
   $res_street =$_POST['res_street'];
   $res_barangay =$_POST['res_barangay'];
   
  
   
   
   $query = "SELECT * FROM tbl_resident_list ORDER BY residentID DESC LIMIT 1";
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result);

   $empid='';
   
   
   $lastid = $row;
       if($lastid == "employeeID")
       {
           $empid = "RID-";
       }
       else
       {
           
           $rand = "RID-" . date("y")."-".strtotime(date("His"))."-".date("m");
            
            $empid = $rand;
       }
    

 //   $duplicate=mysqli_query($conn,"SELECT * FROM tbl_resident_list WHERE firstName='$firstName' AND middleName='$middleName' AND lastName='$lastName'");
//   if (mysqli_num_rows($duplicate)>0)
//   {
//             $_SESSION['message'] = 'Duplicated firstname or lastname or middlename already exists!';
//             $_SESSION['error'] = 'danger';
//   // header("Location: ../page/addResident.php");
//           echo '<script>alert("Duplicated firstname or lastname or middlename already exists!")</script>';
//           echo "<script> location.href='../page/resident_list.php'; </script>";
//   }

 $sql1 = "SELECT * FROM tbl_resident_list WHERE firstName='$firstName'AND lastName='$lastName'";
  $user1 = $conn->query($sql1) or die ($conn->error);
  $row = $user1->fetch_assoc();

  $result_register1 = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result_register1) > 0) {

    $_SESSION['message'] = 'Duplicated Resident already exists!';
    $_SESSION['success'] = 'danger';
     header("Location: ../page/resident_list.php");
  // echo '<script>alert("Duplicated firstname already exists!")</script>';
  // echo "<script> location.href='../page/resident_list.php'; </script>";
  exit();
  }

   else{


    $query = "INSERT INTO `tbl_resident_list`(`id`,`residentID`, `firstName`, `middleName`, `lastName`, `suffixName`, `birthday`, `bplace`, `civil_status`, `maiden`, `gender`, `occupation`, `citizenship`, `voter`, `precint`, `contactTracer`, `lifeStatus`, `res_province`, `res_city`, `res_house`, `res_street`, `res_barangay`)
    VALUES ('$id','$empid','$firstName','$middleName','$lastName','$suffixName','$birthday','$bplace','$civil_status','$maiden','$gender','$occupation','$citizenship','$voter','$precint','$contactTracer','$lifeStatus','$res_province','$res_city','$res_house','$res_street','$res_barangay')";
              $result = mysqli_query($conn, $query);

              $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
              VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding Resident','$residentID')";
              $query = mysqli_query($conn, $activitylog);

        if($result){
           
          $_SESSION['message'] = 'Successfully Created!';
		      $_SESSION['success'] = 'success';
          header("Location:../page/resident_list.php");
            // echo '<script>alert("Successfully Created")</script>';
            // echo "<script> location.href='../page/resident_list.php'; </script>";
        }
    // header('Location: ../page/resident_list.php'); 
     
            // }
   }
}


?>