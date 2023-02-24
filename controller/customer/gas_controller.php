<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/gas_model.php");

if(isset($_GET['gas_type'])||isset($_GET['page'])){
    $userid=$_SESSION['User_id'];
    $type=$_GET['gas_type'];
    $type=$connection->real_escape_string($type);
    $_SESSION['gas_type']=$type;
    //create new gas model
    $gasmodel=new gas_model();

    //pagination
    //print 5 records per page
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $_SESSION['page']=$page;
    $offset = ($page - 1) * $limit;
    
    //get the total number of records
    $total_records=$gasmodel->shop_count($connection,$type,$userid);
    $_SESSION['shop_count']=$total_records;

    //calculate the total number of pages
    $total_pages = ceil($total_records / $limit);
    $_SESSION['total_pages']=$total_pages;

    //get the shop names according to the page number and gas type
    $result2=$gasmodel->getshopnames($connection,$type,$userid,$limit,$offset);
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
// if(isset($_GET['page'])){
//     $userid=$_SESSION['User_id'];
//     //create new gas model
//     $type=$_GET['gas_type'];
//     $gasmodel=new gas_model();

//     //pagination
//     $limit = 10;
//     $page = isset($_GET['page']) ? $_GET['page'] : 1;
//     $_SESSION['page']=$page;
//     $offset = ($page - 1) * $limit;
    
//     $total_records=$gasmodel->shop_count($connection,$type,$userid);
//     $_SESSION['shop_count']=$total_records;
//     $total_pages = ceil($total_records / $limit);
//     $_SESSION['total_pages']=$total_pages;


//     $result2=$gasmodel->getshopnames($connection,$type,$userid,$limit,$offset);
//         $_SESSION['shopnames']=$result2;
//         $result1=$gasmodel->getweight($connection,$type);
//         $_SESSION['weight']=$result1;
//         if($result1===false || $result2===false){
//             $_SESSION['available']="failed";
//             header("Location: ../../view/customer/customer_viewgas.php");
//         }else{      
//             $_SESSION['available']="success";      
//             $result=$gasmodel->viewgas($connection,$result1,$type);
//             if($result===false){
//                 print_r("1");
//                 die();
//                 $_SESSION['viewgas']="failed";
//                 header("Location: ../../view/customer/customer_viewgas.php");
//             }else{ 

//                 $_SESSION['viewgas']=$result;
//                 header("Location: ../../view/customer/customer_viewgas.php");
//             }
//         }
// }
if(isset($_GET['gasid'])){
    $gasid=$_GET['gasid'];
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
if(isset($_GET['newgasid'])){
    $newgasid=$_GET['newgasid'];
    $newgasid=$connection->real_escape_string($newgasid);
    $type=$_SESSION['gas_type'];
    $gasmodel=new gas_model();
    $result=$gasmodel->cylinders($connection,$type);
    if($result===false){
        $_SESSION['cylinders']="failed";
        header("Location: ../../view/customer/customer_viewgas.php");
    }else{
        $result1=$gasmodel->getavailability($connection,$type,$result,$newgasid);
        if($result1===false){
            $_SESSION['availability']="failed";
            header("Location: ../../view/customer/customer_viewgas.php");
        }else{
            $_SESSION['gasavailability']=$result1;
            $result3=$gasmodel->getshopname($connection,$newgasid);
            $_SESSION['shopname']=$result3;
            header("Location: ../../view/customer/inside_shopnew.php");
        }
    }
}
if(isset($_POST['ungas_button'])){
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $type=$_POST['ungas_type'];
    $_SESSION['ungastype']=$type;

    if($latitude==NULL){
        $latitude=6.9271;
    }
    if($longitude==NULL){
        $longitude=79.8612;
    }
    //create new gas model
    $gasmodel=new gas_model();
    $result2=$gasmodel->ungetshopnames($connection,$type,$latitude,$longitude);
        $_SESSION['unshopnames']=$result2;
        $result1=$gasmodel->getweight($connection,$type);
        $_SESSION['unweight']=$result1;
        // print_r($result1);
        // die();
        if($result1===false || $result2===false){
            $_SESSION['unavailable']="failed";
            header("Location: ../../view/customer/unreg_checkgas.php");
        }else{      
            $_SESSION['unavailable']="success";      
            $result=$gasmodel->viewgas($connection,$result1,$type);
            if($result===false){
                print_r("1");
                die();
                $_SESSION['unviewgas']="failed";
                header("Location: ../../view/customer/unreg_checkgas.php");
            }else{     
                $_SESSION['unviewgas']=$result;
                header("Location: ../../view/customer/unreg_checkgas.php");
            }
        }
}