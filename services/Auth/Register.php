<?php
namespace services;
require_once "../../Datas/DBUsers/UserData.php";
require_once "../../Models/Users/CreateUserDto.php";

use RAOVAT\Datas\DBUsers\UserData;
use RAOVAT\Models\Users\CreateUserDto;

    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $pn = $_POST['pn'];
   // echo $un + $pw + $fn + $ln + $pn;
    $UserReg = new CreateUserDto($un, $pw, $fn, $ln, $pn);

    $Service = new UserData();
    $dataRes =  $Service->createUserData($UserReg);
    var_dump( $dataRes);
?>