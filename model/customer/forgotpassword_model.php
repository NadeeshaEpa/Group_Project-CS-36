<?php
class forgotpassword_model{
    public function deleteEmail($email,$connection){
        $sql="DELETE FROM pwdreset WHERE pwdResetEmail='$email'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function insertToken($selector,$token,$expires,$email,$connection){
        $hashedToken=password_hash($token,PASSWORD_DEFAULT);
        $sql="INSERT INTO pwdreset (PwdresetEmail,Selector,Token,Expires) VALUES ('$email','$selector','$hashedToken','$expires')";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function resetPassword($selector,$currentDate,$connection){
        $sql="SELECT * FROM pwdreset WHERE Selector='$selector' AND Expires>='$currentDate'";
        $result=$connection->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

}
   