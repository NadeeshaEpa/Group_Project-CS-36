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
    <?php include_once '../header.php'; ?>
    <?php
         if(isset($_SESSION['regulator'])){
             $regulator=$_SESSION['regulator'];
             $count=count($regulator);
         }
    ?>
    <div class="navbar">   
        <a href="../../controller/customer/shop_controller.php?urgascooker='1'">Gas Cooker</a>
        <div class="selected">
            <a href="../../controller/customer/shop_controller.php?unregulator='1'">Regulator</a>
        </div>
        <a href="../../controller/customer/shop_controller.php?unother='1'">Other</a>
    </div>
    <div class="products">
        <!-- print the products as 4 items per row -->
        <?php
            $i=0;
            foreach($regulator as $gas){
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
                <!-- get the extension of the image -->
                <?php
                    // $image=$gas['product_type'];
                    // $ext=explode(".",$image);
                    // $ext=$ext[1];
                    // print_r($ext);
                    // die();
                ?>
                <img src="../../public/images/customer/<?php echo $gas['product_type']; ?>.jpg" alt="">
                <?php
                echo "<h3>".$gas['Name']."</h3>";
                echo "<div class='price'>";
                    echo "<p >Rs. ".$gas['price']."</p>";
                echo "</div>";
                if($gas['Quantity']>0){?>
                    <button name="view_item" onclick="popup()":>Add to Cart</button>
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