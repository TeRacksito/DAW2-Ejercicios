<?php

session_start();

if (isset($_SESSION['count'])) {
    $_SESSION['count']++;
} else {
    $_SESSION['count'] = 1;
}

// $_SESSION['hours'] = n ull;

$_SESSION['hours'][] = date('H');

// echo "Has visitado esta página " . $_SESSION['count'] . " veces en esta sesión.";
// echo "<br>";
// echo "La hora actual es " . $_SESSION['hours'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

Has visitado esta página <?= $_SESSION['count'] ?> veces en esta sesión.

<ul>
    <?php foreach ($_SESSION['hours'] as $hour) : ?>
        <li><?= $hour ?></li>
    <?php endforeach; ?>
</ul>

    
</body>
</html>