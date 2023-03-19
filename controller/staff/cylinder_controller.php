<?php
session_start();
include_once '../../config.php';
include_once '../../model/staff/cylinder_model.php';



if(isset($_GET['id'])){

    $cylinder=new cylinder_model();
    $result=$cylinder->viewcylinder($connection);
    if($result){
        $_SESSION['cylinderdetails']=$result;
        header("Location:../../view/staff/gas_cylinder.php");
    }else{
        $_SESSION['cylinderdetails']=[];
        header("Location:../../view/staff/gas_cylinder.php");
    }

}

if(isset($_GET['did'])){
    $cylinder_id=$_GET['did'];
    $cylinder_id=$connection->real_escape_string($cylinder_id);
    $cylinder=new cylinder_model();
    $result=$cylinder->deleteuser($connection,$cylinder_id);
    if($result===false){
        $_SESSION['deleteuser']="failed";
        header("Location: ../../view/staff/gas_cylinder.php");
    }else{
        $_SESSION['deleteuser']="success";
        header("Location:../../controller/staff/cylinder_controller.php?id=viewcylinder");
    }
}

if(isset($_GET['uid'])){
    $cylinder_id=$_GET['uid'];
    $cylinder_id=$connection->real_escape_string($cylinder_id);
    $_SESSION['uid']=$cylinder_id;
    $cylinder=new cylinder_model();
    $result=$cylinder->edituser($connection,$cylinder_id);
    if($result===false){
        $_SESSION['edituser']="failed";
        header("Location: ../../view/staff/gas_cylinder.php");
    }else{
        $_SESSION['edituser']=$result;
        header("Location: ../../view/staff/cylinder_update.php");
    }
}

if (isset($_POST['edituser'])) {
    $cylinder_id=$_POST['Cylinder_Id'];
    $Price = $_POST['Price'];
    // $photo = $_POST['photo'];

    $cylinder_id=$connection->real_escape_string($cylinder_id);
    $Price = $connection->real_escape_string($Price);
    // $photo = $connection->real_escape_string($photo);

    $cylinder = new cylinder_model();
    $inputs1 = array($cylinder_id, $Price);


    $result1 = $cylinder->updateUser($connection, $inputs1);
    if ($result1) {

        $_SESSION['updateuser'] = "success";
        header("Location: ../../controller/staff/cylinder_controller.php?id=viewcylinder");

    } else {
        $_SESSION['updateuser'] = "failed";
        echo "Failed";
    }

}

if(isset($_GET['cid'])){
        $company=new cylinder_model();
        $result=$company->company_list($connection);
        if($result===false){
            $_SESSION['company_list']="failed";
            header("Location: ../../view/staff/add_cylinder.php");
        }else{
            $_SESSION['company_list']=$result;
            header("Location: ../../view/staff/add_cylinder.php");
        }
    }

if(isset($_POST['register'])){
        $gascompany = $_POST['gascompany'];
        $weight = $_POST['weight'];
        $price = $_POST['price'];
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
    
    $gascompany=$connection->real_escape_string($gascompany);
    $weight=$connection->real_escape_string($weight);
    $price=$connection->real_escape_string($price);
    $photo=$connection->real_escape_string($photo);
    
    
    
    $cylinder=new cylinder_model();
    $cylinder->setDetails($gascompany,$weight,$price,$photo);
    $result=$cylinder->Registercylinder($connection);
    if($result){
        header("Location:../../controller/staff/cylinder_controller.php?id=viewcylinder");
    }else{
        header("Location: ../../view/admin/gascompany.php");
    }
    
    $connection->close();

    






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




// if(isset($_GET['gasid'])){
//     $userid=$_SESSION['User_id'];
//     $user=new add_gasType();
//     $gettype=$user->getgasType($connection,$userid);
//     $gasweights=$user->getgasWeight($connection,$gettype);
//     $_SESSION['gasweights']=$gasweights;
//     header("Location: ../../view/gasagent/add_gastype.php");
// }

// if(isset($_POST['AddgasType'])){   
//     $weight=$_POST['gasWeight'];
//     $quantity=$_POST['gasQuantity'];
//     $gasagentId= $_SESSION['User_id'];

//     $weight=$connection->real_escape_string($weight);
//     $quantity=$connection->real_escape_string($quantity);

//     $user=new add_gasType();
//     $cylinderId=$user->getcylinderId($connection,$weight,$gasagentId);

//     $result=$user -> addgas($connection,$cylinderId,$quantity,$gasagentId);
//     if($result==true)
//     {
//         header("Location: ../../view/gasagent/addGasTypeSucsess.php");
//     }
//     else
//     {
//         $_SESSION['Already exist Gas type']="Already exist Gas type";
//         header("Location: ../../view/gasagent/add_gastype.php");
//     }
// }