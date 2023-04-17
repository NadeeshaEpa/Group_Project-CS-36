<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/users_model.php';


if(isset($_GET['id'])){
    $users=new user_model();
    $result1=$users->count_customers($connection);
    if($result1){
        $result2=$users->count_gasagents($connection);
        if($result2){
            $result3=$users->count_deliverypersons($connection);
            if($result3){
                $result4=$users->count_staff($connection);
                if($result4){
                    $result=array($result1,$result2, $result3,$result4);
                    $_SESSION['userdetails']=$result;
                    header("Location:../../view/admin/users.php");
                }else{
                    $_SESSION['userdetails']="failed";
                    echo "Failed";
                }
            }
            else{
                $_SESSION['userdetails']="failed";
                echo "Failed";
            }
        }else{
            $_SESSION['userdetails']="failed";
            echo "Failed";
        }
    }else{
        $_SESSION['userdetails']="failed";
        echo "Failed";
    }

}



if(isset($_GET['uid'])){
    $user=new user_model();
    $result=$user->viewdisabledacc($connection);
    if($result){
        $_SESSION['disabledaccdetails']=$result;
        header("Location:../../view/admin/admin-viewdisabledacc.php");
    }else{
        $_SESSION['disabledaccdetails']=[];
        header("Location:../../view/admin/admin-viewdisabledacc.php");
    }

}

if(isset($_GET['did'])){
    $user_id=$_GET['did'];
    $user_id=$connection->real_escape_string($user_id);
    $_SESSION['did']=$user_id;
    $user=new user_model();
    $result=$user->deleteuser($connection,$user_id);
    if($result===false){
        header("Location: ../../view/admin/admin-viewDisabledacc.php");
    }else{
        header("Location: ../../controller/admin/users_controller.php?uid=viewdisabledacc");
    }
}
?>