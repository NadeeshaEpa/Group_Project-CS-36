<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';

if(isset($_POST['review'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result=$order->deliverypersons($connection,$_SESSION['User_id']);
        if($result===false){
            echo "No delivery persons";
        }else{
            $names=$order->finddeliveryname($connection,$result);
            if($names===false){
                echo "No delivery persons";
            }else{
              $_SESSION['deliverynames']=$names;
            }
            header("Location: ../../view/customer/customer_review.php");
        }
    }
}
if(isset($_POST['fillreview'])){
    $dpname=$_POST['dpname'];
    $date=$_POST['date'];
    $description=$_POST['description'];

    $dpname=$connection->real_escape_string($dpname);
    $date=$connection->real_escape_string($date);
    $description=$connection->real_escape_string($description);

    $order=new order_model();
    $dpid=$order->finddeliveryid($connection,$dpname);
    if($dpid===false){
        echo "No delivery persons";
    }else{
        $result=$order->review($connection,$_SESSION['User_id'],$dpid,$date,$description);
        if($result===false){
            echo "Failed";
        }else{
            $_SESSION['addreview']="success";
            header("Location: ../../view/customer/customer_success.php");
        }
    }  
}
if(isset($_POST['orders'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result=$order->viewOrders($connection,$_SESSION['User_id']);
        if($result===false){
            echo "No orders";
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
