<?php 
include('../security/security.php');

    
	

    if(isset($_POST['insertdata_brgy']))
{

    $name 	= $conn->real_escape_string($_POST['name']);
	$chair 	= $conn->real_escape_string($_POST['chair']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$start 	= $conn->real_escape_string($_POST['start']);
    $end 	= $conn->real_escape_string($_POST['end']);
	$status 	= $conn->real_escape_string($_POST['status']);
    
        $insert  = "INSERT INTO tbl_officials (`name`, `chairmanship`, `position`, termstart, termend, `status`) VALUES ('$name', '$chair','$pos', '$start','$end', '$status')";
        $result  = $conn->query($insert);

        if($query_run)
        {
            $_SESSION['status'] = "Data Inserted Successfully";
            header('Location: generate_brgy_cert.php');
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    ?>