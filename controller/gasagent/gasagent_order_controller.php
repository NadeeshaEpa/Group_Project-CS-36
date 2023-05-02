<?php
session_start();
require_once("../../config.php");
require_once '../../model/gasagent/gasagent_order_model.php';
require_once '../../model/gasagent/ViewGasType_model.php';
$agentId = $_SESSION['User_id'];

$user=new orders(); 
$result=$user->gasDashDetails($connection);

$getGasType = new ViewGasType();
$gasTypeResults = $getGasType->fetchGasType($connection, $agentId);


if(!$gasTypeResults){
    header("Location: ../../view/gasagent/gasagent_dashboard.php");
    $connection->close();
    exit();
}else {
    $_SESSION['low_stack_details']=$gasTypeResults;
}

if($result==true){
    $_SESSION['Gas_Dashboard_details']=$result;
    header("Location: ../../view/gasagent/gasagent_dashboard.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/gasagent/gasagent_dashboard.php");
    $connection->close();
    exit();
}