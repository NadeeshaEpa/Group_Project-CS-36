<?php
session_start();
require_once("../../config.php");
require_once '../../model/admin/company_model.php';
// require_once '../../model/admin/checkcompany_model.php';

if(isset($_POST['register'])){
    $company_name = $_POST['name'];
    // $poster = $_POST['poster'];
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
                $photo=uniqid('',true).".".$fileActualExt;
                $fileDestination='../../public/images/'.$photo;
                move_uploaded_file($fileTmpName,$fileDestination);
                // $acc=new company_model();
                // $result=$acc->updateImage($connection,$_SESSION['User_id'],$fileNameNew);
                // if($result){
                //     $_SESSION['updateimg']="success";
                //     header("Location: ../../view/admin/profile.php");
                // }else{
                //     $_SESSION['updateimg']="failed";
                //     header("Location: ../../view/admin/profile.php");
                // }
            }else{
                echo "Your file is too big";
            }

        }else{
            echo "There was an error uploading your file";
        }        
    }else{
        echo "You cannot upload files of this type";
    }
}else{
   echo "Invalid request";
   exit();
}

$company_name=$connection->real_escape_string($company_name);
$photo=$connection->real_escape_string($photo);



$company=new company_model();
$company->setDetails($company_name,$photo);

$result1=$company->check_company($connection,$company_name);
if($result1==true){
    $result=$company->Registercompany($connection);
    if($result){
        $_SESSION['RegsuccessMsg'] = 'company Registered Successfully';
        header("Location:../../controller/admin/company_controller.php?id=viewcompany");
    }else{
        header("Location: ../../view/admin/gascompany.php");
    }
}
else{
    $_SESSION['addcompany-error']="Company Already Exists";
    header("Location: ../../view/admin/add_company.php");
}

$connection->close();
