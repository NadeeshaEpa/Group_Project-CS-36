<?php
class validation_model{
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
        $sql = "SELECT * FROM user WHERE Username='$username'";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
}