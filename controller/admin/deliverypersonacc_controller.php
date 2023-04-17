<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/account_model.php';


if(isset($_GET['id'])){
    echo "hello";
    $deliveryperson=new account_model();
    $result=$deliveryperson->viewDeliveryperson($connection);
    if($result){
        $_SESSION['deliverypersondetails']=$result;
        header("Location:../../view/admin/admin-viewDeliveryperson.php");
    }else{
        $_SESSION['deliverypersondetails']=[];
        header("Location:../../view/admin/admin-viewDeliveryperson.php");
    }

}