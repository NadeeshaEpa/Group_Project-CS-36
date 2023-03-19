<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/delivery_model.php';


if(isset($_GET['id'])){
    $delivery=new delivery_model();
    $result=$delivery->viewdelivery($connection);
    if($result){
        $_SESSION['deliverydetails']=$result;
        header("Location:../../view/staff/deliveries.php");
    }else{
        $_SESSION['deliverydetails']=[];
        header("Location:../../view/staff/deliveries.php");
    }

}

if(isset($_GET['rid'])){
    $delivery=new delivery_model();
    $result=$delivery->viewdeliveryrequest($connection);
    if($result){
        $_SESSION['deliveryrequestdetails']=$result;
        header("Location:../../view/staff/delivery_request.php");
    }else{
        $_SESSION['deliveryrequestdetails']=[];
        header("Location:../../view/staff/delivery_request.php");
    }

}

if(isset($_GET['oid'])){
    $order_id=$_GET['oid'];
    $order_id=$connection->real_escape_string($order_id);
    $delivery=new delivery_model();
    $result=$delivery->check_ordertype($connection,$order_id);
    if($result==true){
        header("Location:../../controller/staff/order_controller.php?vid=$order_id");
    
    }else{
        header("Location:../../controller/staff/order_controller.php?fvid=$order_id");
    }

}
?>