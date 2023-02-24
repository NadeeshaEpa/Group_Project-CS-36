<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/addtocart_model.php");

if(isset($_POST['addtocart'])){
   $price=$_POST['price'];
   $gasid=$_POST['gasid'];
   $weight=$_POST['weight'];
   $quantity=$_POST['quantity'];
   $type=$_POST['gastype'];
   $User_id=$_SESSION['User_id'];

   $price=$connection->real_escape_string($price);
   $gasid=$connection->real_escape_string($gasid);
   $weight=$connection->real_escape_string($weight);
   $quantity=$connection->real_escape_string($quantity);
   $type=$connection->real_escape_string($type);

   $total=$price*$quantity;
   $cart=new addtocart_model();
   $result=$cart->addtocart($connection,$User_id,$gasid,$weight,$quantity,$total,$type);
    if($result===false){
         $_SESSION['addtocart']="failed";
         header("Location: ../../view/customer/inside_shop.php");
    }else{
         $_SESSION['addtocart']="success";
         $_SESSION['cart']="Full";
         header("Location: ../../view/customer/inside_shop.php");
        //  $result3=$cart->getcylinderid($connection,$type,$weight);
        //  $result2=$cart->updatequantity($connection,$quantity,$gasid,$result3);
        //     if($result2===false){
        //         $_SESSION['updatequantity']="failed";
        //         header("Location: ../../view/customer/inside_shop.php");
        //     }else{
        //         $_SESSION['updatequantity']="success";
        //         header("Location: ../../controller/customer/gas_controller.php?gasid=$gasid");
        //     }
    }
}
if(isset($_POST['viewcart'])|| isset($_GET['viewcart'])){
    $User_id=$_SESSION['User_id'];
    $cart=new addtocart_model();

    $result=$cart->viewcart($connection,$User_id);
    if($result===false){
        $_SESSION['viewcart']="empty";
        header("Location: ../../view/customer/view_cart.php");  
    }else if(sizeof($result)==0){
        $_SESSION['viewcart']="empty";
        header("Location: ../../view/customer/view_cart.php");   
    }else{
        $_SESSION['viewcart']=$result;
        // print_r($_SESSION['viewcart']);
        // die();
        header("Location: ../../view/customer/view_cart.php");
    }
}
if(isset($_POST['remove'])){
    $User_id=$_SESSION['User_id'];
    $gasid=$_POST['agent_id'];
    $cartid=$connection->real_escape_string($gasid);
    $cart=new addtocart_model();
    $result=$cart->remove($connection,$gasid,$User_id);
    if($result===false){
        $_SESSION['remove']="failed";
        header("Location: ../../view/customer/view_cart.php");
    }else{
        $_SESSION['remove']="success";
        $result=$cart->viewcart($connection,$User_id);
        if($result===false){
            $_SESSION['viewcart']="empty";
            header("Location: ../../view/customer/view_cart.php");
        }else if(sizeof($result)==0){
            $_SESSION['viewcart']="empty";
            header("Location: ../../view/customer/view_cart.php");
        }else{
            $_SESSION['viewcart']=$result;
            header("Location: ../../view/customer/view_cart.php");
        }
    }
}
if(isset($_POST['checkout'])){
    $User_id=$_SESSION['User_id'];
    $gasagent=$_POST['agent_id'];
    // print_r($gasagent);
    // die();
    $cart=new addtocart_model();
    $result=$cart->checkout($connection,$User_id,$gasagent);
    if($result===false){
        $_SESSION['checkout']="failed";
        print_r("failed");
        die();
        header("Location: ../../view/customer/view_cart.php");
    }else{
        $_SESSION['checkout']=$result;
        header("Location: ../../view/customer/view_checkout.php");
    }
}
if(isset($_POST['dcartitem'])){
    $User_id=$_SESSION['User_id'];
    $cartid=$_POST['id'];
    $gasagent=$_POST['agent'];
    $cart=new addtocart_model();
    $result=$cart->deletecartitem($connection,$User_id,$cartid);
    if($result===false){
        $_SESSION['dcartitem']="failed";
        header("Location: ../../view/customer/view_checkout.php");
    }else{
        $_SESSION['dcartitem']="success";
        $result=$cart->checkout($connection,$User_id,$gasagent);
        $_SESSION['checkout']=$result;
        $cart->getcartcount($connection,$User_id);
        header("Location: ../../view/customer/view_checkout.php");
    }
}
if(isset($_POST['updatecartquantity'])){
    $cartid=$_POST['cart_id'];
    $quantity=$_POST['quantity'];
    $User_id=$_SESSION['User_id'];
    $gasagent=$_POST['agent_id'];
    
    $cart=new addtocart_model();

    $result=$cart->updatecartquantity($connection,$cartid,$quantity,$gasagent);
    if($result===false){
        $_SESSION['updatecartquantity']="failed";
        header("Location: ../../view/customer/view_checkout.php");
    }else{
        $_SESSION['updatecartquantity']="success";
        $result2=$cart->checkout($connection,$User_id,$gasagent);
        $_SESSION['checkout']=$result2;
        $cart->getcartcount($connection,$User_id);
        header("Location: ../../view/customer/view_checkout.php");
    }
}
if(isset($_POST['dmbutton'])){
    if(isset($_POST['delivery'])){
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
        $gasagent=$_POST['agent'];
        if($latitude==NULL || $longitude==NULL){
            $latitude=$_SESSION['latitude'];
            $longitude=$_SESSION['longitude'];
        }
        $_SESSION['cdlatitude']=$latitude;
        $_SESSION['cdlongitude']=$longitude;
        
        $cart=new addtocart_model();
        $result=$cart->checkout($connection,$_SESSION['User_id'],$gasagent);
        if($result===false){
            $_SESSION['dcheckout']="failed";
            header("Location: ../../view/customer/total.php");
        }else{
            $_SESSION['dcheckout']=$result;
            header("Location: ../../view/customer/total.php");
        }

    }else if(isset($_POST['nodelivery'])){
        $gasagent=$_POST['agent'];
        $cart=new addtocart_model();
        $result=$cart->checkout($connection,$_SESSION['User_id'],$gasagent);
        if($result===false){
            $_SESSION['dcheckout']="failed";
            header("Location: ../../view/customer/total.php");
        }else{
            $_SESSION['dcheckout']=$result;
            $_SESSION['delivery_fee']=0;
            header("Location: ../../view/customer/total.php");
        }
    }
}