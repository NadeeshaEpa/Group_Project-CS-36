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
        <img src="../../public/images/litro2.jpg" alt="" class="litroimg">
        </div>
        <div class="right">
            <?php 
                if(isset($_SESSION['viewlitro'])){
                    $litro=$_SESSION['viewlitro'];
                    $count=count($litro);
                }
                if(isset($_SESSION['litroweight'])){
                    $litroweight=$_SESSION['litroweight'];
                    $count1=count($litroweight);
                }
                if(isset($_SESSION['litroshopnames'])){
                    $shops=$_SESSION['litroshopnames'];
                    $count2=count($shops);
                }
            ?>
            <h1>Litro Gas</h1>
            <table>
                <tr>
                    <th>Vendor</th>
                    <?php 
                        foreach($litroweight as $litroweight1){?>
                            <th><?php echo $litroweight1['Weight']?>kg</th>
                        <?php } ?>
                    <th>order</th>
                </tr>
                    <?php 
                    foreach($shops as $shop){?>
                    <tr>
                        <td><?php echo $shop['Shop_name']?></td>
                        <?php 
                        foreach($litroweight as $litroweight1){
                            $flag=0;
                            foreach($litro as $litro1){?>
                            <?php 
                            if($litro1['Shop_name']==$shop['Shop_name'] && $litro1['Weight']==$litroweight1['Weight']){?>
                                <td><?php echo $litro1['Quantity'];?></td>
                                <?php
                                $gasagent=$litro1['GasAgent_Id'];
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
                               $gasagent=$litro1['GasAgent_Id'];
                               ?></td>
                            <?php 
                            }
                        } ?> 
                        <td><a href="customer_litrogas.php?litroid=<?php echo $gasagent?>">View</a></td>              
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>    
    <?php include_once 'customer_footer.php'; ?>
</body>
</html>