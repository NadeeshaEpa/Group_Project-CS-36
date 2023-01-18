<?php
session_start();
require_once("../../config.php");
require_once '../../model/admin/admin_model.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}else{
   echo "Invalid request";
   exit();
}
$username=$connection->real_escape_string($username);
$password=md5($connection->real_escape_string($password));

$user=new admin_model();
$result=$user->loginAdmin($connection,$username,$password);

if($result){
    $_SESSION['login']="success";
    header("Location: ../../view/admin/admin_dashboard.php");
    $connection->close();
    exit();
}else{
    $_SESSION['login']="failed";
    header("Location: ../../view/admin/admin_login.php");
    $connection->close();
    exit();
}