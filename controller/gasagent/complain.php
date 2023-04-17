<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/compalin_model.php");

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


if(isset($_POST['complane_view'])){
    
    
    $user=new Complain;
    $result=$user->viewComplain($connection);
    
    if($result==true){
        $_SESSION['Complain_view']=$result;
        header("Location: ../../view/gasagent/compalin_view.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Complain_err']="NO complane Added";
        header("Location: ../../view/gasagent/compalin_view.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/gasagent/compalin.php");
    $connection->close();
    exit();
}

if(isset($_POST['ComplainDeleteBtn'])){
    $Complane_id=$_POST['Complain_Id_Name'];
    $Complane_id=$connection->real_escape_string($Complane_id);

    $user=new Complain(); 
    $result=$user->Delete_Complanes($connection,$Complane_id);
    
    
    if($result==true){
       
        header("Location: ../../controller/gasagent/complain.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../view/gasagent/compalin.php");
        $connection->close();
        exit();}

}