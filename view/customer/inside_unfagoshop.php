<?php session_start(); 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/fago_shop.css">
    <title>Document</title>
</head>
<body>
    <?php include_once '../unreguser_header.php'; ?>
    <?php
         if(isset($_SESSION['gascooker'])){
             $gascooker=$_SESSION['gascooker'];
             $count=count($gascooker);
         }
    ?>
    <div class="navbar">
        <div class="selected">   
            <a href="../../controller/customer/shop_controller.php?urgascooker='1'">Gas Cooker</a>
        </div>
        <a href="../../controller/customer/shop_controller.php?unregulator='1'">Regulator</a>
        <a href="../../controller/customer/shop_controller.php?unother='1'">Other</a>
    </div>
    <div class="products">
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
                <input type="hidden" name="item_code" value="<?php echo $gas['item_code']; ?>">
                <input type="hidden" name="product_type" value="<?php echo $gas['product_type']; ?>">
                <input type="hidden" name="Name" value="<?php echo $gas['Name']; ?>">
                <input type="hidden" name="price" value="<?php echo $gas['price']; ?>">
                <input type="hidden" name="Quantity" value="<?php echo $gas['Quantity']; ?>">
                <input type="hidden" name="Description" value="<?php echo $gas['Description']; ?>">
                <input type="hidden" name="Category" value="<?php echo $gas['Category']; ?>">
                <img src="../../public/images/product/<?php echo $gas['image']?>">
                <?php
                echo "<h3>".$gas['Name']."</h3>";
                echo "<div class='price'>";
                    echo "<p >Rs. ".$gas['price']."</p>";
                echo "</div>";
                if($gas['Quantity']>0){?>
                    <button name="view_item" id="popup" onclick="popup()">Add to Cart</button>
                <?php
                }else{?>
                  <div class="disabled">
                    <button style="color: red; border: 1px solid red;" disabled>Out of Stock</button>
                  </div>
                <?php }
            ?>    
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
            if(isset($_SESSION['ungascooker_page'])){
                $page=$_SESSION['ungascooker_page'];
            }else{
                $page=1;
            }
            if(isset($_SESSION['ungascooker_total_pages'])){
                $total_pages=$_SESSION['ungascooker_total_pages'];
            }else{
                $total_pages=1;
            }    
        ?>
        <div class="pagination">
            <?php if($page>1){?>
                <!-- pass value as form -->
                <div class="p-left">
                    <form action="../../controller/customer/shop_controller.php" method="GET">
                        <input type="hidden" name="ungascooker_page" value="<?php echo $page-1?>">
                        <input type="submit" value="Previous Page">
                    </form>
                </div>
            <?php } ?>
            <?php if($page<$total_pages){?>
                <!-- pass value as form -->
                <div class="p-right">
                    <form action="../../controller/customer/shop_controller.php" method="GET">
                        <input type="hidden" name="ungascooker_page" value="<?php echo $page+1?>">
                        <input type="submit" value="Next Page">
                    </form>
                </div>
            <?php } ?>
        </div>  
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div>
                    <p id="waitingMessage">
                        You have to first register to the system.
                        <button class="register" onclick="register()";>Register</button>      
                        <button class="close" onclick="closemsg()";>Close</button><br>    
                        <button class="login" onclick="login()";>Login</button>   
                    </p>
                </div>            
            </div>
        </div> 
        <script>
            function popup(){
                document.getElementById("myModal").style.display = "block";
            }
            function closemsg(){
                document.getElementById("myModal").style.display = "none";
                // window.location.href = "../../controller/customer/shop_controller.php?urgascooker='1'";
            }
            function register(){
                window.location.href = "customer_register.php";
            }
            function login(){
                window.location.href = "../../view/login.php";
            }
        </script>
    </body>
</html>