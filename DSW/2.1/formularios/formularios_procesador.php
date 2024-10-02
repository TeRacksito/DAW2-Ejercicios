<?php
require_once("subjectData.php");
require_once("companiesData.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formularios</title>
  <link rel="stylesheet" href="../../../general/css/exercise.css" />
</head>

<body>

  <h1>
    Formularios PHP
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <p>La información recibida: </p>
    <p>Nombre: <?php echo $_POST["name"]; ?></p>
    <p>Edad: <?php echo $_POST["age"]; ?></p>
    <p>Afición: <?php echo $_POST["hobby"]; ?></p>
    <p>Matriculado: <?php echo isset($_POST["course"]) ? "Sí" : "No"; ?></p>
    <p>Preferencia: <?php echo $_POST["side"]; ?></p>
    <p>Asignaturas: <?php echo $subjects[$_POST["subject"]]; ?></p>
    <p>Empresas:
      <?php
      $companiesNames = array_map(function ($index) use ($companies) {
        if ($companies[$index] === "Microsoft") {
          return $companies[$index] . " (no te lo crees ni tu)";
        }
        return $companies[$index];
      }, $_POST["companies"]);
      echo join(", ", $companiesNames);
      ?></p>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="../../../general/js/hovered.js"></script>
</body>

</html>