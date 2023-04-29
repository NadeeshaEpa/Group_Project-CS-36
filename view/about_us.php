<?php
session_start();
if(isset($_SESSION['company_reviews'])){
    $reviews=$_SESSION['company_reviews'];
}else{
    $reviews=[];    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us section </title>
    <link rel="stylesheet" href="../public/css/admin_delivery/contact_us.css">
    <link rel="stylesheet" href="../public/css/about_us.css">
</head>
<body>
    <?php include 'home_header.php'; ?>
    <div class="lr">
        <div class="main">
            <img src="../public/images/about.jpg"  alt="" srcset="">
        </div>    
        <div class="about-text">
            <h1>About Us</h1>
            <h5>Welcome you all to FAGO...<br>
            <span> Online Gas Ordering System.  </span></h5>
            <p>FAGO is an online gas ordering system which connects gas agents of a particular area and customers. 
                It provides a platform for gas agents to manage their business online.
                Customer can Reserve their gas cylinders as well as other gas related appliences throguth this system and get it delivered to their doorsteps.
                So,try it and we're sure you'll love it.
            </p>
            <a href="contact_us.php"><button type="button">let's talk</button></a>
        </div> 
    </div>       
    <div class="right">
        <!-- feedbacks of our users -->
        <div class="feedback">
            <h1>Feedbacks From Our Users</h1>
            <!-- print reviews as 8 reviews per row -->
            <?php
            $count=0;
            foreach($reviews as $review){
                if($count==0){
                    echo "<div class='row'>";
                }
                echo "<div class='column'>";
                echo "<div class='card'>";
                echo "<img src='../public/images/customer/profile_img/".$review['imgname']."' alt='Avatar'>";
                echo "<div class='container'>";
                echo "<h4><b>".$review['First_Name']." ".$review['Last_Name']."</b></h4>";
                echo "<p>(".$review['Type'].")</p>";
                echo "<p>".$review['description']."</p>";
                echo "<p>".$review['date']."</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
                if($count==5){
                    echo "</div>";
                    $count=0;
                }
            }
            ?>
            <?php 
            if(isset($_SESSION['about_page'])){
                $page=$_SESSION['about_page'];
            }else{
                $page=1;
            }
            if(isset($_SESSION['about_total_pages'])){
                $total_pages=$_SESSION['about_total_pages'];
            }else{
                $total_pages=1;
            }    
            ?>
            <div class="pagination">
                <?php if($page>1){?>
                    <!-- pass value as form -->
                    <div class="p-left">
                        <form action="../controller/Users/about_controller.php" method="GET">
                            <input type="hidden" name="about_page" value="<?php echo $page-1?>">
                            <input type="submit" value="Previous">
                        </form>
                    </div>
                <?php } ?>
                <?php if($page<$total_pages){?>
                    <!-- pass value as form -->
                    <div class="p-right">
                        <form action="../controller/Users/about_controller.php" method="GET">
                            <input type="hidden" name="about_page" value="<?php echo $page+1?>">
                            <input type="submit" value="Next">
                        </form>
                    </div>
                <?php } ?>
            </div>
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
</body>
</html>