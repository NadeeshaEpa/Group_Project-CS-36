<?php

class view{
    private $FuelManagerId;
    private $username;

    public function getFuelManagerUserId($connection){
        $this->username=$_SESSION['username'];
        $sql="SELECT User_id FROM user WHERE Username='$this->username'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->FuelManagerId=$row["User_id"];
        
    }


    public function get_details($connection){
        $this->getFuelManagerUserId($connection);
        $sql="SELECT  fueltype.Type, fueltype.Subtype, fuelpublish.Qunatity, fuelpublish.Price FROM fuelpublish INNER JOIN fueltype ON fuelpublish.FuelType_Id=fueltype.FuelType_Id WHERE  fuelpublish.FuelManager_Id='$this->FuelManagerId'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Type'=>$row['Type'],'Subtype'=>$row['Subtype'],'Qunatity'=>$row['Qunatity'],'Price'=>$row['Price']]);
            }
        }
        return $answer;
    }

}









