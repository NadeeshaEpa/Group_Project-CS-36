<?php
session_start();
require_once("../../config.php");
require_once '../../model/ShopManager/ShopManagerBrandModel.php';

$user=new brand(); 
$result=$user->getProductDetails($connection);


if($result==true){
    $_SESSION['Product_details']=$result;
    header("Location: ../../view/ShopManager/shopManagerUpdatePQ.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/ShopManager/shopManagerUpdatePQ.php");
    $connection->close();
    exit();
}

