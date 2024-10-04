<?php
$bill = [
  ['Ron Zacapa 23', 59.99, 2],
  ['Chivas Regal 18', 65, 1],
  ['Glenfiddich 12', 45.55, 3],
  ['Johnnie Walker Blue Label', 180, 1],
  ['Macallan 18', 250, 1],
  ['Jameson Irish Whiskey', 29.9, 4],
  ['Hennessy VS', 40, 2],
  ['Patrón Silver Tequila', 50.1, 2],
  ['Grey Goose Vodka', 55.00, 1],
  ['Baileys Irish Cream', 25.00, 3],
  ['Estrella de Galicia', .7, 24],
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
  <style>
    table {
      border-collapse: collapse;
    }
    td, th {
      border: 1px solid blue;
      padding: 5px;
    }
  </style>
</head>

<body>

  <table>
    <thead>
      <th>Artículo</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Total</th>
    </thead>
    <tbody>
      <?php
      $total = 0;
      foreach ($bill as $entry) { 
        $subtotal = $entry[1] * $entry[2];
        ?>
        <tr>
          <td><?= $entry[0] ?></td>
          <td><?php printf("%.2f€", $entry[1]); ?></td>
          <td><?php printf("%02s", $entry[2]); ?></td>
          <td><?php printf("%'.10.2f€", $subtotal) ?></td>
        </tr>
      <?php $total += $subtotal;
      } ?>

      <th colspan="3">Total</th>
      <th><?php printf("%.2f€", $total); ?></th>
    </tbody>
  </table>

</body>

</html>