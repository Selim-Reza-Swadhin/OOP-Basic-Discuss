<?php


class User
{
    private $id = "";
    private $username = "";
    private $active = "";

    public function __construct($id, $username, $active)
    {
        $this->id = $id;
        $this->username = $username;
        $this->active = $active;
    }

    public function showUserInfo()
    {
        echo "ID: " . $this->id . "\n";
        echo "<br>";
        echo "Username: " . $this->username . "\n";
        echo "<br>";
        echo "Active Status: " . $this->active . "\n";
    }

}

/*$table_data = [
    ["1", "eather.ahmed@gmail.com", "1"],
    ["2", "admin@gmail.com", "1"]
];

foreach ($table_data as $td) {
    $id = $td[0];
    $name = $td[1];
    $active = $td[2];

    //create User object
    $users[] = new User($id, $name, $active);
}*/

//read table data and create object array
function readUserFromDatabase(&$users)
{
    $table_data = [
        ["1", "eather.ahmed@gmail.com", "1"],
        ["2", "admin@gmail.com", "1"]
    ];

    foreach ($table_data as $td) {
        $id = $td[0];
        $name = $td[1];
        $active = $td[2];

        //create User object
        $users[] = new User($id, $name, $active);
    }
}

//create empty array
$users = [];

//pass array as reference
readUserFromDatabase($users);
$i = 1;
foreach ($users as $u) {
    echo "\nUser # " . $i . ":\n";
    echo "<br>";
    $u->showUserInfo();
    echo "<br>";
    $i++;
}