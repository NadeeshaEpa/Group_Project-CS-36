<?php 
   
    class Add_Brands{
        public function Add_Brands($connection,$name,$Quantity,$price,$discription,$Category,$Product_type){
            $sql="INSERT INTO `product`(`Item_code`, `Date`, `Name`, `Quantity`, `Price`, `Category`, `Product_type`, `Description`) VALUES (' ',CURDATE(),'$name',$Quantity,$price,'$Category','$Product_type','$discription')";
           
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
}