<?php 
session_start();

include_once('../../config.php');
include_once('../../model/gasagent/addGasType_model.php');

if(isset($_POST['AddgasType'])){   
    $weight=$_POST['gasWeight'];
    $quantity=$_POST['gasQuantity'];
    $gasagentId= $_SESSION['User_id'];

    $weight=$connection->real_escape_string($weight);
    $quantity=$connection->real_escape_string($quantity);

    $user=new add_gasType();
    $cylinderId=$user->getcylinderId($connection,$weight,$gasagentId);

    $result=$user -> addgas($connection,$cylinderId,$quantity,$gasagentId);
    if($result==true)
    {
        header("Location: ../../view/gasagent/addGasTypeSucsess.php");
    }
    else
    {
        echo "error";
    }
}

