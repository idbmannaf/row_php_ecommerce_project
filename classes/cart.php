<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
?>

<?php

class Cart{
    private $conn;
    private $fm;
    function __construct()
    {
        $this->conn= new Database();
        $this->fm= new Format();
    }
    public function addToCart($quintety,$id){
        $quintety = $this->fm->validation($quintety);
        $quintety = mysqli_real_escape_string($this->conn->db,$quintety);
        $pid = mysqli_real_escape_string($this->conn->db,$id);
        $sid= session_id();
        $productquery= "SELECT * FROM product WHERE productId='$pid'";
        $plist= $this->conn->select($productquery)->fetch_assoc();
        $pname= $plist['productName'];
        $price= $plist['price'];
        $image= $plist['image'];
        
        $checkQuery= "SELECT * FROM cart WHERE prductid='$pid' AND uid='$sid'";
        $checkResult= $this->conn->select($checkQuery);
        if ($checkResult) {
            $checkMsg= "<span style='color:red; font-size:16px;'>Product Already Added</span>";
            return $checkMsg;
        }else{
        $cartQuery= "INSERT INTO `cart`(`cartId`, `uid`, `prductId`, `productName`, `price`, `quantity`, `image`) VALUES (NULL,'$sid','$id','$pname','$price','$quintety','$image')";
        $insertcardData= $this->conn->insert($cartQuery);
        if ($insertcardData) {
            header('location:cart.php');
            
        }else{
            header('location:404.php');
        }
    }
    }
    public function orderDetails($sid){
        $orderQuery= "SELECT * FROM cart WHERE uid='$sid'";
        $orderResult= $this->conn->select($orderQuery);
        return $orderResult;
    }
    public function updateQuantity($updateQuantity,$cartId){
        if ($updateQuantity <1) {
            $qdeletQuery= "DELETE FROM cart WHERE cartId='$cartId'";
            $deltePformC= $this->conn->delete($qdeletQuery);
            if ($deltePformC) {
                header('location:cart.php');
                // return $qupdate;
            }else{
                return false;
            }
        }else{
            $updateQuery= "UPDATE cart SET quantity='$updateQuantity' WHERE cartId= '$cartId'";
        $cartResult= $this->conn->update($updateQuery);
        if ($cartResult) {
            // $qupdate= "<span class='success'>Quantity Updated Successfully</span>";
            header('location:cart.php');
            // return $qupdate;
        }else{
            return false;
        }
        }
        
    }
    public function deleteCartProdunt($dpid){
        $qdeletQuery= "DELETE FROM cart WHERE cartId='$dpid'";
        $deltePformC= $this->conn->delete($qdeletQuery);
        if ($deltePformC) {
            echo "<script>window.location='cart.php';</script>";
      
        }else{
            return false;
        }
    }
    public function grandTotal($sid){
        $query= "SELECT * FROM cart WHERE uid='$sid'";
        $total= $this->conn->select($query);
        return $total;
    }
        public function countProduct($sid){
            $countQuery= "SELECT * FROM cart WHERE uid='$sid'";
            $countResullt= $this->conn->select($countQuery);
            return $countResullt;
        }

    public function deleteAfterLogout($sid){
        $query= "DELETE FROM cart WHERE uid='$sid'";
        $res= $this->conn->delete($query);
        
    }
    public function checkCart($sid){
        $query= "SELECT * FROM cart WHERE uid='$sid'";
        $res= $this->conn->select($query);
        return $res;
        
    }

    public function orderProduct($id,$sid){
        $query= "SELECT * FROM cart WHERE uid='$sid'";
        $getPro= $this->conn->select($query);
        if ($getPro) {
            while ($result= $getPro->fetch_assoc()) {
               $productId= $result['prductId'];
               $productName= $result['productName'];
               $quantity= $result['quantity'];
               $price= $result['price'];
               $totalPrice= $result['price'] *  $quantity;
               $image= $result['image'];
               $orderQuery= "INSERT INTO `ordertable`(`id`, `customarId`, `productId`, `productName`, `quantity`, `price`, `totalPrice`, `image`) VALUES (NULL,'$id','$productId','$productName','$quantity','$price','$totalPrice','$image')";
                $orderInsert= $this->conn->insert($orderQuery);
        
            }
        }
    }
    
    public function checkOrder($id){
        $query= "SELECT * FROM orderTable WHERE customarId='$id'";
        $res= $this->conn->select($query);
        return $res;
        
    }
    public function cancelOrder($cusid,$pid){
        $sql= "DELETE FROM ordertable WHERE customarId='$cusid' AND productId='$pid'";
        // echo $sql;
        $result = $this->conn->delete($sql);
       return $result;
    }
    public function getAllOrder(){
        $sql= "SELECT * FROM ordertable ORDER BY date";
        // echo $sql;
        $result = $this->conn->select($sql);
       return $result; 
    }
    
}

?>