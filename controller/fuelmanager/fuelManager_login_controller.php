<?php
session_start();
require_once("../../config.php");
include_once("../../model/fuelmanager/fuelManager_model.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}else{
   echo "Invalid request";
   exit();
}

$username=$connection->real_escape_string($username);
$password=md5($connection->real_escape_string($password));

$user=new fuel_manager();
$result=$user->loginFuelManager($connection,$username,$password);

if($result){
    $_SESSION['login']="success";
    header("Location: ../../view/fuelmanager/fuelManager_Dashboard.php");
    $connection->close();
    exit();
}else{
    $_SESSION['login']="failed";
    header("Location: ../../view/fuelmanager/fuelManager_login.php");
    $connection->close();
    exit();
}

