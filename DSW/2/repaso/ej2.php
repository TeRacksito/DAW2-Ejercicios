<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios de Repaso</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css">
  <link rel="stylesheet" href="/ejercicios/general/css/form.css">
</head>

<body>
  <h1><a href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221736">Ejercicios de Repaso</a></h1>


  <div class="exercise_container">
    <h2>Ejercicio 2: Días entre dos fechas</h2>
    <p>Crea una función a la que se le pasan dos Strings que contienen dos fechas en formato ‘YYYY--mm-dd’ y te devuelve el número de días entre una y otra fecha.

      Crea una página web que tenga un formulario con dos entradas de calendario y que al enviar, se muestre en la misma o en otra página, la diferencia de días entre fechas haciendo uso de la función anterior.

      NOTA: puedes usar para calcular las diferencias entre dos objetos Date la siguiente función.
    </p>
    <pre>$diff = $date1->diff($date2);  // devuelve un objeto que contiene las diferencias.

$diff->days; // con days se obtiene el número de días de diferencia.
    </pre>
    <form action="ej2.php" method="get">
      <fieldset>
        <label for="date1">Fecha 1</label>
        <input type="date" name="date1" id="date1" required>
        <label for="date2">Fecha 2</label>
        <input type="date" name="date2" id="date2" required>
        <button type="submit">Calcular</button>
      </fieldset>
    </form>

    <?php
    if (isset($_GET["date1"]) && isset($_GET["date2"])) {
      $date1 = new DateTime($_GET["date1"]);
      $date2 = new DateTime($_GET["date2"]);
      $diff = $date1->diff($date2); ?>

      <p>La diferencia de días entre <?= $date1->format("d-m-Y") ?> y <?= $date2->format("d-m-Y") ?> es de <?= $diff->days; ?> días.</p>

    <?php } ?>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>