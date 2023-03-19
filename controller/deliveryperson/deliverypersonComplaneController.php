<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");

if(isset($_POST['complane_btn'])){
    $refNo=$_POST['complaneRef'];
<<<<<<< HEAD
    $discription=$_POST['complaneDes'];
=======
    $discription=$_POST['complane_diesf'];
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
    $discription=$connection->real_escape_string($discription);
    $refNo=$connection->real_escape_string($refNo);
    
    $user=new Complain;
    $result=$user->addComplain($connection,$discription,$refNo);
    
    if($result==true){
        $_SESSION['Complain_add']="Complain Added Successfully";
        header("Location: ../../view/deliveryperson/DelivaryComplains.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Complain_err']="Error Occurred";
        header("Location: ../../view/deliveryperson/DelivaryComplains.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/deliveryperson/DelivaryComplains.php");
    $connection->close();
    exit();
}