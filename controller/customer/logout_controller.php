<?php
session_start();
if(isset($_SESSION['User_id'])){
    $_SESSION['logout']="success";
    session_destroy();
    header("Location: ../../index.php");
}else{
   echo "error";
}
?>