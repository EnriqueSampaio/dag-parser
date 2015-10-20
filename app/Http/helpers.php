<?php

namespace App\Http\Helpers;

function custom_date_format($date)
{
    $year = substr($date, 6);
    $month = substr($date, 3,-5);
    $day = substr($date, 0,-8);
    return $year."-".$month."-".$day;
}
