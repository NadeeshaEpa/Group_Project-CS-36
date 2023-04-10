<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/cart.css">
    <title>Document</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2eSy5egkITKWg1EMsa1i1WcpPi29dgK0"></script>
    <script>
      function initMap() {
        //get the value of the $_SESSION['latitude'] and $_SESSION['longitude'] and set it to the variable  lat and lng
        var latitude= <?php echo $_SESSION['latitude']; ?>;
        var longitude= <?php echo $_SESSION['longitude']; ?>;
        var colombo = {lat: latitude, lng: longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: colombo
        });
        var marker = new google.maps.Marker({
          position: colombo,
          map: map,
          draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          document.getElementById("latitude").value = event.latLng.lat();
          document.getElementById("longitude").value = event.latLng.lng();
        });
      }
    </script>

</head>
<body onload="initMap()">
    <?php include_once 'customer_header.php'; ?>
    <?php
      if(isset($_SESSION['checkout'])){
          if($_SESSION['checkout']=="failed"){
            header("location:error.php");
          }else{
              $checkout=$_SESSION['checkout'];
              $count=count($checkout);
              if($count==0){
                  header("location:../../controller/customer/addtocart_controller.php?viewcart='1'");
              }
          }
      }
      if(isset($_SESSION['delivery_fee'])){
        $delivery_fee=$_SESSION['delivery_fee'];
      }
      if(isset($_SESSION['quantity_check'])){
        if($_SESSION['quantity_check']=="failed"){
          $error=$_SESSION['error_item'];
          $errorType = $error[0]['type'];
          $errorWeight = $error[0]['weight'];
          $errorQuantity = $error[0]['quantity'];

          $msg = "Quantity is not enough for the item - $errorType $errorWeight <br>" .
                " The available quantity is $errorQuantity.";
          ?>
          <div class="qmsg">
            <p><?php echo $msg ?></p>
          </div>
          <?php
          unset($_SESSION['quantity_check']);
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
                  <td class="itemname"><?php echo $i.". ".$item['weight']." ".$item['cylinder_type']." model"?></td>
                <?php 
                }else{?>
                  <td class="itemname"><?php 
                    echo $i.". ".$item['type']." ".$item['weight']."kg Gas Cylinder";
                    if($item['cylinder_type']=="old"){
                      echo " (Refill Cylinder)";
                    }else{
                      echo " (New Cylinder)";
                    }
                  ?></td>
                <?php } ?>       
              </div>
              <div class="price">
                <td><?php echo "Rs.".$item['price']?></td>
              </div>  
              <div class="btn">
                <form action="../../controller/customer/addtocart_controller.php" method="Post">
                    <input type="hidden" name="id" id="cart_id" value="<?php echo $item['cart_id']?>">
                    <input type="hidden" name="agent" id="agent" value="<?php echo $item['gasagent_id']?>">
                    <td><button name="dcartitem" class="trash">Remove</button></td>
                </form>
                    <td>
                        <div class="quantity-container">
                            <input type="hidden" name="id" id="updatecart_id" value="<?php echo $item['cart_id']?>">
                            <button class="quantity-button" data-action="subtract">-</button>
                            <span class="quantity-display"><?php echo $item['quantity']?></span>
                            <button class="quantity-button" data-action="add">+</button>
                        </div>
                    </td>
              </div>
            </tr>  
          <?php
          $i++;
          } ?>      
        </table>      
    </div>
    <hr>
<<<<<<< HEAD
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

          <button  class="checkout-btn">Checkout</button>
        </form>
      </div>
    </div>
    

=======
    <h2>Delivery Details</h2><br>
    <form action="../../controller/customer/addtocart_controller.php" method="POST" id="delivery-form">
      <input type="hidden" name="agent" id="agent" value="<?php echo $checkout[0]['gasagent_id']?>">
      <div class="delivery">
          <div class="delivery-left"> 
            <?php $flag1=0; $flag2=0; $flag3=0;?>
            <?php if(isset($_SESSION['shop_closed'])){
              if($_SESSION['shop_closed']==true){
                //create a hidden checkbox
                $flag3=1;
                echo "<input type='hidden' name='delivery' id='delivery' value='pickup'>";
                echo "<p style='color:red'>**Sorry, the shop is closed now. If you want you can reserve the gas cylinder by choosing the pick up option.**</p>";
              }else{
              ?>
                <?php $flag1=1; ?>
              <?php
              }
            }
            if(isset($_SESSION['cylinder_Count'])){
              if($_SESSION['cylinder_Count']>20 && $flag3==0){
                //create a hidden checkbox
                echo "<input type='hidden' name='delivery' id='delivery' value='pickup'>";
                echo "<p style='color:red'>**Sorry, we can't deliver that much quantity. If you want you can reserve the gas cylinder by choosing the pick up option.**</p>";
              }else{
              ?>
                <?php $flag2=1; ?>
              <?php
              }
            }
            ?>          
            <?php
              if(isset($_SESSION['distance_limit'])){
                if($_SESSION['distance_limit']=="high"){
                  echo "<p style='color:red'>**Sorry, we can't deliver the gas cylinder to the location you previously choosed. Please choose another delivery location or use pick up option.**</p>";
                  $_SESSION['distance_limit']="low";
                  unset($_SESSION['distance_limit']);
                }
              }
            ?>
            <?php
            if($flag1==1 && $flag2==1){
              ?>
              <input type="checkbox" name="delivery" id="delivery" value="delivery">
              <label for="delivery" id="delivery-label">Get delivered</label><br><br>
            <?php
            }
            ?>
            <label>Drag the marker to your delivery location:</label><br>
            <p>This map shows your current location that you have given when you registered. 
              If you want to change your delivery locaion please drag the marker to the your new location.<br>
              <b>If you don't want to change your delivery location you can leave it as it is.</b>
            </p>
            <div id="map" style="height: 400px; width: 100%; border-radius:20px;"></div><br>
            <div>
                <input type="hidden" id="latitude" name="latitude"><br>
                <input type="hidden" id="longitude" name="longitude"><br>
            </div>
            </div>
            <div class="delivery-right">
                <input type="checkbox" name="nodelivery" id="nodelivery" value="nodelivery">
                <label for="nodelivery">Pick up</label><br>
                <p>Please notice that if you request for a pickup you have to pickup the cylinder within 48hrs from the shop.<br>
                <b>If you are not ordering a new cylinder then it's compulsory to bring your old cylinder.<b></p>
            </div>
      </div>
    <hr>
    <button type="submit" name="dmbutton" class="dmbutton">Checkout</button>
    </form>
    <div id="myModal" class="popup">
        <p id="waitingMessage">
            Please select a delivery option.<br>  
            <img src="../../public/images/customer/delivery.jfif" alt="loading" id="loading">
        </p>
        
    </div> 
    <script src="../../public/js/customer/cart.js"></script>
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
</body>
</html>