<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/gas_model.php");

if(isset($_POST['gas_type'])){
    $type=$_POST['gas_type'];
    $type=$connection->real_escape_string($type);
    $_SESSION['gas_type']=$type;
    //create new gas model
    $gasmodel=new gas_model();
    $result2=$gasmodel->getshopnames($connection,$type);
        $_SESSION['shopnames']=$result2;
        $result1=$gasmodel->getweight($connection,$type);
        $_SESSION['weight']=$result1;
        if($result1===false || $result2===false){
            $_SESSION['available']="failed";
            header("Location: ../../view/customer/customer_viewgas.php");
        }else{      
            $_SESSION['available']="success";      
            $result=$gasmodel->viewgas($connection,$result1,$type);
            if($result===false){
                print_r("1");
                die();
                $_SESSION['viewgas']="failed";
                header("Location: ../../view/customer/customer_viewgas.php");
            }else{     
                $_SESSION['viewgas']=$result;
                header("Location: ../../view/customer/customer_viewgas.php");
            }
        }

}
if(isset($_GET['gasid'])){
    $gasid=$_GET['gasid'];
    // print_r($gasid);
    // die();
    $gasid=$connection->real_escape_string($gasid);
    $type=$_SESSION['gas_type'];
    $gasmodel=new gas_model();
    $result=$gasmodel->cylinders($connection,$type);
    if($result===false){
        $_SESSION['cylinders']="failed";
        header("Location: ../../view/customer/customer_viewgas.php");
    }else{
        $result1=$gasmodel->getavailability($connection,$type,$result,$gasid);
        if($result1===false){
            $_SESSION['availability']="failed";
            header("Location: ../../view/customer/customer_viewgas.php");
        }else{
            $_SESSION['gasavailability']=$result1;
            $result3=$gasmodel->getshopname($connection,$gasid);
            $_SESSION['shopname']=$result3;
            header("Location: ../../view/customer/inside_shop.php");
        }
    }
}