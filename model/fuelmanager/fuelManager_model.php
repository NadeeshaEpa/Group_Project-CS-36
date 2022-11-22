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

    public function setDetails($firstname='',$lastname='',$username='',$street='',$city='',$postalcode='',$password='',$nic='',$email='', $contactnumber='',$BRegNo=''){
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
        $this->Type="FuelManager";
    }
    public function setUserId($connection){
        $sql = "SELECT * FROM user";
        $result = $connection->query($sql);
        $num=$result->num_rows+1;
        $this->User_id='FuelM'.$num;
    }

    public function getUserId($connection){
        return $this->User_id;
    }

    private function CreateUserEntry($connection){
        $sql="INSERT INTO user (User_id,First_Name,Last_Name,City,Street,Postalcode,Username,Password,Email,Type) VALUES ('$this->User_id',
        '$this->Firstname','$this->Lastname','$this->City','$this->Street','$this->Postalcode','$this->Username','$this->Password','$this->Email','$this->Type')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
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
        $sql="INSERT INTO fuelmanager(FuelManager_Id, NIC,NextArrival_date,BusinessReg_No, Staff_Id, Registration_date,Status) VALUES ('$this->User_id','$this->Nic',NULL,$this->BusinessReg_No,NULL,NULL,'0')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function registerFuelManager($connection){
        $this->setUserId($connection);
        $result1=$this->CreateUserEntry($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setFuelManager($connection);

        if($result1 && $result2 && $result3){
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