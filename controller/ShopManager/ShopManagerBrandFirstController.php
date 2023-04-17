<?php
session_start();
require_once("../../config.php");
require_once '../../model/ShopManager/ShopManagerBrandModel.php';

$user=new brand(); 
$result=$user->getProductItemCodeDetails($connection);


if($result==true){
    $_SESSION['Product_details_itemCode']=$result;
    header("Location: ../../view/ShopManager/shopManagerUpdatePQ.php");
    $connection->close();
    exit();

}
else{
    $_SESSION['itemCodeError']="No Product Added";
    header("Location: ../../view/ShopManager/shopManagerUpdatePQ.php");
    $connection->close();
    exit();
}

