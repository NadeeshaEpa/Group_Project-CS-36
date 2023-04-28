<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/account_model.php';
include_once '../../model/staff/deliveryperson_model.php';
include_once '../../model/staff/email_model.php';


if(isset($_GET['id'])){
    // echo "hello";
    $deliveryperson=new account_model();
    $result=$deliveryperson->viewDeliveryperson($connection);
    if($result){
        $_SESSION['deliverypersondetails']=$result;
        header("Location:../../view/staff/staff-viewDeliveryperson.php");
    }else{
        $_SESSION['deliverypersondetails']=[];
        header("Location:../../view/staff/staff-viewDeliveryperson.php");
    }

}

if(isset($_GET['rid'])){
    // echo "hello";
    $deliveryperson=new account_model();
    $result=$deliveryperson->viewDeliverypersonRequests($connection);
    if($result){
        $_SESSION['deliverypersondetails']=$result;
        header("Location:../../view/staff/Deliveryperson_requestlist.php");
    }else{
        $_SESSION['deliverypersondetails']=[];
        header("Location:../../view/staff/Deliveryperson_requestlist.php");
    }

}

if(isset($_GET['did'])){
    $user_id=$_GET['did'];
    $user_id=$connection->real_escape_string($user_id);
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->deleteuser($connection,$user_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/staff/staff-viewdeliveryperson.php");
    }else{
        $_SESSION['deleteuser']="success";
        $account = new account_model();
        $result=$account->viewdeliveryperson($connection);
        if($result){
            $_SESSION['deliverypersondetails']=$result;
            header("Location:../../controller/staff/deliverypersonacc_controller.php?id=viewdeliveryperson");
        }else{
            header("Location:../../view/staff/staff-viewDeliveryperson.php");
        }
    }
}
if(isset($_GET['uid'])){
    $user_id=$_GET['uid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['uid']=$user_id;
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->edituser($connection,$user_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/staff/deliveryperson_update.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/staff/deliveryperson_update.php");
    }
}

if(isset($_GET['acid'])){
    $user_id=$_GET['acid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['acid']=$user_id;
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->activateuser($connection,$user_id);
    if($result===false){
        header("Location: ../../view/staff/staff-viewDisabledacc.php");
    }else{
        header("Location: ../../controller/staff/users_controller.php?uid=viewdisabledacc");
    }
}

if(isset($_GET['vid'])){
    $user_id=$_GET['vid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['vid']=$user_id;
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewuser']="failed";
        header("Location: ../../view/staff/staff-viewDeliveryperson.php");
    }else{
        $_SESSION['viewuser']=$result;
        header("Location: ../../view/staff/deliveryperson_view.php");
    }
}

if(isset($_GET['rvid'])){
    $user_id=$_GET['rvid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['rvid']=$user_id;
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewrequest']="failed";
        header("Location: ../../view/staff/Deliveryperson_requestlist.php");
    }else{
        $_SESSION['viewrequest']=$result;
        header("Location: ../../view/staff/deliveryperson_request.php");
    }
}

if(isset($_GET['aid'])){
    $user_id=$_GET['aid'];
    $user_id=$connection->real_escape_string($user_id);
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->accept($connection,$user_id,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['acceptuser']="failed";
        header("Location: ../../view/staff/Deliveryperson_requestlist.php");
    }else{
        $_SESSION['acceptuser']="success";
        $email=new email_model();
        $result=$email->send_DeliverypersonEmail($user_id,$connection);
        header("Location: ../../controller/staff/deliverypersonacc_controller.php?rid=viewDeliverypersonRequests");     
    }
}

if(isset($_GET['deid'])){
    $user_id=$_GET['deid'];
    $user_id=$connection->real_escape_string($user_id);
    $email=new email_model();
    $result=$email->send_CancelEmail($user_id,$connection);
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->decline($connection,$user_id);
    if($result===false){
        $_SESSION['declineuser']="failed";
        header("Location: ../../view/staff/Deliveryperson_requestlist.php");
    }else{
        $_SESSION['declineuser']="success";
        header("Location: ../../controller/staff/deliverypersonacc_controller.php?rid=viewDeliverypersonRequests");
        
    }
}

if(isset($_POST['search'])){
    $name=$_POST['deliveryperson_name'];
    $name=$connection->real_escape_string($name);
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->searchdeliveryperson($connection,$name);
    if($result){
        $_SESSION['deliverypersondetails']=$result;
        header("Location:../../view/staff/staff-viewDeliveryperson.php");
    }else{
        $_SESSION['deliverypersondetails']=[];
        header("Location:../../view/staff/staff-viewDeliveryperson.php");
    }
}

if(isset($_POST['search_request'])){
    $name=$_POST['deliveryperson_name'];
    $name=$connection->real_escape_string($name);
    $deliveryperson=new deliveryperson_model();
    $result=$deliveryperson->searchdeliveryperson_request($connection,$name);
    if($result){
        $_SESSION['deliverypersondetails']=$result;
        header("Location:../../view/staff/Deliveryperson_requestlist.php");
    }else{
        $_SESSION['deliverypersondetails']=[];
        header("Location:../../view/staff/Deliveryperson_requestlist.php");
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
    $NIC=$_POST['NIC'];
    $Contact_No=$_POST['Contact_No'];
    $Vehicle_Type=$_POST['vehicletype'];
    $Vehicle_No=$_POST['vehiclenum'];
    $Account_No=$_POST['Account_No'];


    
    // $ElectricityBill_No=$_POST['ElectricityBill_No'];

        $User_id=$connection->real_escape_string($user_id);
        $First_Name=$connection->real_escape_string($First_Name);
        $Last_Name=$connection->real_escape_string($Last_Name);
        $Email=$connection->real_escape_string($Email);
        $NIC=$connection->real_escape_string($NIC);
        $Contact_No=$connection->real_escape_string($Contact_No);
        $Username=$connection->real_escape_string($Username);
        $Street=$connection->real_escape_string($Street);
        $City=$connection->real_escape_string($City);
        $Postalcode=$connection->real_escape_string($Postalcode);
        $Vehicle_Type=$connection->real_escape_string($Vehicle_Type);
        $Vehicle_No=$connection->real_escape_string($Vehicle_No);
        $Account_No=$connection->real_escape_string($Account_No);

    


    $deliveryperson=new deliveryperson_model();
    $inputs1=array($user_id,$First_Name, $Last_Name, $City, $Street, $Postalcode, $Username, $Email);
    $inputs2=array($user_id,$Contact_No);
    $inputs3=array($user_id, $NIC,$Vehicle_Type, $Vehicle_No, $Account_No);

    $result1=$deliveryperson->updateUser($connection,$inputs1);
    if($result1){
        $result2=$deliveryperson->updateContacts($connection,$inputs2);
        if($result2){
            $result3=$deliveryperson->updatedeliveryperson($connection,$inputs3);
            if ($result3) {
                $_SESSION['updateuser'] = "success";
                header("Location: ../../controller/staff/deliverypersonacc_controller.php?id=viewDeliverypersont");
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