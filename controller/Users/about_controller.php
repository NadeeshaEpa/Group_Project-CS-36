<?php
session_start();
require_once("../../config.php");
require_once '../../model/Users/user_model.php';

if(isset($_GET['about'])||isset($_GET['about_page'])){
    $user=new user_model();

    //pagination for view reviews
    $limit = 4;
    $page = isset($_GET['about_page']) ? $_GET['about_page'] : 1;
    $_SESSION['about_page']=$page;
    $offset = ($page - 1) * $limit;

    //get the total number of reviews
    $total_records=$user->review_count($connection);
    $_SESSION['about_count']=$total_records;

    //calculate the total number of pages
    $total_pages = ceil($total_records / $limit);
    $_SESSION['about_total_pages']=$total_pages;

    $reviews=$user->review($connection,$limit,$offset);
    if($reviews){
        $_SESSION['company_reviews']=$reviews;
        header("Location:../../view/about_us.php");
    }else{
        header("Location:../../view/about_us.php");
    }
}