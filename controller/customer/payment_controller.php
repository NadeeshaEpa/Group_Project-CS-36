<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/payment_model.php';

require('../../payment_config.php');
if(isset($_POST['stripeToken'])){
    $amount=$_POST['amount'];
    $agent=$_POST['agentid'];

    \Stripe\Stripe::setVerifySslCerts(false);

    $token=$_POST['stripeToken'];

    $charge = \Stripe\Charge::create(array(
        "amount"=>$_POST['amount']*100,
        "currency"=>"lkr",
        "description"=>"Payment for your order",
        "source"=>$token,
    ));

    $payment=new payment_model();


    if ($charge->status == 'succeeded') {
        $order=$payment->order($connection,$agent,$_SESSION['User_id'],$amount);
        $placeorder=$payment->placeorder($connection,$_SESSION['User_id'],$agent);
        //get customer name,email,order id,order date,shop name,item name,quantity,price
        $final_orderdetails=$payment->getorderdetails($connection,$_SESSION['User_id'],$agent);
        $_SESSION['final_orderdetails']=$final_orderdetails;
        $cart=$payment->emptycart($connection,$_SESSION['User_id'],$agent);

        if($order===false || $placeorder===false || $cart===false){
            $_SESSION['payment']="failed";
            header("Location: ../../view/customer/total.php");
        }else{
            $_SESSION['payment']="success";
            //email order details to customer using php mailer library
            require_once '../../model/customer/email_model.php';
            $email=new email_model();
            $email->order_details($connection,$final_orderdetails);
            $email->sendEmail($connection);
            header("Location: ../../view/customer/order_successfull.php");
        }

    } else {
        $_SESSION['payment']="failed";
        header("Location: ../../view/customer/total.php");
    }
}





?>