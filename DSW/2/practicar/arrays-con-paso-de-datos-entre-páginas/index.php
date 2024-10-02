<?php
require_once "backend/array-paso-datos-paginas/datos_provincias.php";
require_once "backend/array-paso-datos-paginas/datos_cities.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ejercicios Practicar</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css" />
</head>

<body>
  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221732">Ejercicios Arrays con paso de datos entre páginas</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <p>
      Crea un formulario que permita elegir una provincia española mediante un select.

      Las provincias se deben leer de un archivo aparte llamado datos_provincias.php que contendrá el array:
    </p>
    <form action="backend/array-paso-datos-paginas/ej1&2_main.php">
      <fieldset>
        <select name="province" id="provinces">
          <?php
          foreach ($provinces as $province) {
            echo "<option value='$province'>$province</option>";
          }
          ?>
        </select>
        <button type="submit">Enviar</button>
      </fieldset>
    </form>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 2</h2>
    <p>
      Crea un formulario similar al del ejercicio 1 que permita elegir una provincia española
      mediante un botones radio y se envíe a la misma página PHP anterior,
      el cuál debería también de mostrar correctamente la provincia seleccionada.
    </p>
    <form action="backend/array-paso-datos-paginas/ej1&2_main.php">
      <fieldset>
        <?php
        foreach ($provinces as $province) {
          echo "<div class=\"inline\"><input type='radio' name='province' value='$province' id='$province'><label for='$province'>$province</label></div>";
        } ?>
        <button type="submit">Enviar</button>
      </fieldset>
    </form>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 3</h2>
    <p>
      Crea un formulario similar al del ejercicio 2 que permita elegir
      una o varias provincias españolas mediante checkbox y se envíe a otra
      página PHP que debe mostrar todas las provincias seleccionadas en formato
      de lista, o bien mostrar un mensaje de que no se ha seleccionado ninguna.
    </p>
    <form action="backend/array-paso-datos-paginas/ej3_main.php">
      <fieldset>
        <?php
        foreach ($provinces as $province) {
          echo "<div class=\"inline\"><input type='checkbox' name='province[]' value='$province' id='$province'><label for='$province'>$province</label></div>";
        } ?>
        <button type="submit">Enviar</button>
      </fieldset>
    </form>
  </div>

  <div class="exercise_container">
    <h2>Ejercicio 4</h2>
    <p>
      Tenemos los siguientes datos en una página llamada datos_ciudades.php

      $pais= array();

      $pais["Mexico"]=array("Guadalajara","Monterrey","Tepic","Pachuca","D.F.");

      $pais["España"]=array("Barcelona","Madrid","Valencia","Mallorca","Osasuna");

      $pais["EUA"]=array("Houston","Washington","Seattle","Manhattan","San Francisco");

      $pais["Francia"]=array("París","Tolousse","St. Ettienne","Marsella","Nancy");

      $pais["Alemania"]=array("Münich","Colonia","Monchengladbach","Dormund","Leverkusen");

      $pais["Canada"]=array("Montreal","Ottawa","Vancouver","Edmonton","Quebec");

      $pais["Inglaterra"]=array("Londres","Manchester","West Ham","Liechtester","Chelsea");

      $pais["Brasil"]=array("Sao Paolo","Brasilia","Rio de Janeiro","Porto Alegre","Cotia");

      $pais["Italia"]=array("Roma","Milán","Venecia","Cagliari","Palermo");

      $pais["Japón"]=array("Tokio","Okynawa","Hiroshima","Nagasaki","Kioto");

      Queremos crear una página que muestre un desplegable con todos los países. Una vez seleccionado un país se debe dirigir a otra página donde se mostrarán solo las ciudades de dicho país.

    </p>
    <form action="backend/array-paso-datos-paginas/ej4_main.php">
      <fieldset>
        <select name="country" id="country">
          <?php
          foreach ($countries as $country => $value) {
            echo "<option value='$country'>$country</option>";
          }
          ?>
        </select>
        <button type="submit">Enviar</button>
      </fieldset>
    </form>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>