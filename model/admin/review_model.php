<?php
class review_model{
    public function viewreview($connection){
        $sql="SELECT * FROM `company_review`";
        $result = mysqli_query($connection, $sql);
        $review = [];
        if ($result) {    
            while ($row = mysqli_fetch_assoc($result)) {
                $review[] = $row;
            }
            return $review;
        } else {
            return $review;
        }
    }

    public function deletereview($connection,$review_id){
        $sql = "DELETE FROM `company_review` WHERE review_id='$review_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function searchreview($connection,$id){
        $sql="SELECT * FROM company_review WHERE review_id='$id'";
        $result=mysqli_query($connection,$sql);
        if($result){
            $review=[];
            while($row=mysqli_fetch_assoc($result)){
                $review[]=$row;
            }
            // print_r($review);
            return $review;
        }else{
            return false;
        }
    }

}

?>