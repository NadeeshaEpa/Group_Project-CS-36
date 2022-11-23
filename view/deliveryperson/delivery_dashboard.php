<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/dashboard.css">
    <title>Document</title>
</head>
<body>
<?php include '../../public/user_header.php'; ?>

<div class="split left">
    <div class="vertical-menu">
    <a href="#" class="active">Dashboard</a>
    <a href="#">Account</a>
    <a href="#">Delivery Requests</a>
    <a href="#">Reviews</a>
    </div>

</div>
<div class="split right">
    <h2>     Dashboard</h2>

    <div class=tiles>

    <div class="container" style="background-color: #C6D8AF; border-color: #C6D8AF;">
    <p>
      Deliered Orders : 20
    </p>
    </div>

    <div class="container" style="background-color: #A0D7D4; border-color: #A0D7D4;">
    <p>
      Cancelled Orders : 3
    </p>
    </div>

    <div class="container" style="background-color: #C6D8AF; border-color: #C6D8AF;">
    <p>
      Orders to be delivered : 20
    </p>
    </div>

    </div>
    
    <dic class="graphs">
    <div class = "pic1">
        <img src="../../public/images/graph.PNG"  alt="">
    </div>

    <div class = "pic2">
        <img src="../../public/images/graph1.PNG"  alt="">
    </div>

</div>
</div>
</body>
</html>