<?php
class company_model{
    private $company_id;
    private $company_name;
    private $photo;
    
    

    public function setDetails($company_name='',$photo=''){
        $this->company_name=$company_name;
        $this->photo=$photo;
    
    }
    
    public function setId($connection){  
        $sql = "SELECT company_id FROM gas_company order by company_id desc limit 1";
        $result = $connection->query($sql);
        $id=$result->fetch_assoc();
        $this->company_id=$id['company_id'];
    }

    public function getId($connection){
        return $this->company_id;
    }

    private function CreatecompanyEntry($connection){
        $sql="INSERT INTO gas_company(company_name,photo) VALUES ('$this->company_name','$this->photo')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="company table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="company Registration Failed";
            return false;
        }
    }

    public function Registercompany($connection){
        $result1=$this->CreateCompanyEntry($connection);
        $this->setId($connection);


        if($result1){
            return true;
        }else{
            return false;
        }
    }

    public function viewcompany($connection){
        $sql="SELECT * FROM gas_company";
        $result=mysqli_query($connection,$sql);
        if($result){
            $company=[];
            while($row=mysqli_fetch_assoc($result)){
                $company[]=$row;
            }
            print_r($company);
            return $company;
        }else{
            return false;
        }
    }


    public function view_company($connection,$company_id){
        $sql="SELECT company_id, company_name, photo from `gas_company`  WHERE company_id='$company_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $company=[];
            while($row=$result->fetch_object()){
                array_push($company,['company_id'=>$row->company_id,'company_name'=>$row->company_name,'photo'=>$row->photo]);
            }
            return $company;
        }
    }
    
    public function updateUser($connection,$array){
        $sql="UPDATE `gas_company` SET `company_name`='$array[1]' WHERE company_id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function edituser($connection,$company_id){
        $sql="SELECT company_id, company_name, photo from `gas_company`  WHERE company_id='$company_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $company=[];
            while($row=$result->fetch_object()){
                array_push($company,['company_id'=>$row->company_id,'company_name'=>$row->company_name,'photo'=>$row->photo]);
            }
            return $company;
        }      
    }

    public function deleteuser($connection,$company_id){
        $sql="DELETE FROM `gas_company` WHERE company_id='$company_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function check_company($connection,$company_name){
        $sql="SELECT company_id FROM `gas_company` WHERE company_name='$company_name'";
        $result = mysqli_query($connection, $sql);
        if($result->num_rows==0){
            return true;
        }
        else{
            return false;
        }
    }

    
    
}