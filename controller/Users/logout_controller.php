<?php
session_start();
if(isset($_SESSION['User_id'])){
    $_SESSION['logout']="success";
    session_destroy();
    header("Location: http://localhost:8001/view/login.php");
}else{
   echo "error";
}
?>