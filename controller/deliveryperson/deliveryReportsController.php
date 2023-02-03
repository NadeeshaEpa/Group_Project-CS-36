<?php 
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/delivaryReportsModel.php");


if(isset($_POST['viewReport'])){
    
    $user= new reports;
    if($_POST['customerType']=='GasAgent'){
       
        if($_POST['dateRange']=='1'){
            $result=$user->GasDayReports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            
        }
        if($_POST['dateRange']=='7'){
            $result=$user->GasDay7Reports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
        }
        if($_POST['dateRange']=='30'){
            $result=$user->GasDay30Reports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           
        }
        if($_POST['dateRange']=='100'){
            $result=$user->GasAllReports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            
        }
        else{
            header("Location: ../../view/deliveryperson/DeliveryReports.php");
            $connection->close();
            exit();
        }


    }
    if($_POST['customerType']=='Customer'){
        if($_POST['dateRange']=='1'){
            $result=$user->CusDayReports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='7'){
            $result=$user->CusDay7Reports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='30'){
            $result=$user->CusDay30Reports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='100'){
            $result=$user->CusAllReports($connection);
            if($result==false){
                $result['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['DiliverReportview']=$result;
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            

        }
        else{
            header("Location: ../../view/deliveryperson/DeliveryReports.php");
            $connection->close();
            exit();
        }

    }
    else{
        header("Location: ../../view/deliveryperson/DeliveryReports.php");
        $connection->close();
        exit();

    }


}
