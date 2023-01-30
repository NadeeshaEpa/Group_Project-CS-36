<?php
class admin_model{
    private $User_id;
    private $Firstname;
    private $Lastname;
    private $Useername;
    private $Stret;
    private $City;
    private $Postalcode;
    private $Password;
    private $Email;
    private $Type;
    private $Contactnumber;




    public function loginAdmin($connection,$username,$password){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->User_id=$row['User_id'];
            $_SESSION['User_id']=$this->User_id;
            $_SESSION['Firstname']=$row['First_Name'];
            $_SESSION['Lastname']=$row['Last_Name'];
            $_SESSION['Type']=$row['Type'];
            $r1="SELECT * FROM admin WHERE Admin_Id='$this->User_id'";
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