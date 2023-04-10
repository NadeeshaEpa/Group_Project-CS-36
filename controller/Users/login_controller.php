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

    if($result){
        $_SESSION['login']="success";  //if the login is successful, set the session variable

        //set time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');
        $_SESSION['login_time']=time();  //set the login time

        if($_SESSION['Type']=="Customer"){
            $last_order=$user->limit_order($connection,$_SESSION['User_id']);
            if($last_order){
                $_SESSION['last_order']=1;
            }else{
                $_SESSION['last_order']=0;
            }
            header("Location: ../../view/customer/customer_select.php");  //redirect to the selection page

        }else if($_SESSION['Type']=="Delivery_Person"){

            header("Location: ../../controller/deliveryperson/deliveryDashboardFirstController.php");  //redirect to the dashboard page
        }else if($_SESSION['Type']=="gasagent"){
            header("Location: ../../view/gasagent/gasagent_dashboard.php");  //redirect to the dashboard page
        }else if($_SESSION['Type']=="Stock Manager"){
            header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");  //redirect to the dashboard page
         }else if($_SESSION['Type']=="Admin"){
            header("Location: ../../view/admin/admin_dashboard.php"); //redirect to the dashboard page
        }else if($_SESSION['Type']=="Staff"){
            header("Location: ../../view/staff/staff_dashboard.php");
        }
        $connection->close();
        exit();
    }else{
        $_SESSION['login']="failed";  //if the login is not successful, set the session variable
        header("Location: ../../view/login.php");  //redirect to the login page
        $connection->close();
        exit();
    }
}
if(isset($_GET['unregview'])){
    $user=new user_model();
    $result2=$user->gastype($connection);
    $_SESSION['gastype']=$result2;
    header("Location: ../../view/customer/unregcustomer_select.php");
}

