<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/users_model.php';


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
                    header("Location:../../view/staff/users.php");
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

if(isset($_GET['rid'])){
    $users=new user_model();
    $result1=$users->count_customerrequest($connection);
    if($result1){
        $result2=$users->count_gasagentrequest($connection);
        if($result2){
            $result3=$users->count_deliverypersonrequest($connection);
            if($result3){
                    $result=array($result1,$result2, $result3);
                    $_SESSION['userrequestdetails']=$result;
                    header("Location:../../view/staff/user_request.php");
            }
            else{
                $_SESSION['userrequestdetails']="failed";
                echo "Failed";
            }
        }else{
            $_SESSION['userrequestdetails']="failed";
            echo "Failed";
        }
    }else{
        $_SESSION['userrequestdetails']="failed";
        echo "Failed";
    }

}

if(isset($_GET['uid'])){
    $user=new user_model();
    $result=$user->viewdisabledacc($connection);
    if($result){
        $_SESSION['disabledaccdetails']=$result;
        header("Location:../../view/staff/staff-viewdisabledacc.php");
    }else{
        $_SESSION['disabledaccdetails']=[];
        header("Location:../../view/staff/staff-viewdisabledacc.php");
    }

}
?>