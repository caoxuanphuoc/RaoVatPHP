<?php
namespace Datas;
use PDO;
class ConnectionMySql{
    public function __construct() {}
    private $servername = "localhost";
    private $username = "root";
    private $password = "123qwe";
    private $dbname = "raovatdb";
    public function getConnection() : PDO{
            $conn = new PDO("mysql:host= $this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            return $conn;
       
    }
}


?>
