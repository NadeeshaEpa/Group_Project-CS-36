<?php 
session_start();

include_once('../../config.php');
include_once('../../model/gasagent/addGasType_model.php');
include_once('../../model/gasagent/deleteGasType_model.php');
include_once('../../model/gasagent/update_gasQuantity_model.php');

if(isset($_POST['AddgasType'])){   
    // $gasType=$_POST['gasType'];
    $weight=$_POST['gasWeight'];
    $quantity=$_POST['gasQuantity'];
    $gasagentId= $_SESSION['User_id'];
    // $price=$_POST['gasPrice'];
   
// }
// else{
//     echo('invalid Request');
//     exit();
// }

// $gasType=$connection->real_escape_string($gasType);
$weight=$connection->real_escape_string($weight);
$quantity=$connection->real_escape_string($quantity);
// $price=$connection->real_escape_string($price);

$user=new add_gasType();
    $cylinderId=$user->getcylinderId($connection,$weight,$gasagentId);

    $result=$user -> addgas($connection,$cylinderId,$quantity,$gasagentId);
    if($result==true)
    {
        header("Location: ../../view/gasagent/addGasTypeSucsess.php");
    }
    else
    {
        // echo "error";
        header("Location: ../../view/gasagent/addGaserror.php");
    }
}

if(isset($_POST['deleteBtn'])){
    $deleteId = $connection->real_escape_string($_POST['deleteBtn']);   
    $deletetype = new delete_gasType();
    $delete = $deletetype->deleteGasType($connection,$deleteId);
    if($delete)
    {
        header("Location: ../../view/gasagent/addGasTypeSucsess.php");
    }
}


if(isset($_POST['quantityUpdateBtn'])){
    $updateId = $connection->real_escape_string($_POST['quantityUpdateBtn']);
    $quantity = $connection->real_escape_string($_POST['updateQuantity']);
    $updateGasQuantity = new  update_gasQuantity(); 
    $res = $updateGasQuantity->updateGasQuantity($connection, $updateId, $quantity);
    if($res) {
        $render = $_SESSION['Gas_UP_details'];
        $temp = [];
        foreach($render as $r){
            if ($r['Cylinder_Id'] == $updateId) $r['Quantity'] = $quantity;
            $temp[] = $r;
        }
        $_SESSION['Gas_UP_details'] = $temp;
        
        header("Location: ../../view/gasagent/gasagentUpdate.php");
    }


}





// $user->setDetails($gasType,$weight,$quantity);

// $result=$user->addgasType($connection);
// if($result){
//     $_SESSION['AddGasType'] = 'Add gas type  Successfully';
//     header("Location: ../../view/gasagent/addGasTypeSucsess.php");
// }else{
//     echo $connection->error;
//     header("Location: ../../view/gasagent/add_gastype.php");
// }

// $connection->close();