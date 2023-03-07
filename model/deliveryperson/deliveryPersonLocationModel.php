<?php
class location{
    private $User_id;
    public function locationUpdate($connection,$latitude,$longitude){
        $this->User_id=$_SESSION['User_id'];
        $sql="UPDATE `deliveryperson` SET `latitude`=$latitude,`longitude`=$longitude WHERE DeliveryPerson_Id=$this->User_id";
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    /*Delivery person assign */

    public static function distance($lat1, $lon1, $lat2, $lon2, $unit = "km") {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtolower($unit);
      
        if ($unit == "km") {
          return ($miles * 1.609344);
        } else if ($unit == "mi") {
          return $miles;
        } else {
          return $dist;
        }
    }
    
    public function AddDeliveryPerson($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT `DeliveryPerson_Id`, `Available_State` FROM `deliverypersonavailable` WHERE Available_State=1 && DeliveryPerson_Id=$this->User_id;";
        $result=mysqli_query($connection,$sql);
        $sqlNew="SELECT latitude, longitude FROM deliveryperson WHERE DeliveryPerson_Id=$this->User_id";
        $resultNew=mysqli_query($connection,$sqlNew);
        
           
        if(mysqli_num_rows($result)>0 && mysqli_num_rows($resultNew)>0){
            $dataArray = array();
            $rowNew = mysqli_fetch_assoc($result);
            $Delivery_lat = $rowNew['latitude'];
            $Delivery_long = $rowNew['longitude'];

            $sql1="SELECT o.Order_date,o.Time,o.Order_id,o.latitude AS cus_lat,
            o.longitude AS cus_long,g.latitude AS Gas_lat,
            g.longitude AS Gas_long ,g.open_time AS Gas_open_time,g.closed_time AS Gas_closed_time,
            st.open_time AS Shop_open_time,st.closed_time AS Shop_closed_time,st.latitude AS pro_lat,
            st.longitude AS pro_long,po.Quantity AS Gas_Quantity,spo.Quantity AS Shop_Quantity
            FROM `order` o LEFT JOIN placeorder po ON po.Order_Id=o.Order_id
            LEFT JOIN shop_placeorder spo ON spo.Order_id=o.Order_id
            LEFT JOIN stock_manager st ON spo.StockManager_id=st.id 
            LEFT JOIN gasagent g on po.GasAgent_Id=g.GasAgent_Id 
            WHERE (o.Delivery_Method='By delivery Person' && o.Order_Status=1) 
            ORDER BY o.Order_date ASC, o.Time ASC";
            $result1=mysqli_query($connection,$sql1);
            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result1)) {
                    $customer_lat=$row['cus_lat'];
                    $customer_long=$row['cus_long'];
                    if (isset($row['Gas_lat'])  && !empty($row['Gas_lat'])){
                        $organiZation_lat=$row['Gas_lat'];
                    }
                    if (isset($row['Gas_long'])  && !empty($row['Gas_long'])){
                        $organiZation_long=$row['Gas_long'];
                    }
                    if (isset($row['pro_lat'])  && !empty($row['pro_lat'])){
                        $organiZation_lat=$row['pro_lat'];
                    }
                    if (isset($row['pro_long'])  && !empty($row['pro_long'])){
                        $organiZation_long=$row['pro_long'];
                    }
                    if (isset($row['Gas_open_time'])  && !empty($row['Gas_open_time'])){
                        $open_time=$row['Gas_open_time'];
                    }
                    if (isset($row['Gas_closed_time'])  && !empty($row['Gas_closed_time'])){
                        $closed_time=$row['Gas_closed_time'];
                    }
                    if (isset($row['Shop_open_time'])  && !empty($row['Shop_open_time'])){
                        $open_time=$row['Shop_open_time'];
                    }
                    if (isset($row['Shop_closed_time'])  && !empty($row['Shop_closed_time'])){
                        $closed_time=$row['Shop_closed_time'];
                    }
                    if (isset($row['Gas_Quantity'])  && !empty($row['Gas_Quantity'])){
                        $quantity=$row['Gas_Quantity'];
                    }
                    if (isset($row['Shop_Quantity'])  && !empty($row['Shop_Quantity'])){
                        $quantity=$row['Shop_Quantity'];
                    }

                    $dis_between_shop_customer=location :: distance($customer_lat,$customer_long,$organiZation_lat,$organiZation_long);
                    $dis_between_shop_Delivery=location :: distance($Delivery_lat,$Delivery_long,$organiZation_lat,$organiZation_long);
                    $running_time_between_shop_cus=($dis_between_shop_customer*2)/32; //Normal time to move customer location to shop for the delivery person
                    $running_time_between_shop_Delivery=($dis_between_shop_Delivery)/32; //Normal time to move delivery person current location to shop for delivery person
                    
                    $current_date = date('Y-m-d'); // get the current date
                    $current_time = date('H:i:s'); // get the current time
                    $closed_datetime = $current_date . ' ' . $closed_time; // combine date and fixed time
                    $closed_timestamp = strtotime($closed_datetime);
                    $current_timestamp = time();
                    
                    /*Time crating if else */
                    if($current_timestamp>$closed_timestamp){
                        continue;
                    }
                    else{
                        $remaining_time_move_shopToCus=$closed_timestamp - $current_timestamp; //But Having time to move customer current location to shop for the delivery person
                        if($running_time_between_shop_cus<$remaining_time_move_shopToCus){
                            $remaining_time_move_DeliveryToShop=$remaining_time_move_shopToCus-$running_time_between_shop_cus;
                        }
                    }
                    /* */

                    /*Time checking if else And max distance 100km check*/
                    if(($dis_between_shop_customer>=100)&&($running_time_between_shop_cus>$remaining_time_move_shopToCus)){
                        continue;
                    }
                    elseif($remaining_time_move_DeliveryToShop<$running_time_between_shop_Delivery){
                        continue;
                    }
                    else{

                    }
                    /* */
                    
                }
            }
            else{
                return false;
            }

        }
        else{
            return false;
        }
    }

    /* */
}

