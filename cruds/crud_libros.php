<?php
    //if (isset($_SESSION['user_id'])) {
    

require_once '../config/conexion.php';

// Consultar los registros de la tabla


$stmt = $conn->query("SELECT * FROM libro");
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
        <h1>Bienvenido Administrador</h1>
        <h2>Registros Libros</h2>
    </div>

        

    <table class="table">
            <tr class="titulares">
            <th>Titulo</th>
            <th>Autor</th>
            <th>Imagen</th>
            <th>Genero</th>
            <th>Descripcion</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Ruta_PDF</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
        <tr class="tr">
            <td class= "td"><?php echo $registro['titulo']; ?></td>
            <td class= "td"><?php echo $registro['autor']; ?></td>
            <td class= "td"><?php echo $registro['image']; ?></td>
            <td class= "td"><?php echo $registro['genero']; ?></td>
            <td class= "td"><?php echo $registro['descripcion']; ?></td>
            <td class= "td"><?php echo $registro['tipo']; ?></td>
            <td class= "td"><?php echo $registro['precio']; ?></td>
            <td class= "td"><?php echo $registro['ruta_pdf']; ?></td>
            <td class="botones">
            <a class="boton editar" href="../libro/editar_libro.php?id=<?php echo $registro['id_libro']; ?>">Editar</a>
 <!-- Enlace al formulario de edición -->
            <a class="boton eliminar" href="../libro/eliminar_libro.php?id=<?php echo $registro['id_libro']; ?>">Eliminar</a>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
    <a class="boton agregar" href="../libro/agregar_libro.php">Agregar</a>