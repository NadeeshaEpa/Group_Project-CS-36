<?php
class payment_model{
    public function checkquantity($connection,$agentid,$userid){
        $sql="Select * from cart where gasagent_id='$agentid' and user_id='$userid'";
        $result=$connection->query($sql);
        $stockid=$this->stock_manager($connection);
        if($agentid==$stockid){
            if($result->num_rows===0){
                return false;
            }else{
                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];

                    $weight=explode(" ",$weight);
                    $count=count($weight);
                    $Product_type=$weight[$count-1];
                    $category=$type;
                    //name equals to the rest of the words
                    $name="";
                    for($i=0;$i<$count-1;$i++){
                        $name=$name.$weight[$i]." ";
                    }
                    $sql3="select quantity from product where Name='$name' and Product_type='$Product_type' and Category='$category'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $quantityall=$row['quantity'];
                    if($quantityall<$quantity){
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }else{
            if($result->num_rows===0){
                return false;
            }else{
                foreach($result as $item){
                    $weight=$item['weight'];
                    $type=$item['type'];
                    $quantity=$item['quantity'];

                    $sql3="select company_id from gas_company where company_name='$type'";
                    $result3=$connection->query($sql3);
                    $row=$result3->fetch_assoc();
                    $companyid=$row['company_id'];
                    
                    $sql4="select Cylinder_Id from gascylinder where Type='$companyid' and Weight='$weight'";
                    $result4=$connection->query($sql4);
                    $row=$result4->fetch_assoc();
                    $cylinderid=$row['Cylinder_Id'];

                    $sql5="select quantity from sell_gas where Cylinder_Id='$cylinderid' and gasagent_id='$agentid'";
                    $result5=$connection->query($sql5);
                    $row=$result5->fetch_assoc();
                    $quantityall=$row['quantity'];

                    if($quantityall<$quantity){
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }

    }
    public function stock_manager($connection){
        $sql="Select id from stock_manager";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['id'=>$row['id']]);
            }
        }
        return $answer[0]['id'];
    }
}