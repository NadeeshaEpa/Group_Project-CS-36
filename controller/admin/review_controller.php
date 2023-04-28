<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/review_model.php';



if(isset($_GET['id'])){
    $review=new review_model();
    $result=$review->viewreview($connection);
    if($result){
        $_SESSION['reviewdetails']=$result;
        header("Location:../../view/admin/company_review.php");
    }else{
        $_SESSION['reviewdetails']=[];
        header("Location:../../view/admin/company_review.php");
    }

}

if(isset($_GET['did'])){
    $review_id=$_GET['did'];
    $review_id=$connection->real_escape_string($review_id);
    $review=new review_model();
    $result=$review->deletereview($connection,$review_id);
    if($result===false){
        $_SESSION['deletereview']="failed";
        header("Location: ../../view/admin/company_review.php");
    }else{
        $_SESSION['deletereview']="success"; 
        header("Location:../../controller/admin/review_controller.php?id=viewreview");
    }
}

if(isset($_POST['search'])){
    $id=$_POST['review_id'];
    $id=$connection->real_escape_string($id);
    $review=new review_model();
    $result=$review->searchreview($connection,$id);
    if($result){
        $_SESSION['reviewdetails']=$result;
        header("Location:../../view/admin/company_review.php");
    }else{
        $_SESSION['reviewdetails']=[];
        header("Location:../../view/admin/company_review.php");
    }
}

?>