<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/order_model.php';

if(isset($_POST['review'])){
    if(isset($_SESSION['User_id'])){
        $order=new order_model();
        $result=$order->deliverypersons($connection,$_SESSION['User_id']);
        var_dump($result);
    }
}