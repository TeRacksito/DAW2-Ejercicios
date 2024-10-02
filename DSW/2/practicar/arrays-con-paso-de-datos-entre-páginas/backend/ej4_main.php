<?php
require_once "datos_cities.php";
?>

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
      if (!isset($_GET["country"])) {
        echo "No has seleccionado ninguna ciudad";
      } else {
        printf("La ciudad %s tiene estas provincias:", $_GET["country"]);
      ?>
    </p>
    <form action="ej4_show-info.php">
      <fieldset>
      <?php
        foreach ($countries[$_GET["country"]] as $city) {
          echo "<div class=\"inline\"><input type='radio' name='city' value='$city' id='$city'><label for='$city'>$city</label></div>";
        }
      } ?>
      <input type="hidden" name="country" value="<?= $_GET["country"] ?>">
      <button type="submit">Enviar</button>
      </fieldset>
    </form>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>