<?php

class brand{

    public function BrandQuenBtn($connection,$Quantity,$code){
        $sql="UPDATE product SET Quantity=$Quantity WHERE  Item_code=$code";
        $result=$connection->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }


}