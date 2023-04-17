<?php
require_once("../../config.php");
require_once("../../model/gasagent/complaneModel.php");
// require_once("../../model/deliveryperson/ReviewsModel.php");

if(isset($_POST['ComplainDeleteBtn'])){
    $Complane_id=$_POST['Complain_Id_Name'];
    $Complane_id=$connection->real_escape_string($Complane_id);

    $user=new Complain(); 
    $result=$user->Delete_Complanes($connection,$Complane_id);
    
    
    if($result==true){
       
        header("Location: ../../controller/gasagent/deliveryPersonComplainViewFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/gasagent/deliveryPersonComplainViewFirstController.php");
        $connection->close();
        exit();
    }

}

