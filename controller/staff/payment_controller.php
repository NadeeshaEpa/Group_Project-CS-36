<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/payment_model.php';


if(isset($_GET['id'])){
    $payment=new payment_model();
    $result=$payment->viewgaspayment($connection);
    if($result){
        $_SESSION['gaspaymentdetails']=$result;
        header("Location:../../view/staff/payments.php");
    }else{
        $_SESSION['gaspaymentdetails']=[];
        header("Location:../../view/staff/payments.php");
    }

}

if(isset($_GET['deid'])){
    $payment=new payment_model();
    $result=$payment->viewdeliverypayment($connection);
    if($result){
        $_SESSION['deliverypaymentdetails']=$result;
        header("Location:../../view/staff/delivery_payments.php");
    }else{
        $_SESSION['deliverypaymentdetails']=[];
        header("Location:../../view/staff/delivery_payments.php");
    }

}

if(isset($_GET['vid'])){
    $User_id=$_GET['vid'];
    $User_id=$connection->real_escape_string($User_id);
    $_SESSION['vid']=$User_id;
    $payment=new payment_model();
    $result=$payment->view_payment($connection,$User_id);
    if($result===false){
        $_SESSION['viewpayment']="failed";
        header("Location: ../../view/staff/payments.php");
    }else{
        $_SESSION['viewpayment']=$result;
        $result2=$payment->view_paidpayment($connection,$User_id);
        if($result2){
            $_SESSION['view_paidpayment']=$result2;
        }else{
            $_SESSION['view_paidpayment']=[];
        }
        header("Location: ../../view/staff/payment_view.php");
    }
}

if(isset($_GET['uid'])){
    $User_id=$_GET['uid'];
    $User_id=$connection->real_escape_string($User_id);
    $_SESSION['uid']=$User_id;
    $payment=new payment_model();
    $result=$payment->view_payment($connection,$User_id);
    if($result===false){
        $_SESSION['viewpayment']="failed";
        header("Location: ../../view/staff/payments.php");
    }else{
        $_SESSION['viewpayment']=$result;
        header("Location: ../../view/staff/payment_update.php");
    }
}

if(isset($_POST['search_gasagent'])){
    $name=$_POST['user_id'];
    $name=$connection->real_escape_string($name);
    $payment=new payment_model();
    $result=$payment->search_gaspayment($connection,$name);
    if($result){
        $_SESSION['gaspaymentdetails']=$result;
        header("Location:../../view/staff/payments.php");
    }else{
        $_SESSION['gaspaymentdetails']=[];
        header("Location:../../view/staff/payments.php");
    }
}

if(isset($_POST['search_deliveryperson'])){
    $name=$_POST['user_id'];
    $name=$connection->real_escape_string($name);
    $payment=new payment_model();
    $result=$payment->search_deliverypayment($connection,$name);
    if($result){
        $_SESSION['deliverypaymentdetails']=$result;
        header("Location:../../view/staff/delivery_payments.php");
    }else{
        $_SESSION['deliverypaymentdetails']=[];
        header("Location:../../view/staff/delivery_payments.php");
    }
}


if(isset($_POST['updatepayment'])){
<<<<<<< HEAD
    $User_Id = $_POST['User_Id'];
    $Order_Id = $_POST['Order_Id'];
    $Payment = $_POST['payment'];    

=======
    $Order_Id=$_POST['Order_Id'];
    $User_Id=$_POST['User_Id'];
    $payment=$_POST['payment'];
    
>>>>>>> 39892497ba09a67dd7133a9ec633cf58a21b843a
    $Order_Id=$connection->real_escape_string($Order_Id);
    $User_Id=$connection->real_escape_string($User_Id);
    $payment=$connection->real_escape_string($payment);

    $payment1=new payment_model();
    if($payment=='Pending'){
        $paid=0;
        $result=$payment1->updatepayment($connection,$Order_Id,$User_Id,$paid);
    }
    else{
        $paid=1;
        $result=$payment1->updatepayment($connection,$Order_Id,$User_Id,$paid);
    }
    if($result){
            $_SESSION['updateuser']="success";
            header("Location: ../../controller/staff/payment_controller.php?id=gaspaymentdetails");
    }else{
            $_SESSION['updateuser']="failed";
    }
    
    


}
?>