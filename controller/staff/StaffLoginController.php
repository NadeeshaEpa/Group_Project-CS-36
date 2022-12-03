<?php
session_start();
require_once("../../config.php");
include_once("../../model/staff/staffModel.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}else{
   echo "Invalid request";
   exit();
}

$username=$connection->real_escape_string($username);
$password=($connection->real_escape_string($password));

$user=new staff();
$result=$user->loginStaff($connection,$username,$password);

if($result){
    $_SESSION['login']="success";
    header("Location: ../../view/staff/StaffDashboard.php");
    $connection->close();
    exit();
}else{
    $_SESSION['login']="failed";
    header("Location: ../../view/staff/StaffLogin.php");
    $connection->close();
    exit();
}