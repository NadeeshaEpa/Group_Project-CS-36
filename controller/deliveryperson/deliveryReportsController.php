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
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['GasReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['GasDayReports']="Today Delivered gas argent";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            
        }
        if($_POST['dateRange']=='7'){
            $result=$user->GasDay7Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['GasReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['GasDay7Reports']="Last seven days Delivered gas argent";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
        }
        if($_POST['dateRange']=='30'){
            $result=$user->GasDay30Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['GasReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['GasDay30Reports']="Last thirty days Delivered gas argent";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           
        }
        if($_POST['dateRange']=='100'){
            $result=$user->GasAllReports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['GasReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['GasAllReports']="All Delivered gas argent";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            
        }
        else{
            $_SESSION['No_result']="No result found";
            header("Location: ../../view/deliveryperson/DeliveryReports.php");
            $connection->close();
            exit();
        }


    }
    if($_POST['customerType']=='Customer'){
        if($_POST['dateRange']=='1'){
            $result=$user->CusDayReports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['cusReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['CusDayReports']="Today Delivered Customers";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='7'){
            $result=$user->CusDay7Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['cusReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['CusDay7Reports']="Last seven days Delivered Customers";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='30'){
            $result=$user->CusDay30Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['cusReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['CusDay30Reports']="Last thirty days Delivered Customers";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='100'){
            $result=$user->CusAllReports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
<<<<<<< HEAD
                $_SESSION['cusReportview']=$result;
=======
                $_SESSION['DiliverReportview']=$result;
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                $_SESSION['CusAllReports']="All Delivered Customers";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            

        }
        else{
            $_SESSION['No_result']="No result found";
            header("Location: ../../view/deliveryperson/DeliveryReports.php");
            $connection->close();
            exit();
        }

    }
<<<<<<< HEAD
    /* */
    if($_POST['customerType']=='Shop_manager'){
        if($_POST['dateRange']=='1'){
            $result=$user->ShopDayReports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['ShopReportview']=$result;
                $_SESSION['ShopDayReports']="Today Delivered Shop Manager";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='7'){
            $result=$user->ShopDay7Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['ShopReportview']=$result;
                $_SESSION['ShopDay7Reports']="Last seven days Delivered Shop Manager";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='30'){
            $result=$user->ShopDay30Reports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['ShopReportview']=$result;
                $_SESSION['ShopDay30Reports']="Last thirty days Delivered Shop Manager";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
           

        }
        if($_POST['dateRange']=='100'){
            $result=$user->ShopAllReports($connection);
            if($result==false){
                $_SESSION['No_result']="No result found";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            else{
                $_SESSION['ShopReportview']=$result;
                $_SESSION['ShopAllReports']="All Delivered Shop Manager";
                header("Location: ../../view/deliveryperson/DeliveryReports.php");
                $connection->close();
                exit();
            }
            

        }
        else{
            $_SESSION['No_result']="No result found";
            header("Location: ../../view/deliveryperson/DeliveryReports.php");
            $connection->close();
            exit();
        }

    }


    /* */
=======
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
    else{
        $_SESSION['No_result']="No result found";
        header("Location: ../../view/deliveryperson/DeliveryReports.php");
        $connection->close();
        exit();

    }


}
