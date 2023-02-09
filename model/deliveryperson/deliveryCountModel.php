<?php
class delivery_count{
   private $User_id;

   public function getDeliveryCount($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT COUNT(*) FROM `order` WHERE   (Delivery_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;

   }

   public function getTotalFee($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT SUM(Delivery_fee) FROM `order` WHERE  (Delivery_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
   }




}