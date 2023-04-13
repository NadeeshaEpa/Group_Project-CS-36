<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/account_model.php';
include_once '../../model/staff/customer_model.php';


if(isset($_GET['id'])){
    $customer=new account_model();
    $result=$customer->viewcustomer($connection);
    if($result){
        $_SESSION['customerdetails']=$result;
        header("Location:../../view/staff/staff-viewCustomer.php");
    }else{
        $_SESSION['customerdetails']=[];
        header("Location:../../view/staff/staff-viewCustomer.php");
    }

}

if(isset($_GET['rid'])){
    $customer=new account_model();
    $result=$customer->viewcustomerRequests($connection);
    if($result){
        $_SESSION['customerdetails']=$result;
        header("Location:../../view/staff/Customer_requestlist.php");
    }else{
        $_SESSION['customerdetails']=[];
        header("Location:../../view/staff/Customer_requestlist.php");
    }

}

if(isset($_GET['acid'])){
    $user_id=$_GET['acid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['acid']=$user_id;
    $customer=new customer_model();
    $result=$customer->activateuser($connection,$user_id);
    if($result===false){
        header("Location: ../../view/staff/staff-viewDisabledacc.php");
    }else{
        header("Location: ../../controller/staff/users_controller.php?uid=viewdisabledacc");
    }
}


if(isset($_GET['did'])){
    $user_id=$_GET['did'];
    $user_id=$connection->real_escape_string($user_id);
    $customer=new customer_model();
    $result=$customer->deleteuser($connection,$user_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/staff/staff-viewCustomer.php");
    }else{
        $_SESSION['deleteuser']="success";
        $account = new account_model();
        $result=$account->viewcustomer($connection);
        if($result){
            $_SESSION['customerdetails']=$result;
            header("Location:../../controller/staff/customeracc_controller.php?id=viewCustomer");
        }else{
            header("Location:../../view/staff/staff-viewCustomer.php");
        }
    }
}

if(isset($_GET['rvid'])){
    $user_id=$_GET['rvid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['rvid']=$user_id;
    $customer=new customer_model();
    $result=$customer->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewrequest']="failed";
        header("Location: ../../view/staff/Customer_requestlist.php");
    }else{
        $_SESSION['viewrequest']=$result;
        header("Location: ../../view/staff/customer_request.php");
    }
}

if(isset($_GET['aid'])){
    $user_id=$_GET['aid'];
    $user_id=$connection->real_escape_string($user_id);
    $customer=new customer_model();
    $result=$customer->accept($connection,$user_id,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['acceptuser']="failed";
        header("Location: ../../view/staff/Customer_requestlist.php");
    }else{
        $_SESSION['acceptuser']="success";
        header("Location: ../../controller/staff/customeracc_controller.php?rid=viewCustomerRequests");
        
    }
}

if(isset($_GET['deid'])){
    $user_id=$_GET['deid'];
    $user_id=$connection->real_escape_string($user_id);
    $customer=new customer_model();
    $result=$customer->decline($connection,$user_id);
    if($result===false){
        $_SESSION['declineuser']="failed";
        header("Location: ../../view/staff/Customer_requestlist.php");
    }else{
        $_SESSION['declineuser']="success";
        header("Location: ../../controller/staff/customeracc_controller.php?rid=viewCustomerRequests");
        
    }
}


   
if(isset($_GET['uid'])){
    $user_id=$_GET['uid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['uid']=$user_id;
    $customer=new customer_model();
    $result=$customer->edituser($connection,$user_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/staff/customer_update.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/staff/customer_update.php");
    }
}

if(isset($_POST['search'])){
    $name=$_POST['customer_name'];
    $name=$connection->real_escape_string($name);
    $customer=new customer_model();
    $result=$customer->searchcustomer($connection,$name);
    if($result){
        $_SESSION['customerdetails']=$result;
        header("Location:../../view/staff/staff-viewCustomer.php");
    }else{
        $_SESSION['customerdetails']=[];
        header("Location:../../view/staff/staff-viewCustomer.php");
    }
}

if(isset($_POST['search_request'])){
    $name=$_POST['customer_name'];
    $name=$connection->real_escape_string($name);
    $customer=new customer_model();
    $result=$customer->searchcustomer_request($connection,$name);
    if($result){
        $_SESSION['customerdetails']=$result;
        header("Location:../../view/staff/Customer_requestlist.php");
    }else{
        $_SESSION['customerdetails']=[];
        header("Location:../../view/staff/Customer_requestlist.php");
    }
}

if(isset($_GET['vid'])){
    $user_id=$_GET['vid'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['vid']=$user_id;
    $customer=new customer_model();
    $result=$customer->viewuser($connection,$user_id);
    if($result===false){
        $_SESSION['viewuser']="failed";
        header("Location: ../../view/staff/admin-viewCustomer.php");
    }else{
        $_SESSION['viewuser']=$result;
        header("Location: ../../view/staff/customer_view.php");
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
    $ElectricityBill_No=$_POST['ElectricityBill_No'];


    
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
        $ElectricityBill_No=$connection->real_escape_string($ElectricityBill_No);

    


    $customer=new customer_model();
    $inputs1=array($user_id,$First_Name, $Last_Name, $City, $Street, $Postalcode, $Username, $Email);
    $inputs2=array($user_id,$Contact_No);

    $result1=$customer->updateUser($connection,$inputs1);
    if($result1){
        $result2=$customer->updateContacts($connection,$inputs2);
        if($result2){
            $_SESSION['updateuser']="success";
            header("Location: ../../controller/staff/customeracc_controller.php?id=viewCustomer");
        }else{
            $_SESSION['updateuser']="failed";
            // // echo "Failed";
        }
    }else{
        $_SESSION['updateuser']="failed";
        // echo "Failed";
    }

}


?>