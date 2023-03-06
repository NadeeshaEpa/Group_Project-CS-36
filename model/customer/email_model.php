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
    public function sendEmail($orders){
        //email order details to customer
        $useremail=$orders[0]['email'];
        $subject="Order Details";
        $message="Your order has been placed successfully. Your order details are as follows: <br>";
        $message.="<br>Order ID: ".$orders[0]['orderid'];
        $message.="<br>Order Date: ".$orders[0]['orderdate'];
        $message.="<br>Order Total: ".$orders[0]['total'];
        $message.="<br>Delivery Method: ".$orders[0]['delivery_method'];
        $message.="<br>Delivery Fee: ".$orders[0]['delivery_fee'];
        $message.="<table border='1'>";
        $message.="<tr><th>Product Name</th><th>Quantity</th><th>Price</th></tr>";
        foreach($orders as $order){
            $message.="<tr><td>".$order['itemname']."</td><td>".$order['quantity']."</td><td>".$order['price']."</td></tr>";
        }
        $message.="</table>";

        $message.="<br>Thank you for shopping with us. We hope to see you again soon.";
        $message.="<br>Regards,<br>Fago Team";
        
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($useremail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->send();
        

    }
    
}



?>