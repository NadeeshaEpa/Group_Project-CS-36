<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/fago_shop.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <?php
         if(isset($_SESSION['gascooker'])){
             $gascooker=$_SESSION['gascooker'];
             $count=count($gascooker);
         }
    ?>
    <div class="navbar">
        <div class="selected">   
            <a href="../../controller/customer/shop_controller.php?gascooker='1'">Gas Cooker</a>
        </div>
        <a href="../../controller/customer/shop_controller.php?regulator='1'">Regulator</a>
        <a href="../../controller/customer/shop_controller.php?other='1'">Other</a>
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
    <div class="serach-bar">
        <form method="get" action="../../controller/customer/shop_controller.php">
            <label for="search">Search for products:</label>
            <input type="text" id="search" name="searchitem">
            <button type="submit" name="gsearch">Search</button>
        </form>
    </div>    
    <div class="products">
        <?php
            if($count==0){
                echo "<div class='success-msg'>No items found</div>";
            }
        ?>
        <!-- print the products as 4 items per row -->
        <?php
            $i=0;
            foreach($gascooker as $gas){
                if($i%4==0){
                    echo "<div class='row'>";
                }
                echo "<div class='item'>";
                //print the image of the product type 
                ?>
            <form action="../../controller/customer/shop_controller.php" method="POST">
                <input type="hidden" name="item_code" value="<?php echo $gas['item_code']; ?>">
                <input type="hidden" name="product_type" value="<?php echo $gas['product_type']; ?>">
                <input type="hidden" name="Name" value="<?php echo $gas['Name']; ?>">
                <input type="hidden" name="price" value="<?php echo $gas['price']; ?>">
                <input type="hidden" name="Quantity" value="<?php echo $gas['Quantity']; ?>">
                <input type="hidden" name="Description" value="<?php echo $gas['Description']; ?>">
                <input type="hidden" name="Category" value="<?php echo $gas['Category']; ?>">
                <input type="hidden" name="agent" value="stock_manager">
                <input type="hidden" name="image" value="<?php echo $gas['image']; ?>">

                <img src="../../public/images/product/<?php echo $gas['image']?>">

                <?php
                echo "<h3>".$gas['Name']."</h3>";
                echo "<div class='price'>";
                    echo "<p >Rs. ".$gas['price']."</p>";
                echo "</div>";
                if($gas['Quantity']>0){?>
                    <button name="view_item">Add to Cart</button>
                <?php
                }else{?>
                  <div class="disabled">
                    <button style="color: red;" disabled>Out of Stock</button>
                  </div>
                <?php }
            ?>    
            </form>   
            <?php
                echo "</div>";
                if($i%4==3){
                    echo "</div>";
                }
                $i++;
            }
        ?>
    </div>
        <?php 
            if(isset($_SESSION['gascooker_page'])){
                $page=$_SESSION['gascooker_page'];
            }else{
                $page=1;
            }
            if(isset($_SESSION['gascooker_total_pages'])){
                $total_pages=$_SESSION['gascooker_total_pages'];
            }else{
                $total_pages=1;
            }    
        ?>
        <div class="pagination">
            <?php if($page>1){?>
                <!-- pass value as form -->
                <div class="p-left">
                    <form action="../../controller/customer/shop_controller.php" method="GET">
                        <input type="hidden" name="gascooker_page" value="<?php echo $page-1?>">
                        <input type="submit" value="Previous Page">
                    </form>
                </div>
            <?php } ?>
            <?php if($page<$total_pages){?>
                <!-- pass value as form -->
                <div class="p-right">
                    <form action="../../controller/customer/shop_controller.php" method="GET">
                        <input type="hidden" name="gascooker_page" value="<?php echo $page+1?>">
                        <input type="submit" value="Next Page">
                    </form>
                </div>
            <?php } ?>
        </div>    
</body>
</html>