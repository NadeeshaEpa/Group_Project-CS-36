<?php
class dashboard_model
{
    public function viewprofit($connection)
    {      
        date_default_timezone_set('Asia/Colombo');

        // Get current date in Y-m-d format
        $current_date = date('Y-m-d'); 
        $sql="SELECT o.Order_id,o.Order_date,o.Delivery_fee*0.2 AS profit,u.First_Name,u.Last_Name,i.imgname from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Status=0 AND o.Order_date='$current_date' OR o.Delivery_Status=1 AND o.Order_date='$current_date' UNION SELECT o.Order_id,o.Order_date,o.Delivery_fee*0.2 AS profit,u.First_Name,u.Last_Name,i.imgname from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Status=0 AND o.Order_date='$current_date' OR o.Delivery_Status=1 AND o.Order_date='$current_date'";
        $result = mysqli_query($connection, $sql);
        $profit = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $profit[] = $row;
            }
            // print_r($profit);
            return $profit;
        } else {
            return $profit;
        }
    }
    
    public function viewprofit_bydate($connection,$date)
    {      
        $sql="SELECT o.Order_id,o.Order_date,o.Delivery_fee*0.2 AS profit,u.First_Name,u.Last_Name,i.imgname from `order` o INNER JOIN `placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Status=0 AND o.Order_date='$date'  OR o.Delivery_Status=1 AND o.Order_date='$date' UNION SELECT o.Order_id,o.Order_date,o.Delivery_fee*0.2 AS profit,u.First_Name,u.Last_Name,i.imgname from `order` o INNER JOIN `shop_placeorder` p ON o.Order_id=p.Order_Id INNER JOIN `user` u ON p.Customer_Id=u.User_id INNER JOIN `profileimg` i ON u.User_id=i.User_id WHERE o.Delivery_Status=0 AND o.Order_date='$date' OR o.Delivery_Status=1 AND o.Order_date='$date'";
        $result = mysqli_query($connection, $sql);
        $profit = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $profit[] = $row;
            }
            // print_r($profit);
            return $profit;
        } else {
            return $profit;
        }
    }

    public function dashboard($connection)
    {  
        date_default_timezone_set('Asia/Colombo');

        // Get current date in Y-m-d format
        $current_date = date('Y-m-d');    
        $sql1="SELECT COUNT(Customer_Id) as customers FROM `customer` WHERE Status=1 AND Registration_date='$current_date'";
        $sql2="SELECT COUNT(Order_id) as orders FROM `order` WHERE Order_date='$current_date' ";
        $sql3="SELECT SUM(Amount) as amount FROM `order` WHERE Order_date='$current_date'";

        $result1 = mysqli_query($connection, $sql1);
        $customer=$result1->fetch_assoc();

        $result2=mysqli_query($connection, $sql2);
        $order=$result2->fetch_assoc();

        $result3=mysqli_query($connection, $sql3);
        $amount=$result3->fetch_assoc();

        $dashboard = [];
        if ($result1) {    
            array_push($dashboard,['customers'=>$customer['customers'],'orders'=>$order['orders'],'amount'=>$amount['amount']]);
            return $dashboard;
        } else {
            return $dashboard;
        }
    }
    

}

?>