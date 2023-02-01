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

}