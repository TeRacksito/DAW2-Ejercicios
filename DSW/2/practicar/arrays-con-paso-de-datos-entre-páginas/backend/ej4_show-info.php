<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css">
</head>

<body>

  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221732">Ejercicios Arrays con paso de datos entre páginas</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 4</h2>
    <p>
      <?php
      if (!isset($_GET["country"]) || !isset($_GET["city"])) {
        echo "Faltan datos hermano";
      } else {
        printf ("Has seleccionado %s, que tiene la ciudad %s.", $_GET["country"], $_GET["city"]);
      }
      ?>
    </p>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>