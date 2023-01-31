<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/ordersuccessfull.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <!-- display that order placed successfully -->
    <div class="order-success">
        <img src="../../public/images/customer/successfull.png" alt="order-success">
        <h1>Order Placed Successfully</h1>
        <h2>Thank you for shopping with us</h2>
        <h3>Customer Name: Nadeesha Nethmini</h3>
        <h3>Order ID: 1</h3>
        <h3>Order Date: 2023/02/09</h3>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Item Quantity</th>
            </tr>
            
            <tr>
                <td>Litro 12.5kg Gas Cylinder</td>
                <td>Rs. 4409</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Litro 5kg Gas Cylinder</td>
                <td>Rs. 1770</td>
                <td>1</td>
            </tr>
        </table>
        <h3>Total price: Rs.6179</h3>
        <h3>Order Delivery Address: 69/A/1,Weihena,Mattaka</h3>
        <h3>Shop name : PQR Stores</h3>
        <h3>Delivery Person : Sadun Tharaka</h3>
        <button type="submit" name="pay" class="pay"><a href="../../controller/Users/logout_controller.php">Back to Home</a></button>
        <button type="submit" name="pay" class="pay"><a href="customer_select.php">Continue Shopping</a></button>
    </div>
</body>
</html>

<?php
                // $item_name = $_SESSION['item_name'];
                // $item_price = $_SESSION['item_price'];
                // $item_quantity = $_SESSION['item_quantity'];
                // for($i = 0; $i < count($item_name); $i++){
                //     echo "<tr>";
                //     echo "<td>".$item_name[$i]."</td>";
                //     echo "<td>".$item_price[$i]."</td>";
                //     echo "<td>".$item_quantity[$i]."</td>";
                //     echo "</tr>";
                // }
                ?>