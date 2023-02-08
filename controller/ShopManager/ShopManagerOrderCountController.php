<?php 
session_start();

require_once("../../config.php");
require_once("../../model/ShopManager/shopManagerCountModel.php");

$count = new delivery_count;

$result = array(
    'Order_count' => $count->getDeliveryCount($connection),
    'total_fee' => $count->getTotalFee($connection)
);
echo json_encode($result);




