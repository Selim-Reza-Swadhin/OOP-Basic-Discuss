<?php
function add(int $a, int $b) : int //return data type
{
    return $a + $b; //will cast as int type
}

//add(10, 18);
var_dump(add(10, 18));

echo '<br>';

function adda(int $a, int $b) : float //return data type
{
    return $a + $b; //will cast as int type
}

//adda(10, 18);
var_dump(adda(10, 18));

echo '<br>';

function ascending(int $a, int $b) : array //return data type
{
    if ($a > $b){
        return [$a, $b]; //will cast as int type
    }else{
        return [$a, $b]; //will cast as int type
    }
}

//ascending(10, 18);
var_dump(ascending(10, 18));
