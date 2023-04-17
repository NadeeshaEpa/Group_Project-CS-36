<?php
session_start();
require_once '../../config.php';
require_once '../../model/customer/review_model.php';

if(isset($_GET['reviewid'])){
    if(isset($_SESSION['User_id'])){
        $order=new review_model();
        $result=$order->deliverypersons($connection,$_SESSION['User_id']);
        if($result===false){
            $_SESSION['deliverynames']="failed";
            header("Location: ../../view/customer/customer_review.php");
        }else{
            if($result===[]){
                $_SESSION['deliverynames']="failed";
                header("Location: ../../view/customer/customer_review.php");
            }
            $names=$order->finddeliveryname($connection,$result[0]);
            if($names===false){
               $_SESSION['deliverynames']="failed";
            }else{
              $_SESSION['deliverynames']=$names;
            }
            header("Location: ../../view/customer/customer_review.php");
        }
    }
}
if(isset($_GET['add_company_review'])){
    $userreview=$_GET['review'];
    $userreview=$connection->real_escape_string($userreview);
    $review=new review_model();
    $result=$review->addcompanyreview($connection,$_SESSION['User_id'],$userreview);
    if($result===false){
        $_SESSION['addcompanyreview']="failed";
        header("Location: ../../view/customer/customer_review.php");
    }else{
        $limit=5;
        $page = isset($_GET['c_page']) ? $_GET['c_page'] : 1;
        $_SESSION['c_page']=$page;
        $offset = ($page - 1) * $limit;

        //get the total number of company reviews
        $total_records=$review->companyreview_count($connection,$_SESSION['User_id']);
        $_SESSION['c_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['c_total_pages']=$total_pages;

        $result=$review->companyreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['companyreview']="failed";
            header("Location: ../../view/customer/customer_review.php");
        }else{
            $_SESSION['companyreview']=$result;
            header("Location: ../../view/customer/customer_companyReview.php");
        }
    }
}
if(isset($_GET['company_reviewid'])|| isset($_GET['c_page'])){
    $review=new review_model();

    $limit=5;
    $page = isset($_GET['c_page']) ? $_GET['c_page'] : 1;
    $_SESSION['c_page']=$page;
    $offset = ($page - 1) * $limit;

    //get the total number of company reviews
    $total_records=$review->companyreview_count($connection,$_SESSION['User_id']);
    $_SESSION['c_count']=$total_records;

    //calculate the total number of pages
    $total_pages = ceil($total_records / $limit);
    $_SESSION['c_total_pages']=$total_pages;

    $result=$review->companyreview($connection,$_SESSION['User_id'],$limit,$offset);
    if($result===false){
        $_SESSION['companyreview']="failed";
        header("Location: ../../view/customer/customer_review.php");
    }else{
        $_SESSION['companyreview']=$result;
        header("Location: ../../view/customer/customer_companyReview.php");
    }
}
if(isset($_POST['fillreview'])){
    $dpid=$_POST['dpid'];
    $description=$_POST['description'];

    $dpid=$connection->real_escape_string($dpid);
    $description=$connection->real_escape_string($description);


    $order=new review_model();
    $result=$order->review($connection,$_SESSION['User_id'],$dpid,$description);
    if($result===false){
        $_SESSION['addreview']="failed";
        header("Location: ../../view/customer/error.php");
    }else{
        $_SESSION['addreview']="success";
        $review=new review_model();

        $rc=new review_controller();
        $rc->pagination($connection,$userid);
        $limit=$_SESSION['limit'];
        $offset=$_SESSION['offset'];

        $result=$review->viewreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['viewreview']="failed";
            header("Location: ../../view/customer/customer_reviews.php");
        }else{
            $_SESSION['viewreview']=$result;
            header("Location: ../../view/customer/customer_viewreviews.php");
        }
    } 
}
if(isset($_GET['view-review']) || isset($_GET['page'])){
    $review=new review_model();
    $userid=$_SESSION['User_id'];

    $rc=new review_controller();
    $rc->pagination($connection,$userid);
    $limit=$_SESSION['limit'];
    $offset=$_SESSION['offset'];

    $result=$review->viewreview($connection,$_SESSION['User_id'],$limit,$offset);
    if($result===false){
        $_SESSION['viewreview']="failed";
        header("Location: ../../view/customer/customer_viewreviews.php");
    }else{
        $_SESSION['viewreview']=$result;
        header("Location: ../../view/customer/customer_viewreviews.php");
    }
}
if(isset($_GET['company_drid'])){
    $reviewid=$_GET['company_drid'];
    $review=new review_model();
    $result=$review->companydeletereview($connection,$reviewid);
    if($result===false){
        $_SESSION['companydeletereview']="failed";
        header("Location: ../../view/customer/customer_companyReview.php");
    }else{
        $review=new review_model();
        
        $limit=5;
        $page = isset($_GET['c_page']) ? $_GET['c_page'] : 1;
        $_SESSION['c_page']=$page;
        $offset = ($page - 1) * $limit;

        //get the total number of company reviews
        $total_records=$review->companyreview_count($connection,$_SESSION['User_id']);
        $_SESSION['c_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['c_total_pages']=$total_pages;

        $result=$review->companyreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['companyreview']="failed";
            header("Location: ../../view/customer/customer_review.php");
        }else{
            $_SESSION['companyreview']=$result;
            header("Location: ../../view/customer/customer_companyReview.php");
        }
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

        $rc=new review_controller();
        $rc->pagination($connection,$userid);
        $limit=$_SESSION['limit'];
        $offset=$_SESSION['offset'];

        $result=$review->viewreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['viewreview']="failed";
            header("Location: ../../view/customer/customer_viewreviews.php");
        }else{
            $_SESSION['viewreview']=$result;
            header("Location: ../../view/customer/customer_viewreviews.php");
        }
    }
}
if(isset($_GET['company_erid'])){
    $reviewid=$_GET['company_erid'];
    $reviewid=$connection->real_escape_string($reviewid);
    $_SESSION['company_erid']=$reviewid;
    $review=new review_model();
    $result=$review->companyeditreview($connection,$reviewid);
    if($result===false){
        $_SESSION['companyeditreview']="failed";
        header("Location: ../../view/customer/customer_editcompany.php");
    }else{
        $_SESSION['companyeditreview']=$result;
        header("Location: ../../view/customer/customer_editcompany.php");
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
if(isset($_POST['company_editreview'])){
    $reviewid=$_POST['reviewid'];
    $desc=$_POST['desc'];

    $reviewid=$connection->real_escape_string($reviewid);
    $desc=$connection->real_escape_string($desc);

    $review=new review_model();
    $result=$review->companyupdatereview($connection,$reviewid,$desc);
    if($result===false){
        $_SESSION['companyupdatereview']="failed";
        header("Location: ../../view/customer/customer_companyReview.php");
    }else{
        $review=new review_model();
        $limit=5;
        $page = isset($_GET['c_page']) ? $_GET['c_page'] : 1;
        $_SESSION['c_page']=$page;
        $offset = ($page - 1) * $limit;

        //get the total number of company reviews
        $total_records=$review->companyreview_count($connection,$_SESSION['User_id']);
        $_SESSION['c_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['c_total_pages']=$total_pages;

        $result=$review->companyreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['companyreview']="failed";
            header("Location: ../../view/customer/customer_review.php");
        }else{
            $_SESSION['companyreview']=$result;
            header("Location: ../../view/customer/customer_companyReview.php");
        }
    }
}
if(isset($_POST['editreview'])){
    $rateid=$_POST['rateid'];
    $desc=$_POST['desc'];

    $rateid=$connection->real_escape_string($rateid);   
    $desc=$connection->real_escape_string($desc);

    $review=new review_model();
    $userid=$_SESSION['User_id'];
    $result=$review->updatereview($connection,$rateid,$desc,$userid);
    if($result===false){
        $_SESSION['updatereview']="failed";
        header("Location: ../../view/customer/customer_viewreviews.php");
    }else{
        $_SESSION['updatereview']="success";
        $review=new review_model();

        $rc=new review_controller();
        $rc->pagination($connection,$userid);
        $limit=$_SESSION['limit'];
        $offset=$_SESSION['offset'];

        $result=$review->viewreview($connection,$_SESSION['User_id'],$limit,$offset);
        if($result===false){
            $_SESSION['viewreview']="failed";
            header("Location: ../../view/customer/customer_viewreviews.php");
        }else{
            $_SESSION['viewreview']=$result;
            header("Location: ../../view/customer/customer_viewreviews.php");
        }
    }

}
class review_controller{
    public function pagination($connection,$userid){
        $review=new review_model();

        //pagination for view orders
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['page']=$page;
        $offset = ($page - 1) * $limit;
        
        //get the total number of orders
        $total_records=$review->review_count($connection,$userid);
        $_SESSION['shop_count']=$total_records;

        //calculate the total number of pages
        $total_pages = ceil($total_records / $limit);
        $_SESSION['total_pages']=$total_pages;
        
        //set the limit and offset
        $_SESSION['limit']=$limit;
        $_SESSION['offset']=$offset;
    }
}