<?php
session_start();
require_once("../../config.php");
require_once '../../model/deliveryperson/delivaryprofilemodel.php';

$user=new delivaryProf_model(); 
$result=$user->getUserDetails($connection);


if($result==true){
    $_SESSION['userDetails']=$result;
    header("Location: ../../view/deliveryperson/DeliveryProfile.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/deliveryperson/DeliveryProfile.php");
    $connection->close();
    exit();
}

