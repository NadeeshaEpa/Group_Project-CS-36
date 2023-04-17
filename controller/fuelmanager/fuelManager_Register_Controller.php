<?php
session_start();

include_once('../../config.php');
include_once('../../model/fuelmanager/checkFuelManager_model.php');
include_once('../../model/fuelmanager/fuelManager_model.php');

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $nic=$_POST['nic'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $BRegNo = $_POST['bRegNo'];
    $shopName=$_POST['shopName'];

}else{
    echo('invalid request');
    exit();
}

//check whether the email address is unique
if(checkfuelManageremail($email,$connection)){
    $_SESSION['emailerror'] = "Email already exists";
    header("Location: ../../view/fuelmanager/fuelManager_Register.php");
    $connection->close();
    exit();
}

//check whether the username is unique
if(checkFuelManagerUsername($username,$connection)){
    $_SESSION['usernameerror'] = "Username already exists";
    header("Location: ../../view/fuelmanager/fuelManager_Register.php");
    $connection->close();
    exit();
}

//check whether the password and confirm password are same
if(!checkSamePassword($password,$cpassword)){
    $_SESSION['passworderror'] = "Password and Confirm Password are not same";
    header("Location: ../../view/fuelmanager/fuelManager_Register.php");
    $connection->close();
    exit();
}

$firstname=$connection->real_escape_string($firstname);
$lastname=$connection->real_escape_string($lastname);
$username=$connection->real_escape_string($username);
$street=$connection->real_escape_string($street);
$city=$connection->real_escape_string($city);
$postalcode=$connection->real_escape_string($postalcode);
$password=md5($connection->real_escape_string($password));
$email=$connection->real_escape_string($email);
$contactnumber=$connection->real_escape_string($contactnumber);
$BRegNo=$connection->real_escape_string($BRegNo);
$nic=$connection->real_escape_string($nic);
$shopName=$connection->real_escape_string($shopName);


$user=new fuel_manager();
$user->setDetails($firstname,$lastname,$username,$street,$city,$postalcode,$password,$nic,$email,$contactnumber,$BRegNo,$shopName);
$result=$user->registerFuelManager($connection);
if($result){
    $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
    header("Location: ../../view/fuelmanager/fuelManager_RegistationSusses.php");
}else{
    header("Location: ../../view/fuelmanager/fuelManager_Register.php");
}

$connection->close();





