<?php
session_start();
require_once("../../config.php");  //connect to database
require_once '../../model/customer/customer_model.php';  //get customer model
require_once '../../model/customer/checkcustomer_model.php';  // get check customer model

if(isset($_POST['register'])){        //check whether the register button is clicked
    $firstname = $_POST['firstname'];   //assign the user entered details to variables
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $billnum = $_POST['billnum'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];

    //remove unwanted and harmful characters from the user entered details
    $firstname=$connection->real_escape_string($firstname);
    $lastname=$connection->real_escape_string($lastname);
    $username=$connection->real_escape_string($username);
    $address=$connection->real_escape_string($address);
    $password=md5($connection->real_escape_string($password));
    $email=$connection->real_escape_string($email);
    $contactnumber=$connection->real_escape_string($contactnumber);
    $billnum=$connection->real_escape_string($billnum);
    $latitude=$connection->real_escape_string($latitude);
    $longitude=$connection->real_escape_string($longitude);

    //create a new customer object
    $user=new customer_model();
    //set the details of the customer
    $user->setDetails($firstname,$lastname,$username,$address,$password,$email,$contactnumber,$billnum,$latitude,$longitude);

    //insert data into database
    $result=$user->registerCustomer($connection);
    if($result){
        $_SESSION['RegsuccessMsg'] = 'Registeration Request Sent Successfully';
        header("Location: ../../view/customer/customer_success.php");
    }else{
        header("Location: ../../view/customer/customer_register.php");  //if there is an error redirect to the registration page
    }
}
if(isset($_POST['cancelregister'])){
    header("Location: ../../view/login.php");
}
$connection->close();
?>