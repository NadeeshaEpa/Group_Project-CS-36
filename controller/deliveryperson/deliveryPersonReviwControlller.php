<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/ReviewsModel.php");

if(isset($_POST['revie_add'])){
    $discription=$_POST['dis_input'];
    $discription=$connection->real_escape_string($discription);
    
    $user=new reviews;
    $result=$user->addReviws($connection,$discription);
    
    if($result==true){
        $_SESSION['Readd']="Review Added Successfully";
        header("Location: ../../view/deliveryperson/DelivaryReviews.php");
        $connection->close();
        exit();

    }
    else{
        header("Location: ../../view/deliveryperson/DelivaryReviews.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/deliveryperson/DelivaryReviews.php");
    $connection->close();
    exit();
}