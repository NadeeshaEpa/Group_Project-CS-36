<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/cart.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <?php
      if(isset($_SESSION['checkout'])){
            if($_SESSION['checkout']=="failed"){
              header("location:error.php");
            }else{
                $checkout=$_SESSION['checkout'];
                $count=count($checkout);
                // print_r($checkout);
                // die();
            }
      }
    ?>
    <h1><?php echo $checkout[0]['shop_name']?></h1>
    <hr>
    <h2>Shopping Cart Items</h2>
    <div class="basket">
        <table>
          <?php 
          $i=1;
          foreach($checkout as $item){?>
            <tr>
              <div class="items">
                <?php if($item['type']=="Gas Cooker" || $item['type']=="Regulator" || $item['type']=="Other"){?>
                  <td class="itemname"><?php echo $i.". ".$item['weight']." model"?></td>
                <?php 
                }else{?>
                  <td class="itemname"><?php echo $i.". ".$item['type']." ".$item['weight']."kg Gas Cylinder"?></td>
                <?php } ?>       
              </div>
              <div class="price">
                <td><?php echo "Rs.".$item['price']?></td>
              </div>  
              <div class="btn">
                <form action="#" method="Post">
                    <td><button class="trash">Remove</button></td>
                    <td><button class="edit">Edit</button></td>
                </form>
              </div>
            </tr>  
          <?php
          $i++;
          } ?>      
        </table>      
    </div>
    <hr>
    <h2>Delivery Details</h2>
    <div class="delivery">
        <div class="delivery-left">
          <form action="#" method="Post">  
            <input type="checkbox" name="delivery" id="delivery" value="delivery">
            <label for="delivery">Get delivered</label><br><br>
            <label for="address">Address:</label><br>
            <input type="text" name="address" id="address" placeholder="Enter your address" class="address"><br>
          </form>
        </div>
        <div class="delivery-right">
            <input type="checkbox" name="nodelivery" id="nodelivery" value="nodelivery">
            <label for="delivery">Pick up</label><br>
            <p>Please notice that if you request for a pickup you have to pickup the cylinder within 48hrs from the shop. Its compulsory to bring your old cylinder.</p>
        </div>
    </div>
    <hr>
    <div class="last">
      <?php 
        $total=0;
        foreach($checkout as $item){
          $total+=$item['price'];
        }
      ?>
      <div class="total-left">
          <table class="total">
              <tr>
                <td>Sub total:</td>
                <td>Rs.<?php echo $total?></td>
              </tr>
              <tr>
                <td>Delivery fee:</td>
                <td>Rs.<?php echo $total*0.01?></td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td>Total:</td>
                <td>Rs.<?php echo $total+$total*0.01?></td>
              </tr>
          </table>
      </div>    
      <div class="check">
        <form action="customer_payment.php" method="Post">
          <button class="checkout-btn">Checkout</button>
        </form>
      </div>
    </div>
</body>
</html>