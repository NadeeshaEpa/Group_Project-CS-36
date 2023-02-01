<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/delivaryprofilemodel.php");

if(isset($_POST['update_dprof'])){
    if(isset($_SESSION['User_id'])){ 
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $account_no=$_POST['acc_no'];
        $contactno=$_POST['contactno'];
        $username=$_POST['username'];
        $street=$_POST['street'];
        $city=$_POST['city'];
        $postalcode=$_POST['postalcode'];
    
        $fname=$connection->real_escape_string($fname);
        $lname=$connection->real_escape_string($lname);
        $email=$connection->real_escape_string($email);
        $account_no=$connection->real_escape_string($account_no);
        $contactno=$connection->real_escape_string($contactno);
        $username=$connection->real_escape_string($username);
        $street=$connection->real_escape_string($street);
        $city=$connection->real_escape_string($city);
        $postalcode=$connection->real_escape_string($postalcode);

        $acc=new delivaryProf_model();
        $inputs1=array($_SESSION['User_id'],$fname,$lname,$city,$street,$postalcode,$username,$email);
        $inputs2=array($_SESSION['User_id'],$contactno);
        $inputs3=array($_SESSION['User_id'],$account_no);
        $result4=[];
        array_push($result4,['Username'=>$inputs1[6],'Email'=>$inputs1['7'],'First_Name'=>$inputs1['1'],'Last_Name'=>$inputs1['2'],'City'=>$inputs1['3'],'Street'=>$inputs1['4'],'Postalcode'=>$inputs1['5'],'Contact_No'=>$inputs2['1'],'Account_No'=>$inputs3['1']]);

        $result1=$acc->updateUsers($connection,$inputs1);
        if($result1){
            $result2=$acc->updateContacts($connection,$inputs2);
            $result3=$acc->updateAccount_No($connection,$inputs3);
            if($result2 || $result3 ){
                $_SESSION['updateuser']="success";
                $_SESSION['userDetails']=$result4;
                header("Location: ../../view/deliveryperson/DeliveryProfile.php");
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