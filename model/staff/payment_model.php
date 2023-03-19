<?php
class payment_model
{
    public function viewgaspayment($connection)
    {      
        $sql="SELECT p.User_Id,u.First_Name,u.Last_Name,p.Paid,SUM(p.Amount) AS sales from `payment` p INNER JOIN `user` u ON p.User_Id=u.User_id WHERE p.Paid=0 AND u.Type='Gas Agent' GROUP BY p.User_Id";
        $result = mysqli_query($connection, $sql);
        $payment = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $payment[] = $row;
            }
            // print_r($payment);
            return $payment;
        } else {
            return $payment;
        }
    }

    public function viewdeliverypayment($connection)
    {      
        $sql="SELECT p.User_Id,u.First_Name,u.Last_Name,p.Paid,SUM(p.Amount) AS fee from `payment` p INNER JOIN `user` u ON p.User_Id=u.User_id WHERE p.Paid=0 AND u.Type='Delivery Person' GROUP BY p.User_Id";
        $result = mysqli_query($connection, $sql);
        $payment = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $payment[] = $row;
            }
            // print_r($payment);
            return $payment;
        } else {
            return $payment;
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


}
?>
