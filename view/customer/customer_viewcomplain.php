<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_complain.css">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION['complain-order'])){
        $orderid=$_SESSION['complain-order'];
    }
    ?>
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
                <li class>
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
                <li class="active">
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
        <?php if(isset($_SESSION['viewcomplain'])){
            $complain=$_SESSION['viewcomplain'];
        } ?>
        <div class="complain-table">
            <h1>All Complains</h1>
            <table>
                <tr>
                    <th>Complain ID</th>
                    <th>Order ID</th>
                    <th>Complain</th>
                    <th>Complain Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Delete</th>
                    
                </tr>
                <?php foreach($complain as $complain){ ?>
                <tr>
                    <td><?php echo $complain['complain_id']; ?></td>
                    <td><?php echo $complain['order_id']; ?></td>
                    <td><?php echo $complain['complain']; ?></td>
                    <td><?php echo $complain['date']; ?></td>
                    <?php if($complain['status']==0){ ?>
                        <!-- change the color of text to red -->
                        <td style="color: red;"><?php echo "Unchecked"; ?></td>
                    <?php }else if($complain['status']==2){ ?>
                        <!-- change the color of text to green -->
                        <td style="color: green;"><?php echo "Checked"; ?></td>
                    <?php } ?>
                    <td><button onclick="viewaction('<?php echo $complain['message'] ?>');">View</button></td>
                    <td><button onclick="deletecomplain(<?php echo $complain['complain_id']; ?>)">Delete</button></td>
                    
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
                            <form action="../../controller/customer/complain_controller.php" method="GET">
                                <input type="hidden" name="page" value="<?php echo $page-1?>">
                                <input type="submit" value="Previous">
                            </form>
                        </div>
                    <?php } ?>
                    <?php if($page<$total_pages){?>
                        <!-- pass value as form -->
                        <div class="p-right">
                            <form action="../../controller/customer/complain_controller.php" method="GET">
                                <input type="hidden" name="page" value="<?php echo $page+1?>">
                                <input type="submit" value="Next">
                            </form>
                        </div>
                    <?php } ?>
                </div>
        </div>
    </div>
    <!-- pop up message -->
    <div id="complain_popup">
        <div class="complain_contect">
            <div class="complain_header">
                <a href="../../controller/customer/complain_controller.php?view-complain='1'">X</a>
                <h1>Message</h1>
            </div>
            <div class="complain_body">
                <p id="message"></p>
            </div>
        </div>
    </div>  
    <div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Delete this complain?</p>
                <div class="buttons">
                    <button id="yes">Yes</button>
                    <button id="no">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function viewaction(message){
            document.getElementById("message").innerHTML=message;
            document.getElementById("complain_popup").style.display="block";
        }
        function deletecomplain(id){
            document.getElementById("backgr").style.display="block";
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/customer/complain_controller.php?deletecomplainid="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("cancel_popup").style.display="none";
                document.getElementById("backgr").style.display="none";
            });
        }  
    </script>
</body>
</html>