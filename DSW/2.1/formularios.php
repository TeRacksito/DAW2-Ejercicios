<?php
require_once("formularios/subjectData.php");
require_once("formularios/companiesData.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formularios</title>
  <link rel="stylesheet" href="../../general/css/exercise.css" />
  <link rel="stylesheet" href="../../general/css/form.css" />
</head>

<body>
  <h1>
    Formularios PHP
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1</h2>
    <p>Introduce datos en este formulario.</p>
    <form action="formularios/formularios_procesador.php" method="post">
      <fieldset>
        <label for="name">Nombre: </label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Escribe tu nombre..." />
        <label for="age">Edad: </label>
        <input
          type="number"
          id="age"
          name="age"
          min="18"
          max="120"
          placeholder="Escribe tu edad..." />
      </fieldset>
      <fieldset>
        <label for="hobby">Aficiones: </label>
        <select name="hobby" id="id">
          <option>Programar</option>
          <option>Leer</option>
          <option>Deportes</option>
          <option>Videojuegos</option>
          <option>Ver series</option>
        </select>
      </fieldset>
      <fieldset>
        <input type="checkbox" name="course" id="course" />
        <label for="course">Matriculado en el ciclo</label>
      </fieldset>
      <fieldset>
        <div class="inline">
          <span>¿Qué te gusta más?</span>
          <input type="radio" name="side" id="side-front" value="front" />
          <label for="side-front">Frontend</label>
          <input type="radio" name="side" id="side-back" value="back" />
          <label for="side-back">Backend</label>
          <input
            type="radio"
            name="side"
            id="side-fullstack"
            value="fullstack" />
          <label for="side-fullstack">Fullstack</label>
        </div>

        <label for="subject">Módulo que más te gusta</label>
        <select name="subject" id="subject">

          <?php foreach ($subjects as $key => $value) { ?>
            <option value="<?= $key; ?>"><?= $value; ?></option>
          <?php } ?>
        </select>

        <label for="companies">¿Dónde te gustaría hacer las prácticas?</label>
        <select name="companiesIndex[]" id="companies" multiple>
          <?php for ($i = 0; $i < count($companies); $i++) { ?>
            <option value="<?= $i; ?>"><?= $companies[$i]; ?></option>
          <?php } ?>

        </select>
      </fieldset>
      <fieldset>
        <input type="submit" value="Enviar" />
      </fieldset>
    </form>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="../../general/js/hovered.js"></script>
</body>

</html>