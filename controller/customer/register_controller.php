<?php
session_start();
require_once("../../config.php");  //connect to database
require_once '../../model/customer/customer_model.php';  //get customer model
require_once '../../model/customer/checkcustomer_model.php';  // get check customer model

if(isset($_POST['register'])){        //check whether the register button is clicked
    $firstname = $_POST['firstname'];   //assign the user entered details to variables
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $billnum = $_POST['billnum'];
}else{
   echo "Invalid request";   //if the register button is not clicked, show error message
   exit();
}
//check whether the email address is unique
if(checkemail($email,$connection)){
    $_SESSION['emailerror'] = "Email already exists";
}

//check whether the username is unique
if(checkusername($username,$connection)){
    $_SESSION['usernameerror'] = "Username already exists";
}

//check whether the password and confirm password are same
if(!checkpassword($password,$cpassword)){
    $_SESSION['passworderror'] = "Password and Confirm Password are not same";
}

//if there is an error redirect to the registration page
if($_SESSION['emailerror'] || $_SESSION['usernameerror'] || $_SESSION['passworderror']){
    header("Location: ../../view/customer/customer_register.php");
    $connection->close();
    exit();
}

//remove unwanted and harmful characters from the user entered details
$firstname=$connection->real_escape_string($firstname);
$lastname=$connection->real_escape_string($lastname);
$username=$connection->real_escape_string($username);
$street=$connection->real_escape_string($street);
$city=$connection->real_escape_string($city);
$postalcode=$connection->real_escape_string($postalcode);
$password=md5($connection->real_escape_string($password));
$email=$connection->real_escape_string($email);
$contactnumber=$connection->real_escape_string($contactnumber);
$billnum=$connection->real_escape_string($billnum);

//create a new customer object
$user=new customer_model();

//set the details of the customer
$user->setDetails($firstname,$lastname,$username,$street,$city,$postalcode,$password,$email,$contactnumber,$billnum);

//insert data into database
$result=$user->registerCustomer($connection);
if($result){
    $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
    header("Location: ../../view/customer/customerRegister_success.php");
}else{
    header("Location: ../../view/customer/customer_register.php");  //if there is an error redirect to the registration page
}

$connection->close();
