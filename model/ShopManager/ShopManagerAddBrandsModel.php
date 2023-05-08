<?php 
   
    class Add_Brands{

        public function Add_Brands($connection,$name,$Quantity,$price,$discription,$Category,$fileNameNew,$product_type){
            $sql="INSERT INTO `product`(`Item_code`, `Date`, `Name`, `Quantity`, `Price`, `Product_img`, `Category`, `Product_type`, `Description`,`active_state`) VALUES (' ',CURDATE(),'$name',$Quantity,$price,'$fileNameNew','$Category','$product_type','$discription','1')";
            

           
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

        public function Get_Max_itemcode($connection){
            
            $sql="SELECT MAX(Item_code) FROM product;";
            
            $result=mysqli_query($connection,$sql);
           
            if($result->num_rows==0){
                return false;
                
            }else{
              
               $row=mysqli_fetch_assoc($result);
               
               $item_code=$row['MAX(Item_code)']+1;
            }
            return $item_code;
        }
}