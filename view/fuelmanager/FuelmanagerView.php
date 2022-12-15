<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public//css/Fuelmanagerview.css">
    <title>view</title>
</head>
    <body> 

    <div class="outter">
        <?php include '../../view/fuelmanager/fuelManagerHeader.php'; ?>
        <div class="container">
            <div class="sidebar">
            <div class="btn"onclick="location.href='fuelManager_Dashboard.php'">
                    <div class="icon">
                        <img src="../../public/images/other.png" >
                    </div>
                    <div class="name"><h6>Dashboard</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_manage.php'">
                    <div class="icon">
                        <img src="../../public/images/dashboard.png" >
                    </div>
                    <div class="name"><h6>Manage</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_account.php'">
                    <div class="icon">
                        <img src="../../public/images/user.png" >
                    </div>
                    <div class="name"><h6>Account</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_other.php'">
                    <div class="icon">
                        <img src="../../public/images/ellipsis.png" >
                    </div>
                    <div class="name"><h6>Other</h6></div>
                </div>
            </div>
            <div class="dashboard">
                
                    <form action="../../controller/fuelmanager/fuelmanagerViewController.php" method="POST">
                                <div class="btnView"><button type="text" name="view" id="view">View</button></div>
                                <div class="tbl">
                                    <table class="tb">
                                    <tr>
                                        <th>Type</th>
                                        <th>SubType</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    <?php
                                    if(isset($_SESSION['view_result'])){
                                        $result=$_SESSION['view_result']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Type'] . "</td>";
                                            echo "<td>" . $row['Subtype'] . "</td>";
                                            echo "<td>" . $row['Qunatity'] . "</td>";
                                            echo "<td>" . $row['Price'] . "</td>";
                                            echo "</tr>";
                                        }
                                        unset($_SESSION['view_result']);
                                    }
                                    
                                    ?>
                                    </table>
                                    <div class="abc"><a href="fuelmanager_manage.php">Back</a></div>
                                </div>
                    </form>
                
            </div>
        </div>
        <?php include '../../public/footer.php'; ?>
     </div>
        
    </body>
</html>