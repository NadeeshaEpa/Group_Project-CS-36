<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasagent Registration</title>
    <link rel="stylesheet" href="../../public/css/gasagent/gasagentfago_register.css">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_E5eoUp72AGiXd8EUgscWhrM-kd2scbY&callback=initMap">
    </script>
    <script>
      function initMap() {
        var latitude= 6.9271;
        var longitude= 79.8612;
        var colombo = {lat: latitude, lng: longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: colombo
        });
        var marker = new google.maps.Marker({
          position: colombo,
          map: map,
          title: 'Drag me!',
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
<body>
<?php include_once '../unreguser_header.php'; ?>
    <div class="registration-form">  
        <form action="../../controller/gasagent/register_controller.php" method="POST">
            <h2>Gasagent Registration Form</h2>
            <div class="font">
            <label for=":" id="name" >Name:</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required><br>

            <label for=":" id="username-label">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
            <label>Drag the marker to your location:</label><br>
            <div id="map" style="height: 400px; width: 98%; border-radius:20px;"></div><br>
                <label id="address-label">Address:</label><br>
                <div class="down3">
                    <div>
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="text" id="address" name="address" placeholder="Address"><br>
                        <!-- break the address value into 3 parts -->
                    </div> 
                </div>  
            <div>  
            
            <label id="email-label" for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" value=<?php echo $_SESSION['v_email'] ?> class="box" readonly><br>         
            
            <label for=":" id="password-label">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>


            <label for=":" id="cpassword-label">Confirm Password: </label><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 


            <label for=":" id="shopnumberlabel">Shop Number:</label><br>
            <input type="text" name="shopnumber" id="shopnumber" placeholder="Shop Number" required><br>
            
            <!-- new -->
            </div><br> 
            <div class="dropdown">
                <label for=""> Gas Type</label>
                <select name="gastype" id="gastype">
                    <option value="">---Select Type---</option>
                    <option value="1">Litro</option>
                    <option value="2">Laugh</option>
                    <option value="3">New gas</option>
                </select>
            </div><br><br>
            <label for=":">Business Registration Number:</label><br>
            <input type="text" name="business_reg_num" id="business_reg_num" placeholder="Business Registraion Number" required><br>

            <label for=":" id="nic_lable">NIC:</label><br>
            <input type="text" name="NIC" id="NIC" placeholder=" NIC" required><br>

            
            <label for=":" id="contactnum-label">Contact Number:</label><br>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>
            
            <label for=":">Account Number:</label><br>
            <input type="text" name="accountnum" id="accountnum" placeholder="Account Number" required><br>    
        
        
            <label for="Shop Name:">Shop Name:</label><br>
            <input type="text" name="shopName" id="shopName" placeholder="Shop Name" required><br>   

            <label>Shop Opening Time:</label><br>
            <input type="time" name="openingtime" id="openingtime" required><br>

            <label>Shop Closing Time:</label><br>
            <input type="time" name="closingtime" id="closingtime" required><br>

            <button type="submit" id="submit-btn" name="register">Register</button>
        </form>
    </div>
<script src="../../public/js/newvalidation.js"></script>
</body>
</html>