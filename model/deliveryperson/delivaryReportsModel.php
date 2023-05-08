<?php
class reports{
    private $User_id;
    public function GasDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE ((o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date = DATE(NOW()))) Group by o.Order_id";
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
       

    }

    public function GasDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        

    }

    public function GasDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];

        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
               
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function GasAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) Group by o.Order_id";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function CusDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS G_Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As G_Address,concat(spu.First_Name,' ',spu.Last_Name)AS S_Name,concat(spu.Postalcode,' , ',spu.Street,' , ' ,spu.City)As S_Address FROM `order`o LEFT JOIN placeorder p on p.Order_id=o.Order_id LEFT JOIN user u on u.User_id=p.Customer_Id LEFT JOIN shop_placeorder sp on sp.Order_id=o.Order_id LEFT JOIN user spu on spu.User_id=sp.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1)&& (o.Delivery_date = DATE(NOW())) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                if (isset($row['G_Name'])  && !empty($row['G_Name'])){
                    $Name=$row['G_Name'];
                    
                }
                if (isset($row['G_Address'])  && !empty($row['G_Address'])){
                    $Address=$row['G_Address'];
                }
                if (isset($row['S_Name'])  && !empty($row['S_Name'])){
                    $Name=$row['S_Name'];
                    
                }
                if (isset($row['S_Address'])  && !empty($row['S_Address'])){
                    $Address=$row['S_Address'];
                }
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$Name,'Address'=>$Address]);
            }
            return $answer;
        }
        
    }

    public function CusDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS G_Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As G_Address,concat(spu.First_Name,' ',spu.Last_Name)AS S_Name,concat(spu.Postalcode,' , ',spu.Street,' , ' ,spu.City)As S_Address FROM `order`o LEFT JOIN placeorder p on p.Order_id=o.Order_id LEFT JOIN user u on u.User_id=p.Customer_Id LEFT JOIN shop_placeorder sp on sp.Order_id=o.Order_id LEFT JOIN user spu on spu.User_id=sp.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1)&& (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                if (isset($row['G_Name'])  && !empty($row['G_Name'])){
                    $Name=$row['G_Name'];
                    
                }
                if (isset($row['G_Address'])  && !empty($row['G_Address'])){
                    $Address=$row['G_Address'];
                }
                if (isset($row['S_Name'])  && !empty($row['S_Name'])){
                    $Name=$row['S_Name'];
                    
                }
                if (isset($row['S_Address'])  && !empty($row['S_Address'])){
                    $Address=$row['S_Address'];
                }
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$Name,'Address'=>$Address]);
            }
            return $answer;
        }
        
    }

    public function CusDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];

       
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS G_Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As G_Address,concat(spu.First_Name,' ',spu.Last_Name)AS S_Name,concat(spu.Postalcode,' , ',spu.Street,' , ' ,spu.City)As S_Address FROM `order`o LEFT JOIN placeorder p on p.Order_id=o.Order_id LEFT JOIN user u on u.User_id=p.Customer_Id LEFT JOIN shop_placeorder sp on sp.Order_id=o.Order_id LEFT JOIN user spu on spu.User_id=sp.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()) Group by o.Order_id";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                if (isset($row['G_Name'])  && !empty($row['G_Name'])){
                    $Name=$row['G_Name'];
                    
                }
                if (isset($row['G_Address'])  && !empty($row['G_Address'])){
                    $Address=$row['G_Address'];
                }
                if (isset($row['S_Name'])  && !empty($row['S_Name'])){
                    $Name=$row['S_Name'];
                    
                }
                if (isset($row['S_Address'])  && !empty($row['S_Address'])){
                    $Address=$row['S_Address'];
                }
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$Name,'Address'=>$Address]);
            }
            return $answer;
        }
       
    }

    public function CusAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS G_Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As G_Address,concat(spu.First_Name,' ',spu.Last_Name)AS S_Name,concat(spu.Postalcode,' , ',spu.Street,' , ' ,spu.City)As S_Address FROM `order`o LEFT JOIN placeorder p on p.Order_id=o.Order_id LEFT JOIN user u on u.User_id=p.Customer_Id LEFT JOIN shop_placeorder sp on sp.Order_id=o.Order_id LEFT JOIN user spu on spu.User_id=sp.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) Group by o.Order_id";
      
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                if (isset($row['G_Name'])  && !empty($row['G_Name'])){
                    $Name=$row['G_Name'];
                    
                }
                if (isset($row['G_Address'])  && !empty($row['G_Address'])){
                    $Address=$row['G_Address'];
                }
                if (isset($row['S_Name'])  && !empty($row['S_Name'])){
                    $Name=$row['S_Name'];
                    
                }
                if (isset($row['S_Address'])  && !empty($row['S_Address'])){
                    $Address=$row['S_Address'];
                }
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$Name,'Address'=>$Address]);
            }
            return $answer;
        }

        
       
    }

    



    public function ShopDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE ((o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date = DATE(NOW()))) Group by o.Order_id";
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
       

    }

    public function ShopDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        

    }

    public function ShopDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
       
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function ShopAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id && o.Delivery_Status=1) Group by o.Order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                $delivery_fee=($row['Delivery_fee'])*80/100;
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$delivery_fee,'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }


   







}


