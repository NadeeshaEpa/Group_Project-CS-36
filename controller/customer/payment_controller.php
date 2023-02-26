<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/payment_model.php';

// if(isset($_GET['id'])){
if(isset($_POST['pay'])){    
    $userid=$_SESSION['User_id'];
    // $agentid=$_GET['id'];
    $agentid=$_POST['agentid'];
    $payment=new payment_model();
   
    $result=$payment->checkquantity($connection,$agentid,$userid);
    if(!$result){
        echo "failed";
    }else{
        echo "success";
    }
}





?>