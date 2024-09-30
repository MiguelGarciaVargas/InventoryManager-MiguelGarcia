<?php
session_start();
require 'conexion.php';

$id = intval($_POST["id"]);

$sql = "DELETE FROM producto WHERE id = ?";
$params = [$id];

try {
    $stmt = $pdo->prepare($sql);

    $stmt->execute($params);

    $_SESSION['success_message'] = "producto eliminado correctamente.";
    header("Location: http://localhost/InventoryManager/index.php");
    exit();
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Error al eliminar el carro: " . $e->getMessage();
    header("Location: http://localhost/InventoryManager/index.php");
    exit();
}
