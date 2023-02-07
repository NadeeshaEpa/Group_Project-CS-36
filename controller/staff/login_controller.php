<?php
session_start();
require_once("../../config.php");
require_once '../../model/staff/staff_model.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}else{
   echo "Invalid request";
   exit();
}
$username=$connection->real_escape_string($username);
$password=md5($connection->real_escape_string($password));

$user=new staff_model();
$result=$user->loginStaff($connection,$username,$password);

if($result){
    $_SESSION['login']="success";
    header("Location: ../../view/staff/staff_dashboard.php");
    $connection->close();
    exit();
}else{
    $_SESSION['login']="failed";
    header("Location: ../../view/staff/staff_login.php");
    $connection->close();
    exit();
}