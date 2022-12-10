<?php

class fuel_manager_insert{
    
    public function setArrivalDate($connection,$firstname,$nic,$username,$date){
        $sql1="SELECT * FROM user WHERE First_Name='$firstname' AND Username='$username'";
        $sql2="SELECT * FROM fuelmanager WHERE Nic='$nic'";
        $result1=$connection->query($sql1);
        $result2=$connection->query($sql2);
        if(($result1->num_rows >0) && ($result2->num_rows >0)){
            $sql="UPDATE fuelmanager SET NextArrival_date='$date' WHERE NIC='$nic";
            if($connection->query($sql)){
                $_SESSION['SetArrivalDate']="Set arrival Date Successfully";
                return true;
            }else{
                $_SESSION['dateSetError']="Set arrival Date UnSuccessfully";
                return false;
            }
            return true;
        }
        else{
            return false;
        }
    }
}