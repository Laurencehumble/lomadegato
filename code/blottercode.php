<?php 
include('../security/security.php');

// if (isset($_POST['blotter_submit'])) {


    $complainant = $_POST['complainant'];
        $respondent = strtoupper($_POST['respondent']);
        $victim = $_POST['victim'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $details = $_POST['details'];
        $status = $_POST['status'];
        if(isset($_POST['resident_id'])){
             $resident_id = $_POST['resident_id'];
        }else{
            $resident_id = null;
        }
       
        
        $query = "SELECT * FROM tbl_blotter ORDER BY blotterID DESC LIMIT 1";
   $result1 = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result1);

   $blotterid='';
   
   
   $lastid = $row;
       if($lastid == "employeeID")
       {
        $blotterid = "BID-";
       }
       else
       {
           
           $rand = "BID-" . date("y")."-".strtotime(date("His"))."-".date("m");
            
           $blotterid = $rand;
       }

            $query = " INSERT INTO `tbl_blotter` (`blotterID`,`complainant`, `respondent`, `victim`, `location`, `date`, `time`, `details`, `status`,resident_id) values('$blotterid','$complainant','$respondent','$victim','$location','$date','$time','$details','$status','$resident_id')";
            $result = mysqli_query($conn, $query);


            $activitylog = "INSERT INTO `activitylog`(`employee_id`,`fullname`,`action`,`clearanceID`) 
        VALUES ('".$_SESSION['userID']."','".$_SESSION['Email']."','Adding Blotter','$residentID')";
        $query = mysqli_query($conn, $activitylog);

            if($result)
            {
                $_SESSION['message'] = 'Successfully Created!';
		$_SESSION['success'] = 'success';
          header("Location:../page/blotter_list.php");
            }
            else
            {
              $_SESSION['message'] = '"Not Saved!';
		$_SESSION['success'] = 'danger';
    header('Location: ../page/blotter_list.php'); 
            }
        // }




?>