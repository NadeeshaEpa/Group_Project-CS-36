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
                <div class="top">
                    <div class="logo"></div>
                    <div class="profile_img"></div>
                    <div class="profile_name" >
                        <div><label for="name" id="name">Nirupana Ganganath</label></div>
                    </div>
                    <div class="logout" >
                        <div><a href="fuelManager_login.php">Logout</a></div>
                    </div>
                </div>
                <div class="middle">
                
                    
                        <form action="../../controller/fuelmanager/fuelmanagerViewController.php" method="POST">
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
                <div class="bottom">
                        <div class="social_media">
                            <img src="../../public/css/images/facebook .png" alt="facebook">
                        </div>
                        <div class="social_media">
                            <img src="../../public/css/images/instagram.png" alt="facebook">
                        </div>
                        <div class="social_media">
                            <img src="../../public/css/images/linkedin.png" alt="facebook">
                        </div>
                        <div class="social_media">
                            <img src="../../public/css/images/twitter.png" alt="facebook">
                        </div>
                        <div class="sentence">
                            <div>© 2022 FAGO. All Rights Reserved.</div>
                        </div>
                            
                </div>
        </div>

    
    </body>
</html>