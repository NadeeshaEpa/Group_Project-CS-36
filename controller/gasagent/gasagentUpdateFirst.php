<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/updateModel.php");

$user=new update(); 
$result=$user->getdate($connection);

if($result==true){
    $_SESSION['Gas_UP_details']=$result;
    header("Location: ../../view/gasagent/gasagentUpdate.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/gasagent/gasagentUpdate.php");
    $connection->close();
    exit();
}