<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/account_model.php';


if(isset($_GET['id'])){
    echo "hello";
    $customer=new account_model();
    $result=$customer->viewcustomer($connection);
    if($result){
        $_SESSION['customerdetails']=$result;
        header("Location:../../view/admin/admin-viewCustomer.php");
    }else{
        echo "Error";
    }

}