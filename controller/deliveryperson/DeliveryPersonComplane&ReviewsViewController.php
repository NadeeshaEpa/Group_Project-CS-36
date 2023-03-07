<?php
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");
require_once("../../model/deliveryperson/ReviewsModel.php");

if(isset($_POST['ComplainDeleteBtn'])){
    $Complane_id=$_POST['Complain_Id_Name'];
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

if(isset($_POST['reviewDeleteBtn'])){
    $review_id=$_POST['Review_Id_Name'];
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