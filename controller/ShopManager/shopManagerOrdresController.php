<?php 
session_start();

require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerReportModel.php");


if(isset($_POST['DeliveredOrder'])){
    $user=new Brand_reports(); 
    $result=$user->DeliveredOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/ShopManager/shopManagerDeliverd.php");
        $_SESSION['DeliveredOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        $_SESSION['No_orders']='No Delivered orders';
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['PickedOrder'])){
    $user=new Brand_reports(); 
    $result=$user->PickedOrderDetails($connection);
    if($result==true){
        header("Location: ../../view/ShopManager/shopManagerPicked.php");
        $_SESSION['PickedOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        $_SESSION['No_orders']='No reserve orders';
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();

    }


}

/*shop opened and closed */
if(isset($_POST['sbtn1'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_open($connection);
    
    if($result){
        $_SESSION['updateOpenSucessfully']="sucess";

        
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");

        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateOpenSucessfully']="Failed";

        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");

        $connection->close();
        exit();

    }
}
if(isset($_POST['sbtn2'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_close($connection);
    if($result){
        $_SESSION['updateClosedSucessfully']="sucess";
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateClosedSucessfully']="Failed";
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();
    }
}



if(isset($_GET['enter_pin'])){
    $order_id=$_GET['id'];
    $pin=$_GET['pin'];
    
    $order_id=$connection->real_escape_string($order_id);
    $pin=$connection->real_escape_string($pin);

    $user=new Brand_reports;
    $result=$user->Check_the_pin($connection,$order_id,$pin);
    
    
    if($result==true){
       
        header("Location: ../../controller/ShopManager/ShopManagerPickedFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerPickedFirstController.php");
        $connection->close();
        exit();
    }
}
/*picked order search */
if(isset($_POST['search_order'])){
    $Order_id=$_POST['order_id'];
    $Order_id=$connection->real_escape_string($Order_id);
    $user=new Brand_reports(); 
    $result=$user->PickedOrderDetailsSearch($connection,$Order_id);
    if($result==true){
        header("Location: ../../view/ShopManager/shopManagerPicked.php");
        $_SESSION['PickedOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        $_SESSION['No_Search']='Order not available';
        header("Location: ../../view/ShopManager/shopManagerPicked.php");
        $connection->close();
        exit();

    }


}
/* */
if(isset($_POST['D_search_order'])){
    $Order_id=$_POST['D_order_id'];
    $Order_id=$connection->real_escape_string($Order_id);
    $user=new Brand_reports(); 
    $result=$user->DeliveredOrderDetailsSearch($connection,$Order_id);
    if($result==true){
        header("Location:  ../../view/ShopManager/shopManagerDeliverd.php");
        $_SESSION['DeliveredOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        $_SESSION['No_Search']='Order not available';
        header("Location:  ../../view/ShopManager/shopManagerDeliverd.php");
        $connection->close();
        exit();

    }
}
/*delivered order search */
/**/