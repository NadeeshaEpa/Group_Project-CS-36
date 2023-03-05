<?php session_start(); 
require_once '../../payment_config.php';
?>
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
        if(isset($_SESSION['dnowcheckout'])){
            if($_SESSION['dnowcheckout']=="failed"){
                header("location:error.php");
            }else{
                $dcheckout=$_SESSION['dnowcheckout'];
            }
        }
    ?>
    <?php include_once 'customer_header.php'; ?>
    <h1><?php echo $dcheckout[0]['shop_name']?></h1>
    <hr>
    <h2>Total Payment</h2>
    <div class="last">
      <div class="total-left">
          <table class="total">
              <tr>
                <td><b>Sub total:</b></td>
                <td>Rs.<?php echo $dcheckout[0]['price']?></td>
              </tr>
              <tr>
                <td><b>Delivery fee:</b></td>
                <td ><?php 
                  if(isset($_SESSION['fago_distance_limit'])){
                    if($_SESSION['fago_distance_limit']=="high"){
                      echo "You will recieve your order via a courier service.";
                      // $_SESSION['fago_distance_limit']="low";
                    }else{
                      echo "Rs.".$dcheckout[0]['delivery_fee'];
                    }
                  }
                ?></td>
              </tr>
              <tr>
                <td><b>Total:</b></td>
                <?php 
                $total_amount=$dcheckout[0]['price']+$dcheckout[0]['delivery_fee']?>
                <td id="total" value="total">Rs.<?php echo $total_amount?></td>
              </tr>
          </table>
      </div>    
    </div>
    <form action="../../controller/customer/payment_controller.php" method="post">
        <input type="hidden" name="amount" value="<?php echo ($total_amount)?>">
        <input type="hidden" name="agentid" value="<?php echo $_SESSION['stock_manager_id'] ?>">
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $publishableKey?>"
          data-amount="<?php echo ($total+$delivery_fee)*100?>"
          data-name="Fago"
          data-description="Payment for your order"
          data-image="../../public/images/logo.png"
          data-currency="lkr"
          data-email="fagoorders@gmail.com"
        >
        </script>
    </form>
</body>
</html>