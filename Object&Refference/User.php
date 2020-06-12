<?php


class User
{
private $name = "";

public function __construct($name)
{
    $this->name = $name;
}

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function showName()
    {
       echo "Name: " . $this->name ."\n";
    }

}

$u1 = new User("Rustom");//create new object
$u2 = $u1;//assign to another variable
$u1->setName("Sohrab");//set value for $u1
$u1 = NULL;//null to $u1
$u2->showName();//$u2 still holding the object

//& Refference

$u3 = new User("Hatim");
$u4 = &$u3;//not copy. just alias
$u4->showName();
$u3->setName("Sindbad");
$u3 = NULL;
$u4->showName();//Fatal Error: $u4 is NULL now