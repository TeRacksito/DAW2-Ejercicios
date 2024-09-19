<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Practicar</title>
    <link rel="stylesheet" href="../../general/css/exercise.css">
</head>

<body>
    <h1><a href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7382655">Ejercicios para practicar (printf)</a></h1>


    <div class="exercise_container">
        <h2>Ejercicio 1</h2>
        <p>Crea un array con las frutas: manzana, plátano, kiwi.</p>
        <pre><?php
                $fruits = ["manzana", "plátano", "kiwi"];
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 2</h2>
        <p>Muestra por pantalla el contenido.</p>
        <pre><?php
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 3</h2>
        <p>Muestra la cantidad de elementos que contiene.</p>
        <pre><?php
                echo count($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 4</h2>
        <p>Inserta al final del array la fruta naranja.</p>
        <pre><?php
                $fruits[] = "naranja";
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 5</h2>
        <p>Realiza una copia del array (frutasCopia).</p>
        <pre><?php
                $fruitsCopy = $fruits;
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 6</h2>
        <p>Inserta al principio del array frutasCopia la fruta sandía.</p>
        <pre><?php
                array_unshift($fruitsCopy, "sandía");
                print_r($fruitsCopy);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 7</h2>
        <p>¿Se modifica el array frutas?</p>
        <pre><?php
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 8</h2>
        <p>Busca la fruta papaya en el frutas e indica si está.</p>
        <pre><?php
                echo in_array("papaya", $fruits) ? "Está" : "No está";
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 9</h2>
        <p>Añade la fruta papaya.</p>
        <pre><?php
                $fruits[] = "papaya";
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 10</h2>
        <p>Busca la posición en el array de la fruta manzana.</p>
        <pre><?php
                echo array_search("manzana", $fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 11</h2>
        <p>Extrae la manzana del array.</p>
        <pre><?php
                $index = array_search("manzana", $fruits);
                unset($fruits[$index]);
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 12</h2>
        <p>Inserta manzana en la posición 2.</p>
        <pre><?php
                array_splice($fruits, 2, 0, "manzana");
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 13</h2>
        <p>Ordena en orden alfabético frutas y muestra en pantalla.</p>
        <pre><?php
                sort($fruits);
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 14</h2>
        <p>Invierte el orden del array.</p>
        <pre><?php
                array_reverse($fruits);
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 15</h2>
        <p>Obtén una fruta de forma aleatoria.</p>
        <pre><?php
                echo $fruits[array_rand($fruits)];
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 16</h2>
        <p>Ordena de forma aleatoria todas las frutas</p>
        <pre><?php
                shuffle($fruits);
                print_r($fruits);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 17</h2>
        <p>Crea un array de verduras con varias verduras a tu elección.</p>
        <pre><?php
                $vegetables = ["tomate", "lechuga", "pepino"];
                print_r($vegetables);
                ?></pre>
    </div>

    <div class="exercise_container">
        <h2>Ejercicio 18</h2>
        <p>Une el array de frutas y verduras en un único array llamado vegetales.</p>
        <pre><?php
                $all = array_merge($fruits, $vegetables);
                print_r($all);
                ?></pre>
    </div>
    

    <footer id="end_page_separator"></footer>
    <script type="module" src="../../general/js/hovered.js"></script>
</body>

</html>