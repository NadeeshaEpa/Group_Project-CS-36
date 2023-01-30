<?php
session_start();
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/newdashboard.css">
    <title>Document</title>
</head>
<body>
<?php include '../../public/user_header.php'; ?>

<div class="split left">
    <!-- <div class="vertical-menu">
    <br><button  class="active"><a href="#"><img src="../../public/images/menu.png" width="30px" height="30px">Dashboard</a></button><br><br>
    <button>
      <a href="#">
          <img src="../../public/images/user.png" width="30px" height="30px">
          <div class="word">
             Account
          </div>   
      </a>
    </button><br><br>
    <button><a href="#"><img src="../../public/images/delivery.png" width="30px" height="30px">Delivery Requests</a></button><br><br>
    <button><a href="#"><img src="../../public/images/review.png" width="30px" height="30px">Reviews</a></button>
    </div> -->
    <div class="left">
                <div class="left1">
                <div class="active"> 
                    <a href="delivery_dashboard.php">
                        <button class="active">
                        <div class="left1-1">
                            <img src="../../public/images/menu.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Dashboard</p>
                        <p>Delivery Person</p>
        
                        </button>    
                    </a>
                    
                </div>  
                </div>
                <div class="left2">
                    <form action="#" method="POST">
                        <button name="orders">
                            <div class="left2-1">
                                <img src="../../public/images/user.png" alt="logo" width="20px" height="20px">
                            </div>
                            <p>Account</p>
                            <p>Personal Information</P>
                        </button>
                    </form>    
                </div>

                <div class="left2">
                <form action="#" method="POST">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/delivery.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Delivery Request</p>
                        <p>Gas Orders</P>
                    </button>
                    </form>
                </div>

                <div class="left2">
                <form action="#" method="POST">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/review.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Reviews</p>
                        <p>Customer Reviews</P>
                    </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<div class="split right">
    <h2>     Dashboard</h2>

    <div class=tiles>

    <div class="container">
    <h3>
      20
    </h3>
    <p>Deliered Orders</p>
    </div>

    <div class="container"">
    <h3>
      3
    </h3>
    <p>Cancelled Orders</p>
    </div>

    <div class="container" ">
    <h3>
      20
    </h3>
    <p>Orders to be delivered</p>
    </div>

    </div>
    
    <dic class="graphs">
    <div class = "pic1">
        <img src="../../public/images/graph.PNG"  alt="">
    </div>

    <div class = "pic2">
        <img src="../../public/images/graph1.PNG"  alt="">
    </div>

</div>
</div>
</body>
</html>