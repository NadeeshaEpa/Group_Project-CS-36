<?php
class update_gasQuantity{
   
    public function updateGasQuantity($connection,$updateId, $quantity){
    $sql="update sell_gas set Quantity = $quantity where Cylinder_Id = $updateId";
    $result=$connection->query($sql);
    if($result==true){
        return true;
    }
    else{
        return false;
    }
   }
}