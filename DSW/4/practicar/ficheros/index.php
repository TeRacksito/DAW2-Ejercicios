<?php

$dataKeys = ["product_name", "price", "stock"];

$newData = true;

foreach($dataKeys as $key) {
  if (!isset($_REQUEST[$key])) {
    $newData = false;
    break;
  }
}

$sameLength = $newData && count(array_unique(array_map(function($key) {
  return count($_REQUEST[$key]);
}, $dataKeys))) === 1;


$fileName = "data/productos.csv";
if (!file_exists($fileName)) {
  $file = fopen($fileName, "w");
  fclose($file);
}

if ($sameLength) {
  $file = fopen($fileName, "a");
  $length = count($_REQUEST["product_name"]);

  for ($i = 0; $i < $length; $i++) {
    $data = array_map(function($key) use ($i) {
      return $_REQUEST[$key][$i];
    }, $dataKeys);

    $line = implode(";", $data) . "\n";
    fwrite($file, $line);
  }
  fclose($file);
}

$file = fopen($fileName, "r");
$products = [];
while ($line = fgets($file)) {
  $products[] = explode(";", $line);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Practicar</title>
  <link rel="stylesheet" href="/ejercicios/general/css/exercise.css">
  <link rel="stylesheet" href="/ejercicios/general/css/form.css">
  <link rel="stylesheet" href="/ejercicios/general/css/table.css">

  <style>
    .row-element {
      display: flex;
      flex-direction: row;
      gap: 20px;
      width: 100%;
    }

    .grid-line {
      gap: 0px 40px;
    }

    .inline {
      width: 100%;
    }

    span > button {
      font-family: monospace;
    }
  </style>
</head>

<body>
  <h1>
    <a href="https://www3.gobiernodecanarias.org/medusa/eforma/campus/mod/page/view.php?id=7221731">Ejercicios Ficheros</a>
  </h1>

  <div class="exercise_container">
    <h2>Ejercicio 1 - Práctica de lectura y escritura de ficheros de texto</h2>
    <p>
    <ol>
      <li>Crea un archivo llamado productos.csv (puedes usar una hoja de cálculo) que contenga 2 o 3 líneas. En cada línea hay un producto.
        <ul>
          <li>El formato será "nombre_producto;precio;número_en_stock".</li>
          <li>Ejemplo: "ron zacapa;117.85;23"</li>
        </ul>
      </li>
      <li>La página muestra un listado (tabla) con los productos.</li>
      <li>Crea un formulario con los siguientes campos: nombre, precio, stock (texto, decimal y entero)</li>
      <li>El formulario se llama a si mismo y se debe guardar esos datos en el mismo archivo.</li>
    </ol>
    </p>
    <table>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Stock</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $product) { ?>
          <tr>
            <?php foreach($product as $data) { ?>
              <td><?= $data ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <form action="." method="post">
      <fieldset>
        <legend>Guardar nuevos productos</legend>
        <div class="row-element" style="color: gray;">
            <span><button type="button" onclick="addProductField(this.parentElement.parentElement)" style="background-color: green;">+</button></span>
          <div class="grid-line">
            <div class="inline">
              <label for="product_name">Nombre del producto</label>
              <input type="text" name="product_name[]" id="product_name" disabled>
            </div>
            <div class="inline">
              <label for="price">Precio</label>
              <input type="number" name="price[]" id="price" step="0.01" disabled>
            </div>
            <div class="inline">
              <label for="stock">Stock</label>
              <input type="number" name="stock[]" id="stock" disabled>
            </div>
          </div>
        </div>
        <button type="submit">Guardar</button>
      </fieldset>
    </form>
  </div>

  <footer id="end_page_separator"></footer>
  <script type="module" src="/ejercicios/general/js/hovered.js"></script>
  <script>
    const table = document.querySelector('table');
    const form = document.querySelector('form');

    function createInput(type, name, id, value, labelText, required, ...otherAttributes) {
      const inline = document.createElement('div');
      inline.classList.add('inline');

      const label = document.createElement('label');
      label.setAttribute('for', id);
      label.textContent = labelText;

      const input = document.createElement('input');
      input.setAttribute('type', type);
      input.setAttribute('name', name);
      input.setAttribute('id', id);
      input.setAttribute('value', value);
      input.required = required;

      for (const attribute of otherAttributes) {
        input.setAttribute(attribute.name, attribute.value);
      }

      inline.appendChild(label);
      inline.appendChild(input);

      return inline;
    }

    function addProductField(pivot) {
      const rowElement = document.createElement('div');
      rowElement.classList.add('row-element');

      const span = document.createElement('span');
      const button = document.createElement('button');
      button.setAttribute('type', 'button');
      button.textContent = '-';
      button.addEventListener('click', () => rowElement.remove());
      span.appendChild(button);
      rowElement.appendChild(span);

      const gridLine = document.createElement('div');
      gridLine.classList.add('grid-line');
      rowElement.appendChild(gridLine);

      let inline = createInput('text', 'product_name[]', 'product_name', '', 'Nombre del producto', true);
      gridLine.appendChild(inline);

      inline = createInput('number', 'price[]', 'price', '', 'Precio', true, { name: 'step', value: '0.01' });
      gridLine.appendChild(inline);

      inline = createInput('number', 'stock[]', 'stock', '', 'Stock', true);
      gridLine.appendChild(inline);

      pivot.parentNode.insertBefore(rowElement, pivot);
    }
  </script>
</body>

</html>