<?php 
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/order_model.php");


if(isset($_POST['viewReport'])){
    
    $user= new Brand_reports;
    
    if($_POST['customerType']=='Delivery_person'){
       
        if($_POST['dateRange']=='1'){
            $result=$user->DelDayReports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BranddeReportview']=$result;
                $_SESSION['BdeDayReports']="Today Delivered Delivery person";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            
        }
        if($_POST['dateRange']=='7'){
            $result=$user->DelDay7Reports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BranddeReportview']=$result;
                $_SESSION['BdeDay7Reports']="Last seven days Delivered Delivery person";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
        }
        if($_POST['dateRange']=='30'){
            $result=$user->DelDay30Reports($connection);
            
            if($result==false){
                
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BranddeReportview']=$result;
                $_SESSION['BdeDay30Reports']="Last thirty days Delivered Delivery person";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
           
        }
        if($_POST['dateRange']=='100'){
            $result=$user->DelAllReports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BranddeReportview']=$result;
                $_SESSION['BdeAllReports']="All Delivered Delivery person";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            
        }
        else{
            $_SESSION['Brands_No_result']="No result found";
            header("Location: ../../view/gasagent/orders.php");
            $connection->close();
            exit();
        }


    }
    if($_POST['customerType']=='Customer'){
        if($_POST['dateRange']=='1'){
            $result=$user->CusDayReports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BrandcusReportview']=$result;
                $_SESSION['BCusDayReports']="Today Ordered Customers";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='7'){
            $result=$user->CusDay7Reports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BrandcusReportview']=$result;
                $_SESSION['BCusDay7Reports']="Last seven days Ordered Customers";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='30'){
            $result=$user->CusDay30Reports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BrandcusReportview']=$result;
                $_SESSION['BCusDay30Reports']="Last thirty days Ordered Customers";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='100'){
            $result=$user->CusAllReports($connection);
            if($result==false){
                $_SESSION['Brands_No_result']="No result found";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['BrandcusReportview']=$result;
                $_SESSION['BCusAllReports']="All Ordered Customers";
                header("Location: ../../view/gasagent/orders.php");
                $connection->close();
                exit();
            }
            

        }
        else{
            $_SESSION['Brands_No_result']="No result found";
            header("Location: ../../view/gasagent/orders.php");
            $connection->close();
            exit();
        }

    }
    else{
        $_SESSION['Brands_No_result']="No result found";
        header("Location: ../../view/gasagent/orders.php");
        $connection->close();
        exit();

    }


}