<?php
session_start();
require_once("../../config.php");
require_once '../../model/Users/user_model.php';

if(isset($_GET['about'])){
    $user=new user_model();
    $reviews=$user->review($connection);
    if($reviews){
        $_SESSION['company_reviews']=$reviews;
        header("Location:../../view/about_us.php");
    }else{
        header("Location:../../view/about_us.php");
    }
   
}