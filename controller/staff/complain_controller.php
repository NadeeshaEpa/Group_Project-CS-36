<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/complain_model.php';


if(isset($_GET['id'])){
    $complain=new complain_model();
    $result=$complain->viewcomplain($connection);
    if($result){
        $_SESSION['complaindetails']=$result;
        header("Location:../../view/staff/complains.php");
    }else{
        $_SESSION['complaindetails']=[];
        header("Location:../../view/staff/complains.php");
    }

}

if(isset($_GET['mid'])){
    $complain=new complain_model();
    $result=$complain->viewmycomplains($connection,$_SESSION['User_id']);
    if($result){
        $_SESSION['mycomplaindetails']=$result;
        header("Location:../../view/staff/mycomplains.php");
    }else{
        $_SESSION['complaindetails']=[];
        header("Location:../../view/staff/mycomplains.php");
    }
    
    
}

if(isset($_GET['aid'])){
    $complain_id=$_GET['aid'];
    $complain_id=$connection->real_escape_string($complain_id);
    $_SESSION['aid']=$complain_id;

    $complain=new complain_model();
    $result=$complain->acceptcomplain($connection,$complain_id,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['accept']="failed";
        header("Location: ../../controller/staff/complain_controller.php?id=complaindetails");
    }else{
        $_SESSION['accept']=$result;
        header("Location: ../../controller/staff/complain_controller.php?id=complaindetails");
    }
}

if(isset($_GET['cmid'])){
    $complain_id=$_GET['cmid'];
    $complain_id=$connection->real_escape_string($complain_id);
    $_SESSION['cmid']=$complain_id;
    $complain=new complain_model();
    $result=$complain->completecomplain($connection,$complain_id);
    if($result===false){
        $_SESSION['accept']="failed";
        header("Location: ../../controller/staff/complain_controller.php?mid=mycomplaindetails");
    }else{
        $_SESSION['accept']=$result;
        header("Location: ../../controller/staff/complain_controller.php?mid=mycomplaindetails");
    }
}

if(isset($_GET['cid'])){
    $complain_id=$_GET['cid'];
    $complain_id=$connection->real_escape_string($complain_id);
    $_SESSION['cid']=$complain_id;
    $complain=new complain_model();
    $result=$complain->complain_details($connection,$complain_id);
    if($result===false){
        $_SESSION['viewcomplaindetails']="failed";
        header("Location: ../../view/staff/mycomplains.php");
    }else{
        $_SESSION['viewcomplaindetails']=$result;
        header("Location: ../../view/staff/complain_view.php");
    }
}

if(isset($_GET['oid'])){
    $order_id=$_GET['oid'];
    $order_id=$connection->real_escape_string($order_id);
    $complain=new complain_model();
    $result=$complain->check_ordertype($connection,$order_id);
    if($result==true){
        header("Location:../../controller/staff/order_controller.php?vid=$order_id");
    
    }else{
        header("Location:../../controller/staff/order_controller.php?fvid=$order_id");
    }

}

if(isset($_GET['uid'])){
    $user_id=$_GET['uid'];
    $user_id=$connection->real_escape_string($user_id);
    $complain=new complain_model();
    $result=$complain->check_usertype($connection,$user_id);
    if($result[0]['Type']=='Customer'){
        header("Location:../../controller/staff/customeracc_controller.php?vid=$user_id");
    
    }elseif($result[0]['Type']=='Gas Agent'){
        header("Location:../../controller/staff/gasagentacc_controller.php?vid=$user_id");
    }
    elseif($result[0]['Type']=='Delivery Person'){
        header("Location:../../controller/staff/deliverypersonacc_controller.php?vid=$user_id");
    }
    else{
        header("Location: ../../view/staff/complain_view.php");
    }

}


if(isset($_POST['updatemessage'])){
        $complain_id = $_POST['complain_id'];
        $message = $_POST['message'];

        $complain_id=$connection->real_escape_string($complain_id);
        $message=$connection->real_escape_string($message);

        $complain=new complain_model();
        $result=$complain->message($connection,$complain_id,$message);
        if($result===false){
            header("Location: ../../view/staff/complain_view.php");
        }else{
            header("Location: ../../controller/staff/complain_controller.php?mid=mycomplaindetails");
        }

}



?>