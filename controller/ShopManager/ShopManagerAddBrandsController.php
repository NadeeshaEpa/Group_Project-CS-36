<?php
session_start();
require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerAddBrandsModel.php");

if(isset($_POST['BrandAdd'])){
    $name=$_POST['productName'];
    $Quantity=$_POST['productQuantity'];
    $price=$_POST['producPrice'];
    $description=$_POST['productDescription'];
    $Category=$_POST['Category'];

    $product_type=$_POST['product_type'];

    $file=$_FILES['image'];
    $fileName=$_FILES['image']['name'];
    $fileTmpName=$_FILES['image']['tmp_name'];
    $fileSize=$_FILES['image']['size'];
    $fileError=$_FILES['image']['error'];
    $fileType=$_FILES['image']['type'];
    


    $name=$connection->real_escape_string($name);
    $Quantity=$connection->real_escape_string($Quantity);
    $price=$connection->real_escape_string($price);
    $description=$connection->real_escape_string($description);
    $Category=$connection->real_escape_string($Category);

    $product_type=$connection->real_escape_string($product_type);
    
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    
    
   
   
    
    $allowed=array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew=$product_type.".".$fileActualExt;
                $fileDestination='../../public/images/ShopManager/Brands/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $user=new Add_Brands;
                $result=$user->Add_Brands($connection,$name,$Quantity,$price,$description,$Category,$fileNameNew,$product_type);
            }else{
                echo "Your file is too big";
            }

        }else{
            echo "There was an error uploading your file";
        }        
    }else{
        echo "You cannot upload files of this type";
    }

    
    if($result==true){
        $_SESSION['Brand_add']="New brand Added Successfully";
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();

    }
    else{
        $_SESSION['Brand_add_error']="Error Occurred";
        header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
        $connection->close();
        exit();
    }

}
else{
    header("Location: ../../view/ShopManager/shopManagerAddNewBrands.php");
    $connection->close();
    exit();

}







