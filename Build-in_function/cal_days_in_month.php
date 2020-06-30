<?php

$year = 2020;
for ($month = 1; $month <= 12; $month++){
    //display month name
    $monthName = date('F', strtotime($year. '-' . $month. '-01'));

    echo "<div>$monthName : ";

    //get days in given month
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    //display days
    for ($i = 1; $i <= $days; $i++){
        echo " $i".", ";
    }

    //final div
    echo '<div>';

}
