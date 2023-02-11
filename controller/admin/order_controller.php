<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/order_model.php';


if(isset($_GET['id'])){
    $order=new order_model();
    $result=$order->vieworder($connection);
    if($result){
        $_SESSION['orderdetails']=$result;
        header("Location:../../view/admin/order.php");
    }else{
        $_SESSION['orderdetails']=[];
        header("Location:../../view/admin/order.php");
    }

}