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
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description'],'image'=>$row['Product_img']]);
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
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description'],'image'=>$row['Product_img']]);
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
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description'],'image'=>$row['Product_img']]);
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
        $_SESSION['stock_manager_id']=$answer[0]['id'];
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
            $sql="SELECT distinct gasagent_id FROM cart WHERE User_id='$User_id'";
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
    public function setloc($User_id,$connection){
        $sql2="select latitude, longitude from customer where Customer_Id='$User_id'";
        $result2=$connection->query($sql2);
        if($result2->num_rows===0){
            return false;
        }else{
            $row2=$result2->fetch_assoc();  
            $lat2=$row2['latitude'];
            $_SESSION['latitude']=$lat2;
            $lon2=$row2['longitude'];
            $_SESSION['longitude']=$lon2;
        }
    }
    public function getdeliveryfee($User_id,$connection,$lat2,$lon2){
       $sql="select latitude, longitude from stock_manager";
       $result=$connection->query($sql);
        if($result->num_rows===0){
           return false;
        }else{
           $row=$result->fetch_assoc();  
           $lat1=$row['latitude'];
           $lon1=$row['longitude'];
        }
        $distance=$this->distance($lat2,$lon2,$lat1,$lon1,$connection);
        if($distance>10){
            $_SESSION['fago_distance_limit']="high";
            $delivery_fee=0;
            return $delivery_fee;
        }else{
            $_SESSION['fago_distance_limit']="low";
        }

        $sql3="select price from delivery_fee where vehicle='Bike'";
        $result3=$connection->query($sql3);
        if($result3->num_rows===0){
            return false;
        }else{
            $row3=$result3->fetch_assoc();  
            $price=$row3['price'];
        }
        return $distance*$price;
        
    }
    public function distance($clatitude,$clongitude,$latitude,$longitude,$connection){
        $lat1=$clatitude;
        $lng1=$clongitude;
        $lat2=$latitude;
        $lng2=$longitude;

        $R = 6371;
            $dLat = ($lat2 - $lat1) * (M_PI / 180);
            $dLng = ($lng2 - $lng1) * (M_PI / 180);
            $a = 
              sin($dLat / 2) * sin($dLat / 2) +
              cos($lat1 * (M_PI / 180)) * cos($lat2 * (M_PI / 180)) * 
              sin($dLng / 2) * sin($dLng / 2)
            ;
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $d = $R * $c;
        //round the value into 2 decimal places
        $d=round($d,1);
        return $d;    
    }
    
}