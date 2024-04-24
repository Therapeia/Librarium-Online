<?php
require_once 'config/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Librarium Online</title>
</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="IMG/Captura_de_pantalla_2024-04-16_002039-removebg-preview.png" alt="">
        </div>
     
        <button class="iniciar-sesion" id="formulario"><i class="fa-solid fa-user"></i>Iniciar Sesion</button>
    </header>

    <div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="usuario/inicio_sesion.php" class="sign-in-form" method="post">
                <h2 class="title">Iniciar Sesión</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="correo" placeholder="Correo electrónico" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="clave" placeholder="Contraseña" required />
                </div>
                <input type="submit" value="Ingresar" class="btn solid" />
            </form>
            <form action="usuario/registro_user.php" class="sign-up-form" method="post">
                <h2 class="title">Registrarme</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombre" placeholder="Nombre completo" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="correo" placeholder="Correo electrónico"  required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="clave" placeholder="Contraseña" required/>
                </div>
                <input type="submit" class="btn" value="Registrarme" name="registrar" />
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>¿Nuevo aquí?</h3>
                <p>
                    ¡No te preocupes! Si das clic en el botón de abajo, ¡te puedes registrar con nosotros y ser parte de Librarium Online!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Registrarme
                </button>
            </div>
            <img src="IMG/Mobile login-pana.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>¿Ya eres uno de nosotros?</h3>
                <p>
                    ¡Por favor, dale clic al botón que dice Iniciar Sesión para seguir con tus libros!
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Iniciar Sesión
                </button>
            </div>
            <img src="IMG/Login-rafiki (1).png" class="image" alt="" />
        </div>
    </div>
</div>

<section>
    <div class="circle"></div>
    <div class="contenti" id="Intro">
        <div class="textBox">
            <h2>Librarium Online</h2><br>
            <p>Bienvenido a Librarium Online, tu destino literario definitivo donde la imaginación cobra vida y los mundos se abren ante ti con cada página que pasas. En Librarium Online, nos enorgullece ofrecerte una amplia selección de libros que abarcan géneros, autores y estilos para satisfacer todos los gustos y preferencias.</p><br>
            <p> Nuestra misión en Librarium Online es ofrecerte no solo una colección diversa de libros, sino también una experiencia de compra fácil y conveniente. Navega por nuestro sitio web o aplicación con facilidad, busca tus libros favoritos por título, autor o género, y descubre nuevas gemas literarias con nuestras recomendaciones personalizadas.

                En Librarium Online, creemos en el poder transformador de la lectura y en el placer intemporal de sumergirse en un buen libro. Únete a nosotros en esta emocionante aventura literaria y descubre un mundo de posibilidades entre las páginas de nuestros libros cuidadosamente seleccionados.

                ¡Bienvenido a <span>Librarium Online</span>, donde cada página es una nueva aventura!</p>


        </div>
        <div class="imgBox" id="logos">
            <img src="IMG/Captura_de_pantalla_2024-04-16_002039-removebg-preview.png" alt="" class="img">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
        </div>

    </div>
</section>

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'contrasena') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '¡Contraseña incorrecta!',
                    text: 'Por favor, verifica tu contraseña e intenta de nuevo.'
                });
            </script>";
    } elseif ($error == 'usuario') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '¡Usuario no encontrado!',
                    text: 'Por favor, verifica tu correo electrónico e intenta de nuevo.'
                });
            </script>";
            }
}
?>

<script src="JS/script.js"></script>
</body>

</html>
