<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/deliveryPersonLocationModel.php");

if(isset($_POST['check'])){
    $user=new location();
    $result=$user->AddDeliveryPerson($connection);
    if($result==true){
        $_SESSION['DeliveryRequestDetails']=$result;
        // $data = json_encode($$result);
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    
    }
    
}

if(isset($_POST['DeliveryReDeclineName'])){
    $orderId=$_POST['DeliveryOrder'];
    $orderId=$connection->real_escape_string($orderId);
    $user=new location();
    $result=$user->AddDeliveryDecline($connection,$orderId);
    if($result==true){
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    
}

if(isset($_POST['DeliveryReAcceptName'])){
    $orderId=$_POST['DeliveryOrder'];
    $orderId=$connection->real_escape_string($orderId);
    $user=new location();
    $result=$user->AcceptDeliveryRequest($connection,$orderId);
    if($result==true){
        $_SESSION['OrderDetailsOfRequest']=$result;
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    
}



if(isset($_POST['DeliveryRePendingName'])){
    $orderId=$_POST['DeliveryOrder'];
    $DeliveryFee=$_POST['DeliveryRequestDeliveryFee'];
    $orderId=$connection->real_escape_string($orderId);
    $DeliveryFee=$connection->real_escape_string($DeliveryFee);
    $user=new location();
    $result=$user->PendingDeliveryRequest($connection,$orderId,$DeliveryFee);
    if($result==true){
       
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest.php");
        $connection->close();
        exit();
    
    }
    
}

