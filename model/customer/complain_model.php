<?php
class complain_model{
    public function getorderid($connection,$user){
        $sql="Select o.order_id,o.Order_date from `order` o inner join `placeorder` p on o.Order_id=p.Order_Id where p.Customer_Id='$user' and  o.Order_Status='1' 
        union select o.order_id,o.Order_date from `order` o inner join `shop_placeorder` p on o.Order_id=p.Order_Id where p.Customer_Id='$user' and  o.Order_Status='1'";
        $result=$connection->query($sql);
        $orderid=[];
        $orders=[];
        if($result->num_rows==0){
            return $orderid;
        }else{
            while($row=$result->fetch_object()){
                array_push($orders,$row);
            }
            //sort the array to show the latest orderid first
            usort($orders,function($a,$b){
                return $a->order_id<$b->order_id;
            });
            foreach($orders as $order){
                $date=$order->Order_date;
                $diff=$this->get_date_differance($date);
                if($diff<=14){
                    array_push($orderid,$order->order_id);
                }
            }
            return $orderid;
        }
    }
    public function get_date_differance($date){
        date_default_timezone_set('Asia/Colombo');
        $date1=date_create(date("Y-m-d"));
        $date2=date_create($date);
        $diff=date_diff($date2,$date1);
        return $diff->format("%R%a");

    } 
    public function addcomplain($connection,$customer_id,$order_id,$complain){
        $sql="INSERT INTO `complains`(`Description`, `user_id`, `order_id`, `status`, `checked_date`, `staff_Id`, `message`) VALUES('$complain','$customer_id','$order_id','0',NULL,NULL,NULL)";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            return true;
        }
    }
    public function viewcomplain($connection,$userid,$limit,$offset){
        $sql="Select complain_id,Description,order_id,status,date,message from `complains` where user_id='$userid' LIMIT $limit OFFSET $offset";
        $result=$connection->query($sql);
        $complain=[];
        if($result->num_rows==0){
            return $complain;
        }else{
            while($row=$result->fetch_object()){
                if($row->message==NULL){
                    $row->message="Still not checked";
                }else{
                    $row->message=$row->message;
                }
                array_push($complain,['complain_id'=>$row->complain_id,'complain'=>$row->Description,'order_id'=>$row->order_id,'status'=>$row->status,'date'=>$row->date,'message'=>$row->message]);
            }
            //sort the array to show the latest complain first
            usort($complain,function($a,$b){
                return $a['complain_id']<$b['complain_id'];
            });
            return $complain;
        }
    }
    public function deletecomplain($connection,$complainid){
        $sql="DELETE FROM `complains` WHERE complain_id='$complainid'";
        $result=$connection->query($sql);
        if($result===false){
            return false;
        }else{
            return true;
        }
    }
    public function complain_count($connection,$userid){
        $sql="SELECT COUNT(*) as count FROM `complains` WHERE user_id='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $row=$result->fetch_object();
            return $row->count;
        }
    }
}
