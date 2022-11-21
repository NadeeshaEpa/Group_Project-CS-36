<?php
session_start();
require_once("../../config.php");
require_once("../../model/customer/account_model.php");

if(isset($_POST['viewacc'])){
    if(isset($_SESSION['User_id'])){ 
            $acc=new account_model();
            $result=$acc->viewAccount($connection,$_SESSION['User_id']);
            if($result==false){
                $_SESSION['viewacc']="failed";
                header("Location: ../../view/customer/customer_select.php");            
            }else{
                //unset($_SESSION['viewacc']);
                $_SESSION['viewacc_result']=$result;   
                header("Location: ../../view/customer/customer_dashboard.php");   
            }
    }else{
            echo "Please login first";
            header("Location: ../../view/customer/customer_login.php");
    }
}
if(isset($_POST['updateaccount'])){
    if(isset($_SESSION['User_id'])){ 
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $contactno=$_POST['contactno'];
        $username=$_POST['username'];
        $street=$_POST['street'];
        $city=$_POST['city'];
        $postalcode=$_POST['postalcode'];
    
        $fname=$connection->real_escape_string($fname);
        $lname=$connection->real_escape_string($lname);
        $email=$connection->real_escape_string($email);
        $contactno=$connection->real_escape_string($contactno);
        $username=$connection->real_escape_string($username);
        $street=$connection->real_escape_string($street);
        $city=$connection->real_escape_string($city);
        $postalcode=$connection->real_escape_string($postalcode);

        $acc=new account_model();
        $inputs1=array($_SESSION['User_id'],$fname,$lname,$city,$street,$postalcode,$username,$email);
        $inputs2=array($_SESSION['User_id'],$contactno);
        $result3=[];
        array_push($result3,['Username'=>$inputs1[6],'Email'=>$inputs1['7'],'First_Name'=>$inputs1['1'],'Last_Name'=>$inputs1['2'],'City'=>$inputs1['3'],'Street'=>$inputs1['4'],'Postalcode'=>$inputs1['5'],'Contact_No'=>$inputs2['1']]);

        $result1=$acc->updateUsers($connection,$inputs1);
        if($result1){
            $result2=$acc->updateContacts($connection,$inputs2);
            if($result2){
                $_SESSION['updateuser']="success";
                $_SESSION['viewacc_result']=$result3;
                header("Location: ../../view/customer/customer_dashboard.php");
            }else{
                $_SESSION['updateuser']="failed";
                echo "Failed";
            }
        }else{
            $_SESSION['updateuser']="failed";
            echo "Failed";
        }

    }
}