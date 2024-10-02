<?php
function str2Date(string $str): DateTime {
    $dateArray = explode("-", $str);
    return new DateTime($dateArray[0] . "/" . $dateArray[1] . "/" . $dateArray[2]);
}

function diffDays(string $dateStr1, string $dateStr2): int {
    $date1 = str2Date($dateStr1);
    $date2 = str2Date($dateStr2);
    $diff = $date1->diff($date2);
    return $diff->days;
}

echo diffDays("2024-09-25", "2024-12-25");