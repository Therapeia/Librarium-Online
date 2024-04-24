<?php
//if (isset($_SESSION['user_id'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/crud.css">
    <title>Librarium Online</title>
</head>

<body>
    <div class="mainContainer2" id="post-form2">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <h4 class="third-text">Nuevo Libro</h4>
            <div class="input-box">
                <input type="text" id="titulo" name="titulo" class="input" required><br>
                <label for="titulo">Título del libro:</label>

            </div>

            <div class="input-box">

                <input type="text" id="autor" name="autor" class="input" required><br>
                <label for="autor">Autor:</label>
            </div>
            <label for="" class="a-d">Elija una imagen</label>
                <input type="file" id="image" name="image" required><br>
               
       
            <div class="input-box">

                <input type="text" id="genero" name="genero" class="input" required><br>
                <label for="genero">Género:</label>
            </div>
            <div class="input-box">

                <textarea id="descripcion" name="descripcion" class="input" required></textarea><br>
                <label for="descripcion">Descripción:</label>
            </div>
            <div class="input-box">
                <select name="tipo" id="tipo" class="input" required>
                    <option value="libre">Libre</option>
                    <option value="pago">Pago</option>
                </select><br>
                <label for="tipo">Tipo de libro:</label>

            </div>
            <div class="input-box">
                
            <input type="number" id="precio" name="precio" step="0.01" class="input" required><br>
                <label for="precio">Precio:</label>
            </div>
            <label for="" class="a-d">Elija un archivo</label>
                <input type="file" id="ruta_pdf" name="ruta_pdf" required><br>
             
         
            <input type="submit" value="Agregar Libro" id="crear">
        </form>

    </div>

</body>

</html>

<?php
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
    header("Location: ../cruds/crud_libros.php");
    exit();
}


/*session_destroy();
} else {
echo 'Que haces???';
}*/
?>