<?php
session_start();
require_once("../../config.php");
require_once("../../model/fuelmanager/fuelmanagerViewModel.php");


if(isset($_POST['view'])){
    $view = new View();
    $result= $view->get_details($connection);
   
    
    if($result==false){
        $_SESSION['view']="failed";
        header("Location: ../../view/fuelmanager/FuelmanagerView.php");            
    }else{
        //unset($_SESSION['viewacc']);
        $_SESSION['view_result']=$result;   
        header("Location: ../../view/fuelmanager/FuelmanagerView.php");   
    }

}



