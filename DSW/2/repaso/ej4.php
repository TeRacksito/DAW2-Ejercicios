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
    <h2>Ejercicio 3: Buscar palabras en un texto</h2>
    <p>Crea un formulario que tenga un área de texto para introducir un texto y un campo de texto para introducir una serie de palabras a buscar dentro del texto. Estas palabras podrán ser una o más y estarán separadas entre ellas por un espacio.

      El formulario te debe mostrar el texto y un listado con las palabras a buscar donde para cada palabra se indicará a continuación el texto “Está” o “No está”.

      NOTA: Busca funciones de String en PHP. Hay funciones de búsqueda y también para crear un array con trozos a partir de un delimitador.
    </p>
    <form action="ej3.php" method="post">
      <fieldset>
        <label for="text">Texto</label>
        <textarea name="text" id="text" cols="30" rows="10" required></textarea>
        <label for="words">Palabras a buscar</label>
        <input type="text" name="words" id="words" required>
        <button type="submit">Buscar</button>
      </fieldset>
    </form>

    <?php if (isset($_POST["text"]) && isset($_POST["words"])) {
      $text = $_POST["text"];
      $words = explode(" ", $_POST["words"]); ?>
      <p>Texto: <?= $text ?></p>
      <ul>
        <?php foreach ($words as $word) {
          if (strpos($text, $word) !== false) {
            echo "<li>'$word' está</li>";
          } else {
            echo "<li>'$word' no está</li>";
          }
        } ?>
      </ul>
    <?php } ?>


  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>