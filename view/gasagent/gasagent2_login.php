<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/gasagent/style2.css">
</head>

<body>
    <div class="login-form">
        <h1>Login Form</h1>
        <form action="../../controller/gasagent/login2_controller.php" method="POST" class="form">
        <?php
            if(isset($_SESSION['login'])){
                if($_SESSION['login']=="failed"){
                    echo "Invalid username or password";
                    echo '<br>';
                    unset($_SESSION['login']);
                }
            }
        ?>
       

            <p>user name</p>
            <input type="text" name="user" placeholder="user name">
            <p>password</p>
            <input type="password" name="password" placeholder="password">
            <br>
            <button type="submit">login</button>

            <br><br>
            <a href="gasagent_register.php">Don't have an account? Register</a>
        </div>


    
</body>
</html>