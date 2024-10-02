<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
  <link rel="stylesheet" href="/ejercicios/general/css/form.css" />
</head>

<body>
  <h1>
    <a
      href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221738">Calculadora</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1 Calculadora simple</h2>
    <p>
      Crea un formulario que permita al usuario ingresar dos números y
      seleccionar una operación (suma, resta, multiplicación o división).
      Luego, muestra el resultado de la operación en pantalla.
    </p>
    <form action="backend/calculadora/ej1_main.php">
      <fieldset>
        <div>
          <label for="ej1_input_num1">Número 1</label>
          <input type="number" id="ej2_input_num1" name="a" />
        </div>
        <div>
          <label for="ej2_input_num1">Número 2</label>
          <input type="number" id="ej2_input_num2" name="b" />
        </div>
      </fieldset>
      <fieldset>
        <button type="submit" value="sum" name="op">+</button>
        <button type="submit" value="sub" name="op">-</button>
        <button type="submit" value="mul" name="op">*</button>
        <button type="submit" value="div" name="op">/</button>
      </fieldset>
    </form>
  </div>

  <div class="exercise_container">
    <?php
    require_once "backend/calculadora/operations.php";
    
    $a = "";
    if (isset($_GET["a"])) {
      $a = (int) $_GET["a"];
    }
    if (isset($_GET["b"]) && isset($_GET["op"])) {
      if (!is_numeric($_GET["a"]) || !is_numeric($_GET["b"])) {
      } else if (!array_key_exists($_GET["op"], $operations)) {
      } else {
        $b = (int) $_GET["b"];
        $op = $_GET["op"];
        $a = $operations[$op]($a, $b);
      }
    }
    ?>
    <h2>Ejercicio 2 Calculadora repetitiva</h2>
    <p>
      Igual que la calculadora simple anterior pero el resultado de cada operación es
      usado como uno de los dos números para enlazar con otra operación y seguir haciendo
      cálculos sucesivamente. También se ha de incluir un botón que permita reiniciar la calculadora.
    </p>
    <form action="">
      <fieldset>
        <div>
          <label for="ej2_input_num1">Número 1</label>
          <input type="number" id="ej2_input_num1" name="a" value="<?=$a?>" />
        </div>
        <div>
          <label for="ej2_input_num2">Número 2</label>
          <input type="number" id="ej2_input_num2" name="b" />
        </div>
      </fieldset>
      <fieldset>
        <button type="submit" value="sum" name="op">+</button>
        <button type="submit" value="sub" name="op">-</button>
        <button type="submit" value="mul" name="op">*</button>
        <button type="submit" value="div" name="op">/</button>
      </fieldset>
    </form>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
</body>

</html>