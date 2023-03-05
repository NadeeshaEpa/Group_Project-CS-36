<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';

if(isset($_GET['orderid'])||isset($_GET['page'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $userid=$_SESSION['User_id'];

        //pagination for view orders
        $limit = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['gas_page']=$page;
        $offset = ($page - 1) * $limit;
        
        //get the total number of orders
        $total_records=$order->order_count($connection,$userid);
        $_SESSION['shop_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['gas_total_pages']=$total_pages;

        
        $result=$order->viewOrders($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['vieworders']="failed";
            header("Location: ../../view/customer/customer_vieworder.php");
        }else{
            $_SESSION['vieworders']=$result;
            header("Location: ../../view/customer/customer_vieworder.php");
        }
    }
}
if(isset($_GET['shoporderid'])||isset($_GET['shop_page'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $userid=$_SESSION['User_id'];

        //pagination for view orders
        $limit = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['page']=$page;
        $offset = ($page - 1) * $limit;
        
        //get the total number of orders
        $total_records=$order->fago_order_count($connection,$userid);
        $_SESSION['shop_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['total_pages']=$total_pages;

        
        $result=$order->view_fagoOrders($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['vieworders']="failed";
            // echo "<script>alert('No orders found')</script>";
            header("Location: ../../view/customer/fago_shop_order.php");
        }else{
            $_SESSION['vieworders']=$result;
            header("Location: ../../view/customer/fago_shop_order.php");
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
if(isset($_GET['shopid'])){
    $order_id=$_GET['shopid'];
    $order=new order_model();
    $userid=$_SESSION['User_id'];

    $result=$order->view_fagoOrderDetails($connection,$order_id,$userid);
    if($result===false){
        echo "No orders";
    }else{
        $_SESSION['vieworderdetails']=$result;
        header("Location: ../../view/customer/customer_viewshoporder_details.php");
    }

}
