<?php
session_start();
if(isset($_SESSION['User_id'])){
    $_SESSION['logout']="success";
    session_destroy();
<<<<<<< HEAD

    header("Location: http://localhost:8001/view/login.php");
}else if(isset($_GET['home'])){
    session_destroy();
    header("Location: http://localhost:8001/index.php");

=======
    header("Location:http://localhost/Group_36/view/login.php");
}else if(isset($_GET['home'])){
    session_destroy();
    header("Location:http://localhost/Group_36/");
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
}else{
   echo "error";
}

?>