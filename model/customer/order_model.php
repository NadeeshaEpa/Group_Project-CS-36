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
        $sql="SELECT distinct o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.GasAgent_Id=u.User_id WHERE p.Customer_Id='$user_id' and o.Order_Status=1 group by order_id order by o.order_id desc LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'Time'=>$row->Time,'Order_date'=>$row->Order_date]);
            }
            return $orders;
        }
    }
    public function view_fagoOrders($connection,$userid,$limit,$offset){
        $sql="SELECT distinct o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id WHERE p.Customer_Id='$userid' and o.Order_Status=1 group by order_id order by o.order_id desc LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'Time'=>$row->Time,'Order_date'=>$row->Order_date]);
            }
            return $orders;
        }
    }
    public function set_order_details($connection,$order_id,$order_data){
        $order_items=[];
        $sql="select Cylinder_Id,cylinder_type,GasAgent_Id,Quantity,price from `placeorder` WHERE Order_Id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            while($row=$result->fetch_object()){
            //get the gas agent name
                $gasagent=$row->GasAgent_Id;
                $gasagent_name=$this->get_gasagent_name($connection,$gasagent);
            //get the cylinder details
                $cylinder_id=$row->Cylinder_Id;
                $cylinder_details=$this->get_cylinder_details($connection,$cylinder_id);
                //get the cylinder type
                $cylinder_type=$row->cylinder_type;
                if($cylinder_type=="old"){
                    $order_type="Refill";
                }else{
                    $order_type="New Cylinder";
                }
                $quantity=$row->Quantity;
                $price=$row->price;
                array_push($order_items,['GasAgent_Name'=>$gasagent_name,'Order_Type'=>"$order_type",'Quantity'=>$quantity,'Price'=>$price,'Cylinder_details'=>$cylinder_details]);
            }
        }
        //get all the details in one array
        $order_details=[];
        array_push($order_details,['Order_data'=>$order_data,'Order_items'=>$order_items]);
        return $order_details;       
    }
    public function viewOrderDetails($connection,$order_id,$userid){
        $sql="select Delivery_Method from `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery_method=$result->fetch_object()->Delivery_Method;
        }
        if($delivery_method=="Reserve"){
            $sql="Select Amount,time,order_date from `order` WHERE Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
               $order_data=[];
               $row=$result->fetch_object();
               array_push($order_data,['order_id'=>$order_id,'Amount'=>$row->Amount,'Time'=>$row->time,'Order_date'=>$row->order_date,'Delivery_person'=>"Not Assigned",'Delivery_fee'=>"Rs.0"]);

               $order_details=$this->set_order_details($connection,$order_id,$order_data);
               return $order_details;
            }
        }else{
            $sql="Select Amount,time,order_date,DeliveryPerson_Id,Delivery_fee from `order` WHERE Order_id='$order_id'";  
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $order_data=[];
                $row=$result->fetch_object();

                $delivery_id=$row->DeliveryPerson_Id;
                $delivery_person_name=$this->get_gasagent_name($connection,$delivery_id);

                array_push($order_data,['order_id'=>$order_id,'Amount'=>$row->Amount,'Time'=>$row->time,'Order_date'=>$row->order_date,'Delivery_person'=>$delivery_person_name,'Delivery_fee'=>"Rs.".$row->Delivery_fee]);
                
                $order_details=$this->set_order_details($connection,$order_id,$order_data);
                return $order_details;
                    
            }

        }
    }
    public function order_count($connection,$userid){
        $sql="Select distinct p.order_id from `placeorder` p inner join `order` o ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$userid' and o.order_status=1";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return 0;
        }else{
            return $result->num_rows;
        }
    }
    public function fago_order_count($connection,$userid){
        $sql="Select distinct p.order_id from `shop_placeorder` p inner join `order` o ON o.Order_id=p.Order_Id where p.Customer_Id='$userid' and o.order_status=1";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return 0;
        }else{
            return $result->num_rows;
        }
    }
    public function get_gasagent_name($connection,$gasagent){
        $sql="Select First_Name,Last_Name from `user` WHERE User_id='$gasagent'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->First_Name." ".$row->Last_Name;
        }
    }
    public function get_cylinder_details($connection,$cylinder_id){
        $sql="select c.company_name,g.weight from gascylinder g inner join gas_company c on c.company_id=g.Type where g.cylinder_id='$cylinder_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->company_name." ".$row->weight."kg";
        }
    }
    public function view_fagoOrderDetails($connection,$order_id,$userid){
        $sql="select Delivery_Method from `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery_method=$result->fetch_object()->Delivery_Method;
        }
        if($delivery_method=="Reserve" || $delivery_method=="Courier service"){
            $sql="Select Amount,time,order_date from `order` WHERE Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
               $order_data=[];
               $row=$result->fetch_object();
               if($delivery_method=="Reserve"){
                    array_push($order_data,['order_id'=>$order_id,'Amount'=>$row->Amount,'Time'=>$row->time,'Order_date'=>$row->order_date,'Delivery_person'=>"Not Assigned",'Delivery_fee'=>"Rs.0"]);
               }else{
                    array_push($order_data,['order_id'=>$order_id,'Amount'=>$row->Amount,'Time'=>$row->time,'Order_date'=>$row->order_date,'Delivery_person'=>"Courier Service",'Delivery_fee'=>"Will be notified by the courier service"]);
               }
               $order_details=$this->set_fagoorder_details($connection,$order_id,$order_data);
               return $order_details;
            }
        }else{
            $sql="Select Amount,time,order_date,DeliveryPerson_Id,Delivery_fee from `order` WHERE Order_id='$order_id'";  
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $order_data=[];
                $row=$result->fetch_object();

                $delivery_id=$row->DeliveryPerson_Id;
                $delivery_person_name=$this->get_gasagent_name($connection,$delivery_id);

                array_push($order_data,['order_id'=>$order_id,'Amount'=>$row->Amount,'Time'=>$row->time,'Order_date'=>$row->order_date,'Delivery_person'=>$delivery_person_name,'Delivery_fee'=>"Rs.".$row->Delivery_fee]);

                $order_details=$this->set_fagoorder_details($connection,$order_id,$order_data);

                return $order_details;
                    
            }

        }
    }
    public function set_fagoorder_details($connection,$order_id,$order_data){
        $order_items=[];
        $sql="select Product_Id,StockManager_id,Quantity,price from `shop_placeorder` WHERE Order_Id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            while($row=$result->fetch_object()){
            //get the stock manager name
                $sm=$row->StockManager_id;
                $sm_name=$this->get_gasagent_name($connection,$sm);
            //get the cylinder details
                $Product_Id=$row->Product_Id;
                $product_details=$this->get_product_details($connection,$Product_Id);
                
                $quantity=$row->Quantity;
                $price=$row->price;
                array_push($order_items,['StockManager_Name'=>$sm_name,'Quantity'=>$quantity,'Price'=>$price,'Product_details'=>$product_details]);
            }
        }
        //get all the details in one array
        $order_details=[];
        array_push($order_details,['Order_data'=>$order_data,'Order_items'=>$order_items]);
        return $order_details;       
    }
    public function get_product_details($connection,$Product_Id){
        $sql="select name,product_type from product where Item_code=$Product_Id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->name." ".$row->product_type;
        }
    }
    public function cancelOrder($connection,$order_id){
        $sql="select GasAgent_Id from `placeorder` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            //get the gas agent id
            $gasagent_id=$result->fetch_object()->GasAgent_Id;

            //make Order_status=2 in order table
            $sql="update `order` set Order_status=2 where Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }
            //get the qunatity of the each gas cylinder in the order
            $data="select Cylinder_id,Quantity from `placeorder` WHERE Order_id='$order_id'";
            $gasdetails=$connection->query($data);
            if($gasdetails->num_rows===0){
                return false;
            }else{
                while($row=$gasdetails->fetch_object()){
                    $cylinder_id=$row->Cylinder_id;
                    $quantity=$row->Quantity;
                    //get the current quantity of the gas cylinder
                    $sql="update sell_gas set Quantity=Quantity+$quantity where Cylinder_id='$cylinder_id' and GasAgent_Id='$gasagent_id'";
                    $result=$connection->query($sql);
                    if($result===false){
                        return false;
                    }
                }
            }
            //delete from payment table
            $sql="delete from payment where Order_id='$order_id'";
            $result=$connection->query($sql);
            if($result===false){
                return false;
            }
            return true;
        }
    }
    public function cancelShopOrder($connection,$order_id){
        //make Order_status=2 in order table
        $sql="update `order` set Order_status=2 where Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }
        //get the qunatity of the each gas cylinder in the order
        $data="select Product_id,Quantity from `shop_placeorder` WHERE Order_id='$order_id'";
        $gasdetails=$connection->query($data);
        if($gasdetails->num_rows===0){
            return false;
        }else{
            while($row=$gasdetails->fetch_object()){
                $Product_Id=$row->Product_id;
                $quantity=$row->Quantity;
                //get the current quantity of the gas cylinder
                $sql="update product set Quantity=Quantity+$quantity where Item_code='$Product_Id'";
                $result=$connection->query($sql);
                if($result===false){
                    return false;
                }
            }
        }
        return true;
    }
    public function getChargeId($connection,$order_id){
        $sql="select Charge_id from `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $charge_id=$result->fetch_object()->Charge_id;
            return $charge_id;
        }
    }
    public function getTotalAmount($connection,$order_id){
        $sql="select Delivery_fee,Amount from `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            $delivery_fee=$row->Delivery_fee;
            $amount=$row->Amount;
            $total_amount=$delivery_fee+$amount;
            return $total_amount;
        }
    }
    public function getUserEmail($connection,$order_id,$shop){
        if($shop=="gas"){
            $sql="select Customer_Id from `placeorder` WHERE Order_Id='$order_id'";
        }else{
            $sql="select Customer_Id from `shop_placeorder` WHERE Order_Id='$order_id'";
        }
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $user_id=$result->fetch_object()->Customer_Id;
            $sql="select Email from user WHERE User_id='$user_id'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $email=$result->fetch_object()->Email;
                return $email;
            }
        }
    }
    
}