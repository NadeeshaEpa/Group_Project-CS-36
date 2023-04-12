<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="dcontainer">
    <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-select-multiple'></i>
                <span class="text">FaGo</span>
            </a>
            <ul class="side-menu top">	
                <li>	
                    <a href="../../controller/customer/account_controller.php?viewacc='1'">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/order_controller.php?orderid='1'">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">My orders</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../../controller/customer/review_controller.php?reviewid='1'">
                        <i class='bx bxs-doughnut-chart' ></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/complain_controller.php?complainid='1'">
                        <i class='bx bxs-badge-check' ></i>
                        <span class="text">Complains</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="../../controller/Users/logout_controller.php" class="logout">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>
	<!-- SIDEBAR -->
        <?php include_once 'customer_header.php'; ?>
            <div class="review-details">
                    <?php
                        if(isset($_SESSION['updatereview'])){
                            if($_SESSION['updatereview']=="failed"){?>
                            <div class="error-msg">
                                <p>You can't update a review which published more than 7 days ago.</p>
                            </div>
                        <?php }
                            unset($_SESSION['updatereview']);
                        } 
                    ?>
                        <h1>All Reviews</h1>
                        <div class="type">
                            <a href="../../controller/customer/review_controller.php?view-review='1'"><button class="selected">Delivery Person Reviews</button></a>
                            <a href="../../controller/customer/review_controller.php?company_reviewid='1'"><button>Company Reviews</button></a>
                         </div>
                <div class="reviewtable"> 
                    <h2>Delivery Person Reviews</h2>
                        <table>
                            <tr>
                                <th>Delivery Person</th>
                                <th>Delivery Person name</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            <?php
                                if(isset($_SESSION['viewreview'])){
                                    if($_SESSION['viewreview']==='failed'){
                                        unset($_SESSION['viewreview']);
                                        $details=[];
                                    }else{
                                        $details=$_SESSION['viewreview'];
                                    }
                                }
                                foreach($details as $detail){?>
                                    <tr>

                                        <td><img src="../../public/images/DeliveryPerson/profile_img/<?php echo $detail['image'] ?>" width="50px" height="50px"></td>
                                        <td><?php echo $detail['First_Name']." ".$detail['Last_Name']; ?></td>
                                        <td><?php echo $detail['Date']; ?></td>
                                        <td><?php echo $detail['Description']; ?></td> 
                                        <td>     
                                                <div class="editbtn"> 
                                                    <a href="../../controller/customer/review_controller.php?erid=<?php echo $detail['Rate_id']; ?>">Edit</a>
                                                </div>
                                                <div class="rdeletebtn">
                                                <button onclick="deletereview(<?php echo $detail['Rate_id']; ?>);">Delete</button>
                                                </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>
                        <?php 
                            if(isset($_SESSION['page'])){
                            $page=$_SESSION['page'];
                            }else{
                            $page=1;
                            }
                            if(isset($_SESSION['total_pages'])){
                                $total_pages=$_SESSION['total_pages'];
                            }else{
                                $total_pages=1;
                            }    
                        ?>
                        <div class="pagination">
                            <?php if($page>1){?>
                                <!-- pass value as form -->
                                <div class="p-left">
                                    <form action="../../controller/customer/review_controller.php" method="GET">
                                        <input type="hidden" name="page" value="<?php echo $page-1?>">
                                        <input type="submit" value="Previous">
                                    </form>
                                </div>
                            <?php } ?>
                            <?php if($page<$total_pages){?>
                                <!-- pass value as form -->
                                <div class="p-right">
                                    <form action="../../controller/customer/review_controller.php" method="GET">
                                        <input type="hidden" name="page" value="<?php echo $page+1?>">
                                        <input type="submit" value="Next">
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                </div>
            </div> 
    </div>
    <!-- pop up message -->
    <div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Delete this review?</p>
                <div class="buttons">
                    <button id="yes">Yes</button>
                    <button id="no">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletereview(id){
            document.getElementById("backgr").style.display="block";
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/customer/review_controller.php?drid="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("backgr").style.display="none";
                document.getElementById("cancel_popup").style.display="none";
            });
        }  
    </script> 
</body>
</html>