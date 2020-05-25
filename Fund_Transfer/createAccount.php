<?php
$mysqli = new mysqli('localhost', 'root', '', 'mpms');
if ($mysqli->connect_error){
    printf("Connect failed: %s<br>",
        $mysqli->connect_error);
    exit();
}
if (isset($_POST['submit'])) {
    $account_number = intval($_POST['account_number']);
    $customer_name = trim($_POST['customer_name']);
    $customer_name = htmlspecialchars($customer_name);
    $customer_name = mysqli_real_escape_string($mysqli, $customer_name);
    $customer_name = strval($customer_name);
    $account_type = strval($_POST['account_type']);
    $current_balance = doubleval($_POST['current_balance']);

$sql = "INSERT INTO account_info(account_number, customer_name, account_type, current_balance) VALUES ('$account_number', '$customer_name', '$account_type', '$current_balance')";
$statement = $mysqli->query($sql);
//$statement->bind_param("issi", $account_number, $customer_name, $account_type, $current_balance);
//$statement->execute();

if ($statement) {
    $msg = "Account created success";
}else{
    $error ="Account created not success";
}
}
$mysqli->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
    <style>
        .half-width{
            display: inline-table;
            margin: 10px;
            min-width: 40%;
        }
        fieldset{
            padding: 10px;
            min-height: 150px;
        }
        .text-center{
            text-align: center;
        }
        .form-group{
            display: block;
            margin-bottom: 10pt;
        }
        label{
            font-size: 12pt;
            display: block;
        }
        .form-control{
            width: 100%;
            padding: 5px;
        }
        .btn{
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-primary{
            background-color: #4c9bff;
            color: #fff;
            font-weight: bold;
        }
        table{
            width: 100%;
            margin: 0px 0px 10px 10px;
        }
        th, td{
            padding: 10px;
        }

        a {
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="half-width">
    <fieldset>
        <legend>CREATE ACCOUNT</legend>
        <?php
        if (isset($msg)){
            echo "<span style='color: green'>$msg</span>";
        }
        if (isset($error)){
            echo "<span style='color: red'>$error</span>";
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Account Number</label>
                <input type="number" name="account_number" id="name" required class="form-control" placeholder="Enter Your Account Number(214748364_)">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="customer_name" id="name" required class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="fromname">Account Type</label>
                <select name="account_type" id="fromname" required class="form-control">
                    <option value="Saving">Saving</option>
                    <option value="Current">Current</option>
                </select>

            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="current_balance" id="amount" required class="form-control" placeholder="Enter Amount (BDT)">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="index.php" class="btn btn-primary">Show Account</a>
    </fieldset>
</div>
</body>
</html>
