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
        <div class="contaner">
               
               
                <div class="middle">
                
                    
                        <form action="../../controller/gasagent/gasagent_viewController.php" method="POST">
                            <div class="btn"><button type="text" name="view" id="view">View</button></div>
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
                                        echo "<td>" . $row['Weight'] . "</td>";
                                        echo "<td>" . $row['Quantity'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "</tr>";
                                    }
                                    unset($_SESSION['view_result']);
                                }
                                
                                ?>
                                </table>
                                
                            </div>
                        </form>

                      
                    
               

                </div>
                
        </div>

    
    </body>
</html>