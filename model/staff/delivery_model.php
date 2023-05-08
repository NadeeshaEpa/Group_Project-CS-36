<?php
class delivery_model
{
    public function viewdelivery($connection)
    {      
        $sql="SELECT o.Order_id,o.Order_date,o.Delivery_Status,u.First_Name,u.Last_Name,o.DeliveryPerson_Id,i.imgname from `order` o INNER JOIN `user` u ON o.DeliveryPerson_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.Delivery_Status='1' OR o.Delivery_Status='0' ORDER BY o.Order_id DESC";
        $result = mysqli_query($connection, $sql);
        $delivery = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $delivery[] = $row;
            }
            // print_r($delivery);
            return $delivery;
        } else {
            return $delivery;
        }
    }

    public function viewdeliveryrequest($connection)
    {      
        $sql="SELECT o.Order_id,o.Order_date,o.Time,u.First_Name,u.Last_Name,p.Customer_Id,i.imgname from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_id INNER JOIN `user` u ON P.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.DeliveryPerson_Id IS NULL UNION SELECT o.Order_id,o.Order_date,o.Time,u.First_Name,u.Last_Name,p.Customer_Id,i.imgname from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id INNER JOIN `user` u ON P.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.DeliveryPerson_Id IS NULL";
        $result = mysqli_query($connection, $sql);
        $delivery = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $delivery[] = $row;
            }
            // print_r($delivery);
            return $delivery;
        } else {
            return $delivery;
        }
    }

    public function check_ordertype($connection,$order_id)
    {     
        $sql="SELECT Order_Id FROM `placeorder` WHERE Order_Id='$order_id' ";
        $result = mysqli_query($connection, $sql);
        if($result->num_rows===0){
            return false;
        } else {
            return true;
        }
        
    }

    public function search_delivery($connection,$name){
        $sql="SELECT o.Order_id,o.Order_date,o.Delivery_Status,u.First_Name,u.Last_Name,o.DeliveryPerson_Id,i.imgname from `order` o INNER JOIN `user` u ON o.DeliveryPerson_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.Order_id='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $delivery=[];
            while($row=mysqli_fetch_assoc($result)){
                $delivery[]=$row;
            }
            
            return $delivery;
        }else{
            return false;
        }
    }

    public function search_deliveryrequest($connection,$name){
        $sql="SELECT o.Order_id,o.Order_date,o.Time,u.First_Name,u.Last_Name,p.Customer_Id,i.imgname from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_id INNER JOIN `user` u ON P.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.DeliveryPerson_Id IS NULL AND o.Order_id='$name'  UNION SELECT o.Order_id,o.Order_date,o.Time,u.First_Name,u.Last_Name,p.Customer_Id,i.imgname from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id INNER JOIN `user` u ON P.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Method='Delivered by agent' AND o.DeliveryPerson_Id IS NULL AND o.Order_id='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $delivery=[];
            while($row=mysqli_fetch_assoc($result)){
                $delivery[]=$row;
            }
            
            return $delivery;
        }else{
            return false;
        }
    }

}



?>
<!-- SELECT CASE WHEN  Order_Id='$order_id' THEN TRUE ELSE FALSE END AS ordertype FROM `placeorder`  -->