<?php
class staff{
    
    //login validation
    public function loginStaff($connection,$username,$password){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        
        $result = $connection->query($sql);
        
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            
            //store user name and password
            $_SESSION['Firstname']=$row['First_Name'];
            $_SESSION['Lastname']=$row['Last_Name'];
            $_SESSION['Type']=$row['Type'];
            $_SESSION['password']=$password;
            $_SESSION['username']=$username;
            
            return true;
        }
        else{
            return false;
        }
    }

}