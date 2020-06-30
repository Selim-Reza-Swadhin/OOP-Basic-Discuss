<?php
require_once 'session_add.php';
//session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Visit Count Session</title>
</head>
<body>
<h2>Your visit history</h2>
<?php
if (!isset($_SESSION['visits'])){
    echo  "<h2 style='color: green'>Welcome, ".$_SESSION['user']."<br></h2>";
    echo 'This is your first visit';
}else{
    echo  "<h2 style='color: green'>Welcome back, ".$_SESSION['user']."<br></h2>";
    echo 'You previous visited this page on : <br><br>';
    foreach ($_SESSION['visits'] as $v){
        echo date('d-m-Y g:i:s:a', $v).'<br>';
        //echo date('d-m-Y g:i:s:a', time()).'<br>';
    }
}
?>
<br><br>
</body>
</html>
<?php
//add current date/time stamp to session array
echo " php.ini timezone is : ", ini_get('date.timezone').'<br>';
//Override time
//date_default_timezone_set('Asia/Dhaka');
//$timezone = date_default_timezone_get();
//echo date('d-m-Y h:i:s:a');

$_SESSION['visits'][] = time(); //Default time
?>
