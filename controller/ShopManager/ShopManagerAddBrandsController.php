<?php
session_start();
require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerAddBrandsModel.php");

if(isset($_POST['BrandAdd'])){
    $name=$_POST['productName'];
    $Quantity=$_POST['productQuantity'];
    $price=$_POST['producPrice'];
    $description=$_POST['productDescription'];
    $Category=$_POST['Category'];
    $Product_type=$_POST['product_type'];

    $name=$connection->real_escape_string($name);
    $Quantity=$connection->real_escape_string($Quantity);
    $price=$connection->real_escape_string($price);
    $description=$connection->real_escape_string($description);
    $Category=$connection->real_escape_string($Category);
    $Product_type=$connection->real_escape_string($Product_type);
    
    $user=new Add_Brands;
    $result=$user->Add_Brands($connection,$name,$Quantity,$price,$description,$Category,$Product_type);
    
    if($result==true){
        $_SESSION['Brand_add']="New brand Added Successfully";
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Brand_add_error']="Error Occurred";
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
    $connection->close();
    exit();
}