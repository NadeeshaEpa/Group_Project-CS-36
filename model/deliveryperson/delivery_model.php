<?php
class delivery_model{
    private $User_id;
    private $Firstname;
    private $Lastname;
    private $Username;
    private $Street;
    private $City;
    private $Postalcode;
    private $Password;
    private $Email;
    private $Type;
    private $Contactnumber;
    private $Vehicletype;
    private $Vehiclenumber;
    private $NIC;
    private $Accnum;

    public function setDetails($firstname='',$lastname='',$username='',$street='',$city='',$postalcode='',$password='',$email='', $contactnumber='',$vehicletype='',$vehiclenumber='',$nic='',$accnum=''){
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Username=$username;
        $this->Street=$street;
        $this->City=$city;
        $this->Postalcode=$postalcode;
        $this->Password=$password;
        $this->Email=$email;
        $this ->Contactnumber=$contactnumber;
        $this ->Vehicletype=$vehicletype;
        $this ->Vehiclenumber=$vehiclenumber;
        $this->NIC=$nic;
        $this->Accnum=$accnum;
        $this->Type="Delivery_Person";
    }
    public function setUserId($connection){
        $sql = "SELECT * FROM deliveryperson";
        $result = $connection->query($sql);
        $num=$result->num_rows+1;
        $this->User_id='DP'.$num;
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

    public function setDelivery_person($connection){
        $sql="INSERT INTO deliveryperson(DeliveryPerson_Id,Vehicle_Type,Vehicle_No,NIC,Account_No,Staff_Id,Registration_date,Status) VALUES ('$this->User_id','$this->Vehicletype','$this->Vehiclenumber','$this->NIC','$this->Accnum',NULL,NULL,'0')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function RegisterDelivery_person($connection){
        $this->setUserId($connection);
        $result1=$this->CreateUserEntry($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setDelivery_person($connection);

        if($result1 && $result2 && $result3){
            return true;
        }else{
            return false;
        }
    }
    public function loginDelivery_Person($connection,$username,$password){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->User_id=$row['User_id'];
            $_SESSION['User_id']=$this->User_id;
            $this->Type=$row['Type'];
            $r1="SELECT * FROM deliveryperson WHERE DeliveryPerson_Id='$this->User_id' AND Status='1'";
            if($connection->query($r1)->num_rows > 0){
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