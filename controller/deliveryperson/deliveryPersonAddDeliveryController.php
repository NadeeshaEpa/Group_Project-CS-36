<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/deliveryPersonLocationModel.php");
require_once('../../model/deliveryperson/dashboardModel.php');

if(isset($_POST['check'])){
    $user=new location();
    $result=$user->AddDeliveryPerson($connection);
    if($result==true){
        $_SESSION['DeliveryRequestDetails']=$result;
        // $data = json_encode($$result);
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    
    }
    else{
        unset($_SESSION['DeliveryRequestDetails']);
        header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
        $connection->close();
        exit();
    
    }
    
}

if(isset($_POST['DeliveryReDeclineName'])){
    $orderId=$_POST['DeliveryOrder'];
    $orderId=$connection->real_escape_string($orderId);
    $user=new location();
    $result=$user->AddDeliveryDecline($connection,$orderId);
    if($result==true){
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    
}
/*new orders view */

if(isset($_POST['DeliveryReAcceptName']) && ($_POST['Order_type'])==2){
    $orderId=$_POST['DeliveryOrder'];
    $orderId=$connection->real_escape_string($orderId);
    
    $user=new location();
    $result=$user->AcceptDeliveryRequest($connection,$orderId);

    $user1=new Dashboard;
    $result1=$user1->update_as_a_not_active($connection);

    if($result==true && $result1){
        $_SESSION['OrderDetailsOfRequest']=$result;
        $_SESSION['new_order_deliver_start']='start';
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    
}
/* */


/*old orders view */

if(isset($_POST['DeliveryReAcceptName']) && ($_POST['Order_type'])==1){
    $orderId=$_POST['DeliveryOrder'];
    $orderId=$connection->real_escape_string($orderId);
    
    $user=new location();
    $result=$user->AcceptDeliveryRequest($connection,$orderId);

    $user1=new Dashboard;
    $result1=$user1->update_as_a_not_active($connection);

    if($result==true && $result1){
        $_SESSION['OrderDetailsOfRequest']=$result;
        $_SESSION['old_order_deliver_start']='start';
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest_oldcylinder.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    
}
/* */


// if(isset($_POST['DeliveryRePendingName'])){
//     $orderId=$_POST['DeliveryOrder'];
//     $DeliveryFee=$_POST['DeliveryRequestDeliveryFee'];
//     $orderId=$connection->real_escape_string($orderId);
//     $DeliveryFee=$connection->real_escape_string($DeliveryFee);
//     $user=new location();
//     $result=$user->PendingDeliveryRequest($connection,$orderId,$DeliveryFee);

//     $user1=new Dashboard;
//     $result1=$user1->update_as_a_active($connection);

//     if($result==true && $result1){
       
//         header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
//         $connection->close();
//         exit();
    
//     }
//     else{
//         header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest.php");
//         $connection->close();
//         exit();
    
//     }
    
// }


if(isset($_GET['enter_pin'])){
    $order_id=$_GET['id'];
    $pin=$_GET['pin'];
    $DeliveryFee=$_GET['amount'];
    $order_id=$connection->real_escape_string($order_id);
    $pin=$connection->real_escape_string($pin);
    $DeliveryFee=$connection->real_escape_string($DeliveryFee);

    $user2=new Dashboard;
    $result2=$user2->Check_the_pin($connection,$order_id,$pin);

   
    $user=new location();
    $result=$user->PendingDeliveryRequest($connection,$order_id,$DeliveryFee);

    $user1=new Dashboard;
    $result1=$user1->update_as_a_active($connection);
    
   
    if($result2==true && $result==true && $result1){
        unset( $_SESSION['new_order_deliver_start']);
        unset($_SESSION['old_order_deliver_start']);
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest.php");
        $connection->close();
        exit();
    }
}
/*check gas is delivered to the customer */
if(isset($_GET['Cus_enter_pin'])){
    $order_id=$_GET['id'];
    $pin=$_GET['pin'];
   
    $order_id=$connection->real_escape_string($order_id);
    $pin=$connection->real_escape_string($pin);
    $user=new Dashboard;
    $result=$user->Check_the_pin($connection,$order_id,$pin);

    
   
    if($result==true){
        $_SESSION['enable_button']='enable';
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest_oldcylinder.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest_oldcylinder.php");
        $connection->close();
        exit();
    }
}
/* */

/*check old cylinder delivered to the gas argent */
if(isset($_GET['Gas_enter_pin'])){
    $order_id=$_GET['id'];
    $pin=$_GET['pin'];
    
    $DeliveryFee=$_GET['amount'];
    $order_id=$connection->real_escape_string($order_id);
    $pin=$connection->real_escape_string($pin);
    $DeliveryFee=$connection->real_escape_string($DeliveryFee);

    $user2=new Dashboard;
    $result2=$user2->Check_the__gas_pin($connection,$order_id,$pin);

   
    $user=new location();
    $result=$user->PendingDeliveryRequest($connection,$order_id,$DeliveryFee);

    $user1=new Dashboard;
    $result1=$user1->update_as_a_active($connection);
    
   
    if($result2==true && $result==true && $result1){
        unset($_SESSION['enable_button']);
        unset($_SESSION['old_order_deliver_start']);
        unset( $_SESSION['new_order_deliver_start']);
        header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/deliveryperson/DeliveryPersonDeliveryRequest_oldcylinder.php");
        $connection->close();
        exit();
    }
}

