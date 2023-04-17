<?php
class add_gasType{
   public function getcylinderId($connection,$weight,$gasagentId){
      $sql="Select c.Cylinder_Id from gascylinder c inner join gasagent ga on c.Type=ga.Gas_Type where c.Weight='$weight' and ga.GasAgent_Id='$gasagentId'";
      $result=$connection->query($sql);
      $row=$result->fetch_assoc();
      $cylinderId=$row['Cylinder_Id'];
      return $cylinderId;
   }
   public function addgas($connection,$cylinderId,$quantity,$gasagentId){
      $sql="Insert into sell_gas (GasAgent_Id,Cylinder_Id,Quantity) values('$gasagentId','$cylinderId','$quantity')";
        $result=$connection->query($sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
   }
   public function getgasType($connection,$userid){
      $sql="Select Gas_Type from gasagent where GasAgent_Id='$userid'";
      $result=$connection->query($sql);
      $row=$result->fetch_assoc();
      $gasType=$row['Gas_Type'];
      return $gasType;
   }
   public function getgasWeight($connection,$gettype){
      $sql="Select Weight from gascylinder where Type='$gettype'";
      $result=$connection->query($sql);
      while($row=$result->fetch_assoc()){
         $gasweights[]=$row['Weight'];
      }
      return $gasweights;
   }
}