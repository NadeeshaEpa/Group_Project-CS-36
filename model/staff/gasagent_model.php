<?php
class gasagent_model{

    public function deleteuser($connection,$user_id){
        $sql = "UPDATE `gasagent` SET Status=2 WHERE GasAgent_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function activateuser($connection,$user_id){
        $sql = "UPDATE `gasagent` SET Status=1 WHERE GasAgent_Id='$user_id'";
        
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function decline($connection,$user_id){
        $sql = "DELETE FROM `gasagent` WHERE GasAgent_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function accept($connection,$user_id,$staff_id){
        date_default_timezone_set('Asia/Colombo');

    // Get current date in Y-m-d format
        $current_date = date('Y-m-d');
        $sql = "UPDATE `gasagent` SET Status=1,Staff_Id=$staff_id, Registration_date='$current_date' WHERE GasAgent_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function edituser($connection,$user_id){
        $sql="SELECT g.GasAgent_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, g.NIC, g.Registration_date,g.Account_No, g.BusinessReg_No,g.Shop_name,i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `gasagent` g ON u.User_id=g.GasAgent_Id INNER JOIN `profileimg` i ON g.GasAgent_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagent=[];
            while($row=$result->fetch_object()){
                array_push($gasagent,['GasAgent_Id'=>$row->GasAgent_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date,'Account_No'=>$row->Account_No,'BusinessReg_No'=>$row->BusinessReg_No,'Shop_name'=>$row->Shop_name]);
            }
            return $gasagent;
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

    public function updateGasagent($connection,$array){
        $sql="UPDATE `gasagent` SET `NIC`='$array[1]',`Shop_name`='$array[2]',`BusinessReg_No`='$array[3]',`Account_No`='$array[4]'  WHERE GasAgent_Id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function viewuser($connection,$user_id){
        $sql="SELECT g.GasAgent_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, g.NIC, g.Registration_date,g.Account_No, g.BusinessReg_No,g.Shop_name,i.imgname from `user` u INNER JOIN `user_contact` uc ON u.User_id=uc.User_id INNER JOIN `gasagent` g ON uc.User_id=g.GasAgent_Id INNER JOIN `profileimg` i ON g.GasAgent_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagent=[];
            while($row=$result->fetch_object()){
                array_push($gasagent,['GasAgent_Id'=>$row->GasAgent_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No,'imgname'=>$row->imgname, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date,'Account_No'=>$row->Account_No,'BusinessReg_No'=>$row->BusinessReg_No,'Shop_name'=>$row->Shop_name]);
                
            }
            return $gasagent;
        }
    }

    public function viewrequest($connection,$user_id){
        $sql="SELECT g.GasAgent_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, g.NIC,g.Account_No, g.BusinessReg_No,g.Shop_name,i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `gasagent` g ON u.User_id=g.GasAgent_Id INNER JOIN `profileimg` i ON g.GasAgent_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagent=[];
            while($row=$result->fetch_object()){
                array_push($gasagent,['GasAgent_Id'=>$row->GasAgent_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No,'imgname'=>$row->imgname, 'NIC'=>$row->NIC,'Account_No'=>$row->Account_No,'BusinessReg_No'=>$row->BusinessReg_No,'Shop_name'=>$row->Shop_name]);
            }
            return $gasagent;
        }
    }

    public function searchgasagent($connection,$name){
        $sql="SELECT * FROM user u INNER JOIN gasagent g ON u.User_id=g.GasAgent_Id WHERE u.Type='Gas Agent' AND g.Status=1 AND u.User_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $gasagent=[];
            while($row=mysqli_fetch_assoc($result)){
                $gasagent[]=$row;
            }
            // print_r($gasagent);
            return $gasagent;
        }else{
            return false;
        }
    }

    public function searchgasagent_request($connection,$name){
        $sql="SELECT * FROM user u INNER JOIN gasagent g ON u.User_id=g.GasAgent_Id WHERE u.Type='Gas Agent' AND g.Status=0 AND u.User_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $gasagent=[];
            while($row=mysqli_fetch_assoc($result)){
                $gasagent[]=$row;
            }
            // print_r($gasagent);
            return $gasagent;
        }else{
            return false;
        }
    }

}










    
