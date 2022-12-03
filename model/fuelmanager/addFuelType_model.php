<?php
class add_fuelType{
    private $FuelManagerId;
    private $FuelTypeId;
    private $FuelType;
    private $FuelSubType;
    private $Quantity;
    private $username;
    private $Price;


    public function setDetails($fuelType='',$subFuelType='',$quantity='',$price=''){ 
        $this->FuelType=$fuelType;
        $this->FuelSubType=$subFuelType;
        $this->Quantity=$quantity;
        $this->Price=$price;
        $this->username=$_SESSION['username'];
        
    }

    public function setFuelTypeId($connection){
        $sql="SELECT FuelType_Id FROM `fueltype` WHERE Type='$this->FuelType' AND Subtype='$this->FuelSubType'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->FuelTypeId=$row["FuelType_Id"];
    }

    public function getFuelManagerUserId($connection){
        $sql="SELECT User_id FROM user WHERE Username='$this->username'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->FuelManagerId=$row["User_id"];
        
    }

   
    public function fuelPublish($connection){
        //check same fuel types with same fuel manager
        $sql1="SELECT FuelType_Id FROM `fuelpublish` WHERE FuelType_Id='$this->FuelTypeId' AND FuelManager_Id='$this->FuelManagerId'";
        $result1=$connection->query($sql1);
        $row1 = $result1->fetch_assoc();
       
         
        if(($row1['FuelType_Id']==$this->FuelTypeId)){
            $_SESSION['Already exist fuel type']='Already exist fuel type';
             return false;
        }
        else{
            $sql="INSERT INTO fuelpublish (FuelManager_Id, FuelType_Id, Qunatity, Price) VALUES ('$this->FuelManagerId','$this->FuelTypeId','$this->Quantity', '$this->Price')";
            if($connection->query($sql)){
                $_SESSION['fuelPublish']="Publish fuel type Successfully";
                return true;
            }else{
                $_SESSION['fuelPublishError']="published fuel type Failed";
                return false;
            }

        }
       

    }

    public function addFuelType($connection){
        $this->setFuelTypeId($connection);
        $this->getFuelManagerUserId($connection);
        $result=$this->fuelPublish($connection);
        
        if($result){
            return true;
        }else{
            return false;
        }


    }

}