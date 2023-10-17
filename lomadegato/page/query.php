<?php  include('../security/security.php');  ?>

<?php 

date_default_timezone_set('Asia/Manila');
if(isset($_POST['blotter_details'])){
    date_default_timezone_set('Asia/Manila');
    $id = $_POST['id'];
    $selectQuery = $conn->query("SELECT * FROM tbl_blotter WHERE blotterID='$id'")->fetch_assoc();
    echo json_encode($selectQuery);
}
if(isset($_POST['updateResident'])){
    date_default_timezone_set('Asia/Manila');
    $firstName =$_POST['firstName'];
       $middleName = $_POST['middleName'] =='' ? "" : $_POST['middleName'];
       $lastName =$_POST['lastName'];
       $suffixName = $_POST['suffixName'];
       $birthday =$_POST['birthday'];
       $bplace =$_POST['bplace'];
       $civil_status =$_POST['civil_status'];
       $maiden =$_POST['maiden'];
       $gender =$_POST['gender'];
       $occupation =$_POST['occupation'];
       $citizenship =$_POST['citizenship'];
       $voter =$_POST['voter'];
       $precint =$_POST['precint'];
       $contactTracer =$_POST['contactTracer'];
       $lifeStatus =$_POST['lifeStatus'];
       $res_province =$_POST['res_province'];
       $res_city =$_POST['res_city'];
       $res_house =$_POST['res_house'];
       $res_street =$_POST['res_street'];
       $res_barangay =$_POST['res_barangay'];
       $id = $_POST['res-id'];

       $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Update Resident','$residentID')";
$query = mysqli_query($conn, $activitylog);
       
        $query = "UPDATE tbl_resident_list SET 
                    `firstName`='$firstName' , 
                    `middleName` ='$middleName', 
                    `lastName` ='$lastName', 
                    `suffixName` ='$suffixName', 
                    `birthday` ='$birthday', 
                    `bplace` ='$bplace', 
                    `civil_status` ='$civil_status',
                    `maiden` ='$maiden',
                    `gender` ='$gender', 
                    `occupation` ='$occupation', 
                    `citizenship` ='$citizenship', 
                    `voter` ='$voter', 
                    `precint` ='$precint', 
                    `contactTracer` ='$contactTracer', 
                    `lifeStatus` ='$lifeStatus', 
                    `res_province` ='$res_province',
                    `res_city` ='$res_city',
                    `res_house` ='$res_house',
                    `res_street` ='$res_street',
                    `res_barangay` ='$res_barangay'
                    WHERE id = '$id'
                    ";



        $result = mysqli_query($conn, $query);
         if($result){
           
          $_SESSION['message'] = 'Successfully Updated!';
	        $_SESSION['success'] = 'success';
          header("Location:../page/resident_list.php");
        }

    
        
}
if(isset($_POST['resident_details'])){
    date_default_timezone_set('Asia/Manila');
    $id = $_POST['id'];
    $selectQuery = $conn->query("SELECT * FROM tbl_resident_list WHERE id='$id'")->fetch_assoc();
    echo json_encode($selectQuery);
}

