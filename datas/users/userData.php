<?php
namespace Datas;
use Models\Users\CreateUserDto;
use Models\Users\UserDto;
use PDO;
use responses\ResponseData;
class UserData{
    public function __construct() {
    }
    public function createUserData(CreateUserDto $input): ResponseData{
        $sql = `INSERT INTO users (userName, passWord, firstName, lastName, phoneNumber)
        VALUES ( :un, :pw, :fn, :ln, :pn)`;
        $conObject = new ConnectionMySql();
        $conn = $conObject->getConnection();
        $query = $conn->prepare($sql);
        $query->bindParam(':un', $input->username, PDO::PARAM_STR);
        $query->bindParam(':pw', $input->password, PDO::PARAM_STR);
        $query->bindParam(':fn', $input->firstName, PDO::PARAM_STR);
        $query->bindParam(':ln', $input->lastName, PDO::PARAM_STR);
        $query->bindParam(':pn', $input->phoneNumber, PDO::PARAM_STR);

        $check = $query->execute();
        if ($check) {
            if($query->rowCount()!=0){
                $res = new UserDto( $input->username ,$input->firstName, $input->lastName, $input->phoneNumber ) ;
                return new ResponseData(200, "thành công", $res);
            }
        } 
        return new ResponseData(500, "có lỗi", null);
        
    }
}
?>