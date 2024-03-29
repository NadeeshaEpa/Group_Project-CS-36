<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/contact_us.css">
    
    <title>Document</title>
</head>
<body>
    <?php include 'home_header.php'; ?>
    <img src="../public/images/contact.jpeg" alt="contact-us" width="100%" height="75%">
    <h1>Our Location</h1>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_E5eoUp72AGiXd8EUgscWhrM-kd2scbY"></script>
    <script>
        function initMap() {
            var myLatLng = {lat: 6.9271, lng: 79.8612}; // Set the coordinates of the location you want to show
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14, // Set the zoom level
                center: myLatLng // Set the center of the map to the selected location
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Fago Shop',
                label: {
                    color: '#000000',
                    fontWeight: 'bold',
                    fontSize: '16px',
                    text: 'Fago Shop',
                }

            });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_E5eoUp72AGiXd8EUgscWhrM-kd2scbY&callback=initMap"></script>
    <h1>Contact us for any clarification</h1>
    <div class="box-info">
       
            <div class="box">
            <span class="icon"><ion-icon name="mail-outline"  style="width:60px; height:60px; margin-top:25px; margin-left:25px;"></ion-icon></span>
                <h2>Email</h2>
                <p class="title">fago@gmail.com</p>
                <p class="title" style="color:#D3D7D6;">bjskjsd</p>
                
            </div>
        
            <div class="box">
            <span class="icon"><ion-icon name="location-outline"  style="width:60px; height:60px; margin-top:25px; margin-left:25px;"></ion-icon></span>
                <h2>Location</h2>
                <p class="title">No:25,</p>
                <p class="title">Galle road, Colombo</p>
            </div>
        
            <div class="box">
            <span class="icon"><ion-icon name="call-outline"  style="width:60px; height:60px; margin-top:25px; margin-left:25px;"></ion-icon></span>
                <h2>Contact</h2>
                <p class="title">077-58646698</p>
                <p class="title">011-56325698</p>
            </div>
       
    </div>
    <div class="footer">
        <div class="footer-left">
            <img src="../public/images/logo.png" alt="">
            <p>Visit our website and place your orders. This section provides you some information about FAGO and some links for imporatant pages.
            Customers can order gas cylinders and accessories
            in same platform. So, this is a one stop solution for all your gas needs. Just try it and you will love it.
            </p>
            <h2>Follow Us</h2>
            <div class="socialmedia">
            <a href="https://www.facebook.com/"><img src="../public/images/customer/facebook.png" alt="" class="homeimg"></a>
            <a href="https://www.instagram.com/"><img src="../public/images/customer/insta.png" alt="" class="homeimg"></a>
            <a href="https://www.twitter.com/"><img src="../public/images/customer/twitter.png" alt="" class="homeimg"></a>
            <a href="https://www.youtube.com/"><img src="../public/images/customer/linkd.jpg" alt="" class="homeimg"></a>
            </div>
        </div>
        <div class="footer-right">
            <h2>Menu</h2>
            <a href="http://localhost/Group_36/view/home.php">Home</a><br><br>
            <a href="http://localhost/Group_36/controller/Users/about_controller.php?about='1'">About Us</a><br><br>
            <a href="http://localhost/Group_36/view/services.php">Our Services</a><br><br>
            <a href="http://localhost/Group_36/view/contact_us.php">Contact Us</a><br>
        </div>
        <div class="fagolink">
            <p>© 2022 FAGO. All Rights Reserved.</p>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>