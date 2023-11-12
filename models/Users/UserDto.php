<?php
namespace Models\Users;
class UserDto{
    function __construct($un, $fn, $ln, $pn){
        $this->username = $un;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->phoneNumber = $pn;
    }
    public string $username;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
}
?>