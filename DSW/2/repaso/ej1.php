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
    <h2>Ejercicio 1: Calcular suma números aleatorias</h2>
    <p>Crea una página que muestre dos números enteros aleatorios entre el 1 y el 100 y una entrada para que el usuario introduzca la suma de esos dos números. Cuando el usuario pulsa el botón comprobar, se debe ir a la misma página y mostrar si la solución es correcta o no (en este caso mostrar la correcta).</p>
    <?php
    $a = rand(1, 100);
    $b = rand(1, 100);
    $streak = 0;
    if (isset($_POST["streak"])) {
      $streak = $_POST["streak"];
    }
    ?>
    <form action="ej1.php" method="post">
      <fieldset>
        <label for="sum">¿Cuánto es <?= $a ?> + <?= $b ?>?</label>
        <input type="number" name="sum" id="sum" required>
        <input type="hidden" name="a" value="<?= $a ?>">
        <input type="hidden" name="b" value="<?= $b ?>">
        <button type="submit">Comprobar</button>
      </fieldset>

      <?php
      if (!empty($_POST["sum"])) {
        $a_old = $_POST["a"];
        $b_old = $_POST["b"];
        $sum = $_POST["sum"];
        $correct = $a_old + $b_old;
        if ($sum == $correct) { ?>
          <p style="color: green;">¡Correcto!</p>
          <?php
          $streak++;
          if ($streak > 1) { ?>
            <p>Llevas <?= $streak ?> aciertos seguidos</p>
          <?php }
        } else { ?>
          <p><span style="color: red;">¡Incorrecto!</span> La respuesta correcta era <?= $correct ?></p>
      <?php }
      }
      ?>
      <input type="hidden" name="streak" value="<?= $streak ?>">
    </form>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>