<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/account_model.php';
include_once '../../model/staff/gasagent_model.php';


if(isset($_GET['id'])){
    $gasagent=new account_model();
    $result=$gasagent->viewGasagent($connection);
    if($result){
        $_SESSION['gasagentdetails']=$result;
        header("Location:../../view/staff/staff-viewGasagent.php");
    }else{
        $_SESSION['gasagentdetails']=[];
        header("Location:../../view/staff/staff-viewGasagent.php");
    }

}

if(isset($_GET['rid'])){
    $gasagent=new account_model();
    $result=$gasagent->viewGasagentRequests($connection);
    if($result){
        $_SESSION['gasagentdetails']=$result;
        header("Location:../../view/staff/Gasagent_requestlist.php");
    }else{
        $_SESSION['gasagentdetails']=[];
        header("Location:../../view/staff/Gasagent_requestlist.php");
    }

}

if(isset($_GET['did'])){
    $user_id=$_GET['did'];
    $user_id=$connection->real_escape_string($user_id);
    $gasagent=new gasagent_model();
    $result=$gasagent->deleteuser($connection,$user_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/staff/staff-viewGasagent.php");
    }else{
        $_SESSION['deleteuser']="success";
        $account = new account_model();
        $result=$account->viewGasagent($connection);
        if($result){
            $_SESSION['gasagentdetails']=$result;
            header("Location:../../controller/staff/gasagentacc_controller.php?id=viewGasagent");
        }else{
            header("Location:../../view/staff/staff-viewGasagent.php");
        }
    }
}

if(isset($_GET['uid'])){
    $user_id=$_GET['uid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['uid']=$user_id;
    $gasagent=new gasagent_model();
    $result=$gasagent->edituser($connection,$user_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/staff/staff-viewGasagent.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/staff/gasagent_update.php");
    }
}

if(isset($_GET['vid'])){
    $user_id=$_GET['vid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['vid']=$user_id;
    $gasagent=new gasagent_model();
    $result=$gasagent->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewuser']="failed";
        header("Location: ../../view/staff/staff-viewGasagent.php");
    }else{
        $_SESSION['viewuser']=$result;
        header("Location: ../../view/staff/gasagent_view.php");
    }
}

if(isset($_GET['rvid'])){
    $user_id=$_GET['rvid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['rvid']=$user_id;
    $gasagent=new gasagent_model();
    $result=$gasagent->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewrequest']="failed";
        header("Location: ../../view/staff/Gasagent_requestlist.php");
    }else{
        $_SESSION['viewrequest']=$result;
        header("Location: ../../view/staff/gasagent_request.php");
    }
}

if(isset($_GET['aid'])){
    $user_id=$_GET['aid'];
    $user_id=$connection->real_escape_string($user_id);
    $gasagent=new gasagent_model();
    $result=$gasagent->accept($connection,$user_id,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['acceptuser']="failed";
        header("Location: ../../view/staff/Gasagent_requestlist.php");
    }else{
        $_SESSION['acceptuser']="success";
        header("Location: ../../controller/staff/gasagentacc_controller.php?rid=viewGasagentRequests");
        
    }
}

if(isset($_GET['deid'])){
    $user_id=$_GET['deid'];
    $user_id=$connection->real_escape_string($user_id);
    $gasagent=new gasagent_model();
    $result=$gasagent->decline($connection,$user_id);
    if($result===false){
        $_SESSION['declineuser']="failed";
        header("Location: ../../view/staff/Gasagent_requestlist.php");
    }else{
        $_SESSION['declineuser']="success";
        header("Location: ../../view/staff/Gasagent_requestlist.php");
        
    }
}

if(isset($_POST['search'])){
    $name=$_POST['gasagent_name'];
    $name=$connection->real_escape_string($name);
    $gasagent=new gasagent_model();
    $result=$gasagent->searchgasagent($connection,$name);
    if($result){
        $_SESSION['gasagentdetails']=$result;
        header("Location:../../view/staff/staff-viewGasagent.php");
    }else{
        $_SESSION['gasagentdetails']=[];
        header("Location:../../view/staff/staff-viewGasagent.php");
    }
}

if(isset($_POST['search_request'])){
    $name=$_POST['gasagent_name'];
    $name=$connection->real_escape_string($name);
    $gasagent=new gasagent_model();
    $result=$gasagent->searchgasagent_request($connection,$name);
    if($result){
        $_SESSION['gasagentdetails']=$result;
        header("Location:../../view/staff/Gasagent_requestlist.php");
    }else{
        $_SESSION['gasagentdetails']=[];
        header("Location:../../view/staff/Gasagent_requestlist.php");
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
    $Shop_name=$_POST['Shop_name'];
    $BusinessReg_No=$_POST['BusinessReg_No'];
    $Account_No=$_POST['Account_No'];


    
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
        $Shop_name=$connection->real_escape_string($Shop_name);
        $BusinessReg_No=$connection->real_escape_string($BusinessReg_No);
        $Account_No=$connection->real_escape_string($Account_No);

    


    $gasagent=new gasagent_model();
    $inputs1=array($user_id,$First_Name, $Last_Name, $City, $Street, $Postalcode, $Username, $Email);
    $inputs2=array($user_id,$Contact_No);
    $inputs3=array($user_id, $NIC,$Shop_name, $BusinessReg_No, $Account_No);

    $result1=$gasagent->updateUser($connection,$inputs1);
    if($result1){
        $result2=$gasagent->updateContacts($connection,$inputs2);
        if($result2){
            $result3=$gasagent->updateGasagent($connection,$inputs3);
            if ($result3) {
                $_SESSION['updateuser'] = "success";
                header("Location: ../../controller/staff/gasagentacc_controller.php?id=viewGasagent");
            }
            else{
                $_SESSION['updateuser']="failed";
                // echo "Failed";
            }
        }else{
            $_SESSION['updateuser']="failed";
            // echo "Failed";
        }
    }else{
        $_SESSION['updateuser']="failed";
        // echo "Failed";
    }


}