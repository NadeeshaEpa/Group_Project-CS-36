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
        $sql="SELECT distinct o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.GasAgent_Id=u.User_id WHERE p.Customer_Id='$user_id' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'Time'=>$row->Time]);
            }
            //sort the array such as the latest order is at the top
            usort($orders,function($a,$b){
                return $a['Order_id']<$b['Order_id'];
            });
            return $orders;
        }
    }
    public function view_fagoOrders($connection,$userid,$limit,$offset){
        $sql="SELECT distinct o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,o.Time,o.Order_date from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id WHERE p.Customer_Id='$userid' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'Time'=>$row->Time]);
            }
            //sort the array where the latest order id is at the top
            usort($orders,function($a,$b){
                return $a['Order_id']<$b['Order_id'];
            });
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
}