<?php
namespace RAOVAT\Datas\DBUsers; 
require_once __DIR__ . '/../DB/ConnectionMySql.php' ;
require_once __DIR__ . '/../../Models/Users/UserDto.php' ;
require_once __DIR__ . '/../../Models/Users/CreateUserDto.php' ;
require_once __DIR__ . '/../../Responses/ResponseData.php' ;

use RAOVAT\Datas\DB\ConnectionMySql;
use RAOVAT\Models\Users\CreateUserDto;
use RAOVAT\Models\Users\UserDto;
use PDO;
use RAOVAT\Responses\ResponseData;
class UserData{
    public function __construct() {
    }
    public function createUserData(CreateUserDto $input): UserDto{
        $sql = 'INSERT INTO users (userName, passWord, firstName, lastName, phoneNumber)
        VALUES ( :un, :pw, :fn, :ln, :pn)';
        $conObject = new ConnectionMySql();
        $conn = $conObject->getConnection();
        if($conn){
            var_dump($conn);
            $query = $conn->prepare($sql);
            $query->bindParam(':un', $input->username, PDO::PARAM_STR);
            $query->bindParam(':pw', $input->password, PDO::PARAM_STR);
            $query->bindParam(':fn', $input->firstName, PDO::PARAM_STR);
            $query->bindParam(':ln', $input->lastName, PDO::PARAM_STR);
            $query->bindParam(':pn', $input->phoneNumber, PDO::PARAM_STR);
            $check = $query->execute(array( ':un' => $input->username, ':pw' => $input->password,':fn' => $input->firstName,':ln' => $input->lastName,':pn' => $input->phoneNumber ));
            if ($check) {
                if($query->rowCount()!=0){
                    $res = new UserDto( -1, $input->username ,$input->firstName, $input->lastName, $input->phoneNumber ) ;
                    $conn = null;
                    return $res;
                }
            } 
        }
        $conn = null;
        return null;
    }
    public function GetUser($id): UserDto{
        $sql ='select * from users where id = :id';
        $conObject = new ConnectionMySql();
        $conn = $conObject->getConnection();
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);
        $res = new UserDto( $result['id'] , $result['userName'], $result['firstName'], $result['lastName'], $result['phoneNumber']);
        return $res;
    }
    public function GetAllUser(): array{
        $sql ='select * from users';
        $conObject = new ConnectionMySql();
        $conn = $conObject->getConnection();
        $query = $conn->prepare($sql);
        $query->execute();
        $ResList = [];
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            foreach ($results as $row) {
                $res = new UserDto( $row['id'] , $row['userName'], $row['firstName'], $row['lastName'], $row['phoneNumber']);
                $ResList[] = $res;
            }
        } else {
            echo "No records found.";
        }
        return $ResList;
    }
}
?>