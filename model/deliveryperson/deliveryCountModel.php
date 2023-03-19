<?php
class delivery_count{
   private $User_id;

   public function getDeliveryCount($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT COUNT(*) FROM `order` WHERE   (Delivery_Status=2 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
=======
        $sql="SELECT COUNT(*) FROM `order` WHERE   (Delivery_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;

   }

   public function getTotalFee($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT SUM(Delivery_fee) FROM `order` WHERE  (Delivery_Status=2 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
=======
        $sql="SELECT SUM(Delivery_fee) FROM `order` WHERE  (Delivery_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
   }




}