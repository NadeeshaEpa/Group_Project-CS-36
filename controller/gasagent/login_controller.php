<?php
session_start();
require_once("../../config.php");
require_once '../../model/gasagent/gasagent_model.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}else{
   echo "Invalid request";
   exit();
}
$username=$connection->real_escape_string($username);
$password=md5($connection->real_escape_string($password));

$user=new gasagent_model();
$result=$user->logingasagent($connection,$username,$password);

if($result){
    $_SESSION['login']="success";
    header("Location: ../../controller/gasagent/gasagent_order_controller.php");
    $connection->close();
    exit();
}else{
    $_SESSION['login']="failed";
    header("Location: ../../view/gasagent/gasagent_login.php");
    $connection->close();
    exit();
}