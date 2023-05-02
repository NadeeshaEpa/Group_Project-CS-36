<?php
session_start();
require_once('../../config.php');
require_once('../../model/deliveryperson/dashboardModel.php');
 
if(isset($_POST['btn1'])){
    $user=new Dashboard;
    $result=$user->update_as_a_active($connection);
    
    if($result){
        $_SESSION['updateActiveSucessfully']="sucess";

        
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");

        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateActiveSucessfully']="Failed";

        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");

        $connection->close();
        exit();

    }
}
if(isset($_POST['btn2'])){
    $user=new Dashboard;
    $result=$user->update_as_a_not_active($connection);
    if($result){
        $_SESSION['updateDeactiveSucessfully']="sucess";

        unset($_SESSION['DeliveryRequestDetails']);

        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateActiveSucessfully']="Failed";

        unset($_SESSION['DeliveryRequestDetails']);


        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    }
}

if(isset($_POST['payment'])){
    $user=new Dashboard;
    $result=$user->Get_payment_detalis($connection);
    if($result){
        
        $_SESSION['Payment_details']=$result;
        header("Location: ../../view/deliveryperson/deliveryperson_payment.php");
        $connection->close();
        exit();
    }
    else{
        
        header("Location: ../../view/deliveryperson/deliveryperson_payment.php");
        $connection->close();
        exit();
    }
}

