<?php
session_start(); 
if (isset($_SESSION['user_id'])) {

require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];

    // Procesar la imagen de portada
    $imagen_nombre = $_FILES['image']['name'];
    $imagen_temp = $_FILES['image']['tmp_name'];
    $imagen_extension = strtolower(pathinfo($imagen_nombre, PATHINFO_EXTENSION));
    $imagen_destino = '../carpeta_imagenes/' . uniqid('', true) . '.' . $imagen_extension;
    move_uploaded_file($imagen_temp, $imagen_destino);

    // Procesar el archivo PDF
    $pdf_nombre = $_FILES['ruta_pdf']['name'];
    $pdf_temp = $_FILES['ruta_pdf']['tmp_name'];
    $pdf_extension = strtolower(pathinfo($pdf_nombre, PATHINFO_EXTENSION));
    $pdf_destino = '../carpeta_pdf/' . uniqid('', true) . '.' . $pdf_extension;
    move_uploaded_file($pdf_temp, $pdf_destino);

    // Insertar datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO libro (titulo, autor, image, genero, descripcion, tipo, precio, ruta_pdf) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $autor, $imagen_destino, $genero, $descripcion, $tipo, $precio, $pdf_destino]);
    
    // Redirigir después de la inserción (opcional)
    header("Location: ../vista/usuario.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="titulo">Título del libro:</label>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor"><br>
    <label for="image">Imagen de portada (JPG, PNG):</label>
    <input type="file" id="image" name="image"><br>
    <label for="genero">Género:</label>
    <input type="text" id="genero" name="genero"><br>
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea><br>
    <label for="tipo">Tipo de libro:</label>
    <select name="tipo" id="tipo">
        <option value="libre">Libre</option>
        <option value="pago">Pago</option>
    </select><br>
    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01"><br>
    <label for="ruta_pdf">Ruta del PDF (PDF):</label>
    <input type="file" id="ruta_pdf" name="ruta_pdf"><br>
    <input type="submit" value="Registrar libro">
</form>


</body>
</html>
<?php

session_destroy();
} else {
echo 'Que haces???';
}

?>
