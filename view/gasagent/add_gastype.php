<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gas Type</title>
    <link rel="stylesheet" href="../../public/css/add_gastype.css">
</head>
<body>
   
    <!-- <?php include '../../public/header.php'; ?>
    -->
   
    <div class="registration-form">  
    
       
        <div id="errmsg">
                <?php
                    if(isset($_SESSION['Already exist Gas type'])){
                            echo $_SESSION['Already exist Gas type'];
                            unset($_SESSION['Already exist Gas type']);
                    }
                ?>

        </div>
        <div class="image">
        <br>     <br><br><br><br>   
        <div class="content">
            

                <div class="gas_type">
                    <h2>Add gas type</h2>
                
                    <form action="../../controller/gasagent/gastype_controller.php" method="POST">
                        <div class="dropdown">
                            <label for=""> Gas Type</label>
                            
                            <select name="gasType" id="gasType">
                                <option value="">---Select Type---</option>
                                <option value="litro">LITRO</option>
                                <option value="laugfs">LAUGFS</option>
                            </select>
                        </div><br><br>
                        <div class="dropdown">
                           <label for=""> Gas Weight</label>
                            <select name="gasWeight" id="gasWeight">
                                <option value="">---Select Type---</option>
                                <option value="37.5">37.5kg</option>
                                <option value="12.5">12.5kg</option>
                                <option value="5">5kg</option>
                                <option value="2.3">2.3kg</option>
                            </select>
                        </div><br>
                        <label for="quantity" >Gas Quantity</label>
                        <input type="text" name="gasQuantity" id="gasQuantity" placeholder="Gas Quantity">
                        <br>
                        <label for="price" >Gas Price</label>
                        <input type="text" name="gasPrice" id="gasPrice" placeholder="   Gas Price" >
                        <br>
                        <button type="submit" name="AddgasType" >ADD</button>
                    </form>
                    <div class="abc"><a href="gasmanager_manage.php">Back</a></div>
                </div>
               
                
                
            </div>

            </div>
          


            
  
    
    </div>
    <div class="image2"></div>
    
    
</body>
</html>