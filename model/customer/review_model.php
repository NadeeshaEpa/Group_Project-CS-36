<?php
class review_model{
    public function deliverypersons($connection,$user_id){
        $sql="SELECT o.DeliveryPerson_Id from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery=[];
            while($row=$result->fetch_object()){
                array_push($delivery,['DeliveryPerson_Id'=>$row->DeliveryPerson_Id]);            
            }
            return $delivery;
        }
    } 
    public function finddeliveryname($connection,$delivery){
        $names=[];
        foreach($delivery as $d){
            $sql="SELECT First_Name,Last_Name FROM `user` WHERE User_id='$d[DeliveryPerson_Id]'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{    
                while($row=$result->fetch_object()){
                    array_push($names,['First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name]);
                }
            }
        }
        return $names;
    }
    public function finddeliveryid($connection,$dpname){
        $words=[];
        $words=explode(" ",$dpname);
        $sql="SELECT User_id FROM `user` WHERE First_Name='$words[0]' AND Last_Name='$words[1]'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->User_id;
        }
    }
    public function review($connection,$user_id,$dpid,$description){
        //$this->setDpId($connection);
        $sql="INSERT INTO `rateservice`(`Rate_Id`,`Description`,`Customer_Id`, `DeliveryPerson_Id`) VALUES (' ','$description','$user_id','$dpid')";
        $result=$connection->query($sql);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function viewreview($connection,$user_id){
        $sql="SELECT r.Rate_Id,r.Date,r.Description,u.First_Name,u.Last_Name from `rateservice` r INNER JOIN `user` u ON r.DeliveryPerson_Id=u.User_id WHERE r.Customer_Id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $reviews=[];
            while($row=$result->fetch_object()){
                array_push($reviews,['Rate_id'=>$row->Rate_Id,'Date'=>$row->Date,'Description'=>$row->Description,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name]);
            }
            return $reviews;
        }
    }
    public function deletereview($connection,$rate_id){
        $sql="DELETE FROM `rateservice` WHERE Rate_Id='$rate_id'";
        $result=$connection->query($sql);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function editreview($connection,$rate_id,$user_id){
        $delivery=$this->deliverypersons($connection,$user_id);
        $names=$this->finddeliveryname($connection,$delivery);
        $sql="SELECT r.Rate_Id,r.Date,r.Description,u.First_Name,u.Last_Name from `rateservice` r INNER JOIN `user` u ON r.DeliveryPerson_Id=u.User_id WHERE r.Rate_Id='$rate_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $reviews=[];
            while($row=$result->fetch_object()){
                array_push($reviews,['Rate_id'=>$row->Rate_Id,'Date'=>$row->Date,'Description'=>$row->Description,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name]);
            }
            array_push($reviews,$names);
            return $reviews;
        }      
    }
    public function updatereview($connection,$rateid,$dpname,$date,$desc){
        $dpid=$this->finddeliveryid($connection,$dpname);
        $sql="UPDATE `rateservice` SET `Date`='$date',`Description`='$desc',`DeliveryPerson_Id`='$dpid' WHERE Rate_Id='$rateid'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}