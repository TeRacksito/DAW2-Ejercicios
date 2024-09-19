<?php

function isPrimeSQRT($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function isPrimeReadArray($number, &$primes)
{
    foreach ($primes as $prime) {
        if ($number % $prime == 0) {
            return false;
        }
    }
    return true;
}

function getPrimes($method, $start, $amount = 10)
{
    $primes = [];
    $i = $start;
    while (count($primes) < $amount) {
        if ($method($i, $primes)) {
            $primes[] = $i;
        }
        $i++;
    }
    return $primes;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoEv</title>
    <link rel="stylesheet" href="../../general/css/exercise.css">
    <style>
        .twoCols {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <h1><a href="https://docs.google.com/presentation/d/1fKX3738nR-xAuCfN0wMBGjBAelCBmDvK_3cID5YuGdg/edit#slide=id.gf2f439ce92_0_680">3. Funciones</a></h1>

    <div class="exercise_container">
        <p>Con la ayuda de las funciones que necesites, haz un programa que, dados dos número enteros positivos: inicio ($start) y cantidad ($amount), almacene en un array tantos números primos como indique el valor de cantidad a partir de inicio. Si no se pasa una cantidad, el valor por defecto debe ser 10.
            Una vez almacenados los números primos, recorrer el array para mostrar los números por pantalla haciendo uso de foreach.
        </p>
        <div>
        <?php
            $start = 2;
            $amount = 500;
            $start_time = microtime(true);
            $primes_sqrt = getPrimes('isPrimeSQRT', $start, $amount);
            $end_time = microtime(true);
            $time_sqrt = $end_time - $start_time;
            $start_time = microtime(true);
            $primes_readArray = getPrimes('isPrimeReadArray', $start, $amount);
            $end_time = microtime(true);
            $time_read_array = $end_time - $start_time;

            echo "<pre>El tiempo de ejecución de isPrimeSQRT es de $time_sqrt segundos</pre>";
            echo "<pre>El tiempo de ejecución de isPrimeReadArray es de $time_read_array segundos</pre>";
            echo "<pre>Hay una diferencia de " . ($time_read_array - $time_sqrt) . " segundos entre ambos métodos</pre>";
            echo "<pre>Es " . ($time_read_array / $time_sqrt) . " veces más rápido isPrimeSQRT que isPrimeReadArray</pre>";
            
            ?>
        </div>
        <div class="twoCols">
            <ul>
                <?php
                foreach ($primes_sqrt as $prime) {
                    echo "<li>$prime</li>";
                }
                ?>
            </ul>
            <ul>
                <?php
                foreach ($primes_readArray as $prime) {
                    echo "<li>$prime</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <script type="module" src="../../general/js/hovered.js"></script>
</body>

</html>