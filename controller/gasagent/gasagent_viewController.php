<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/gasagent_viewModel.php");


if(isset($_GET['viewgas'])){
    $userid=$_SESSION['User_id'];
    $gasagent=new gasagent_viewModal();
    $result=$gasagent->get_details($connection,$userid);
    $_SESSION['gas']=$result;
    // print_r($result);
    // die();
    header("Location:../../view/gasagent/gasagentView.php");

}



