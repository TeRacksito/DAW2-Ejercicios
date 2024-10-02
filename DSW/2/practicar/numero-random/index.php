<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Practicar</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css">
</head>

<body>
  <h1><a href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221727">Ejercicios para practicar (número aleatorio - condicional)
    </a></h1>


  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <pre>Sabiendo que la función RAND nos retorna un valor aleatorio entre un rango de dos enteros:

$num = rand(1,100);

En la variable $num se almacena un valor entero que la computadora genera en forma aleatoria entre 1 y 100. 

Hacer un programa que lo muestre por pantalla al valor generado. Mostrar además si es menor o igual a 50 o si es mayor. 

El numero aleatorio se debe mostrar en un encabezado 1. Y si es mayor o menor o igual que 50 en un encabezado 2.

También modifica el encabezado 1 para que se vea en color rojo si es menor o igual que 50 o verde si es mayor.
        </pre>
    <p>El valor aleatorio es
      <?php
      $num = rand(1, 100);
      echo "<h1 style='color: " . ($num <= 50 ? "red" : "green") . "'>$num</h1>";
      echo "<h2>" . ($num <= 50 ? "Es menor o igual que 50" : "Es mayor que 50") . "</h2>";
      ?>
    </p>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>