<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/payment_model.php';
require('../../payment_config.php');

if(isset($_POST['stripeToken'])){
    $amount=$_POST['amount'];
    $agent=$_POST['agentid'];
    $userid=$_SESSION['User_id'];

    \Stripe\Stripe::setVerifySslCerts(false);

    $token=$_POST['stripeToken'];

    $payment=new payment_model();

    $availableQuantity = $payment->checkquantity($connection,$agent,$userid);
    if ($availableQuantity === false) {
        $_SESSION['payment']="failed";
        $_SESSION['error_message'] = "Not enough stock available for the order.";
        header("Location: ../../view/customer/total.php");
        exit;
    }

    $charge = \Stripe\Charge::create(array(
        "amount"=>$_POST['amount']*100,
        "currency"=>"lkr",
        "description"=>"Payment for your order",
        "source"=>$token,
    ));

    $charge_id=$charge->id;

    if ($charge->status == 'succeeded') {

        $connection->begin_transaction();

        $order=$payment->order($connection,$agent,$_SESSION['User_id'],$amount,$charge_id);
        $placeorder=$payment->placeorder($connection,$_SESSION['User_id'],$agent);
        $final_orderdetails=$payment->getorderdetails($connection,$_SESSION['User_id'],$agent);
        $_SESSION['final_orderdetails']=$final_orderdetails;
        $pay=$payment->pay($connection,$agent,$amount);
        $cart=$payment->emptycart($connection,$_SESSION['User_id'],$agent);
        $gasagentemail=$payment->getgasagentemail($connection,$agent);

        if($order==false){
            print_r("Order failed");
        }else if($placeorder==false){
            print_r("Place order failed");
        }else if($cart==false){
            print_r("Cart empty failed");
        }else if($pay==false){
            print_r("Pay failed");
        }

        if($order===false || $placeorder===false || $cart===false || $pay===false){
            $_SESSION['payment']="failed";
            $refund = \Stripe\Refund::create([
                'charge' => $charge_id,
                'amount' => $amount,
            ]);
            if($refund->status == 'succeeded'){
                $connection->rollback();
                $_SESSION['quantity_error'] = "Not enough stock available for the order.";
                header("Location: ../../view/customer/total.php");
            }else{
                $connection->rollback();
                header("Location: ../../view/customer/error.php");
            }
        }else{
            $connection->commit();
            $_SESSION['payment']="success";
            //email order details to customer using php mailer library
            require_once '../../model/customer/email_model.php';
            $email=new email_model();
            $email2=new email_model();
            $email->sendEmail($final_orderdetails);
            $email2->sendEmail_Agent($final_orderdetails,$gasagentemail);
            header("Location: ../../view/customer/order_successfull.php");
        }

    } else {
        $_SESSION['payment']="failed";
        header("Location: ../../view/customer/total.php");
    }
}





?>