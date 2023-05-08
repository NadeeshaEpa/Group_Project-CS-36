<?php
session_start();
include_once '../../config.php';
include_once '../../model/admin/company_model.php';


if(isset($_GET['id'])){
    echo "hello";
    $company=new company_model();
    $result=$company->viewcompany($connection);
    if($result){
        $_SESSION['companydetails']=$result;
        header("Location:../../view/admin/gascompany.php");
    }else{
        echo "Error";
    }

}

if(isset($_GET['did'])){
    $company_id=$_GET['did'];
    $company_id=$connection->real_escape_string($company_id);
    $company=new company_model();
    $result=$company->deleteuser($connection,$company_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/admin/gascompany.php");
    }else{
        $_SESSION['deleteuser']="success";
        header("Location:../../controller/admin/company_controller.php?id=viewcompany");
    }
}


if(isset($_GET['uid'])){
    $company_id=$_GET['uid'];
    $company_id=$connection->real_escape_string($company_id);
    $_SESSION['uid']=$company_id;
    $company=new company_model();
    $result=$company->edituser($connection,$company_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/admin/gascompany.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/admin/company_update.php");
    }
}

if(isset($_GET['vid'])){
    $company_id=$_GET['vid'];
    $company_id=$connection->real_escape_string($company_id);
    $_SESSION['vid']=$company_id;
    $company=new company_model();
    $result=$company->view_company($connection,$company_id);
    if($result===false){
        $_SESSION['view_company']="failed";
        header("Location: ../../view/admin/gascompany.php");
    }else{
        $_SESSION['view_company']=$result;
        header("Location: ../../view/admin/company_view.php");
    }
}

if (isset($_POST['edituser'])) {
    $company_id=$_POST['company_id'];
    $company_name = $_POST['company_name'];
    // $photo = $_POST['photo'];

    $company_id=$connection->real_escape_string($company_id);
    $company_name = $connection->real_escape_string($company_name);
    // $photo = $connection->real_escape_string($photo);

    $company = new company_model();
    $inputs1 = array($company_id, $company_name);
    $result2=$company->check_company($connection,$company_name);
    if($result2==true){
        $result1 = $company->updateUser($connection, $inputs1);    
        if ($result1) {

            $_SESSION['updateuser'] = "success";
            header("Location:../../controller/admin/company_controller.php?id=viewcompany");

        } else {
            $_SESSION['updateuser'] = "failed";
            echo "Failed";
        }
    }
    else{
        $_SESSION['addcompany-error']="Company Already Exists";
        header("Location: ../../view/admin/company_update.php");
    }

}

if(isset($_POST['uploadimg'])){
    $company_id = $_POST['com_id'];
    $company_name = $_POST['com_name'];
    $file=$_FILES['photo'];

    $fileName=$_FILES['photo']['name'];
    $fileTmpName=$_FILES['photo']['tmp_name'];
    $fileSize=$_FILES['photo']['size'];
    $fileError=$_FILES['photo']['error'];
    $fileType=$_FILES['photo']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew=$company_name.".".$fileActualExt;
                $fileDestination='../../public/images/gascylinder/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $company=new company_model();
                $result=$company->updateImage($connection,$company_id,$fileNameNew);
                if($result){
                    $_SESSION['updateimg']="success";
                    header("Location: ../../controller/admin/company_controller.php?uid=$company_id");
                }else{
                    $_SESSION['updateimg']="failed";
                    header("Location: ../../view/admin/gascompany.php");
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
