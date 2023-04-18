<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fuel_staff/Fuelmanagerlogin.css">
    <title>login</title>
</head>
<body>

   
    <div class="container">
        <div class="msg">
            <h2>
                <?php
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login']=="failed"){
                                echo "Invalid username or password";
                                echo '<br>';
                                unset($_SESSION['login']);
                            }
                        }
                        
                    ?>
                
            </h2>
        </div>
        <div class="center">
            <div class="content">
                <form action="../../controller/staff/StaffLoginController.php" method="POST">
                    <h2>Login</h2>
                    <input type="text" name="username" id="username" placeholder="Username"  class="box" required><br>
                    <input type="password" name="password" id="password" placeholder="Password"  class="box" required><br><br>           
                    <button type="submit" name="login" id="submit">Login</button><br>
                    <div class="content_staff"><a href="http://localhost:8001/index.php">Home</a><br></div>
                </form>
               
            </div>
            
            <div class="input_img"></div>
        </div>
    </div>
</body>
</html>