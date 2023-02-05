<?php
class delivaryProf_model{


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

    public function updateAccount_No($connection,$array){
        $sql="UPDATE `deliveryperson` SET `Account_No`='$array[1]' WHERE DeliveryPerson_Id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updatePassword($connection,$User_id,$oldpwd,$newpwd,$confirmpwd){
        $hash=md5($oldpwd);
        $sql="SELECT Password FROM user WHERE User_id='$User_id' AND Password='$hash'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $newpwdhash=md5($newpwd);
            $sql="UPDATE `user` SET `Password`='$newpwdhash' WHERE User_id='$User_id'";
            $result=$connection->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

    public function deleteAccount($connection,$User_id){
        //set foreign key checks to 0
        $sql="SET FOREIGN_KEY_CHECKS=0";
        $result=$connection->query($sql);
        if($result){
            $sql1="DELETE FROM `user` WHERE User_id='$User_id'";
            $result1=$connection->query($sql1);
            $sql2="DELETE FROM `user_contact` WHERE User_id='$User_id'";
            $result2=$connection->query($sql2);
            $sql3="DELETE FROM `deliveryperson` WHERE DeliveryPerson_Id='$User_id'";
            $result3=$connection->query($sql3);
            // $sql5="DELETE FROM `profileimg` WHERE User_id='$User_id'";
            // $result5=$connection->query($sql5);
            //enable foreign key checks
            $sql4="SET FOREIGN_KEY_CHECKS=1";
            $result4=$connection->query($sql4);
            if($result1===true && $result2===true && $result3===true && $result4===true ){
                return true;
            }else{
                return false;
            }      
        }else{
            return false;
        }
    }

   

}