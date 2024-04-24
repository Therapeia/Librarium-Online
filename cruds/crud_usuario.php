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
    <link rel="stylesheet" href="../CSS/crud.css">
    <title>Librarium_Online</title>
</head>
<body class="main">
    <div class="titulos_ini">
        <h1>Bienvenido Administrador <?php echo $registros[0]['nombre']; ?></h1>
        <h2>Registros Usuarios - Administradores</h2>
    </div>
    
        <table class="table">
            <tr class="titulares">
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de Registro</th>
                <th>Acción</th>
            </tr>
            <?php foreach ($registros as $registro): ?>
            <tr class="tr">
                <td class= "td"><?php echo $registro['nombre']; ?></td>
                <td class= "td"><?php echo $registro['correo']; ?></td>
                <td class= "td"><?php echo $registro['fecha_registro']; ?></td>
                <td class="botones">
                    <a class="boton editar" href="../usuario/editar.php?id=<?php echo $registro['id_usuario']; ?>">Editar</a> <!-- Enlace al formulario de edición -->
                    <a class="boton eliminar" href="../usuario/eliminar.php?id=<?php echo $registro['id_usuario']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a class="boton agregar" href="../index.php">Agregar Usuario</a>
    <a class="boton agregar" href="../usuario/agregar.php">Agregar Administrador</a>
   
</body>
</html>
  <?php

/*session_destroy();
} else {
echo 'Que haces???';
}*/

?>