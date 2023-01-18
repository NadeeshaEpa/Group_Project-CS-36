<?php 
session_start();

include_once('../../config.php');
include_once('../../model/gasagent/addGasType_model.php');

if(isset($_POST['AddgasType'])){   
    $gasType=$_POST['gasType'];
    $weight=$_POST['gasWeight'];
    $quantity=$_POST['gasQuantity'];
    // $price=$_POST['gasPrice'];
   
}
else{
    echo('invalid Request');
    exit();
}

$gasType=$connection->real_escape_string($gasType);
$weight=$connection->real_escape_string($weight);
$quantity=$connection->real_escape_string($quantity);
// $price=$connection->real_escape_string($price);

$user=new add_gasType();

$user->setDetails($gasType,$weight,$quantity);

$result=$user->addgasType($connection);
if($result){
    $_SESSION['AddGasType'] = 'Add gas type  Successfully';
    header("Location: ../../view/gasagent/addGasTypeSucsess.php");
}else{
    echo $connection->error;
    header("Location: ../../view/gasagent/add_gastype.php");
}

$connection->close();