<?php 
session_start();

require_once("../../config.php");
require_once("../../model/deliveryperson/deliveryCountModel.php");

// $count= new delivery_count;
// $result1=$count->getDeliveryCount($connection);
// $result2=$count->getTotalFee($connection);
// echo json_encode($result1);
// echo json_encode($result2);


$count = new delivery_count;
$result = array(
    'delivery_count' => $count->getDeliveryCount($connection),
    'total_fee' => $count->getTotalFee($connection)
);
echo json_encode($result);



