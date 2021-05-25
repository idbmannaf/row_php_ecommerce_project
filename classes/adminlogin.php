<?php
include "../lib/session.php";
Session::checkLogin();
include "../lib/database.php";
include "../helper/format.php";
class adminLogin{
    private $conn;
    private $format;
    function __construct()
    {
        $this->conn= new Database();
        $this->format= new Format();
    }
    public function adminlogin($user,$pass){
       
        $user= $this->format->validation($user);         //validation 
        $pass= $this->format->validation($pass); //validation 
        $user = mysqli_real_escape_string($this->conn->db, $user); //validation 
        $pass = mysqli_real_escape_string($this->conn->db, $pass); //validation 

if (empty($user) || empty($pass)) {
   $loginmsg ="Username or Password must not be empty"; 
   return $loginmsg;
}else{
    $sql = "SELECT * FROM admin WHERE adminUser='$user' AND adminPass='$pass'";
     $result= $this->conn->select($sql);
   if ($result !=false) {
       $value = $result->fetch_assoc();
       Session::set('adminlogin',true);
       Session::set('adminId',$value['adminId']);
       Session::set('adminUser',$value['adminUser']);
       Session::set('adminName',$value['adminName']);
       header("location:index.php");
   }else{
    $loginmsg ="Username or Password Not Match"; 
    return $loginmsg;
   }
   
}

    }
}
