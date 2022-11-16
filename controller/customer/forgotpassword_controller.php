<?php
session_start();
require_once("../../config.php");
require_once '../../model/customer/forgotpassword_model.php';
require_once '../../model/customer/checkcustomer_model.php';

if(isset($_POST['fsubmit'])){
    $email=$_POST['email'];
    $email=$connection->real_escape_string('$email');
    $result=checkemail($email,$connection);
    if($result){
        $setdata=getdata($email,$connection);
    }else{
        $_SESSION['email-status']="No Email found";
        header("Location:../../view/customer/forgot_password.php");
        exit();
    }

}else{
    echo "Invalid Login";
    exit();
}