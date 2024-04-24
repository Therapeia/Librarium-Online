<?php
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_registro = $_GET['id'];

    // Elimina el registro de la base de datos
    $stmt = $conn->prepare("DELETE FROM libro WHERE id_libro = ?");
    $stmt->execute([$id_registro]);

    // Redirige al usuario de vuelta a la página de visualización de registros
    header("Location: ../cruds/crud_libros.php");
    exit();
}
?>
