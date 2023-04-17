<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");

$user=new Complain(); 
$result=$user->getUserComplainsDetails($connection);


if($result==true){
    $_SESSION['userComplainDetails']=$result;
    header("Location: ../../view/deliveryperson/DeliveryPersonComplaneView.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/deliveryperson/DeliveryPersonComplaneView.php");
    $connection->close();
    exit();
}