<?php
class gasagent_viewModal{
    public function get_details($connection,$userid){
        $sql="SELECT gas.company_name,s.quantity,g.weight,g.newcylinder_price from sell_gas s inner join gascylinder g on s.cylinder_id=g.cylinder_id inner join gas_company gas on g.Type=gas.company_id where s.GasAgent_Id='$userid'";
        $result=$connection -> query($sql);
        // var_dump($sql);
        // die();
        if($result->num_rows==0){
            return false;
        }else{
            $details=[];
            while($row=$result ->fetch_assoc()){
                array_push($details,['company_name'=>$row['company_name'],'quantity'=>$row['quantity'],'weight'=>$row['weight'],'newcylinder_price'=>$row['newcylinder_price']]);
            }
            return $details;
        }
       
    }

}









