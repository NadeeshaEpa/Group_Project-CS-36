<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/createnew_password.css">
    <title>Forgot password</title>
</head>
<body>
    <?php
       if(empty($_GET['selector']) || empty($_GET['validator'])){
           echo "Could not validate your request1";
       }else{
             $selector=$_GET['selector'];
             $validator=$_GET['validator'];
            
             if(ctype_xdigit($selector) && ctype_xdigit($validator)){?>
             
    <?php include '../../public/header.php'; ?>
    <div class="container">
            <form action="../../controller/customer/forgotpassword_controller.php" method="POST" class="form">
                <h1>Create New Password</h1> 
                <div id="errmsg">
                    <?php
                        if(isset($_SESSION['password-status'])){
                            echo $_SESSION['password-status'];
                            unset($_SESSION['password-status']);
                        }
                    ?>
                </div>
                <div id="successmsg">  
                    <?php
                        if(isset($_SESSION['password-status-success'])){
                            echo $_SESSION['password-status-success']."<br>"."Please wait you will redirect to the login page";
                            unset($_SESSION['password-status-success']);
                            header("refresh:3;url=../../view/customer/customer_login.php");
                        }
                    ?>
                </div>    
                <input type="hidden" name="type" value="reset">    
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">                 
                <label for="password">Enter your new Password:</label><br>
                <input type="password" name="password" id="password" placeholder="Enter new Password" class="box" required><br><br>
                <label for="cpassword">Confirm new Password:</label><br>
                <input type="password" name="cpassword" id="cpassword" placeholder="Cofirm Password" class="box" required><br><br>
                <button type="submit" name="resetsubmit" id="submit">Submit</button>
            </form>
    </div>
        <?php 
            }else{
                echo "Could not validate your request";
            }
        }
        ?>
</body>
</html>