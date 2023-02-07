<?php session_start(); 
if(isset($_SESSION['gastype'])){
    $gastype=$_SESSION['gastype'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/unreg_checkgas.css">
    <title>Document</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2eSy5egkITKWg1EMsa1i1WcpPi29dgK0"></script>
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
        google.maps.event.addListener(marker, 'dragend', function(event) {
          document.getElementById("latitude").value = event.latLng.lat();
          document.getElementById("longitude").value = event.latLng.lng();
        });
      }
    </script>
</head>
<body onload="initMap()">
    <?php include '../header.php'?>
    <div class="container">
        <div class="up">
            <form action="../../controller/customer/gas_controller.php" method="POST">
                <label>Drag the marker to your location:</label><br>
                <div id="map" style="height: 350px; width: 100%; border-radius:20px;">
                </div><br>
                <div>
                    <input type="hidden" id="latitude" name="latitude"><br>
                    <input type="hidden" id="longitude" name="longitude"><br>
                </div> 
                <label for="gas-type-selector">Gas Type:</label><br>
                <select id="gas-type-selector" name="gas_type">
                    <!-- create a disable option  and show it as the first value-->
                    <option selected disabled>Choose Gas Type</option>
                    <?php 
                    $i=0;
                    foreach($gastype as $gas){ ?>
                        <option value="<?php echo $gas; ?>"><?php echo $gas; ?></option>
                    <?php } ?>
                </select><br><br>
                <button name="gas_button">Shop Now</button>
            </form>   
        </div>
        <div class="down">
            <table>
                <tr>
                    <th>Shop Name</th>
                    <th>Distance</th>
                    <th>2.3kg</th>
                    <th>5kg</th>
                    <th>12.5kg</th>
                    <th>37.5</th>
                </tr>
                <tr>
                    
                </tr>
            </table>    
        </div>
    </div>
</body>
</html>