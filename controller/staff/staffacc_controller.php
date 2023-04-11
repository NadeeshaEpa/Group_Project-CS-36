<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/account_model.php';
include_once '../../model/staff/staff_model.php';



if(isset($_GET['id'])){
    $staff=new account_model();
    $result=$staff->viewstaff($connection);
    if($result){
        $_SESSION['staffdetails']=$result;
        header("Location:../../view/staff/staff-viewStaff.php");
    }else{
        $_SESSION['staffdetails']=[];
        header("Location:../../view/staff/staff-viewStaff.php");
    }

}

if(isset($_GET['did'])){
    $user_id=$_GET['did'];
    $user_id=$connection->real_escape_string($user_id);
    $staff=new staff_model();
    $result=$staff->deleteuser($connection,$user_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/staff/staff-viewStaff.php");
    }else{
        $_SESSION['deleteuser']="success";
        $account = new account_model();
        $result=$account->viewstaff($connection);
        if($result){
            $_SESSION['staffdetails']=$result;
            header("Location:../../controller/staff/staffacc_controller.php?id=viewstaff");
        }else{
            header("Location:../../view/staff/staff-viewStaff.php");
        }
    }
}

if(isset($_GET['uid'])){
    $user_id=$_GET['uid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['uid']=$user_id;
    $staff=new staff_model();
    $result=$staff->edituser($connection,$user_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/staff/staff-viewStaff.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/staff/staff_update.php");
    }
}

if(isset($_GET['vid'])){
    $user_id=$_GET['vid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['vid']=$user_id;
    $staff=new staff_model();
    $result=$staff->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewuser']="failed";
        header("Location: ../../view/staff/staff-viewStaff.php");
    }else{
        $_SESSION['viewuser']=$result;
        header("Location: ../../view/staff/staff_view.php");
    }
}

if(isset($_POST['search'])){
    $name=$_POST['staff_name'];
    $name=$connection->real_escape_string($name);
    $staff=new staff_model();
    $result=$staff->searchstaff($connection,$name);
    if($result){
        $_SESSION['staffdetails']=$result;
        header("Location:../../view/staff/staff-viewStaff.php");
    }else{
        $_SESSION['staffdetails']=[];
        header("Location:../../view/staff/staff-viewStaff.php");
    }
}


if(isset($_POST['edituser'])){
    $user_id=$_POST['User_id'];
    $First_Name=$_POST['First_Name'];
    $Last_Name=$_POST['Last_Name'];
    $City=$_POST['City'];
    $Street=$_POST['Street'];
    $Postalcode=$_POST['Postalcode'];
    $Username=$_POST['Username'];
    $Email=$_POST['Email'];
    $Contact_No=$_POST['Contact_No'];
    $NIC=$_POST['NIC'];


    
    // $ElectricityBill_No=$_POST['ElectricityBill_No'];

        $User_id=$connection->real_escape_string($user_id);
        $First_Name=$connection->real_escape_string($First_Name);
        $Last_Name=$connection->real_escape_string($Last_Name);
        $Email=$connection->real_escape_string($Email);
        $Contact_No=$connection->real_escape_string($Contact_No);
        $Username=$connection->real_escape_string($Username);
        $Street=$connection->real_escape_string($Street);
        $City=$connection->real_escape_string($City);
        $Postalcode=$connection->real_escape_string($Postalcode);
        $NIC=$connection->real_escape_string($NIC);

    


    $staff=new staff_model();
    $inputs1=array($user_id,$First_Name, $Last_Name, $City, $Street, $Postalcode, $Username, $Email);
    $inputs2=array($user_id,$Contact_No);

    $result1=$staff->updateUser($connection,$inputs1);
    if($result1){
        $result2=$staff->updateContacts($connection,$inputs2);
        if($result2){
            $_SESSION['updateuser']="success";
            header("Location: ../../controller/staff/staffacc_controller.php?id=viewStaff");
        }else{
            $_SESSION['updateuser']="failed";
            echo "Failed";
        }
    }else{
        $_SESSION['updateuser']="failed";
        echo "Failed";
    }


}