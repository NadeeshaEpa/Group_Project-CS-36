<?php
class Brand_reports{
    private $User_id;
    public function DelDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id WHERE ((o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date = DATE(NOW())))";
        $result=$connection->query($sql);
       
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
            }
            return $answer;
        }
       

    }

    public function DelDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
            }
            return $answer;
        }
        

    }

    public function DelDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
       
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
       
        $result=$connection->query($sql);
       
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
            }
            return $answer;
        }
        
    }

    public function DelAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=o.DeliveryPerson_Id INNER JOIN user_contact c ON u.User_id=c.User_id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id)";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Category'=>$row['Category'],'Price'=>$row['Price']]);
            }
            return $answer;
        }
        
    }


  

    public function CusDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT DISTINCT(o.Order_id),o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id WHERE ((o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date = DATE(NOW())))";
        
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity']]);
            }
            return $answer;
        }
        
    }

    public function CusDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT DISTINCT(o.Order_id),o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity']]);            }
            return $answer;
        }
        
    }

    public function CusDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT DISTINCT(o.Order_id),o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) && (o.Order_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity']]);            }
            return $answer;
        }
       
    }

    public function CusAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT DISTINCT(o.Order_id),o.Order_date,o.Time,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Order_date'=>$row['Order_date'],'Time'=>$row['Time'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity']]);            }
            return $answer;
        }
       
    }

   
    /*Delivered details */
    public function DeliveredOrderDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,o.Order_date, se.Quantity, o.Amount,gc.Weight,gm.company_name FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id INNER JOIN gascylinder gc ON p.Cylinder_Id=gc.Cylinder_Id INNER JOIN gas_company gm ON gc.Type=gm.company_id WHERE (o.Order_Status=1 && p.GasAgent_Id=47) && (o.Delivery_Method='By delivery person') GROUP BY  o.Order_id ORDER BY o.Time ASC";
       
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Weight'=>$row['Weight'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'company_name'=>$row['company_name']]);
            }
            return $answer;
        }

    }
    
    /*Picked Details */
    public function PickedOrderDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT o.Order_id,concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,o.Order_date, se.Quantity, o.Amount,gc.Weight,gm.company_name ,pay.Paid,o.Delivery_Status FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN sell_gas se ON se.Cylinder_Id=p.Cylinder_Id INNER JOIN gascylinder gc ON p.Cylinder_Id=gc.Cylinder_Id INNER JOIN gas_company gm ON gc.Type=gm.company_id INNER JOIN payment pay ON o.Order_id=pay.Order_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id && pay.User_Id=$this->User_id) && (o.Delivery_Method='Delivered by agent') GROUP BY  o.Order_id ORDER BY o.Time ASC";
      
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Weight'=>$row['Weight'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'company_name'=>$row['company_name'],'Paid'=>$row['Paid'],'Delivery_Status'=>$row['Delivery_Status']]);
            }
            return $answer;}
        }
    


                                                                                                                                                                                                                                   /*shop open and close */
    public function update_as_a_open($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="UPDATE stock_manager SET Shop_status=1 WHERE id=$this->User_id";
        
        if($connection->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }


    public function update_as_a_close($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="UPDATE stock_manager SET Shop_status=0 WHERE id=$this->User_id";
        if($connection->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    /* */

    /*vertyfy the pin */
    public function Check_the_pin($connection,$order_id,$pin){
        $sql="SELECT reserve_pin FROM `order` WHERE Order_id=$order_id";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $pin_data=mysqli_fetch_assoc($result);
           
            if($pin_data['reserve_pin']==$pin){
                $sql2="UPDATE `order` SET Delivery_Status=4 WHERE Order_id=$order_id";
                $result2=$connection->query($sql2);
                if($result2){
                    $_SESSION['picked']='Customer picked vertify';
                    return true;
                }
                else{
                    return false;
                }
               
            }
            else{
                $_SESSION['pin_wrong']='Pin is wrong';
                return false;
            }
        }
    }
   






}