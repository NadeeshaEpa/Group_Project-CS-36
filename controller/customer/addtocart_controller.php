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
if(isset($_POST['viewcart'])){
    $gasagent=$_POST['gas_id'];
    $_SESSION['gasagent']=$gasagent;
    $User_id=$_SESSION['User_id'];
    //$button=$connection->real_escape_string($button);
    $cart=new addtocart_model();
    $result=$cart->viewcart($connection,$User_id);
    if($result===false){
        $_SESSION['viewcart']="empty";
        header("Location: ../../view/customer/view_cart.php");
    }else{
        $_SESSION['viewcart']=$result;
        header("Location: ../../view/customer/view_cart.php");
    }
}
if(isset($_POST['remove'])){
    $gasid=$_POST['agent_id'];
    $cartid=$connection->real_escape_string($gasid);
    $cart=new addtocart_model();
    $result=$cart->remove($connection,$gasid);
    if($result===false){
        $_SESSION['remove']="failed";
        header("Location: ../../view/customer/view_cart.php");
    }else{
        $_SESSION['remove']="success";
        $result=$cart->viewcart($connection,$User_id);
        if($result===false){
            $_SESSION['viewcart']="empty";
            header("Location: ../../view/customer/view_cart.php");
        }else{
            $_SESSION['viewcart']=$result;
            header("Location: ../../view/customer/view_cart.php");
        }
    }
}
// class addtocart_controller{
//     public function view_cart($connection){
//         $User_id=$_SESSION['User_id'];
//         $cart=new addtocart_model();
//         $result=$cart->viewcart($connection,$User_id);
//         if($result===false){
//             $_SESSION['viewcart']="empty";
//             header("Location: ../../view/customer/view_cart.php");
//         }else{
//             $_SESSION['viewcart']=$result;
//             header("Location: ../../view/customer/view_cart.php");
//         }
//     }
// }