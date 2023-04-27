<?php 
session_start();

require_once('../../config.php');
require_once('../../model/gasagent/order_model.php');

if(isset($_POST['deliverbtn'])){
    $user=new Brand_reports(); 
    $result=$user->DeliveredOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/gasagent/orderd.php");
        $_SESSION['GDeliveredOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['pickedbtn'])){
    $user=new Brand_reports(); 
    $result=$user->PickedOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/gasagent/pick.php");
        $_SESSION['GPickedOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();}


}
       


/*shop opened and closed */
if(isset($_POST['sbtn1'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_open($connection);
    
    if($result){
        $_SESSION['updateOpenSucessfully']="sucess";   
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateOpenSucessfully']="Failed";
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();

    }
}
elseif(isset($_POST['sbtn2'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_close($connection);
    if($result){
        $_SESSION['updateClosedSucessfully']="sucess";
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateClosedSucessfully']="Failed";
        header("Location: ../../controller/gasagent/gasagent_order_controller.php");
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
       
        header("Location: ../../controller/gasagent/gasagentPickedfirst.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/gasagent/gasagentPickedfirst.php");
        $connection->close();
        exit();
    }
}