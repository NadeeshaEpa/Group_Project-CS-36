<?php
class Dashboard{
   private $UserId;


    public function update_as_a_active($connection){
        $this->UserId=$_SESSION['User_id'];
        $sql="UPDATE deliverypersonavailable SET Available_State=1 WHERE  DeliveryPerson_Id=$this->UserId";
        
        if($connection->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }


    public function update_as_a_not_active($connection){
        $this->UserId=$_SESSION['User_id'];
        $sql="UPDATE deliverypersonavailable SET Available_State=0 WHERE  DeliveryPerson_Id=$this->UserId";
        if($connection->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

     /*vertyfy the pin */
     public function Check_the_pin($connection,$order_id,$pin){
        $sql="SELECT reserve_pin FROM `order` WHERE Order_id=$order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $pin_data=mysqli_fetch_assoc($result);
           
            if($pin_data['reserve_pin']==$pin){
                $sql2="UPDATE `order` SET Delivery_Status=1,Delivery_date=CURRENT_DATE,Delivery_time=CURRENT_TIME WHERE Order_id=$order_id";
                $result2=$connection->query($sql2);

                if($result2){
                    $_SESSION['picked']='Customer picked vertify';
                    return true;
                }
                else{
                    return false;
                }
               
            }
            else{
                $_SESSION['pin_wrong']='Pin is wrong';
                return false;
            }
        }


    }

    public function Check_the__gas_pin($connection,$order_id,$pin){
        $sql="SELECT GasAgent_pin FROM `order` WHERE Order_id=$order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $pin_data=mysqli_fetch_assoc($result);
           
            if($pin_data['GasAgent_pin']==$pin){
                $sql2="UPDATE `order` SET Delivery_Status=1,Delivery_date=CURRENT_DATE,Delivery_time=CURRENT_TIME WHERE Order_id=$order_id";
                $result2=$connection->query($sql2);

                if($result2){
                    // $_SESSION['picked']='Gas agent picked vertify';
                    return true;
                }
                else{
                    return false;
                }
               
            }
            else{
                $_SESSION['pin_wrong']='Pin is wrong';
                return false;
            }
        }


    }

    /*get payment details*/
    public function Get_payment_detalis($connection){
    $this->UserId=$_SESSION['User_id'];
        $sql="SELECT o.Order_id, o.Delivery_date, o.Delivery_time, o.Delivery_fee,pay.Paid  FROM `order` o INNER JOIN payment pay ON o.Order_id=pay.Order_Id WHERE o.Order_Status=1 && o.Delivery_Status=1 && pay.User_Id=$this->UserId && o.DeliveryPerson_Id=$this->UserId && o.Delivery_Method='Delivered by agent' order by o.Delivery_date DESC";
       
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            
            return false;
            
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Paid'=>$row['Paid']]);
            }
        }
        return $answer;

}

}