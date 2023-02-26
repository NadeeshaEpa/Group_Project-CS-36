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
      if(isset($_SESSION['viewitems'])){
          if($_SESSION['viewitems']=="failed"){
            header("location:error.php");
          }else{
              $checkout=$_SESSION['viewitems'];
            //   print_r($checkout);
            //   die();
              $count=count($checkout);
              if($count==0){
                  header("location:../../controller/customer/addtocart_controller.php?viewcart='1'");
              }
          }
      }
    ?>
    
    <h1><?php echo $checkout[0]['shop']?></h1>
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
                        <td class="itemname"><?php echo $i.". ".$item['name']." ".$item['product_type']." model"?></td>
                      <?php 
                      }else{?>
                        <td class="itemname"><?php echo $i.". ".$item['type']." ".$item['weight']."kg Gas Cylinder"?></td>
                      <?php } ?>       
                    </div>
                    <div class="price">
                        <td><?php echo "Rs.".$item['price']?></td>
                    </div>  
                </tr>
            <?php $i++;}
         ?> 
        </table>      
    </div>
    <hr>
    <h2>Delivery Details</h2><br>
    <form action="../../controller/customer/shop_controller.php" method="POST" id="delivery-form">
      <input type="hidden" name="agent" id="agent" value="<?php echo $checkout[0]['agent_id']?>">
      <input type="hidden" name="price" id="price" value="<?php echo $checkout[0]['price']?>">
      <div class="delivery">
          <div class="delivery-left"> 
              <input type="checkbox" name="delivery" id="delivery" value="delivery">
              <label for="delivery">Get delivered</label><br><br>
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
    <script src="../../public/js/customer/cart.js"></script>
</body>
</html>