<?php
class user_model{
    private $User_id;
    private $Type;
    public function loginUser($connection,$username,$password){   //check whether the user entered correct username and password and the status is 1.
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $result = $connection->query($sql);


        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $this->User_id=$row['User_id'];
            $_SESSION['User_id']=$this->User_id;
            $_SESSION['Username']=$row['Username'];
            $_SESSION['Firstname']=$row['First_Name'];
            $_SESSION['Lastname']=$row['Last_Name'];
            $_SESSION['Street']=$row['Street'];
            $_SESSION['City']=$row['City'];
            $_SESSION['Postalcode']=$row['Postalcode'];
            $_SESSION['Type']=$row['Type'];
            $this->Type=$row['Type'];


            $sql="SELECT * FROM cart WHERE User_id='$this->User_id'";
            $result=$connection->query($sql);
            if($result->num_rows > 0){
                $_SESSION['cartcount']=$result->num_rows;
            }else{
                $_SESSION['cartcount']=0;
            }

            $img="SELECT img_id,status,imgname FROM profileimg WHERE User_id='$this->User_id'";
            $resultimg=$connection->query($img);
            $rowimg=$resultimg->fetch_assoc();
            $_SESSION['img_id']=$rowimg['img_id'];
            $_SESSION['img-status']=$rowimg['status'];
            $_SESSION['User_img']=$rowimg['imgname'];
            
            if($this->Type=="Customer"){
                $r1="SELECT * FROM customer WHERE Customer_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    $row=$connection->query($r1)->fetch_assoc();
                    $_SESSION['latitude']=$row['latitude'];
                    $_SESSION['longitude']=$row['longitude'];
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }

            else if($this->Type=="Delivery_Person"){
                $r1="SELECT * FROM deliveryperson WHERE DeliveryPerson_Id='$this->User_id' AND Status='1'";

                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
            else if($this->Type=="gasagent"){
                $r1="SELECT * FROM gasagent WHERE GasAgent_Id='$this->User_id' AND Status='1'";
                if($connection->query($r1)->num_rows > 0){
                    return true;   //login will be successful
                }else{
                    $_SESSION['login_attempts']+=1;
                    return false;   //login will be unsuccessful
                }
            }
<<<<<<< HEAD

            else if($this->Type=="Admin" || $this->Type=="Staff" || $this->Type=="Stock Manager"){

=======
            else if($this->Type=="Admin" || $this->Type=="Staff" || $this->Type=="Stock Manager"){
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                return true;   //login will be successful
            }else{
                $_SESSION['login_attempts']+=1;
                return false;   //login will be unsuccessful
            }
        }
        else{
            $_SESSION['login_attempts']+=1;
            return false;   //login will be unsuccessful
        }
    }
    public function gastype($connection){
        $sql="SELECT company_name from gas_company";
        $result=$connection->query($sql);
        $gastype=array();
        foreach($result as $row){
            $gastype[]=$row['company_name'];
        }
        return $gastype;
    }
    public function limit_order($connection,$User_id){
        $sql="select limit_status,time_period from admin";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
        $limit_status=$row['limit_status'];
        $time_period=$row['time_period'];

        //get the lsat order date of the user and check whether the time period is exceeded or not
        if($limit_status==0){
            return true;
        }else{
            $ebil="select ElectricityBill_No from customer where Customer_Id='$User_id'";
            $result=$connection->query($ebil);
            $row=$result->fetch_assoc();
            $ebil_no=$row['ElectricityBill_No'];

            //find the last order date of the users which has the same ebil no
            $sql="select o.order_date from `order` o inner join `placeorder` p on o.Order_id=p.Order_Id inner join customer c on p.Customer_Id=c.Customer_Id where c.ElectricityBill_No='$ebil_no' order by o.order_date desc limit 1";
            $result=$connection->query($sql);
            if($result->num_rows > 0){
                $row=$result->fetch_assoc();
                $last_order_date=$row['order_date'];
                $last_order_date=date_create($last_order_date);
                $current_date=date_create(date("Y-m-d"));
                $diff=date_diff($last_order_date,$current_date);
                $diff=$diff->format("%a");
                if($diff > $time_period){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        }
        

    }
}