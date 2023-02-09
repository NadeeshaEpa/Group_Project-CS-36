<?php
session_start();
require_once("../../config.php");
require_once '../../model/Users/user_model.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];  //assign the user entered details to variables
    $password = $_POST['password'];

    $username=$connection->real_escape_string($username);
    $password=md5($connection->real_escape_string($password));

    $user=new user_model();  //create a new user object
    $result=$user->loginUser($connection,$username,$password);  //call the loginCustomer function of the customer model
    $result2=$user->gastype($connection);
    $_SESSION['gastype']=$result2;
    // $result3=$user->getUserDetails($connection);
    // $_SESSION['userDetails']=$result3;
    // $result4=$user->getProductDetails($connection);
    // $_SESSION['Product_details']=$result4;
    
    
    if($result){
        $_SESSION['login']="success";  //if the login is successful, set the session variable
        if($_SESSION['Type']=="Customer")
            header("Location: ../../view/customer/customer_select.php");  //redirect to the selection page
        else if($_SESSION['Type']=="Delivery_Person")
            header("Location: ../../view/deliveryperson/DelivaryDashboard.php");  //redirect to the dashboard page
        else if($_SESSION['Type']=="gasagent")
            header("Location: ../../view/gasagent/gasagent_dashboard.php");  //redirect to the dashboard page
        else if($_SESSION['Type']=="Stock Manager")
            header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");  //redirect to the dashboard page
        else if($_SESSION['Type']=="Admin")
            header("Location: ../../view/admin/admin_dashboard.php"); //redirect to the dashboard page
        else if($_SESSION['Type']=="Staff")
            header("Location: ../../view/staff/StaffDashboard.php");
        $connection->close();
        exit();
    }else{
        $_SESSION['login']="failed";  //if the login is not successful, set the session variable
        header("Location: ../../view/login.php");  //redirect to the login page
        $connection->close();
        exit();
    }
}else{
   echo "Invalid request";
   exit();
}

