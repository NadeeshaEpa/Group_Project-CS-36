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
            ?>
            <h1>Litro Gas</h1>
            <table>
                <tr>
                    <th>Vendor</th>
                    <th>12.5kg</th>
                    <th>5kg</th>
                    <th>2.3kg</th>
                    <th>order</th>
                </tr>
                <?php 
                for($i=0;$i<$count;$i++){?>
                <tr>
                    <td><?php echo $litro[$i]['Shop_name']?></td>
                    <td><?php 
                        if($litro[$i]['Quantity']==0){
                            echo "Not available";
                            $i++;
                        }else{
                            echo $litro[$i]['Quantity'];
                            $i++;
                        }?>
                    </td>                      
                    <td><?php 
                        if($litro[$i]['Quantity']==0){
                            echo "Not available";
                            $i++;
                        }else{
                            echo $litro[$i]['Quantity'];
                            $i++;
                        }?>
                    </td>  
                    <td><?php 
                        if($litro[$i]['Quantity']==0){
                            echo "Not available";
                        }else{
                            echo $litro[$i]['Quantity'];
                        }?>
                    </td>  
                    <td><a href="customer_litrogas.php?litroid=<?php echo $litro[$i]['GasAgent_Id']?>">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>    
    <?php include_once 'customer_footer.php'; ?>
</body>
</html>