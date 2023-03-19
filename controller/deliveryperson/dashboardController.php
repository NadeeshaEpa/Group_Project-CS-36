<?php
session_start();
require_once('../../config.php');
require_once('../../model/deliveryperson/dashboardModel.php');
 
if(isset($_POST['btn1'])){
    $user=new Dashboard;
    $result=$user->update_as_a_active($connection);
    
    if($result){
        $_SESSION['updateActiveSucessfully']="sucess";
<<<<<<< HEAD
        
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
=======
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateActiveSucessfully']="Failed";
<<<<<<< HEAD
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
=======
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $connection->close();
        exit();

    }
}
elseif(isset($_POST['btn2'])){
    $user=new Dashboard;
    $result=$user->update_as_a_not_active($connection);
    if($result){
        $_SESSION['updateDeactiveSucessfully']="sucess";
<<<<<<< HEAD
        unset($_SESSION['DeliveryRequestDetails']);
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateActiveSucessfully']="Failed";
<<<<<<< HEAD
        unset($_SESSION['DeliveryRequestDetails']);
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    }
}

else{
    echo"invalid request";
    exit();
}