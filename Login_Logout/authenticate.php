<?php
require_once 'user.php';

if (!empty($_GET['logoutt']) && $_GET['logoutt'] == true){
    session_destroy();
    header('location:login.php');
}

$admin = new User();
$admin->processLoginForm();
