<?php
   function checkFuelManagerEmail($email,$connection){
       $sql = "SELECT * FROM user WHERE Email='$email'";
       $result = $connection->query($sql);
       if($result->num_rows > 0){
           return true;
       }
       else{
           return false;
       }
   }
   function checkFuelManagerUsername($username,$connection){
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
   function checkSamePassword($password,$cpassword){
       if($password == $cpassword){
           return true;
       }
       else{
           return false;
       }
   }

?>