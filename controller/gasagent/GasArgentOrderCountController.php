<?php 
session_start();

require_once("../../config.php");
require_once("../../model/gasagent/gasArgentCountModel.php");

$count = new gas_count;

$result = array(
    'Order_count' => $count->getCount($connection),
    'total_fee' => $count->getTotalFee($connection)
);
echo json_encode($result);