
<?php

Class Database{
 private $host;
 private $user;
 private $pass;
 private $dbname;
 
 
 public $db;
 public $error;
 
function __construct()
{
    $this->host= "localhost";
    $this->user= "root";
    $this->pass= "";
    $this->dbname= "ecoproject";
    $this->db= new mysqli($this->host,$this->user,$this->pass,$this->dbname);
    if (!$this->db){
        $this->error= "Connection Fail".$this->db->connect_error;
        return false;
    }
}
 
 
// Select or Read data
public function select($query){
    $result = $this->db->query($query) or die($this->db->error.__LINE__);
    if ($result->num_rows > 0) {
        return $result;
    }else{
        return false;
    }
}

// Insert data
public function insert($query){
    $result = $this->db->query($query) or die($this->db->error.__LINE__);
    if ($result) {
       return $result;
    }else{
        return false;
    }
}
//Update Data
public function update($query){
    $result = $this->db->query($query) or die($this->db->error.__LINE__);
    if ($result) {
        return $result;
     }else{
         return false;
     }
}
public function delete($query){
    $result = $this->db->query($query) or die($this->db->error.__LINE__);
    if ($result) {
        return $result;
     }else{
         return false;
     }
}

}