if(isset($_POST['add-clearance'])){
    date_default_timezone_set('Asia/Manila');
$residentID =$_POST['resident'];
$purpose = $_POST['purpose'];
$cost = $_POST['cost'];
$residentcertID = 'RESI-'.strtotime(date("YmdHis"));
$today = date('Y-m-d');
$date = date('Y-m-d H:i:s');
$selectQuery = $conn->query("SELECT * FROM tbl_resident_cert WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND purpose='$purpose'")->fetch_assoc();
if($selectQuery){
   $_SESSION['message'] = 'Already have a existing certificate!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/clerance_list.php'); 
}else{
    $insert = "INSERT INTO `tbl_resident_cert`(`residentcertID`, `residentID`,resident_id, `employeeID`, `purpose`,cost,`date`) 
    VALUES ('$residentcertID','$residentID','$residentID','".$_SESSION['userID']."','$purpose','$cost','$date')";
  $result = mysqli_query($conn, $insert);
  
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Clearance','$residentID')";
        $query = mysqli_query($conn, $activitylog);

  if($result){
      $last_id = $conn->insert_id;
    echo '<script>alert("Success!")</script>';
      echo "<script> 
    
      location.href='../page/clerance_list.php'; 
      window.open('../page/print_resident_clearance.php?id=$last_id');
      </script>";
  }
}

}
if(isset($_POST['add-certificate'])){
  date_default_timezone_set('Asia/Manila');
    $residentID =$_POST['resident'];
    $purpose = $_POST['purpose'];
    $cost = $_POST['cost'];
    $residentcertID = 'BRGY-'.strtotime(date("YmdHis"));
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $selectQuery = $conn->query("SELECT * FROM tbl_barangay_cert WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND barangayPurpose='$purpose'")->fetch_assoc();
    if($selectQuery){
        $_SESSION['message'] = 'Already have a existing certificate!';
		$_SESSION['success'] = 'danger';
     header('Location:../page/certificate_list.php'); 
    }else{
        $insert = "INSERT INTO `tbl_barangay_cert`(`barangayID`, `residentID`,resident_id, `employeeID`, `barangayPurpose`,cost,`date`) 
        VALUES ('$residentcertID','$residentID','$residentID','".$_SESSION['userID']."','$purpose','$cost','$date')";
      $result = mysqli_query($conn, $insert);

      $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Certificate','$residentID')";
        $query = mysqli_query($conn, $activitylog);
      
      if($result){
          $last_id = $conn->insert_id;
       echo '<script>alert("Success!")</script>';
          echo "<script> 
        
          location.href='../page/certificate_list.php'; 
          window.open('../page/print_certificate.php?id=$last_id');
          </script>";
      }
    }
}
if(isset($_POST['add-service'])){
  date_default_timezone_set('Asia/Manila');
  $residentID =$_POST['resident'];
  $title = $_POST['title'];
  $add_details = $_POST['add_details'];
  $cost = $_POST['cost'];
  $serviceID = 'Service-'.strtotime(date("YmdHis"));
  $today = date('Y-m-d');
$date = date('Y-m-d H:i:s');
  $selectQuery = $conn->query("SELECT * FROM tbl_create_service WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND title='$title'AND add_details='$add_details'")->fetch_assoc();
  if($selectQuery){
      $_SESSION['message'] = 'Already have a existing certificate!';
  $_SESSION['success'] = 'danger';
   header('Location:../page/certificate_list.php'); 
  }else{
      $insert = "INSERT INTO `tbl_create_service`(`serviceID`, `residentID`,resident_id, `employeeID`, `title`, `add_details`,cost,`date`) 
      VALUES ('$serviceID','$residentID','$residentID','".$_SESSION['userID']."','$title','$add_details','$cost','$date')";
    $result = mysqli_query($conn, $insert);

       
    
    if($result){
    
         $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Service Clearance','$residentID')";
        $query = mysqli_query($conn, $activitylog); 
        $last_id = $conn->insert_id;
     echo '<script>alert("Success!")</script>';
        echo "<script> 
      
        location.href='../page/create_service.php'; 
        
        window.open('../page/print_service.php?id=$last_id');
        </script>";
    }
  }
}
if(isset($_POST['add-indigency'])){
  date_default_timezone_set('Asia/Manila');
    $residentID =$_POST['resident'];
    $purpose = $_POST['purpose'];
    $cost = $_POST['cost'];
    $residentcertID = 'IND-'.strtotime(date("YmdHis"));
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $selectQuery = $conn->query("SELECT * FROM tbl_indigency_cert WHERE resident_id='$residentID' AND DATE(`date`)='$today' AND indigencyPurpose='$purpose'")->fetch_assoc();
    if($selectQuery){
        $_SESSION['message'] = 'Already have a existing indigency!';
		$_SESSION['success'] = 'danger';
    header('Location:../page/indigency_list.php'); 
    }else{
        $insert = "INSERT INTO `tbl_indigency_cert`(`indigencyCertID`, `residentID`,resident_id, `employeeID`, `indigencyPurpose`,cost,`date`) 
        VALUES ('$residentcertID','$residentID','$residentID','".$_SESSION['userID']."','$purpose','$cost','$date')";
      $result = mysqli_query($conn, $insert);

      
      $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Indigency','$residentID')";
        $query = mysqli_query($conn, $activitylog);


      if($result){
          $last_id = $conn->insert_id;
         echo '<script>alert("Success!")</script>';
          echo "<script> 
        
          location.href='../page/indigency_list.php'; 
          window.open('../page/print_indigency.php?id=$last_id');
          </script>";
      }
    }
}
if(isset($_POST['add-business'])){
  date_default_timezone_set('Asia/Manila');
    $resident_id =$_POST['resident'];
    $business_name =$_POST['business-name'];
    $business_type =$_POST['business-type'];
    $address =$_POST['address'];
    $cost =$_POST['cost'];
    $today = date('Y-m-d');
    $date = date('Y-m-d H:i:s');
    $residentcertID = 'BUS-'.strtotime(date("YmdHis"));
    $selectQuery = $conn->query("SELECT * FROM tbl_clearance WHERE resident_id='$resident_id' AND DATE(`date`)='$today' AND business_name='$business_name'")->fetch_assoc();
    if($selectQuery){
      $_SESSION['message'] = 'Already have a existing  business clearance!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/business_list.php'); 
    }else{
        
        $insert = "INSERT INTO `tbl_clearance`(`clearanceID`, `employeeID`,type_business, `business_name`,`address`,cost,resident_id,`date`) 
        VALUES ('$residentcertID','".$_SESSION['userID']."','$business_type','$business_name','$address','$cost','$resident_id','$date')";

        $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Business Clearance','')";
        $query = mysqli_query($conn, $activitylog);

     $result = mysqli_query($conn, $insert);
      if($result){
    
        $last_id = $conn->insert_id;
      echo '<script>alert("Success!")</script>';
        echo "<script> 
      
        location.href='../page/business_list.php'; 
        window.open('../page/print_business.php?id=$last_id');
        </script>";
        }
    }
}



