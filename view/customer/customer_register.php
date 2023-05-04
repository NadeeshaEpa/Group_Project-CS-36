<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/fago_register.css">

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

    <title>Customer Registration</title>
</head>
<?php include_once '../unreguser_header.php'; ?>
<body>
    <div class="registration-form">  
    <form action="../../controller/customer/register_controller.php" method="POST" id="customer_form">
        <h2>Customer Registration Form</h2>
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="box1"  required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="box1" required>
        <div>
            <label id="username-label" for="username">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Username" class="box" required>
        </div>
        <label>Drag the marker to your location:</label><br>
        <div id="map" style="height: 400px; width: 90%; border-radius:20px;"></div><br>
            <label id="address-label">Address:</label><br>
                <div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <input type="text" id="address" name="address" placeholder="Address" class="box"><br>
                    <!-- break the address value into 3 parts -->
                </div>    
        <div>    
            <label id="password-label" for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" class="box" required>
        </div>
        <div>
            <label id="cpassword-label" for="cpassword">Confirm Password:</label><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="box" required>
        </div>
        <div>
            <label id="email-label" for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" value=<?php echo $_SESSION['v_email'] ?> class="box" readonly>
        </div>
        <div>
            <label id="billnum-label" for="billnum">Electricity Bill Number:</label><br>
            <input id="billnum" type="text" name="billnum" id="billnum" placeholder="Electricity Bill Number" class="box" required><br><br>
        </div>
        <div>
            <label id="contactnum-label" for="contactnumber">Contact Number:</label><br>
            <div class="otpr">
                <input type="text" name="cnumberstart" value="+94" class="box4" readonly>
                <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" class="box5" pattern="[0-9]{9}" title="should include 9 numbers" required>
            </div>    
        </div>
        <div class="btn">
            <div class="sbtn">
                <button id="submit-btn" type="submit" name="register">Register</button>
            </div> 
        </form>  
        <div class="cbtn">    
                <form action="../../controller/customer/register_controller.php" method="POST">
                    <button id="cancel" type="submit" name="cancelregister">Cancel</button>
                </form>
            </div>
        </div> 
    </div>
    <!-- <script src="../../public/js/Customer_Validation.js"></script> -->
</body>
</html>