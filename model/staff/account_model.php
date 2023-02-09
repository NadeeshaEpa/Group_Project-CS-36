<?php
class account_model{
    public function viewstaff($connection){
        $sql="SELECT * FROM user u INNER JOIN staff s ON u.User_id=s.Staff_Id WHERE Type='Staff' AND s.Status=1";
        $result=mysqli_query($connection,$sql);
        if($result){
            $staff=[];
            while($row=mysqli_fetch_assoc($result)){
                $staff[]=$row;
            }
            // print_r($staff);
            return $staff;
        }else{
            return false;
        }
    }

    public function viewcustomer($connection){
        $sql="SELECT * FROM user u INNER JOIN customer c ON u.User_id=c.Customer_Id WHERE u.Type='Customer' AND c.Status=1";
        $result=mysqli_query($connection,$sql);
        if($result){
            $customer=[];
            while($row=mysqli_fetch_assoc($result)){
                $customer[]=$row;
            }
            // print_r($customer);
            return $customer;
        }else{
            return false;
        }
    }


    public function viewGasagent($connection){
        $sql="SELECT * FROM user u INNER JOIN gasagent g ON u.User_id=g.GasAgent_Id WHERE u.Type='Gas Agent' AND g.Status=1";
        $result=mysqli_query($connection,$sql);
        if($result){
            $gasagent=[];
            while($row=mysqli_fetch_assoc($result)){
                $gasagent[]=$row;
            }
            // print_r($gasagent);
            return $gasagent;
        }else{
            return false;
        }
    }

    public function viewDeliveryperson($connection){
        $sql="SELECT * FROM user u INNER JOIN deliveryperson d ON u.User_id=d.DeliveryPerson_Id WHERE u.Type='Delivery Person' AND d.Status=1";
        $result=mysqli_query($connection,$sql);
        if($result){
            $deliveryperson=[];
            while($row=mysqli_fetch_assoc($result)){
                $deliveryperson[]=$row;
            }
            // print_r($deliveryperson);
            return $deliveryperson;
        }else{
            return false;
        }
    }

    public function viewcylinder($connection){
        $sql="SELECT c.Cylinder_Id, c.Weight, c.Price g.company_name FROM gascylinder c INNER JOIN gas_company g ON c.Type=g.company_id";
        $result=mysqli_query($connection,$sql);
        if($result){
            $cylinder=[];
            while($row=mysqli_fetch_assoc($result)){
                $cylinder[]=$row;
            }
            // print_r($cylinder);
            return $cylinder;
        }else{
            return false;
        }
    }

    public function viewcustomerRequests($connection){
        $sql="SELECT * FROM user u INNER JOIN customer c ON u.User_id=c.Customer_Id WHERE u.Type='Customer' AND c.Status=0";
        $result=mysqli_query($connection,$sql);
        if($result){
            $customer=[];
            while($row=mysqli_fetch_assoc($result)){
                $customer[]=$row;
            }
            // print_r($customer);
            return $customer;
        }else{
            return false;
        }
    }


    public function viewGasagentRequests($connection){
        $sql="SELECT * FROM user u INNER JOIN gasagent g ON u.User_id=g.GasAgent_Id WHERE u.Type='Gas Agent' AND g.Status=0";
        $result=mysqli_query($connection,$sql);
        if($result){
            $gasagent=[];
            while($row=mysqli_fetch_assoc($result)){
                $gasagent[]=$row;
            }
            // print_r($gasagent);
            return $gasagent;
        }else{
            return false;
        }
    }

    public function viewDeliverypersonRequests($connection){
        $sql="SELECT * FROM user u INNER JOIN deliveryperson d ON u.User_id=d.DeliveryPerson_Id WHERE u.Type='Delivery Person' AND d.Status=0";
        $result=mysqli_query($connection,$sql);
        if($result){
            $deliveryperson=[];
            while($row=mysqli_fetch_assoc($result)){
                $deliveryperson[]=$row;
            }
            // print_r($deliveryperson);
            return $deliveryperson;
        }else{
            return false;
        }
    }

}
