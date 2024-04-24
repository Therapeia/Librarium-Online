
<?php
require_once '../config/conexion.php';
require_once '../config/incriptacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave_user = $_POST['clave'];

    $clave_incriptada = encrypt($clave_user, $clave_fija);

    // Establece el rol como 2 (usuario normal)
    $rol = 2;

    $stmt = $conn->prepare("INSERT INTO usuario (nombre, correo, clave, id_rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $correo, $clave_incriptada, $rol]);

    session_start();
    $_SESSION['user_id'] = $conn->lastInsertId(); // Obtén el ID del usuario recién registrado y guárdalo en la sesión

    // Redirige al usuario a donde corresponda después del registro
    header("Location: usuario.php");
    exit();
}
?>
