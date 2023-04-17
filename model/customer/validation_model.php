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
    public function check_update_email($email,$connection,$user_id){
        $sql="SELECT * FROM user WHERE Email='$email' AND User_id!='$user_id'";
        $result=$connection->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function check_update_username($username,$connection,$userid){
        $sql="SELECT * FROM user WHERE Username='$username' AND User_id!='$userid'";
        $result=$connection->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
}