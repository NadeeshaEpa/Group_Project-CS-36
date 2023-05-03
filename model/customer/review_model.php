<?php
class review_model{
    public function companyreview($connection,$userid,$limit,$offset){
        $sql="select r.review_id,u.First_Name,u.Last_Name,r.date,r.Description from `user` u inner join company_review r on u.User_id=r.customer_id where r.customer_id='$userid' group by r.review_id order by r.review_id desc limit $limit offset $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $comapny_reviews=[];
            while($row=$result->fetch_object()){
                array_push($comapny_reviews,['Review_id'=>$row->review_id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'date'=>$row->date,'Description'=>$row->Description]);
            }
            return $comapny_reviews;
        }
    }
    public function addcompanyreview($connection,$userid,$review){
        date_default_timezone_set('Asia/Colombo');
        $date=date('Y-m-d');
        $sql="INSERT INTO company_review(customer_id,Description,date) VALUES ('$userid','$review','$date')";
        $result=$connection->query($sql);
        if($result===true){
            return true;
        }else{
            return false;
        }
    }
    public function deliverypersons($connection,$user_id){
        $sql="SELECT distinct o.Order_id,o.DeliveryPerson_Id,o.Delivery_date from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$user_id' and o.DeliveryPerson_Id is not null
        union SELECT distinct o.Order_id,o.DeliveryPerson_Id,o.Delivery_date from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$user_id' and o.DeliveryPerson_Id is not null";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery=[];
            $final_delivery=[];
            while($row=$result->fetch_object()){
                array_push($delivery,$row);
            }
            //sort the array according to order_id where the highest order_id is at the top desending order
            usort($delivery,function($a,$b){
                return $a->Order_id < $b->Order_id;
            });
            //get the top most delivery person
            $top_delivery=$delivery[0];
            $days=$this->get_date_differance($top_delivery->Delivery_date);
            $status=$this->get_review_status($connection,$top_delivery->DeliveryPerson_Id,$top_delivery->Delivery_date);
            if($days<7 && $status===true){
                array_push($final_delivery,$top_delivery);
                return $final_delivery;
            }
            print_r($delivery);
            print_r($final_delivery);
            die();
            return $final_delivery;
        }
    }
    public function get_review_status($connection,$DeliveryPerson_Id,$Delivery_date){
        $sql="SELECT * FROM `rateservice` WHERE DeliveryPerson_Id='$DeliveryPerson_Id' and Date='$Delivery_date'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return true;
        }else{
            return false;
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
        $sql="SELECT First_Name,Last_Name FROM `user` WHERE User_id='$delivery->DeliveryPerson_Id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{    
            while($row=$result->fetch_object()){
                $profile=$this->getuserimg($connection,$delivery->DeliveryPerson_Id);
                array_push($names,['First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'DeliveryPerson_Id'=>$delivery->DeliveryPerson_Id,'image'=>$profile]);
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
    public function finddeliveryid($connection,$rate_id,$user_id){
        $sql="SELECT DeliveryPerson_Id FROM `rateservice` WHERE Rate_Id='$rate_id' and Customer_Id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $delivery=$result->fetch_object();
            return $delivery->DeliveryPerson_Id;
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
        $sql="SELECT r.DeliveryPerson_Id,r.Rate_Id,r.Date,r.Description,u.First_Name,u.Last_Name from `rateservice` r INNER JOIN `user` u ON r.DeliveryPerson_Id=u.User_id WHERE r.Customer_Id='$user_id' group by r.Rate_Id order by r.Rate_Id desc LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $reviews=[];
            while($row=$result->fetch_object()){
                $image=$this->getuserimg($connection,$row->DeliveryPerson_Id);
                array_push($reviews,['Rate_id'=>$row->Rate_Id,'Date'=>$row->Date,'Description'=>$row->Description,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'image'=>$image]);
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
    public function companydeletereview($connection,$review){
        $sql="delete from `company_review` where review_id='$review'";
        $result=$connection->query($sql);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function editreview($connection,$rate_id,$user_id){
        $sql="SELECT r.Rate_Id,r.Date,r.Description,u.First_Name,u.Last_Name from `rateservice` r INNER JOIN `user` u ON r.DeliveryPerson_Id=u.User_id WHERE r.Rate_Id='$rate_id'";
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
    public function companyeditreview($connection,$reviewid){
        $sql="select review_id,date,description from `company_review` where review_id='$reviewid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $reviews=[];
            while($row=$result->fetch_object()){
                array_push($reviews,['reviewid'=>$row->review_id,'date'=>$row->date,'description'=>$row->description]);
            }
            return $reviews;
        }
    }
    public function companyupdatereview($connection,$reviewid,$desc){
        $sql="select date from `company_review` where review_id='$reviewid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            $date=$row->date;
        }
        $days=$this->get_date_differance($date);
        if($days>7){
            return false;
        }
        $sql="update `company_review` set description='$desc' where review_id='$reviewid'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function updatereview($connection,$rateid,$desc,$user_id){
        $dpid=$this->finddeliveryid($connection,$rateid,$user_id);

        //check with published date
        $sql="SELECT Date FROM `rateservice` WHERE Rate_Id='$rateid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            $date=$row->Date;
        }
        $days=$this->get_date_differance($date);
        if($days>7){
            return false;
        }
        $sql="UPDATE `rateservice` set `Description`='$desc',`DeliveryPerson_Id`='$dpid' WHERE Rate_Id='$rateid'";
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
    public function companyreview_count($connection,$userid){
        $sql="SELECT COUNT(*) AS count FROM `company_review` WHERE Customer_Id='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->count;
        }
    }
}