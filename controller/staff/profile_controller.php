<?php
session_start();
require_once("../../config.php");
require_once("../../model/staff/profile_model.php");
require_once("../../model/staff/checkstaff_model.php");

if(isset($_GET['viewacc'])){
    if(isset($_SESSION['User_id'])){ 
            $acc=new account_model();
            $result=$acc->viewAccount($connection,$_SESSION['User_id']);
            if($result==false){
                $_SESSION['viewacc']="failed";
                // header("Location: ../../view/customer/customer_select.php");            
            }else{
                //unset($_SESSION['viewacc']);
                $_SESSION['viewacc_result']=$result;   
                header("Location: ../../view/staff/profile.php");   
            }
    }else{
            // echo "Please login first";
            header("Location: ../../view/staff/staff_login.php");
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
                header("Location: ../../view/staff/profile.php");
            }else{
                $_SESSION['updateuser']="failed";
                // echo "Failed";
            }
        }else{
            $_SESSION['updateuser']="failed";
            // echo "Failed";
        }

    }
}
if(isset($_POST['changepassword'])){
    if(isset($_SESSION['User_id'])){ 
        header("Location: ../../view/staff/staff_changepassword.php");
    }
}
if(isset($_POST['updatepwd'])){
    if(isset($_SESSION['User_id'])){
        $oldpwd=$_POST['pwd'];
        $newpwd=$_POST['npwd'];
        $confirmpwd=$_POST['cnpwd'];

        $oldpwd=$connection->real_escape_string($oldpwd);
        $newpwd=$connection->real_escape_string($newpwd);
        $confirmpwd=$connection->real_escape_string($confirmpwd);

        $acc=new account_model();

        $result1=checkpassword($confirmpwd,$newpwd);
        if(!$result1){
            $_SESSION['updatepwd-error']="New password and confirm password are not same";
            header("Location: ../../view/staff/staff_changepassword.php");
        }else{
            $result2=$acc->updatePassword($connection,$_SESSION['User_id'],$oldpwd,$newpwd,$confirmpwd);
            if(!$result2){
                $_SESSION['updatepwd-error']="Current password is incorrect";
                header("Location: ../../view/staff/staff_changepassword.php");
            }else{
                $_SESSION['updatepwd']="Password Updated Successfully";
                header("Location: ../../view/staff/staff_changepassword.php");
            }
        }
    }
}
if(isset($_POST['cancelpwd'])){
    if(isset($_SESSION['User_id'])){
        header("Location: ../../view/staff/profile.php");
    }
}
if(isset($_POST['deleteaccount'])){
    if(isset($_SESSION['User_id'])){
        $acc=new account_model();
        $result=$acc->deleteAccount($connection,$_SESSION['User_id']);
        if($result){
            $_SESSION['deleteacc']="success";
            header("Location: ../../view/staff/staff_login.php");
        }else{
            $_SESSION['deleteacc']="failed";
            header("Location: ../../view/staff/profile.php");
        }
    }
}
if(isset($_POST['uploadimg'])){
    $file=$_FILES['image'];

    $fileName=$_FILES['image']['name'];
    $fileTmpName=$_FILES['image']['tmp_name'];
    $fileSize=$_FILES['image']['size'];
    $fileError=$_FILES['image']['error'];
    $fileType=$_FILES['image']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew=$_SESSION['User_id'].".".$fileActualExt;
                $fileDestination='../../public/images/staff/profile_img/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $acc=new account_model();
                $result=$acc->updateImage($connection,$_SESSION['User_id'],$fileNameNew);
                if($result){
                    $_SESSION['updateimg']="success";
                    header("Location: ../../view/staff/profile.php");
                }else{
                    $_SESSION['updateimg']="failed";
                    header("Location: ../../view/staff/profile.php");
                }
            }else{
                echo "Your file is too big";
            }

        }else{
            echo "There was an error uploading your file";
        }        
    }else{
        echo "You cannot upload files of this type";
    }
}
if(isset($_POST['removeimg'])){
    $acc=new account_model();
    $result=$acc->removeImage($connection,$_SESSION['User_id']);
    if($result){
        $_SESSION['removeimg']="success";
        header("Location: ../../view/staff/profile.php.php");
    }else{
        $_SESSION['removeimg']="failed";
        header("Location: ../../view/staff/profile.php.php");
    }
}