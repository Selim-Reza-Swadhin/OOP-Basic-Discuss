<?php
$login_id = $_POST['username'];
$login_pwd = $_POST['password'];

//call the function
login($login_id, $login_pwd);

//function definition
function login($login_id, $login_pwd)
{

    $con = new mysqli('localhost', 'root', '', 'niton');

    if ($con->connect_errno) {
        printf("Connection failed : %s<br>",
            $con->connect_error);
        exit();
    }

    //build the query
    $sql = "select * from users where username = ? and password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $login_id, $login_pwd);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Sorry, Invalid Username or Password";
        echo "<br/>";
        exit('No rows');
    }
    echo "<table border='1'><tr>";
    echo "<th>Login ID</th>";
    echo "<th>User Status</th>";
    echo "<th>Registration Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['user_status'] . "</td>";
        echo "<td>" . date('j-F-y, g:i a', strtotime($row['created'])) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    $stmt->close();

    $con->close();

}

?>
