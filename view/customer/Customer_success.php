<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/reg_request.css">
    <title>Document</title>

</head>
<body>
    <?php require_once '../unreguser_header.php'; ?> 
    <div class="container">
        <div class="para" id="bg-changer">    
            <h2>
               Regitration request sent successfully. Please wait for the approval.
               You will be notified via email within 48 hours.<br>
               Thank you for your patience.
            </h2>
            <a href="../../index.php"><button>OK</button></a>
        </div>    
    </div>    
</body>
</html>