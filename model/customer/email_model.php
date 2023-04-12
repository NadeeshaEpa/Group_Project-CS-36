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
        $message.="<br>Pincode: ".$orders[0]['reserve_pin'];
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
    public function sendEmail_Agent($orders,$gasagentemail){
        $subject="Order Details - Agent";
        $message="Your shop has received an order. The order details are as follows: <br>";
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

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($gasagentemail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;

        if(!$this->mail->send()){
            echo "Message could not be sent.";
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }else{
            echo "Message has been sent";
        }

    }
    public function sendRefundEmail($connection,$order_id,$useremail){
        $sql="SELECT * FROM `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        $order=$result->fetch_assoc();

        $subject="Refund Details";
        $message="Your order has been refunded successfully. Your refund details are as follows: <br>";
        $message.="<br>Order ID: ".$order['Order_id'];
        $message.="<br>Order Date: ".$order['Order_date'];
        $message.="<br>Total Amount:LKR ".$order['Amount']+$order['Delivery_fee'];
        $message.="<br>Thank you for shopping with us. We hope to see you again soon.";
        $message.="<br>Regards,<br>Fago Team";

        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($useremail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;

        if(!$this->mail->send()){
            echo "Message could not be sent.";
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }else{
            echo "Message has been sent";
        }
    }
    public function sendRefundEmail_agent($connection,$order_id,$gasagentemail){

        $sql="SELECT * FROM `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        $order=$result->fetch_assoc();

        $subject="Refund Details - Agent";
        $message="The order which is for your shop under the order ID ".$order['Order_id']." has been refunded successfully.<br>
         The refund details are as follows: <br>";
        $message.="<br>Order ID: ".$order['Order_id'];
        $message.="<br>Order Date: ".$order['Order_date'];
        $message.="<br>Regards,<br>Fago Team";


        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($gasagentemail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;

        if(!$this->mail->send()){
            echo "Message could not be sent.";
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }else{
            echo "Message has been sent";
        }
    }
}



?>