<?php
class account_model{
    public function viewstaff($connection){
        $sql="SELECT * FROM user WHERE Type='Staff'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $staff=[];
            while($row=mysqli_fetch_assoc($result)){
                $staff[]=$row;
            }
            print_r($staff);
            return $staff;
        }else{
            return false;
        }
    }

    public function viewcustomer($connection){
        $sql="SELECT * FROM user WHERE Type='Customer'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $customer=[];
            while($row=mysqli_fetch_assoc($result)){
                $customer[]=$row;
            }
            print_r($customer);
            return $customer;
        }else{
            return false;
        }
    }
}