<?php
include('../security/security.php');

if (isset($_GET['clearanceID'])) {
 

    $idc = $_GET['clearanceID'];
    $query = "SELECT * FROM tbl_clearance ORDER BY clearanceID DESC LIMIT 1";
    $result1 = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result1);


}else if (isset($_POST['clearance_update'])) {
   
    $bname = $_POST['bname'];
    $owner = $_POST['owner'];
    $partner_owner = $_POST['partner_owner'];
    $nature = $_POST['nature'];
    $date = $_POST['date'];
    
    $idc = $_POST['clearanceID'];
        $query = " UPDATE tbl_clearance SET bname = '$bname', owner ='$owner', partner_owner ='$partner_owner', nature='$nature', date ='$date' where clearanceID ='$idc'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("Location: ../page/clearance_list.php?success= successfully Updated! ");
        }
        else
        {
           header("Location: ../page/clearance_update.php?error=unknown error occured&user_data");
        }
}else{
    header("Location: ../page/clearance_list.php");
}

