<?php
class payment_model{
    public function addquantity($result){
        $new_array = array();

        foreach ($result as $item) {
            $key = $item['type'] . '_' . $item['weight'];
            if (isset($new_array[$key])) {
                $new_array[$key]['quantity'] += $item['quantity'];
            } else {
                $new_array[$key] = $item;
            }
        }

        $new_array = array_values($new_array); // reindex the array

        return $new_array;
    }
    public function checkquantity($connection,$agentid,$userid){
        $sql="Select * from cart where gasagent_id='$agentid' and user_id='$userid'";
        $result=$connection->query($sql);
        $stockid=$this->stock_manager($connection);
        if($agentid==$stockid){
            if($result->num_rows===0){
                return false;
            }else{
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];

                    $weight1=explode(" ",$weight);
                    $count=count($weight1);
                    $Product_type=$weight1[$count-1];
                    $category=$type;
                    //name equals to the rest of the words
                    $name="";
                    for($i=0;$i<$count-1;$i++){
                        $name=$name.$weight1[$i]." ";
                    }
                    $sql3="select quantity from product where Name='$name' and Product_type='$Product_type' and Category='$category'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $quantityall=$row['quantity'];
                    $error_item=[];
                    array_push($error_item,['type'=>$type,'weight'=>$weight,'quantity'=>$quantityall]);
                    $_SESSION['error_item']=$error_item;
                    if($quantityall<$quantity){
                        return false;
                    }
                }
                return true;
            }
        }else{
            if($result->num_rows===0){
                return false;
            }else{
                //if there are items with same weight and type, then add the quantity
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];

                    $sql3="select company_id from gas_company where company_name='$type'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $companyid=$row['company_id'];
                    
                    $sql4="select Cylinder_Id from gascylinder where Type='$companyid' and Weight='$weight'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $cylinderid=$row['Cylinder_Id'];

                    $sql5="select quantity from sell_gas where Cylinder_Id='$cylinderid' and gasagent_id='$agentid'";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $quantityall=$row['quantity'];

                    $error_item=[];
                    array_push($error_item,['type'=>$type,'weight'=>$weight,'quantity'=>$quantityall]);
                    $_SESSION['error_item']=$error_item;
                    if($quantityall<$quantity){
                        return false;
                    }
                }
                return true;
            }
        }

    }
    public function stock_manager($connection){
        $sql="Select id from stock_manager";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['id'=>$row['id']]);
            }
        }
        return $answer[0]['id'];
    }
    public function order($connection,$agent,$userid,$amount){
        //change the time to sri lanka time zone
        date_default_timezone_set("Asia/Colombo");
        $time=date("h:i:sa");
        $date=date("Y-m-d");
        $delivery_method=$_SESSION['delivery_method'];
        $latitude=$_SESSION['cdlatitude'];
        $longitude=$_SESSION['cdlongitude'];
        $delivery_fee=$_SESSION['delivery_fee'];
        $amount=$amount-$delivery_fee;
        if($delivery_method=="Delivered by agent"){
            $delivery_status="0";
        }else if($delivery_method=="Reserve"){
            $delivery_status="2";
        }else if($delivery_method=="Courier service"){
            $delivery_status="3";
        }

        $sql="insert into `order` (Time,Order_date,Delivery_Method,Order_Status,Amount,Delivery_Status,Delivery_fee,latitude,longitude) values ('$time','$date','$delivery_method','1','$amount','$delivery_status','$delivery_fee','$latitude','$longitude')";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function placeorder($connection,$userid,$agent){
        $stock_manager=$this->stock_manager($connection);
        if($agent==$stock_manager){
            $sql="Select * from cart where gasagent_id='$agent' and user_id='$userid'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];
                    $price=$item['price'];

                    $weight1=explode(" ",$weight);
                    $count=count($weight1);
                    $Product_type=$weight1[$count-1];
                    $category=$type;
                    //name equals to the rest of the words
                    $name="";
                    for($i=0;$i<$count-1;$i++){
                        $name=$name.$weight1[$i]." ";
                    }
                    $sql3="select item_code from product where Name='$name' and Product_type='$Product_type' and Category='$category'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $productid=$row['item_code'];

                    $this->updatestock($connection,$quantity,$productid);

                    $sql4="select price from product where item_code='$productid'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $price=$row['price'];

                    $sql5="select Order_Id from `order` order by Order_Id desc limit 1";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $orderid=$row['Order_Id'];

                    $sql6="insert into shop_placeorder (Product_id,Order_id,StockManager_id,Customer_Id,Quantity,price) values ('$productid','$orderid','$agent','$userid','$quantity','$price')";
                    $result6=$connection->query($sql6);
                    if(!$result6){
                        return false;
                    }
                }
                return true;
            } 
        }else{
            $sql="Select * from cart where gasagent_id='$agent' and user_id='$userid'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                return false;
            }else{
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];
                    $price=$item['price'];
                    $cylinder_type=$item['cylinder_type'];

                    $sql3="select company_id from gas_company where company_name='$type'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $companyid=$row['company_id'];
                    
                    $sql4="select Cylinder_Id from gascylinder where Type='$companyid' and Weight='$weight'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $cylinderid=$row['Cylinder_Id'];

                    $this->updateagent($connection,$agent,$quantity,$cylinderid);

                    $sql5="select Order_Id from `order` order by Order_Id desc limit 1";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $orderid=$row['Order_Id'];

                    $sql6="insert into placeorder(Cylinder_Id,cylinder_type,Order_Id,GasAgent_Id,Customer_Id,Quantity,Price) values ('$cylinderid','$cylinder_type','$orderid','$agent','$userid','$quantity','$price')";
                    $result6=$connection->query($sql6);
                    if(!$result6){
                        return false;
                    }
                }
                return true;
            }
        }
    }
    public function pay($connection,$agent,$amount){
        $sql="select Order_Id from `order` order by Order_Id desc limit 1";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
        $orderid=$row['Order_Id'];

        $stock_manager=$this->stock_manager($connection);

        if($_SESSION['delivery_method']=="Reserve" && $agent!=$stock_manager){
            $sql="insert into payment(order_id,user_id,staff_id,amount,date,paid) values('$orderid','$agent',NULL,'$amount',NULL,'0')";
            $result=$connection->query($sql);
            if(!$result){
                return false;
            }
        }
        return true;
    }
    public function emptycart($connection,$userid,$agent){
        $sql="delete from cart where user_id='$userid' and gasagent_id='$agent'";
        $result=$connection->query($sql);
        if(!$result){
            return false;
        }else{
            $sql="SELECT distinct gasagent_id FROM cart WHERE User_id='$userid'";
            $result=$connection->query($sql);
            if($result->num_rows > 0){
                $_SESSION['cartcount']=$result->num_rows;
            }else{
                $_SESSION['cartcount']=0;
            }
            return true;
        }
    }
    public function getorderdetails($connection,$userid,$agent){
        $stock_manager=$this->stock_manager($connection);
        //get customer name,email,order id,order date,shop name,item name,quantity,price
        $sql="select * from cart where user_id='$userid' and gasagent_id='$agent'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            if($stock_manager==$agent){
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                $answer=[];
                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];
                    $price=$item['price'];

                    $weight1=explode(" ",$weight);
                    $count=count($weight1);
                    $Product_type=$weight1[$count-1];
                    $category=$type;
                    //name equals to the rest of the words
                    $name="";
                    for($i=0;$i<$count-1;$i++){
                        $name=$name.$weight1[$i]." ";
                    }
                    $sql3="select item_code from product where Name='$name' and Product_type='$Product_type' and Category='$category'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $productid=$row['item_code'];

                    $sql4="select price from product where item_code='$productid'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $price=$row['price'];

                    $sql5="select Order_Id,order_date from `order` order by Order_Id desc limit 1";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $orderid=$row['Order_Id'];
                    $order_date=$row['order_date'];

                    $shop="Fago Shop";


                    $sql8="select * from user where User_id='$userid'";
                    $result8=$connection->query($sql8);
                    $row=$result8->fetch_assoc();
                    $firstname=$row['First_Name'];
                    $lastname=$row['Last_Name'];
                    $username=$firstname." ".$lastname;
                    $useremail=$row['Email'];

                    $sql="select amount,delivery_fee,delivery_method from `order` where Order_Id='$orderid'";
                    $result=$connection->query($sql);
                    $row=$result->fetch_assoc();
                    $amount=$row['amount'];
                    $delivery_fee=$row['delivery_fee'];
                    $total=$amount+$delivery_fee;
                    $delivery_method=$row['delivery_method'];

                    $answer[]=array("name"=>$username,"email"=>$useremail,"orderid"=>$orderid,"orderdate"=>$order_date,"shop"=>$shop,"itemname"=>$name,"quantity"=>$quantity,"price"=>$price,"total"=>$total,"delivery_fee"=>$delivery_fee,"delivery_method"=>$delivery_method);
                }
            }else{
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $result=$this->addquantity($result);

                $answer=[];
                $sql="select * from cart where user_id='$userid' and gasagent_id='$agent'";
                $result=$connection->query($sql);
                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];
                    $price=$item['price'];
                    $cylinder_type=$item['cylinder_type'];

                    $sql3="select company_id from gas_company where company_name='$type'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $companyid=$row['company_id'];
                    
                    $sql4="select Cylinder_Id from gascylinder where Type='$companyid' and Weight='$weight'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $cylinderid=$row['Cylinder_Id'];

                    $sql5="select Order_Id,order_date from `order` order by Order_Id desc limit 1";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $orderid=$row['Order_Id'];
                    $order_date=$row['order_date'];

                    $sql6="select * from gasagent where GasAgent_Id='$agent'";
                    $result6=$connection->query($sql6);
                    $row=$result6->fetch_assoc();
                    $shop=$row['Shop_name'];

                    $itemname=$type." ".$weight." ".$cylinder_type." Cylinder";

                    $sql8="select * from user where User_id='$userid'";
                    $result8=$connection->query($sql8);
                    $row=$result8->fetch_assoc();
                    $firstname=$row['First_Name'];
                    $lastname=$row['Last_Name'];
                    $username=$firstname." ".$lastname;
                    $useremail=$row['Email'];

                    $sql="select amount,delivery_fee,delivery_method from `order` where Order_Id='$orderid'";
                    $result=$connection->query($sql);
                    $row=$result->fetch_assoc();
                    $amount=$row['amount'];
                    $delivery_fee=$row['delivery_fee'];
                    $total=$amount+$delivery_fee;
                    $delivery_method=$row['delivery_method'];

                    array_push($answer,['name'=>$username,'email'=>$useremail,'orderid'=>$orderid,'orderdate'=>$order_date,'shop'=>$shop,'itemname'=>$itemname,'quantity'=>$quantity,'price'=>$price,'total'=>$total,'delivery_fee'=>$delivery_fee,'delivery_method'=>$delivery_method]);
                }
            }
            return $answer;
        }

    }
    public function updateagent($connection,$agent,$quantity,$cylinderid){
        $sql="update sell_gas set Quantity=quantity-'$quantity' where GasAgent_Id='$agent' and Cylinder_Id='$cylinderid'";
        $result=$connection->query($sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }
    public function updatestock($connection,$quantity,$item_code){
        $sql="update product set Quantity=Quantity-'$quantity' where item_code='$item_code'";
        $result=$connection->query($sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }
}