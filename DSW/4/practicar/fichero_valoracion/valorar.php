<?php

require_once "timestamp.php";

function checkValoration($valoration)
{
    return $valoration >= 0 && $valoration <= 10;
}


if (empty($_REQUEST["valoration"]) || !checkValoration($_REQUEST["valoration"])) {
    header("Location: index.html");
    exit;
}

$valoracion = $_REQUEST["valoration"];


$file = fopen(sprintf("data/%s.csv", getTimestamp()), "a");
fwrite($file, sprintf("%s;", $valoracion));
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
        href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/pluginfile.php/10712942/mod_resource/content/0/Valoraci%C3%B3n%20r%C3%A1pida.pdf"
        >Valoración rápida</a
      >
    </h1>

    <div class="exercise_container">
      <h2>¡Gracias por tu valoración!</h2>
    </div>

    <footer id="end_page_separator"></footer>
    <script type="module" src="/ejercicios/general/js/hovered.js"></script>
  </body>
</html>
