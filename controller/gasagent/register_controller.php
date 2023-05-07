<?php
session_start();
require_once("../../config.php");
require_once '../../model/gasagent/gasagent_model.php';
require_once '../../model/gasagent/checkgasagent_model.php';

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $address=$_POST['address'];
    $password = $_POST['password'];
    $shopnumber = $_POST['shopnumber'];
    $business_reg_num = $_POST['business_reg_num'];
    $email = $_POST['email'];
    $nic =$_POST['NIC'];
    $contactnumber = $_POST['contactnumber'];
    $accountnum= $_POST['accountnum'];
    $shopename= $_POST['shopName'];
    $gastype= $_POST['gastype'];
    $latitude= $_POST['latitude'];
    $longitude= $_POST['longitude'];
    $opentime= $_POST['openingtime'];
    $closetime= $_POST['closingtime'];

    $firstname=$connection->real_escape_string($firstname);
    $lastname=$connection->real_escape_string($lastname);
    $username=$connection->real_escape_string($username);
    $address=$connection->real_escape_string($address);
    $password=md5($connection->real_escape_string($password));
    $email=$connection->real_escape_string($email);
    $contactnumber=$connection->real_escape_string($contactnumber);
    $business_reg_num=$connection->real_escape_string($business_reg_num);
    $shopnumber=$connection->real_escape_string($shopnumber);
    $nic=$connection->real_escape_string($nic);
    $accountnum=$connection->real_escape_string($accountnum);
    $shopename=$connection->real_escape_string($shopename);
    $gastype=$connection->real_escape_string($gastype);
    $latitude=$connection->real_escape_string($latitude);
    $longitude=$connection->real_escape_string($longitude);

    //divide address into street,city and postal code
    $address = explode(",",$address);
    $street = $address[0];
    $city = $address[1];
    $postalcode = $address[2];

    $user=new gasagent_model();
    $user->setDetails($firstname,$lastname,$username,$street,$city,$postalcode,$password,$email,$contactnumber,$business_reg_num,$shopnumber,$nic,$accountnum,$shopename,$gastype,$latitude,$longitude,$opentime,$closetime);
    $result=$user->registergasagent($connection);
    if($result){
        $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
        header("Location: ../../view/gasagent/gasagentRegister_success.php");
    }else{
        echo "Error";
        header("Location: ../../view/gasagent/gasagent_register.php");
    }
}
    $connection->close();
