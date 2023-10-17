<?php 
include('../security/security.php');

if (isset($_POST['clearance_submit'])) {


        $bname = $_POST['bname'];
        $owner = $_POST['owner'];
        $partner_owner = $_POST['partner_owner'];
        $nature = $_POST['nature'];
        $date = $_POST['date'];
        
        $query = "SELECT * FROM tbl_clearance ORDER BY clearanceID DESC LIMIT 1";
   $result1 = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result1);

   $clearanceid='';
   
   
   $lastid = $row;
       if($lastid == "employeeID")
       {
        $clearanceid = "CID-";
       }
       else
       {
           
           $rand = "CID-" . date("y")."-".strtotime(date("His"))."-".date("m");
            
           $clearanceid = $rand;
       }

            $query = " INSERT INTO `tbl_clearance`(`clearanceID`, `bname`, `owner`, `partner_owner`, `nature`, `date`) VALUES ('$clearanceid','$bname','$owner','$partner_owner','$nature','$date')";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                header("Location: ../page/clearance_list.php?success= successfully created! ");
            }
            else
            {
               header("Location: ../page/addClearance.php?error=unknown error occured&user_data");
            }
        }




?>