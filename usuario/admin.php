
<?php
session_start(); 

//if (isset($_SESSION['user_id'])) {

require_once '../config/conexion.php';

// Consultar los registros de la tabla
$stmt = $conn->query("SELECT * FROM usuario");
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleus.css">
    <title>Librarium_Online</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../IMG/Captura_de_pantalla_2024-04-16_002039-removebg-preview.png" alt="">
        </div>
  

    </header>

    <div class="container">
        <h1>Bienvenido Administrador <?php echo $registros[0]['nombre']; ?></h1>
        <div class="btn-container">
            <a href="../cruds/crud_usuario.php" class="btn">Gestionar Usuarios</a>
        </div>
        <div class="btn-container">
            <a href="../cruds/crud_libros.php" class="btn">Gestionar Libros</a>
        </div>
        <div class="btn-container">
            <a href="../cruds/crud_pagos.php" class="btn">Gestionar Pagos - Descargas</a>
        </div>
    </div>

</body>
</html>
<?php 

session_destroy();
/*}
else{
    echo 'Que haces???';
}*/
