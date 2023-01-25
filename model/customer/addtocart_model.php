<?php
class addtocart_model{
    public function addtocart($connection,$User_id,$gasid,$weight,$quantity,$total,$type){
        $sql="INSERT INTO cart(User_id,gasagent_id,type,weight,quantity,price) VALUES('$User_id','$gasid','$type','$weight','$quantity','$total')";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
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
    public function viewcart($connection,$User_id){
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
                $sql="select sum(c.price) as total,sum(c.quantity) as quantity,g.Shop_name from cart c inner join gasagent g on c.gasagent_id=g.GasAgent_id where c.gasagent_id='$gas' and c.User_id='$User_id'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }else{
                    while($row=$result->fetch_assoc()){
                        //take the current time
                        $time=date("Y-m-d H:i:s");
                        array_push($cart,['gasagent_id'=>$gas,'total'=>$row['total'],'quantity'=>$row['quantity'],'shop_name'=>$row['Shop_name'],'time'=>$time]);
                    }
                }
            }
            return $cart;
        }
        
    }
    public function remove($connection,$gasid){
        $sql="DELETE FROM cart WHERE gasagent_id='$gasid'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            return true;
        }
    }
}