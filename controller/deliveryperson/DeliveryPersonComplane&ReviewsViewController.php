<?php
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");
require_once("../../model/deliveryperson/ReviewsModel.php");

if(isset($_GET['ComplainDeleteBtn'])){
    $Complane_id=$_GET['ComplainDeleteBtn'];
    $Complane_id=$connection->real_escape_string($Complane_id);

    $user=new Complain(); 
    $result=$user->Delete_Complanes($connection,$Complane_id);
    
    
    if($result==true){
       
        header("Location: ../../controller/deliveryperson/deliveryPersonComplainViewFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryPersonComplainViewFirstController.php");
        $connection->close();
        exit();
    }

}



if(isset($_GET['reviewDeleteBtn'])){
    $review_id=$_GET['reviewDeleteBtn'];
    $review_id=$connection->real_escape_string($review_id);

    $user=new reviews(); 
    $result=$user->Delete_Reviews($connection,$review_id);
    
    
    if($result==true){
       
        header("Location: ../../controller/deliveryperson/deliveryPersonReviewsViewFirstController.php");
        $connection->close();
        exit();
    
    }
    else{
        header("Location: ../../controller/deliveryperson/deliveryPersonReviewsViewFirstController.php");
        $connection->close();
        exit();
    }

}