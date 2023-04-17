                                                                                                                                                               /*shop opened and closed */
if(isset($_POST['sbtn1'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_open($connection);
    
    if($result){
        $_SESSION['updateOpenSucessfully']="sucess";

        
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");

        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateOpenSucessfully']="Failed";

        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");

        $connection->close();
        exit();

    }
}
elseif(isset($_POST['sbtn2'])){
    $user=new Brand_reports;
    $result=$user->update_as_a_close($connection);
    if($result){
        $_SESSION['updateClosedSucessfully']="sucess";
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();
    }
    else{
        $_SESSION['updateClosedSucessfully']="Failed";
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();
    }
}

else{
    echo"invalid request";
    exit();
}