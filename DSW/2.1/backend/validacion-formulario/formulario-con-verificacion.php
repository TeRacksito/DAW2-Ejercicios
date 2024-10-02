<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Autoevaluación</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css" />
</head>

<body>
  <h1>
    <a
      href="https://docs.google.com/presentation/d/1fKX3738nR-xAuCfN0wMBGjBAelCBmDvK_3cID5YuGdg/edit#slide=id.gf2f439ce92_0_792">Validación de formulario</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>


    <p>
      <?php
      foreach ($_POST as $var) {
        if (empty($var)) {
          echo "No has rellenado todos los campos";
          return;
        }
      }

      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "El email no es válido";
        return;
      }

      if (!is_numeric($_POST['age']) || $_POST['age'] < 0 || $_POST['age'] > 125) {
        echo "La edad no es válida";
        return;
      }

      echo "Formulario enviado correctamente";
      printf ("<br>Nombre: %s", $_POST['name']);
      printf ("<br>Apellidos: %s", $_POST['surname']);
      printf ("<br>Email: %s", $_POST['email']);
      printf ("<br>Edad: %s", $_POST['age']);
      printf ("<br>Matriculación:");
      foreach ($_POST['modules'] as $module) {
        printf ("<br>%s - %s",str_repeat("&nbsp", 8), $module);
      }

      ?>

    </p>

  </div>
  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>