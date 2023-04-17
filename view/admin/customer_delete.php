<?php session_start();
require_once("../../config.php");

 if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM user Where User_id=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        header('location:admin-viewCustomer.php');
    }else{
        die(mysqli_error($connection));
    }
 }

?>