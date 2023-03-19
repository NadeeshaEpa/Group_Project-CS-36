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

public function count_customerrequest($connection){
    $sql="SELECT COUNT(Customer_Id) AS num_customers FROM `customer` WHERE Status=0";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function count_gasagentrequest($connection){
    $sql="SELECT COUNT(GasAgent_Id) AS num_gasagents FROM `gasagent` WHERE Status=0";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

public function count_deliverypersonrequest($connection){
    $sql="SELECT COUNT(DeliveryPerson_Id) AS num_delivery FROM `deliveryperson` WHERE Status=0";
    $result=$connection->query($sql);
    if($result){
        return $result->fetch_assoc();
    }else{
        return false;
    }
}



}


?>