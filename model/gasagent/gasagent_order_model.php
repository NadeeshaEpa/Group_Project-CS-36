<?php
class orders{
    private $User_id;
    public function gasDashDetails($connection){
        $this->User_id=$_SESSION['User_id'];
        $sql="SELECT concat(u.First_Name,' ',u.Last_Name)AS Name,concat(u.Postalcode,' , ',u.Street,' , ' ,u.City)As Address,o.Order_id, c.Contact_No, p.Quantity,ga.Weight,ga.Type,o.Amount,o.Delivery_Method,o.Order_date FROM `order`o INNER JOIN placeorder p on o.Order_id=p.Order_Id INNER JOIN user u ON u.User_id=p.Customer_Id INNER JOIN user_contact c ON u.User_id=c.User_id  INNER JOIN gascylinder ga ON ga.Cylinder_Id=p.Cylinder_Id WHERE (o.Order_Status=1 && p.GasAgent_Id=$this->User_id)  GROUP by o.Order_id order BY o.Time ASC";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['Name'=>$row['Name'],'Order_id'=>$row['Order_id'],'Contact_No'=>$row['Contact_No'],'Quantity'=>$row['Quantity'],'Type'=>$row['Type'],'weight'=>$row['Weight'],'Amount'=>$row['Amount'],'Order_date'=>$row['Order_date'],'Delivery_Method'=>$row['Delivery_Method']]);
            }
            return $answer;
        }
        
    }
}


