<?php include('database/dbconfig.php');
session_start();

global $conn;



if (isset($_POST['submit'])) {
  $id =$_POST['id'];
  $input_resident_id =$_POST['input_resident_id'];
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
   
  
   
   
   $query = "SELECT * FROM tbl_resident_list ORDER BY residentID ASC";
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

    $_SESSION['message'] = '<center>Success existing details!
    <br>
    <br>
    Thank you for your inquiry. We would like to inform you that in order to claim your clearances, in our Barangay, you need to bring valid identification along with required fee. This policy ensure security and accuracy of the clearance process.
    </center>';
    $_SESSION['success'] = 'success';
    header("Location:residentClerance.php?id=".$id);
  // echo '<script>alert("Duplicated firstname already exists!")</script>';
  // echo "<script> location.href='../page/resident_list.php'; </script>";
  exit();
  }

   else{


    if(isset($_POST['id'])){
      $id = $_POST['id'];
    
      $query3 = "SELECT * FROM tbl_resident_list 
      LEFT JOIN tbl_resident_cert
      ON tbl_resident_cert.resident_id = tbl_resident_list.id
      ORDER BY tbl_resident_list.id ASC";
      $result = $conn->query($query3);

  $query = "INSERT INTO `tbl_resident_list`(`id`,`input_resident_id`, `residentID`, `firstName`, `middleName`, `lastName`, `suffixName`, `birthday`, `bplace`, `civil_status`, `maiden`, `gender`, `occupation`, `citizenship`, `voter`, `precint`, `contactTracer`, `lifeStatus`, `res_province`, `res_city`, `res_house`, `res_street`, `res_barangay`)
  VALUES ('$id','$input_resident_id','$empid','$firstName','$middleName','$lastName','$suffixName','$birthday','$bplace','$civil_status','$maiden','$gender','$occupation','$citizenship','$voter','$precint','$contactTracer','$lifeStatus','$res_province','$res_city','$res_house','$res_street','$res_barangay')";
            $result = mysqli_query($conn, $query);


        if($result){
          echo $id;
          $_SESSION['success'] = 'success';
          $_SESSION['message'] = ' <center>Successfully Created!
          <br>
          <br>
          Thank you for your inquiry. We would like to inform you that in order to claim your clearances, in our Barangay, you need to bring valid identification along with required fee. This policy ensure security and accuracy of the clearance process.
          </center>';
		     
          header("Location:residentClerance.php?id=".$id);
            // echo '<script>alert("Successfully Created")</script>';
            // echo "<script> location.href='../page/resident_list.php'; </script>";
        }
    // header('Location: ../page/resident_list.php'); 
     
             }
   }
}

?>