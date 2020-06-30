<?php
//without ampersand & symbol
$counter = 100;

//change the counter
$closure = function () use ($counter) {
  $counter++;//not use
};

//call the anonymous function
$closure();

//check the counter
echo 'Without ampersand & symbol => '.$counter.'<br>';



//with ampersand & symbol
$counter = 100;

//change the counter
$closure = function () use (&$counter) {
  $counter++;//use
};

//call the anonymous function
$closure();

//check the counter
echo 'With ampersand & symbol => '.$counter;
