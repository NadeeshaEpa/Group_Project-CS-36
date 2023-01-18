<?php
session_start();
require_once("../../config.php");  //connect to database
require_once '../../model/customer/customer_model.php';  //get customer model
require_once '../../model/customer/checkcustomer_model.php';  // get check customer model
//require '../../textlocal.class.php';  //get textlocal class

// if(isset($_POST['reqotp'])){
//     $mobile=$_POST['contactnumber'];
//     $apikey=urldecode('NDY0YjU1NmQ0ZDcxMzk2NTY5NDMzMzRjNjM0MzRkNTU=');
//     $Textlocal=new Textlocal(false,false,$apikey);

//     $numbers=array($mobile);
//     $sender='FAGO';
//     $otp=rand(100000,999999);
//     $_SESSION['otp']=$otp;
//     $message="Your OTP is ".$otp;

//     try{
//         $result=$Textlocal->sendSms($numbers,$message,$sender);
//         $_SESSION['otp-sent']="OTP sent successfully to your mobile number";
//         header('Location: ../../view/customer/customer_register.php');
//     }catch(Exception $e){
//         die('Error: '.$e->getMessage());
//     }
// }
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