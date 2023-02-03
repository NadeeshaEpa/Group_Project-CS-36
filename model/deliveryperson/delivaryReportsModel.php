<?php
class reports{
    private $User_id;
    public function GasDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
        $result=$connection->query($sql);
        
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
       

    }

    public function GasDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
        

    }

    public function GasDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
        
    }

    public function GasAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
        
    }

    public function CusDayReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date = DATE(NOW()))";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
        
    }

    public function CusDay7Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date >= DATE(NOW()) - INTERVAL 7 DAY)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
        
    }

    public function CusDay30Reports($connection){
        $this->User_id=$_SESSION['User_id'];
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id) && (Delivery_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE())";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
       
    }

    public function CusAllReports($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id,Delivery_date,Delivery_time,Delivery_fee FROM `order` WHERE (Order_Status=1 && DeliveryPerson_Id=$this->User_id)";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id'],'Delivery_date'=>$row['Delivery_date'],'Delivery_time'=>$row['Delivery_time'],'Delivery_fee'=>$row['Delivery_fee']]);
            }
            return $answer;
        }
       
    }

   

   







}


