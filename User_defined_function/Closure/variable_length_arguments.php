<?php
echo 'with 3 dot'.'<br>';

quiz_average("Selim", "MAT101", 92, 97, 87);
quiz_average("Selim", "MAT101", 92, 97, 87, 96, 66);


function quiz_average(string $name, string $course, int ...$quiz_score){
    var_dump($name);
    var_dump($course);
    var_dump($quiz_score);
}

//without 3 dot
echo '<hr>';
echo 'without 3 dot'.'<br>';
quiz3_average("Selim", "MAT101", 92, 97, 87);
quiz3_average("Selim", "MAT101", 92, 97, 87, 96, 66);

function quiz3_average(){
    $args_count = func_num_args();
    $args_item = func_get_arg(1);
    $args = func_get_args();

    echo "Total arguments : $args_count \n";
    var_dump($args_item);
    var_dump($args);
}

//without 3 dot
echo '<hr>';
echo 'without 3 dot'.'<br>';
quiz4_average("Selim", "MAT101", 92, 97, 87, 96, 66);

function quiz4_average(string $name, string $course){
    var_dump($name);
    var_dump($course);
    $args = func_get_args();

    var_dump($args);
}
