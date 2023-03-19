<?php
class delivery_count{
   private $User_id;

   public function getDeliveryCount($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT COUNT(*) FROM `order` o INNER JOIN shop_placeorder p on p.Order_Id=o.Order_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Order_date = DATE(NOW()))";
=======
        $sql="SELECT COUNT(*) FROM `order` o INNER JOIN placeorder p on p.Order_Id=o.Order_id WHERE (o.Delivery_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date = DATE(NOW()))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;

   }

   public function getTotalFee($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT SUM(o.Amount) FROM `order` o INNER JOIN shop_placeorder p on p.Order_Id=o.Order_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Order_date = DATE(NOW()))";
=======
        $sql="SELECT SUM(o.Amount) FROM `order` o INNER JOIN placeorder p on p.Order_Id=o.Order_id WHERE (o.Delivery_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date = DATE(NOW()))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result = mysqli_query($connection,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
   }




}