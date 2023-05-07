<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");

if(isset($_POST['complane_btn'])){
    $refNo=$_POST['complaneRef'];

    $discription=$_POST['complaneDes'];

    $discription=$connection->real_escape_string($discription);
    $refNo=$connection->real_escape_string($refNo);
    
    $user=new Complain;
    $result=$user->addComplain($connection,$discription,$refNo);
    
    if($result==true){
        $_SESSION['Complain_add']="Complain Added Successfully";
        header("Location: ../../controller/deliveryperson/deliveryPersonAddComplaneFirst.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Complain_err']="Error Occurred";
        header("Location: ../../controller/deliveryperson/deliveryPersonAddComplaneFirst.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../controller/deliveryperson/deliveryPersonAddComplaneFirst.php");
    $connection->close();
    exit();
}