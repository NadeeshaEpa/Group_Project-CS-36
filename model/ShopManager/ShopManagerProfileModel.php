<?php 
class shopManager{
    private $User_id;
    public function getShopManagerDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT u.Username,u.Email,u.First_Name,u.Last_Name,u.City,u.Street,u.Postalcode,c.Contact_No,u.Password,s.NIC FROM user u INNER JOIN user_contact c on u.User_id=c.User_id INNER JOIN stock_manager s on u.User_id=s.id WHERE u.User_id=$this->User_id";
<<<<<<< HEAD
        
=======
       
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
        $result=mysqli_query($connection,$sql);
        if($result->num_rows===0){
            return false;
            
        }else{
            $answer=array();
            while($row=$result->fetch_assoc()){
                array_push($answer,['Username'=>$row['Username'],'Email'=>$row['Email'],'First_Name'=>$row['First_Name'],'Last_Name'=>$row['Last_Name'],'City'=>$row['City'],'Street'=>$row['Street'],'Postalcode'=>$row['Postalcode'],'Contact_No'=>$row['Contact_No'],'Password'=>md5($row['Password']),'NIC'=>$row['NIC']]);
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

    public function UpdateNic($connection,$array){
        $sql="UPDATE `stock_manager` SET `NIC`='$array[1]' WHERE id='$array[0]'";
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
<<<<<<< HEAD
            $sql3="DELETE FROM `stock_manager` WHERE id='$User_id'";
            
            $result3=$connection->query($sql3);
            $sql5="DELETE FROM `profileimg` WHERE User_id='$User_id'";
            $result5=$connection->query($sql5);
            //enable foreign key checks
            $sql4="SET FOREIGN_KEY_CHECKS=1";
            $result4=$connection->query($sql4);
            if($result1===true && $result2===true && $result3===true && $result4===true && $result5==true){
                
=======
            $sql3="DELETE FROM `deliveryperson` WHERE DeliveryPerson_Id='$User_id'";
            $result3=$connection->query($sql3);
            // $sql5="DELETE FROM `profileimg` WHERE User_id='$User_id'";
            // $result5=$connection->query($sql5);
            //enable foreign key checks
            $sql4="SET FOREIGN_KEY_CHECKS=1";
            $result4=$connection->query($sql4);
            if($result1===true && $result2===true && $result3===true && $result4===true ){
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                return true;
            }else{
                return false;
            }      
        }else{
            return false;
        }
    }
<<<<<<< HEAD
    public function updateImage($connection,$user_id,$fileNameNew){
        //update image name and status
        $sql="UPDATE `profileimg` SET `imgname`='$fileNameNew',`status`=1 WHERE User_id='$user_id'";
        
        $result=$connection->query($sql);
        if($result){
            $_SESSION['User_img']=$fileNameNew;
            $_SESSION['img-status']="1";
            return true;
        }else{
            return false;
        }

    }
    public function removeImage($connection,$User_id){
        $sql="UPDATE `profileimg` SET `imgname`='noprofile.png',`status`=0 WHERE User_id='$User_id'";
        $result=$connection->query($sql);
        if($result){
            $_SESSION['User_img']="noprofile.png";
            $_SESSION['img-status']="0";
            return true;
        }else{
            return false;
        }
    }
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
}