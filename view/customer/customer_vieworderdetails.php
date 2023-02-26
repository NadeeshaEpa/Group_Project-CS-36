<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_vieworderdetails.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <title>Document</title>
</head>
<body>
    <?php
       if(isset($_SESSION['vieworderdetails'])){
              $details=$_SESSION['vieworderdetails'];
       }
    ?>
    <?php require_once 'customer_header.php';?> 
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
            <form class="odata">
            <h2>Order Details</h2>
               <?php 

                $order_data=$details[0]['Order_data'];
                $order_items=$details[0]['Order_items'];
                
                $order_id=$order_data[0]['order_id'];
                $order_date=$order_data[0]['Order_date'];
                $order_time=$order_data[0]['Time'];
                $total_amount=$order_data[0]['Amount'];
                $delivery_person=$order_data[0]['Delivery_person'];
                $delivery_fee=$order_data[0]['Delivery_fee'];

                //array_push($order_items,['GasAgent_Name'=>$gasagent_name,'Cylinder_Type'=>$cylinder_type,'Order_Type'=>$order_type,'Quantity'=>$quantity,'Price'=>$price,'Cylinder_details'=>$cylinder_details]);
                $gasagent_name=$order_items[0]['GasAgent_Name'];
                $order_type=$order_items[0]['Order_Type'];
                
                $items=[];
                foreach($order_items as $item){
                    $quantity=$item['Quantity'];
                    $price=$item['Price'];
                    $cylinder_details=$item['Cylinder_details'];
                    $item_details=['Quantity'=>$quantity,'Price'=>$price,'Cylinder_details'=>$cylinder_details];
                    array_push($items,$item_details);
                }
                
               ?>      
               <table>
                    <tr>
                        <td>Order ID</td>
                        <td><?php echo $order_id;?></td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td><?php echo $order_date;?></td>
                    </tr>
                    <tr>
                        <td>Order Time</td>
                        <td><?php echo $order_time;?></td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td><?php echo $total_amount;?></td>
                    </tr>
                    <tr>
                        <td>Delivery Person</td>
                        <td><?php 
                           if($delivery_person==null){
                               echo " Still Not Assigned";
                            }else{
                                echo $delivery_person;
                            }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Delivery Fee</td>
                        <td><?php echo $delivery_fee;?></td>
                    </tr>
                    <tr>
                        <td>Gas Agent</td>
                        <td><?php echo $gasagent_name;?></td>
                    </tr>
                    <tr>
                        <td>Order Type</td>
                        <td><?php echo $order_type;?></td>
                    </tr>
                    <tr>
                        <td>Items</td>
                        <td>
                            <table class="table2">
                                <tr>
                                    <th>Cylinder Details</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                <?php foreach($items as $item){?>
                                <tr>
                                    <td><?php echo $item['Cylinder_details']." Cylinder";?></td>
                                    <td><?php echo $item['Quantity'];?></td>
                                    <td><?php echo "Rs.".$item['Price'];?></td>
                                    
                                </tr>
                                <?php }?>
                            </table>
                        </td>
                    </tr>
                    
                    
               </table>     
            </form>       
        </div>   
</body>
</html>