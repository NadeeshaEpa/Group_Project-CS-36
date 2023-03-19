<<<<<<< HEAD
<?php 
session_start();
=======
<?php
$session_start();
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2

require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerBrandModel.php");

<<<<<<< HEAD
/*update the quantity of the brand */
if(isset($_POST['BrandQuenBtn'])){
    $Quantity=($_POST['BrandQquenty']);
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->BrandQuentityUpdate($connection,$Quantity,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['Brand_Quentity_updated']='Quentity is updated Successfully';
=======
if(isset($_POST['quan_update'])){
    $Quantity=($_POST['BrandQquenty']);
    $code=($_POST['BrandQrefid']);
    $user=new brand;
    $result=$user->BrandQuenBtn($connection,$Quantity,$code);
    if($result==true){
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $connection->close();
        exit();
    }
    else{
<<<<<<< HEAD
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['Q_Updated_error']='Error Occurred';
        $connection->close();
        exit();

    }


}

/*update the price of the brand */
if(isset($_POST['BrandQpricebtn'])){
    $price=($_POST['BrandQprice']);
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->BrandPriceUpdate($connection,$price,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['Brand_price_updated']='Price is updated Successfully';
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['P_Updated_error']='Error Occurred';
        $connection->close();
        exit();

    }


}
/*delete the brand */
if(isset($_POST['brandDeleteBtn'])){
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->DeleteProduct($connection,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['Brand_delete']='Brand is deleted Successfully';
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['delete_error']='Error Occurred';
        $connection->close();
        exit();

=======
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
    }


}
