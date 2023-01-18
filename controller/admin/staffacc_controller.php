<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/account_model.php';


if(isset($_GET['id'])){
    echo "hello";
    $staff=new account_model();
    $result=$staff->viewstaff($connection);
    if($result){
        $_SESSION['staffdetails']=$result;
        header("Location:../../view/admin/admin-viewStaff.php");
    }else{
        echo "Error";
    }

}