<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/shop_model.php");
require_once("../../model/customer/addtocart_model.php");

if(isset($_GET['gascooker'])){
   $gascooker=new shop_model();
   $result=$gascooker->getGasCooker($connection);
   if($result==false){
      echo "No gas cooker";
   }else{
      $_SESSION['gascooker']=$result;
      header("Location: ../../view/customer/inside_fagoshop.php");
   }
}
if(isset($_GET['addtocart'])){
   $item_code=$_GET['item_code'];
   $product_type=$_GET['product_type'];
   $name=$_GET['Name'];
   $quantity=$_GET['Quantity'];
   $price=$_GET['price'];
   $category=$_GET['Category'];
   $description=$_GET['Description'];
   $User_id=$_SESSION['User_id'];
   $gascooker=new addtocart_model();
   $result=$gascooker->addtocart($connection,$User_id,$item_code,$product_type,$name,$quantity,$price,$category,$description);

}