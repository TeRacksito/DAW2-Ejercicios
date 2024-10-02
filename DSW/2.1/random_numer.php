<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Num random</title>
    <link rel="stylesheet" href="/ejercicios/general/css/exercise.css" />
    <link rel="stylesheet" href="/ejercicios/general/css/form.css" />
    <style>
      textarea {
        width: 100%;
        height: 200px;
        padding: 10px;
      }
    </style>
  </head>

  <body>
    <h1>
      <a href="">Número random</a>
    </h1>

    <div class="exercise_container">
      <h2>Ejercicio 1</h2>
      <p>Enviar un número random a otro php</p>
      <form action="/ejercicios/DSW/2.1/backend/num-random/num-random.php">
        <input type="number" name="ran-num" hidden value="<?= rand(1,6);?>">
        <input type="submit" value="Enviar">
      </form>
    </div>



    <footer id="end_page_separator"></footer>
    <script type="module" src="/ejercicios/general/js/hovered.js"></script>
  </body>
</html>