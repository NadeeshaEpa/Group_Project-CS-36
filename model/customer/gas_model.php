<?php
class gas_model{
    public function getshopnames($connection,$type){
        $sql="SELECT g.Shop_name FROM `gasagent`g inner join `gas_company` c on g.Gas_Type=c.company_id WHERE c.company_name='$type'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $shopnames=[];
            while($row=$result->fetch_object()){
                array_push($shopnames,['Shop_name'=>$row->Shop_name]);
            }
            // print_r($shopnames);
            // die();
            return $shopnames;
        }
    }
    public function getweight($connection,$type){
        //store weight according to the Cylinder_Id
        $sql="SELECT g.Cylinder_Id,g.Weight FROM `gascylinder` g inner join `gas_company` c on g.Type=c.company_id WHERE c.company_name='$type'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $weight=[];
            while($row=$result->fetch_object()){
                array_push($weight,['Weight'=>$row->Weight]);
            }
            //sort the array according to the weight in descending order get the highetq weight into the 0 th index
            for($i=0;$i<count($weight);$i++){
                for($j=$i+1;$j<count($weight);$j++){
                    if($weight[$i]['Weight']<$weight[$j]['Weight']){
                        $temp=$weight[$i];
                        $weight[$i]=$weight[$j];
                        $weight[$j]=$temp;
                    }
                }
            }
            // print_r($weight);
            // die();
            return $weight;
        }
    }
    public function viewgas($connection,$weight,$type){
        $sql="Select DISTINCT g.GasAgent_Id from `gasagent` g INNER JOIN `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id INNER JOIN `gas_company` c on g.Gas_Type=c.company_id WHERE c.company_name='$type';";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $gasagents=[];
            while($row=$result->fetch_object()){
                array_push($gasagents,['GasAgent_Id'=>$row->GasAgent_Id]);
            }
            $gas=[];
            foreach($gasagents as $gasagent){
                $gasagent_id=$gasagent['GasAgent_Id'];
                $sql="SELECT g.GasAgent_Id,g.Shop_name,s.Cylinder_Id,s.Quantity,c.Weight FROM `gasagent` g INNER JOIN `sell_gas` s on g.GasAgent_Id=s.GasAgent_Id INNER JOIN `gascylinder` c on s.Cylinder_Id=c.Cylinder_Id  inner join `gas_company` co on c.Type=co.company_id WHERE g.GasAgent_Id='$gasagent_id' AND co.company_name='$type' ORDER BY c.Weight DESC";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    while($row=$result->fetch_object()){
                        array_push($gas,['GasAgent_Id'=>$row->GasAgent_Id,'Shop_name'=>$row->Shop_name,'Cylinder_Id'=>$row->Cylinder_Id,'Quantity'=>$row->Quantity,'Weight'=>$row->Weight]);
                    }
                }
            }
            // foreach($gas as $gas1){
            //     print_r($gas1);
            //     echo "<br>";
            // }
            // die();
            return $gas;            
        }
    }
    public function cylinders($connection,$type){
        $sql="SELECT c.Cylinder_Id,c.Weight from gascylinder c inner join gas_company g on c.Type=g.company_id WHERE g.company_name='$type'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $cylinders=[];
            while($row=$result->fetch_object()){
                array_push($cylinders,['Cylinder_Id'=>$row->Cylinder_Id,'Weight'=>$row->Weight]);
            }
            //sort the array according to the weight in descending order get the highetq weight into the 0 th index
            for($i=0;$i<count($cylinders);$i++){
                for($j=$i+1;$j<count($cylinders);$j++){
                    if($cylinders[$i]['Weight']<$cylinders[$j]['Weight']){
                        $temp=$cylinders[$i];
                        $cylinders[$i]=$cylinders[$j];
                        $cylinders[$j]=$temp;
                    }
                }
            }
            return $cylinders;
        }
    }
    public function getavailability($connection,$type,$result,$gasid){
        $availability=[];
        foreach($result as $res){
            $cylinder=$res['Cylinder_Id'];
            $sql="Select Quantity from sell_gas WHERE Cylinder_Id='$cylinder' AND GasAgent_Id='$gasid'";
            $result=$connection->query($sql);
            if($result->num_rows===0){
                $sql2="Select photo,price,Weight,newcylinder_price from gascylinder WHERE Cylinder_Id='$cylinder'";
                $result2=$connection->query($sql2);
                if($result2->num_rows===0){
                    array_push($availability,['Quantity'=>0,'photo'=>0,'price'=>0,'newcylinder_price'=>0]);
                }else{
                    while($row=$result2->fetch_object()){
                        array_push($availability,['Quantity'=>0,'photo'=>$row->photo,'price'=>$row->price,'newcylinder_price'=>$row->newcylinder_price,'Weight'=>$row->Weight]);
                    }
                }
            }else{
                $sql="SELECT g.Quantity,c.photo,c.price,c.Weight,c.newcylinder_price from sell_gas g inner join gascylinder c on g.Cylinder_Id=c.Cylinder_Id inner join gas_company co on c.Type=co.company_id WHERE g.Cylinder_Id='$cylinder' AND co.company_name='$type' AND g.GasAgent_Id='$gasid'";
                $result=$connection->query($sql);
                if($result->num_rows==0){
                    print_r("Error");
                }else{
                    while($row=$result->fetch_object()){
                        array_push($availability,['Quantity'=>$row->Quantity,'photo'=>$row->photo,'price'=>$row->price,'newcylinder_price'=>$row->newcylinder_price,'Weight'=>$row->Weight]);
                    }
                }
            }
        }
        return $availability;
    }
    public function getshopname($connection,$gasid){
        $sql="Select g.GasAgent_Id,g.Shop_name,g.LastUpdatedTime,g.LastUpdatedDate,u.Contact_No from gasagent g inner join user_contact u on g.GasAgent_id=u.User_id WHERE GasAgent_Id='$gasid'";
        $result=$connection->query($sql);
        $data=[];
        if($result->num_rows===0){
            return false;
        }else{
            while($row=$result->fetch_object()){
                array_push($data,['Gas_id'=>$row->GasAgent_Id,'Shop_name'=>$row->Shop_name,'Contact_No'=>$row->Contact_No,'LastUpdatedTime'=>$row->LastUpdatedTime,'LastUpdatedDate'=>$row->LastUpdatedDate]);
            }
            return $data;
        }
    }
}