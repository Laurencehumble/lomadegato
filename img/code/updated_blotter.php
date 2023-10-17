<?php
include('../security/security.php');

if (isset($_GET['blotterID'])) {

 

    $id = $_GET['blotterID'];
    $query = "SELECT * FROM tbl_blotter ORDER BY blotterID DESC LIMIT 1";
    $result1 = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result1);


}else if (isset($_POST['blotter_update'])) {
   
    $complainant = $_POST['complainant'];
    $respondent = $_POST['respondent'];
    $victim = $_POST['victim'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $details = $_POST['details'];
    $status = $_POST['status'];
    $resident_id = $_POST['resident_id'];
    $id = $_POST['blotterID'];
        $query = " UPDATE tbl_blotter SET resident_id='$resident_id', complainant = '$complainant', respondent ='$respondent', victim ='$victim', location ='$location', date='$date', time='$time', details='$details', status='$status' where blotterID ='$id'";
        $result = mysqli_query($conn, $query);

        $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Update Blotter','$residentID')";
        $query = mysqli_query($conn, $activitylog);

       if($result)
        {
            $_SESSION['message'] = 'Successfully Updated!';
		$_SESSION['success'] = 'success';
          header("Location:../page/blotter_list.php");
        }
        else
        {
            $_SESSION['message'] = 'unknown error occured&user_data!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/blotter_list.php'); 
        }
}else{
    $_SESSION['message'] = 'unknown error occured&user_data!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/blotter_list.php'); 
}
