<?php
class reports{
    private $User_id;
    public function GasDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE ((o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
       

    }

    public function GasDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        

    }

    public function GasDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
    
=======
        $this->User_id=$_SESSION['User_id'];
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function GasAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.GasAgent_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function CusDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id WHERE ((o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function CusDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function CusDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        
=======
        $this->User_id=$_SESSION['User_id'];
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
       
    }

    public function CusAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
<<<<<<< HEAD
        
       
    }

    



    public function ShopDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE ((o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
       

    }

    public function ShopDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        

    }

    public function ShopDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
       
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }

    public function ShopAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,o.Delivery_date,o.Delivery_time,o.Delivery_fee,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.StockManager_id WHERE (o.Order_Status=1 && o.DeliveryPerson_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee'],'Name'=>$row['Name'],'Address'=>$row['Address']]);
            }
            return $answer;
        }
        
    }
=======
       
    }

   
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2

   







}


