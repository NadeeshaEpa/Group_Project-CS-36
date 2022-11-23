<?php
   function checkemail($email,$connection){
       $sql = "SELECT * FROM user WHERE Email='$email'";
       $result = $connection->query($sql);
       if($result->num_rows > 0){
           return true;
       }
       else{
           return false;
       }
   }
   function checkusername($username,$connection){
       $sql = "SELECT * FROM user WHERE Username = '$username'";
       $result = $connection->query($sql);
       if($result->num_rows > 0){
           return true;
       }
       else{
           return false;
       }
   }

   //check password and confirm password are same
   function checkpassword($password,$cpassword){
       if($password == $cpassword){
           return true;
       }
       else{
           return false;
       }
   }

?>