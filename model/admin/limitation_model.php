<?php
class limit_model
{
    public function viewlimit($connection)
    {      
        $sql="SELECT limit_status, time_period from `admin`;";
        $result = mysqli_query($connection, $sql);
        $limit = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $limit[] = $row;
            }
            // print_r($limit);
            return $limit;
        } else {
            return $limit;
        }
    }


    public function update_limit($connection,$array){
        $sql="UPDATE `admin` SET `limit_status`='$array[0]',`time_period`='$array[1]' ";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}
?>