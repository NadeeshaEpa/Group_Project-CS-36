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
    public function send_DeliverypersonEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;

        $subject="Accept Registration Requests";
        $message="<h2>Hi ".$fname." ".$lname.",<h2>";
        $message.="<br>We are pleased to inform you that you have been officially registered to the fago family as a Delivery Person.<br>";
        $message.="Congratulations!<br>";
        $message.="Now you Can Login to the website and start DAY 1.";

        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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

    public function send_CustomerEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;
       

        $subject="Accept Registration Requests";
        $message="<h2>Hi ".$fname." ".$lname.",<h2>";
        $message.="<br>Your Registration request has been confirmed successfully.<br>";
        $message.="Congratulations!<br>";
        $message.="Now you Can Login to the website and place your order.";

        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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

    public function send_GasagentEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;

        $subject="Accept Registration Requests";
        $message="<h2>Hi ".$fname." ".$lname.",</h2>";
        $message.="<br>Your Registration request has been confirmed successfully.<br>";
        $message.="We are happy to have you as one of our merchants.<br>";
        $message.="Now you Can Login to the website and sell your products.";

        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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

    public function send_CancelEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;

        $subject="Registration Request Cancelled";
        $message="<h2>Hi ".$fname." ".$lname.",<h2>";
        $message.="<br>Your Registration request has been declined by our staff.<br>";
        $message.="To know further details you can contact us through,";
        $message.="<br>Email : fagoorders@gmail.com";
        $message.="<br>Contact-number : 011-2834322";
        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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

    public function send_DisableEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;

        $subject="FAGO account disabled";
        $message="<h2>Hi ".$fname." ".$lname.",<h2>";
        $message.="<br>We are sorry to inform you, your FAGO accounts have been disabled by our team.<br>";
        $message.="To know further details you can contact us through,";
        $message.="<br>Email : fagoorders@gmail.com";
        $message.="<br>Contact-number : 011-2834322";
        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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

    public function send_ActivateEmail($userid,$connection){
        //email order details to Users
        $sql="select Email,First_Name,Last_Name from user where User_id=$userid";
        $result=$connection->query($sql);
        $row=$result->fetch_object();
        $email=$row->Email;
        $fname=$row->First_Name;
        $lname=$row->Last_Name;
       

        $subject="FAGO account activated ";
        $message="<h2>Hi ".$fname." ".$lname.",<h2>";
        $message.="<br>We are happy to inform you that your FAGO account have been activated.<br>";
        $message.="Now you Can Login to the website.";

        $message.="<br>Thank you for joining with us.";
        $message.="<br>Regards,<br>Fago Team";

        //send email only to gas agent
        $this->mail->setFrom('fagoorders@gmail.com', 'Fago');
        $this->mail->addAddress($email);
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