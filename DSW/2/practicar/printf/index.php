<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Practicar</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css">
</head>

<body>
  <h1><a href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7382655">Ejercicios para practicar (printf)</a></h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <p>
      Escribe un script que imprima un número PI con dos decimales utilizando printf.
    </p>
    <pre><?php
          $a = "hola";
          printf("%.2f es PI, creeme", M_PI);
          ?></pre>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 2</h2>
    <p>
      Crea un script que utilice sprintf para formatear una cadena con una variable nombre y una edad anteriormente inicializadas, y luego imprima la cadena resultante.
    </p>
    <pre><?php
          $nombre = "Angel";
          $edad = 20;
          printf("Hola %s, tienes %d años", $nombre, $edad);
          ?></pre>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 3</h2>
    <pre>Escribe un script que utilice printf para alinear tres líneas de texto, cada una correspondiente a una variable, a la derecha en un espacio de 20 caracteres. Por ejemplo para las palabras "Javascript", "PHP", "Java", debe quedar:

                    Javascript
                          PHP
                          Java
    </pre>
    <pre><?php
          $languages = array("JavaScript", "PHP", "Java");
          printf("%30s<br>%30s<br>%30s", $languages[0], $languages[1], $languages[2]);
          ?></pre>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 4</h2>
    <p>Crea un script que utilice sprintf para formatear una fecha en el formato DD/MM/YYYY a partir de 3 variables para el día, mes y año.
    </p>
    <pre><?php
          $day = 5;
          $month = 3;
          $year = 2020;
          $date = sprintf("%02d/%02d/%04d", $day, $month, $year);
          echo $date;
          ?></pre>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 5</h2>
    <p>Escribe un script que convierta un número decimal a binario utilizando printf.
    </p>
    <pre><?php
          printf("El número %d en binario es %b", 10, 10);
          ?></pre>
  </div>

  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>