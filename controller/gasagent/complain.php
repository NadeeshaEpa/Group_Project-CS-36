<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/compalin.model.php");

if(isset($_POST['complane_btn'])){
    $refNo=$_POST['complaneRef'];
    $discription=$_POST['complaneDes'];
    $discription=$connection->real_escape_string($discription);
    $refNo=$connection->real_escape_string($refNo);
    
    $user=new Complain;
    $result=$user->addComplain($connection,$discription,$refNo);
    
    if($result==true){
        $_SESSION['Complain_add']="Complain Added Successfully";
        header("Location: ../../view/gasagent/compalin.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Complain_err']="Error Occurred";
        header("Location: ../../view/gasagent/compalin.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/gasagent/compalin.php");
    $connection->close();
    exit();
}