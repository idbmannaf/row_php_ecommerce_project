<?php
$filepath= realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/database.php');
require_once ($filepath.'/../helper/format.php');
?>
<?php
    class Customar{
    private $conn;
    private $fm;
    function __construct()
    {
        $this->conn= new Database();
        $this->fm= new Format();
    }
    public function customarInfo($data){
        
        $name= mysqli_real_escape_string($this->conn->db,$data['name']);
        $city= mysqli_real_escape_string($this->conn->db,$data['city']);
        $zip= mysqli_real_escape_string($this->conn->db,$data['zip']);
        // $email= mysqli_real_escape_string($this->conn->db,$data['email']);
        $email= filter_var($data['email'],FILTER_VALIDATE_EMAIL);
        $address= mysqli_real_escape_string($this->conn->db,$data['address']);
        $country= mysqli_real_escape_string($this->conn->db,$data['country']);
        $phone= mysqli_real_escape_string($this->conn->db,$data['phone']);
        $pass= mysqli_real_escape_string($this->conn->db,$data['pass']);
    //   echo $name,$city,$email;
        if ($name=='' || $city=='' ||  $zip=='' || $email=='' || $address=='' || $country == '' || $phone=='' || $pass=='')  {
        return $msg= "<span style='color:red; font-size:13px; font-weight:bold;'>Field must not be empty</span>";
        }else{
            $mailCheck= "SELECT * FROM customar WHERE email='$email'";
        $checkmai= $this->conn->select($mailCheck);
        if ($checkmai !=false) {
            $msg= "<span style='color:red; font-size:13px; font-weight:bold;'>Email Alreay Exist</span>";
                return $msg;
            
        }else{
            $customarQuery ="INSERT INTO `customar`(`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES (NULL,'$name','$address','$city','$country','$zip','$phone','$email','$pass')";
            $result = $this->conn->insert($customarQuery);
            if ($result) {
                $msg= "<span style='color:green; font-size:13px; font-weight:bold;'>Registration Successfull</span>";
                return $msg;
            }else{
                $msg= "<span style='color:red; font-size:13px; font-weight:bold;'>Registration Faild</span>";
                return $msg;
            }
        }
    }
  
    }
    public function customarLogin($data){
        $login= mysqli_real_escape_string($this->conn->db,$data['email']);
        $pass= mysqli_real_escape_string($this->conn->db,$data['password']);
       if ($login=='' || $pass=='') {
        $lmsg= "<span style='color:red; font-size:13px; font-weight:bold;'>Fields Must not be empty</span>";
        return $lmsg;
       }else{
        $loginSql= "SELECT * From customar WHERE email='$login' AND pass='$pass' LIMIT 1";
        $loginstatus= $this->conn->select($loginSql);
            if ($loginstatus !=false) {
                $result= $loginstatus->fetch_assoc();
                Session::set('logged',true);
                Session::set('email',$result['email']);
                Session::set('id',$result['id']);
                Session::set('email',$result['name']);
                header('location:order.php');
            }else{
               
                $lmsg= "<span style='color:red; font-size:13px; font-weight:bold;'>Email Or Password Not Match</span>";
        return $lmsg;
            }
       }
    }

    public function customarData($id){
        $cusQuery= "SELECT customar.* ,country.countryName FROM customar
        INNER JOIN country on customar.country= country.id
         WHERE customar.id = '$id'";
        $data= $this->conn->select($cusQuery);
        return $data;
    }

    public function updateProfile($data,$id){
        $name= mysqli_real_escape_string($this->conn->db,$data['name']);
        $city= mysqli_real_escape_string($this->conn->db,$data['city']);
        $zip= mysqli_real_escape_string($this->conn->db,$data['zip']);
        $email= filter_var($data['email'],FILTER_VALIDATE_EMAIL);
        $address= mysqli_real_escape_string($this->conn->db,$data['address']);
        $country= mysqli_real_escape_string($this->conn->db,$data['country']);
        $phone= mysqli_real_escape_string($this->conn->db,$data['phone']);

        if ($name=='' || $city=='' ||  $zip=='' || $email=='' || $address=='' || $country == '' || $phone=='')  {
        return $msg= "<span style='color:red; font-size:13px; font-weight:bold;'>Field must not be empty</span>";
        }else{
            $updateSql= "UPDATE `customar` SET 
            `name`          ='$name',
            `address`       ='$address',
            `city`          ='$city',
            `country`       ='$country',
            `zip`           ='$zip',
            `phone`         ='$phone',
            `email`         ='$email'
             WHERE `id`='$id'";
            // return $updateSql;
            $updateQuery= $this->conn->update($updateSql);
            if($updateQuery){
                $umsg= "<span style='color:green; font-size:13px; font-weight:bold;'>Profile Updated</span>";
                return $umsg;
            }else{
                $umsg= "<span style='color:red; font-size:13px; font-weight:bold;'>Profile Not Updated</span>";
                return $umsg;
            }
        }
    }
    public function country(){
        $sql= "SELECT * FROM country";
        $r= $this->conn->select($sql);
        return $r;
    }
    public function payableAmount($id){
        $sql= "SELECT * FROM ordertable WHERE customarId='$id' AND date= now()";
        // return $sql;
        $pay= $this->conn->select($sql);
        return $pay;  
    }
    public function orderList($id){
        $olQuery= "SELECT ordertable.*, date(date) as dat FROM ordertable WHERE customarId='$id' ORDER BY date";
        $orderlistresult= $this->conn->select($olQuery);
        return $orderlistresult;  
    }


}

?>