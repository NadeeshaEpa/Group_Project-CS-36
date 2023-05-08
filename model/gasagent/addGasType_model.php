<?php
class add_gasType{
   public function getcylinderId($connection,$weight,$gasagentId){
      $sql="Select c.Cylinder_Id from gascylinder c inner join gasagent ga on c.Type=ga.Gas_Type where c.Weight='$weight' and ga.GasAgent_Id='$gasagentId'";
    //  var_dump($sql);
    //  die();
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

   public function checkAlreadyExit($connection,$gasagentId,$cylinderId){
     
      $sql=" Select Quantity from sell_gas where Cylinder_Id=$cylinderId and GasAgent_Id=$gasagentId";
      $result=$connection->query($sql);     
        if($result->num_rows==0){
            return true;
        }
        else{
            return false;
        }
   }
   // public function check($cylinderId,$gasagentId){
   //    $sql="Select Quantity from sell gas where Cylinder_Id=$cylinderId and GasAgent"
   // }







   public function get_cylinder_id($connection){

    $user_id=$_SESSION['User_id'];
    $sql="SELECT  g.Weight FROM gascylinder g INNER JOIN gasagent ga ON g.Type=ga.Gas_Type WHERE ga.GasAgent_Id=$user_id and active_state=1";
    $result=$connection->query($sql);
    if($result->num_rows===0){
        return false;
    }else{
        $answer=[];
        while($row=$result->fetch_assoc()){
            array_push($answer,$row['Weight']);
        }
        return $answer;
    }

}






}

