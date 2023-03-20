
<?php 
session_start();


require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerBrandModel.php");


/*update the quantity of the brand */
if(isset($_POST['BrandQuenBtn'])){
    $Quantity=($_POST['BrandQquenty']);
    $code=($_POST['BrandQref']);
    $user=new brand;
    $result=$user->BrandQuentityUpdate($connection,$Quantity,$code);
    if($result==true){
        header("Location: ../../controller/ShopManager/ShopManagerBrandFirstController.php");
        $_SESSION['Brand_Quentity_updated']='Quentity is updated Successfully';

        $connection->close();
        exit();
    }
    else{

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


    }


}
