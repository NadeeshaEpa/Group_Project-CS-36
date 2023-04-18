<?php
class delete_gasType{
   public function deleteGasType($connection,$id){
    $sql="delete from sell_gas where Cylinder_Id = $id";
    $result=$connection->query($sql);
    if($result==true){
        return true;
    }
    else{
        return false;
    }
   }
}