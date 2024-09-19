<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoEv</title>
    <link rel="stylesheet" href="../../general/css/exercise.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Courier New', Courier, monospace;
        }

        th,
        td {
            border: 1px solid black;
            padding: 0.5em;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1><a href="https://docs.google.com/presentation/d/1fKX3738nR-xAuCfN0wMBGjBAelCBmDvK_3cID5YuGdg/edit#slide=id.gf2f439ce92_0_680">Autoevaluación 4.1.1 - foreach</a></h1>

    <div class="exercise_container">
        <h2>Ejercicio 1</h2>
        <p>Crea una página PHP que utilice foreach() para mostrar todos los valores del array $_SERVER en una tabla con dos columnas. La primera columna debe contener el nombre de la clave, y la segunda su valor.
        </p>
        <table>
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SERVER as $key => $value) {
                    if (is_array($value)) {
                        $value = implode(", ", $value);
                    }
                    echo "<tr><td>$key</td><td>$value</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script type="module" src="../../general/js/hovered.js"></script>
</body>

</html>