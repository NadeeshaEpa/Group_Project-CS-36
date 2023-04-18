<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/shop_model.php");
require_once("../../model/customer/addtocart_model.php");

if(isset($_GET['gascooker']) || isset($_GET['gascooker_page'])){
   $gascooker=new shop_model();

   $limit = 8;
   $_SESSION['gascooker_limit']=$limit;
   $page = isset($_GET['gascooker_page']) ? $_GET['gascooker_page'] : 1;
   $_SESSION['gascooker_page']=$page;
   $offset = ($page - 1) * $limit;
   $_SESSION['gascooker_offset']=$offset;
   
   //get the total number of items
   $item="Gas Cooker";
   $total_records=$gascooker->items($connection,$item);
   $_SESSION['gascooker_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['gascooker_total_pages']=$total_pages;

   $result=$gascooker->getGasCooker($connection,$limit,$offset);
   if($result==false){
      $_SESSION['gascooker']=[];
      header("Location: ../../view/customer/inside_fagoshop.php");
   }else{
      $_SESSION['gascooker']=$result;
      header("Location: ../../view/customer/inside_fagoshop.php");
   }
}
if(isset($_GET['regulator'])||isset($_GET['regulator_page'])){
   $regulator=new shop_model();

   $limit = 8;
   $_SESSION['regulator_limit']=$limit;
   $page = isset($_GET['regulator_page']) ? $_GET['regulator_page'] : 1;
   $_SESSION['regulator_page']=$page;
   $offset = ($page - 1) * $limit;
   $_SESSION['regulator_offset']=$offset;

   //get the total number of items
   $item="Regulator";
   $total_records=$regulator->items($connection,$item);
   $_SESSION['regulator_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['regulator_total_pages']=$total_pages;

   $result=$regulator->getRegulator($connection,$limit,$offset);
   if($result==false){
      $_SESSION['regulator']=[];
      header("Location: ../../view/customer/inside_fagoshop_regulator.php");
   }else{
      $_SESSION['regulator']=$result;
      header("Location: ../../view/customer/inside_fagoshop_regulator.php");
   }
}
if(isset($_GET['other']) || isset($_GET['other_page'])){
   $other=new shop_model();

   $limit = 8;
   $_SESSION['other_limit']=$limit;
   $page = isset($_GET['other_page']) ? $_GET['other_page'] : 1;
   $_SESSION['other_page']=$page;
   $offset = ($page - 1) * $limit;
   $_SESSION['other_offset']=$offset;

   //get the total number of items
   $item="Other";
   $total_records=$other->items($connection,$item);
   $_SESSION['other_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['other_total_pages']=$total_pages;

   $result=$other->getOther($connection,$limit,$offset);
   if($result==false){
      $_SESSION['other']=[];
      header("Location: ../../view/customer/inside_fagoshop_other.php");
   }else{
      $_SESSION['other']=$result;
      header("Location: ../../view/customer/inside_fagoshop_other.php");
   }
}
if(isset($_GET['urgascooker']) || isset($_GET['ungascooker_page'])){
   $gascooker=new shop_model();

   $limit = 8;
   $page = isset($_GET['ungascooker_page']) ? $_GET['ungascooker_page'] : 1;
   $_SESSION['ungascooker_page']=$page;
   $offset = ($page - 1) * $limit;
   
   //get the total number of items
   $item="Gas Cooker";
   $total_records=$gascooker->items($connection,$item);
   $_SESSION['ungascooker_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['ungascooker_total_pages']=$total_pages;

   $result=$gascooker->getGasCooker($connection,$limit,$offset);
   if($result==false){
      echo "No gas cooker";
   }else{
      $_SESSION['gascooker']=$result;
      header("Location: ../../view/customer/inside_unfagoshop.php");
   }
}
if(isset($_GET['unregulator'])||isset($_GET['unregulator_page'])){
   $regulator=new shop_model();
   
   $limit = 8;
   $page = isset($_GET['unregulator_page']) ? $_GET['unregulator_page'] : 1;
   $_SESSION['unregulator_page']=$page;
   $offset = ($page - 1) * $limit;

   //get the total number of items
   $item="Regulator";
   $total_records=$regulator->items($connection,$item);
   $_SESSION['unregulator_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['unregulator_total_pages']=$total_pages;

   $result=$regulator->getRegulator($connection,$limit,$offset);

   if($result==false){
      echo "No regulator";
   }else{
      $_SESSION['regulator']=$result;
      header("Location: ../../view/customer/inside_fagoshop_urregulator.php");
   }
}
if(isset($_GET['unother'])||isset($_GET['unother_page'])){
   $other=new shop_model();
   
   $limit = 8;
   $page = isset($_GET['unother_page']) ? $_GET['unother_page'] : 1;
   $_SESSION['unother_page']=$page;
   $offset = ($page - 1) * $limit;

   //get the total number of items
   $item="Other";
   $total_records=$other->items($connection,$item);
   $_SESSION['unother_count']=$total_records;

   //calculate the total number of pages
   $total_pages = ceil($total_records / $limit);
   $_SESSION['unother_total_pages']=$total_pages;

   $result=$other->getOther($connection,$limit,$offset);

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
   $image=$_POST['image'];
    
   $items=[];
   array_push($items,['item_code'=>$item_code,'product_type'=>$product_type,'name'=>$name,'quantity'=>$quantity,'price'=>$price,'category'=>$category,'description'=>$description,'User_id'=>$User_id,'image'=>$image]);
   $_SESSION['gascookerview']=$items;
   header("Location: ../../view/customer/view_item.php");

}
if(isset($_POST['buy_item'])){
   $item_code=$_POST['item_code'];
   $product_type=$_POST['product_type'];
   $name=$_POST['Name'];
   $quantity=$_POST['Quantity'];
   $price=$_POST['price'];
   $category=$_POST['Category'];
   $agent=$_POST['agent'];
   $description=$_POST['Description'];
   $User_id=$_SESSION['User_id'];
   
   $shop=new shop_model();
   $result=$shop->addtocart($connection,$User_id,$item_code,$product_type,$name,$quantity,$price,$category,$description);
   $shop->setloc($User_id,$connection);
   $items=[];
   $agentid=$shop->stock_manager($connection);
   array_push($items,['name'=>$name,'product_type'=>$product_type,'price'=>$price,'type'=>$category,'shop'=>"Fago Shop",'agent_id'=>$agentid[0]['id']]);
   $_SESSION['viewitems']=$items;
   header("Location: ../../view/customer/buy_item.php");
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
      if($category=="Gas Cooker"){
         $result=$gascooker->getGasCooker($connection,$_SESSION['gascooker_limit'],$_SESSION['gascooker_offset']);
         if($result==false){
            $_SESSION['gascooker']=[];
            header("Location: ../../view/customer/inside_fagoshop.php");
         }else{
            $_SESSION['gascooker']=$result;
            header("Location: ../../view/customer/inside_fagoshop.php");
         } 
      }else if($category=="Regulator"){
         $result=$gascooker->getRegulator($connection,$_SESSION['regulator_limit'],$_SESSION['regulator_offset']);
         if($result==false){
            $_SESSION['regulator']=[];
            header("Location: ../../view/customer/inside_fagoshop_regulator.php");
         }else{
            $_SESSION['regulator']=$result;
            header("Location: ../../view/customer/inside_fagoshop_regulator.php");
         }
      }else{
         $result=$gascooker->getOther($connection,$_SESSION['other_limit'],$_SESSION['other_offset']);
         if($result==false){
            $_SESSION['other']=[];
            header("Location: ../../view/customer/inside_fagoshop_other.php");
         }else{
            $_SESSION['other']=$result;
            header("Location: ../../view/customer/inside_fagoshop_other.php");
         }
      }
   }
}

if(isset($_POST['dmbutton'])){
   if(isset($_POST['delivery'])){
       $latitude=$_POST['latitude'];
       $longitude=$_POST['longitude'];
       $gasagent=$_POST['agent'];
       $price=$_POST['price'];

       if($latitude==NULL || $longitude==NULL){
           $latitude=$_SESSION['latitude'];
           $longitude=$_SESSION['longitude'];
       }
       $_SESSION['cdlatitude']=$latitude;
       $_SESSION['cdlongitude']=$longitude;
       
       $shop=new shop_model();
       $result=$shop->getdeliveryfee($_SESSION['User_id'],$connection,$_SESSION['cdlatitude'],$_SESSION['cdlongitude']);
       if($result===false){
           $_SESSION['dcheckout']=[];
           header("Location: ../../view/customer/total.php");
       }else{
            if($_SESSION['distance_limit']=="high"){
               header("Location: ../../view/customer/total_now.php");
            }else{
               $buy_now_price=[];
               array_push($buy_now_price,['price'=>$price,'delivery_fee'=>$result,'shop_name'=>"Fago Shop"]);
               $_SESSION['dnowcheckout']=$buy_now_price;
               header("Location: ../../view/customer/total_now.php");
            }
            
       }

   }else if(isset($_POST['nodelivery'])){
         $price=$_POST['price'];
         $buy_now_price=[];
         array_push($buy_now_price,['price'=>$price,'delivery_fee'=>0,'shop_name'=>"Fago Shop"]);
         $_SESSION['dnowcheckout']=$buy_now_price;
         header("Location: ../../view/customer/total_now.php");
   }
}

if(isset($_GET['gsearch'])){
   $type="Gas Cooker";
   $shop=new shop_model();
   $item=$_GET['searchitem'];
   $result=$shop->search($connection,$type,$item);
   if($result==false){
      $_SESSION['gascooker']=[];
      header("Location: ../../view/customer/inside_fagoshop.php");
   }else{
      $_SESSION['gascooker']=$result;
      header("Location: ../../view/customer/inside_fagoshop.php");
   }
}
if(isset($_GET['rsearch'])){
   $type="Regulator";
   $shop=new shop_model();
   $item=$_GET['searchitem'];
   $result=$shop->search($connection,$type,$item);
   if($result==false){
      $_SESSION['regulator']=[];
      header("Location: ../../view/customer/inside_fagoshop_regulator.php");
   }else{
      $_SESSION['regulator']=$result;
      header("Location: ../../view/customer/inside_fagoshop_regulator.php");
   }
}
if(isset($_GET['osearch'])){
   $type="Other";
   $shop=new shop_model();
   $item=$_GET['searchitem'];
   $result=$shop->search($connection,$type,$item);
   if($result==false){
      $_SESSION['other']=[];
      header("Location: ../../view/customer/inside_fagoshop_other.php");
   }else{
      $_SESSION['other']=$result;
      header("Location: ../../view/customer/inside_fagoshop_other.php");
   }
}
