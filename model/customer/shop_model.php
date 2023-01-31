<?php
class shop_model{
    public function getGasCooker($connection){
        $sql="SELECT * FROM product WHERE Category='Gas Cooker'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            print_r("No Gas Cooker");
            die();
            return false;
        }else{
            $answer=[];
            while($row=$result->fetch_assoc()){
                array_push($answer,['item_code'=>$row['item_code'],'Name'=>$row['Name'],'Quantity'=>$row['Quantity'],'price'=>$row['price'],'Category'=>$row['Category'],'product_type'=>$row['product_type'],'Description'=>$row['Description']]);
            }
        }
        print_r($answer);
        die();
        return $answer;
    }
}