<?php
$mysqli = new mysqli('localhost', 'root', '', 'mpms');
if ($mysqli->connect_error){
    printf("Connect failed: %s<br>",
    $mysqli->connect_error);
    exit();
}
$sql = "SELECT * FROM account_info ORDER BY id DESC";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()){
    $accounts[]=$row;
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
    <title>Account</title>
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
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="containers">
    <div class="half-width">
        <fieldset>
            <a href="createAccount.php" class="btn btn-primary">Create Account</a>
            <legend>ACCOUNT BALANCES</legend>
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <td class="text-center">Account Number</td>
                    <td class="text-center">Customer Number</td>
                    <td class="text-center">Balance</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($accounts as $acc){
                    echo "<tr><td>".$acc['account_number'].
                              "</td><td>".$acc['customer_name'].
                              "</td><td>".$acc['current_balance'].
                         "</td></td>";
                }
                ?>
                </tbody>
            </table>
        </fieldset>
    </div>
<!--    ====================== Transfer Fund =======================-->
    <div class="half-width">
        <fieldset>
            <legend>TRANSFER FUND</legend>
            <form action="fund_transfer.php" method="post">
                <div class="form-group">
                    <label for="amount">Transfer (BDT)</label>
                    <input type="text" name="amount" id="amount" required class="form-control" placeholder="Enter Amount (BDT)">
                </div>
                <div class="form-group">
                    <label for="fromname">From</label>
                    <select name="from" id="fromname" required class="form-control">
                        <?php
                        foreach ($accounts as $acc){
                            echo "<option value={$acc['id']}>
[{$acc['account_number']}] {$acc['customer_name']}
</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="toname">To</label>
                    <select name="to" id="toname" required class="form-control">
                        <?php
                        foreach ($accounts as $acc){
                            echo "<option value={$acc['id']}>
[{$acc['account_number']}][{$acc['customer_name']}]
</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </fieldset>
    </div>

</div>
</body>
</html>
