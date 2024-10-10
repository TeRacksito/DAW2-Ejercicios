<?php

/**
 * Removes or appends the given number depending if it already exists on the given array.
 * @param array $array an array of numeric values.
 * @param int $number an numeric value to be removed or added from the array. If it exists in the array, it'll be removed, added otherwise.
 * @return array the array having the given value removed or added.
 */
function array_toggle_number(array $array, int $number): array
{
    $index = array_search($number, $array);

    if ($index) {
        array_splice($array, $index, 1);
        return $array;
    }

    $array[] = $number;
    return $array;
}

print_r(array_toggle_number([1, 2, 3, 4, 5], 3));
print_r(array_toggle_number([1, 2, 4, 5], 3));
