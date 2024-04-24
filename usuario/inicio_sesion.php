<?php
session_start(); // Inicia la sesión si aún no está iniciada
require_once '../config/conexion.php'; // Incluye el archivo de conexión
require_once '../config/incriptacion.php';

if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Consultar la base de datos para obtener el usuario con el correo electrónico proporcionado
    $stmt = $conn->prepare("SELECT id_usuario, nombre, correo, clave, id_rol FROM usuario WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($stmt->rowCount() == 1) {
        $clave_incriptada = $user['clave'];
        $clave_noincriptada = decrypt($clave_incriptada, $clave_fija);

        if ($clave_noincriptada == $clave) {
            // Contraseña válida, iniciar sesión
            $_SESSION['user_id'] = $user['id_usuario'];

            // Redirigir al usuario a la página correspondiente según su rol
            if ($user['id_rol'] == 1) {
                header("Location: admin.php");
                exit();
            } else if ($user['id_rol'] == 2) {
                header("Location: usuario.php");
                exit();
            }
        } else {
            // Contraseña incorrecta, redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
            header("Location: ../index.php?error=contrasena");
            exit();
        }
    } else {
        // Usuario no encontrado, redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        header("Location: ../index.php?error=usuario");
        exit();
    }
}
?>
