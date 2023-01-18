<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/gasagent_viewModel.php");


if(isset($_POST['view'])){
    $view = new View();
    $result= $view->get_details($connection);
   
    
    if($result==false){
        $_SESSION['view']="failed";
        header("Location: ../../view/gasagent/gasagentView.php");            
    }else{
        
        $_SESSION['view_result']=$result;   
        header("Location: ../../view/gasagent/gasagentView.php");   
    }

}



