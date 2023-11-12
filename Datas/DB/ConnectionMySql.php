<?php
namespace RAOVAT\Datas\DB;
use PDO;
class ConnectionMySql{
    public function __construct() {}
    private $servername = "localhost";
    private $username = "root";
    private $password = "123qwe";
    private $dbname = "raovatdb";
    public function getConnection() {
        try{
            //$conn = new PDO("mysql:host= $this->servername;Database=$this->dbname;port=3306", $this->username, $this->password);
            $conn = new PDO("mysql:host =". $this->servername.";Port=3306;dbname=". $this->dbname.";",$this->username, $this->password);
            echo "Check";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            return $conn;
        }catch(\PDOException $e){
            echo "". $e->getMessage();
        }
       
    }
}


?>
