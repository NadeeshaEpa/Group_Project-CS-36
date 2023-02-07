<?php
session_start();
require_once("../../config.php");
require_once '../../model/deliveryperson/delivery_model.php';
require_once '../../model/deliveryperson/checkdelivery_model.php';

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $nic = $_POST['nic'];
    $vehicletype = $_POST['vehicletype'];
    $vehiclenumber = $_POST['vehiclenumber'];
    $accnum = $_POST['accnum'];
}else{
   echo "Invalid request";
   exit();
}
//check whether the email address is unique
// if(checkemail($email,$connection)){
//     $_SESSION['emailerror'] = "Email already exists";
//     header("Location: ../../view/deliveryperson/delivery_register.php");
//     $connection->close();
//     exit();
// }

// //check whether the username is unique
// if(checkusername($username,$connection)){
//     $_SESSION['usernameerror'] = "Username already exists";
//     header("Location: ../../view/deliveryperson/delivery_register.php");
//     $connection->close();
//     exit();
// }

// //check whether the password and confirm password are same
// if(!checkpassword($password,$cpassword)){
//     $_SESSION['passworderror'] = "Password and Confirm Password are not same";
//     header("Location: ../../view/deliveryperson/delivery_register.php");
//     $connection->close();
//     exit();
// }

// if(!checknic($nic,$cpassword)){
//     $_SESSION['nic'] = "NIC already exists";
//     header("Location: ../../view/deliveryperson/delivery_register.php");
//     $connection->close();
//     exit();
// }

$firstname=$connection->real_escape_string($firstname);
$lastname=$connection->real_escape_string($lastname);
$username=$connection->real_escape_string($username);
$street=$connection->real_escape_string($street);
$city=$connection->real_escape_string($city);
$postalcode=$connection->real_escape_string($postalcode);
$password=md5($connection->real_escape_string($password));
$email=$connection->real_escape_string($email);
$contactnumber=$connection->real_escape_string($contactnumber);
$nic=$connection->real_escape_string($nic);
$vehicletype=$connection->real_escape_string($vehicletype);
$vehiclenumber=$connection->real_escape_string($vehiclenumber);
$accnum=$connection->real_escape_string($accnum);


$user=new delivery_model();
$user->setDetails($firstname,$lastname,$username,$street,$city,$postalcode,$password,$email,$contactnumber,$nic,$vehicletype,$vehiclenumber,$accnum);
$result=$user->RegisterDelivery_person($connection);
if($result){
    $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
    header("Location: ../../view/deliveryperson/deliveryRegister_success.php");
}else{
    header("Location: ../../view/deliveryperson/delivery_register.php");
}

$connection->close();
