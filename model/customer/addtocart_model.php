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
                    array_push($cart,['cart_id'=>$row['cart_id'],'type'=>$row['type'],'weight'=>$row['weight'],'quantity'=>$row['quantity'],'price'=>$row['price'],'shop_name'=>$row['Shop_name']]);
                }
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
                    array_push($cart,['cart_id'=>$row['cart_id'],'type'=>$row['type'],'weight'=>$row['weight'],'quantity'=>$row['quantity'],'price'=>$row['price'],'shop_name'=>'Fago Shop']);
                }
                return $cart;
            }
        }
    }
}