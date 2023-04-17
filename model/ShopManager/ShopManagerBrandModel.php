<?php

class brand{


    public function BrandQuentityUpdate($connection,$Quantity,$code){
        $sql="UPDATE product SET Quantity=$Quantity,`Date`=CURDATE() WHERE  Item_code=$code";
        $result=$connection->query($sql);
        if($result){
            return true;
            
        }
        else{
            return false;
        }
    }

    public function BrandPriceUpdate($connection,$price,$code){
        $sql="UPDATE product SET Price=$price,`Date`=CURDATE() WHERE  Item_code=$code";
        $result=$connection->query($sql);
        if($result){
            return true;
            
        }
        else{
            return false;
        }
    }

    public function DeleteProduct($connection,$code){
        $sql="SET FOREIGN_KEY_CHECKS=0";
        $result=$connection->query($sql);
        
        if($result){
            $sql1="DELETE FROM `product` WHERE Item_code=$code";
            $result1=$connection->query($sql1);
            $sql2="SET FOREIGN_KEY_CHECKS=1";
            $result2=$connection->query($sql2);
            if($result1===true && $result2===true){
                return true;
            }
            else{
                false;
            }

        }
        else{
            return false;
        }
    }

    public function getProductDetails($connection){
        $sql="SELECT Item_code, Name, Quantity, Price, Category, Product_type,Description FROM product order BY Date ASC";
        
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            $_SESSION['BrandQError']="No found data";
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'Price'=>$row['Price'],'Category'=>$row['Category'],'Product_type'=>$row['Product_type'],'Description'=>$row['Description']]);
            }
        }
        return $answer;
    }
   

    //get Avelabel product code
    public function getProductItemCodeDetails($connection){
        $sql="SELECT Item_code FROM product order BY Date ASC";
        
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Item_code'=>$row['Item_code']]);
            }
        }
        return $answer;
    }

    //get avelabel product
    public function GetProduct($connection,$item){
        $sql="SELECT `Item_code`, `Name`, `Quantity`, `Price`, `Profile_img`, `Category`, `Product_type`, `Description` FROM `product` WHERE Item_code=$item";
        
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'Price'=>$row['Price'],'Profile_img'=>$row['Profile_img'],'Category'=>$row['Category'],'Product_type'=>$row['Product_type']]);
            }
        }
        return $answer;
    }

}

