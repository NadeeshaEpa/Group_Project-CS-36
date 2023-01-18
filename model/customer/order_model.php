<?php
class order_model{
    public function viewOrders($connection,$user_id){
        $sql="SELECT o.Order_id,o.Delivery_Method,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.GasAgent_Id=u.User_id WHERE p.Customer_Id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $orders=[];
            while($row=$result->fetch_object()){
                array_push($orders,['Order_id'=>$row->Order_id,'Delivery_Method'=>$row->Delivery_Method,'Amount'=>$row->Amount,'Delivery_Status'=>$row->Delivery_Status,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name]);
            }
            return $orders;
        }
    }
    public function viewOrderDetails($connection,$order_id,$user_id){
        //find delivery person id for the order
        $sql="SELECT DeliveryPerson_Id FROM `order` WHERE Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
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
    public function getweight($connection,$type){
        //store weight according to the Cylinder_Id
        $sql="SELECT g.Cylinder_Id,g.Weight FROM `gascylinder` g inner join `gas_company` c on g.Type=c.company_id WHERE c.company_name='$type'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $weight=[];
            while($row=$result->fetch_object()){
                array_push($weight,['Weight'=>$row->Weight]);
            }
            //sort the array according to the weight in descending order get the highetq weight into the 0 th index
            for($i=0;$i<count($weight);$i++){
                for($j=$i+1;$j<count($weight);$j++){
                    if($weight[$i]['Weight']<$weight[$j]['Weight']){
                        $temp=$weight[$i];
                        $weight[$i]=$weight[$j];
                        $weight[$j]=$temp;
                    }
                }
            }
            // print_r($weight);
            // die();
            return $weight;
        }
    }

    public function getshopnames($connection,$type){
        $sql="SELECT g.Shop_name FROM `gasagent`g inner join `gas_company` c on g.Gas_Type=c.company_id WHERE c.company_name='$type'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $shopnames=[];
            while($row=$result->fetch_object()){
                array_push($shopnames,['Shop_name'=>$row->Shop_name]);
            }
            // print_r($shopnames);
            // die();
            return $shopnames;
        }
    }
    public function viewLitro($connection,$weight,$type){
        $sql="Select DISTINCT g.GasAgent_Id from `gasagent` g INNER JOIN `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id INNER JOIN `gas_company` c on g.Gas_Type=c.company_id WHERE c.company_name='$type';";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagents=[];
            while($row=$result->fetch_object()){
                array_push($gasagents,['GasAgent_Id'=>$row->GasAgent_Id]);
            }
            $gas=[];
            foreach($gasagents as $gasagent){
                $gasagent_id=$gasagent['GasAgent_Id'];
                $sql="SELECT g.GasAgent_Id,g.Shop_name,s.Cylinder_Id,s.Quantity,c.Weight FROM `gasagent` g INNER JOIN `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id INNER JOIN `gascylinder` c on s.Cylinder_Id=c.Cylinder_Id  inner join `gas_company` co on c.Type=co.company_id WHERE g.GasAgent_Id='$gasagent_id' AND co.company_name='$type' ORDER BY c.Weight DESC";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    while($row=$result->fetch_object()){
                        array_push($gas,['GasAgent_Id'=>$row->GasAgent_Id,'Shop_name'=>$row->Shop_name,'Cylinder_Id'=>$row->Cylinder_Id,'Quantity'=>$row->Quantity,'Weight'=>$row->Weight]);
                    }
                }
            }
            // foreach($gas as $gas1){
            //     print_r($gas1);
            //     echo "<br>";
            // }
            // die();
            return $gas;            
        }
    }
    public function viewLaugh($connection,$weight){
        $sql="Select DISTINCT g.GasAgent_Id from `gasagent` g INNER JOIN `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id INNER JOIN `gascylinder` c on s.Cylinder_Id=c.Cylinder_Id WHERE c.Type='Laugh';";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagents=[];
            while($row=$result->fetch_object()){
                array_push($gasagents,['GasAgent_Id'=>$row->GasAgent_Id]);
            }
            $gas=[];
            foreach($gasagents as $gasagent){
                $gasagent_id=$gasagent['GasAgent_Id'];
                $sql="SELECT g.GasAgent_Id,g.Shop_name,s.Cylinder_Id,s.Quantity from `gasagent` g inner join `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id inner join `gascylinder` c on c.Cylinder_Id=s.Cylinder_Id  WHERE g.GasAgent_Id='$gasagent_id' AND c.Type='Laugh'";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    while($row=$result->fetch_object()){
                        array_push($gas,['GasAgent_Id'=>$row->GasAgent_Id,'Shop_name'=>$row->Shop_name,'Cylinder_Id'=>$row->Cylinder_Id,'Quantity'=>$row->Quantity]);
                    }
                }
            }
            return $gas;            
        }
    }
        
}