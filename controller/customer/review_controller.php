<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/review_model.php';

if(isset($_POST['review'])){
    if(isset($_SESSION['User_id'])){
        $order=new review_model();
        $result=$order->deliverypersons($connection,$_SESSION['User_id']);
        if($result===false){
            $_SESSION['deliverynames']="failed";
            header("Location: ../../view/customer/customer_review.php");
        }else{
            $names=$order->finddeliveryname($connection,$result);
            if($names===false){
               $_SESSION['deliverynames']="failed";
            }else{
              $_SESSION['deliverynames']=$names;
            }
            header("Location: ../../view/customer/customer_review.php");
        }
    }
}
if(isset($_POST['fillreview'])){
    $dpname=$_POST['dpname'];
    $date=$_POST['date'];
    $description=$_POST['description'];

    $dpname=$connection->real_escape_string($dpname);
    $date=$connection->real_escape_string($date);
    $description=$connection->real_escape_string($description);

    $order=new review_model();
    $dpid=$order->finddeliveryid($connection,$dpname);
    if($dpid===false){
        $_SESSION['addreview']="failed";
    }else{
        $result=$order->review($connection,$_SESSION['User_id'],$dpid,$date,$description);
        if($result===false){
            echo "Failed";
        }else{
            $_SESSION['addreview']="success";
            $review=new review_model();
            $result=$review->viewreview($connection,$_SESSION['User_id']);
            if($result===false){
                $_SESSION['viewreview']="failed";
                header("Location: ../../view/customer/customer_viewreviews.php");
            }else{
                $_SESSION['viewreview']=$result;
                header("Location: ../../view/customer/customer_viewreviews.php");
            }
        }
    }  
}
if(isset($_POST['view-review']) ){
    $review=new review_model();
    $result=$review->viewreview($connection,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['viewreview']="failed";
        header("Location: ../../view/customer/customer_viewreviews.php");
    }else{
        $_SESSION['viewreview']=$result;
        header("Location: ../../view/customer/customer_viewreviews.php");
    }
}
if(isset($_GET['drid'])){
    $rateid=$_GET['drid'];
    $rateid=$connection->real_escape_string($rateid);
    $review=new review_model();
    $result=$review->deletereview($connection,$rateid);
    if($result===false){
        $_SESSION['deletereview']="failed";
        header("Location: ../../view/customer/customer_viewreviews.php");
    }else{
        $_SESSION['deletereview']="success";
        $review=new review_model();
        $result=$review->viewreview($connection,$_SESSION['User_id']);
        if($result===false){
            $_SESSION['viewreview']="failed";
            header("Location: ../../view/customer/customer_viewreviews.php");
        }else{
            $_SESSION['viewreview']=$result;
            header("Location: ../../view/customer/customer_viewreviews.php");
        }
    }
}
if(isset($_GET['erid'])){
    $rateid=$_GET['erid'];
    $rateid=$connection->real_escape_string($rateid);
    $_SESSION['erid']=$rateid;
    $review=new review_model();
    $result=$review->editreview($connection,$rateid,$_SESSION['User_id']);
    if($result===false){
        $_SESSION['editreview']="failed";
        header("Location: ../../view/customer/customer_editreview.php");
    }else{
        $_SESSION['editreview']=$result;
        header("Location: ../../view/customer/customer_editreview.php");
    }
}
if(isset($_POST['editreview'])){
    $rateid=$_POST['rateid'];
    $dpname=$_POST['dpname'];
    $date=$_POST['date'];
    $desc=$_POST['desc'];

    $rateid=$connection->real_escape_string($rateid);
    $dpname=$connection->real_escape_string($dpname);
    $date=$connection->real_escape_string($date);   
    $desc=$connection->real_escape_string($desc);

    $review=new review_model();
    $result=$review->updatereview($connection,$rateid,$dpname,$date,$desc);
    if($result===false){
        $_SESSION['updatereview']="failed";
        header("Location: ../../view/customer/customer_editreview.php");
    }else{
        $_SESSION['updatereview']="success";
        $review=new review_model();
        $result=$review->viewreview($connection,$_SESSION['User_id']);
        if($result===false){
            $_SESSION['viewreview']="failed";
            header("Location: ../../view/customer/customer_viewreviews.php");
        }else{
            $_SESSION['viewreview']=$result;
            header("Location: ../../view/customer/customer_viewreviews.php");
        }
    }

}