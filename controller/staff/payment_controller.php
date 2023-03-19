<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/payment_model.php';


if(isset($_GET['id'])){
    $payment=new payment_model();
    $result=$payment->viewgaspayment($connection);
    if($result){
        $_SESSION['gaspaymentdetails']=$result;
        header("Location:../../view/staff/payments.php");
    }else{
        $_SESSION['gaspaymentdetails']=[];
        header("Location:../../view/staff/payments.php");
    }

}

if(isset($_GET['deid'])){
    $payment=new payment_model();
    $result=$payment->viewdeliverypayment($connection);
    if($result){
        $_SESSION['deliverypaymentdetails']=$result;
        header("Location:../../view/staff/delivery_payments.php");
    }else{
        $_SESSION['deliverypaymentdetails']=[];
        header("Location:../../view/staff/delivery_payments.php");
    }

}

if(isset($_GET['vid'])){
    $User_id=$_GET['vid'];
    $User_id=$connection->real_escape_string($User_id);
    $_SESSION['vid']=$User_id;
    $payment=new payment_model();
    $result=$payment->view_payment($connection,$User_id);
    if($result===false){
        $_SESSION['viewpayment']="failed";
        header("Location: ../../view/staff/payments.php");
    }else{
        $_SESSION['viewpayment']=$result;
        header("Location: ../../view/staff/payment_view.php");
    }
}
?>