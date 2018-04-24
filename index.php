<?php
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
session_start();
if(isset($_SESSION['user']))
{
    $user=  $_SESSION['user'];
}
else
{
    header('Location: Login.php');
    die();
}
$table = 'home';
?>




$p = new Customer();


$user = new UserInfo();

