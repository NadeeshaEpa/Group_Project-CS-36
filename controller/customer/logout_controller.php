<?php
session_start();
if(isset($_SESSION['User_id'])){
    session_destroy();
    header("Location: ../../index.php");
}else{
   echo "error";
}
?>