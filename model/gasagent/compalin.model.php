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
}