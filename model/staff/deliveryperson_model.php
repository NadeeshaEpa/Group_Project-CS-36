<?php
class deliveryperson_model{

    public function deleteuser($connection,$user_id){
        $sql = "UPDATE `deliveryperson` SET Status=2 WHERE DeliveryPerson_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function edituser($connection,$user_id){
        $sql="SELECT d.DeliveryPerson_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, d.NIC, d.Registration_date,d.Account_No, d.Vehicle_No,d.Vehicle_Type,i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `deliveryperson` d ON u.User_id=d.DeliveryPerson_Id INNER JOIN `profileimg` i ON d.DeliveryPerson_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $deliveryperson=[];
            while($row=$result->fetch_object()){
                array_push($deliveryperson,['DeliveryPerson_Id'=>$row->DeliveryPerson_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No,'imgname'=>$row->imgname, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date,'Account_No'=>$row->Account_No,'Vehicle_No'=>$row->Vehicle_No,'Vehicle_Type'=>$row->Vehicle_Type]);
            }
            return $deliveryperson;
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

    public function updateDeliveryPerson($connection,$array){
        $sql="UPDATE `deliveryperson` SET `NIC`='$array[1]',`Vehicle_Type`='$array[2]',`Vehicle_No`='$array[3]',`Account_No`='$array[4]'  WHERE DeliveryPerson_Id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function viewuser($connection,$user_id){
        $sql="SELECT d.DeliveryPerson_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, d.NIC, d.Registration_date,d.Account_No, d.Vehicle_No,d.Vehicle_Type,i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `deliveryperson` d ON u.User_id=d.DeliveryPerson_Id INNER JOIN `profileimg` i ON d.DeliveryPerson_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $deliveryperson=[];
            while($row=$result->fetch_object()){
                array_push($deliveryperson,['DeliveryPerson_Id'=>$row->DeliveryPerson_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No,'imgname'=>$row->imgname, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date,'Account_No'=>$row->Account_No,'Vehicle_No'=>$row->Vehicle_No,'Vehicle_Type'=>$row->Vehicle_Type]);
            }
            return $deliveryperson;
        }
    }

    public function viewrequest($connection,$user_id){
        $sql="SELECT d.DeliveryPerson_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, d.NIC,d.Account_No, d.Vehicle_No,d.Vehicle_Type,i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `deliveryperson` d ON u.User_id=d.DeliveryPerson_Id INNER JOIN `profileimg` i ON d.DeliveryPerson_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $deliveryperson=[];
            while($row=$result->fetch_object()){
                array_push($deliveryperson,['DeliveryPerson_Id'=>$row->DeliveryPerson_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No,'imgname'=>$row->imgname, 'NIC'=>$row->NIC,'Account_No'=>$row->Account_No,'Vehicle_No'=>$row->Vehicle_No,'Vehicle_Type'=>$row->Vehicle_Type]);
            }
            return $deliveryperson;
        }
    }

    public function decline($connection,$user_id){
        $sql = "DELETE FROM `deliveryperson` WHERE DeliveryPerson_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function accept($connection,$user_id){
        $sql = "UPDATE `deliveryperson` SET Status=1 WHERE DeliveryPerson_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}










    
