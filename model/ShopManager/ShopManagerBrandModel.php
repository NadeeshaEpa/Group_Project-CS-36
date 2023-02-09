<?php

class brand{

    public function BrandQuenBtn($connection,$Quantity,$code){
        $sql="UPDATE product SET Quantity=$Quantity WHERE  Item_code=$code";
        $result=$connection->query($sql);
        if($result){
            return true;
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


}

