<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
?>
<?php
class Product
{
    private $conn;
    private $format;
    function __construct()
    {
        $this->conn = new Database();
        $this->format = new Format();
    }
    public function catlist()
    {
        $catsql = "select * from category";
        $result = $this->conn->select($catsql);
        return $result;
    }
    public function brandList()
    {
        $brandsql = "select * from brand";
        $result = $this->conn->select($brandsql);
        return $result;
    }
    public function insertProduct($data, $file)
    {
        // return $data['productName'];
        $productName   = mysqli_real_escape_string($this->conn->db, $data['productName']);
        $brandId       = mysqli_real_escape_string($this->conn->db, $data['brandId']);
        $catId         = mysqli_real_escape_string($this->conn->db, $data['catId']);
        // $details       = mysqli_real_escape_string($this->conn->db, $data['details']);
        $details       = strip_tags($this->format->textShorten(mysqli_real_escape_string($this->conn->db, $data['details'])));
        $price         = mysqli_real_escape_string($this->conn->db, $data['price']);
        $type          = mysqli_real_escape_string($this->conn->db, $data['type']);

        // image upload

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name); // .diye vag koreche
        $file_ext = strtolower(end($div)); //vag korar port tar sese jpg,png,jpet,gif khujteche 
        // return $file_ext;
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        if ($productName == '' || $brandId == '' || $catId == ''  || $details == '' || $price == '' ||  $type == '' ||  $file_name == '') {
            $imgmsg = "<span class='error'>Filds must not be empty </span>";
            return $imgmsg;
        } elseif (in_array($file_ext, $permited) == false) { // $file_ext=> jodi file extensiont jpeg,png etc thake $permited er vitore tahole true asbe r nathake false asbe
            $imgmsg = "<span class='error'>Image must be jpg, jpeg,png,gift</span>";
            return $imgmsg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $imgSql = "INSERT INTO `product`(`productId`, `productName`, `brandId`, `catId`, `details`, `price`, `image`, `type`, `status`, `created`) VALUES (NULL,'$productName','$brandId','$catId','$details','$price','$unique_image','$type','1',NULL)";
            //    return $imgSql;
            $result = $this->conn->insert($imgSql);
            if ($result) {
                $imgmsg = "<span class='success'>Product Uploaded Succsessflly</span>";
                return $imgmsg;
            } else {
                $imgmsg = "<span class='error'>Product not Uploaded</span>";
                return $imgmsg;
            }
        }
        
    }
    public function productList(){
        // $sql = "SELECT * FROM product";
        $sql = "SELECT product.* ,brand.brandName, category.catName FROM product
            INNER JOIN brand on product.brandId= brand.brandId
            INNER JOIN category on product.catId= category.catId ORDER BY product.productId DESC";
        $result = $this->conn->select($sql);
        return $result;
    }
    public function fetchProduct($productId){

        $proQuery= "SELECT * FROM product WHERE productId='$productId'";
        $result= $this->conn->select($proQuery);
        return $result;
    }
    public function updateProduct($data,$file,$id){
        $productName   = mysqli_real_escape_string($this->conn->db, $data['productName']);
        $brandId       = mysqli_real_escape_string($this->conn->db, $data['brandId']);
        $catId         = mysqli_real_escape_string($this->conn->db, $data['catId']);
        // $details       = mysqli_real_escape_string($this->conn->db, $data['details']);
        $details       = strip_tags($this->format->textShorten(mysqli_real_escape_string($this->conn->db, $data['details'])));
        $price         = mysqli_real_escape_string($this->conn->db, $data['price']);
        $type          = mysqli_real_escape_string($this->conn->db, $data['type']);

        // image upload

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name); // .diye vag koreche
        $file_ext = strtolower(end($div)); //vag korar port tar sese jpg,png,jpet,gif khujteche 
        // return $file_ext;
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        
        if ($productName == '' || $brandId == '' || $catId == ''  || $details == '' || $price == '' ||  $type == '' ) {
            $imgmsg = "<span class='error'>Filds must not be empty </span>";
            return $imgmsg;
        }else{
        if(!empty($file_name)){
                if (in_array($file_ext, $permited) == false) { // $file_ext=> jodi file extensiont jpeg,png etc thake $permited er vitore tahole true asbe r nathake false asbe
                    $imgmsg = "<span class='error'>Image must be jpg, jpeg,png,gift</span>";
                    return $imgmsg;
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);

                    $imgSql= " UPDATE product SET
                            productName     = '$productName',
                            brandId         = '$brandId',
                            catId           = '$catId',
                            details         = '$details',
                            price           = '$price',
                            image           = '$unique_image',
                            type            = '$type'
                            WHERE productId='$id';

                    
                    ";
                    // return $imgSql;
                    $update = $this->conn->update($imgSql);
                    if ($update) {
                        $imgmsg = "<span class='success'>Product Updated Succsessflly</span>";
                        return $imgmsg;
                    } else {
                        $imgmsg = "<span class='error'>Product not Updated</span>";
                        return $imgmsg;
                    }
                }
         }else{
            $imgSql= " UPDATE product SET
            productName     = '$productName',
            brandId         = '$brandId',
            catId           = '$catId',
            details         = '$details',
            price           = '$price',
            type            = '$type'
            WHERE productId='$id'
                ";
                $update = $this->conn->update($imgSql);
                if ($update) {
                    $imgmsg = "<span class='success'>Product Updated Succsessflly</span>";
                    return $imgmsg;
                } else {
                    $imgmsg = "<span class='error'>Product not Updated</span>";
                    return $imgmsg;
                }
         }
        }
    }
    public function deleteProduct($deleteId){
        // $imgRemoveQuery="DELETE FROM `product` WHERE productId='$deleteId' ";
        // $delimg= $this->conn->select($imgRemoveQuery);
        // if ($delimg) {
        //    while ( $delRow= $delimg->fetch_assoc()) {
               
        
        //     $path= "uploads/".$delRow['image'];
        //     unlink($path);
        // }   
        // }
        $productdeleteSQL= "DELETE FROM `product` WHERE productId='$deleteId' ";
        $deleted= $this->conn->delete($productdeleteSQL);
        return $deleted;
    }
    public function getFeaturedProduct(){
        $pQuery= "SELECT * FROM product WHERE type='0' ORDER BY productId DESC LIMIT 4";
        $result = $this->conn->select($pQuery);
        return $result;
    }
    
    public function getNewProduct(){
        $pQuery= "SELECT * FROM product ORDER BY productId DESC LIMIT 4";
        $result = $this->conn->select($pQuery);
        return $result;

    }

    // Details Page 
    public function getSingelData($pid){
        // $sql = "SELECT * FROM product WHERE productId='$pid'";
        $sql = "SELECT product.* ,brand.brandName, category.catName FROM product
        INNER JOIN brand on product.brandId= brand.brandId
        INNER JOIN category on product.catId= category.catId WHERE product.productId='$pid'";
        $singlequery= $this->conn->select($sql);
        return $singlequery; 
    }
    public function fromIphone(){
        $sql= "SELECT * FROM product WHERE brandId='3' ORDER BY productId DESC LIMIT 1";
        $result = $this->conn->select($sql);
        return $result;
    }
    public function fromSamsung(){
        $sql= "SELECT * FROM product WHERE brandId='2' ORDER BY productId DESC LIMIT 1";
        $result = $this->conn->select($sql);
        return $result;
    }
    public function fromIAccer(){
        $sql= "SELECT * FROM product WHERE brandId='4' ORDER BY productId DESC LIMIT 1";
        $result = $this->conn->select($sql);
        return $result;
    }
    public function fromICanon(){
        $sql= "SELECT * FROM product WHERE brandId='8' ORDER BY productId DESC LIMIT 1";
        $result = $this->conn->select($sql);
        return $result;
    }
}
