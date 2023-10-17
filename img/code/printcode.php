<?php include('../security/security.php');



if (isset($_POST['printindigencyBTN'])) {

$residentID =$_POST['residentID'];
$purpose = $_POST['purpose'];
$indigencyCertID = 'IND-'.strtotime(date("YmdHis"));



$insert = "INSERT INTO `tbl_indigency_cert`(`indigencyCertID`, `residentID`, `employeeID`, `indigencyPurpose`) 
  VALUES ('$indigencyCertID','$residentID','".$_SESSION['userID']."','$purpose')";
$result = mysqli_query($conn, $insert);



}

if (isset($_POST['printresidentBTN'])) {

  $residentID =$_POST['residentID'];
  $purpose = $_POST['purpose'];
  $residentcertID = 'RESI-'.strtotime(date("YmdHis"));
  
  
  
  $insert = "INSERT INTO `tbl_resident_cert`(`residentcertID`, `residentID`, `employeeID`, `residentPurpose`) 
    VALUES ('$residentcertID','$residentID','".$_SESSION['userID']."','$purpose')";
  $result = mysqli_query($conn, $insert);
  
  
  
  }

  if (isset($_POST['printbarangayBTN'])) {

    $residentID =$_POST['residentID'];
    $purpose = $_POST['purpose'];
    $barangayID = 'BRGY-'.strtotime(date("YmdHis"));
    
    
    
    $insert = "INSERT INTO `tbl_barangay_cert`(`barangayID`, `residentID`, `employeeID`, `barangayPurpose`) 
      VALUES ('$barangayID','$residentID','".$_SESSION['userID']."','$purpose')";
    $result = mysqli_query($conn, $insert);
    
    
    
    }

// if (isset($_POST['printresidentBTN'])) {

//   $residentID =$_POST['residentID'];
//   $purpose = $_POST['purpose'];
//   $residentcertID = 'RES-'.strtotime(date("YmdHis"));
  
  
  
//   $insert = "INSERT INTO `tbl_resident_cert`(`residentcertID`, `residentID`, `employeeID`, `residentPurpose`) 
//     VALUES ('$residentcertID','$residentID','".$_SESSION['userID']."','$purpose')";
//   $result = mysqli_query($conn, $insert);
  
  
  
//   }
?>