<?php
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
        $sql = "SELECT * FROM staff";
        $result = $connection->query($sql);
        $num=$result->num_rows+1;
        $this->User_id='STF'.$num;
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
        $sql="INSERT INTO staff(Staff_Id,NIC,Admin_Id,Registration_date) VALUES ('$this->User_id','$this->nic',NULL,NULL)";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function Registerstaff($connection){
        $this->setUserId($connection);
        $result1=$this->CreateUserEntry($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setStaff($connection);

        if($result1 && $result2 && $result3){
            return true;
        }else{
            return false;
        }
    }
    
    
}