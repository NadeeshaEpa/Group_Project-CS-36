<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <?php 
    if(isset($_SESSION['succses']))
    {
        echo $_SESSION['succses'];
        unset($_SESSION['succses']);
    }
    
    ?>
    <form action="../../controller/gasagent/edittype_controller.php" method="POST">
        <label> Cylindr id</label>
        <input name="c">

        <br>
        <label> Type</label>
        <input name="t">

        <br>
        <label> Weight</label>
        <input name="w">

        <br>
        <label> Price</label>
        <input name="p">

        <br>
        <button type="submit" name="bt">Enter</button>

    </form>
    

    
    
</body>
</html>