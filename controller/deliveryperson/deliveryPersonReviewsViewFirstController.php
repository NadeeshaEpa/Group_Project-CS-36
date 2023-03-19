<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/ReviewsModel.php");

$user=new reviews(); 
$result=$user->getUserReviewsDetails($connection);


if($result==true){
    $_SESSION['userReviewsDetails']=$result;
    header("Location: ../../view/deliveryperson/DeliveryPersonReviwsView.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/deliveryperson/DeliveryPersonReviwsView.php");
    $connection->close();
    exit();
}