<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?if (isset($_SESSION['unregcustomer_viewgas'])) {
        $gastype=$_SESSION['unregcustomer_viewgas'];
        print_r($gastype);
        die();
    } ?>
    <h1>View <?php echo $gastype ?> availability</h1>
</body>
</html>