<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/cylinder_model.php';



if(isset($_GET['id'])){
    echo "hello";
    $cylinder=new cylinder_model();
    $result=$cylinder->viewcylinder($connection);
    if($result){
        $_SESSION['cylinderdetails']=$result;
        header("Location:../../view/staff/gas_cylinder.php");
    }else{
        echo "Error";
    }

}

// if(isset($_GET['did'])){
//     $company_id=$_GET['did'];
//     $company_id=$connection->real_escape_string($company_id);
//     $company=new company_model();
//     $result=$company->deleteuser($connection,$company_id);
//     if($result===false){
//         $_SESSION['deleteuser']="failed";
//         header("Location: ../../view/staff/gascompany.php");
//     }else{
//         $_SESSION['deleteuser']="success";
//         header("Location:../../controller/staff/company_controller.php?id=viewcompany");
//     }
// }


// if(isset($_GET['uid'])){
//     $company_id=$_GET['uid'];
//     $company_id=$connection->real_escape_string($company_id);
//     $_SESSION['uid']=$company_id;
//     $company=new company_model();
//     $result=$company->edituser($connection,$company_id);
//     if($result===false){
//         $_SESSION['edituser']="failed";
//         header("Location: ../../view/staff/gascompany.php");
//     }else{
//         $_SESSION['edituser']=$result;
//         header("Location: ../../view/staff/company_update.php");
//     }
// }

// if(isset($_GET['vid'])){
//     $company_id=$_GET['vid'];
//     $company_id=$connection->real_escape_string($company_id);
//     $_SESSION['vid']=$company_id;
//     $company=new company_model();
//     $result=$company->view_company($connection,$company_id);
//     if($result===false){
//         $_SESSION['view_company']="failed";
//         header("Location: ../../view/staff/gascompany.php");
//     }else{
//         $_SESSION['view_company']=$result;
//         header("Location: ../../view/staff/company_view.php");
//     }
// }

// if (isset($_POST['edituser'])) {
//     $company_id=$_POST['company_id'];
//     $company_name = $_POST['company_name'];
//     // $photo = $_POST['photo'];

//     $company_id=$connection->real_escape_string($company_id);
//     $company_name = $connection->real_escape_string($company_name);
//     // $photo = $connection->real_escape_string($photo);

//     $company = new company_model();
//     $inputs1 = array($company_id, $company_name);


//     $result1 = $company->updateUser($connection, $inputs1);
//     if ($result1) {

//         $_SESSION['updateuser'] = "success";
//         header("Location: ../../view/staff/gascompany.php");

//     } else {
//         $_SESSION['updateuser'] = "failed";
//         echo "Failed";
//     }

// }