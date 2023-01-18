<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/gasagent/add_gastype.css">
    <title>Document</title>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
         </div>
         <div class="sidebar">
 
     <div class="left">
             <div class="left2">
                 <form action="gasagent_dashboard.php" method="POST">
                     <button name="review">
                         <div class="left2-1">
                         <i class="fas fa-question"></i>
                         </div>
                         <p>Dashboard</p>
                         <p>detaisl</P>
                     </button>
                     </form>
                 </div>
                 <div class="left1">
                 <div class="active"> 
                     <form action="../../controller/gasagent/gasagent_viewController.php" method="POST">
                         <button name="view">
                         <div class="left1-1">
                            <i class="fas fa-user-graduate"></i>                        
                         </div>
                         <p>Gas Quantity</p>
                         <p>view details</P>
                         </button>    
                     </form>    
                 </div>  
                 </div>
 
                 <div class="left2">
                     <form action="add_gastype.php" method="POST">
                         <button name="Addgas">
                             <div class="left2-1">
                             <i class="fas fa-chalkboard-teacher"></i>                            </div>
                             <p>Add gas</p>
                             <p>add new gas type</P>
                         </button>
                     </form>    
                 </div>
                 <div class="left2">
                 <form action="" method="POST">
                     <button >
                         <div class="left2-1">
                         <i class="fas fa-user-graduate"></i>
                         </div>
                         <p>Profile</p>
                         <p>detaisl</P>
                     </button>
                     </form>
                 </div>
                 
             </div>
         </div>
         </div>   


    <h2>
    <?php
        if(isset($_SESSION['RegsuccessMsg'])){
            echo $_SESSION['RegsuccessMsg'];
            echo '<br>';
            unset($_SESSION['RegsuccessMsg']);
        }
    ?>
    </h2>
    <div id="container">
    <h2>
     Gas type added Successfully. 
    </h2>
    </div>
</body>
</html>