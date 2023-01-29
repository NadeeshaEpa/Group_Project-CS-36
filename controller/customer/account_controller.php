<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/account_model.php");

if(isset($_POST['viewacc'])){
    if(isset($_SESSION['User_id'])){ 
            $acc=new account_model();
            $result=$acc->viewAccount($connection,$_SESSION['User_id']);
            if($result==false){
                $_SESSION['viewacc']="failed";
                header("Location: ../../view/customer/customer_select.php");            
            }else{
                //unset($_SESSION['viewacc']); 2345
                $_SESSION['viewacc_result']=$result;    
                header("Location: ../../view/customer/customer_dashboard.php");   
            }
    }else{
            echo "Please login first";
            header("Location: ../../view/customer/customer_login.php");
    }
}else{
    echo "Invalid login";
}

