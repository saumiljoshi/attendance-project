<?php
class dbcontroller{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "test";
    private $conn; 

function __construct() {
    $this->conn = $this->connectdb();
}

function connectdb() {
    $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);

    return $conn;
}
function insert($query, $param_type, $param_value_array) {
     $sql = $this->conn->prepare($query);
     $this->bindqueryparams($sql, $param_type, $param_value_array);
     $sql->execute();
     $insertID = $sql->insert_id;
     return $insertID;    
}
function runbasequery($query){
   $resultset = "";
   $result = $this->conn->query($query);
   if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $resultset = $row;

       }
   }
   return $resultset;
  }
    function update($query,$param_type, $param_value_array){
      $sql = $this->conn->prepare($query);
      $this->bindqueryparams($sql,$param_type,$param_value_array);
      $sql->execute();
    }
    
}
?>