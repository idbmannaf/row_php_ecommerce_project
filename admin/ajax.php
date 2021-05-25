<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
$conn= new Database();
?>
<?php
if (isset($_POST['date'])) {
   $customarId =$_POST['customarId'];
   $date =$_POST['date'];
   $price =$_POST['totalPrice'];
   $status =$_POST['status'];
// echo $date ;
$sql= "UPDATE ordertable SET
         status='$status' WHERE date='$date' AND totalPrice='$price' AND customarId='$customarId'";
        $result= $conn->update($sql);
         if ($result) {
           echo "Succsess";
         }else {
            echo "Faild";

         }
}
?>