<?php 
   
    class Add_Brands{
<<<<<<< HEAD
        public function Add_Brands($connection,$name,$Quantity,$price,$discription,$Category,$fileNameNew,$product_type){
            $sql="INSERT INTO `product`(`Item_code`, `Date`, `Name`, `Quantity`, `Price`, `Profile_img`, `Category`, `Product_type`, `Description`) VALUES (' ',CURDATE(),'$name',$Quantity,$price,'$fileNameNew','$Category','$product_type','$discription')";
            
=======
        public function Add_Brands($connection,$name,$Quantity,$price,$discription,$Category,$Product_type){
            $sql="INSERT INTO `product`(`Item_code`, `Date`, `Name`, `Quantity`, `Price`, `Category`, `Product_type`, `Description`) VALUES (' ',CURDATE(),'$name',$Quantity,$price,'$Category','$Product_type','$discription')";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
           
            $result=$connection->query($sql);
            // var_dump($sql);
            // die();
            if($result){
                return true;
            }
            else{
                return false;
            }

        }
<<<<<<< HEAD
       
       
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
}