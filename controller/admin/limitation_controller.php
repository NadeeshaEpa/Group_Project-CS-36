<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/limitation_model.php';


if(isset($_GET['id'])){
    $limit=new limit_model();
    $result=$limit->viewlimit($connection);
    if($result){
        $_SESSION['limitations']=$result;
        header("Location:../../view/admin/limitations.php");
    }else{
        $_SESSION['limitations']=[];
        header("Location:../../view/admin/limitations.php");
    }

}

if(isset($_GET['uid'])){
    $limit=new limit_model();
    $result=$limit->viewlimit($connection);
    if($result){
        $_SESSION['editlimit']=$result;
        header("Location:../../view/admin/limitations_update.php");
    }else{
        $_SESSION['editlimitations']=[];
        header("Location:../../view/admin/limitations_update.php");
    }

}

if (isset($_POST['updatelimit'])) {
    $limit_status=$_POST['limit_status'];
    $time_period = $_POST['time_period'];
   

    $limit_status=$connection->real_escape_string($limit_status);
    $time_period = $connection->real_escape_string($time_period);
   

    $limit = new limit_model();
    $inputs = array($limit_status, $time_period);


    $result1 = $limit->update_limit($connection, $inputs);
    if ($result1) {

        $_SESSION['updatelimit'] = "success";
        header("Location: ../../controller/admin/limitation_controller.php?id=limitations");

    } else {
        $_SESSION['updatelimit'] = "failed";
        echo "Failed";
    }

}


?>