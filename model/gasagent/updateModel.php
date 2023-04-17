<?php
class update{
    private $User_id;
    public function getdate($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT g.Cylinder_Id, g.Weight, se.Quantity FROM sell_gas se INNER JOIN gascylinder g on se.Cylinder_Id=g.Cylinder_Id WHERE se.GasAgent_Id=$this->User_id";
        
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Cylinder_Id'=>$row['Cylinder_Id'],'Weight'=>$row['Weight'],'Quantity'=>$row['Quantity']]);
            }
            return $answer;
        }

    }
}

