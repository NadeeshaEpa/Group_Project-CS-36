<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/shop_model.php");

if(isset($_GET['gascooker'])){
   $gascooker=new shop_model();
   $result=$gascooker->getGasCooker($connection);
}