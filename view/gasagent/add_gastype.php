<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gas Type</title>
    <link rel="stylesheet" href="../../public/css/gasagent/add_gastype.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
   
   <?php include_once 'gaasagent_header.php'
?>   

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
                            <label for="">Gas Type&nbsp&nbsp&nbsp</label>
                            
                            <select name="gasType" id="gasType">
                                <option value="">---Select Type---</option>
                                <option value="Litro">Litro</option>
                                <option value="Laugh">Laugh</option>
                            </select>
                        </div><br>
                        <div class="dropdown">
                           <label for=""> Gas Weight</label>
                            <select name="gasWeight" id="gasWeight">
                                <option value="">---Select Type---</option>
                                <option value="37.5">37.5</option>
                                <option value="12.5">12.5</option>
                                <option value="5">5</option>
                                <option value="2.3">2.3</option>
                            </select>
                        </div><br>
                        <label for="quantity" >Gas Quantity</label>
                        <input type="text" name="gasQuantity" id="gasQuantity" placeholder="Gas Quantity">
                        <br>
                        <!-- <label for="price" >Gas Price</label>
                        <input type="text" name="gasPrice" id="gasPrice" placeholder="   Gas Price" >
                        <br> -->
                        <br><br>
                        <button type="submit" name="AddgasType" >ADD</button>
                    </form>
                  
                </div>
               
                
                
            </div>

            </div>
          


            
  
    
    </div>
    <div class="image2"></div>
    
    
</body>
</html>