 <?php 
 include('database/dbconfig.php');
 session_start();



 header('Content-Type: application/json; charset=utf-8');

//  $query=mysqli_query($conn,"SELECT * FROM tbl_resident_list WHERE id ");
//  $result = mysqli_query($conn, $query);
//  $row = mysqli_fetch_array($result);
 
   
//      $row = array('input_resident_id'=> $row['input_resident_id'],'validationCustom01'=> $row['firstName'],
//   'middleName'=>$row['middleName'],
//   'lastName'=>$row['lastName'],
//   'suffixName'=> $row['suffixName'],
//   'birthday'=> $row['birthday'],
//   'bplace'=> $row['bplace'],
//   'gender'=> $row['gender'],
//   'occupation'=> $row['occupation'],
//   'citizenship'=> $row['citizenship'],
//   'voter'=> $row['voter'],
//   'precint'=> $row['precint'],
//   'contactTracer'=> $row['contactTracer'],
//   'lifeStatus'=> $row['lifeStatus'],
//   'res_province'=> $row['res_province'],
//   'res_city'=> $row['res_city'],
//   'res_house'=> $row['res_house'],
//   'res_street'=> $row['res_street'],
//   'res_barangay'=> $row['res_barangay'] );
   
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query="SELECT * FROM tbl_resident_list WHERE id LIKE '$id' LIMIT 1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  
    if($row ?? false){
      $row = array('id'=> $row['id'],'validationCustom01'=> $row['firstName'],
      'middleName'=>$row['middleName'],
      'lastName'=>$row['lastName'],
      'suffixName'=> $row['suffixName'],
      'birthday'=> $row['birthday'],
      'bplace'=> $row['bplace'],
      'civil_status'=> $row['civil_status'],
      'gender'=> $row['gender'],
      'occupation'=> $row['occupation'],
      'citizenship'=> $row['citizenship'],
      'voter'=> $row['voter'],
      'precint'=> $row['precint'],
      'contactTracer'=> $row['contactTracer'],
      'lifeStatus'=> $row['lifeStatus'],
      'res_province'=> $row['res_province'],
      'res_city'=> $row['res_city'],
      'res_house'=> $row['res_house'],
      'res_street'=> $row['res_street'],
      'res_barangay'=> $row['res_barangay'] 
    );

    }
   
         echo json_encode($row);
}




      //  if(isset($_POST['res'])){
      //         $query = "INSERT INTO `tbl_resident_list`(`input_resident_id`, `purpose_res`, `residentID`, `firstName`, `middleName`, `lastName`, `suffixName`, `birthday`, `bplace`, `civil_status`, `maiden`, `gender`, `occupation`, `citizenship`, `voter`, `precint`, `contactTracer`, `lifeStatus`, `res_province`, `res_city`, `res_house`, `res_street`, `res_barangay`)
      //         VALUES ('$input_resident_id','$purpose_res','$empid','$firstName','$middleName','$lastName','$suffixName','$birthday','$bplace','$civil_status','$maiden','$gender','$occupation','$citizenship','$voter','$precint','$contactTracer','$lifeStatus','$res_province','$res_city','$res_house','$res_street','$res_barangay')";
      //                   $result = mysqli_query($conn, $query);
      //             if($result){
      //             echo '<script>alert("Success!")</script>';
      //               echo "<script> 
      //               location.href='residentForm.php'; 
      //               </script>";
      //               }
      //             }

?> 

<?php 
//  include('database/dbconfig.php');
//  session_start();
//  header('Content-Type: application/json; charset=utf-8');
//  $info= [];
//  if (isset($_POST['submit'])) {
//     $input_resident_id =$_POST['input_resident_id'];
//      $firstName =$_POST['firstName'];
//      $middleName = $_POST['middleName'] =='' ? "" : $_POST['middleName'];
//      $lastName =$_POST['lastName'];
//      $suffixName = $_POST['suffixName'];
//      $birthday =$_POST['birthday'];
//      $bplace =$_POST['bplace'];
//      $gender =$_POST['gender'];
//      $occupation =$_POST['occupation'];
//      $citizenship =$_POST['citizenship'];
//      $voter =$_POST['voter'];
//      $precint =$_POST['precint'];
//      $contactTracer =$_POST['contactTracer'];
//      $lifeStatus =$_POST['lifeStatus'];
//      $res_province =$_POST['res_province'];
//      $res_city =$_POST['res_city'];
//      $res_house =$_POST['res_house'];
//      $res_street =$_POST['res_street'];
//      $res_barangay =$_POST['res_barangay'];
     

//  $query="SELECT * FROM tbl_resident_list WHERE id = '".$_POST['id']."'";
//  $result = mysqli_query($conn,$query);
//  $info= mysqli_fetch_array($result);
// //llop
// $info = [
//     'validationCustom01'=> 'validationCustom01',
//     'middleName'=>'middleName',
//     'lastName'=> 'lastName',
//     'suffixName'=> 'suffixName',
//     'birthday'=> 'birthday',
//     'bplace'=> 'bplace',
//     'gender'=> 'gender',
//     'occupation'=> 'occupation',
//     'citizenship'=> 'citizenship',
//     'voter'=> 'voter',
//     'precint'=> 'precint',
//     'contactTracer'=> 'contactTracer',
//     'lifeStatus'=> 'lifeStatus',
//     'res_province'=> 'res_province',
//     'res_city'=> 'res_city',
//     'res_house'=> 'res_house',
//     'res_street'=> 'res_street',
//     'res_barangay'=> 'res_barangay'
// ];
// echo json_encode($info);
// exit;
//  }

?> 