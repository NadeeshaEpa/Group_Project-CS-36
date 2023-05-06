<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/order_model.php';


if(isset($_GET['id'])){
    $order=new order_model();
    $result=$order->vieworder($connection);
    if($result){
        $_SESSION['orderdetails']=$result;
        header("Location:../../view/admin/order.php");
    }else{
        $_SESSION['orderdetails']=[];
        header("Location:../../view/admin/order.php");
    }

}

if(isset($_GET['vid'])){
    $order_id=$_GET['vid'];
    $order_id=$connection->real_escape_string($order_id);
    $_SESSION['vid']=$order_id;
    $order=new order_model();
    $result=$order->view_gasorder($connection,$order_id);
    if($result===false){
        $_SESSION['vieworder']="failed";
        header("Location: ../../view/admin/order.php");
    }else{
        $_SESSION['vieworder']=$result;
        header("Location: ../../view/admin/order_view.php");
    }
}

if(isset($_GET['bid'])){
    $order_id=$_GET['bid'];
    $order_id=$connection->real_escape_string($order_id);
    $_SESSION['bid']=$order_id;
    $order=new order_model();
    $result=$order->view_gasbill($connection,$order_id);
    if($result){
        $_SESSION['billdetails']=$result;
        header("Location:../../view/admin/gas_bill.php");
    }else{
        $_SESSION['billdetails']=[];
        header("Location:../../view/admin/gas_bill.php");
    }

}

if(isset($_GET['fid'])){
    $order=new order_model();
    $result=$order->viewfago_order($connection);
    if($result){
        $_SESSION['fagoorderdetails']=$result;
        header("Location:../../view/admin/fago_order.php");
    }else{
        $_SESSION['fagoorderdetails']=[];
        header("Location:../../view/admin/fago_order.php");
    }

}

if(isset($_GET['fvid'])){
    $order_id=$_GET['fvid'];
    $order_id=$connection->real_escape_string($order_id);
    $_SESSION['fvid']=$order_id;
    $order=new order_model();
    $result=$order->fago_orderview($connection,$order_id);
    if($result===false){
        $_SESSION['viewfagoorder']="failed";
        header("Location: ../../view/admin/fago_order.php");
    }else{
        $_SESSION['viewfagoorder']=$result;
        header("Location: ../../view/admin/fago_view.php");
    }
}

if(isset($_GET['fbid'])){
    $order_id=$_GET['fbid'];
    $order_id=$connection->real_escape_string($order_id);
    $_SESSION['fbid']=$order_id;
    $order=new order_model();
    $result=$order->view_fagobill($connection,$order_id);
    if($result){
        $_SESSION['fagobilldetails']=$result;
        header("Location:../../view/admin/fago_bill.php");
    }else{
        $_SESSION['fagobilldetails']=[];
        header("Location:../../view/admin/fago_bill.php");
    }

}

if(isset($_POST['search_order'])){
    $name=$_POST['order_id'];
    $name=$connection->real_escape_string($name);
    $order=new order_model();
    $result=$order->search_order($connection,$name);
    if($result){
        $_SESSION['orderdetails']=$result;
        header("Location:../../view/admin/order.php");
    }else{
        $_SESSION['orderdetails']=[];
        header("Location:../../view/admin/order.php");
    }
}

if(isset($_POST['search_fagoorder'])){
    $name=$_POST['order_id'];
    $name=$connection->real_escape_string($name);
    $order=new order_model();
    $result=$order->search_fagoorder($connection,$name);
    if($result){
        $_SESSION['fagoorderdetails']=$result;
        header("Location:../../view/admin/fago_order.php");
    }else{
        $_SESSION['fagoorderdetails']=[];
        header("Location:../../view/admin/fago_order.php");
    }
}

if(isset($_GET['oid'])){
    $order_id=$_GET['oid'];
    $order_id=$connection->real_escape_string($order_id);
    $order=new order_model();
    $result=$order->check_ordertype($connection,$order_id);
    if($result==true){
        header("Location:../../controller/admin/order_controller.php?vid=$order_id");
    
    }else{
        header("Location:../../controller/admin/order_controller.php?fvid=$order_id");
    }

}

?>
