<?php

require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
session_start();


if(isset($_POST['username']))
{
    $user = EmployeeQuery::create()->findOneByUserName($_POST['username']);

    if($user != null && $user->getPassword() == $_POST['password'])
    {
        echo "Log in Successful";

        $_SESSION['user']=$user;
        header('Location: table.php');
    }
    else
    {
        echo "Log in Unsuccessful";
        require 'views/login.php';
    }




}
else {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        header('Location: table.php');
    }
    else {
        require 'views/login.php';
    }


    //require 'table.php';

}