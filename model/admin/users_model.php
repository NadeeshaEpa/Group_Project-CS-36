<?php
class user_model{

public function count_customers($connection){
    $sql="SELECT COUNT(Customer_Id) AS num_customers FROM `customer` WHERE Status=1";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function count_gasagents($connection){
    $sql="SELECT COUNT(GasAgent_Id) AS num_gasagents FROM `gasagent` WHERE Status=1";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function count_deliverypersons($connection){
    $sql="SELECT COUNT(DeliveryPerson_Id) AS num_delivery FROM `deliveryperson` WHERE Status=1";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function count_staff($connection){
    $sql="SELECT COUNT(Staff_Id) AS num_staff FROM `staff` WHERE Status=1";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function deleteuser($connection,$user_id){
    $sql = "DELETE FROM `user` WHERE User_id='$user_id'";
   
    $result=$connection->query($sql);
    if($result==TRUE){
        return TRUE;
    }else{
        return FALSE;
    }
}

public function viewdisabledacc($connection){
    $sql="SELECT u.User_id,u.First_Name,u.Last_Name,u.Type,u.Email,u.Username FROM user u INNER JOIN staff s ON u.User_id=s.Staff_Id WHERE s.Status=2 UNION (SELECT u.User_id,u.First_Name,u.Last_Name,u.Type,u.Email,u.Username FROM user u INNER JOIN customer c ON u.User_id=c.Customer_Id WHERE c.Status=2 UNION (SELECT u.User_id,u.First_Name,u.Last_Name,u.Type,u.Email,u.Username FROM user u INNER JOIN deliveryperson d ON u.User_id=d.DeliveryPerson_Id WHERE d.Status=2 UNION SELECT u.User_id,u.First_Name,u.Last_Name,u.Type,u.Email,u.Username FROM user u INNER JOIN gasagent g ON u.User_id=g.GasAgent_Id WHERE g.Status=2))";
    $result=mysqli_query($connection,$sql);
    if($result){
        $user=[];
        while($row=mysqli_fetch_assoc($result)){
            $user[]=$row;
        }
        // print_r($user);
        return $user;
    }else{
        return false;
    }
}



}


?>