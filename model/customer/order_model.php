<?php
class order_model{
    public function stock_manager($connection){
        $sql="Select id from stock_manager";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['id'=>$row['id']]);
            }
        }
        return $answer[0]['id'];
    }
    public function viewOrders($connection,$user_id,$limit,$offset){
        $sql="SELECT o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.GasAgent_Id=u.User_id WHERE p.Customer_Id='$user_id' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'Time'=>$row->Time]);
            }
            //sort the array where the latest order is at the top
            $orders=array_reverse($orders);
            return $orders;
        }
    }
    public function view_fagoOrders($connection,$userid,$limit,$offset){
        $sql="SELECT o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id WHERE p.Customer_Id='$userid' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'Time'=>$row->Time]);
            }
            //sort the array where the latest order is at the top
            $orders=array_reverse($orders);
            return $orders;
        }
    }
    public function viewOrderDetails($connection,$order_id,$user_id){
        //find delivery person id for the order
        $sql="SELECT DeliveryPerson_Id FROM `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            $delivery_person="Not Assigned";
            $sql="SELECT o.Amount,o.Delivery_fee,o.Delivery_date,o.Delivery_time,o.Order_date,o.Time from `order` o WHERE o.Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $orderdetails=[];
                $row=$result->fetch_object();
                array_push($orderdetails,['Amount'=>$row->Amount,'Delivery_fee'=>$row->Delivery_fee,'Delivery_date'=>$row->Delivery_date,'Delivery_time'=>$row->Delivery_time,'Order_date'=>$row->Order_date,'Time'=>$row->Time]);
                $sql="Select First_Name,Last_Name,City,Street,Postalcode from `user` WHERE User_id='$user_id'";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    $row=$result->fetch_object();
                    array_push($orderdetails,['CFirst_Name'=>$row->First_Name,'CLast_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode]);
                    array_push($orderdetails,['Order_id'=>$order_id]);
                    print_r($orderdetails);
                    return $orderdetails;
                }
            }
        }else{
            $row=$result->fetch_object();
            $dpid=$row->DeliveryPerson_Id;
            $sql="SELECT o.Amount,o.Delivery_fee,u.First_Name,u.Last_Name,o.Delivery_date,o.Delivery_time,o.Order_date,o.Time from `order` o INNER JOIN `user` u ON u.User_id=o.DeliveryPerson_Id WHERE u.User_id='$dpid' AND o.Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $orderdetails=[];
                $row=$result->fetch_object();
                array_push($orderdetails,['Amount'=>$row->Amount,'Delivery_fee'=>$row->Delivery_fee,'DFirst_Name'=>$row->First_Name,'DLast_Name'=>$row->Last_Name,'Delivery_date'=>$row->Delivery_date,'Delivery_time'=>$row->Delivery_time,'Order_date'=>$row->Order_date,'Time'=>$row->Time]);
                $sql="Select First_Name,Last_Name,City,Street,Postalcode from `user` WHERE User_id='$user_id'";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    $row=$result->fetch_object();
                    array_push($orderdetails,['CFirst_Name'=>$row->First_Name,'CLast_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode]);
                    array_push($orderdetails,['Order_id'=>$order_id]);
                    return $orderdetails;
                }
            }
        }
    }
    public function order_count($connection,$userid){
        $sql="Select * from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return 0;
        }else{
            return $result->num_rows;
        }
    }
    public function fago_order_count($connection,$userid){
        $sql="Select * from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return 0;
        }else{
            return $result->num_rows;
        }
    }
}