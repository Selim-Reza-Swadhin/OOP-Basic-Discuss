<?php
require_once 'session_add.php';
//session_start();

//read session variable
echo  'Welcome back, '.$_SESSION['user'].'|'.$_SESSION['role'];
