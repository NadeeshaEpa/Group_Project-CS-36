<?php
session_start();
require_once '../../config.php';
require_once '../../model/deliveryperson/validation_model.php';

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $validation = new validation_model();
    $result=$validation->checkemail($email,$connection);

    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}
if(isset($_POST['username'])){

    $username = $_POST['username'];
    $validation = new validation_model();
    $result=$validation->checkusername($username,$connection);

    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}

if(isset($_POST['nic'])){

    $nic = $_POST['nic'];
    $validation = new validation_model();
    $result=$validation->checknic($nic,$connection);

    if($result){
        echo "true";
    }
    else{
        echo "false";
    }
}