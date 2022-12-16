<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body>
<?php include_once 'gaasagent_header.php'?>
    <div class="container">
        <!-- <div class="topbar">
            <div class="logo">
                <h2>fago.</h2>
            </div>
            <div class="search">
                <input type="text" id="search" placeholder="search hear">
                <label for="search"> <i class="fas fa-search"></i> </label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                    <img src="../../public/images/logo.png" alt="">

            </div>


 -->
    
        </div>
        <div class="sidebar">
            <!-- <ul>
                <li>
                    <a href="gasagentView.php">
                        <i class="fas fa-user-graduate"></i>
                        <div>View </div>
                    </a>
                </li>

                <li>
                    <a href="add_gastype.php">
                        <i class="fas fa fa-th-large"></i>
                        <div>Add Gas Type</div>
                        
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-th-large"></i>
                        <div>dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-th-large"></i>
                        <div>Orders</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <div>Profile</div>
                    </a>
                </li>
            </ul> -->



            
        <div class="left">
            <div class="left2">
                <form action="" method="POST">
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
        <div class="main">
       
       
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                            <div class="card-name">Add gas type</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-edit"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                            <div class="card-name">Delete gas type</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-archive"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                            <div class="card-name">Customers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                            <div class="card-name">Sales</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>

            </div>
            <img class="image1" src="../../public/images/chart2.png" alt="Girl in a jacket">
            <img class="image1" src="../../public/images/chart3.png" alt="Girl in a jacket">

        </div>
    </div>
   
    
</body>
</html>