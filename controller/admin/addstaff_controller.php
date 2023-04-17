<?php
session_start();
require_once("../../config.php");
require_once '../../model/admin/staff_model.php';
require_once '../../model/admin/checkstaff_model.php';

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $nic=$_POST['nic'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
}else{
   echo "Invalid request";
   exit();
}
//check whether the email address is unique
// if(checkemail($email,$connection)){
//     $_SESSION['emailerror'] = "Email already exists";
//     header("Location: ../../view/admin/add_staff.php");
//     $connection->close();
//     exit();
// }

// //check whether the username is unique
// if(checkusername($username,$connection)){
//     $_SESSION['usernameerror'] = "Username already exists";
//     header("Location: ../../view/admin/add_staff.php");
//     $connection->close();
//     exit();
// }

// if(checknic($nic,$connection)){
//     $_SESSION['nicerror'] = "Nic already exists";
//     header("Location: ../../view/admin/add_staff.php");
//     $connection->close();
//     exit();
// }

// //check whether the password and confirm password are same
// if(!checkpassword($password,$cpassword)){
//     $_SESSION['passworderror'] = "Password and Confirm Password are not same";
//     header("Location: ../../view/admin/add_staff.php");
//     $connection->close();
//     exit();
// }

$firstname=$connection->real_escape_string($firstname);
$lastname=$connection->real_escape_string($lastname);
$username=$connection->real_escape_string($username);
$street=$connection->real_escape_string($street);
$city=$connection->real_escape_string($city);
$postalcode=$connection->real_escape_string($postalcode);
$nic=$connection->real_escape_string($nic);
$password=md5($connection->real_escape_string($password));
$email=$connection->real_escape_string($email);
$contactnumber=$connection->real_escape_string($contactnumber);


$user=new staff_model();
$user->setDetails($firstname,$lastname,$username,$nic,$street,$city,$postalcode,$password,$email,$contactnumber);
$result=$user->Registerstaff($connection);
if($result){
    $_SESSION['RegsuccessMsg'] = 'Staff Registered Successfully';
<<<<<<< HEAD
    header("Location: ../../view/admin/addstaff_success.php");
=======
    header("Location: ../../controller/admin/staffacc_controller.php?id=viewStaf");
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
}else{
    header("Location: ../../view/admin/add_staff.php");
}

$connection->close();
