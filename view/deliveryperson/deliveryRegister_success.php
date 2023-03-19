<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD

    <link rel="stylesheet" href="../../public/css/admin_delivery/deliveryperson_registersuccess.css">

=======
    <link rel="stylesheet" href="../../public/css/stock_delivery/deliveryperson_registersuccess.css">
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
    <title>Document</title>
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <!-- <h2>
    <?php
        if(isset($_SESSION['RegsuccessMsg'])){
            echo $_SESSION['RegsuccessMsg'];
            echo '<br>';
            unset($_SESSION['RegsuccessMsg']);
        }
    ?>
    </h2> -->
    <div id="container">
    <h2>
      Your request has been sent Successfully. Our staff will notify you with more details in an email soon.
      This may take up to 48 hours
    </h2>
    </div>
</body>
</html>