<?php
session_start();
require_once("../../config.php");
require_once '../../model/gasagent/gasagent_model.php';
require_once '../../model/gasagent/checkgasagent_model.php';

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $shopnumber = $_POST['shopnumber'];
    $business_reg_num = $_POST['business_reg_num'];
    $email = $_POST['email'];
    $nic =$_POST['NIC'];
    $contactnumber = $_POST['contactnumber'];
    $accountnum= $_POST['accountnum'];
    $shopename= $_POST['shopName'];
<<<<<<< HEAD

=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
    $gastype= $_POST['gastype'];

}else{
   echo "Invalid request";
   exit();
}
//check whether the email address is unique
if(checkemail($email,$connection)){
    $_SESSION['emailerror'] = "Email already exists";
    header("Location: ../../view/gasagent/gasagent_register.php");
    $connection->close();
    exit();
}

//check whether the username is unique
if(checkusername($username,$connection)){
    $_SESSION['usernameerror'] = "Username already exists";
    header("Location: ../../view/gasagent/gasagent_register.php");
    $connection->close();
    exit();
}

//check whether the password and confirm password are same
if(!checkpassword($password,$cpassword)){
    $_SESSION['passworderror'] = "Password and Confirm Password are not same";
    header("Location: ../../view/gasagent/gasagent_register.php");
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
$business_reg_num=$connection->real_escape_string($business_reg_num);
$shopnumber=$connection->real_escape_string($shopnumber);
$nic=$connection->real_escape_string($nic);
$accountnum=$connection->real_escape_string($accountnum);
$shopename=$connection->real_escape_string($shopename);
<<<<<<< HEAD

$gastype=$connection->real_escape_string($gastype);

=======
$gastype=$connection->real_escape_string($gastype);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2

$user=new gasagent_model();
$user->setDetails($firstname,$lastname,$username,$street,$city,$postalcode,$password,$email,$contactnumber,$business_reg_num,$shopnumber,$nic,$accountnum,$shopename);
$result=$user->registergasagent($connection);
if($result){
    $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
    header("Location: ../../view/gasagent/gasagentRegister_success.php");
}else{
    echo "Error";
    header("Location: ../../view/gasagent/gasagent_register.php");
}

$connection->close();
