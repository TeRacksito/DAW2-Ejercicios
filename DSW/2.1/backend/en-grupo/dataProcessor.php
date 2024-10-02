<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>En grupo</title>
    <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />

    <style>
      pre {
        padding: 10px;
        border: 1px solid black;
        border-radius: 5px;
      }
    </style>
  </head>

  <body>
    <h1>
      <a href="">Ejercicio en grupo</a>
    </h1>

    <div class="exercise_container">
      <h2>Ejercicio 1</h2>
      <p></p>
      <?php
        foreach ($_POST as $var) {
          if (empty($var)) {
            echo "No has rellenado todos los campos";
            return;
          }
        }

        if (!preg_match('/^#[a-f0-9]{6}$/i', $_POST['color'])) {
          echo "El color ingresado no es válido";
          return;
        }

        if (!is_numeric($_POST['font-size']) || $_POST['font-size'] < 8 || $_POST['font-size'] > 64) {
          echo "El tamaño ingresado no es válido";
          return;
        }

        if (move_uploaded_file($_FILES['page']['tmp_name'], '/var/www/html/ejercicios/DSW/2.1/backend/en-grupo/uploads/' . $_FILES['page']['name'])) {
          include ('/var/www/html/ejercicios/DSW/2.1/backend/en-grupo/dataProcessor.php');
        }
      ?>
      <pre style="color: <?php echo $_POST['color']; ?>; font-size: <?php echo $_POST['font-size']; ?>px; "><?php echo $_POST['text']; ?>
      </pre>
    </div>

    <footer id="end_page_separator"></footer>
    <script type="module" src="/ejercicios/general/js/hovered.js"></script>
  </body>
</html>
