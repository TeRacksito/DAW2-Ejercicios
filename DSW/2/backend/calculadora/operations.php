<?php
$operations = [
  "sum" => function (int $a, int $b) {
    return $a + $b;
  },
  "sub" => function (int $a, int $b) {
    return $a - $b;
  },
  "mul" => function (int $a, int $b) {
    return $a * $b;
  },
  "div" => function (int $a, int $b) {
    if ($b == 0) {
      return "no se puede dividir por 0";
    }
    return $a / $b;
  }
];
?>