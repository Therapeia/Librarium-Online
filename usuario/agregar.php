<?php
//if (isset($_SESSION['user_id'])) {
require_once '../config/conexion.php';
require_once '../config/incriptacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $clave_incriptada = encrypt($clave, $clave_fija);

    // Establece el rol como 1 (administrador)
    $rol = 1;

    $stmt = $conn->prepare("INSERT INTO usuario (nombre, correo, clave, id_rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $correo, $clave_incriptada, $rol]);

    // Redirige al administrador a donde corresponda después de agregar el nuevo usuario
    header("Location: crud_usuario.php");
    exit();
}
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
            <h4 class="third-text">Nuevo Administrador</h4>
            <div class="input-box">
                <input type="text" id="nombre" name="nombre" class="input" required>
                <label for="">Nombre Completo</label>
            </div>
            <div class="input-box">
                <input type="email" id="correo" name="correo" class="input" required>
                <label for="">Correo Electronico</label>
            </div>
            <div class="input-box">
                <input type="password" id="clave" name="clave" class="input" required>
                <label for="">Contraseña</label>
            </div>
            <input type="submit" id="crear" value="Crear">
        </form>
    </div>



</body>

</html>
<?php

/*session_destroy();
} else {
echo 'Que haces???';
}*/