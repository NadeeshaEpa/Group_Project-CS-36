<?php
class shop_model{
    public function getGasCooker($connection){
        $sql="SELECT * FROM product WHERE Category='Gas Cooker'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description']]);
            }
        }
        return $answer;
    }
    public function getRegulator($connection){
        $sql="SELECT * FROM product WHERE Category='Regulator'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description']]);
            }
            return $answer;
        }
    }
    public function getOther($connection){
        $sql="SELECT * FROM product WHERE Category='Other'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description']]);
            }
            return $answer;
        }
    }
    public function stock_manager($connection){
        $sql="Select id from stock_manager";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['id'=>$row['id']]);
            }
        }
        return $answer;
    }
    public function addtocart($connection,$User_id,$item_code,$product_type,$name,$quantity,$price,$category,$description){
        $stock_manager=$this->stock_manager($connection);
        $stock_manager_id=$stock_manager[0]['id'];
        $_SESSION['stock_manager_id']=$stock_manager_id;
        //combine 2 variables and create a new string variable
        $nameandmodel=$name." ".$product_type;
        $sql="INSERT INTO cart(User_id,gasagent_id,type,weight,quantity,price) VALUES('$User_id','$stock_manager_id','$category','$nameandmodel','$quantity','$price')";
        $result=$connection->query($sql);
        if($result===false){
            print_r("Error");
            die();
            return false;
        }else{
            $sql="SELECT * FROM cart WHERE User_id='$User_id'";
            $result=$connection->query($sql);
            if($result->num_rows > 0){
                $_SESSION['cartcount']=$result->num_rows;
            }else{
                $_SESSION['cartcount']=0;
            }
            return true;
        }
        //divide the string into 2 string variables and take the last string variable as the model
    }
}