<?php 
session_start();

require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerBrandModel.php");


if(isset($_POST['BrandQuenBtn'])){
    $Quantity=($_POST['BrandQquenty']);
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->BrandQuentityUpdate($connection,$Quantity,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['BrandQpricebtn'])){
    $price=($_POST['BrandQprice']);
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->BrandPriceUpdate($connection,$price,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['brandDeleteBtn'])){
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->DeleteProduct($connection,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $connection->close();
        exit();

    }


}
