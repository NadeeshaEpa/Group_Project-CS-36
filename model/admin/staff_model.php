<?php
session_start();
class staff_model{
    private $User_id;
    private $Firstname;
    private $Lastname;
    private $Username;
    private $nic;
    private $Street;
    private $City;
    private $Postalcode;
    private $Password;
    private $Email;
    private $Type;
    private $Contactnumber;
   
    

    public function setDetails($firstname='',$lastname='',$username='',$nic='',$street='',$city='',$postalcode='',$password='',$email='', $contactnumber=''){
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Username=$username;
        $this ->nic=$nic;
        $this->Street=$street;
        $this->City=$city;
        $this->Postalcode=$postalcode;
        $this->Password=$password;
        $this->Email=$email;
        $this ->Contactnumber=$contactnumber;
        $this->Type="Staff";
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

    public function setStaff($connection){
        $admin_id=$_SESSION['User_id'];
        $sql="INSERT INTO staff(Staff_Id,NIC,Admin_Id,Registration_date,Status) VALUES ('$this->User_id','$this->nic','$admin_id',date('d-m-y'),'1')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function Registerstaff($connection){
        $result1=$this->CreateUserEntry($connection);
        $this->setUserId($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setStaff($connection);

        if($result1 && $result2 && $result3){
            return true;
        }else{
            return false;
        }
    }
    
    
}