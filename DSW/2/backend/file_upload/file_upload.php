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
      href="https://docs.google.com/presentation/d/1fKX3738nR-xAuCfN0wMBGjBAelCBmDvK_3cID5YuGdg/edit#slide=id.gf2f439ce92_0_825">Subiendo archivos al servidor</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <p>
      Veamos un ejercicio resuelto donde detallamos el proceso de subir un
      archivo, controlaremos el tamaño máximo del archivo (ve cambiando los
      valores de MAX_FILE_SIZE para probar los errores) y el tipo. Crearemos
      un formulario con un input de tipo file para subir un documento PDF a
      una carpeta, uploads, en el servidor. Comprueba los errores, el tamaño
      máximo del archivo será de 50000 bytes.
    </p>
    <pre><?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
        $fileName = $_FILES['fileToUpload']['name'];
        $fileType = $_FILES['fileToUpload']['type'];
        $fileContent = file_get_contents($_FILES['fileToUpload']['tmp_name']);

        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '/var/www/html/ejercicios/DSW/2.1/file_uploads/' . $fileName);

        echo "File Name: " . htmlspecialchars($fileName) . "<br>";
        echo "File Type: " . htmlspecialchars($fileType) . "<br>";
        echo "File tmp_name: " . htmlspecialchars($_FILES['fileToUpload']['tmp_name']) . "<br>";
        echo "File Content: " . ($fileContent);
      }
      ?></pre>
  </div>
  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>