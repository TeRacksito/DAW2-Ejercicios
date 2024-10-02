<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoEv</title>
    <link rel="stylesheet" href="../../general/css/exercise.css">
</head>

<body>
    <h1><a href="https://docs.google.com/presentation/d/1fKX3738nR-xAuCfN0wMBGjBAelCBmDvK_3cID5YuGdg/edit#slide=id.gf2f439ce92_0_604">3. Funciones</a></h1>

    <div class="exercise_container">
        <p>Con la ayuda de las funciones que necesites, haz un programa que, dados dos número enteros positivos: inicio ($start) y final ($end), nos muestre todos los números impares existentes a partir de inicio, si no pasamos ningún valor final, final debe valer por defecto 10.
        </p>
        <ul><?php
            function showOdds($start, $end = 10) {
                $first_value = $start % 2 == 0 ? $start + 1 : $start;
                for ($i = $first_value; $i <= $end; $i+=2) {
                    echo "<li>$i</li>";
                }
            }

            showOdds(2, 20);

                ?></ul>
    </div>

    <script type="module" src="../../general/js/hovered.js"></script>
</body>

</html>