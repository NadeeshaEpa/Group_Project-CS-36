<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/view_item.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <?php
      if(isset($_SESSION['gascookerview'])){
        $gas=$_SESSION['gascookerview'];
      }
    ?>
    <form action="../../controller/customer/shop_controller.php" method="POST">
         <input type="hidden" name="item_code" value="<?php echo $gas[0]['item_code']; ?>">
         <input type="hidden" name="product_type" value="<?php echo $gas[0]['product_type']; ?>">
         <input type="hidden" name="Name" value="<?php echo $gas[0]['name']; ?>">
         <input type="hidden" name="price" value="<?php echo $gas[0]['price']; ?>">
         <input type="hidden" name="Description" value="<?php echo $gas[0]['description']; ?>">
         <input type="hidden" name="Category" value="<?php echo $gas[0]['category']; ?>">
         
        <div class="card">
        <div class="image"> 
            <img src="../../public/images/product/<?php echo $gas[0]['image']?>">  
        </div>
        <div class="details">
         <!-- print the item as a card -->
            <h3><?php echo $gas[0]['name']; ?></h3>
            <div class="description">
                <p><?php echo $gas[0]['description']; ?></p>
            </div> 
            <h4>Model:<?php echo $gas[0]['product_type']; ?></h4>
            <div class="price">
                <p >Rs. <?php echo $gas[0]['price']; ?></p>
            </div>
            <div class="quantity">
                <!-- create a drop down to select the quantity -->
                <label for="quantity">Quantity:</label>
                <select name="quantity" id="quantity">
                    <?php
                        for($i=1;$i<=$gas[0]['quantity'];$i++){?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                    ?>
                </select>
            </div>           
            <?php
                if($gas[0]['quantity']>0){?>
                    <button name="shop_add" onclick="showPopup()">Add to Cart</button>
                <?php
                }else{?>
                    <button disabled>Out of Stock</button>
                <?php }
            ?>
        </div>
    </form> 
    <script>
        function showPopup(){
            alert("Item added to cart");
        }
    </script> 
</body>
</html>