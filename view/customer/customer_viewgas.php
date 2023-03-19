<?php session_start(); ?>
<?php 
    if($_SESSION['available']=="failed" || $_SESSION['viewgas']=="failed"){
            header("location:error.php");
    }else{
        if(isset($_SESSION['weight'])){
            $weight=$_SESSION['weight'];
            if($weight!=NULL){
                $count1=count($weight);
            }else{
                $weight=[];
                $count1=0;
            }
        }else{
            $weight=[];
            $count1=0;
        }
        if(isset($_SESSION['viewgas'])){
            $gas=$_SESSION['viewgas'];
            $count=count($gas);
        
        }else{
            $gasshop=[];
            $count=0;
        }
        if(isset($_SESSION['shopnames'])){
            $shops=$_SESSION['shopnames'];
            if($shops!=NULL){
                $count2=count($shops);
            }else{
                $shops=[];
                $count2=0;
            }
        }else{
            $shops=[];
            $count2=0;
        }
        if(isset($_SESSION['locations'])){
            $locations=$_SESSION['locations'];
        }else{
            $locations=[];
        }
        if(isset($_SESSION['shop_count'])){
            $shop_count=$_SESSION['shop_count'];
        }else{
            $shop_count=0;
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_gas.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2eSy5egkITKWg1EMsa1i1WcpPi29dgK0"></script>  
    <title>Document</title>
</head>
<body onload="initMap()">
    <?php include_once 'customer_header.php'; ?>
    <div class="container">
        <div class="left" id="map">
        </div>
        <div class="right">
            <?php if($shop_count==0){
                header("location:noshops.php");
            } ?>
            <h1><?php echo $_SESSION['gas_type']?> Gas</h1>
                <?php if(isset($_SESSION['last_order'])){
                    if($_SESSION['last_order']==0){?>
                    <div class="order-limit">
                        <p>We're sorry, but due to the current economic situation, we have had to temporarily limit the number of gas cylinders that can be ordered.<br>
                            Please try again at a later time when we are able to offer our full range of services. <br>
                            Thank you for your understanding and support during these challenging times.
                        </p>
                    </div>
                    <?php }
                }?>
            <table>
                <tr>
                    <th>Vendor</th>
                    <th>Distance</th>
                    <?php 
                        foreach($weight as $weight1){?>
                            <th><?php echo $weight1['Weight']?>kg</th>
                        <?php } ?>
                    <th>Refilling</th>
                    <th>New Cylinder</th>
                </tr>
                    <?php 
                    $i=0;
                    foreach($shops as $shop){?>
                    <tr>
                            <td><?php echo $shop['Shop_name']?></td>
                            <td><?php echo $shop['distance']?>km</td>
                            <?php 
                            foreach($weight as $weight1){
                                $flag=0;
                                foreach($gas as $gas1){?>
                                <?php 
                                if($gas1['Shop_name']==$shop['Shop_name'] && $gas1['Weight']==$weight1['Weight']){?>
                                    <td><?php echo $gas1['Quantity'];?></td>
                                    <?php
                                    $gasagent=$gas1['GasAgent_Id'];
                                    $_SESSION['gasagent']=$gasagent;
                                    $flag=1;
                                    break;
                                }else{
                                    continue;
                                }
                                ?>
                                <?php 
                                }
                                if($flag==0){?>
                                <td><?php
                                    $i++;
                                    echo "Not available"; 
                                ?></td>
                                <?php 
                                }
                            } ?> 
                            <!-- call gas controller by passing the gas agent id -->
                            <?php if($i==$count1 ||$_SESSION['last_order']==0){?>
                                <td><button disabled>Order</button></td>
                            <?php }else{?> 
                                <td><a href="../../controller/customer/gas_controller.php?gasid=<?php echo $gasagent?>">Order</a></td>
                            <?php } ?>

                            <?php if($i==$count1 ||$_SESSION['last_order']==0){?>
                                <td><button disabled>Buy</button></td>
                            <?php }else{?>
                                <td><a href="../../controller/customer/gas_controller.php?newgasid=<?php echo $gasagent?>">Buy</a></td>
                            <?php } ?>
                        <?php } ?>
                </tr>
            </table>
            <?php 
                if(isset($_SESSION['page'])){
                $page=$_SESSION['page'];
                }else{
                $page=1;
                }
                if(isset($_SESSION['total_pages'])){
                    $total_pages=$_SESSION['total_pages'];
                }else{
                    $total_pages=1;
                }    
            ?>
            <div class="pagination">
            <?php if($page>1){?>
                <!-- pass value as form -->
                <div class="p-left">
                    <form action="../../controller/customer/gas_controller.php" method="GET">
                        <input type="hidden" name="page" value="<?php echo $page-1?>">
                        <input type="hidden" name="gas_type" value="<?php echo $_SESSION['gas_type']?>">
                        <input type="submit" value="Previous">
                    </form>
                </div>
            <?php } ?>
            <?php if($page<$total_pages){?>
                <!-- pass value as form -->
                <div class="p-right">
                    <form action="../../controller/customer/gas_controller.php" method="GET">
                        <input type="hidden" name="page" value="<?php echo $page+1?>">
                        <input type="hidden" name="gas_type" value="<?php echo $_SESSION['gas_type']?>">
                        <input type="submit" value="Next">
                    </form>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>  
    <script>
    function initMap() {
    var locations = <?php echo json_encode($locations); ?>;

    console.log(locations);

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: new google.maps.LatLng(locations[0][1], locations[0][2]),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
        })(marker, i));
    }
    }
    </script>

</body>
</html>