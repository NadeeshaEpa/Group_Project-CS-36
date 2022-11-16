<?php
class resetpassword_model{
   private $email;
   private $username;
   private $password;
   function getdata($email,$connection){
        $sql = "SELECT * FROM user WHERE Email='$email'";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            $data=[];
            $row=$result->fetch_assoc();
            $this->email=$row['Email'];
            $this->username=$row['Username'];
            $this->password=$row['Password'];
            return true;
        }else{
            return false;
        }
   }
}
   