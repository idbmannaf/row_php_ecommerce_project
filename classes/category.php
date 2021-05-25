<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
?>
<?php
class Category
{
    private $conn;
    private $format;
    function __construct()
    {
        $this->conn = new Database();
        $this->format = new Format();
    }
    public function insertCat($insertCat)
    {
        $insertCat = $this->format->validation($insertCat);
        $insertCat = mysqli_real_escape_string($this->conn->db, $insertCat);
        if (empty($insertCat)) {
            $catmsg = '<span style="color: red; font-size:16px;">Category name missing</span>';
            return $catmsg;
        } else {
            $sql = "INSERT INTO `category`(`catId`, `catName`, `created`, `updated`) VALUES (NULL,'$insertCat',NULL,NULL)";
            // $sql = "INSERT IN category (catId,catName,created,updated) VALUES (NULL,'$insertCat',NULL,NULL)"
            $result = $this->conn->insert($sql);
            if ($result) {
                $catmsg = '<span style="color: green; font-size:16px;">Category Added</span>';
                return $catmsg;
            } else {
                $catmsg = '<span style="color: red; font-size:16px;">Category not added</span>';
                return $catmsg;
            }
        }
    }
    public function allCatList(){
        $sql= "SELECT * FROM category";
        $result= $this->conn->select($sql);
        return $result;
    }
    public function fetchCat($catid){
        $sql = "SELECT * FROM category WHERE catId='$catid'";
        $result= $this->conn->select($sql);
        return $result;
    }
    public function updateCat($catName,$id){
        $catName = $this->format->validation($catName);
        $catName = mysqli_real_escape_string($this->conn->db, $catName);
        $sql= "UPDATE category SET catName='$catName' WHERE catId='$id'";
 
        $result= $this->conn->update($sql);
        if ($result) {
            $upmsg= "Category Updated";
            return $upmsg;
        }else{
            $upmsg= "Category Not UPdated";
            return $upmsg;
        }


    }
    public function categories(){
        $catSql= "SELECT * FROM category";
        $carResult= $this->conn->select($catSql);
        return $carResult;
    }
    public function productByCat($catid){
       $catid= filter_var($catid,FILTER_VALIDATE_INT);
       $pbycatSQL= "SELECT product.*,category.catName FROM product INNER JOIN category on product.catId=category.catId WHERE product.catId='$catid' ORDER BY product.productId DESC LIMIT 10";
       $pByCat=$this->conn->select($pbycatSQL);
       return $pByCat;
    }

    // 
}


?>