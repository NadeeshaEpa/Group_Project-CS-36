<?php
class Brand_reports{
    private $User_id;
    public function DelDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE ((o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
=======
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE ((o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
       

    }

    public function DelDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
=======
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
        

    }

    public function DelDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
       
=======
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
        
    }

    public function DelAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id)";
=======
        $sql="SELECT o.Order_id,o.Picked_date,o.Picked_time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id)";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Picked_date'=>$row['Picked_date'],'Picked_time'=>$row['Picked_time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
        
    }

    public function CusDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE ((o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Order_date = DATE(NOW())))";
=======
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE ((o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
        
    }

    public function CusDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Order_date >= DATE(NOW()) - INTERVAL 7 DAY)";
=======
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
        
    }

    public function CusDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) && (o.Order_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
=======
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
       
    }

    public function CusAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id)";
=======
        $sql="SELECT o.Order_id,o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id)";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount']]);
=======
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }
       
    }

   /* get customers details for dashboard display */
    public function cusDashDetails($connection){
        $this->User_id=$_SESSION['User_id'];
<<<<<<< HEAD
        $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount,o.Delivery_Method,o.Order_date FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id) ORDER BY o.Time ASC LIMIT 5";
       
=======
        $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,po.Price FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) ORDER BY o.Time ASC LIMIT 5";
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
<<<<<<< HEAD
                array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'Delivery_Method'=>$row['Delivery_Method']]);
=======
                array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
            }
            return $answer;
        }

    }
<<<<<<< HEAD
     /*Delivered details */
    public function DeliveredOrderDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount,o.Delivery_Method,o.Order_date FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id && o.Delivery_Method='By delivery person' ) ORDER BY o.Time ASC";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'Delivery_Method'=>$row['Delivery_Method']]);
            }
            return $answer;
        }

    }
    
    /*Picked Details */
    public function PickedOrderDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,po.Category,o.Amount,o.Delivery_Method,o.Order_date FROM `order`o INNER JOIN shop_placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN product po ON po.Item_code=p.Product_id WHERE (o.Order_Status=1 && p.StockManager_id=$this->User_id && o.Delivery_Method='Delivered by agent' ) ORDER BY o.Time ASC";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'Delivery_Method'=>$row['Delivery_Method']]);
            }
            return $answer;
        }

    }
=======
   

>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2






}


