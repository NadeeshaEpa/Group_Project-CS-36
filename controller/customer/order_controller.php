<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';

if(isset($_GET['orderid'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result=$order->viewOrders($connection,$_SESSION['User_id']);
        if($result===false){
            $_SESSION['vieworders']="failed";
            // echo "<script>alert('No orders found')</script>";
            header("Location: ../../view/customer/customer_vieworder.php");
        }else{
            $_SESSION['vieworders']=$result;
            header("Location: ../../view/customer/customer_vieworder.php");
        }
    }
}
if(isset($_GET['id'])){
    $order_id=$_GET['id'];
    $order=new order_model();

    $result=$order->viewOrderDetails($connection,$order_id,$_SESSION['User_id']);
    if($result===false){
        echo "No orders";
    }else{
        $_SESSION['vieworderdetails']=$result;
        header("Location: ../../view/customer/customer_vieworderdetails.php");
    }

}
