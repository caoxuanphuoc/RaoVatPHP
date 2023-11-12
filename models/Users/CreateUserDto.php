<?php
namespace RAOVAT\Models\Users;
class CreateUserDto{
    function __construct($un, $pw, $fn, $ln, $pn){
        $this->username = $un;
        $this->password = $pw;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->phoneNumber = $pn;
    }
    public string $username;
    public string $password;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
}
?>