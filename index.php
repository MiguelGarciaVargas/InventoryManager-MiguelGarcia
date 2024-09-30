<?php
require './logica/conexion.php';

// Construir la consulta SQL para obtener
$sql = "SELECT * FROM producto WHERE 1=1";

// Puntero para operaciones
$result = mysqli_query($conexion, $sql);

$totalInventoryCost = 0;
$totalSalePrice = 0;

while ($row = mysqli_fetch_assoc($result)) {
  $totalInventoryCost += ($row['quantity'] * $row['purchase_price']);
  $totalSalePrice += ($row['quantity'] * $row['public_price']);
}

$totalProfit = $totalSalePrice - $totalInventoryCost;

// reutilizarlo puntero para listado
$result = mysqli_query($conexion, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory Manager</title>
</head>

<style>
  input {
    display: block;
  }
</style>

<body>
  <header>
    <h1>My Inventory</h1>
  </header>


  <h2>Insert Product</h2>
  <form action="logica/insertProduct.php" method="POST">
    <label for="name">Name:</label>
    <input name="name" type="text" required>

    <label for="quantity">Quantity:</label>
    <input name="quantity" type="number" required>

    <label for="purchase_price">Purchase Price:</label>
    <input name="purchase_price" type="number" required>

    <label for="public_price">Public Price:</label>
    <input name="public_price" type="number" required>
    <button type="submit">Submit</button>
  </form>

  <hr>

  <h2>Product List</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Quantity</th>
      <th>Purchase Price</th>
      <th>Public Price</th>
      <th>Delete</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['quantity'] . '</td>';
      echo '<td>' . $row['purchase_price'] . '</td>';
      echo '<td>' . $row['public_price'] . '</td>';
      echo '<td>
            <form action="logica/deleteProduct.php" method="POST">
              <input type="hidden" name="id" value="' . $row['id'] . '">
              <button type="submit" style="color: red;">Eliminar</button>
            </form>
          </td>';
      echo '</tr>';
    }
    ?>

  </table>

  <hr>

  <h2>Totals</h2>

  <table>
    <tr>
      <th>Total Inventory Cost</th>
      <th>Total Sale Price</th>
      <th>Total Profit</th>
    </tr>
    <?php
    echo '<tr>';
    echo '<td>' . $totalInventoryCost . '</td>';
    echo '<td>' . $totalSalePrice . '</td>';
    echo '<td>' . $totalProfit . '</td>';

    echo '</tr>'
    ?>

  </table>

</body>

</html>