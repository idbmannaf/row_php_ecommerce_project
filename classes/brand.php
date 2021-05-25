<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
?>
<?php

class Brand{
    private $conn;
    private $format;
    function __construct()
    {
        $this->conn = new Database();
        $this->format = new Format();
    }
    public function insertBrand($brand){
            $clenBrand= $this->format->validation($brand);
            $clenBrand= mysqli_real_escape_string($this->conn->db,$clenBrand);
            if (empty($clenBrand)) {
                $brandMsg= "<span class='danger'>Input Some Value</span>";
                return $brandMsg;
            }else{
                $sql= "INSERT INTO brand (`brandId`, `brandName`, `created`, `updated`)VALUES(null,'".$clenBrand."',NULL,NULL)";
                $result = $this->conn->insert($sql);
               if ($result) {
                   $brandMsg= "<span class='info'>Brand Sucsessfully Added</span>";
                   return $brandMsg;
               }else{
                $brandMsg= "<span class='danger'>Brand Not added</span>";
                   return $brandMsg;
               }
            }
    }
    public function allBrandList(){
        $sql= "SELECT * FROM brand";
        $result= $this->conn->select($sql);
        if ($result) {
            return $result;
        }else{
            return false;
        }
    }
    public function fetchBrand($brandid){
        $brandid = mysqli_real_escape_string($this->conn->db,$brandid);
        $brandsql= "SELECT * FROM brand where brandId='$brandid'";
        $result = $this->conn->select($brandsql);
        return $result;
    }
    public function updateBrand($brandName,$id){
        $brandName= mysqli_real_escape_string($this->conn->db,$brandName);
        $id= mysqli_real_escape_string($this->conn->db,$id);
        if (empty($brandName)) {
           $msg=  "<span class='danger'>input Some Value</span>";
           return $msg;
        }else{
        $q= "UPDATE brand set brandName='$brandName' WHERE brandId='$id'";
        $result = $this->conn->update($q);
            if ($result) {
                $msg=  "<span class='danger'>Brand Sucsessfully Updated</span>";
                return $msg;
            }else{
                $msg=  "<span class='danger'>Brand Not updated</span>";
            return $msg;
            }
        }
    }
}
?>