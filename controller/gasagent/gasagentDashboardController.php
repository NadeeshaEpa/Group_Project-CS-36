<?php 
session_start();

require_once('../../config.php');
require_once('../../model/gasagent/order_model.php');

if(isset($_POST['deliverbtn'])){
    $user=new Brand_reports(); 
    $result=$user->DeliveredOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/gasagent/orderd.php");
        $_SESSION['GDeliveredOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['pickedbtn'])){
    $user=new Brand_reports(); 
    $result=$user->PickedOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/gasagent/pick.php");
        $_SESSION['GPickedOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();}


}