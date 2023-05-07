<?php
class location{
    private $User_id;
    public function locationUpdate($connection,$latitude,$longitude){
        $this->User_id=$_SESSION['User_id'];
        $sql="UPDATE `deliveryperson` SET `latitude`=$latitude,`longitude`=$longitude, `Locatin_last_update`=CURRENT_TIME WHERE DeliveryPerson_Id=$this->User_id";
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
        $sql="SELECT DeliveryPerson_Id, Available_State FROM deliverypersonavailable  WHERE (Available_State=1 && DeliveryPerson_Id=$this->User_id);";
        $result=mysqli_query($connection,$sql);
        $sqlNew="SELECT latitude, longitude,Vehicle_Type,maximum_Quantity,Locatin_last_update FROM deliveryperson WHERE DeliveryPerson_Id=$this->User_id";
        $resultNew=mysqli_query($connection,$sqlNew);

        /*Check live location is work or not */
        
        if(mysqli_num_rows($resultNew)>0){
            $rowNew = mysqli_fetch_assoc($resultNew);
            $Delivery_lat = $rowNew['latitude'];
            $Delivery_long = $rowNew['longitude'];
            $Delivery_Max_Quantity=$rowNew['maximum_Quantity'];
            $Delivery_Vehicle_Type=$rowNew['Vehicle_Type'];
            $location_last_update_time=$rowNew['Locatin_last_update'];
           
            date_default_timezone_set('Asia/Colombo');
            $current_date = date('Y-m-d'); // get the current date
            $location_last_update_detetime = $current_date . ' ' . $location_last_update_time; // combine date and fixed time
            $location_last_update_timestamp = strtotime($location_last_update_detetime);
            $current_timestamp = time();
           
            if( $current_timestamp-$location_last_update_timestamp>900){
                $_SESSION['connection_problem']='Your are disconnected. Please Check your internet connection or your Location is on.';
                return false;
            }

            if($Delivery_Vehicle_Type=='Lorry'){
                $_SESSION['Vehicle_image']=1;
            }
            elseif($Delivery_Vehicle_Type=='Three Wheel'){
                $_SESSION['Vehicle_image']=2;            
            }
            else{
                $_SESSION['Vehicle_image']=3;           
            }
        }
        /* */
         
        if(mysqli_num_rows($result)>0 && mysqli_num_rows($resultNew)>0){
            
            $dataArray = array();
            
            
            $sql1="SELECT 
            COUNT(*) As count,o.Order_date,o.Time,o.Order_id,o.latitude AS cus_lat,
             o.longitude AS cus_long,g.latitude AS Gas_lat,
             g.longitude AS Gas_long ,g.open_time AS Gas_open_time,g.closed_time AS Gas_closed_time,
             st.open_time AS Shop_open_time,st.closed_time AS Shop_closed_time,st.latitude AS pro_lat,
             st.longitude AS pro_long,SUM(po.Quantity) AS Gas_Quantity,SUM(spo.Quantity) AS Shop_Quantity,
             MAX(gc.Weight) As weight,o.Delivery_fee,g.Shop_status,st.Shop_status AS s_Shop_status,po.cylinder_type,
             
             concat(ug.First_Name,' ',ug.Last_Name) AS gasargent_Name,
             concat(ug.Postalcode,',',ug.Street,',',ug.City) AS gasargent_Address,
             concat(us.First_Name,' ',us.Last_Name) AS ShopManager_Name,
             concat(us.Postalcode,',',us.Street,',',us.City) AS ShopManager_Address,
             concat(ucpo.First_Name,' ',ucpo.Last_Name) AS GasCustomer_Name,
             concat(ucpo.Postalcode,',',ucpo.Street,',',ucpo.City) AS GasCustomer_Address,
             concat(ucspo.First_Name,' ',ucspo.Last_Name) AS ShopCustomer_Name,
             concat(ucspo.Postalcode,',',ucspo.Street,',',ucspo.City) AS ShopCustomer_Address
             
             FROM `order` o 
             
             LEFT JOIN placeorder po ON po.Order_Id=o.Order_id
             LEFT JOIN shop_placeorder spo ON spo.Order_id=o.Order_id
             LEFT JOIN stock_manager st ON spo.StockManager_id=st.id 
             LEFT JOIN gasagent g on po.GasAgent_Id=g.GasAgent_Id 
             LEFT JOIN user ug ON g.GasAgent_Id=ug.User_id
             LEFT JOIN user us ON st.id=us.User_id
             LEFT JOIN customer cpo ON po.Customer_Id=cpo.Customer_Id
             LEFT JOIN customer cspo ON spo.Customer_Id=cspo.Customer_Id
             LEFT JOIN user ucpo ON cpo.Customer_Id=ucpo.User_id
             LEFT JOIN user ucspo ON cspo.Customer_Id=ucspo.User_id
             LEFT JOIN gascylinder gc ON po.Cylinder_Id=gc.Cylinder_Id
             
             WHERE (o.Delivery_Method='Delivered by agent' && o.Order_Status=1 && o.Delivery_Status IS NULL) 
             GROUP BY o.Order_id
             ORDER BY o.Order_date ASC, o.Time ASc";
            $result1=mysqli_query($connection,$sql1);
            
            if(mysqli_num_rows($result1)>0){
                while ($row = mysqli_fetch_assoc($result1)) {
                    
                    /*Check order id decline the deliveryperson*/
                    $orderId=$row['Order_id'];
                    $sql2="SELECT `delivaryPerson_id`, `Order_id`, `Decline_status` FROM `deliverypersondecline` WHERE delivaryPerson_id=$this->User_id && Order_id=$orderId && Decline_status=1";
                    $result2=mysqli_query($connection,$sql2);
                    if(mysqli_num_rows($result2)>0){
                        $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                        continue;
                    }
                    /* */
                    $customer_lat=$row['cus_lat'];
                    $customer_long=$row['cus_long'];
                    $weight=2.3;// assign default value for the weight
                    $color='RED';//Change Row color
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
                    if (isset($row['Weight'])  && !empty($row['Weight'])){
                        $weight=$row['Weight'];
                    }
                    if (isset($row['Shop_status'])  && !empty($row['Shop_status'])){
                        $shop_Status=$row['Shop_status'];
                    }
                    if (isset($row['s_Shop_status'])  && !empty($row['s_Shop_status'])){
                        $shop_Status=$row['s_Shop_status'];
                    }
                  
                    
                    $dis_between_shop_customer=location :: distance($customer_lat,$customer_long,$organiZation_lat,$organiZation_long);
                    
                    $dis_between_shop_Delivery=location :: distance($Delivery_lat,$Delivery_long,$organiZation_lat,$organiZation_long);
                    $Total_Distance=$dis_between_shop_customer+$dis_between_shop_Delivery;
                    $RoundedDis_between_shop_customer=round($dis_between_shop_customer);
                    $running_time_between_shop_cus=(($dis_between_shop_customer*2)/32)*3600; //Normal time to move customer location to shop for the delivery person
                    
                    $running_time_between_shop_Delivery=(($dis_between_shop_Delivery)/32)*3600; //Normal time to move delivery person current location to shop for delivery person
                    
                    date_default_timezone_set('Asia/Colombo');
                    $current_date = date('Y-m-d'); // get the current date
                    $current_time = date('H:i:s'); // get the current time
                    $closed_datetime = $current_date . ' ' . $closed_time; // combine date and fixed time
                    $open_datetime = $current_date . ' ' . $open_time; // combine date and fixed time
                    $closed_timestamp = strtotime($closed_datetime);
                    $opend_timestamp=strtotime($open_datetime);
                    $current_timestamp = time();
                    
                    /*Time crating if else */
                    
                    if(($current_timestamp>$closed_timestamp || $shop_Status==0)){
                        $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                        continue;
                    }
                    else{
                        $remaining_time_move_shopToCus=$closed_timestamp - $current_timestamp; //But Having time to move customer current location to shop for the delivery person
                        if($running_time_between_shop_cus<$remaining_time_move_shopToCus){
                            $remaining_time_move_DeliveryToShop=$remaining_time_move_shopToCus-$running_time_between_shop_cus;
                        }
                    }
                    /* */

                    /*QuAntity checking and vehicle type checking */
                    if($Delivery_Max_Quantity<$quantity){
                        $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                        continue;
                    }
                    else{
                        if($Delivery_Vehicle_Type=='Lorry'){
                            if($weight==37.5){
                                $color='GREEN';
                            }
                            
                        }
                        if($Delivery_Vehicle_Type=='Three Wheel'){
                            
                            if($weight==37.5){
                                continue;
                            }
                            else{
                                if($quantity>1){
                                    $color='GREEN';
                                }
                            }
                           
                        }
                        if($Delivery_Vehicle_Type=='Bike'){
                            
                            if($weight==37.5){
                                $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                                continue;
                            }
                            
                        }
                        
                    }
                    /* */
                   
                    /*Time checking if else And max distance 100km check*/
                    if(($dis_between_shop_customer>=50)||($Total_Distance>=50)||($running_time_between_shop_cus>$remaining_time_move_shopToCus)){
                        $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                        continue;
                    }
                    elseif($remaining_time_move_DeliveryToShop<$running_time_between_shop_Delivery){
                        $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                        continue;
                    }
                    else{
                        
                        if (isset($row['ShopCustomer_Name'])  && !empty($row['ShopCustomer_Name'])){
                            $customer_name=$row['ShopCustomer_Name'];
                        }
                        if (isset($row['GasCustomer_Name'])  && !empty($row['GasCustomer_Name'])){
                            $customer_name=$row['GasCustomer_Name'];
                        }
                        if (isset($row['ShopCustomer_Address'])  && !empty($row['ShopCustomer_Address'])){
                            $Customer_Address=$row['ShopCustomer_Address'];
                        }
                        if (isset($row['GasCustomer_Address'])  && !empty($row['GasCustomer_Address'])){
                            $Customer_Address=$row['GasCustomer_Address'];
                        }
                        if (isset($row['ShopManager_Name'])  && !empty($row['ShopManager_Name'])){
                            $argent_name=$row['ShopManager_Name'];
                        }
                        if (isset($row['gasargent_Name'])  && !empty($row['gasargent_Name'])){
                            $argent_name=$row['gasargent_Name'];
                        }
                        if (isset($row['ShopManager_Address'])  && !empty($row['ShopManager_Address'])){
                            $argent_Address=$row['ShopManager_Address'];
                        }
                        if (isset($row['gasargent_Address'])  && !empty($row['gasargent_Address'])){
                            $argent_Address=$row['gasargent_Address'];
                        }
                        if ($row['cylinder_type']=='old' ) {
                            $order_type=1;//old gas cylinder 
                        }
                        if ($row['cylinder_type']=='new'  || $row['cylinder_type']==NULL ) {
                            $order_type=2;//new gas cylinder or product order
                        }
                        $delivery_fee=($row['Delivery_fee'])*80/100;
                        array_push($dataArray,['Order_id'=>$row['Order_id'],'customer_Name'=>$customer_name,'Customer_Address'=>$Customer_Address,'Argent_Name'=>$argent_name,'Argent_Address'=>$argent_Address,'Distance'=>$Total_Distance,'Distance_Shop_customer'=>$RoundedDis_between_shop_customer,'Distance_Between_Delivery_shop'=>$dis_between_shop_Delivery,'RemTimeShopToCustomer'=>$remaining_time_move_shopToCus,'RemaintinTimeTodeliveryShop'=>$remaining_time_move_DeliveryToShop,'runningTimeShopToCustomner'=>$running_time_between_shop_cus,'RunningtimeToDeliveryToshop'=>$running_time_between_shop_Delivery,'Delivery fee'=>$delivery_fee,'Color'=>$color,'order_type'=>$order_type]);


                    }
                    /* */
                    
                }
                return $dataArray;
            }
            else{
                
                $_SESSION['NoRequest']='No Delivery Request is available. Check new delivery request click the refresh button.';
                return false;
            }

        }
        else{
            $_SESSION['unavailable']='You are in unavailable. Please Click you are available.';
            return false;
            
        }
    }

