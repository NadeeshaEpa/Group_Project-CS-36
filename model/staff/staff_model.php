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
   
    
    public function loginStaff($connection,$username,$password){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            
            $this->User_id=$row['User_id'];
            $_SESSION['User_id']=$this->User_id;
            $_SESSION['Firstname']=$row['First_Name'];
            $_SESSION['Lastname']=$row['Last_Name'];
            $_SESSION['Type']=$row['Type'];

            $img="SELECT img_id,status,imgname FROM profileimg WHERE User_id='$this->User_id'";
            $resultimg=$connection->query($img);
            $rowimg=$resultimg->fetch_assoc();
            $_SESSION['img_id']=$rowimg['img_id'];
            $_SESSION['img-status']=$rowimg['status'];
            $_SESSION['User_img']=$rowimg['imgname'];

            $r1="SELECT * FROM staff WHERE Staff_Id='$this->User_id'";
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
            // $_SESSION['registerMsg']="User table updated Successfully";
            return true;
        }else{
            // $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setContact($connection){
        $sql="INSERT INTO user_contact(User_id,Contact_No) VALUES ('$this->User_id','$this->Contactnumber')";
        if($connection->query($sql)){
            // $_SESSION['registerMsg']="User contact updated Successfully";
            return true;
        }else{
            // $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setStaff($connection){
        $sql="INSERT INTO staff(Staff_Id,NIC,Admin_Id,Registration_date,Status) VALUES ('$this->User_id','$this->nic',NULL,NULL,'1')";
        if($connection->query($sql)){
            // $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            // $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function setprofilepic($connection){
        $sql="INSERT INTO `profileimg`(User_id,status,imgname) VALUES ('$this->User_id',0,'noprofile.png')";
        if($connection->query($sql)){
            // $_SESSION['registerMsg']="User Registered Successfully";
            return true;
        }else{
            // $_SESSION['regerror']="User Registration Failed";
            return false;
        }
    }

    public function Registerstaff($connection){
        $result1=$this->CreateUserEntry($connection);
        $this->setUserId($connection);
        $result2=$this->setContact($connection);
        $result3=$this->setStaff($connection);
        $result4=$this->setprofilepic($connection);

        if($result1 && $result2 && $result3 && $result4){
            return true;
        }else{
            return false;
        }
    }
    

    public function deleteuser($connection,$user_id){
        $sql = "UPDATE `staff` SET Status=2 WHERE Staff_Id='$user_id'";
        // $sql="DELETE FROM `user` WHERE User_id='$user_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function edituser($connection,$user_id){
        $sql="SELECT s.Staff_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, s.NIC, S.Registration_date from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `staff` s ON u.User_id=s.Staff_Id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $staff=[];
            while($row=$result->fetch_object()){
                array_push($staff,['Staff_Id'=>$row->Staff_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date]);
            }
            return $staff;
        }      
    }
    public function updateUser($connection,$array){
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




    public function viewuser($connection,$user_id){
        $sql="SELECT s.Staff_Id,u.First_Name, u.Last_Name, u.City, u.Street, u.Postalcode, u.Username, u.Email, uc.Contact_No, s.NIC, S.Registration_date, i.imgname from `user_contact` uc INNER JOIN `user` u ON uc.User_id=u.User_id INNER JOIN `staff` s ON u.User_id=s.Staff_Id INNER JOIN `profileimg` i ON s.Staff_Id=i.User_id WHERE u.User_id='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $staff=[];
            while($row=$result->fetch_object()){
                array_push($staff,['Staff_Id'=>$row->Staff_Id,'First_Name'=>$row->First_Name,'Last_Name'=>$row->Last_Name,'City'=>$row->City,'Street'=>$row->Street,'Postalcode'=>$row->Postalcode,'Username'=>$row->Username,'Email'=>$row->Email,'Contact_No'=>$row->Contact_No, 'NIC'=>$row->NIC, 'Registration_date'=>$row->Registration_date, 'imgname'=>$row->imgname]);
            }
            return $staff;
        }
    }

    public function searchstaff($connection,$name){
        $sql="SELECT * FROM user u INNER JOIN staff s ON u.User_id=s.Staff_Id WHERE u.Type='Staff' AND s.Status=1 AND u.User_id='$name' OR u.First_Name='$name'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $staff=[];
            while($row=mysqli_fetch_assoc($result)){
                $staff[]=$row;
            }
            // print_r($staff);
            return $staff;
        }else{
            return false;
        }
    }

}










    
