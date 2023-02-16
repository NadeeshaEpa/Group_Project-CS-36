<?php
class addtocart_model{
    public function addtocart($connection,$User_id,$gasid,$weight,$quantity,$total,$type){
        $sql="INSERT INTO cart(User_id,gasagent_id,type,weight,quantity,price) VALUES('$User_id','$gasid','$type','$weight','$quantity','$total')";
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

        if($gasagent!=$stock_manager_id){
            $sql="SELECT c.cart_id,c.type,c.weight,c.quantity,c.price,g.Shop_name from cart c inner join gasagent g on c.gasagent_id=g.GasAgent_Id where c.User_id='$User_id' and c.gasagent_id='$gasagent'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }else{
                $cart=array();
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
                $cart=array();
                while($row=$result->fetch_assoc()){
                    array_push($cart,['cart_id'=>$row['cart_id'],'type'=>$row['type'],'weight'=>$row['weight'],'quantity'=>$row['quantity'],'price'=>$row['price'],'shop_name'=>'Fago Shop','gasagent_id'=>$gasagent]);
                }
                //call gas delivery fee function
                $del=$this->gas_fagodelivery_fee($connection,$cart);
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
    public function gas_delivery_fee($connection,$cart){
        $weight=[];
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
            $distance=$this->distance($_SESSION['User_id'],$latitude,$longitude,$connection);
        }
        foreach($cart as $c){
            array_push($weight,$c['weight']);
        }
        $weight=array_unique($weight);
        $count=count($weight);
        $flag=0;
        foreach($cart as $c){
            $weight=$c['weight'];
            if($weight>12.5){
                $flag=1;
            }
            if($flag==1 || $count>=4){
                $sql="SELECT price from delivery_fee where vehicle='Lorry";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
            }else if($count>=2 && $count<4){
                $sql="SELECT price from delivery_fee where vehicle='Three Wheel'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
                
            }else{
                $sql="SELECT price from delivery_fee where vehicle='Bike'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
            }
        }
        if($distance>1){
            $delivery_fee=$delivery_fee*$distance;
        }else{
            $delivery_fee=$delivery_fee;
        }
        return $delivery_fee;
    }

    public function gas_fagodelivery_fee($connection,$cart){
        $weight=[];
        foreach($cart as $c){
            array_push($weight,$c['weight']);
        }
        $weight=array_unique($weight);
        $count=count($weight);
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
            $distance=$this->distance($_SESSION['User_id'],$latitude,$longitude,$connection);
        }

        foreach($cart as $c){
            if($count>4){
                $sql="SELECT price from delivery_fee where vehicle='Lorry";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
            }else if($count>=2 && $count<4){
                $sql="SELECT price from delivery_fee where vehicle='Three Wheel'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
                
            }else{
                $sql="SELECT price from delivery_fee where vehicle='Bike'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    $row=$result->fetch_assoc();
                    $delivery_fee=$delivery_fee+$row['price'];
                }
            }
        }
        if($distance>1){
            $delivery_fee=$delivery_fee*$distance;
        }else{
            $delivery_fee=$delivery_fee;
        }
        return $delivery_fee;
    }

    public function distance($userid,$latitude,$longitude,$connection){
        $sql="Select latitude,longitude from `customer` where Customer_Id='$userid'";
        $id=$connection->query($sql);
        $row=$id->fetch_object();
        $lat1=$row->latitude;
        $lng1=$row->longitude;
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