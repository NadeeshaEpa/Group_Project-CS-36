<?php
class order_model
{
    public function vieworder($connection)
    {      
        $sql="SELECT o.Order_id,o.Order_date,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id";
        $result = mysqli_query($connection, $sql);
        $order = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $order[] = $row;
            }
            // print_r($order);
            return $order;
        } else {
            return $order;
        }
    }
}