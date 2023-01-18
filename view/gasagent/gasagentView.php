
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/gasagent/gas_agent_view.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>view</title>
</head>
    <body>
    <?php include_once 'gaasagent_header.php'?>
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






        <div class="contaner">
               
               
                <div class="middle">
                
                            <div class="tbl">
                                <table class="tb">
                                <tr>
                                    <th>Type</th>
                                    <th>SubType</th>
                                    <th>Quantity</th>
                                    
                                </tr>
                                <?php
                                if(isset($_SESSION['view_result'])){
                                    $result=$_SESSION['view_result']; 
                                    foreach ($result as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Type'] . "</td>";
                                        echo "<td>" . $row['Weight'] ." kg". "</td>";
                                        echo "<td>" . $row['Quantity'] . "</td>";
                                       
                                        echo "</tr>";
                                    }
                                    unset($_SESSION['view_result']);
                                }
                                
                                ?>
                                </table>
                                
                            </div>


                      
                    
               

                </div>
                
        </div>

    
    </body>
</html>