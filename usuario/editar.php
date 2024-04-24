<?php
    //if (isset($_SESSION['user_id'])) {

require_once '../config/conexion.php';
// Verifica si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $id = $_POST['id']; // ID del registro a editar
    $nuevo_nombre = $_POST['nuevo_nombre']; // Nuevo nombre enviado desde el formulario
    $nuevo_correo = $_POST['nuevo_correo']; // Nuevo correo enviado desde el formulario
    
    // Realiza la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE usuario SET nombre = :nombre, correo = :correo WHERE id_usuario = :id");
    $stmt->bindParam(':nombre', $nuevo_nombre);
    $stmt->bindParam(':correo', $nuevo_correo);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    // Redirige al usuario de vuelta a la página de visualización de registros u otra página según tu aplicación
    header("Location: ../cruds/crud_usuario.php");
    exit();
}

// Si no se ha enviado el formulario de edición, muestra el formulario prellenado
$id_registro = $_GET['id']; // ID del registro a editar obtenido desde la URL

// Consulta la información del registro a editar
$stmt = $conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
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
    <title>Librarium Online</title>
</head>
<body>
    <div class="mainContainer" id="post-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $registro['id_usuario']; ?>"> <!-- Campo oculto para enviar el ID del registro -->
            <h4 class="third-text">Editar Registro</h4>
            <div class="input-box">
            <input type="text" id="nuevo_nombre" name="nuevo_nombre" class="input" value="<?php echo $registro['nombre']; ?>">
                <label for="">Nombre Completo</label>
            </div>
            <div class="input-box">
            <input type="email" id="nuevo_correo" name="nuevo_correo" class="input" value="<?php echo $registro['correo']; ?>">
                <label for="">Correo Electronico</label>
            </div>
            <input type="submit" id="crear" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
