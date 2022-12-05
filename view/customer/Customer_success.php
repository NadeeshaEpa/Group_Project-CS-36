<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
       body{
        background-color:#FFFDF0;
       } 
       .container{
        height:63%;
       }
       .para{
          width:60%;
          height:50%;
          background-color:white;
          margin-left:25%;
          margin-top:10%;
          border-radius:20px;
       }
       .para h2{
        padding:30px;
       }
       .para button{
         width: 100px;
         height: 30px;
         background-color:green;
         color:white;
         margin-left:45%;
         border-radius:20px;
       }
       .para a{
         text-decoration:none;
         color:white;
       }
       
    </style>
</head>
<body>
    <?php require_once '../../public/header.php'; ?> 
    <div class="container">
        <div class="para">    
            <h2>
                Registration request send successfully. You will receive an email within 48 hours
            </h2>
            <button><a href="customer_login.php">OK</a></button>
        </div>    
    </div>    
    <?php require_once 'customer_footer.php'; ?>
    <!-- <button><a href="customer_dashboard.php">Go to Dashboard</a></button> -->
</body>
</html>