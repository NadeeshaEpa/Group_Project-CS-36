<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/payment.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <div class="card">
        <form>
            <div class="images">
                <img src="../../public/images/customer/visa.png" alt="credit card" class="credit-card">
                <img src="../../public/images/customer/mastercard.png" alt="credit card" class="credit-card">
                <img src="../../public/images/customer/paypal.webp" alt="credit card" class="credit-card">
            </div>
            <div class="card-details">
                <form>
                    <label for="card-number">Card Number:</label>
                    <input type="text" name="card-number" id="card-number" placeholder="Enter your card number"><br>
                    <label for="card-name">Card Holder Name:</label>
                    <input type="text" name="card-name" id="card-name" placeholder="Enter your name"><br>
                    <label for="card-expiry">Expiry Date:</label>
                    <input type="text" name="card-expiry" id="card-expiry" placeholder="Enter expiry date"><br>
                    <label for="card-cvv">CCV/CVC:</label>
                    <input type="text" name="card-cvv" id="card-cvv" placeholder="Enter CVV"><br><br>
                </form>
            </div>
        </form>
        <div class="btn">                    
                <button type="submit" name="pay" class="pay" id="confirmOrderButton">Confirm Payment</button>
                <button type="submit  name="cancel" class="cancel"><a href="view_cart.php">Cancel</a></button>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div >
                    <p id="waitingMessage">
                        Waiting for a delivery person...
                        <img src="../../public/images/customer/delivery_person.jfif" alt="delivery person" class="delivery-person">
                        <button class="close" onclick="cancel_order()">Cancel</button>
                    </p>
                    <!-- <img src="../../public/images/customer/gas.jpg" alt="delivery person" class="delivery-person"> -->
                </div>            
            </div>
        </div> 
    </div>
    <script>
        document.getElementById("confirmOrderButton").addEventListener("click", function(){
        document.getElementById("myModal").style.display = "block";
            setTimeout(function(){
                document.getElementById("waitingMessage").innerHTML = "Delivery person assigned";
                setTimeout(function(){
                window.location.href = "order_successfull.php";
                }, 1000);
            }, 5000);
        });
        function cancel_order(){
            document.getElementById("myModal").style.display = "none";
            window.location.href = "view_cart.php";
        }
    </script>
</body>
</html>