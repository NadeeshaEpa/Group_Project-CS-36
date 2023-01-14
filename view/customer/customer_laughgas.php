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
        <img src="../../public/images/laugh2.jpg" alt="" class="litroimg">
        </div>
        <div class="right">
            <?php 
                if(isset($_SESSION['viewlaugh'])){
                    $laugh=$_SESSION['viewlaugh'];
                    $count=count($laugh);
                }
                if(isset($_SESSION['laughweight'])){
                    $laughweight=$_SESSION['laughweight'];
                    $count1=count($laughweight);
                }
                if(isset($_SESSION['laughshopnames'])){
                    $shops=$_SESSION['laughshopnames'];
                    $count2=count($shops);
                }
            ?>
            <h1>Laugh Gas</h1>
            <table>
                <tr>
                    <th>Vendor</th>
                    <?php
                    foreach($laughweight as $laughweight1){?>
                        <th><?php echo $laughweight1['Weight']?>kg</th>
                    <?php } ?>
                    <th>order</th>
                </tr>
                </tr>
                    <?php 
                    foreach($shops as $shop){?>
                    <tr>
                        <td><?php echo $shop['Shop_name']?></td>
                        <?php 
                        foreach($laughweight as $laughweight1){
                            $flag=0;
                            foreach($laugh as $laugh1){?>
                            <?php 
                            if($laugh1['Shop_name']==$shop['Shop_name'] && $laugh1['Weight']==$laughweight1['Weight']){?>
                                <td><?php echo $laugh1['Quantity'];?></td>
                                <?php
                                $gasagent=$laugh1['GasAgent_Id'];
                                $flag=1;
                                break;
                            }else{
                                continue;
                            }
                            ?>
                            <?php 
                            }
                            if($flag==0){?>
                               <td><?php echo "Not available"; 
                               $gasagent=$laugh1['GasAgent_Id'];
                               ?></td>
                            <?php 
                            }
                        } ?> 
                        <td><a href="customer_laughgas.php?laughid=<?php echo $gasagent?>">View</a></td>              
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>    
    <?php include_once 'customer_footer.php'; ?>
</body>
</html>