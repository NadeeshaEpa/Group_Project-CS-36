<?php
session_start();
require_once("../../config.php");
require_once '../../model/ShopManager/ShopManagerProfileModel.php';

$user=new shopManager(); 
$result=$user->getShopManagerDetails($connection);


if($result==true){
    $_SESSION['ShopManager_details']=$result;

    header("Location: ../../view/ShopManager/ShopManagerProfile.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/ShopManager/ShopManagerProfile.php");
    $connection->close();
    exit();
}

