<?php
session_start();
require_once("../../config.php");
require_once '../../model/customer/customer_model.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];  //assign the user entered details to variables
    $password = $_POST['password'];

    $username=$connection->real_escape_string($username);
    $password=md5($connection->real_escape_string($password));

    $user=new customer_model();  //create a new customer object
    $result=$user->loginCustomer($connection,$username,$password);  //call the loginCustomer function of the customer model
    $gastype=$user->gastype($connection);
    $_SESSION['gastype']=$gastype;
    print_r($gastype);
    die();
    if($result){
        $_SESSION['login']="success";  //if the login is successful, set the session variable
        header("Location: ../../view/customer/customer_select.php");  //redirect to the selection page
        $connection->close();
        exit();
    }else{
        $_SESSION['login']="failed";  //if the login is not successful, set the session variable
        header("Location: ../../view/customer/customer_login.php");  //redirect to the login page
        $connection->close();
        exit();
    }
}else{
   echo "Invalid request";
   exit();
}

