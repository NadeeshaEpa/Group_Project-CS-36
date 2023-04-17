<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/complaneModel.php");

$user=new Complain(); 
$result=$user->getUserComplainsDetails($connection);


if($result==true){
    $_SESSION['userComplainDetails']=$result;
    header("Location: ../../view/gasagent/complain_view.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/gasagent/complain_view.php");
    $connection->close();
    exit();
}