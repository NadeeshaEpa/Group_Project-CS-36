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
        if(isset($_SESSION['shopimage'])){
            $shopimage=$_SESSION['shopimage'];
        }
    ?>
        <div class="upcontainer" style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../../public/images/gascylinder/<?php echo $shopimage?>');">
            <div class="back">
                <a href="customer_viewgas.php">
                    <img src="../../public/images/customer/back.png" alt="" class="backimg">
                </a>
            </div>
            <h1><?php echo $shopname?></h1>
            <div class="details">
                <div class="details-left">
                    <b >Contact No:</b><?php echo $contactno?><br><br>
                    <b >Last Updated:</b><?php echo $lastupdateddate?> <?php echo $lastupdatedtime?>
                </div>
                <div class="details-right">
                    <!-- pass the button value as a post variable -->
                    <form action="../../controller/customer/addtocart_controller.php" method="post">
                        <button type="submit" name="viewcart" class="viewcart">View Cart</button>
                    </form>
                </div>    
            </div>
        </div>
        <?php
        if(isset($_SESSION['addtocart'])){?>
            <div class="success-msg">
            <?php       
            if($_SESSION['addtocart']=="success"){
                echo "Item Added To Cart Successfully";
            ?>
            </div> 
            <?php
            }else{?>
            <div class="error-msg">
            <?php
                echo "Item not added to cart";
            }?>
            </div>
            <?php
            unset($_SESSION['addtocart']);
        }
        ?>
        <?php
            foreach($gasdetails as $gasdetail){?>
            <div class="ava">
                <div class="gas">
                    <img src="../../public/images/gascylinder/<?php echo $gasdetail['photo']?>" alt="">
                </div>
                <div class="gasdetails">    
                    <div class="gas-left">
                        <form action="../../controller/customer/addtocart_controller.php" method="post">
                            <label for="weight" class="gasname"><?php echo $type?> Gas <?php echo $gasdetail['Weight']?>kg Cylinder</label><br><br>
                            <label for="Quantity">Availability:<?php echo $gasdetail['Quantity']?></label><br><br>
                            <label for="price" class="price">Rs:<?php echo $gasdetail['newcylinder_price']?></label><br>
                            <input type="hidden" name="item_id" value="<?php echo $gasdetail['item_id']?>">
                            <input type="hidden" name="price" value="<?php echo $gasdetail['newcylinder_price']?>">
                            <input type="hidden" name="gasid" value="<?php echo $Gas_id?>">
                            <input type="hidden" name="quantity" value="<?php echo $gasdetail['Quantity']?>">
                            <input type="hidden" name="weight" value="<?php echo $gasdetail['Weight']?>">
                            <input type="hidden" name="gastype" value="<?php echo $type?>">
                            <input type="hidden" name="cylinder" value="new">
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
                                <button class="dorder" disabled>Add to Cart</button>
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