    /* */


    public function AddDeliveryDecline($connection,$orderId){
        $this->User_id=$_SESSION['User_id'];
        $sql="INSERT INTO `deliverypersondecline`(`delivaryPerson_id`, `Order_id`, `Decline_status`) VALUES ($this->User_id,$orderId,1)";
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function AcceptDeliveryRequest($connection,$orderId){
        $dataArray1 = array();
        $this->User_id=$_SESSION['User_id'];
        $sql1="UPDATE `order` SET `Delivery_Status`=0,DeliveryPerson_Id= $this->User_id WHERE Order_id=$orderId";
        $result1=$connection->query($sql1);
        
        $sql2="SELECT 
        o.Order_date,o.Time,o.Order_id,o.latitude AS cus_lat,
        o.longitude AS cus_long,g.latitude AS Gas_lat,
        g.longitude AS Gas_long ,g.open_time AS Gas_open_time,g.closed_time AS Gas_closed_time,
        st.open_time AS Shop_open_time,st.closed_time AS Shop_closed_time,st.latitude AS pro_lat,
        st.longitude AS pro_long,po.Quantity AS Gas_Quantity,spo.Quantity AS Shop_Quantity,
        gc.Weight,o.Delivery_fee,
                
        concat(ug.First_Name,' ',ug.Last_Name) AS gasargent_Name,
        concat(ug.Postalcode,',',ug.Street,',',ug.City) AS gasargent_Address,
        concat(us.First_Name,' ',us.Last_Name) AS ShopManager_Name,
        concat(us.Postalcode,',',us.Street,',',us.City) AS ShopManager_Address,
        concat(ucpo.First_Name,' ',ucpo.Last_Name) AS GasCustomer_Name,
        concat(ucpo.Postalcode,',',ucpo.Street,',',ucpo.City) AS GasCustomer_Address,
        concat(ucspo.First_Name,' ',ucspo.Last_Name) AS ShopCustomer_Name,
        concat(ucspo.Postalcode,',',ucspo.Street,',',ucspo.City) AS ShopCustomer_Address,
        MIN(ugnum.Contact_No) AS GasArgentContactNo,
        MIN(usnum.Contact_No) AS ShopManagerContactNo,
        MIN(ucponum.Contact_No) AS GasCustomerContactNo,
        MIN(ucsponum.Contact_No) AS ShopCustomerContactNo
                
    FROM `order` o 
                
    LEFT JOIN placeorder po ON po.Order_Id=o.Order_id
    LEFT JOIN shop_placeorder spo ON spo.Order_id=o.Order_id
    LEFT JOIN stock_manager st ON spo.StockManager_id=st.id 
    LEFT JOIN gasagent g on po.GasAgent_Id=g.GasAgent_Id 
    LEFT JOIN user ug ON g.GasAgent_Id=ug.User_id
    LEFT JOIN user us ON st.id=us.User_id
    LEFT JOIN customer cpo ON po.Customer_Id=cpo.Customer_Id
    LEFT JOIN customer cspo ON spo.Customer_Id=cspo.Customer_Id
    LEFT JOIN user ucpo ON cpo.Customer_Id=ucpo.User_id
    LEFT JOIN user ucspo ON cspo.Customer_Id=ucspo.User_id
    LEFT JOIN gascylinder gc ON po.Cylinder_Id=gc.Cylinder_Id
    LEFT JOIN user_contact ugnum ON ug.User_id=ugnum.User_id
    LEFT JOIN user_contact usnum ON us.User_id=usnum.User_id
    LEFT JOIN user_contact ucponum ON ucpo.User_id=ucponum.User_id
    LEFT JOIN user_contact ucsponum ON ucspo.User_id=ucsponum.User_id
                
    WHERE (o.Delivery_Method='Delivered by agent' && o.Order_Status=1 && o.Order_id=$orderId)
    GROUP BY o.Order_id
    ORDER BY o.Order_date ASC, o.Time ASC";
        $result2=mysqli_query($connection,$sql2);
        if(mysqli_num_rows($result2)>0){
            while ($row = mysqli_fetch_assoc($result2)) {
                if (isset($row['ShopCustomer_Name'])  && !empty($row['ShopCustomer_Name'])){
                    $customer_name=$row['ShopCustomer_Name'];
                }
                if (isset($row['GasCustomer_Name'])  && !empty($row['GasCustomer_Name'])){
                    $customer_name=$row['GasCustomer_Name'];
                }
                if (isset($row['ShopCustomer_Address'])  && !empty($row['ShopCustomer_Address'])){
                    $Customer_Address=$row['ShopCustomer_Address'];
                }
                if (isset($row['GasCustomer_Address'])  && !empty($row['GasCustomer_Address'])){
                    $Customer_Address=$row['GasCustomer_Address'];
                }
                if (isset($row['ShopManager_Name'])  && !empty($row['ShopManager_Name'])){
                    $argent_name=$row['ShopManager_Name'];
                }
                if (isset($row['gasargent_Name'])  && !empty($row['gasargent_Name'])){
                    $argent_name=$row['gasargent_Name'];
                }
                if (isset($row['ShopManager_Address'])  && !empty($row['ShopManager_Address'])){
                    $argent_Address=$row['ShopManager_Address'];
                }
                if (isset($row['gasargent_Address'])  && !empty($row['gasargent_Address'])){
                    $argent_Address=$row['gasargent_Address'];
                }if (isset($row['GasArgentContactNo'])  && !empty($row['GasArgentContactNo'])){
                    $ArgentContactNo=$row['GasArgentContactNo'];
                }
                if (isset($row['ShopManagerContactNo'])  && !empty($row['ShopManagerContactNo'])){
                    $ArgentContactNo=$row['ShopManagerContactNo'];
                }
                if (isset($row['GasCustomerContactNo'])  && !empty($row['GasCustomerContactNo'])){
                    $CustomerContactNo=$row['GasCustomerContactNo'];
                }
                if (isset($row['ShopCustomerContactNo'])  && !empty($row['ShopCustomerContactNo'])){
                    $CustomerContactNo=$row['ShopCustomerContactNo'];
                }
                $delivery_fee=($row['Delivery_fee'])*80/100;
                
                array_push($dataArray1,['Order_id'=>$row['Order_id'],'customer_Name'=>$customer_name,'Customer_Address'=>$Customer_Address,'Argent_Name'=>$argent_name,'Argent_Address'=>$argent_Address,'Delivery fee'=>$delivery_fee,'CustomerContact'=>$CustomerContactNo,'ArgentContact'=>$ArgentContactNo]);
            }
        }

        
        if($result1 && $result2){
            return $dataArray1;
        }
        else{
            return false;
        }
    }

    public function PendingDeliveryRequest($connection,$order_id,$DeliveryFee){
       
        $this->User_id=$_SESSION['User_id'];
        $sql2="INSERT INTO `payment`(`Order_Id`, `User_Id`, `Staff_Id`, `Amount`, `Date`, `Paid`) VALUES ($order_id, $this->User_id,NULL,$DeliveryFee,NULL,0)";
        $result2=$connection->query($sql2);
       
        if($result2){
            return true;
        }
        else{
            return false;
        }
    }


}



