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
if(isset($_GET['regulator'])){
   $regulator=new shop_model();
   $result=$regulator->getRegulator($connection);
   if($result==false){
      echo "No regulator";
   }else{
      $_SESSION['regulator']=$result;
      header("Location: ../../view/customer/inside_fagoshop_regulator.php");
   }
}
if(isset($_GET['other'])){
   $other=new shop_model();
   $result=$other->getOther($connection);
   if($result==false){
      echo "No other";
   }else{
      $_SESSION['other']=$result;
      header("Location: ../../view/customer/inside_fagoshop_other.php");
   }
}
if(isset($_GET['urgascooker'])){
   $gascooker=new shop_model();
   $result=$gascooker->getGasCooker($connection);
   if($result==false){
      echo "No gas cooker";
   }else{
      $_SESSION['gascooker']=$result;
      header("Location: ../../view/customer/inside_unfagoshop.php");
   }
}
if(isset($_GET['unregulator'])){
   $regulator=new shop_model();
   $result=$regulator->getRegulator($connection);
   if($result==false){
      echo "No regulator";
   }else{
      $_SESSION['regulator']=$result;
      header("Location: ../../view/customer/inside_fagoshop_urregulator.php");
   }
}
if(isset($_GET['unother'])){
   $other=new shop_model();
   $result=$other->getOther($connection);
   if($result==false){
      echo "No other";
   }else{
      $_SESSION['other']=$result;
      header("Location: ../../view/customer/inside_fagoshop_unother.php");
   }
}
if(isset($_POST['view_item'])){
   $item_code=$_POST['item_code'];
   $product_type=$_POST['product_type'];
   $name=$_POST['Name'];
   $quantity=$_POST['Quantity'];
   $price=$_POST['price'];
   $category=$_POST['Category'];
   $description=$_POST['Description'];
   $User_id=$_SESSION['User_id'];
    
   $gascooker=[];
   array_push($gascooker,['item_code'=>$item_code,'product_type'=>$product_type,'name'=>$name,'quantity'=>$quantity,'price'=>$price,'category'=>$category,'description'=>$description,'User_id'=>$User_id]);
   $_SESSION['gascookerview']=$gascooker;
   header("Location: ../../view/customer/view_item.php");

}


if(isset($_POST['shop_add'])){
   $item_code=$_POST['item_code'];
   $product_type=$_POST['product_type'];
   $name=$_POST['Name'];
   $quantity=$_POST['quantity'];
   $price=$_POST['price'];
   $category=$_POST['Category'];
   $description=$_POST['Description'];
   $User_id=$_SESSION['User_id'];

   $gascooker=new shop_model();
   $result=$gascooker->addtocart($connection,$User_id,$item_code,$product_type,$name,$quantity,$price,$category,$description);
   if($result==false){
      $_SESSION['addtocart']="failed";
      header("Location: ../../view/customer/inside_fagoshop.php");
   }else{
      $_SESSION['addtocart']="success";
      header("Location: ../../view/customer/view_item.php");
   }
}