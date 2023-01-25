<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/inside_shop.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <?php
        $button=0;
        if(isset($_SESSION['gasavailability'])){
            $gasdetails=$_SESSION['gasavailability'];
        }
        if(isset($_SESSION['gas_type'])){
            $type=$_SESSION['gas_type'];
        }
        if(isset($_SESSION['shopname'])){
            $data=$_SESSION['shopname'];
            $shopname=$data[0]['Shop_name'];
            $contactno=$data[0]['Contact_No'];
            $lastupdatedtime=$data[0]['LastUpdatedTime'];
            $lastupdateddate=$data[0]['LastUpdatedDate'];
            $Gas_id=$data[0]['Gas_id'];
        }
        if(isset($_SESSION['addtocart'])){
            if($_SESSION['addtocart']=="success"){
                $button=1;
            }else{
                $button=2;
            }
        }
    ?>
    <h1><?php echo $shopname?></h1>
    <div class="details">
        <div class="details-left">
            <h3>Contact No:<?php echo $contactno?></h3>
            <h3>Last Updated:<?php echo $lastupdateddate?> <?php echo $lastupdatedtime?></h3>
        </div>
        <div class="details-right">
            <!-- pass the button value as a post variable -->
            <form action="../../controller/customer/addtocart_controller.php" method="post">
                <input type="hidden" name="button" value="<?php echo $button?>">
                <input type="hidden" name="gas_id" value="<?php echo $Gas_id?>">
                <button type="submit" name="viewcart" class="viewcart">View Cart</button>
            </form>
        </div>    
    </div>
    <hr>
        <?php
            foreach($gasdetails as $gasdetail){?>
            <div class="ava">
                <div class="gas">
                    <img src="../../public/images/gascylinder/<?php echo $gasdetail['photo']?>" alt="" width="230px" height="320px">
                </div>
                <!-- <form action="../../controller/customer/addtocart_controller.php" method="post"> -->
                <div class="gasdetails">    
                    <div class="gas-left">
                        <form action="../../controller/customer/addtocart_controller.php" method="post">
                            <label for="weight" class="gasname"><?php echo $type?> Gas <?php echo $gasdetail['Weight']?>kg Cylinder</label><br><br>
                            <label for="Quantity">Availability:<?php echo $gasdetail['Quantity']?></label><br><br><br>   
                            <label for="price" class="price">Rs:<?php echo $gasdetail['price']?></label><br>
                            <input type="hidden" name="price" value="<?php echo $gasdetail['price']?>">
                            <input type="hidden" name="gasid" value="<?php echo $Gas_id?>">
                            <input type="hidden" name="quantity" value="<?php echo $gasdetail['Quantity']?>">
                            <input type="hidden" name="weight" value="<?php echo $gasdetail['Weight']?>">
                            <input type="hidden" name="gastype" value="<?php echo $type?>">
                    </div>  
                    <!-- create a drop down to count the number of gas cylinders -->
                    <div class="gas-right">
                        <div class="count">
                        <label for="count">Count:</label>
                            <select name="quantity" id="quantity" class="numberofgas">
                                <?php 
                                    if($gasdetail['Quantity']==0){
                                        echo "<option value='0'>0</option>";
                                    }
                                    for($i=1;$i<=$gasdetail['Quantity'];$i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                    <?php }
                                ?>
                            </select> 
                        </div>  
                        <div class="order">
                            <?php if($gasdetail['Quantity']==0){?>
                                <button class="order" disabled>Add to Cart</button>
                            <?php }else{?>
                                <button class="order" name="addtocart">Add to Cart</button>
                            <?php }?>
                        </div>         
                    </div>    
                    
                </div>
                </form>
            </div>   
            <hr> 
        <?php } ?>
       
</body>
</html>