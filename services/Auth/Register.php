<?php
use Datas\UserData;
use Models\Users\CreateUserDto;
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $pn = $_POST['pn'];

    $UserReg = new CreateUserDto($un, $pw, $fn, $ln, $pn);

    $Service = new UserData();
    $Service->createUserData($UserReg);

?>