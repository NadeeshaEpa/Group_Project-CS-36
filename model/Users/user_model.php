<?php
class user_model{
    private $User_id;
    private $Type;

    public function loginUser($connection,$username,$password){   //check whether the user entered correct username and password and the status is 1.
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $this->User_id=$row['User_id'];
            
            $_SESSION['User_id']=$this->User_id;
            $_SESSION['Username']=$row['Username'];
            $_SESSION['Firstname']=$row['First_Name'];
            $_SESSION['Lastname']=$row['Last_Name'];
            $_SESSION['Type']=$row['Type'];
            $this->Type=$row['Type'];

            $img="SELECT img_id,status,imgname FROM profileimg WHERE User_id='$this->User_id'";
            $resultimg=$connection->query($img);
            $rowimg=$resultimg->fetch_assoc();
            $_SESSION['img_id']=$rowimg['img_id'];
            $_SESSION['img-status']=$rowimg['status'];
            $_SESSION['User_img']=$rowimg['imgname'];
            
            if($this->Type=="Customer"){
                $r1="SELECT * FROM customer WHERE Customer_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
            else if($this->Type=="Delivery_Person"){
                $r1="SELECT * FROM deliveryperson WHERE DeliveryPerson_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
            else if($this->Type=="gasagent"){
                $r1="SELECT * FROM gasagent WHERE GasAgent_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
            else if($this->Type=="FuelManager"){
                $r1="SELECT * FROM fuelmanager WHERE FuelManager_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
            else if($this->Type=="Admin" || $this->Type=="Staff"){
                return true;   //login will be successful
            }else{
                $_SESSION['login_attempts']+=1;
                return false;   //login will be unsuccessful
            }
        }
        else{
            $_SESSION['login_attempts']+=1;
            return false;   //login will be unsuccessful
        }
    }
    public function gastype($connection){
        $sql="SELECT company_name from gas_company";
        $result=$connection->query($sql);
        $gastype=array();
        foreach($result as $row){
            $gastype[]=$row['company_name'];
        }
        return $gastype;
    }

    public function getUserDetails($connection){
        $sql="SELECT u.Username,u.Email,u.First_Name,u.Last_Name,u.City,u.Street,u.Postalcode,c.Contact_No,u.Password,d.Account_No FROM user u INNER JOIN user_contact c on u.User_id=c.User_id INNER JOIN deliveryperson d on u.User_id=d.DeliveryPerson_Id WHERE u.User_id='$this->User_id'";
        
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Username'=>$row['Username'],'Email'=>$row['Email'],'First_Name'=>$row['First_Name'],'Last_Name'=>$row['Last_Name'],'City'=>$row['City'],'Street'=>$row['Street'],'Postalcode'=>$row['Postalcode'],'Contact_No'=>$row['Contact_No'],'Password'=>md5($row['Password']),'Account_No'=>$row['Account_No']]);
            }
        }
        return $answer;

    }

   
}