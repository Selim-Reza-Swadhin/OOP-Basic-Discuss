<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <p>
        <?php
        session_start();
        if (!empty($_SESSION['useer'])){
            header('location:home.php');
        }
        if (!empty($_SESSION['error'])){
            echo $_SESSION['error'];
            session_destroy();
        }
        ?>
    </p>

    <form action="authenticate.php" method="post">
        <fieldset>
            <legend>Please Log In</legend>
            <label for="uname">Username</label>
            <input type="text" name="uname" id="uname" value="">
            <br>
            <br>
            <label for="pword">Password</label>
            <input type="text" name="pword" id="pword" value="">
            <input type="hidden" name="getaction" value="user_login">
            <br>
            <br>
            <input type="submit" name="login_submit" value="Log In">
            or <a href="./home.php">cancel</a>
            <br>
        </fieldset>
    </form>
</div>
</body>
</html>