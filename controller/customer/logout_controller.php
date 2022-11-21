<?php
session_start();
if(isset($_SESSION['User_id'])){
    session_destroy();
    header("Location: ../../view/customer/customer_login.php");
}else{
   echo "error";
}
?>