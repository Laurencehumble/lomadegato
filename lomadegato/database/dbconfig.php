<?php date_default_timezone_set('Asia/Manila'); ?>

<?php
$host = "brgy-lomadegato.online";
$username = "u595246167_barangay";
$password = "9:Xco+zo7aEH";
$database = "u595246167_barangay";
$conn = new mysqli($host,$username,$password,$database);

if ($conn->connect_error) {
    echo $conn->connect_error;
}else {
mysqli_query($conn, "SET SESSION time_zone = 'Asia/Manila'");
    return $conn;
}
?>