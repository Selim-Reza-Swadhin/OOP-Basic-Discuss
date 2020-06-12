<?php

//one interface extends
/*interface a
{
    public function a1();
}

interface x extends a
{
    public function x1();
}

class SomeClass implements x{
    public function a1()
    {
       echo "Implements SomeClass:: a1()<br>";
    }

    public function x1()
    {
       echo "Implements SomeClass:: x1()<br>";
    }
}

$obj = new SomeClass();
$obj->a1();
$obj->x1();*/



//many interface extends
interface a
{
    public function a1();
}

interface b{
    public function b1();
}

interface x extends a,b{
    public function x1();
}

class SomeClass implements x{
    public function a1(){//method from interface a
        echo "many extends of Implements SomeClass:: a1()<br>";
    }

    public function b1(){//method from interface b
        echo "many extends of Implements SomeClass:: a1()<br>";
    }

    public function x1(){//method from interface x
        echo "many extends of Implements SomeClass:: x1()<br>";
    }
}

$o = new SomeClass();
$o->a1();
$o->b1();
$o->x1();