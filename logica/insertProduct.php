<?php
require 'conexion.php';

$id = rand();
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$purchase_price = $_POST["purchase_price"];
$public_price = $_POST["public_price"];


// Consulta preparada para inserción de datos en la base de datos
$sql = "INSERT INTO producto (id, name, quantity, purchase_price, public_price) VALUES (?, ?, ?, ?, ?)";

try {
    // Preparar la sentencia
    $stmt = $pdo->prepare($sql);

    // Ejecutar la sentencia con los datos
    $stmt->execute([$id, $name, $quantity, $purchase_price, $public_price]);
    header("Location: http://localhost/InventoryManager/index.php");
} catch (Exception $e) {
    echo "Error al añadir el inventario a la base de datos: " . $e->getMessage();
    header("Location: http://localhost/InventoryManager/index.php?error=" . $e->getMessage());
    exit;
}
