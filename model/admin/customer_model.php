<?php

class customer_model{
    // public function findContact($connection,$user_id){
    //     $sql="SELECT Contact_No from `user_contact` WHERE User_id='$user_id'";
    //     $result=$connection->query($sql);
    //     if($result->num_rows===0){
    //         return false;
    //     }else{
    //         while($row=$result->fetch_object()){
    //             array_push($contact,['Contact_No'=>$row->Contact_No]);            
    //         }
    //         return $contact;
    //     }
    // } 


    public function viewuser($connection,$user_id){
        $sql = "SELECT c.Customer_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, c.ElectricityBill_No, c.Registration_date, i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `customer` c ON u.User_id=c.Customer_Id INNER JOIN `profileimg` i ON c.Customer_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $customer=[];
            while($row=$result->fetch_object()){
                array_push($customer,['Customer_Id'=>$row->Customer_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No, 'ElectricityBill_No'=>$row->ElectricityBill_No,'imgname'=>$row->imgname,'Registration_date'=>$row->Registration_date]);
            }
            return $customer;
        }
    }
    public function deleteuser($connection,$user_id){
        $sql = "UPDATE `customer` SET Status=2 WHERE Customer_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edituser($connection,$user_id){
        $sql = "SELECT c.Customer_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, c.ElectricityBill_No, c.Registration_date, i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `customer` c ON u.User_id=c.Customer_Id INNER JOIN `profileimg` i ON c.Customer_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $customer=[];
            while($row=$result->fetch_object()){
                array_push($customer,['Customer_Id'=>$row->Customer_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No, 'ElectricityBill_No'=>$row->ElectricityBill_No]);
            }
            return $customer;
        }      
    }
    
    public function updateUser($connection,$array){
        $sql="UPDATE `user` SET `First_Name`='$array[1]',`Last_Name`='$array[2]',`City`='$array[3]',`Street`='$array[4]',`Postalcode`='$array[5]',`Username`='$array[6]',`Email`='$array[7]' WHERE User_id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateContacts($connection,$array){
        $sql="UPDATE `user_contact` SET `Contact_No`='$array[1]' WHERE User_id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function searchcustomer($connection,$name){
        $sql="SELECT * FROM user u INNER JOIN customer c ON u.User_id=c.Customer_Id WHERE u.Type='Customer' AND c.Status=1 AND u.User_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $customer=[];
            while($row=mysqli_fetch_assoc($result)){
                $customer[]=$row;
            }
            
            return $customer;
        }else{
            return false;
        }
    }

    
}









