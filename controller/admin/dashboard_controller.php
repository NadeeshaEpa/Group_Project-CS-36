<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/dashboard_model.php';


if(isset($_GET['id'])){
    $profit=new dashboard_model();
    $result=$profit->viewprofit($connection);
    if($result){
        $_SESSION['profitdetails']=$result;
        $result2=$profit->dashboard($connection);                 
        if($result2){
            $_SESSION['dashboard']=$result2;
        }else{
            $_SESSION['dashboard']=[];
        }

        header("Location:../../view/admin/admin_dashboard.php");
    }else{
        $_SESSION['profitdetails']=[];
        header("Location:../../view/admin/admin_dashboard.php");
    }

}

if(isset($_POST['filterdate'])){
    $date=$_POST['date'];
    $date=$connection->real_escape_string($date);
    $profit=new dashboard_model();
    $result=$profit->viewprofit_bydate($connection,$date);
    if($result){
        $_SESSION['profitdetails']=$result;
        header("Location:../../view/admin/admin_dashboard.php");
    }else{
        $_SESSION['profitdetails']=[];
        header("Location:../../view/admin/admin_dashboard.php");
    }   
}

if(isset($_GET['dashboard'])){
    $dashboard=new dashboard_model();
    $result=$dashboard->dashboard($connection);                 
    if($result){
        $_SESSION['dashboard']=$result;
        header("Location:../../view/admin/admin_dashboard.php");
    }else{
        $_SESSION['dashboard']=[];
        header("Location:../../view/admin/admin_dashboard.php");
    }

}

?>

