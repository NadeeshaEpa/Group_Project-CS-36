<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';
require('../../payment_config.php');

if(isset($_GET['orderid'])||isset($_GET['page'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $userid=$_SESSION['User_id'];

        //pagination for view orders
        $limit = 7;
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
        $limit = 7;
        $page = isset($_GET['shop_page']) ? $_GET['shop_page'] : 1;
        $_SESSION['shop_page']=$page;
        $offset = ($page - 1) * $limit;
        
        //get the total number of orders
        $total_records=$order->fago_order_count($connection,$userid);
        $_SESSION['shop_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['shop_total_pages']=$total_pages;

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
if(isset($_GET['cancelid'])){   
    $order_id=$_GET['cancelid']; 
    $order=new order_model();
    //implement refund using stripe
    $charge_id=$order->getChargeId($connection,$order_id);
    $amount=$order->getTotalAmount($connection,$order_id);   

    $refund = \Stripe\Refund::create([
        'charge' => $charge_id,
        'amount' => $amount,
    ]);
    if ($refund->status == 'succeeded') {
        $result=$order->cancelOrder($connection,$order_id);
        if($result===false){
            $_SESSION['cancelorder']="failed";
            header("Location: ../../view/customer/error.php");
        }else{
            require_once '../../model/customer/email_model.php';
            $email=new email_model();
            $email_agent=new email_model();
            $shop="gas";
            $useremail=$order->getUserEmail($connection,$order_id,$shop);
            $gasagentemail=$order->getGasAgentEmail($connection,$order_id);
            $email->sendRefundEmail($connection,$order_id,$useremail);
            $email_agent->sendRefundEmail_agent($connection,$order_id,$gasagentemail);
            header("Location: ../../view/customer/customer_cancelorder.php");
        }
    }else{
        header("Location: ../../view/customer/error.php");
    }
}
if(isset($_GET['shop_cancelid'])){
    $order_id=$_GET['shop_cancelid'];
    $order=new order_model();
    //implement refund using stripe
    $charge_id=$order->getChargeId($connection,$order_id);
    $amount=$order->getTotalAmount($connection,$order_id);   

    $refund = \Stripe\Refund::create([
        'charge' => $charge_id,
        'amount' => $amount,
    ]);
    if ($refund->status == 'succeeded') {
        $result=$order->cancelShopOrder($connection,$order_id);
        if($result===false){
            $_SESSION['cancelorder']="failed";
            header("Location: ../../view/customer/error.php");
        }else{
            require_once '../../model/customer/email_model.php';
            $email=new email_model();
            $email_agent=new email_model();
            $shop="fago_shop";
            $useremail=$order->getUserEmail($connection,$order_id,$shop);
            $stockmanager=$order->getstockmanagerEmail($connection,$order_id);
            $email->sendRefundEmail($connection,$order_id,$useremail);
            $email_agent->sendRefundEmail_agent($connection,$order_id,$stockmanager);
            header("Location: ../../view/customer/customer_cancelorder.php");
        }
    } else {
        header("Location: ../../view/customer/error.php");
    }
}
