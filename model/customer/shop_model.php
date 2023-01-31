<?php
class shop_model{
    public function getGasCooker($connection){
        $sql="SELECT * FROM product WHERE Category='Gas Cooker'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['item_code'=>$row['Item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['Price'],'Category'=>$row['Category'],'product_type'=>$row['Product_type'],'Description'=>$row['Description']]);
            }
        }
        return $answer;
    }
}