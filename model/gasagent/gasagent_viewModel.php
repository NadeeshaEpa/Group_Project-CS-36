<?php

class view{
    private $GasagentId;
    private $username;

    public function getGasAgentrUserId($connection){
        $this->username=$_SESSION['username'];
        $sql="SELECT User_id FROM user WHERE Username='$this->username'";
        $result=$connection->query($sql);
        $row = $result->fetch_assoc();
        $this->GasagentId=$row["User_id"];
        $this->GasagentId;
        
    }


    public function get_details($connection){
        $this->getGasAgentrUserId($connection);
        $sql="SELECT  gascylinder.Type, gascylinder.Weight,sell_gas.Quantity, gascylinder.Price FROM sell_gas INNER JOIN gascylinder ON sell_gas.Cylinder_Id=gascylinder.Cylinder_Id WHERE  sell_gas.GasAgent_Id='$this->GasagentId'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Type'=>$row['Type'],'Weight'=>$row['Weight'],'Quantity'=>$row['Quantity'],'price'=>$row['price']]);
            }
        }
        return $answer;
    }

}









