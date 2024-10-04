<?php
require_once('questions.php');

$isAnswered = !empty($_POST['answer']);

$question_index;
if (!empty($_POST['question'])) {
  $question_index = (int) $_POST['question'];
} else {
  $question_index = array_rand($questions);
}

$score = empty($_POST['score']) ? 0 : $_POST['score'];

$question = $questions[$question_index]['statement'];
$answers = $questions[$question_index]['answers'];
$correct_answer = $answers[0];
shuffle($answers);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3</title>

  <style>
    form {
      border: 3px solid blue;
      padding: 5px;
      max-width: 500px;
    }
    h2[correct="true"] {
      color: green;
    }

    h2[correct="false"] {
      color: red;
    }

    .inline {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      gap: 10px;
      margin: 10px 3px;
    }

    button {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <form action="ej3.php" method="post">

    <?php if ($isAnswered) { ?>
        <p>La pregunta: <span><?= $question ?></span></p>
        <p>La respuesta: <span><?= $_POST['answer'] ?></span></p>

        <?php
        if ($_POST['answer'] === $correct_answer) {
          $score++; ?>
          <h2 correct="true">CORRECTO</h2>
        <?php } else { ?>
          <h2 correct="false">INCORRECTO</h2>
        <?php } ?>
        <hr>

    <?php } ?>

      <h2>Puntos: <?= $score ?></h2>
      <hr>

      <?php
      if ($isAnswered) {
        $question_index = array_rand($questions);

        $question = $questions[$question_index]['statement'];
        $answers = $questions[$question_index]['answers'];
        $correct_answer = $answers[0];
        shuffle($answers);
      }
      ?>
      <h1>Pregunta</h1>
      <h2> <?= $question ?></h2>
      <input type="text" name="question" value="<?= $question_index ?>" hidden>
      <input type="number" name="score" value="<?= $score ?>" hidden>
      <div class="inline">
        <?php for ($i = 0; $i < count($answers); $i++) { ?>
          <div class="container">
            <input type="radio" name="answer" id="answer_<?= $i ?>" value="<?= $answers[$i] ?>">
            <label for="answer_<?= $i ?>"><?= $answers[$i] ?></label>
          </div>
        <?php } ?>
      </div>
      <button type="submit">Enviar</button>
  </form>

</body>

</html>