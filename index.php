<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    button{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 45%;
        margin-top: 10%;
    }
    </style>
</head>
<body>
    <?php include 'public/header.php'; ?>
    <a href="view/login.php"><button>Login</button></a>


    <button id="bg-changer">Click me</button>

<style>
  #bg-changer {
    background: url(first-image.jpg) center/cover no-repeat;
    animation: change-bg 5s infinite;
  }
  
  @keyframes change-bg {
    0% {
      background-image: url(public/images/customer/gas.jpg);
    }
    33.33% {
      background-image: url(public/images/customer/waiting.jpg);
    }
    66.66% {
      background-image: url(public/images/customer/Tawa.jpg);
    }
    100% {
      background-image: url(public/images/customer/gas.jpg);
    }
  }
</style>

</body>
</html>