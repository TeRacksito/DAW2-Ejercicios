<?php

require_once "timestamp.php";


$files = array_filter(scandir("data"), function ($file) {
  return $file !== "." && $file !== ".." && strpos($file, ".csv") == strlen($file) - 4;
});

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ejercicios Practicar</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/table.css" />
</head>

<body>
  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/pluginfile.php/10712942/mod_resource/content/0/Valoraci%C3%B3n%20r%C3%A1pida.pdf">Valoración rápida</a>
  </h1>

  <div class="exercise_container">
    <h2>Valoraciones</h2>

    <table> 
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Número de valoraciones</th>
          <th>Media</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($files as $filename) {
          $file = fopen("data/$filename", "r");
          $timestamp = explode("_", explode(".", $filename)[0]);

          $day = sprintf("%s/%s/%s", $timestamp[0], $timestamp[1], $timestamp[2]);
          $hour = sprintf("%s:%s", $timestamp[3], $timestamp[4]);

          $valoraciones = fgets($file);
          fclose($file);

          $valoraciones = array_map(function ($valoration) {
            return (int) trim($valoration);
          }, array_filter(explode(";", $valoraciones), function ($valoration) {
            return !empty($valoration);
          }));
          
          $media = array_sum($valoraciones) / count($valoraciones); ?>

          <tr>
            <td><?= $day ?></td>
            <td><?= $hour ?></td>
            <td><?= count($valoraciones) ?></td>
            <td><?= $media ?></td>
          </tr>
          
        <?php } ?>
      </tbody>
    </table>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>