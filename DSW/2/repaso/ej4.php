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
    <h2>Ejercicio 4: Subir un fichero</h2>
    <p>Crea un formulario que permita enviar un fichero al servidor.

      Mostrar todos los datos referentes al fichero subido.

      Comprobar si es de tipo texto (o html) o cualquier otro tipo.

      Crear dos carpetas dentro de la carpeta donde está el php llamadas “text” y “bin” con los permisos de escritura necesarios.

      Si el archivo es de texto se debe almacenar en la carpeta “text” y si no en la carpeta “bin”.

      Si el archivo es de tipo texto (o html), incluir el contenido en la página.
    </p>
    <form action="ej4.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <input type="file" name="file" id="fileToUpload" style="display: none;" required>
        <div id="dropZone" class="drop-zone">
          Arrastra un archivo aquí o haz clic para seleccionar uno
        </div>
        <button type="submit">Enviar</button>
      </fieldset>
    </form>

    <?php
    if (isset($_FILES["file"])) {
      $file = $_FILES["file"];
      $fileName = $file["name"];
      $fileType = $file["type"];
      $fileSize = $file["size"];
      $fileTmpName = $file["tmp_name"];
      $fileError = $file["error"];

      $textFolder = "text";
      $binFolder = "bin";

      if ($fileError === 0) {
        if (strpos($fileType, "text") !== false) {
          $folder = $textFolder;
          $fileContent = htmlspecialchars(file_get_contents($fileTmpName), ENT_QUOTES, 'UTF-8');
        } else {
          $folder = $binFolder;
        }

        $filePath = $folder . "/" . $fileName;
        move_uploaded_file($fileTmpName, $filePath);
        chmod($filePath, 0644);

        echo "<p>Nombre: $fileName</p>";
        echo "<p>Tipo: $fileType</p>";
        echo "<p>Tamaño: $fileSize bytes</p>";
        echo "<p>Archivo guardado en: $filePath</p>";

        if (isset($fileContent)) {
          echo "<p>Contenido:</p>";
          echo "<pre>$fileContent</pre>";
        }
      } else {
        echo "<p>Error al subir el archivo</p>";
      }
    } ?>

    <script>
      const dropZone = document.getElementById("dropZone");
      const fileInput = document.getElementById("fileToUpload");

      dropZone.addEventListener("click", () => {
        fileInput.click();
      });

      dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZone.style.borderColor = "#000";
      });

      dropZone.addEventListener("dragleave", () => {
        dropZone.style.borderColor = "#ccc";
      });

      dropZone.addEventListener("drop", (e) => {
        e.preventDefault();
        dropZone.style.borderColor = "#ccc";
        fileInput.files = e.dataTransfer.files;
        if (fileInput.files.length > 0) {
          dropZone.textContent = fileInput.files[0].name;
        }
      });

      fileInput.addEventListener("change", () => {
        if (fileInput.files.length > 0) {
          dropZone.textContent = fileInput.files[0].name;
        }
      });
    </script>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>