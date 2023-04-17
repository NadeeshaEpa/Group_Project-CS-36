<?php
session_start();
require_once '../../config.php';
require_once '../../model/deliveryperson/forgotpassword_model.php';
require_once '../../model/deliveryperson/delivery_model.php';
require_once '../../model/deliveryperson/checkdelivery_model.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../vendor/autoload.php';

class forgotpassword_controller{
    private $mail;
    private $user;
    private $forgotpassword;

    function __construct(){
        $this->forgotpassword=new forgotpassword_model();
        $this->user=new delivery_model();
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
        $useremail=$_POST['email'];
        $useremail=filter_var($useremail,FILTER_SANITIZE_EMAIL);

        if(empty($useremail)){
            $_SESSION['email-status']="Please enter your email address";
            header("Location: ../../view/deliveryperson/forgot_password.php");
            exit();
        }else if(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
            $_SESSION['email-status']="Please enter a valid email address";
            header("Location: ../../view/deliveryperson/forgot_password.php");
            exit();
        }
        $selector=bin2hex(random_bytes(8));
        $token=random_bytes(32);
        $url="http://localhost/Fago/view/deliveryperson/createnewpassword.php?selector=".$selector."&validator=".bin2hex($token);
        $expires=date("U")+1800;

        $result1=$this->forgotpassword->deleteEmail($useremail,$connection);
        if(!$result1){
            $_SESSION['email-status']="There was an error1";
            header("Location: ../../view/deliveryperson/forgot_password.php");
            exit();
        }
        
        $result2=$this->forgotpassword->insertToken($selector,$token,$expires,$useremail,$connection);
        if(!$result2){
            $_SESSION['email-status']="There was an error2";
            header("Location: ../../view/deliveryperson/forgot_password.php");
            exit();
        }

        $subject="Reset your password for FAGO";
        $message='<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
        $message.='<p>Here is your password reset link: </br>';
        $message.='<a href="'.$url.'">'.$url.'</a></p>';

        $this->mail->setFrom("fagoorders@gmail.com");
        $this->mail->addAddress($useremail);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;  
        
        
        if($this->mail->Send()){
            $_SESSION['email-status-success']="Reset password link has been sent to your email";
            header("Location: ../../view/deliveryperson/forgot_password.php");
        }else{
            $_SESSION['email-status']="There was an error3";
            header("Location: ../../view/deliveryperson/forgot_password.php");
            exit();
        }
        
    }
    public function resetPassword($connection){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'selector'=>trim($_POST['selector']),
                'validator'=>trim($_POST['validator']),
                'password'=>trim($_POST['password']),
                'cpassword'=>trim($_POST['cpassword'])
            ];
            $url='../../view/deliveryperson/createnewpassword.php?selector='.$data['selector'].'&validator='.$data['validator'];

            if(empty($_POST['password'])|| empty($_POST['cpassword'])){
                $_SESSION['password-status']="Please fill all the fields";
                header("Location: ".$url);
            }else if($_POST['password'] != $_POST['cpassword']){
                echo 'passwords do not match';
                $_SESSION['password-status']="Passwords do not match";
                header("Location: ".$url);
            }else{
                $currentDate=date("U");
                $result3=$this->forgotpassword->resetPassword($data['selector'],$currentDate,$connection);

                if(!$result3){
                    echo 'sorry the link has expired';
                    $_SESSION['password-status']="Sorry the link is no longer valid";
                    header("Location: ".$url);
                }
                // if(strlen($data['password'])<8){
                // $_SESSION['password-status']="Password must be at least 8 characters";
                // header("Location: ".$url);
                // }

                $tokenBin=hex2bin($data['validator']);
                $tokenCheck=password_verify($tokenBin,$result3['Token']);
                if(!$tokenCheck){
                    echo 'you need to re-submit your reset request';
                    $_SESSION['password-status']="You need to re-submit your reset request";
                    header("Location: ".$url);
                }

                $tokenEmail=$result3['PwdresetEmail'];
                $result4=checkemail($tokenEmail,$connection);
                if(!$result4){
                    $_SESSION['password-status']="There was an error";
                    header("Location: ".$url);
                }
                
                $newpwd=md5($data['password']);
                $result5=$this->user->resetEmail($connection,$newpwd,$tokenEmail);
                if(!$result5){
                    $_SESSION['password-status']="There was an error";
                    header("Location: ".$url);
                }
                if($result3 && $result4 && $result5){
                    echo 'password has been reset';
                    $_SESSION['password-status-success']="Your password has been reset";
                    header("Location:".$url);
                }
            }
        }
}

$init=new forgotpassword_controller();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'send':
            $init->sendEmail($connection);
            break;
        case 'reset':
            $init->resetPassword($connection);
            break;
        default:
        header("location: ../../view/deliveryperson/forgot_password.php"); 
    }
}

