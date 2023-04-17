<?php
class ViewGasType{
   public function fetchGasType($connection, $agentId){
      // $sql = "select sg.Cylinder_Id, sg.Quantity, g.Type form sell_gas as sg inner join gascylinder as g on sg.Cylinder_Id = g.Cylinder_Id where sg.GasAgent_Id = $agentId AND sg.Quantity <= 5";
      $sql="SELECT sg.Cylinder_Id, sg.Quantity, g.Weight FROM sell_gas AS sg INNER JOIN gascylinder AS g ON sg.Cylinder_Id = g.Cylinder_Id WHERE sg.GasAgent_Id = $agentId AND  sg.Quantity < 5";
      $result=$connection->query($sql);
      // die(var_dump($result));
      if($result->num_rows===0){
          return false;
      }else{
          $answer=[];
          while($row=$result->fetch_assoc()){
              array_push($answer,['Cylinder_Id' => $row['Cylinder_Id'], 'Quantity' => $row['Quantity'], 'Weight' => $row['Weight']]);
          }
          return $answer;
      }
   }
}


// $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address, c.Contact_No, p.Quantity,ga.Weight,ga.Type,o.Amount,o.Delivery_Method,o.Order_date FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN gascylinder ga ON ga.Cylinder_Id=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id) ORDER BY o.Time ASC LIMIT 5";
       
//         $result=$connection->query($sql);
//         if($result->num_rows===0){
//             return false;
//         }else{
//             $answer=[];
//             while($row=$result->fetch_assoc()){
//                 array_push($answer,['Name'=>$row['Name'],'Address'=>$row['Address'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Type'=>$row['Type'],'weight'=>$row['Weight'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'Delivery_Method'=>$row['Delivery_Method']]);
//             }
//             return $answer;
//         }