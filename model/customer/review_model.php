<?php
class review_model{
    public function deliverypersons($connection,$user_id){
        $sql="SELECT distinct o.DeliveryPerson_Id,o.Delivery_date from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery=[];
            while($row=$result->fetch_object()){
                if($row->DeliveryPerson_Id!=NULL){
                    $date=$this->get_date_differance($row->Delivery_date);
                    if($date>0 and $date<30){
                        array_push($delivery,['DeliveryPerson_Id'=>$row->DeliveryPerson_Id]);  
                    } 
                }         
            }
            return $delivery;
        }
    }
    public function get_date_differance($date){
        date_default_timezone_set('Asia/Colombo');
        $date1=date_create(date("Y-m-d"));
        $date2=date_create($date);
        $diff=date_diff($date2,$date1);
        return $diff->format("%R%a");

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
                    $profile=$this->getuserimg($connection,$d['DeliveryPerson_Id']);
                    array_push($names,['First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'DeliveryPerson_Id'=>$d['DeliveryPerson_Id'],'image'=>$profile]);
                }
            }
        }
        return $names;
    }
    public function getuserimg($connection,$delivery){
        $sql="select imgname from `profileimg` where User_id='$delivery'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $image=$result->fetch_object();
            $imagename=$image->imgname;
        }
        return $imagename;
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
    public function viewreview($connection,$user_id,$limit,$offset){
        $sql="SELECT r.DeliveryPerson_Id,r.Rate_Id,r.Date,r.Description,u.First_Name,u.Last_Name from `rateservice` r INNER JOIN `user` u ON r.DeliveryPerson_Id=u.User_id WHERE r.Customer_Id='$user_id' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $reviews=[];
            while($row=$result->fetch_object()){
                $image=$this->getuserimg($connection,$row->DeliveryPerson_Id);
                array_push($reviews,['Rate_id'=>$row->Rate_Id,'Date'=>$row->Date,'Description'=>$row->Description,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'image'=>$image]);
            }
            //sort the array according to the date rate id latest review come first
            usort($reviews,function($a,$b){
                return $a['Rate_id']<$b['Rate_id'];
            });
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
    public function review_count($connection,$userid){
        $sql="SELECT COUNT(*) AS count FROM `rateservice` WHERE Customer_Id='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->count;
        }
    }
}