<?php


interface MathInterface
{
    const MSG = "Math Interface";
    const PI = 3.1415;

    public function calculate();
}

echo  MathInterface::MSG . "<br>";
echo  MathInterface::PI;


//no override

//class SomeClass implements MathInterface{
//    const MSG = "Math Interface override";//error
//}

echo SomeClass::MSG;

