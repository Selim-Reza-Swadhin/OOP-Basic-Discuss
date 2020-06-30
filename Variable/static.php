<?php
printCount();
printCount();
printCount();

function printCount(){
    $count = 0;
    $count++;
    echo 'Normal variable and function => '.$count. '<br/>';
}
echo '<hr>';

//static variable
printCounts();
printCounts();
printCounts();

function printCounts(){
   static $count = 0;
    $count++;
    echo 'static variable and function => '.$count. '<br/>';
}
