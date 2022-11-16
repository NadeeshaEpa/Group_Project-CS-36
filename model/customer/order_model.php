<?php
class order_model{
    public function deliverypersons($connection,$user_id){
        $sql="SELECT o.DeliveryPerson_Id from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id WHERE p.Customer_Id='$user_id'";
        $result=$connection->query($sql);
        // print_r($result);
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
        
}