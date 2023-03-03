<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBijs3YopDeNYhNj_8QSqo0Gh3-JoMU54&callback=initMap">
    </script>
    <script>
      function initMap() {
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
	<title>FaGo</title>
</head>
<body>
	<!-- SIDEBAR -->
    <div class="dcontainer">
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-select-multiple'></i>
                <span class="text">FaGo</span>
            </a>
            <ul class="side-menu top">	
                <li class="active">	
                    <a href="../../controller/customer/account_controller.php?viewacc='1'">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class>
                    <a href="../../controller/customer/order_controller.php?orderid='1'">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">My orders</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/review_controller.php?reviewid='1'">
                        <i class='bx bxs-doughnut-chart' ></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/complain_controller.php?complainid='1'">
                        <i class='bx bxs-badge-check' ></i>
                        <span class="text">Complains</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="../../controller/Users/logout_controller.php" class="logout">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>
	<!-- SIDEBAR -->
        <?php include_once 'customer_header.php'; ?>
        <div class="right">
             <div class="welcome">
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login']=="success"){
                            echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                            echo '<br>';                              
                            //unset($_SESSION['login']);
                        }
                    }
                ?>
            </div>
            <div class="data">
                    <?php
                        echo  "<h2>"."My profile"."</h2>";
                        if(isset($_SESSION['viewacc'])){
                            if($_SESSION['viewacc']=="failed"){
                                echo "Failed to view account";
                                echo '<br>';
                                unset($_SESSION['viewacc']);
                            }
                        }
                    ?>          
                    <?php 
                    if(isset($_SESSION['viewacc_result'])){
                        $result=$_SESSION['viewacc_result']; 
                    }
                    ?>
                <div class="up">
                    <?php if($_SESSION['img-status'] == 0){?>
                        <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
                    <?php }else{?>
                        <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
                    <?php } ?>
                    <div class="b3">
                        <form action="../../controller/customer/account_controller.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="image" id="image" class="image">
                            <button class="b4" name="removeimg">Remove</button>
                            <button name="uploadimg" class="b2">Upload</button>
                        </form>   
                    </div>     
                </div>      
                <form action="../../controller/customer/account_controller.php" method="POST" id="customer_update_form">   
                        <div class="details">  
                            <div class="down">
                                <div class="down1">
                                    <label>First name:</label><br>  
                                    <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Last name:</label><br>
                                    <input type="text" name="lname" value=<?php echo $result[0]['Last_Name']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1">   
                                    <label id="email-label">Email:</label><br>
                                    <input type="text" id="email" name="email" value=<?php echo $result[0]['Email']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label id="contactnum-label">Contact No:</label><br>
                                    <input type="text" name="contactno" id="contactnumber" value=<?php echo $result[0]['Contact_No']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1"> 
                                    <label id="username-label">Username:</label><br>
                                    <input type="text" name="username" id="username" value=<?php echo $result[0]['Username']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Update Password:</label><br>
                                    <form action='customer_changepassword.php' method="POST">
                                       <button type="submit" name="changepassword" class="cp">Change password</button>
                                    </form>   
                                </div>    
                            </div> 
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
                            <!-- <div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>"> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?>> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                                </div>
                            </div> -->
                            <button type="submit" class="b6" name="updateaccount" id="update-btn">Update</button>   
                            
                    </div>     
            
                    <button onclick="document.getElementById('id01').style.display='block'" class="b5">Delete Account</button>
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                            <form class="modal-content" action="../../controller/customer/account_controller.php" method="POST">
                                    <div class="container">
                                        <h1>Delete Account</h1>
                                        <p>Are you sure you want to delete your account?</p>
                                        
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="deletebtn" name="deleteaccount">Delete</button>
                                        </div>
                                    </div>
                            </form>
                    </div>
                </form>   
            </div>
        </div>
    </div>
	<!-- <script src="../../public/js/script.js"></script> -->
    <script src="../../public/js/customer/update_validation.js"></script>
</body>
</html>