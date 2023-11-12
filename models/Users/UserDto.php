<?php
namespace RAOVAT\Models\Users;
class UserDto{
    function __construct($id,$un, $fn, $ln, $pn){
        $this->id = $id;
        $this->username = $un;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->phoneNumber = $pn;
    }
    public int $id;
    public string $username;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
}
?>