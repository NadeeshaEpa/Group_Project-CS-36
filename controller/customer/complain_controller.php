<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/complain_model.php';

if(isset($_GET['complainid'])){
  $user=$_SESSION['User_id'];
  $customer= new complain_model;
  $orderid=$customer->getorderid($connection,$user);
  $_SESSION['complain-order']=$orderid;
  header("Location: ../../view/customer/customer_complain.php");
}
if(isset($_POST['submitcomplain'])){
    $customer_id=$_SESSION['User_id'];
    $order_id=$_POST['orderid'];
    $complain=$_POST['complain'];
    
    $complainmodel=new complain_model;
    $result=$complainmodel->addcomplain($connection,$customer_id,$order_id,$complain);
    if($result===false){
        $_SESSION['complain']="failed";
        header("Location: ../../view/customer/customer_complain.php");
    }else{
        $_SESSION['complain']="success";
        $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id']);
        $_SESSION['viewcomplain']=$result;
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }
}
if(isset($_GET['view-complain'])){
    $complainmodel=new complain_model;
    $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['viewcomplain']=[];
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }else{
        $_SESSION['viewcomplain']=$result;
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }
}
if(isset($_GET['deletecomplainid'])){
    $complainid=$_GET['deletecomplainid'];
    $complainmodel=new complain_model;
    $result=$complainmodel->deletecomplain($connection,$complainid);
    if($result===false){
        $_SESSION['deletecomplain']="failed";
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }else{
        $_SESSION['deletecomplain']="success";
        $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id']);
        $_SESSION['viewcomplain']=$result;
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }
}