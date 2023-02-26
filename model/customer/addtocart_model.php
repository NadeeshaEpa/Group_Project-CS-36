<?php
class addtocart_model{
    public function get_cylinder_price($connection,$type,$weight,$cylinder){
       if($cylinder=="new"){
           $sql="SELECT newcylinder_price as cprice FROM gascylinder g inner join gas_company c on g.Type=c.company_id WHERE c.company_name='$type' AND g.weight='$weight'";   
       }else{
           $sql="SELECT price as cprice FROM gascylinder g inner join gas_company c on g.Type=c.company_id WHERE c.company_name='$type' AND g.weight='$weight'";
       }
       $price=$connection->query($sql);
        if($price===false){
            return false;
        }else{
            $row=$price->fetch_assoc();
            return $row['cprice'];
        }
    }
    public function get_product_price($connection,$type,$weight){
        $weight=explode(" ",$weight);
        $count=count($weight);
        $Product_type=$weight[$count-1];
        $category=$type;
        //name equals to the rest of the words
        $name="";
        for($i=0;$i<$count-1;$i++){
            $name=$name.$weight[$i]." ";
        }
        $sql3="select price from product where Name='$name' and Product_type='$Product_type' and Category='$category'";
        $price=$connection->query($sql3);
        if($price===false){
            return false;
        }else{
            $row=$price->fetch_assoc();
            return $row['price'];
        }

    }
    public function addtocart($connection,$User_id,$gasid,$weight,$quantity,$total,$type,$cylinder){
        $sql="INSERT INTO cart(User_id,gasagent_id,type,weight,cylinder_type,quantity,price) VALUES('$User_id','$gasid','$type','$weight','$cylinder','$quantity','$total')";
        $result=$connection->query($sql);
        if($result===false){
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
    }
    public function getcylinderid($connection,$type,$weight){
        $sql="SELECT Cylinder_Id FROM gascylinder g inner join gas_company c on g.Type=c.company_id WHERE c.company_name='$type' AND g.weight='$weight'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            $row=$result->fetch_assoc();
            return $row['Cylinder_Id'];
        }
    }
    public function updatequantity($connection,$quantity,$gasid,$cylinderid){
        $sql="update sell_gas set Quantity=Quantity-'$quantity' where GasAgent_id='$gasid' and Cylinder_id='$cylinderid'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            return true;
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
    public function checkandupdate($connection,$User_id){
        //check whether the prices in the cart are same as the prices in the database
        $sql="SELECT * FROM cart WHERE User_id='$User_id'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            while($row=$result->fetch_assoc()){
                $cartid=$row['cart_id'];
                $gasid=$row['gasagent_id'];
                $type=$row['type'];
                $weight=$row['weight'];
                $cylinder=$row['cylinder_type'];
                $quantity=$row['quantity'];
                $price=$row['price'];
                
                //get stock manager id
                $stock_manager_id=$this->stock_manager($connection);
                $stock_manager_id=$stock_manager_id[0]['id'];

                if($gasid!=$stock_manager_id){
                    //get the price of the cylinder
                    $newprice=$this->get_cylinder_price($connection,$type,$weight,$cylinder);
                    if($newprice===false){
                        return false;
                    }else{
                        //update the price row in cart
                        $newprice=$newprice*$quantity;
                        $sql="UPDATE cart SET price='$newprice' WHERE cart_id='$cartid'";
                        $connection->query($sql);
                    }
                }else{
                    //get the price of the item 
                    $new_product_price=$this->get_product_price($connection,$type,$weight);
                    if($new_product_price===false){
                        return false;
                    }else{
                        $new_product_price=$new_product_price*$quantity;
                        $sql="UPDATE cart SET price='$new_product_price' WHERE cart_id='$cartid'";
                        $connection->query($sql);                     
                    }
                }
            }
            return true;
        }
    }
    public function viewcart($connection,$User_id){
        //stock manager id
        $stock_manager_id=$this->stock_manager($connection);
        $stock_manager_id=$stock_manager_id[0]['id'];
        
        //select id of all the gasagents who has orders in cart
        $sql="SELECT DISTINCT gasagent_id FROM cart WHERE User_id='$User_id'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            $gasagent=array();
            while($row=$result->fetch_assoc()){
                $gasagent[]=$row['gasagent_id'];
            }
            $cart=array();
            foreach($gasagent as $gas){
                if($gas!=$stock_manager_id){
                    $sql="select sum(c.price) as total,sum(c.quantity) as quantity,g.Shop_name from cart c inner join gasagent g on c.gasagent_id=g.GasAgent_id where c.gasagent_id='$gas' and c.User_id='$User_id'";
                    $result=$connection->query($sql);
                    if($result===false){
                        return false;
                    }else{
                        while($row=$result->fetch_assoc()){
                            //take the time of the last order accrording to the gasagent
                            $sql="SELECT time FROM cart WHERE gasagent_id='$gas' ORDER BY time DESC LIMIT 1";
                            $result=$connection->query($sql);
                            $row1=$result->fetch_assoc();
                            $time=$row1['time'];
                            array_push($cart,['gasagent_id'=>$gas,'total'=>$row['total'],'quantity'=>$row['quantity'],'shop_name'=>$row['Shop_name'],'time'=>$time]);
                        }
                    }
                }else if($gas==$stock_manager_id){
                    $sql="select sum(price) as total,sum(quantity) as quantity from cart where gasagent_id='$gas' and User_id='$User_id'";
                    $result=$connection->query($sql);
                    if($result===false){
                        return false;
                    }else{
                        while($row=$result->fetch_assoc()){
                            //take the time of the last order accrording to the gasagent
                            $sql="SELECT time FROM cart WHERE gasagent_id='$gas' ORDER BY time DESC LIMIT 1";
                            $result=$connection->query($sql);
                            $row1=$result->fetch_assoc();
                            $time=$row1['time'];
                            array_push($cart,['gasagent_id'=>$gas,'total'=>$row['total'],'quantity'=>$row['quantity'],'shop_name'=>'Fago Shop','time'=>$time]);
                        }
                    }
                }
            }
            return $cart;
        }
        
    }
    public function remove($connection,$gasid,$User_id){
        $sql="DELETE FROM cart WHERE gasagent_id='$gasid'";
        $result=$connection->query($sql);
        if($result===false){
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
    }
    public function checkout($connection,$User_id,$gasagent){
        //stock manager id
        $stock_manager_id=$this->stock_manager($connection);
        $stock_manager_id=$stock_manager_id[0]['id'];
        $_SESSION['stock_manager']=$stock_manager_id;

        if($gasagent!=$stock_manager_id){
            $sql="SELECT c.cart_id,c.type,c.weight,c.quantity,c.price,g.Shop_name from cart c inner join gasagent g on c.gasagent_id=g.GasAgent_Id where c.User_id='$User_id' and c.gasagent_id='$gasagent'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $cart=[];
                while($row=$result->fetch_assoc()){
                    array_push($cart,['cart_id'=>$row['cart_id'],'type'=>$row['type'],'weight'=>$row['weight'],'quantity'=>$row['quantity'],'price'=>$row['price'],'shop_name'=>$row['Shop_name'],'gasagent_id'=>$gasagent]);
                }
                //call gas delivery fee function
                $del=$this->gas_delivery_fee($connection,$cart);
                $_SESSION['delivery_fee']=$del;
                return $cart;
            }
        }else{
            $sql="SELECT cart_id,type,weight,quantity,price from cart where User_id='$User_id' and gasagent_id='$gasagent'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $cart=[];
                while($row=$result->fetch_assoc()){
                    array_push($cart,['cart_id'=>$row['cart_id'],'type'=>$row['type'],'weight'=>$row['weight'],'quantity'=>$row['quantity'],'price'=>$row['price'],'shop_name'=>'Fago Shop','gasagent_id'=>$gasagent]);
                }
                //call gas delivery fee function
                $del=$this->fagodelivery_fee($connection,$cart);
                $_SESSION['delivery_fee']=$del;
                return $cart;
            }
        }
    }
    public function deletecartitem($connection,$User_id,$cartid){
        $sql="DELETE FROM cart WHERE cart_id='$cartid'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            return true;
        }
    }
    public function getcartcount($connection,$User_id){
        $sql="SELECT * FROM cart WHERE User_id='$User_id'";
            $result=$connection->query($sql);
            if($result->num_rows > 0){
                $_SESSION['cartcount']=$result->num_rows;
            }else{
                $_SESSION['cartcount']=0;
            }
            return true;
    }

    public function updatecartquantity($connection,$cartid,$quantity,$gasagent){
        $sql="UPDATE cart SET quantity='$quantity' WHERE cart_id='$cartid'";
        $result=$connection->query($sql);
        //update total price
        $sql="SELECT weight,type,cylinder_type FROM cart WHERE cart_id='$cartid';";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
        $weight=$row['weight'];
        $type=$row['type'];
        $cylinder=$row['cylinder_type'];
        
        if($gasagent!=$_SESSION['stock_manager']){
            $price=$this->get_cylinder_price($connection,$type,$weight,$cylinder);

        }else{
            $price=$this->get_product_price($connection,$type,$weight);
        }

        $total=$price*$quantity;
        $sql3="UPDATE cart SET price='$total' WHERE cart_id='$cartid'";
        $result=$connection->query($sql3);
        if($result===false){
            return false;
        }else{
            return true;
        }
    }

    public function gas_delivery_fee($connection,$cart){
        $count=0;
        $delivery_fee=0;
        $gasagent_id=$cart[0]['gasagent_id'];
        $sql="select latitude,longitude from gasagent where GasAgent_Id='$gasagent_id'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            $row=$result->fetch_assoc();
            $latitude=$row['latitude'];
            $longitude=$row['longitude'];
            $clatitude=$_SESSION['cdlatitude'];
            $clongitude=$_SESSION['cdlongitude'];
            $distance=$this->distance($clatitude,$clongitude,$latitude,$longitude,$connection);
        }
        foreach($cart as $c){
            $count=$count+$c['quantity'];
        }
        // print_r($count);
        // die();
        $flag=0;
        foreach($cart as $c){
            $weight=$c['weight'];
            if($weight>12.5){
                $flag=1;
            }
        }
        if($flag==1 || $count>=4){
            $sql="SELECT price FROM delivery_fee WHERE vehicle='Lorry';";
            $result=$connection->query($sql);
            if($result===false){
                print_r("Error1");
                die();
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
        }else if($count>=2 && $count<4){
            $sql="SELECT price from delivery_fee where vehicle='Three Wheel'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
            
        }else if($count==1){
            $sql="SELECT price from delivery_fee where vehicle='Bike'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
        }
        if($distance>1){
            $delivery_fee=$delivery_fee*$distance;
        }else{
            $delivery_fee=$delivery_fee;
        }
        return $delivery_fee;
    }

    public function fagodelivery_fee($connection,$cart){
        $count=0;
        foreach($cart as $c){
            $count=$count+$c['quantity'];
        }
        $flag=0;
        $delivery_fee=0;

        $sql="select latitude,longitude from stock_manager";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            $row=$result->fetch_assoc();
            $latitude=$row['latitude'];
            $longitude=$row['longitude'];
            $clatitude=$_SESSION['cdlatitude'];
            $clongitude=$_SESSION['cdlongitude'];
            $distance=$this->distance($clatitude,$clongitude,$latitude,$longitude,$connection);
        }
        if($count>5){
            $sql="SELECT price FROM delivery_fee WHERE vehicle='Lorry';";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
        }else if($count>2 && $count<=4){
            $sql="SELECT price from delivery_fee where vehicle='Three Wheel'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
            
        }else if($count>=1 && $count<=2){
            $sql="SELECT price from delivery_fee where vehicle='Bike'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $row=$result->fetch_assoc();
                $delivery_fee=$row['price'];
            }
        }
        if($distance>1){
            $delivery_fee=$delivery_fee*$distance;
        }else{
            $delivery_fee=$delivery_fee;
        }
        return $delivery_fee;
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