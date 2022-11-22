<?php
class add_gasType{
    private $GasagentId; //GA1
    private $GasTypeId; //1002
    private $GasType; //litro
    private $Weight;
    private $Quantity;
    private $username;
    private $Price;

    public function setDetails($gasType='',$weight='',$quantity='',$price=''){
        $this->GasType=$gasType;
        $this->Weight=$weight;
        $this->Quantity=$quantity;
        $this->Price=$price;
        $this->username=$_SESSION['username'];

       
        
    }

    public function setGasTypeId($connection){
        $sql="SELECT Cylinder_Id FROM gascylinder WHERE Type = '$this->GasType' AND Weight ='$this->Weight'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->GasTypeId=$row["Cylinder_Id"];
    }

    public function getGasagentUserId($connection){
        $sql="SELECT User_id FROM user WHERE Username='$this->username'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->GasagentId=$row["User_id"];
        $this->GasagentId; //GA1

        
        
    }

   
    public function GasPublish($connection){


        // =====================================================

        $sql="SELECT Cylinder_Id FROM sell_gas WHERE Cylinder_Id = '$this->GasTypeId' AND GasAgent_Id = '$this->GasagentId'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        
        if(isset($row)){
            $_SESSION['Already exist Gas type'] ='Already exist Gas type';    
            return false;
        }
        else{
            $sql="INSERT INTO sell_gas (GasAgent_Id, Cylinder_Id, Quantity, price) VALUES ('$this->GasagentId','$this->GasTypeId','$this->Quantity',' $this->Price')";

            if(($connection->query($sql))){
                $_SESSION['GasPublish']="Publish Gas type Successfully";
                return true;
            }else{
                echo($connection->error);
                $_SESSION['GasPublishError']="published Gas type Failed";
                return false;
            } 
        }




        // =====================================================

        // $sql="SELECT  Cylinder_Id FROM sell_gas WHERE  Cylinder_Id=' $this->GasTypeId' AND GasAgent_Id='$this->GasagentId'";
        
        // $result1=$connection->query($sql);
        // $row = $result1->fetch_assoc();
       

        // if($row['Cylinder_Id']==$this->GasTypeId){
        //     return false;
        // }
        // else{
        //     $sql1="INSERT INTO sell_gas (GasAgent_Id, Cylinder_Id, Quantity, price) VALUES ('$this->GasagentId',' $this->GasTypeId','$this->Quantity',' $this->Price')";
        //     // var_dump( $sql);
        //     // die();
        //     if(($connection->query($sql1))){
        //         $_SESSION['GasPublish']="Publish Gas type Successfully";
        //         return true;
        //     }else{
        //         echo($connection->error);
        //         $_SESSION['GasPublishError']="published Gas type Failed";
        //         return false;
        //     }

        // }
       

    }

    public function addgasType($connection){
        $this->setGasTypeId($connection);
        $this->getGasagentUserId($connection);
        
        return $this->GasPublish($connection);
    }

}