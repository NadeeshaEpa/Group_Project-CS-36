<?php
class fuel_manager{
    private $User_id;
    private $Firstname;
    private $Lastname;
    private $Username;
    private $Street;
    private $City;
    private $Postalcode;
    private $Password;
    private $Nic;
    private $Email;
    private $Type;
    private $Contactnumber;
    private $BusinessReg_No;
    private $ShopNAME;

    public function setDetails($firstname='',$lastname='',$username='',$street='',$city='',$postalcode='',$password='',$nic='',$email='', $contactnumber='',$BRegNo='',$shopName=''){
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Username=$username;
        $this->Street=$street;
        $this->City=$city;
        $this->Postalcode=$postalcode;
        $this->Password=$password;
        $this->Nic=$nic;
        $this->Email=$email;
        $this ->Contactnumber=$contactnumber;
        $this->BusinessReg_No=$BRegNo;
        $this->ShopNAME=$shopName;
        $this->Type="FuelManager";
    }
   

    private function CreateUserEntry($connection){
        $sql="INSERT INTO user (User_id,First_Name,Last_Name,City,Street,Postalcode,Username,Password,Email,Type) VALUES ('','$this->Firstname','$this->Lastname','$this->City','$this->Street','$this->Postalcode','$this->Username','$this->Password','$this->Email','$this->Type')";
        // var_dump($sql);
        // die();
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setUserId($connection){  
        $sql = "SELECT User_id FROM user order by User_id desc limit 1";
        $result = $connection->query($sql);
        $id=$result->fetch_assoc();
        $this->User_id=$id['User_id'];
        
    }

    public function getUserId($connection){
        return $this->User_id;
    }

    public function setContact($connection){
        $sql="INSERT INTO user_contact(User_id,Contact_No) VALUES ('$this->User_id','$this->Contactnumber')";
        
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User contact updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setFuelManager($connection){
        $sql="INSERT INTO fuelmanager(FuelManager_Id, NIC, NextArrival_date, BusinessReg_No, Staff_Id, Registration_date, Status, LastUpdatedTime, LastUpdatedDate,Shop_Name) VALUES ('$this->User_id','$this->Nic',NULL,'$this->BusinessReg_No',NULL,NULL,'0',NULL,NULL, '$this->ShopNAME')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function registerFuelManager($connection){
        
        $result1=$this->CreateUserEntry($connection);
        $this->setUserId($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setFuelManager($connection);

        if($result1 && $result2 && $result3 ){
            return true;
        }else{
            return false;
        }
    }
    
    //login validation
    public function loginFuelManager($connection,$username,$password){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
      
        $result = $connection->query($sql);
        // var_dump($result->num_rows);
        // die();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            // var_dump($row);
            // die();
            $this->User_id=$row['User_id'];
            $_SESSION['User_id']=$this->User_id;
            $this->Type=$row['Type'];
            $r1="SELECT * FROM fuelmanager WHERE FuelManager_Id='$this->User_id' AND Status='1'";
            // var_dump($connection->query($r1)->num_rows)
            // die();
            if($connection->query($r1)->num_rows > 0){

                //store user name and password
                $_SESSION['Firstname']=$row['First_Name'];
                $_SESSION['Lastname']=$row['Last_Name'];
                $_SESSION['Type']=$row['Type'];
                $_SESSION['password']=$password;
                $_SESSION['username']=$username;
                
                return true;
            }else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    

}