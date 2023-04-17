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

}