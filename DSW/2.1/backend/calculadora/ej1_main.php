<?php
require_once "operations.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
</head>

<body>

  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221738">Calculadora</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1 Calculadora simple</h2>
    <p>
      <?php
      if (!isset($_GET["a"]) || !isset($_GET["b"]) || !isset($_GET["op"])) {
        echo "Faltan parámetros";
        return;
      }
      if (!is_numeric($_GET["a"]) || !is_numeric($_GET["b"])) {
        echo "Los parámetros deben ser numéricos";
        return;
      }
      if (!array_key_exists($_GET["op"], $operations)) {
        echo "Operación no válida";
        return;
      }
      $a = (int) $_GET["a"];
      $b = (int) $_GET["b"];
      printf("%s %s %s es %s", $a, $_GET["op"], $b, $operations[$_GET["op"]]($a, $b)) ?>
    </p>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>