<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <title>view order</title>
</head>
<body>
    <?php require_once 'customer_header.php'; ?>
    <div class="dcontainer">
    <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-select-multiple'></i>
                <span class="text">FaGo</span>
            </a>
            <ul class="side-menu top">	
                <li class>	
                    <a href="../../controller/customer/account_controller.php?viewacc='1'">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../../controller/customer/order_controller.php?orderid='1'">    
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">My orders</span>
                    </a>
                </li>
                <li>
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
        <div class="order-form">
            <?php 
                if(isset($_SESSION['vieworders'])){
                    if($_SESSION['vieworders']==='failed'){
                        unset($_SESSION['vieworders']);
                        $details=[];
                    }else{
                        $details=$_SESSION['vieworders'];
                    }
                }
            ?>
            <div class="heading">
            <h1>My orders</h1>
            </div>   
            <!-- print order details as a table -->
            <div class="type">
                <a href="../../controller/customer/order_controller.php?orderid='1'"><button class="selected">Gas Orders</button></a>
                <a href="../../controller/customer/order_controller.php?shoporderid='2'"><button>Fago Shop Orders</button></a>
            </div>
            <div class="ordertable">
                <h2>All Orders</h2>
                <table>
                    <tr>
                        <th>Gas Agent Name</th>
                        <th>Order No</th>
                        <th>Amount</th>
                        <th>Delivery Method</th>
                        <th>Delivery Status</th>
                        <th>Full Details</th>
                        <th>Cancel Order</th>
                    </tr>
                    <?php
                        foreach($details as $detail){?>
                            <tr>
                                    <td><?php echo $detail['First_Name']." ".$detail['Last_Name']?></td>
                                    <td><?php echo $detail['Order_id']?></td>
                                    <td><?php echo $detail['Amount']?></td>
                                    <td><?php echo $detail['Delivery_Method']?></td>
                                    <div class="status">
                                        <?php if($detail['Delivery_Status']==NULL){?>
                                            <td style="color:lightgreen"><b>Not Assigned</b></td>
                                        <?php }else if($detail['Delivery_Status']==3){?>
                                            <td style="color:blue"><b>Courier Service</b></td>
                                        <?php }else if($detail['Delivery_Status']==2){?>
                                            <td style="color:red"><b>No delivery</b></td>
                                        <?php }else if($detail['Delivery_Status']==0){?>
                                            <td style="color:#FDC801"><b>On the way</b></td>
                                        <?php }else if($detail['Delivery_Status']==1){?>
                                            <td style="color:green"><b>Delivered</b></td>     
                                        <?php } ?>
                                    </div>
                                    <td><a href="../../controller/customer/order_controller.php?id=<?php echo $detail['Order_id']?>">View</a></td>    
                                    <?php
                                    //get the difference between current date and order date 
                                    date_default_timezone_set('Asia/Colombo');
                                    $date1=date_create(date("Y-m-d"));
                                    $date2=date_create($detail['Order_date']);
                                    $diff=date_diff($date1,$date2);
                                    $diff=$diff->format("%a");
                                    
                                    if(($detail['Delivery_Status']==NULL && $diff<2)||($detail['Delivery_Status']==2 && $diff<1)){?>
                                    <div class="cancelbutton">
                                        <td><button id="cancelbutton" onclick="cancelorder(<?php echo $detail['Order_id']?>);">Cancel</button></td>
                                    </div>
                                    <?php }else{?>
                                        <td><button id="dcancelbutton">Cancel</button></td>
                                    <?php }
                                    ?>
                            </tr>
                        <?php }?>
                </table>
                <?php 
                    if(isset($_SESSION['gas_page'])){
                      $page=$_SESSION['gas_page'];
                    }else{
                      $page=1;
                    }
                    if(isset($_SESSION['gas_total_pages'])){
                        $total_pages=$_SESSION['gas_total_pages'];
                    }else{
                        $total_pages=1;
                    }    
                ?>
                <div class="pagination">
                    <?php if($page>1){?>
                        <!-- pass value as form -->
                        <div class="p-left">
                            <form action="../../controller/customer/order_controller.php" method="GET">
                                <input type="hidden" name="page" value="<?php echo $page-1?>">
                                <input type="submit" value="Previous">
                            </form>
                        </div>
                    <?php } ?>
                    <?php if($page<$total_pages){?>
                        <!-- pass value as form -->
                        <div class="p-right">
                            <form action="../../controller/customer/order_controller.php" method="GET">
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
    <div id="cancel_popup">
        <div class="cancel_contect">
            <p>Are you sure you want to cancel this order?</p>
            <div class="buttons">
                <button id="yes">Yes</button>
                <button id="no">No</button>
            </div>
        </div>
    </div>
    <script>
        function cancelorder(id){
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/customer/order_controller.php?cancelid="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("cancel_popup").style.display="none";
            });
        }  
    </script>
</body>
</html>