<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_gas.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <div class="container">
        <div class="left">
        </div>
        <div class="right">
            <?php 
                if($_SESSION['available']=="failed" || $_SESSION['viewgas']=="failed"){
                        header("location:error.php");
                }else{
                    if(isset($_SESSION['viewgas'])){
                        $gas=$_SESSION['viewgas'];
                        // print_r($gas);
                        // die();
                        $count=count($gas);
                    }
                    if(isset($_SESSION['weight'])){
                        $weight=$_SESSION['weight'];
                        $count1=count($weight);
                    }
                    if(isset($_SESSION['shopnames'])){
                        $shops=$_SESSION['shopnames'];
                        $count2=count($shops);
                    }
                }
            ?>
            <h1><?php echo $_SESSION['gas_type']?> Gas</h1>
            <table>
                <tr>
                    <th>Vendor</th>
                    <?php 
                        foreach($weight as $weight1){?>
                            <th><?php echo $weight1['Weight']?>kg</th>
                        <?php } ?>
                    <th>Refilling</th>
                    <th>New Cylinder</th>
                </tr>
                    <?php 
                    $i=0;
                    foreach($shops as $shop){?>
                    <tr>

                        <td><?php echo $shop['Shop_name']?></td>
                        <?php 
                        foreach($weight as $weight1){
                            $flag=0;
                            foreach($gas as $gas1){?>
                            <?php 
                            if($gas1['Shop_name']==$shop['Shop_name'] && $gas1['Weight']==$weight1['Weight']){?>
                                <td><?php echo $gas1['Quantity'];?></td>
                                <?php
                                $gasagent=$gas1['GasAgent_Id'];
                                $_SESSION['gasagent']=$gasagent;
                                $flag=1;
                                break;
                            }else{
                                continue;
                            }
                            ?>
                            <?php 
                            }
                            if($flag==0){?>
                               <td><?php
                                $i++;
                                echo "Not available"; 
                               ?></td>
                            <?php 
                            }
                        } ?> 
                        <!-- call gas controller by passing the gas agent id -->
                        <?php if($i==$count1){?>
                            <td><button disabled>Order</button></td>
                        <?php }else{?>
                            <td><a href="../../controller/customer/gas_controller.php?gasid=<?php echo $gasagent?>">Order</a></td>
                        <?php } ?>

                        <?php if($i==$count1){?>
                            <td><button disabled>Buy</button></td>
                        <?php }else{?>
                            <td><a href="../../controller/customer/gas_controller.php?newgasid=<?php echo $gasagent?>">Buy</a></td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>    
    <?php //include_once 'customer_footer.php'; ?>
</body>
</html>