<?php
class reviews{
    private $User_id;
    public function addReviws($connection,$discription){
        $this->User_id=$_SESSION['User_id'];
        $sql="INSERT INTO rateservice(Rate_Id, Date, Description, Customer_Id, DeliveryPerson_Id) VALUES ('',CURDATE(),'$discription',NUll,$this->User_id)";
        
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}