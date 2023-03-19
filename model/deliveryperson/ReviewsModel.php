<?php
class reviews{
    private $User_id;
    public function addReviws($connection,$discription){
        $this->User_id=$_SESSION['User_id'];
        $sql="INSERT INTO rateservice(Rate_Id, Date, Description, Customer_Id, DeliveryPerson_Id) VALUES ('',CURDATE(),'$discription',NUll,$this->User_id)";
<<<<<<< HEAD
       
=======
        
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
<<<<<<< HEAD

    public function getUserReviewsDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT Rate_Id,Date ,Description  FROM rateservice where DeliveryPerson_Id=$this->User_id order BY Date DESC";
       
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            $_SESSION['ReviewsError']="No Reviews Added";
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Rate_Id'=>$row['Rate_Id'],'Date'=>$row['Date'],'Description'=>$row['Description']]);
            }
        }
        return $answer;
    }

    public function Delete_Reviews($connection,$review_id){
        $sql="DELETE FROM `rateservice` WHERE Rate_Id=$review_id";
        $result=$connection->query($sql);
        if($result){
            return true;
            
        }
        else{
            return false;
        }
    }
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
}