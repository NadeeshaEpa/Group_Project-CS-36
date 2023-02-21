<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/cart.css">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['dcheckout'])){
            if($_SESSION['dcheckout']=="failed"){
                header("location:error.php");
            }else{
                $dcheckout=$_SESSION['dcheckout'];
            }
        }
        if(isset($_SESSION['delivery_fee'])){
            $delivery_fee=$_SESSION['delivery_fee'];
        }
    ?>
    <?php include_once 'customer_header.php'; ?>
    <h1><?php echo $dcheckout[0]['shop_name']?></h1>
    <hr>
    <h2>Total Payment</h2>
    <div class="last">
    <?php 
        $total=0;
        foreach($dcheckout as $item){
          $total+=$item['price'];
        }
      ?>
      <div class="total-left">
          <table class="total">
              <tr>
                <td><b>Sub total:</b></td>
                <td>Rs.<?php echo $total?></td>
              </tr>
              <tr>
                <td><b>Delivery fee:</b></td>
                <td id="deliveryfee" value="<?php echo $delivery_fee ?>">Rs.<?php echo $delivery_fee?></td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td><b>Total:</b></td>
                <td id="total" value="<?php echo $total+$delivery_fee ?>">Rs.<?php echo $total+$delivery_fee?></td>
              </tr>
          </table>
      </div>    
      <div class="check">
        <!-- <form action="../../controller/customer/payment_controller.php" method="Post"> -->
          <input type="hidden" name="agentid" value="<?php echo $dcheckout[0]['gasagent_id'] ?>">
          <button  name="pay" class="checkout-btn" onclick="pay(<?php echo $dcheckout[0]['gasagent_id'] ?>);">Pay</button>
        <!-- </form> -->
      </div>
    </div>
    <!-- link payment.js file -->
    <script src="../../public/js/customer/payment.js"></script>
</body>
</html>