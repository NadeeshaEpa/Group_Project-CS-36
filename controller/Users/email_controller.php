<?php
session_start();
require_once("../../config.php");
require_once '../../model/Users/email_model.php';

if(isset($_POST['v_submit'])){
    $user_email=$_POST['email'];
    $user_email=filter_var($user_email,FILTER_SANITIZE_EMAIL);

    $email=new email_model();
    $result=$email->sendEmail($connection,$user_email);

    if($result){
        $_SESSION['email-status']="Email sent successfully";
        header("Location: ../../view/verify_email.php");
        exit();
    }else{
        $_SESSION['email-status']="There was an error";
        header("Location: ../../view/verify_email.php");
        exit();
    }
}
if(isset($_POST['otp_submit'])){
    $otp=$_POST['otp'];
    $otp=filter_var($otp,FILTER_SANITIZE_STRING);
    $user_email=$_POST['email'];
    $user_email=filter_var($user_email,FILTER_SANITIZE_EMAIL);

    $email=new email_model();
    $result=$email->verifyOTP($connection,$otp);

    if($result){
        $_SESSION['email-status']="OTP verified successfully";
        header("Location: ../../view/registeras.php");
        exit();
    }else{
        $_SESSION['email-status']="There was an error";
        header("Location: ../../view/verify_email.php");
        exit();
    }
}