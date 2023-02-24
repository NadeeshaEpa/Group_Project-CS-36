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
    $userid=$_SESSION['User_id'];

    $complainmodel=new complain_model;
    //pagination for view orders
    $cc=new complain_controller;
    $cc->pagination($connection,$userid);
    $limit=$_SESSION['limit'];
    $offset=$_SESSION['offset'];
    
    $result=$complainmodel->addcomplain($connection,$customer_id,$order_id,$complain);
    if($result===false){
        $_SESSION['complain']="failed";
        header("Location: ../../view/customer/customer_complain.php");
    }else{
        $_SESSION['complain']="success";
        $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id'],$limit,$offset);
        $_SESSION['viewcomplain']=$result;
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }
}
if(isset($_GET['view-complain']) || isset($_GET['page'])){
    $complainmodel=new complain_model;
    $userid=$_SESSION['User_id'];
    
    $cc=new complain_controller;
    $cc->pagination($connection,$userid);
    $limit=$_SESSION['limit'];
    $offset=$_SESSION['offset'];

    $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id'],$limit,$offset);
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
    $userid=$_SESSION['User_id'];

    //pagination for view orders
    $cc=new complain_controller;
    $cc->pagination($connection,$userid);
    $limit=$_SESSION['limit'];
    $offset=$_SESSION['offset'];


    $result=$complainmodel->deletecomplain($connection,$complainid);
    if($result===false){
        $_SESSION['deletecomplain']="failed";
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }else{
        $_SESSION['deletecomplain']="success";
        $result=$complainmodel->viewcomplain($connection,$_SESSION['User_id'],$limit,$offset);
        $_SESSION['viewcomplain']=$result;
        header("Location: ../../view/customer/customer_viewcomplain.php");
    }
}

class complain_controller{
    public function pagination($connection,$userid){
        $complainmodel=new complain_model;
        //pagination for view orders
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['page']=$page;
        $offset = ($page - 1) * $limit;
        
        //get the total number of orders
        $total_records=$complainmodel->complain_count($connection,$userid);
        $_SESSION['shop_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['total_pages']=$total_pages;

        $_SESSION['limit']=$limit;
        $_SESSION['offset']=$offset;
        
    }
}