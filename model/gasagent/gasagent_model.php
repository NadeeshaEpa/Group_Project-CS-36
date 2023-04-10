<?php
class gasagent_model{
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
    private $business_reg_num;
    private $shopnumber;
    private $nic;
    private $accountno;
    private $Shopname;
    private $gastype;
    private $latitude;
    private $longitude;
    private $opentime;
    private $closetime;

    public function setDetails($firstname='',$lastname='',$username='',$street='',$city='',$postalcode='',$password='',$email='', $contactnumber='',$business_reg_num='',$shopnumber='',$nic='',$accountnum='',$shopname='',$gastype='', $latitude='', $longitude='', $opentime='', $closetime=''){
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Username=$username;
        $this->Street=$street;
        $this->City=$city;
        $this->Postalcode=$postalcode;
        $this->Password=$password;
        $this->Email=$email;
        $this ->Contactnumber=$contactnumber;
        $this->business_reg_num=$business_reg_num;
        $this->shopnumber=$shopnumber;
        $this->nic=$nic;
        $this->accountno=$accountnum;
        $this->Shopname=$shopname;
        $this->gastype=$gastype;
        $this->latitude=$latitude;
        $this->longitude=$longitude;
        $this->opentime=$opentime;
        $this->closetime=$closetime;
        $this->Type="gasagent";
    }

    private function CreateUserEntry($connection){
        $sql="INSERT INTO user (User_id,First_Name,Last_Name,City,Street,Postalcode,Username,Password,Email,Type) VALUES ('','$this->Firstname','$this->Lastname','$this->City','$this->Street','$this->Postalcode','$this->Username','$this->Password','$this->Email','$this->Type')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }
    public function setUserId($connection){
        $sql = "SELECT User_id FROM user order BY User_id DESC LIMIT 1";
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
    public function setHomecontact($connection){
        $sql2="INSERT INTO user_contact(User_id,Contact_No) VALUES ('$this->User_id','$this->shopnumber')";
        if($connection->query($sql2)){
            $_SESSION['registerMsg']="User contact updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setgasagent($connection){
        $sql="INSERT INTO gasagent(GasAgent_Id,NIC,Account_No,NextArrival_Date,BusinessReg_No,latitude,longitude,Staff_Id,Registration_date,Status,LastUpdatedTime,LastUpdatedDate,Shop_name,Gas_Type,open_time,closed_time) VALUES 
        ('$this->User_id','$this->nic','$this->accountno',NULL,'$this->business_reg_num','$this->latitude','$this->longitude',NULL,NULL,'0',NULL,NULL,'$this->Shopname','$this->gastype','$this->opentime','$this->closetime')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function Registergasagent($connection){
        $result1=$this->CreateUserEntry($connection);
        $this->setUserId($connection);
        $result2=$this->setContact($connection);
        $result4=$this->setHomecontact($connection);
        $result3=$this->setgasagent($connection);

        if($result1 && $result2 && $result3 && $result4){
            return true;
        }else{
            return false;
        }
    }
    public function logingasagent($connection,$username,$password){
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
            

            $r1="SELECT * FROM gasagent WHERE GasAgent_Id='$this->User_id' AND Status='1'";
            if($connection->query($r1)->num_rows > 0){
                $_SESSION['username']=$username;
                return true;
            }else{
                return false;
            }
            return true;
        }
        else{
            return false;
        }
    }
}