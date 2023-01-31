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
        <a href="../../controller/customer/shop_controller.php?gastubes='1'">Gas Tubes</a>
        <a href="../../controller/customer/shop_controller.php?other='1'">Other</a>
    </div>
    <div class="products">
        <!-- print the products as 3 items per row -->
        <?php
            $i=0;
            foreach($gascooker as $gas){
                if($i%4==0){
                    echo "<div class='row'>";
                }
                echo "<div class='item'>";
                //print the image of the product type 
                ?>
                <img src="../../public/images/customer/<?php echo $gas['product_type']; ?>.jpg" alt="">
                <?php
                echo "<h3>".$gas['Name']."</h3>";
                // echo "<p>".$gas['Description']."</p>";
                echo "<p>Rs. ".$gas['price']."</p>";
                echo "<a href='../../controller/customer/shop_controller.php?addtocart=".$gas['item_code']."'><button>Add to Cart</button></a>";
                echo "</div>";
                if($i%4==3){
                    echo "</div>";
                }
                $i++;
            }
        ?>
    </div>
</body>
</html>