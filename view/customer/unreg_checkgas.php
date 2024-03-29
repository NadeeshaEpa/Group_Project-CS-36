<?php session_start(); 
if(isset($_SESSION['gastype'])){
    $gastype=$_SESSION['gastype'];
}
if(isset($_SESSION['unweight'])){
    $weight=$_SESSION['unweight'];
    if($weight!=NULL){
        $count1=count($weight);
    }else{
        $weight=[];
        $count1=0;
    }
}else{
    $weight=[];
    $count1=0;
}
if(isset($_SESSION['unviewgas'])){
    $gasshop=$_SESSION['unviewgas'];
    $count=count($gasshop);

}else{
    $gasshop=[];
    $count=0;
}
if(isset($_SESSION['unshopnames'])){
    $shops=$_SESSION['unshopnames'];
    if($shops!=NULL){
        $count2=count($shops);
    }else{
        $shops=[];
        $count2=0;
    }
}else{
    $shops=[];
    $count2=0;
}
if(isset($_SESSION['unlocations'])){
    $locations=$_SESSION['unlocations'];
}else{
    $locations=[];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_gas.css">
    <link rel="stylesheet" href="../../public/css/customer/unreg_checkgas.css">
    <title>Document</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_E5eoUp72AGiXd8EUgscWhrM-kd2scbY"></script>
    <script>
      function initMap() {
        var colombo = {lat: 6.9271, lng: 79.8612};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: colombo
        });
        var marker = new google.maps.Marker({
          position: colombo,
          map: map,
          draggable: true
        });
        geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(marker, 'dragend', function(event) {
          document.getElementById("latitude").value = event.latLng.lat();
          document.getElementById("longitude").value = event.latLng.lng();

          geocoder.geocode({'location': event.latLng}, function(results, status) {
            if (status === 'OK') {
            if (results[0]) {
                document.getElementById('address').value = results[0].formatted_address;
            } else {
                window.alert('No results found');
            }
            } else {
            window.alert('Geocoder failed due to: ' + status);
            }
          });
        });
      }
    </script>
</head>
<body onload="initMap()">
    <?php include_once '../unreguser_header.php'; ?>
    <div class="container">
        <div class="up">
            <form action="../../controller/customer/gas_controller.php" method="POST">
                <label>Drag the marker to your location:</label><br>
                <div id="map" style="height: 300px; width: 90%; border-radius:20px;">
                </div><br>
                <div class="down3">
                    <div>
                        <input type="text" id="address" name="address" placeholder="Address"><br>
                        <input type="hidden" id="latitude" name="latitude" required><br>
                        <input type="hidden" id="longitude" name="longitude" required><br>
                        <!-- break the address value into 3 parts -->
                    </div> 
                </div>
                <label for="gas-type-selector">Gas Type:</label><br>
                <select id="gas-type-selector" name="ungas_type">
                    <!-- create a disable option  and show it as the first value-->
                    <option selected disabled>Choose Gas Type</option>
                    <?php 
                    $i=0;
                    foreach($gastype as $gas){ ?>
                        <option value="<?php echo $gas; ?>"><?php echo $gas; ?></option>
                    <?php } ?>
                </select><br><br>
                <button name="ungas_button">Shop Now</button>
            </form>   
        </div>
        <div class="down">
            <?php if(isset($_SESSION['ungastype'])){?>
                <h1>Available Shops for <?php echo $_SESSION['ungastype'] ?> Gas</h1>
            <?php } else{ ?>
                <h1>Available Shops</h1>
            <?php } ?>
            <?php if($count1==0){?>
                <div class="noshops">
                    <h2>No shops available.Try again by changing the gas type and the location.</h2>
                </div>    
            <?php }else{?>
                <table>
                    <tr>
                        <th>Vendor</th>
                        <th>Distance</th>
                        <?php 
                            foreach($weight as $weight1){?>
                                <th><?php echo $weight1['Weight']?>kg</th>
                            <?php } ?>
                        <th>order</th>    
                    </tr>
                    <?php 
                    $i=0;
                    $j=0;
                    foreach($shops as $shop){
                    $j++;
                    if($j>5){
                        break;
                    }
                    ?>
                    <tr>
                        <?php// if($shop['distance']<10){?>
                            <td><?php echo $shop['Shop_name']?></td>
                            <td><?php echo $shop['distance']?>km</td>
                            <?php 
                            foreach($weight as $weight1){
                                $flag=0;
                                foreach($gasshop as $gas1){?>
                                <?php 
                                if($gas1['Shop_name']==$shop['Shop_name'] && $gas1['Weight']==$weight1['Weight']){?>
                                    <td><?php echo $gas1['Quantity'];?></td>
                                    <?php
                                    $gasagent=$gas1['GasAgent_Id'];
                                    $_SESSION['gasagent']=$gasagent;
                                    $flag=1;
                                    break;
                                }else{
                                    continue;
                                }
                                ?>
                                <?php 
                                }
                                if($flag==0){?>
                                <td><?php
                                    $i++;
                                    echo "Not available"; 
                                ?></td>
                                <?php 
                                }
                            } ?> 

                            <td><button name="order" id="popup" onclick="popup()">Order</button></td>

                        <?php } ?>
                    </tr>
                </table>
                <?php if(isset($_SESSION['unshopnames'])){?>
                    <div class="seemore">
                        <button onclick="popup()">See more</button> 
                    </div> 
                <?php } ?>
            <?php } ?>   
        </div>
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