<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';

if(isset($_POST['orders'])){
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
if(isset($_POST['litroavailable'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result1=$order->getweight($connection);
        if($result1===false){
            $_SESSION['litroavailable']="failed";
            header("Location: ../../view/customer/customer_litrogas.php");
        }else{            
            $result=$order->viewLitro($connection,$result1);
            if($result===false){
                $_SESSION['viewlitro']="failed";
                header("Location: ../../view/customer/customer_litrogas.php");
            }else{     
                $_SESSION['viewlitro']=$result;
                header("Location: ../../view/customer/customer_litrogas.php");
            }
        }
    }
}
if(isset($_POST['laughavailable'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result1=$order->getweight($connection);
        if($result1===false){
            $_SESSION['laughavailable']="failed";
            header("Location: ../../view/customer/customer_laughgas.php");
        }else{            
            $result=$order->viewLaugh($connection,$result1);
            if($result===false){
                $_SESSION['viewlaugh']="failed";
                header("Location: ../../view/customer/customer_laughgas.php");
            }else{     
                $_SESSION['viewlaugh']=$result;
                header("Location: ../../view/customer/customer_laughgas.php");
            }
        }
    }
}
