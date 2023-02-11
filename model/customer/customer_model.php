<?php
class customer_model{
    private $User_id;  //crete private variables for all the attributes of customer
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
    private $Billnum;
    private $Latitude;
    private $Longitude;

    public function setDetails($firstname='',$lastname='',$username='',$street='',$city='',$postalcode='',$password='',$email='', $contactnumber='',$billnum='', $latitude='',$longitude=''){
        $this->Firstname=$firstname;  //assign values to private variables from the parameters(values user entered in the registration form)
        $this->Lastname=$lastname;
        $this->Username=$username;
        $this->Street=$street;
        $this->City=$city;
        $this->Postalcode=$postalcode;
        $this->Password=$password;
        $this->Email=$email;
        $this ->Contactnumber=$contactnumber;
        $this->Billnum=$billnum;
        $this->Latitude=$latitude;
        $this->Longitude=$longitude;
        $this->Type="Customer";
    }
    public function setUserId($connection){  //set the user id of the customer
        $sql = "SELECT User_id FROM user order by User_id desc limit 1";
        $result = $connection->query($sql);
        $id=$result->fetch_assoc();
        $this->User_id=$id['User_id'];
    }

    public function getUserId($connection){
        return $this->User_id;
    }

    private function CreateUserEntry($connection){  //enter details to the user table
        $sql="INSERT INTO user (User_id,First_Name,Last_Name,City,Street,Postalcode,Username,Password,Email,Type) VALUES (' ',
        '$this->Firstname','$this->Lastname','$this->City','$this->Street','$this->Postalcode','$this->Username','$this->Password','$this->Email','$this->Type')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setContact($connection){   //enter details to the user_contact table
        $sql="INSERT INTO user_contact(User_id,Contact_No) VALUES ('$this->User_id','$this->Contactnumber')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User contact updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setCustomer($connection){  //enter details to the customer table
        $sql="INSERT INTO customer(Customer_Id,ElectricityBill_No,latitude,longitude,staff_Id,Registration_date,Status) VALUES ('$this->User_id','$this->Billnum','$this->Latitude',$this->Longitude,NULL,NULL,'0')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }
    public function setprofilepic($connection){
        $sql="INSERT INTO `profileimg`(User_id,status,imgname) VALUES ('$this->User_id',0,'noprofile.png')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function RegisterCustomer($connection){  //call all the functions to register the customer
        $result1=$this->CreateUserEntry($connection);
        $this->setUserId($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setCustomer($connection);
        $result4=$this->setprofilepic($connection);

        if($result1 && $result2 && $result3 && $result4){
            return true;
        }else{
            return false;
        }
    }
    public function loginCustomer($connection,$username,$password){   //check whether the user entered correct username and password and the status is 1.
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
            
            $r1="SELECT * FROM customer WHERE Customer_Id='$this->User_id' AND Status='1'";
            if($connection->query($r1)->num_rows > 0){
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
    public function resetEmail($connection,$newpwd,$email){
        $sql="UPDATE user SET Password='$newpwd' WHERE Email='$email'";
        if($connection->query($sql)){
            return true;
        }else{
            return false;
        }
    }
    // public function gastype($connection){

    // }

}