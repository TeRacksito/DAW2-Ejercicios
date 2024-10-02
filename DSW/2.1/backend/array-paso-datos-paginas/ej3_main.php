<?php
require_once "datos_provincias.php";
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
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221732">Ejercicios Arrays con paso de datos entre páginas</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 3</h2>
    <p>
      <?php
      if (!isset($_GET["province"])) {
        echo "No has seleccionado ninguna provincia";
      } else {
        echo "Has seleccionado las provincias:";
      ?>
    </p>
    <ul>
      <?php
        foreach ($_GET["province"] as $province) {
          echo "<li>$province</li>";
        }
      }
      ?>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>