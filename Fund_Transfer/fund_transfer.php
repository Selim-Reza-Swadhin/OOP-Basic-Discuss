<?php
$mysqli = new mysqli('localhost', 'root', '', 'mpms');
if ($mysqli->connect_error) {
    printf("Connect failed: %s<br>",
        $mysqli->connect_error);
    exit();
}
//turn off auto-commit
$mysqli->autocommit(false);

//look for a transfer
if (is_numeric($_POST['amount'])) {
    $_POST['amount'] = doubleval($_POST['amount']);
    $_POST['from'] = intval($_POST['from']);
    $_POST['to'] = intval($_POST['to']);
    $date = date("Y-m-d H:i:s");

    //update receiver account
    $sql = "UPDATE account_info
    SET current_balance = current_balance + ?
    WHERE id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("di", $_POST['amount'], $_POST['to']);
    $result = $statement->execute();

    if ($result !== true) {
        echo $statement->error;
        $mysqli->rollback(); //if error, roll back transaction
    }

    //update sender account
    $sql = "UPDATE account_info
            SET current_balance = current_balance - ?
            WHERE id = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("di", $_POST['amount'], $_POST['from']);
    $result = $statement->execute();

    if ($result !== true) {
        echo $statement->error;
        $mysqli->rollback(); //if error, roll back transaction
    }

    //insert credit ledger for sender account
    $sql = "INSERT INTO account_ledger(account_id, trnx_date, particulars, debit, credit) VALUES (?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($sql);
    $particulars = "Fund Transfer to {$_POST['to']}";
    $debit = 0.00;
    $statement->bind_param("issdd", $_POST['from'], $date, $particulars, $debit, $_POST['amount']);
    $result = $statement->execute();

    if ($result !== true) {
        echo $statement->error;
        $mysqli->rollback(); //if error, roll back transaction
    }

    //insert debit ledger for sender account
    $sql = "INSERT INTO account_ledger(account_id, trnx_date, particulars, debit, credit) VALUES (?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($sql);
    $particulars = "Fund Transfer to {$_POST['from']}";
    $credit = 0.00;
    $statement->bind_param("issdd", $_POST['to'], $date, $particulars, $_POST['amount'], $credit);
    $result = $statement->execute();

    if ($result !== true) {
        echo $statement->error;
        $mysqli->rollback(); //if error, roll back transaction
    }

    //assuming no errors, commit transaction
    $mysqli->commit();
}

//get account balances, save in array and generate form
$sql = "SELECT * FROM account_info ORDER BY id DESC";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    $accounts[] = $row;
}

//get account details, save in array and generate form
$sql = "SELECT * FROM account_ledger ORDER BY id DESC";
$result = $mysqli->query($sql);
while ($rows = $result->fetch_assoc()) {
    $accountDetails[] = $rows;
}
//close connection
$mysqli->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <style>
        .half-width {
            display: inline-table;
            margin: 10px;
            min-width: 40%;
        }

        fieldset {
            padding: 10px;
            min-height: 150px;
        }

        .text-center {
            text-align: center;
        }

        label {
            font-size: 12pt;
            display: block;
        }

        .btn {
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-danger {
            background-color: #ff6500;
            color: #fff;
            font-weight: bold;
            float: bottom;
        }

        th, td {
            padding: 10px;
        }

        a {
            text-decoration: none;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="half-width">
    <fieldset>
        <legend>UPDATED ACCOUNT BALANCES</legend>
        <table border="1" cellspacing="0">
            <thead>
            <tr>
                <td class="text-center">Account Number</td>
                <td class="text-center">Customer Name</td>
                <td class="text-center">Balance</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($accounts as $acc) {
                echo "<tr><td>" . $acc['account_number'] .
                    "</td><td>" . $acc['customer_name'] .
                    "</td><td>" . $acc['current_balance'] .
                    "</td></td>";
            }
            ?>
            </tbody>
        </table>
<!--        <a href="index.php" class="btn btn-danger">Back to Main</a>-->
    </fieldset>
</div>

<div class="half-width">
    <fieldset>
        <a href="index.php" class="btn btn-danger">Back to Main</a>
        <legend>UPDATED ACCOUNT DETAILS</legend>
        <table border="1" cellspacing="0">
            <thead>
            <tr>
                <td class="text-center">Transfer Date</td>
                <td class="text-center">Particulars</td>
                <td class="text-center">Debit</td>
                <td class="text-center">Credit</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($accountDetails as $details) {
                echo "<tr><td>" . date("d-m-Y g:i:s:a", strtotime($details['trnx_date'])) .
                    "</td><td>" . $details['particulars'] .
                    "</td><td>" . $details['debit'] .
                    "</td><td>" . $details['credit'] .
                    "</td></td>";
            }
            ?>
            </tbody>
        </table>
    </fieldset>
</div>
</body>
</html>
