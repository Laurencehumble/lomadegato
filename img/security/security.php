<?php
session_start();
include('../database/dbconfig.php');

if(!isset($_SESSION['userID'])){
    header('Location: ../login.php');
}
if(!isset( $_SESSION['Access'])){
    header('Location: ../login.php');
}
if(!isset( $_SESSION['Email'])){
    header('Location: ../login.php');
}
if(!isset( $_SESSION['Employee'])){
    header('Location: ../login.php');
}
if(!isset( $_SESSION['Date'])){
    header('Location: ../login.php');
}




?>