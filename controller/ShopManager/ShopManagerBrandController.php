<?php
$session_start();

require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerBrandModel.php");

if(isset($_POST['quan_update'])){
    $Quantity=($_POST['BrandQquenty']);
    $code=($_POST['BrandQrefid']);
    $user=new brand;
    $result=$user->BrandQuenBtn($connection,$Quantity,$code);
    if($result==true){
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();
    }


}
