<?php
require_once('../../config.php');
require_once('../../model/gasagent/edit.php');


if(isset($_POST['bt'])){
    $cylinder=$_POST['c'];
    $Type=$_POST['t'];
    $Weight=$_POST['w'];
    $Price=$_POST['p'];


    $cylinder=$connection->real_escape_string($cylinder);
    $Type=$connection->real_escape_string($Type);
    $Weight=$connection->real_escape_string($Weight);
    $Price=$connection->real_escape_string($Price);

    $user= new test();
    $edit=$user->editnew($connection,$cylinder,$Type,$Weight, $Price);

    if($edit){

        $_SESSION['succses']="added succesfuly";
        header("Location: ../../view/gasagent/edit.php");

        
    }
    else{
        header("Location: ../../view/gasagent/gasagent_dashboard.php");


    }






}
else{
    $connection->close();
    exit;
}


