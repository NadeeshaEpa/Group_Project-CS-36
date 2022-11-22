<?php 
session_start();

include_once('../../config.php');
include_once('../../model/fuelmanager/addFuelType_model.php');

if(isset($_POST['AddFuelType'])){
    
    $fuelType=$_POST['fuelType'];
    $subFuelType=$_POST['fuelSubType'];
    $quantity=$_POST['FuelQuantity'];
    $price=$_POST['FuelPrice'];
   
}
else{
    echo('invalid Request');
    exit();
}

$fuelType=$connection->real_escape_string($fuelType);
$subFuelType=$connection->real_escape_string($subFuelType);
$quantity=$connection->real_escape_string($quantity);
$price=$connection->real_escape_string($price);

$user=new add_fuelType();
$user->setDetails($fuelType,$subFuelType,$quantity,$price);
$result=$user->addFuelType($connection);
if($result){
    $_SESSION['AddFuelType'] = 'Add fuel type  Successfully';
    header("Location: ../../view/fuelmanager/sucessfully.php");
}else{
    header("Location: ../../view/fuelmanager/AddFuelType.php");
}

$connection->close();