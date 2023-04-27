<?php
session_start();
require_once '../../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../vendor/autoload.php';

class email_model{
    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->Username = 'fagoorders@gmail.com';
        $this->mail->Password = 'lfvsvbxdkoeomuya';
    }
    public function sendEmail($connection,$user_email){

        //create otp with 3 digits
        $otp=rand(100,999);

        $this->mail->setFrom('fagoorders@gmail.com, Fago');
        $this->mail->addAddress($user_email);
        $this->mail->Subject = 'Fago - Verify your email';
        $this->mail->isHTML(true);
        $this->mail->Body = "<h1>Verify your email</h1>
        <p>Please verify your email address by entering the following OTP.</p>
        <h2>OTP: $otp</h2>
        <p>Regards,<br>Fago Team</p>";

        if($this->mail->send()){
            $_SESSION['v_otp']=$otp;
            $_SESSION['v_email']=$user_email;
            return true;
        }else{
            $_SESSION['email-error']="There was an error sending the email";
           return false;
        }

    }
    public function verifyOTP($connection,$otp){
        if($otp==$_SESSION['v_otp']){
            return true;
        }else {
            $_SESSION['otp-error']="OTP is incorrect";
            return false;
        }
    }
}