<?php

//if (isset($_SESSION['user_id'])) {
require_once '../config/conexion.php';

// Verifica si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $id = $_POST['id']; // ID del registro a editar
    $nuevo_titulo = $_POST['nuevo_titulo']; // Nuevo nombre enviado desde el formulario
    $nuevo_autor = $_POST['nuevo_autor'];
    
    // Manejo de la imagen de portada
    $nueva_imagen = $_FILES['nueva_imagen']['name'];
    $ruta_imagen_temporal = $_FILES['nueva_imagen']['tmp_name'];
    move_uploaded_file($ruta_imagen_temporal, 'carpeta_imagenes/'.$nueva_imagen);
    
    // Manejo del archivo PDF
    $nuevo_rutapdf = $_FILES['nuevo_rutapdf']['name'];
    $ruta_pdf_temporal = $_FILES['nuevo_rutapdf']['tmp_name'];
    move_uploaded_file($ruta_pdf_temporal, 'carpeta_pdf/'.$nuevo_rutapdf);
    
    $nuevo_genero = $_POST['nuevo_genero'];
    $nuevo_descripcion = $_POST['nuevo_descripcion'];
    $nuevo_tipo = $_POST['nuevo_tipo']; // Nuevo correo enviado desde el formulario
    $nuevo_precio = $_POST['nuevo_precio'];

    $stmt = $conn->prepare("UPDATE libro SET titulo = :titulo, autor = :autor, image = :image, genero = :genero, descripcion = :descripcion, tipo = :tipo, precio = :precio, ruta_pdf = :ruta_pdf WHERE id_libro = :id");
    $stmt->bindParam(':titulo', $nuevo_titulo);
    $stmt->bindParam(':autor', $nuevo_autor);
    $stmt->bindParam(':image', $nueva_imagen);
    $stmt->bindParam(':genero', $nuevo_genero);
    $stmt->bindParam(':descripcion', $nuevo_descripcion);
    $stmt->bindParam(':tipo', $nuevo_tipo);
    $stmt->bindParam(':precio', $nuevo_precio);
    $stmt->bindParam(':ruta_pdf', $nuevo_rutapdf);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    // Redirige al usuario de vuelta a la página de visualización de registros u otra página según tu aplicación
    header("Location: ../cruds/crud_libros.php");
    exit();
}

// Si no se ha enviado el formulario de edición, muestra el formulario prellenado
$id_registro = $_GET['id']; // ID del registro a editar obtenido desde la URL

// Consulta la información del registro a editar
$stmt = $conn->prepare("SELECT * FROM libro WHERE id_libro = :id");
$stmt->bindParam(':id', $id_registro);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/crud.css">
    <title>Editar Registro</title>
</head>
<body>
<div class="mainContainer2" id="post-form2">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <h4 class="third-text">Editar Libro</h4>
           
    <input type="hidden" name="id" value="<?php echo $registro['id_libro']; ?>">
    <div class="input-box">
    <label for="nuevo_titulo">Título del libro:</label>
    <input type="text" id="nuevo_titulo" name="nuevo_titulo"  class="input" value="<?php echo $registro['titulo']; ?>"><br>
    </div>

    <div class="input-box">
    <label for="nuevo_autor">Autor:</label>
    <input type="text" id="nuevo_autor" name="nuevo_autor"  class="input" value="<?php echo $registro['autor']; ?>"><br>
    </div>


    <label for="nueva_imagen" class="a-d">Imagen de portada (JPG, PNG):</label>
    <input type="file" id="nueva_imagen" name="nueva_imagen"><br>


    <div class="input-box">
    <label for="nuevo_genero">Género:</label>
    <input type="text" id="nuevo_genero" name="nuevo_genero"  class="input" value="<?php echo $registro['genero']; ?>"><br>
    </div>

    <div class="input-box">
    <label for="nuevo_descripcion">Descripción:</label>
    <textarea id="nuevo_descripcion" name="nuevo_descripcion"  class="input"><?php echo $registro['descripcion']; ?></textarea><br>
    </div>

    <div class="input-box">
    <label for="nuevo_tipo">Tipo de libro:</label>
    <select name="nuevo_tipo" id="nuevo_tipo">
        <option value="libre" <?php if($registro['tipo'] == 'libre') echo 'selected'; ?>>Libre</option>
        <option value="pago" <?php if($registro['tipo'] == 'pago') echo 'selected'; ?>>Pago</option>
    </select><br>
    </div>

    <div class="input-box">
    <label for="nuevo_precio">Precio:</label>
    <input type="number" id="nuevo_precio" name="nuevo_precio" step="0.01"  class="input" value="<?php echo $registro['precio']; ?>"><br>
    </div>

 
    <label for="nuevo_rutapdf" class="a-d">Ruta del PDF (PDF):</label>
    <input type="file" id="nuevo_rutapdf" name="nuevo_rutapdf"><br>

    <input type="submit" id="crear" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
/*session_destroy();
} else {
echo 'Que haces???';
}*/

?>