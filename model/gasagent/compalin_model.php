<?php
class Complain{
    private $User_id;
    public function addComplain($connection,$discription,$refNo){
        $this->User_id=$_SESSION['User_id'];
        $sql="INSERT INTO complains(Complain_id, date, Description, user_id, order_id, status, checked_date, staff_Id, message) VALUES (' ',CURDATE(),'$discription',$this->User_id,$refNo,NULL,NULL,NULL,'NULL')";
       
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function viewComplain($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT `Complain_id`, `date`, `Description` FROM `complains` WHERE user_id=$this->User_id";
        
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Complain_id'=>$row['Complain_id'],'date'=>$row['date'],'Description'=>$row['Description']]);
            }
            return $answer;
        }
    }

    public function GetComplaneId($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Order_id FROM `order` WHERE DeliveryPerson_Id= $this->User_id && (Delivery_Status=0 || Delivery_Status=1)";
       
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Order_id'=>$row['Order_id']]);
            }
        }
        return $answer;
     }

     

    public function Delete_Complanes($connection,$Complane_id){
        $sql="DELETE FROM `complains` WHERE Complain_id=$Complane_id";
        $result=$connection->query($sql);
        if($result){
            return true;
            
        }
        else{
            return false;
        }
    }
}