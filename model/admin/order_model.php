<?php
class order_model
{
    public function vieworder($connection)
    {      
        $sql="SELECT DISTINCT o.Order_id,o.Order_date,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id WHERE o.Order_id=p.Order_Id ORDER BY o.Order_id DESC";
        $result = mysqli_query($connection, $sql);
        $order = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $order[] = $row;
            }
            return $order;
        } else {
            return $order;
        }
    }


    public function view_gasorder($connection,$order_id){
        $sql = "SELECT o.Order_id,o.Order_date,o.Time,o.Amount,o.Delivery_Status,o.DeliveryPerson_Id,o.Delivery_fee,o.Order_Status,o.Delivery_Method,u.First_Name,u.Last_Name,u.City,u.Street,u.Postalcode,g.Shop_name,p.GasAgent_Id,p.Customer_Id from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id INNER JOIN `gasagent` g ON p.GasAgent_Id=g.GasAgent_Id WHERE o.Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $order=[];
            while($row=$result->fetch_object()){
                array_push($order,['Order_id'=>$row->Order_id,'Order_date'=>$row->Order_date,'Time'=>$row->Time,'Amount'=>$row->Amount,'Order_Status'=>$row->Order_Status,'Delivery_Status'=>$row->Delivery_Status,'Shop_name'=>$row->Shop_name,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'GasAgent_Id'=>$row->GasAgent_Id,'Customer_Id'=>$row->Customer_Id,'Delivery_fee'=>$row->Delivery_fee,'DeliveryPerson_Id'=>$row->DeliveryPerson_Id,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Delivery_Method'=>$row->Delivery_Method]);
            }
            return $order;
        }
    }

    public function view_gasbill($connection,$order_id)
    {      
        $sql="SELECT p.Quantity,p.Price,g.Weight,c.company_name from `placeorder` p INNER JOIN `gascylinder` g ON p.Cylinder_Id=g.Cylinder_Id INNER JOIN `gas_company` c ON g.Type=c.company_id WHERE p.Order_Id='$order_id'";
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

    public function viewfago_order($connection)
    {      
        $sql="SELECT DISTINCT o.Order_id,o.Order_date,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id WHERE o.Order_id=p.Order_id ORDER BY o.Order_id DESC";
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

    public function fago_orderview($connection,$order_id){
        $sql = "SELECT o.Order_id,o.Order_date,o.Time,o.Amount,o.Delivery_Status,o.DeliveryPerson_Id,o.Delivery_fee,o.Order_Status,o.Delivery_Method,u.First_Name,u.Last_Name,u.City,u.Street,u.Postalcode,p.Customer_Id from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_id INNER JOIN `user` u ON p.Customer_Id=u.User_id WHERE o.Order_id='$order_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $order=[];
            while($row=$result->fetch_object()){
                array_push($order,['Order_id'=>$row->Order_id,'Order_date'=>$row->Order_date,'Time'=>$row->Time,'Amount'=>$row->Amount,'Order_Status'=>$row->Order_Status,'Delivery_Status'=>$row->Delivery_Status,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'Customer_Id'=>$row->Customer_Id,'Delivery_fee'=>$row->Delivery_fee,'DeliveryPerson_Id'=>$row->DeliveryPerson_Id,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Delivery_Method'=>$row->Delivery_Method]);
            }
            return $order;
        }
    }

    public function view_fagobill($connection,$order_id)
    {      
        $sql="SELECT s.Quantity,s.Price,s.Product_id,p.Name from `shop_placeorder` s INNER JOIN `product` p ON s.Product_id=p.Item_code  WHERE s.Order_id='$order_id'";
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

    public function search_order($connection,$name){
        $sql="SELECT DISTINCT o.Order_id,o.Order_date,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id WHERE o.Order_id=p.Order_Id AND o.Order_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $order=[];
            while($row=mysqli_fetch_assoc($result)){
                $order[]=$row;
            }
            
            return $order;
        }else{
            return false;
        }
    }

    public function search_fagoorder($connection,$name){
        $sql="SELECT DISTINCT o.Order_id,o.Order_date,o.Amount,o.Delivery_Status,u.First_Name,u.Last_Name from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id WHERE o.Order_id=p.Order_id AND o.Order_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $order=[];
            while($row=mysqli_fetch_assoc($result)){
                $order[]=$row;
            }
            
            return $order;
        }else{
            return false;
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

}
?>

