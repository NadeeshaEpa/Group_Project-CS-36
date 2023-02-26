<?php
class delivery_count{
   private $User_id;

   public function getDeliveryCount($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT COUNT(*) FROM `order` o INNER JOIN placeorder p on p.Order_Id=o.Order_id WHERE (o.Delivery_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date = DATE(NOW()))";
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;

   }

   public function getTotalFee($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT SUM(o.Amount) FROM `order` o INNER JOIN placeorder p on p.Order_Id=o.Order_id WHERE (o.Delivery_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date = DATE(NOW()))";
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
   }




}