<?php
session_start();

include_once('../../config.php');
include_once('../../model/fuelmanager/fuelManager_insert.php');

if(isset($_POST['SetDate'])){

    $firstname=$_POST['name'];
    $nic=$_POST['nic'];
    $username=$_POST['username'];
    $date=$_POST['date'];
}
else{
    echo('invalid Request');
    exit();
}

$firstname=$connection->real_escape_string($firstname);
$nic=$connection->real_escape_string($nic);
$username=$connection->real_escape_string($username);
$date=$connection->real_escape_string($date);

$user=new fuel_manager_insert();
$result=$user->setArrivalDate($connection,$firstname,$nic,$username,$date);
if($result){
    $_SESSION['setArrivalDate'] = 'Set arrival date Successfully';
    header("Location: ../../view/fuelmanager/sucessfully.php");
}else{
    header("Location: ../../view/fuelmanager/setArrival_date.php");
}

$connection->close();
