<?php
class complain_model
{
    public function viewcomplain($connection)
    {      
        $sql="SELECT c.Complain_id,c.date,c.Description,c.user_id,c.order_id,u.Type from `complains` c INNER JOIN `user` u ON c.user_id=u.User_id WHERE c.status=0";
        $result = mysqli_query($connection, $sql);
        $complain = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $complain[] = $row;
            }
            // print_r($complain);
            return $complain;
        } else {
            return $complain;
        }
    }

    public function viewmycomplains($connection,$User_id)
    {      
        $sql="SELECT c.Complain_id,c.date,c.Description,c.user_id,c.order_id,c.status,u.Type from `complains` c INNER JOIN `user` u ON c.user_id=u.User_id WHERE c.staff_id='$User_id'";
        $result = mysqli_query($connection, $sql);
        $complain = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $complain[] = $row;
            }
            // print_r($complain);
            return $complain;
        } else {
            return $complain;
        }
    }

    public function view_payment($connection,$User_id){
        $sql = "SELECT p.User_Id,p.Order_Id,o.Order_date,p.Amount,p.Paid,u.First_Name,u.Last_Name  from `payment` p INNER JOIN `order` o ON p.Order_Id=o.Order_id INNER JOIN `user` u ON p.User_Id=u.User_id WHERE p.Paid=0 AND p.User_Id='$User_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $payment=[];
            while($row=$result->fetch_object()){
                array_push($payment,['Order_Id'=>$row->Order_Id,'Order_date'=>$row->Order_date,'Amount'=>$row->Amount,'Paid'=>$row->Paid,'User_Id'=>$row->User_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name]);
            }
            return $payment;
        }
    }

    public function acceptcomplain($connection,$complain_id,$user_id){
        $sql = "UPDATE `complains` SET staff_Id='$user_id',status=1 WHERE Complain_id='$complain_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function completecomplain($connection,$complain_id){
        $sql = "UPDATE `complains` SET status=2 WHERE Complain_id='$complain_id'";
        $result=$connection->query($sql);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function complain_details($connection,$complain_id){
        $sql = "SELECT c.Complain_id,c.date,c.Description,c.user_id,c.order_id,c.status,c.message,u.Type,u.First_Name,u.Last_Name,o.Order_date,o.Order_Status from `complains` c INNER JOIN `order` o ON c.order_id=o.Order_id INNER JOIN `user` u ON c.user_id=u.User_id WHERE c.Complain_id='$complain_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $complain=[];
            while($row=$result->fetch_object()){
                array_push($complain,['Complain_id'=>$row->Complain_id,'Order_date'=>$row->Order_date,'date'=>$row->date,'Description'=>$row->Description,'status'=>$row->status,'order_id'=>$row->order_id,'message'=>$row->message,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'Type'=>$row->Type,'user_id'=>$row->user_id,'Order_Status'=>$row->Order_Status]);
            }
            return $complain;
        }
    }

    public function check_ordertype($connection,$order_id)
    {     
        $sql="SELECT Order_Id FROM `placeorder` WHERE Order_Id='$order_id' ";
        $result = mysqli_query($connection, $sql);
        if($result->num_rows===0){
            return false;
        } else {
            return true;
        }
        
    }


    public function check_usertype($connection,$user_id){
        $sql = " SELECT Type FROM `user` WHERE User_id='$user_id' ";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $complain=[];
            while($row=$result->fetch_object()){
                array_push($complain,['Type'=>$row->Type]);
            }
            return $complain;
        }
    }
    
    public function message($connection,$complain_id,$message){
        $sql = "UPDATE `complains` SET message='$message' WHERE Complain_id='$complain_id'";
        $result=$connection->query($sql);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
?>
