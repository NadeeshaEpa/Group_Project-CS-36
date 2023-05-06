<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/order_model.php';


if(isset($_GET['id'])){
    $order=new order_model();
    $result=$order->vieworder($connection);
    if($result){
        $_SESSION['orderdetails']=$result;
        header("Location:../../view/staff/order.php");
    }else{
        $_SESSION['orderdetails']=[];
        header("Location:../../view/staff/order.php");
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
        header("Location: ../../view/staff/order.php");
    }else{
        $_SESSION['vieworder']=$result;
        header("Location: ../../view/staff/order_view.php");
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
        header("Location:../../view/staff/gas_bill.php");
    }else{
        $_SESSION['billdetails']=[];
        header("Location:../../view/staff/gas_bill.php");
    }

}

if(isset($_GET['fid'])){
    $order=new order_model();
    $result=$order->viewfago_order($connection);
    if($result){
        $_SESSION['fagoorderdetails']=$result;
        header("Location:../../view/staff/fago_order.php");
    }else{
        $_SESSION['fagoorderdetails']=[];
        header("Location:../../view/staff/fago_order.php");
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
        header("Location: ../../view/staff/fago_order.php");
    }else{
        $_SESSION['viewfagoorder']=$result;
        header("Location: ../../view/staff/fago_view.php");
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
        header("Location:../../view/staff/fago_bill.php");
    }else{
        $_SESSION['fagobilldetails']=[];
        header("Location:../../view/staff/fago_bill.php");
    }

}

if(isset($_POST['search_order'])){
    $name=$_POST['order_id'];
    $name=$connection->real_escape_string($name);
    $order=new order_model();
    $result=$order->search_order($connection,$name);
    if($result){
        $_SESSION['orderdetails']=$result;
        header("Location:../../view/staff/order.php");
    }else{
        $_SESSION['orderdetails']=[];
        header("Location:../../view/staff/order.php");
    }
}

if(isset($_POST['search_fagoorder'])){
    $name=$_POST['order_id'];
    $name=$connection->real_escape_string($name);
    $order=new order_model();
    $result=$order->search_fagoorder($connection,$name);
    if($result){
        $_SESSION['fagoorderdetails']=$result;
        header("Location:../../view/staff/fago_order.php");
    }else{
        $_SESSION['fagoorderdetails']=[];
        header("Location:../../view/staff/fago_order.php");
    }
}

   
if(isset($_GET['uid'])){
    $Order_id=$_GET['uid'];
    $Order_id=$connection->real_escape_string($Order_id);
    $_SESSION['uid']=$Order_id;
    if($Order_id===false){
        $_SESSION['editorder']="failed";
        header("Location: ../../view/staff/order_update.php");
    }else{
        $_SESSION['editorder']=$Order_id;
        header("Location: ../../view/staff/order_update.php");
    }
}

    
if(isset($_GET['fuid'])){
    $Order_id=$_GET['fuid'];
    $Order_id=$connection->real_escape_string($Order_id);
    $_SESSION['fuid']=$Order_id;
    if($Order_id===false){
        $_SESSION['editorder']="failed";
        header("Location: ../../view/staff/fagoorder_update.php");
    }else{
        $_SESSION['editorder']=$Order_id;
        header("Location: ../../view/staff/fagoorder_update.php");
    }
}

if (isset($_POST['updateorder'])) {
    $Order_id=$_POST['Order_id'];
    $Delivery_Status = $_POST['Delivery_Status'];
   

    $Order_id=$connection->real_escape_string($Order_id);
    $Delivery_Status = $connection->real_escape_string($Delivery_Status);
   

    $order = new order_model();
    $inputs = array($Order_id, $Delivery_Status);


    $result1 = $order->update_order($connection, $inputs);
    if ($result1) {

        $_SESSION['updateorder'] = "success";
        header("Location: ../../controller/staff/order_controller.php?id=vieworder");

    } else {
        $_SESSION['updateorder'] = "failed";
        echo "Failed";
    }

}


if (isset($_POST['update_fagoorder'])) {
    $Order_id=$_POST['Order_id'];
    $Delivery_Status = $_POST['Delivery_Status'];
   

    $Order_id=$connection->real_escape_string($Order_id);
    $Delivery_Status = $connection->real_escape_string($Delivery_Status);
   

    $order = new order_model();
    $inputs = array($Order_id, $Delivery_Status);


    $result1 = $order->update_order($connection, $inputs);
    if ($result1) {

        $_SESSION['updateorder'] = "success";
        header("Location: ../../controller/staff/order_controller.php?fid=viewfagoorder");

    } else {
        $_SESSION['updateorder'] = "failed";
        echo "Failed";
    }
}
?>
