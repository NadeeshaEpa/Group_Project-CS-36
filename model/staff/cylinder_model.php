<?php
class cylinder_model{
    private $Cylinder_Id;
    private $Type;
    private $Price;
    private $Weight;
    private $photo;
    
    

    public function setDetails($gascompany='',$weight='',$price='',$photo=''){
        $this->Type=$gascompany;
        $this->Weight=$weight;
       $this->Price=$price;
       $this->photo=$photo;  
    }
    
    public function setId($connection){  
        $sql = "SELECT Cylinder_id FROM gascylinder order by Cylinder_Id desc limit 1";
        $result = $connection->query($sql);
        $id=$result->fetch_assoc();
        $this->Cylinder_Id=$id['Cylinder_Id'];
    }

    public function getId($connection){
        return $this->Cylinder_Id;
    }

    private function CreatecylinderEntry($connection){
        $sql="INSERT INTO gascylinder(Type,Weight,Price,photo) VALUES ('$this->Type','$this->Weight','$this->Price','$this->photo')";
        if($connection->query($sql)){
            $_SESSION['registerMsg']="cylinder table updated Successfully";
            return true;
        }else{
            $_SESSION['regerror']="cylinder Registration Failed";
            return false;
        }
    }

    public function Registercylinder($connection){
        $result1=$this->CreateCylinderEntry($connection);
        $this->setId($connection);


        if($result1){
            return true;
        }else{
            return false;
        }
    }

    public function viewcylinder($connection){
        $sql="SELECT c.Cylinder_Id, c.Weight, c.Price,c.photo, g.company_name FROM `gascylinder` c INNER JOIN `gas_company` g ON c.Type=g.company_id";
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

    public function company_list($connection){
                $sql="SELECT company_id,company_name from `gas_company`";
                $result=$connection->query($sql);
                if($result->num_rows===0){
                    return false;
                }else{
                    $company=[];
                    while($row=$result->fetch_object()){
                        array_push($company,['company_id'=>$row->company_id,'company_name'=>$row->company_name]);
                    }
                    return $company;
                }
     }

     public function deleteuser($connection,$cylinder_id){
        $sql="DELETE FROM `gascylinder` WHERE Cylinder_Id='$cylinder_id'";
        $result=$connection->query($sql);
        if($result==TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    
    public function updateUser($connection,$array){
        $sql="UPDATE `gascylinder` SET `Price`='$array[1]' WHERE Cylinder_Id='$array[0]'";
        $result=$connection->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function edituser($connection,$cylinder_id){
        $sql="SELECT c.Cylinder_Id, c.Weight, c.Price,c.photo, g.company_name FROM `gascylinder` c INNER JOIN `gas_company` g ON c.Type=g.company_id WHERE c.Cylinder_Id='$cylinder_id'";
        $result=$connection->query($sql);
        if($result->num_rows===0){
            return false;
        }else{
            $cylinder=[];
            while($row=$result->fetch_object()){
                array_push($cylinder,['Cylinder_Id'=>$row->Cylinder_Id,'Weight'=>$row->Weight,'photo'=>$row->photo,'company_name'=>$row->company_name, 'Price'=>$row->Price]);
            }
            return $cylinder;
        }      
    }




// class add_gasType{
//     public function getcylinderId($connection,$weight,$gasagentId){
//        $sql="Select c.Cylinder_Id from gascylinder c inner join gasagent ga on c.Type=ga.Gas_Type where c.Weight='$weight' and ga.GasAgent_Id='$gasagentId'";
//        $result=$connection->query($sql);
//        $row=$result->fetch_assoc();
//        $cylinderId=$row['Cylinder_Id'];
//        return $cylinderId;
//     }
//     public function addgas($connection,$cylinderId,$quantity,$gasagentId){
//        $sql="Insert into sell_gas (GasAgent_Id,Cylinder_Id,Quantity) values('$gasagentId','$cylinderId','$quantity')";
//          $result=$connection->query($sql);
//          if($result==true){
//              return true;
//          }
//          else{
//              return false;
//          }
//     }
//     public function getgasType($connection,$userid){
//        $sql="Select Gas_Type from gasagent where GasAgent_Id='$userid'";
//        $result=$connection->query($sql);
//        $row=$result->fetch_assoc();
//        $gasType=$row['Gas_Type'];
//        return $gasType;
//     }
//     public function getgasWeight($connection,$gettype){
//        $sql="Select Weight from gascylinder where Type='$gettype'";
//        $result=$connection->query($sql);
//        while($row=$result->fetch_assoc()){
//           $gasweights[]=$row['Weight'];
//        }
//        return $gasweights;
//     }
//  }
    
    
}