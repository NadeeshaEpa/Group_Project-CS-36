<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Group_36/public/css/customer/home.css">
    <title>FAGO</title>
    <link rel="icon" type="image/png" href="http://localhost/Group_36/public/images/logo.png">  
    
</head>
<body>
    <?php include 'home_header.php'; ?>
    <div class="welcome">
        <div class="left">
            <p>WELCOME TO FAGO...</p>
        </div>
        <div class="right">
            <div class="right-l">
                <img src="http://localhost/Group_36/public/images/customer/clock.png" alt="" class="homeimg">
                Open Time:<br>
                Monday-Friday: 8:00am-5:00pm
            </div>
            <div class="right-r">
                <img src="http://localhost/Group_36/public/images/customer/location.jpg" alt="" class="homeimg">
                Location:<br>
                No:25,<br> 
                Galle road,Colombo<br>
            </div>
        </div>
    </div>    
    <div class="first">
        <div class="photo">
            <img src="http://localhost/Group_36/public/images/customer/gas.jpg" alt="" class="homeimg">
        </div>
        <div class="login">
            Hello,<br>
            Log into your account for the best experience with<br> FAGO<br>
            <a href="http://localhost/Group_36/view/registeras.php"><button class="btnr">Register</button></a>
            <a href="http://localhost/Group_36/view/login.php"><button class="btnl">Login</button></a>
            
        </div>
    </div>
    <div class="fago">
        <h1>What is FAGO?...</h1>
        <p>FAGO is an online platform which connects gas agents of a particular area with customers. So customers can just register to this platform
            and can order gas from their nearest gas agent. This platform also provides a way for gas agents to manage their customers and their orders. 
            Also there are many delivery persons who are registered to this platform. So customers can order gas from their nearest gas agent and deliver it 
            to their door step by just few clicks. FAGO Shop has a wide range of gas cylinders and accessories. So customers can order gas cylinders and accessories
            in same platform. So, this is a one stop solution for all your gas needs. Just try it and you will love it.
        </p>
        <a href="http://localhost/Group_36/controller/Users/about_controller.php?about='1'">more information</a>
    </div>
    <div class="second">
        <div class="regtext">
            <p>We are just a fingertip away from you!
            <b>Register</b> to the system and place your order..</p>
            <a href="http://localhost/Group_36/view/email.php"><button class="btnr">Register</button></a>
            <p>View our <b>Services</b> and <b>Products</b>...</p>
            <a href="http://localhost/Group_36/controller/Users/login_controller.php?unregview='1'"><button class="btnr">View</button></a>
        </div>
        <div id="bg-changer"></div>
        <!-- <div class="photoright">
            <img src="public/images/customer/homepage.jpg" alt="" class="homeimg">  
        </div>     -->
    </div>
    <div class="third">
        <div class="email">
            <img src="http://localhost/Group_36/public/images/customer/email.webp" alt="" class="homeimg"><br><br><br>
            <h2>Email</h2>
            <p>fagoorders@gmail.com</p>
        </div>
        <div class="location">
            <img src="http://localhost/Group_36/public/images/customer/location.jpg" alt="" class="homeimg"><br><br><br>
            <h2>Location</h2>
            <p>No:25,<br> 
                Galle road,Colombo<br>
            </p>
        </div>
        <div class="contact">
            <img src="http://localhost/Group_36/public/images/customer/contact.png" alt="" class="homeimg"><br><br><br>
            <h2>Contact</h2>
            <p>011-1234567</p>
        </div>
    </div>
    <div class="footer">
        <div class="footer-left">
            <img src="http://localhost/Group_36/public/images/logo.png" alt="" class="homeimg">
            <p>Visit our website and place your orders. This section provides you some information about FAGO and some links for imporatant pages.
            Customers can order gas cylinders and accessories
            in same platform. So, this is a one stop solution for all your gas needs. Just try it and you will love it.
            </p>
            <h2>Follow Us</h2>
            <div class="socialmedia">
            <a href="https://www.facebook.com/"><img src="public/images/customer/facebook.png" alt="" class="homeimg"></a>
            <a href="https://www.instagram.com/"><img src="public/images/customer/insta.png" alt="" class="homeimg"></a>
            <a href="https://www.twitter.com/"><img src="public/images/customer/twitter.png" alt="" class="homeimg"></a>
            <a href="https://www.youtube.com/"><img src="public/images/customer/linkd.jpg" alt="" class="homeimg"></a>
            </div>
        </div>
        <div class="footer-right">
            <h2>Menu</h2>
            <a href="http://localhost/Group_36/view/home.php">Home</a><br><br>
            <a href="http://localhost/Group_36/controller/Users/about_controller.php?about='1'">About Us</a><br><br>
            <a href="http://localhost/Group_36/view/ourservices.php">Our Services</a><br><br>
            <a href="http://localhost/Group_36/view/contact.php">Contact Us</a><br>
        </div>
        <div class="fagolink">
            <p>© 2022 FAGO. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>