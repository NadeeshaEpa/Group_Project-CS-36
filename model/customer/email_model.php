<?php
session_start();
require_once '../../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../vendor/autoload.php';

class email_model{
    private $orderdetails;

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
    public function sendEmail($connection){
        //email order details to customer
        $useremail=$orderdetails[0]['email'];
        $subject="Order Details";
        $message="Your order has been placed successfully. Your order details are as follows: <br>";
        
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($useremail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;

    }
    public function order_details($connection,$order){
        //set order details to a variable to be used in sendEmail function
        $this->orderdetails=$order;
        // print_r($this->orderdetails);
        // die();
    }
}



?>