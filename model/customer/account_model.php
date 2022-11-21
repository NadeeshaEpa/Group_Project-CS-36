<?php
class account_model{
    public function viewAccount($connection,$User_id){
        $sql="SELECT u.Username,u.Email,u.First_Name,u.Last_Name,u.City,u.Street,u.Postalcode,c.Contact_No,u.Password FROM user u INNER JOIN user_contact c on u.User_id=c.User_id WHERE u.User_id='$User_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Username'=>$row['Username'],'Email'=>$row['Email'],'First_Name'=>$row['First_Name'],'Last_Name'=>$row['Last_Name'],'City'=>$row['City'],'Street'=>$row['Street'],'Postalcode'=>$row['Postalcode'],'Contact_No'=>$row['Contact_No'],'Password'=>md5($row['Password'])]);
            }
        }
        return $answer;
    }
    public function updateUsers($connection,$array){
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
}