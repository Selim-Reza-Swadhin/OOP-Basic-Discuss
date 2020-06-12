<?php


class Consultant
{
    private $name = "";
    private $role = "";

    public function __construct($name, $role)
    {
        $this->name = $name;
        $this->role = $role;
    }

    public function showRoles()
    {
        echo "Name: " . $this->name . "\n";
        echo "<br>";
        echo "Role: " . $this->role;
    }

}

$data = [];//declare array

$r1 = new Consultant("Elahi", "Enterprise Architect");
$data[] = $r1; //add to array

$r2 = new Consultant("Hasan", "Product Architect");
$data[] = $r2; //add to array

$r3 = new Consultant("Hafij", "System Architect");
$data[] = $r3; //add to array

$i = 1;
foreach ($data as $d1){
    echo "\nRole # " . $i . ":\n";
    echo "<br>";
    $d1->showRoles();
    echo "<br>";
    $i++;
}