if(isset($_POST['brgy_clearance'])){
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
  VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing a Barangay Clearance','')";
  $query = mysqli_query($conn, $activitylog); 
      if($result){
      echo '<script>alert("Success!")</script>';
        echo "<script> 
        location.href='../page/clerance_list.php'; 
        window.open('../page/print_resident_clearance.php?id=$last_id');
        </script>";
        }
      }
    

if(isset($_POST['certificate_list'])){
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing Barangay Certificate','$residentID')";
        $query = mysqli_query($conn, $activitylog);
      if($result){
      echo '<script>alert("Success!")</script>';
        echo "<script> 
        location.href='../page/certificate_list.php'; 
        window.open('../page/print_certificate.php?id=$last_id');
        </script>";
        }
      }


if(isset($_POST['indigency_cert'])){
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing a Indigency Certificate','$residentID')";
        $query = mysqli_query($conn, $activitylog);

      if($result){
      echo '<script>alert("Success!")</script>';
        echo "<script> 
      
        location.href='../page/indigency_list.php'; 
        window.open('../page/print_indigency.php?id=$last_id');
        </script>";
        }
      }


 if(isset($_POST['business_cert'])){
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`)
         VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing a Business Clearance','')";
        $query = mysqli_query($conn, $activitylog);

      if($result){
      echo '<script>alert("Success!")</script>';
        echo "<script> 
      
        location.href='../page/business_list.php'; 
        window.open('../page/print_business.php?id=$last_id');
        </script>";
        }
      }



if(isset($_POST['printservice'])){
  $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
  VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing a Service Clearance','')";
  $query = mysqli_query($conn, $activitylog); 
      if($result){
      echo '<script>alert("Success!")</script>';
        echo "<script> 
        location.href='../page/create_service.php'; 
        window.open('../page/print_service.php?id=$last_id');
        </script>";
        }
      }


// if(isset($_POST['printresident'])){
//   if($result){

//     $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
//     VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Printing a Resident List','')";
//     $query = mysqli_query($conn, $activitylog); 
                                    
//         $result = mysqli_query($conn, $insert);
//       if($result){
//       echo '<script>alert("Success!")</script>';
//         echo "<script> 
      
//         location.href='../page/resident_list.php'; 
//         window.open('../page/print_list_resident.php?id=$last_id');
//         </script>";
//         }
//       }
// }

// if(isset($_POST['addresident'])){
//   if($result){

//     $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
//     VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a New Resident','$residentID')";
//     $query = mysqli_query($conn, $activitylog);

//         $result = mysqli_query($conn, $insert);
//       if($result){
//       echo '<script>alert("Success!")</script>';
//         echo "<script> 
      
//         location.href='../page/resident_list.php'; 
//         window.open('../page/print_list_resident.php?id=$last_id');
//         </script>";
//         }
//       }
// }

// if(isset($_POST['deletebrgyclear'])){
//   if($result){

//     $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
//     VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Deleting a Barangay Clearance','$residentID')";
//     $query = mysqli_query($conn, $activitylog);

//         $result = mysqli_query($conn, $insert);
//       if($result){
//       echo '<script>alert("Success!")</script>';
//         echo "<script> 
      
//         location.href='../page/resident_list.php'; 
//         window.open('../code/clerance_list_delete.php.php?id=$last_id');
//         </script>";
//         }
//       }
// }

// if(isset($_POST['addofficial'])){
//   if($result){

//     $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`, `action`,`clearanceID`) 
//     VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding a Barangay Official','$residentID')";
//     $query = mysqli_query($conn, $activitylog);

//         $result = mysqli_query($conn, $insert);
//       if($result){
//       echo '<script>alert("Success!")</script>';
//         echo "<script> 
      
//         location.href='../page/officials.php'; 
//         window.open('');
//         </script>";
//         }
//       }
// }

// ?>

    
