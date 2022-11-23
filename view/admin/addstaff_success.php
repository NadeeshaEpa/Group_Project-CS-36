<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/success.css">
    <title>Document</title>

</head>
<body>
    <?php include '../../public/user_header.php'; ?>
    <h2>
    <?php
        if(isset($_SESSION['RegsuccessMsg'])){
            echo $_SESSION['RegsuccessMsg'];
            echo '<br>';
            unset($_SESSION['RegsuccessMsg']);
        }
    ?>
    </h2>
    <div id="container">
    <h2>
      Staff member has been registered Successfully!
    </h2>
    </div>
</body>
</html>