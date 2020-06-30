<?php
require_once 'pdodb.php';
 session_start();
if (!empty($_SESSION['useer'])){?>
  <h1>Welcome <?= ucfirst($_SESSION['useer']); ?></h1>
    <h3 style="color:green; text-align: center">You are successfully logged In.</h3>
    <a href="authenticate.php?logoutt=true">Logout</a>
<?php }else{ ?>
<h3 style="color: red">You are not logged In</h3>
    To login, <a href="login.php">Click here</a>
<?php } ?>
