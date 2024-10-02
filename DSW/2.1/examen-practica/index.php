<?php
require_once "data_provincias.php";
require_once "data_municipios.php";

$mode = "1";
$submit_message = "Siguiente";

if (empty($_GET["province"]) || !array_key_exists($_GET["province"], $PROVINCIAS)) {
  $mode = "1";
} elseif (empty($_GET["location"]) || !array_key_exists($_GET["location"], $MUNICIPIOS[$_GET['province']])) {
  $mode = "2";
} else {
  $mode = "3";
  $submit_message = "Enviar";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Examen Prueba</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css">
</head>

<body>
  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/pluginfile.php/10434541/mod_resource/content/0/Examen%20Tema%201%20-2023.pdf">Prueba Examen - Pueblos de España</a>
  </h1>

  <div class="exercise_container">
    <h2>Busca tu municipio</h2>
    <form action="." method="get">
      <fieldset>
        
        <?php switch ($mode) {
          case '1':
        ?>
            <label for="province">Provincia: </label>
            <select name="province" id="province">
              <?php
              foreach ($PROVINCIAS as $key => $province) {
              ?>
                <option value="<?= $key ?>"><?= $province ?></option>
              <?php
              }
              ?>
            </select>
            <button type="submit"><?= $submit_message ?></button>

          <?php
            break;

          case '2':
          ?>
            <input type="text" name="province" value="<?= $_GET['province'] ?>" hidden>
            <label for="location">Municipio: </label>
            <select name="location" id="location">
              <?php
              foreach ($MUNICIPIOS[$_GET['province']] as $key => $location) {
              ?>
                <option value="<?= $key ?>"><?= $location ?></option>
              <?php
              }
              ?>
            </select>
            <button type="submit"><?= $submit_message ?></button>

        <?php
            break;

          default:
          ?>
          <p><?php printf("El municipio de %s, con código %s, pertenece %s.", $MUNICIPIOS[$_GET['province']][$_GET['location']], $_GET['location'], $PROVINCIAS[$_GET['province']])?></p>
          <?php
            break;
        } ?>
        
      </fieldset>
    </form>

  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>